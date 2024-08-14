<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\data_diri;
use App\Models\dayatampung;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravolt\Indonesia\Models\City;

class UserController extends Controller
{
    protected $pdf;

    public function __construct(PDF $pdf)
    {
        $this->pdf = $pdf;
    }

    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();

        if (User::where('username', $data['username'])->count() == 1) {
            return back()->with('error', 'Username anda sudah terdaftar');
        }

        $user = new User($data);
        $user->verifikasi = 0;
        $user->password = Hash::make($data['password']);
        $user->save();

        $data['user_id'] = $user->id;
        $file = $request->file('pas_photo');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        Storage::disk('public')->put($filename, $file->get());
        $data['pas_photo'] = '/data_diri/' . $filename;
        $data_diri = new data_diri($data);
        $data_diri->save();

        $pdfData = [
            'user' => $user,
            'data_diri' => $data_diri,
        ];

        $pdf = $this->pdf->loadView('pdf.registration', $pdfData);
        $pdfFileName = 'registration_' . $user->id . '.pdf';
        Storage::disk('pdf')->put($pdfFileName, $pdf->output());

        $pdfPath = Storage::disk('pdf')->path($pdfFileName);

        return redirect('/data_regis')->with('success', compact('user', 'data_diri', 'pdfPath'));
    }

    public function formRegistrasi()
    {
        $kota = City::pluck('name', 'id');
        $dayaTampung = DayaTampung::first();

        $pendaftaranPutraDitutup = ($dayaTampung->putra ?? 0) <= 0;
        $pendaftaranPutriDitutup = ($dayaTampung->putri ?? 0) <= 0;
        $pendaftaranDitutup = $pendaftaranPutraDitutup && $pendaftaranPutriDitutup;
    
        return view('layouts.auth.registration', compact('kota', 'dayaTampung', 'pendaftaranDitutup', 'pendaftaranPutraDitutup', 'pendaftaranPutriDitutup'));
    }
    public function login(UserLoginRequest $request)
    {
        if (empty($request['email']) || empty($request['password'])) {
            return back()->with('error', 'Silahkan isi dengan benar');
        }
        $data = $request->validated();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $request->session()->put('auth_time', time());
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'Email atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/masuk');
    }

    public function printRegistration($userId)
    {
        $user = User::findOrFail($userId);
        $data_diri = $user->data_diri;

        $pdfData = [
            'user' => $user,
            'data_diri' => $data_diri,
        ];

        $pdf = $this->pdf->loadView('pdf.registration', $pdfData);
        $pdfFileName = 'registration_' . $user->id . '.pdf';

        // Check if the file exists, if not, generate and save it
        if (!Storage::disk('pdf')->exists($pdfFileName)) {
            Storage::disk('pdf')->put($pdfFileName, $pdf->output());
        }

        // Stream the existing file
        return response()->file(Storage::disk('pdf')->path($pdfFileName));
    }

    public function updateVerification(Request $request, $id)
    {
        $request->validate([
            'is_verified' => 'nullable|boolean',
        ]);

        $dataDiri = User::findOrFail($id);
        $dataDiri->verifikasi = $request->has('is_verified');
        $dataDiri->save();

        return redirect()->back()->with('success', 'Status verifikasi berhasil diperbarui.');
    }
}
