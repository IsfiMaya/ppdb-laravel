<?php

namespace App\Http\Controllers\panitia;

use App\Http\Controllers\Controller;
use App\Http\Requests\KelulusanRequest;
use App\Models\data_diri;
use App\Models\dayatampung;
use App\Models\kelulusan;
use App\Models\pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;

class KelulusanController extends Controller
{
    protected $dataDiri, $kelulusan;
    public function __construct(data_diri $dataDiri, kelulusan $kelulusan)
    {
        $this->dataDiri = $dataDiri;
        $this->kelulusan = $kelulusan;
    }
    public function index()
    {
        $data = $this->dataDiri->ppdbData();
        $kelulusan = $this->dataDiri->lulus()->pluck('id')->toArray();
        // dd($data->user->asal_sekolah);
        return view('panitia.ppdb', compact('data', 'kelulusan'));
    }

    public function store(KelulusanRequest $request, $id)
    {

        $data = $request->validated();

        // Mengambil data diri untuk mendapatkan jenis kelamin
        $dataDiri = data_diri::where('id', $id)->first();
        // dd($dataDiri->getOriginal());

        if (!$dataDiri) {
            return redirect('/ppdb')->with('error', 'Data diri siswa tidak ditemukan');
        }

        $kelulusan = Kelulusan::updateOrCreate(
            ['user_id' => $id],
            ['user_id' => $id, 'nilai' => $data['nilai'],
             'status' => $data['status']]
        );
        // Jika status kelulusan adalah 'lulus', kurangi daya tampung
        if ($data['status'] == 1) {
            $dayaTampung = dayatampung::first();

            if (!$dayaTampung) {
                return redirect('/ppdb')->with('error', 'Data daya tampung tidak ditemukan');
            }

            if ($dataDiri->jenis_kelamin === 'Laki-laki') {
                if ($dayaTampung->putra > 0) {
                    $dayaTampung->putra -= 1;
                }
            } elseif ($dataDiri->jenis_kelamin === 'Perempuan') {
                if ($dayaTampung->putri > 0) {
                    $dayaTampung->putri -= 1;
                }
            }

            $dayaTampung->save();
        }

        return redirect('/ppdb')->with('success', 'Data berhasil diubah dan daya tampung diperbarui');
    }

    public function destroy($id, $userId)
    {
        $kelulusan = kelulusan::where('user_id', $id)->delete();
        $pendaftaran = pendaftaran::where('data_diri_id', $id)->delete();
        $datadiri = data_diri::where('id', $id)->delete();
        $user = User::where('id', $userId)->delete();

        return redirect('/ppdb')->with('success', 'Data berhasil dihapus');
    }
}
