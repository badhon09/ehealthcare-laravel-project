<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view('login.index');
    }

    public function logoutx()
    {
        Auth::logout();

        return redirect()->route('login');
    }


    function postlogin(Request $request){

        request()->validate([
            'email' => 'required',
            'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {

                $user = Auth::user();

                
              
                
            }
    }
}
