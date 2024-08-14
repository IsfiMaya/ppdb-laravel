<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendaftaranRequest;
use App\Models\data_diri;
use App\Models\pendaftaran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PendaftaranController extends Controller
{
    public function index()
    {
        $dataUser = Auth::user()->id;
        $data = data_diri::where('user_id', $dataUser)->first();
        $newData = pendaftaran::where('user_id', $dataUser)->first();
        $newData['nama'] = $data['nama'];
        $newData['NISN'] = $data['NISN'];
        return view('dashboard.pendaftaran', compact('newData'));
    }

    public function postData(PendaftaranRequest $request)
    {
        $dataUser = Auth::user();
        if ($dataUser->pendaftaran()->exists()) {
            $message = 'data already exists';
            return redirect('/pendaftaran')->with('data_available', $message);
        }
        $data = $request->validated();
        $dataDiriUser = data_diri::where('user_id', $dataUser->id)->first();
        $dataDiriUser = $dataDiriUser['id'];
        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = uniqid() . '_' . $dataUser->username . '_' . $file->getClientOriginalName();
                Storage::disk('kelengkapan')->put($filename, $file->get());
                $data[$key] = '/kelengkapan/' . $filename;
            }
        }

        $data['data_diri_id'] = $dataDiriUser;
        $data['user_id'] = $dataUser->id;
        $newData = new pendaftaran($data);
        $newData->save();

        $message = "Pendaftaran berhasil disimpan";

        // Redirect with success message
        return redirect('/pendaftaran')->with('success', $message);
    }

    public function postDataByAdmin(PendaftaranRequest $request, $id)
    {
        $dataUser = User::findOrFail($id);
        if ($dataUser->pendaftaran()->exists()) {
            $message = 'data already exists';
            return redirect('/pendaftaran')->with('data_available', $message);
        }
        $data = $request->validated();
        $dataDiriUser = data_diri::where('user_id', $dataUser->id)->first();
        $dataDiriUser = $dataDiriUser['id'];
        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = uniqid() . '_' . $dataUser->username . '_' . $file->getClientOriginalName();
                Storage::disk('kelengkapan')->put($filename, $file->get());
                $data[$key] = '/kelengkapan/' . $filename;
            }
        }

        $data['data_diri_id'] = $dataDiriUser;
        $data['user_id'] = $dataUser->id;
        $newData = new pendaftaran($data);
        $newData->save();

        $message = "Pendaftaran berhasil disimpan";

        if (Auth::user()->role === 'admin')
            return redirect('/siswa')->with('success', $message);
        // Redirect with success message
        return redirect('/pendaftaran')->with('success', $message);
    }
}
