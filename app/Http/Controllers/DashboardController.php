<?php

namespace App\Http\Controllers;

use App\Models\DataMahasiswa;
use App\Models\Dosen;
use App\Models\JadwalBimbingan;
use App\Models\PengajuanBimbingan;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMahasiswa = DataMahasiswa::count();

        $jumlahDosen = Dosen::count();

        $jumlahJadwal = JadwalBimbingan::count();

        $jumlahPengajuan = PengajuanBimbingan::count();

        $jadwals = JadwalBimbingan::with([
            'mahasiswa',
            'dosen'
        ])
        ->orderBy('tanggal')
        ->orderBy('jam_mulai')
        ->take(5)
        ->get();

        $recentPengajuan = PengajuanBimbingan::with([
            'mahasiswa',
            'dosen'
        ])
        ->latest()
        ->take(5)
        ->get();

        return view('dashboard', compact(
            'jumlahMahasiswa',
            'jumlahDosen',
            'jumlahJadwal',
            'jumlahPengajuan',
            'jadwals',
            'recentPengajuan'
        ));
    }
}