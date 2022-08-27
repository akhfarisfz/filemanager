<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FileManagementController extends Controller
{
    public function index($parent_id=null){
        $folders = Folder::where('parent_id', $parent_id)->get()->sortBy("nama_folder");

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
    public function hapusfolder($id ){
        $coba=Folder::find($id);
        $coba->delete($id);

        return redirect()->back();
    }
    public function rename($id,Request $request){
        $namaBaru=$request->nama_folder;
        $coba=Folder::find($id);
        $coba->nama_folder=$namaBaru;
        $coba->save();
        return redirect()->back();
    }
}
