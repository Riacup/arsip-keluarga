<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriAlbum extends Model
{
    protected $table = 'kategori_album';

    protected $primaryKey = 'id_kategori';

    public function album()
    {
        return $this->hasMany('App\Album', 'kategori_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
