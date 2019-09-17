<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiayaPendidikan extends Model
{
    protected $table = 'biaya_pendidikan';
    protected $fillable = [
        'jml_peserta',
        'dekat',
        'jauh_malam',
        'jauhdanmalam'
    ];
}
