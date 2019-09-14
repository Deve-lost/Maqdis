<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillabel = [
    						'user_id',
    						'pengajar_id',
    						'tgl_kegiatan',
    						'absensi',
    						'status'
    					];
}
