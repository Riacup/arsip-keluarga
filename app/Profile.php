<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function domisili()
    {
        return $this->belongsTo('App\Provinsi', 'domisili_id');
    }
}
