<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';

    protected $primaryKey = 'id';

    public function keluarga()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
