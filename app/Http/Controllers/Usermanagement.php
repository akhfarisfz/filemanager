<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Illuminate\Foundation\Auth\User;

class Usermanagement extends Controller
{
    public function index(){
        $users = User::all();
        // return $users->toArray();
    }
}
