<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokPeserta extends Model
{
    protected $table = 'kelompok_peserta';
    protected $fillable = [
    						'peserta_id',
    						'user_id'
    					];
}
