<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $fillable = [
    						'nm_program',
    						'deskripsi'
    					];
    public function jadwal()
    {
    	return $this->belongsTo(Jadwal::class);
    }

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }
}
