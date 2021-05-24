<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class authController extends Controller
{
    public function login(){

        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function postlogin(Request $request){
    
       if(Auth::attempt($request->only('username','password'))){
           return redirect('/dashboard');
       }
       else{
           return redirect('/login');
       }
    }
}
