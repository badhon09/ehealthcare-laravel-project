<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view('login.index');
    }
    function postlogin(Request $request){

        request()->validate([
            'email' => 'required',
            'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {

                if(Auth::attempt(['role_id' == 1]){
                    return redirect()->route('admin.dashboard');
                }
                else if(Auth::check()->role_id=2){
                    return redirect()->route('doctorhome');
                }
                
            }
    }
}
