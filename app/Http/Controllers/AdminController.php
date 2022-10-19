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

    public function updateAdmin(Request $request)
    {

        if ($request->id && $request->username && $request->password && $request->full_name && $request->contact_number && $request->email) {
            DB::table('users')
                ->where('id', $request->id)
                ->update([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'full_name' =>  $request->full_name,
                    'contact_number' => $request->contact_number,
                    'email' => $request->email
                ]);
            return response()->json(['data' => 'Sucessfully Updated']);
        } else {
            return response()->json(['data' => 'Kindly Fill up all the missing fields']);
        }
    }

    public function deleteAdmin(Request $request)
    {
        $result =  DB::table('users')->where('id', '=', $request->id)->delete();
        return response()->json(['data' => $result]);
    }









    // Admin Portal...

    public function loginWeb()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if ($request->username && $request->password) {
            $user = Admin::where('username', '=', $request->username)->first();
            if ($user === null) {

                return response()->json(['data' => 'Invalid Credentials', 'boolean' => false]);
            } else {

                if (Hash::check($request->password, $user->password)) {
                    session(['username' => $user->username]);
                    session(['fullname' => $user->full_name]);
                    return response()->json(['data' => $user, 'msg' => "Successfully Authenticated", 'boolean' => true]);
                } else {
                    return response()->json(['data' => 'Invalid Credentials', 'boolean' => false]);
                }
            }
        } else {
            return response()->json(['data' => 'Kindly Fill up all the missing fields', 'boolean' => false]);
        }
    }

    public function getAdminWeb()
    {
        if (session()->has('fullname')) {
            $users = DB::table('users')->get();
            return view('admin', ['admin' => $users]);
        } else {
            return view('login');
        }
    }
    public function logout()
    {
        session()->flush();
        return response()->json(['msg' => 'Successfully Logged Out!', 'boolean' => true]);
    }

    public function createAdmin(Request $request)
    {
        if ($request->username && $request->password && $request->full_name && $request->contact_number && $request->email) {
            $user = Admin::where('username', '=', $request->username)->first();
            if ($user === null) {
                $id = DB::table('users')->insertGetId([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'full_name' =>  $request->full_name,
                    'contact_number' => $request->contact_number,
                    'email' => $request->email
                ]);
                return response()->json(['data' => $id, 'boolean' => true, 'msg' => "Successfully Created"]);
            } else {
                return response()->json(['msg' => 'User Exists', 'boolean' => false]);
            }
        } else {
            return response()->json(['msg' => 'Kindly Fill up all the missing fields', 'boolean' => false]);
        }
    }
    public function updateAdminWeb(Request $request)
    {
        if ($request->id && $request->username && $request->password && $request->full_name && $request->contact_number && $request->email) {
            DB::table('users')
                ->where('id', $request->id)
                ->update([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'full_name' =>  $request->full_name,
                    'contact_number' => $request->contact_number,
                    'email' => $request->email
                ]);
            return response()->json(['msg' => 'Sucessfully Updated', 'boolean' => true]);
        } else {
            return response()->json(['msg' => 'Kindly Fill up all the missing fields', 'boolean' => false]);
        }
    }

    public function deleteAdminWeb(Request $request)
    {
        error_log($request->id);
        if ($request->id) {
            $result =  DB::table('users')->where('id', '=', $request->id)->delete();
            return response()->json(['data' => $result, 'boolean' => true, 'msg' => 'Successfully Deleted']);
        } else {
            return response()->json(['msg' => 'Error Occured', 'boolean' => false]);
        }
    }
}
