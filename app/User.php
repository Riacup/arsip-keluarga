<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status','api_token', 'kode_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kode()
    {
        return $this->belongsTo('App\KodeKeluarga', 'kode_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile', 'user_id');
    }
    
    public function dokumen()
    {
        return $this->hasMany('App\Dokumen', 'user_id');
    }

    public function album()
    {
        return $this->hasMany('App\Album', 'user_id');
    }

    public function katdokumen()
    {
        return $this->hasMany('App\KategoriDokumen', 'user_id');
    }

    public function katalbum()
    {
        return $this->hasMany('App\KategoriAlbum', 'user_id');
    }

    public function diari()
    {
        return $this->hasMany('App\Diari', 'user_id');
    }

    public function keluarga()
    {
        return $this->hasMany('App\Keluarga', 'user_id');
    }
    

}
