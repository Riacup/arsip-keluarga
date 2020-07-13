<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function kat_album()
    {
        return $this->belongsTo('App\KategoriAlbum', 'kategori_id');
    }
}
