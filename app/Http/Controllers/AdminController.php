<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.home',
            [
        'tittle'=>'Admin',
        ]);
    }
    public function adminlogout(){
        Auth::logout();
        return redirect('/');
    }
}
