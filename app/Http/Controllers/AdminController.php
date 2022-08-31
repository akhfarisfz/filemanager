<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.home',
            [
        'tittle'=>'Admin',
        ]);
    }
    // public function adminlogout(){
    //     Auth::logout();
    //     return redirect()->intended('/');
    // }
}
