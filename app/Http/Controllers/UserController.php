<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\User;
use Spatie\Permission\Models\Permission;
use DB;

class UserController extends Controller
{
    //
        // public function index()
        // {
        //     $user = User::all();

        //     return response()->json( $user, 200);
        //     $users = User::join('status', 'id_status', '=', 'users.status')
        //         ->select('users.', 'status.')
        //         ->getQuery()
        //         ->get();

        //     return response()->json( $users, 200);
        // }

        // public function create()
        // {
        //     //
        // }

        // public function store(Request $request)
        // {
        //     $this->validate($request, [
        //         'nik'      => 'required',
        //         'email'     => 'required',
        //         'password'  => 'required',
        //         'api_token' => 'required',
        //         //'status'    => 'required',
        //     ]);
            
        //     $this->validate($request, [
        //         'name' => 'required',
        //         'email' => 'required',
        //         'password' => 'required',
        //         'api_token' => 'required',
        //         //'status' => 'required',
        //         'statusUser' => 'required',
        //         'role' => 'required',
        //     ]);

        //     $users = User::create($request->all());

        //     $result = array(
        //         'message' => "Data Added",
        //         'data' => $users,
        //     );

        //     $useremail = User::select('email')
        //         ->getQuery()
        //         ->get();

        //     $user = User::select('name')
        //         ->getQuery()
        //         ->get();

        //     Mail::to($useremail)->send(new DataMemberReminder($user));

        //     return response()->json($result, 201);
        // }

        // public function update(Request $request, $id)
        // {
        //     $users = User::findOrFail($id);
        //     if ($users == null) {
        //         $code = 404;
        //         $result = array(
        //             'message' => "No data found",
        //         );
        //     } else {
        //         $users->update($request->all());
        //         $code = 200;
        //         $result = array(
        //             'message' => "Update Berhasil",
        //             'data' => $users,
        //         );
        //     }

        //     return response()->json($result, $code);
        // }

        // public function destroy($id)
        // {
        //     //
        //     $m = "Sorry, please try again";
        //     $data = User::find($id);
        //     if ($data->delete()) {
        //         $m = "Delete Successfully";
        //     }
        //     $result = array(
        //         'message' => $m,
        //     );

        //     return response()->json($result, 200);
        //     $msg = "Internal Server Error...";
        //     $code = 500;
        //     $data = User::find($id);
        //     if ($data->delete()) {
        //         $msg = "Data Berhasil Dihapus";
        //         $code = 200;
        //     }
        //     $result = array(
        //         'message' => $msg,
        //     );

        //     return response()->json($result, $code);
        // }

        // public function addPermission(Request $request)
        // {
        //     //
        // }

        // public function setRolePermission(Request $request, $role)
        // {
        //     //
        // }

        // public function roles(Request $request, $id)
        // {
        //     //
        // }

        // public function setRole(Request $request, $id)
        // {
        //     //
        // }
}
