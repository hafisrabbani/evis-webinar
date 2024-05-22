<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|size:10|unique:mahasiswas,nim',
            'nama' => 'required|string|max:50',
            'fakultas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
        ]);
        if(Mahasiswa::create($data)) {
            return redirect()->back()->with('success', 'Data mahasiswa berhasil disimpan');
        }
        return redirect()->back()->with('error', 'Data mahasiswa gagal disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nim' => 'required|size:10|unique:mahasiswas,nim,'.$id,
            'nama' => 'required|string|max:50',
            'fakultas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
        ]);
        $mahasiswa = Mahasiswa::findOrFail($id);
        if($mahasiswa->update($data)) {
            return redirect()->back()->with('success', 'Data mahasiswa berhasil diubah');
        }
        return redirect()->back()->with('error', 'Data mahasiswa gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        if($mahasiswa->delete()) {
            return redirect()->back()->with('success', 'Data mahasiswa berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Data mahasiswa gagal dihapus');
    }
}
