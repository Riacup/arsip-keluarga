<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriDokumen extends Model
{
    protected $table = 'kategori_dokumen';

    protected $primaryKey = 'id_kategori';

    public function dokumen()
    {
        return $this->hasMany('App\Dokumen', 'kategori_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
