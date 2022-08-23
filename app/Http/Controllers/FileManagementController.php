<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FileManagementController extends Controller
{
    public function index($parent_id=null){
        $folders = Folder::where('parent_id', $parent_id)->get()->sortBy("id");

        return view('Admin/ManajemenFile',[
            'parent_id'=>$parent_id,
            'tittle'=>'File Manajemen',
            'data'=>$folders
            ]);
    }
    public function tambahfolder($parent_id=null , Request $request){
        Folder::create([
            'nama_folder'=>$request->nama_folder,
            'parent_id'=>$parent_id
        ]);        
        return back();
    }
}
