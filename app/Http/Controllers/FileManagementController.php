<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\User;
use App\Models\folder_user;

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
        $validatedData=$request->validate([
            'nama_folder'=>'required|unique:folders'
        ]);
        Folder::create([
            'nama_folder'=>$request->nama_folder,
            'parent_id'=>$parent_id
        ]);
        // $get_id_user=User::pluck('id');
        // $get_id=Folder::where('nama_folder',$request->nama_folder)->pluck('id');
        // foreach ($get_id as $folder ) {
        //     foreach ($get_id_user as $user) {
        //         folder_user::create([
        //             'folders_id'=>$folder,
        //             'users_id'=>$user, 
        //         ]);
        //     }
        // }
        return back();
    }
    public function hapusfolder($id ){
        $tabel_folder=Folder::find($id);
        folder_user::where('folders_id',$id)->delete($id);
        $tabel_folder->delete($id);

        return redirect()->back();
    }
    public function rename($id,Request $request){
        $namaBaru=$request->nama_folder;
        $tabel_folder=Folder::find($id);
        $tabel_folder->nama_folder=$namaBaru;
        $tabel_folder->save();
        
        return redirect()->back();
    }
}
