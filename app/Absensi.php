<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = [
    						'user_id',
    						'nm_pengajar',
    						'tgl_kegiatan',
    						'absensi',
    						'status'
    					];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
