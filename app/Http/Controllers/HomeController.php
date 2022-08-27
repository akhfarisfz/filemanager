<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function folder($parent_id=null){
        $folders = Folder::where('parent_id', $parent_id)->get()->sortBy("nama_folder");

        return view('Home',[
            'parent_id'=>$parent_id,
            'tittle'=>"Home",
            'data'=>$folders
            ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
