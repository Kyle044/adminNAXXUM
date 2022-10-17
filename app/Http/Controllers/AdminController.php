<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Isset_;

class AdminController extends Controller
{

    // Authentication
    public function login(Request $request)
    {

        if ($request->username && $request->password) {
            $user = Admin::where('username', '=', $request->username)->first();
            if ($user === null) {

                return response()->json(['data' => 'Invalid Credentials']);
            } else {

                if (Hash::check($request->password, $user->password)) {
                    return response()->json(['data' => $user, 'msg' => "Successfully Authenticated"]);
                } else {
                    return response()->json(['data' => 'Invalid Credentials']);
                }
            }
        } else {
            return response()->json(['data' => 'Kindly Fill up all the missing fields']);
        }
    }

    public function signup(Request $request)
    {
        if ($request->username && $request->password && $request->fullname && $request->contact && $request->email) {
            $user = Admin::where('username', '=', $request->username)->first();
            if ($user === null) {
                $id = DB::table('users')->insertGetId([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'full_name' =>  $request->fullname,
                    'contact_number' => $request->contact,
                    'email' => $request->email
                ]);
                return response()->json(['id' => $id]);
            } else {
                return response()->json(['data' => 'User Exists']);
            }
        } else {
            return response()->json(['data' => 'Kindly Fill up all the missing fields']);
        }
    }








    public function getAdmin()
    {
        $users = DB::table('users')->get();
        return response()->json(['data' => $users]);
    }
    public function searchAdmin(Request $request)
    {
    }




    public function deleteAdmin(Request $request)
    {
        $result =  DB::table('users')->where('id', '=', $request->id)->delete();
        return response()->json(['data' => $result]);
    }
}
