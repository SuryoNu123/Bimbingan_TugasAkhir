<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalBimbingan extends Model
{
    protected $table = 'jadwal_bimbingans';

    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'topik',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'tempat',
        'status'
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
}
