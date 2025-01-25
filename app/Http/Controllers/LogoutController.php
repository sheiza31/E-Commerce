<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function Logout()  {
      if (Session::get('roles')=== 'admin') {
          Session::forget('admin_id');
          Session::forget('roles','admin');
      }
       return to_route('login');
    }
}
