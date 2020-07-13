<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function kat_dokumen()
    {
        return $this->belongsTo('App\KategoriDokumen', 'kategori_id');
    }
}
