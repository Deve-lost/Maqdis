<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $fillable = [
    						'nama',
    						'email',
    						'ttl',
    						'jk',
    						'kontak',
    						'alamat',
    						'avatar'
	    				];
    public function kelompokpeserta()
    {
        return $this->hasMany(KelompokPeserta::class);
    }
}
