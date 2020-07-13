<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dokumen;
use App\Album;
use App\Diari;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\User::with('profile')->get();
        return view('dashboard_admin.pengguna', compact('data'));
    }

    public function changeStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $status = $user->status == 1? 0 : 1;
        $user->status = $status;
        $user->save();

        return response()->json(['success'=>'status change succsessfully']);
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
    public function show($id)
    {
        $data = \App\Profile::with('user', 'domisili')->where('user_id', '=', $id)->get();
        $dokumen = Dokumen::where('user_id',$id)->where('type', 'pribadi')->count();
        $album = Album::where('user_id',$id)->where('type', 'pribadi')->count();
        $diari = Diari::where('user_id',$id)->count();

        return view('dashboard_admin.detail_pengguna', compact('data', 'dokumen', 'album', 'diari'));
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
