<?php

namespace App\Http\Controllers;

use App\Models\JadwalBimbingan;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = JadwalBimbingan::with([
            'mahasiswa',
            'dosen'
        ])->get();

        return view('jadwal.index', compact('jadwals'));
    }
}
