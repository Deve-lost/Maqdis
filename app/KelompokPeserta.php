<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokPeserta extends Model
{
    protected $table = 'kelompok_peserta';
    protected $fillable = [
    						'peserta_id',
    						'user_id',
                            'status'
    					];
    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
