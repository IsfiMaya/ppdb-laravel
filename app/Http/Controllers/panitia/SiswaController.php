<?php

namespace App\Http\Controllers\panitia;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataDiriRequest;
use App\Models\data_diri;
use App\Models\pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    protected $dataDiri;
    public function __construct(data_diri $dataDiri)
    {
        $this->dataDiri = $dataDiri;
    }

    public function index()
    {
        $data = $this->dataDiri->get_data_diri();
        // dd($data);
        return view('panitia.siswa', compact('data'));
    }

    public function edit_data_diri(DataDiriRequest $request, $id)
    {
        $data = $request->validated();
        $data_diri = data_diri::findOrFail($id);
        if ($request->file('pas_photo')) {
            $file = $request->file('pas_photo');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put($filename, $file->get());
            $data['pas_photo'] = '/data_diri/' . $filename;
        } else {
            $data['pas_photo'] = $data_diri['pas_photo'];
        }
        $data['user_id'] = Auth::user()->id;

        $data_diri->update($data);
        return redirect('/siswa')->with('success', 'Data berhasil diubah');
    }

    public function edit_berkas(Request $request, $id)
    {
        $data = $request->validate([
            'NPSN' => ['required'],
        ]);

        $pendaftaran = pendaftaran::findOrFail($id);

        $fileFields = ['ijazah', 'kk', 'akta_lahir', 'nilai_raport', 'prestasi1', 'prestasi2', 'prestasi3', 'b_pembayaran'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                if ($pendaftaran[$field] && Storage::disk('kelengkapan')->exists($pendaftaran[$field])) {
                    Storage::disk('kelengkapan')->delete($pendaftaran[$field]);
                }

                $file = $request->file($field);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                Storage::disk('kelengkapan')->put($filename, $file->get());
                $data[$field] = '/kelengkapan/' . $filename;
            } else {
                $data[$field] = $pendaftaran[$field];
            }
        }
        // dd($data);
        $pendaftaran->update($data);
        return redirect('/siswa')->with('success', 'Berkas berhasil diubah');
    }
}
