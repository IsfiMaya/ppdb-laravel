<?php

namespace App\Http\Controllers\panitia;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $userAdmin;
    public function __construct(User $user)
    {
        $this->userAdmin = $user;
    }
    public function index($id)
    {
        $data = $this->userAdmin->findOrFail($id);
        // dd($data);
        return view('panitia.admin', compact('data'));
    }

    public function getAllAdmin()
    {
        $data = $this->userAdmin->where('role', 'admin')->get();
        return view('panitia.kelola_admin', compact('data'));
    }

    public function tambah_admin(AdminRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $data['role'] = 'admin';
        $data['asal_sekolah'] = 'admin';
        $data['verifikasi'] = 0;
        $newData = new User($data);
        $newData->password = Hash::make($newData['password']);
        $newData->save();

        $message = "Data berhasil disimpan";

        return redirect('/data_admin')->with('success', $message);
    }

    public function edit_admin(AdminRequest $request, $id)
    {
        $data = $request->validated();
        $admin = User::findOrFail($id);
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $admin->update($data);

        return redirect()->route('data_admin', ['id' => $admin->id])
            ->with('success', 'Data berhasil diubah');
    }

    public function delete_admin(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect('/data_admin')->with('success', 'Data berhasil dihapus');
    }
}
