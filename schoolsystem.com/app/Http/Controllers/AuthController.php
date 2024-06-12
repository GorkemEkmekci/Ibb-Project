<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        //dd(Hash::make(123456));
        if (!empty(Auth::check())){
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    }
    public function AuthLogin(Request $request){
        $remember =!empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
            return redirect('admin/dashboard');
        }
        else
        {
            return redirect()->back()->with('error', 'Email Or Password Incorrect');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
}
