<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm(){
        return view('backend.auth.login');
    }
    public function login(LoginUserRequest $request){
        // dd($request);
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('posts.index');
        }
        $errorMessage = 'Invalid login credentials.'; // Generic message for non-email errors

        return redirect()->back()->withErrors([
        'email' => $errorMessage,
    ])->withInput($request->only('email', 'password'));
    }
    
    public function logout(){
        // dd($request);
        Auth::logout();
        return redirect()->route('login');        
    }
}
