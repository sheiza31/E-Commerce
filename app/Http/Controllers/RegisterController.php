<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function Register(Request $request)  {
        
        $validated = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password'=>'required',
            'address'=>'required',
            'telp'=>'required',
            
        ]); 

        $users = Users::create($validated);
        return to_route('login');  
    }
}
