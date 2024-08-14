<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataDiriRequest;
use App\Models\data_diri;
use App\Models\kelulusan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataDiriController extends Controller
{
    public function index()
    {
        $auth = Auth::user()->id;
        $data = data_diri::where('user_id', $auth)->first();
        $kelulusan = kelulusan::where('user_id', $data->id)->first();
        if ($data) {
            $data->getOriginal();
        }

        if ($kelulusan && ($kelulusan->status == 1 || $kelulusan->status == 0)) {
            $kelulusan = $kelulusan->status;
            return view('dashboard.data_diri', compact('data', 'kelulusan'));
        } else {
            $kelulusan = null;
            return view('dashboard.data_diri', compact('data'));
        }
    }

    public function postData(DataDiriRequest $request)
    {
        $user = Auth::user();
        if ($user->data_diri()->exists()) {
            $message = 'data already exists';
            return redirect('/data_diri')->with('data_available', $message);
        }
        $data = $request->validated();

        $file = $request->file('pas_photo');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        Storage::disk('public')->put($filename, $file->get());
        $data['user_id'] = Auth::user()->id;
        $data['pas_photo'] = '/data_diri/' . $filename;
        $newData = new data_diri($data);
        $newData->save();

        $message = "Data berhasil disimpan";

        return redirect('/data_diri')->with('success', $message);
    }
}
