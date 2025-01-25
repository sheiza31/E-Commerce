<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function Login(Request $request)  {

        $request->validate ([
            'username'=>'required',
            'password'=>'required',
        ]);
       
       $users = Users::where('username',$request->input('username'))
        ->where('password',$request->input('password'))
        ->first();

         if (!$users) {
            return back()->withErrors([
                'login_error'=>'Username atau Password Salah'
            ]);
        }
        if ($users->roles ==='admin') {
            Session::put('admin_id',$users->id);
            Session::put('username',$users->username);
            Session::put('roles','admin');
            return to_route('dashboard');
        }elseif ($users->roles === 'user') {
            Session::put('user_id',$users->id);
            Session::put('username',$users->username);
            Session::put('roles','user');
            return to_route('home');
        } 

       
    }
}
