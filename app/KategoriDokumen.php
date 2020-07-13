<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriDokumen extends Model
{
    protected $table = 'kategori_dokumen';

    protected $primaryKey = 'id_kategori';

    public function kategori_dokumen()
    {
        return $this->hasMany('App\KategoriDokumen', 'kategori_id');
    }
}
