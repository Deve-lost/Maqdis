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
					        'avatar'
					    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
