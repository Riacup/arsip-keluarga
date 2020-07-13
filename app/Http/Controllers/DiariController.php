<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DiariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Diari::all();

        // foreach ($variable as $key => $value) {
            
        // }

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['status'] = "Success!";
            $res['result'] = $data;
            return response($res);
        }
        else{
            $res['status'] = "Empty!";
            return response($res);
        }
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
        if(Auth::user()->status != 2){
            return response()->json([
                'success' => false,
                'error' => 'Your profile uncomplete.'
            ], 401);
        }

        $user_id = $request->input('user_id');
        $judul = $request->input('judul');
        $tanggal = $request->input('tanggal');
        $deskripsi = $request->input('deskripsi');

        $data = new \App\Diari();
        $data->user_id = $user_id;
        $data->judul = $judul;
        $data->tanggal = $tanggal;
        $data->deskripsi = $deskripsi;

        if($data->save()){
            $res['status'] = "Success!";
            $res['result'] = $data;
            return response($res);
        }
        else{
            $res['status'] = "Failed!";
            return response($res);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = \App\Diari::where('id',$id)->get();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['status'] = "Success!";
            $res['result'] = $data;
            return response($res);
        }
        else{
            $res['status'] = "Empty!";
            return response($res);
        }
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
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');

        $data = \App\Diari::where('id',$id)->first();
        $data->judul = $judul;
        $data->deskripsi = $deskripsi;

        if($data->save()){
            $res['status'] = "Success!";
            $res['result'] = $data;
            return response($res);
        }
        else{
            $res['status'] = "Failed!";
            return response($res);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = \App\Diari::where('id',$id)->first();

        if($data->delete()){
            $res['status'] = "Deleted Success!";
            $res['result'] = $data;
            return response($res);
        }
        else{
            $res['status'] = "Failed!";
            return response($res);
        }
    }
}
