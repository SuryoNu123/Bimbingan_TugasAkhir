<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanBimbingan extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'topik',
        'tanggal',
        'waktu',
        'deskripsi',
        'status',
        'jadwal_id'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(
            DataMahasiswa::class,
            'mahasiswa_id'
        );
    }

    public function dosen()
    {
        return $this->belongsTo(
            Dosen::class,
            'dosen_id'
        );
    }

    public function jadwal()
    {
        return $this->belongsTo(
            JadwalBimbingan::class,
            'jadwal_id'
        );
    }
}