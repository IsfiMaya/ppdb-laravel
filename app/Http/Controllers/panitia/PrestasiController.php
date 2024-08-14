<?php

namespace App\Http\Controllers\panitia;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrestasiRequest;
use App\Models\prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    protected $prestasi;
    public function __construct(prestasi $prestasi)
    {
        $this->prestasi = $prestasi;
    }

    public function index()
    {
        $data = prestasi::get();
        return view('panitia.prestasi', compact('data'));
    }

    public function store(PrestasiRequest $request)
    {
        $data = $request->validated();
        $prestasi = new prestasi($data);
        $prestasi->save();

        return redirect('/prestasi')->with('success', 'Berhasil Menambah Prestasi');
    }

    public function update(PrestasiRequest $request, $id)
    {
        $data = $request->validated();
        $newData = prestasi::findOrFail($id);
        $newData->update($data);
        return redirect('/prestasi')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $data = prestasi::findOrFail($id);
        $data->delete();

        return redirect('/prestasi')->with('success', 'Data berhasil dihapus');
    }
}
