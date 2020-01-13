<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'npm', 'name', 'email', 'tempat_lahir', 'tanggal_lahir', 'jurusan',
    ];
}
