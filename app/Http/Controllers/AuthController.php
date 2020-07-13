<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DataMemberReminder;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use App\User;
use App\KodeKeluarga;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
     /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'kode' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        if($request->exist == 0){
            $kode_keluarga = new KodeKeluarga;
            $kode_keluarga->kode = $request->kode;
            $kode_keluarga->save();
            
        }else {
            $kode_keluarga = KodeKeluarga::where('kode', $request->kode)->first();
        }
            
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'kode_id' => $kode_keluarga->id_kode,
            'password' => bcrypt($request->password)
        ]);
    
        $user->save();
        $user->assignRole('user');
        $status = "Successfully created user!";
        return response()->json([
            'status' => $status,
        ], 201);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'kode' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        if($request->exist == 0){
            $kode_keluarga = new KodeKeluarga;
            $kode_keluarga->kode = $request->kode;
            $kode_keluarga->save();
            
        }else {
            $kode_keluarga = KodeKeluarga::where('kode', $request->kode)->first();
        }
            
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'kode_id' => $kode_keluarga->id_kode,
            'password' => bcrypt($request->password)
        ]);

        $user->save();
        $user->assignRole('admin');
        $status = "Successfully created admin!";
        $data = Auth::user();
        return response()->json([
            'status' => $status,
        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        // dd("test");
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            //'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'status' => 'Unauthorized'
            ], 401);
        
        $user = Auth::user();
        if ($user->status == 0){
            return response()->json([
                'success' => false,
                'error' => 'Your account is deactivated.'
            ], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
             $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        $status = "Success";
        $data = Auth::user();
        return response()->json([
            'status' => $status,
            'data' => $data,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        $user = User::with('profile')->get();
        
        if(count($user) > 0){ //mengecek apakah data kosong atau tidak
            $res['status'] = "Success!";
            $res['result'] = $user;
            return response($res);
        }
        else{
            $res['status'] = "Empty!";
            return response($res);
        }
    }

    public function showUser($id)
    {
        $data = \App\User::with('profile')->where('id',$id)->get();

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

    public function editName(Request $request, $id)
    {
        $name = $request->input('name');

        $data = \App\User::where('id',$id)->first();
        $data->name = $request->name;

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
    public function editKode(Request $request, $id)
    {
        $data = \App\User::where('id',$id)->first();
        $keluarga = \App\KodeKeluarga::where('kode', $request->kode)->first();

        if($keluarga!==null){
            $data->kode_id = $keluarga->id_kode;
            $data->save();
            $res['status'] = "Success!";
            $res['result'] = $data;
            $keluargas = App\KodeKeluarga::doesntHave('kode_user')->delete();
            return response($res);
        }
        else{
            $keluarga = \App\KodeKeluarga::where('id_kode', $data->kode_id)->first();
            $keluarga->kode = $request->kode;
            $keluarga->save();
            $res['status'] = "Success!";
            $res['result'] = $data;
            return response($res);
        }
    }

    public function destroy($id)
    {
        $data = \App\KodeKeluarga::where('id_kode',$id)->first();

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

    public function updatePassword(Request $request, $id)
    {
        // $id = Auth::user()->id;
        // return  $id;
        $data = User::find($id);
        // dd($data);
        if(Hash::check($request->password_current, $data->password)){
            $data->password = Hash::make($request->password);
            $this->validate($request,
                [
                    'password_current' => 'required',
                    'password' => 'required|string|min:8|confirmed|max:191',
                    'password_confirmation' => 'required',
                ]);
            $data->save();
            return response()->json([
                'status' => 'success',
                'result' => $data
            ]);
        }
        else{
            return response()->json([
                'status' => 'Failed!',
                'message' => 'Incorrect current password.'
            ]);
        }
    }
}

