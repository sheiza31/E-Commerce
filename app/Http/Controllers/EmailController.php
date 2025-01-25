<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class EmailController extends Controller
{
   
    
    public function sendEmail(Request $request)
    {
        // Validasi inputan form
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

       
    
        // Kirim email dengan bagian body email
        Mail::to('mrxmr257@gmail.com')->send(new ContactMail($data));
    
        return back()->with('success', 'Message sent successfully!');
    }
    
}
