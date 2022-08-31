<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Illuminate\Foundation\Auth\User;

class Usermanagement extends Controller
{
    public function tampil(){
        $users = User::all();
        $tampil = folder_user::table('tampil')
        ->leftjoin('User', 'folder_user.users_id', '=', 'User.id')
        ->leftjoin('Folder', 'folder_user.folders_id', '=', 'Folder.id')
        // ->where('users.id', 3)
        // ->where('shares.user_id', 'followers.follower_id'
        ->get();
        dd($tampil);
        
    }
}
