<?php

namespace App\Http\Controllers\panitia;

use App\Http\Controllers\Controller;
use App\Models\profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    protected $profil;
    public function __construct(profil $profil)
    {
        $this->profil = $profil;
    }

    public function index()
    {
        $profile = $this->profil->firstOrFail();

        return view('panitia.profil', compact('profile'));
    }

    public function store(Request $request)
    {
        $profile = $this->profil->firstOrFail();
        $dataId = $profile->id;
        try {
            // Find the profile by ID (assuming there is only one profile)
            $profile = $this->profil->findOrFail($dataId);

            // Update the profile attributes
            $profile->akreditasi = $request->akreditasi;
            $profile->visi = $request->visi;
            $profile->misi = json_encode($request->misi);

            // Save the updated profile
            $profile->save();

            return redirect('/profil')->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }
}
