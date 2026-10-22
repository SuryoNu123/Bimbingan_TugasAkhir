<?php

namespace App\Http\Controllers;
use App\Models\DataMahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = DataMahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:data_mahasiswas,npm',
            'nama' => 'required',
            'prodi' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:data_mahasiswas,email'
        ]);

        DataMahasiswa::create([
            'user_id' => 1, 
            'npm'     => $request->npm,
            'nama'    => $request->nama,
            'prodi'   => $request->prodi,
            'no_hp'   => $request->no_hp,
            'email'   => $request->email
        ]);

        return redirect()
                ->route('mahasiswa.index')
                ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mahasiswa = DataMahasiswa::findOrFail($id);

        return view('mahasiswa.create', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npm'=>'required',
            'nama'=>'required',
            'prodi'=>'required',
            'no_hp'=>'required',
            'email'=>'required|email'
        ]);

        $mahasiswa = DataMahasiswa::findOrFail($id);

        $mahasiswa->update([

            'npm'=>$request->npm,
            'nama'=>$request->nama,
            'prodi'=>$request->prodi,
            'no_hp'=>$request->no_hp,
            'email'=>$request->email

        ]);

        return redirect()->route('mahasiswa.index')
                ->with('success','Data mahasiswa berhasil diubah.');
    }

    public function destroy($id)
    {
        DataMahasiswa::findOrFail($id)->delete();

        return redirect()->route('mahasiswa.index')
                ->with('success','Data mahasiswa berhasil dihapus.');
    }
    
}
