<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Socialite;
use Str;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function github(){
            return Socialite::driver('github')->redirect();
    }

    public function githubRedirect(){

        $user = Socialite::driver('github')->user();

      

        $user= User::firstOrCreate([
            'email'=> $user->email
        ],[
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)),
            'type' => 'admin',
            'username'=> $user->nickname,
            'photo'=>$user->avatar,
            'contactno'=>'not set'
        ]);

        Auth::login($user,true);
        return redirect('/admin');
        
    }

    public function facebook(){
        return Socialite::driver('facebook')->redirect();
}

public function facebookRedirect(){

    $user = Socialite::driver('facebook')->user();

   

    $user= User::firstOrCreate([
        'email'=> $user->email
    ],[
        'name' => $user->name,
        'password' => Hash::make(Str::random(24)),
        'type' => 'admin',
        'username'=>'',
        'photo'=>'',
        'contactno'=>''
    ]);

    Auth::login($user,true);
    return redirect('/admin'); 
    
}

    public function redirectTo(){

        if(Auth::user()->type == 'admin'){

            return '/admin';
        }
        else if(Auth::user()->type == 'doctor'){
            return '/doctor';
        }

        
    }
}
