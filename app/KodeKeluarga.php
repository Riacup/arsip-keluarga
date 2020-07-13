<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeKeluarga extends Model
{
    protected $table = 'kode_keluarga';

    protected $primaryKey = 'id_kode';

    protected $fillable = [
        'kode', 
    ];

    public function kode_user()
    {
        return $this->hasMany('App\User', 'kode_id');
    }

}
