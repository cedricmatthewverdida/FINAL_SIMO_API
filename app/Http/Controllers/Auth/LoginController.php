<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{
    public function login(Request $request){
        if(!auth()->attempt($request->only('email','password'))){
            throw new AuthenticationException();
        }
    }
}
