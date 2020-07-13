<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Album::all();

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

        Validator::make($request->all(), [
            'type' => 'required|max:255',
            'photo' => 'required',
            'photo.*' => 'image|mimes:pdf,jpeg,jpg,png,gif|max:10000',
        ])->validate();
        
        $kategori_id = $request->input('kategori_id');
        $user_id = $request->input('user_id');
        $type = $request->input('type');
        $photos = array();
        if($files = $request->file('photo'))
        {
            foreach($files as $file)
            {
                $name = Storage::disk('public')->putFile('album',$file, 'public'); 
                $photos[] = $name;  
            }
        }
        $data = new \App\Album();
        $data->kategori_id = $kategori_id;
        $data->user_id = $user_id;
        $data->type = $type;
        $data->photo = json_encode($photos);

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
        $data = \App\Album::where('id',$id)->get();

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

    public function type_keluarga()
    {
        $kode_id = Auth::guard('api')->user();
        //dd($kode_id);
        $kode_id = $kode_id->kode_id;
        $data = Album::where('type', 'keluarga')->whereHas('user', function($q) use($kode_id){
            $q->where('kode_id', $kode_id);
        })->get();

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
        $nama = $request->input('nama');

        $data = \App\Album::where('id',$id)->first();
        $data->nama = $nama;

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
        $data = \App\Album::where('id',$id)->first();

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
