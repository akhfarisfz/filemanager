<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    
    public function folder($parent_id=null){
        
        $folders = Folder::where('parent_id', $parent_id)->get()->sortBy("nama_folder");
        $tampil = DB::table('folder_users')
              ->join('users', 'folder_users.users_id', '=', 'users.id')
              ->join('folders', 'folder_users.folders_id', '=', 'folders.id')
              ->where('parent_id', $parent_id)
              ->where('users.id',auth()->User()->id )
              ->where('isAllowed',1)
              ->get()->sortBy("nama_folder");
// dd($tampil);
        return view('Home',[
            'parent_id'=>$parent_id,
            'tittle'=>"Home",
            'data'=>$folders,
            'data_akses'=>$tampil
            ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
