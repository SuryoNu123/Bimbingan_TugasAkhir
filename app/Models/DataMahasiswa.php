<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    protected $table = 'data_mahasiswas';

    protected $fillable = [
        'user_id',
        'npm',
        'nama',
        'prodi',
        'no_hp',
        'email'
    ];

    public function jadwalBimbingans()
    {
    return $this->hasMany(
        JadwalBimbingan::class,
        'mahasiswa_id'
        );
    }
}

