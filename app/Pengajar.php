<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = 'pengajar';
    protected $fillable = [
					        'user_id',
					        'nm_pengajar',
					        'pendidikan',
					        'kontak',
					        'jk',
					        'ttl',
					        'pengalaman_kerja',
					        'alamat',
					    ];
					    
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
