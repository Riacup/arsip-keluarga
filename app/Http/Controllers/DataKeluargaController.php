<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\Album;
use App\User;

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\KodeKeluarga::has('kode_user')->with('kode_user')->get();
        // dd($data->kode_keluarga);
        return view('dashboard_admin.keluarga', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kode)
    {
        $data = \App\User::with('profile')->where('kode_id', '=', $id_kode)->get();
        $dokumen = Dokumen::whereHas('user', function($q) use ($id_kode){
                    $q->where('kode_id', $id_kode)->where('type', 'keluarga');
                    })->count();
        $album = Album::whereHas('user', function($q) use ($id_kode){
                    $q->where('kode_id', $id_kode)->where('type', 'keluarga');
                    })->count();
        
        return view('dashboard_admin.detail_keluarga', compact('data','dokumen','album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted sucessfully'
        ]);
    }
}
