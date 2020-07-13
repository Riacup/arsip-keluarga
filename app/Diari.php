<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diari extends Model
{
    protected $table = 'diari';
    
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
