<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';

    public function profile()
    {
        return $this->hasOne('App\Profile', 'domisili_id');
    }
}
