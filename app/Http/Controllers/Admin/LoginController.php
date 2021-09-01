<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
                'email' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string'],
            ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
           return response()->json([
               'message' => 'Logged in Successfully.'
           ], 201);
        }
        else{
            throw ValidationException::withMessages([
                'email' => 'Invalid Credentials'
            ]);
        }
    }
    
    public function logout()
    {
       if(auth()->check()){
        auth()->logout();
        return "Logged Out";
       }
    }
}
