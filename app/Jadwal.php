<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = [
    						'waktu',
                            'kelas',
    						'hari',
    						'program_id',
                            'pengajar_id'
    					];

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
