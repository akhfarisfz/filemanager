<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login',[
            'tittle'=> 'Login'
        ]);
    }

    public function authenthicate(Request $request)
    {
        $credentials=$request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();                                                   
            return redirect()->intended('/home');
        }                        

        return back()->with('loginError','login Failed!');
    }
}
