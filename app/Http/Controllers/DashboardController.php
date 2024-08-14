<?php

namespace App\Http\Controllers;

use App\Models\data_diri;
use App\Models\dayatampung;
use App\Models\kelulusan;
use App\Models\pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    protected $pendaftaran, $data_diri;

    public function __construct(pendaftaran $pendaftaran, data_diri $data_diri)
    {
        $this->pendaftaran = $pendaftaran;
        $this->data_diri = $data_diri;
    }

    public function index()
    {
        Debugbar::info("Memasuki method menampilkan dashboard"); // dimulai dari sini. ini definisikan profilingnya
        Debugbar::startMeasure('fetch_users', 'Waktu untuk mengambil users'); //trus ini untuk ngambil berapa lama waktu untuk melakukan kode dibawah sampai

        DB::enableQueryLog(); //trus ini yang di messages, yang ada di bagian array

        if (Auth::check() == false)
            return redirect('/');

        $totalDaftar = $this->data_diri->countDataDiri();
        $countToday = $this->data_diri->countToday();
        $auth = Auth::user()->id;
        $data = data_diri::where('user_id', $auth)->first();
        $kelulusan = null;
        if ($data) {
            $kelulusan = kelulusan::where('user_id', $data->id)->first();
        }
        $laki_laki = data_diri::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = data_diri::where('jenis_kelamin', 'Perempuan')->count();
        $total = data_diri::count();
        $persentase_laki_laki = ($laki_laki / $total) * 100;
        $persentase_perempuan = ($perempuan / $total) * 100;
        $persebaran_asal = data_diri::select('asal_kota', DB::raw('count(*) as total'))
            ->groupBy('asal_kota')
            ->orderByDesc('total')
            ->limit(10)
            ->get();
        $dayaTampung = DayaTampung::first();

        Debugbar::stopMeasure('fetch_users'); //sini selesainya
        Debugbar::info(DB::getQueryLog()); //trus ini untuk nampilin arraynya

        //trus di timeline ada tab timeline, cari aja kalimatnya sesuai dengan kalimat yang kamu panggil di baris 28
        // terus kalau mau pelakarin lebih lanjut ini linknya
        // https://www.youtube.com/results?search_query=laravel+debugbar
        // https://www.youtube.com/watch?v=XYcGys35AHQ&pp=ygUQbGFyYXZlbCBkZWJ1Z2Jhcg%3D%3D (15 menit)
        // https://www.youtube.com/watch?v=vkkMdR5VN50D (5 menit)

        return view('dashboard.main_page', compact('kelulusan', 'totalDaftar', 'dayaTampung', 'countToday', 'persentase_laki_laki', 'persentase_perempuan', 'persebaran_asal'));
    }

    public function updateDayaTampung(Request $request)
    {
        $request->validate([
            'putra' => 'required|integer|min:0',
            'putri' => 'required|integer|min:0',
        ]);

        $dayaTampung = dayatampung::first();
        if (!$dayaTampung) {
            $dayaTampung = new dayatampung();
        }

        $dayaTampung->putra = $request->putra;
        $dayaTampung->putri = $request->putri;
        $dayaTampung->save();

        return redirect()->back()->with('success', 'Daya tampung berhasil diperbarui.');
    }
}
