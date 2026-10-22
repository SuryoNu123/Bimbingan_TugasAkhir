<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';

    protected $fillable = [
        'nip',
        'nama',
        'bidang_keahlian',
        'no_hp',
        'email'
    ];
}