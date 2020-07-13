<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
    ], function () {
        Route::post('login', 'AuthController@login');
        Route::post('signup/user', 'AuthController@signup');
        Route::post('signup/admin', 'AuthController@register');
        Route::post('update/name/{id}', 'AuthController@editName');
        Route::post('update/kode/{id}', 'AuthController@editKode');
        Route::post('delete/kode/{id}', 'AuthController@destroy');
        Route::post('update/password/{id}', 'AuthController@updatePassword');
        // Route::get('coba','AuthController@updatePassword');

        Route::group([
        'middleware' => 'auth:api'
        ], function() {
            Route::get('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
            Route::get('user/{id}', 'AuthController@showUser');
            
        });
});

Route::get('/dokumen/typekeluarga','DokumenController@type_keluarga');
Route::get('/album/typekeluarga','AlbumController@type_keluarga');

Route::middleware('auth:api')->group(function(){
    /*Modul Profile User*/
    Route::get('/profile','ProfileController@index');
    Route::get('/profile/{id}','ProfileController@show');
    Route::post('/profile/store','ProfileController@store');
    Route::post('/profile/update/{id}','ProfileController@update');
    Route::post('/profile/delete/{id}','ProfileController@destroy');

    /*Modul Diari*/
    Route::get('/diari','DiariController@index');
    Route::get('/diari/{id}','DiariController@show');
    Route::post('/diari/store','DiariController@store');
    Route::post('/diari/update/{id}','DiariController@update');
    Route::post('/diari/delete/{id}','DiariController@destroy');

    /*Modul Keluarga*/
    Route::get('/keluarga','KeluargaController@index');
    Route::get('/keluarga/{id}','KeluargaController@show');
    Route::post('/keluarga/store','KeluargaController@store');
    Route::post('/keluarga/update/{id}','KeluargaController@update');
    Route::post('/keluarga/delete/{id}','KeluargaController@destroy');

    /*Modul Kategori Dokumen*/
    Route::get('/dokumen/kategori','KategoriDokumenController@index');
    Route::get('/dokumen/kategori/{id}','KategoriDokumenController@show');
    Route::post('/dokumen/kategori/store','KategoriDokumenController@store');
    Route::post('/dokumen/kategori/update/{id}','KategoriDokumenController@update');
    Route::post('/dokumen/kategori/delete/{id}','KategoriDokumenController@destroy');

    /*Modul Dokumen*/
    Route::get('/dokumen','DokumenController@index');
    Route::get('/dokumen/{id}','DokumenController@show');
    //Route::get('/dokumen/typekeluarga','DokumenController@type_keluarga');
    Route::post('/dokumen/store','DokumenController@store');
    Route::post('/dokumen/update/{id}','DokumenController@update');
    Route::post('/dokumen/delete/{id}','DokumenController@destroy');

    /*Modul Kategori Album*/
    Route::get('/album/kategori','KategoriAlbumController@index');
    Route::get('/album/kategori/{id}','KategoriAlbumController@show');
    Route::post('/album/kategori/store','KategoriAlbumController@store');
    Route::post('/album/kategori/update/{id}','KategoriAlbumController@update');
    Route::post('/album/kategori/delete/{id}','KategoriAlbumController@destroy');

    /*Modul Album*/
    Route::get('/album','AlbumController@index');
    Route::get('/album/{id}','AlbumController@show');
    //Route::get('/album/typekeluarga','AlbumController@type_keluarga');
    Route::post('/album/store','AlbumController@store');
    Route::post('/album/update/{id}','AlbumController@update');
    Route::post('/album/delete/{id}','AlbumController@destroy');  
});

      
