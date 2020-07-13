<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriAlbum extends Model
{
    protected $table = 'kategori_album';

    protected $primaryKey = 'id_kategori';

    public function kategori_album()
    {
        return $this->hasMany('App\KategoriAlbum', 'kategori_id');
    }
}
