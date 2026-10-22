<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\DataMahasiswa;
use App\Models\PengajuanBimbingan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
     public function index()
    {
        $pengajuans = PengajuanBimbingan::with([
            'mahasiswa',
            'dosen'
        ])->latest()->get();

        return view(
            'pengajuan.index',
            compact('pengajuans')
        );
    }

    public function ajukan()
    {
        $dosens = Dosen::all();

        return view(
            'pengajuan.ajukan',
            compact('dosens')
        );
    }

    public function riwayat()
    {
        $riwayats =
        PengajuanBimbingan::with([
            'dosen'
        ])
        ->latest()
        ->get();

        return view(
            'pengajuan.riwayat',
            compact('riwayats')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required',
            'topik' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'deskripsi' => 'required'
        ]);

        PengajuanBimbingan::create([
            'mahasiswa_id' => 1,
            'dosen_id' => $request->dosen_id,
            'topik' => $request->topik,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'deskripsi' => $request->deskripsi,
            'status' => 'Pending'
        ]);

        return redirect()
                ->route('pengajuan.riwayat')
                ->with(
                    'success',
                    'Pengajuan berhasil dikirim'
                );
    }

    public function edit($id)
    {
        $pengajuan = PengajuanBimbingan::findOrFail($id);

        $dosens = Dosen::all();

        return view('pengajuan.ajukan', compact(
            'pengajuan',
            'dosens'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dosen_id'=>'required',
            'topik'=>'required',
            'tanggal'=>'required',
            'waktu'=>'required',
            'deskripsi'=>'required'
        ]);

        $pengajuan = PengajuanBimbingan::findOrFail($id);

        $pengajuan->update([

            'dosen_id'=>$request->dosen_id,
            'topik'=>$request->topik,
            'tanggal'=>$request->tanggal,
            'waktu'=>$request->waktu,
            'deskripsi'=>$request->deskripsi

        ]);

        return redirect()
            ->route('pengajuan.riwayat')
            ->with('success','Data berhasil diubah.');
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanBimbingan::findOrFail($id);

        $pengajuan->delete();

        return redirect()
            ->route('pengajuan.riwayat')
            ->with('success','Data berhasil dihapus.');
    }
}
