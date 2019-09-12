<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = [
        'nm_peserta',
        'jml_org',
        'nm_pengajar',
        'nm_program',
        'hari',
        'waktu',
        'kelas',
        'harga',
        'total_bayar'
    ];
}
