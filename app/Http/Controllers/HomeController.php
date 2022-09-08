<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class HomeController extends Controller
{
    
    public function folder($parent_id=null){
        
        $files = File::get();
        $folders = Folder::where('parent_id', $parent_id)->get()->sortBy("nama_folder");
        $tampil = DB::table('folder_users')
              ->join('users', 'folder_users.users_id', '=', 'users.id')
              ->join('folders', 'folder_users.folders_id', '=', 'folders.id')
              ->where('parent_id', $parent_id)
              ->where('users.id',auth()->User()->id )
              ->where('isAllowed',1)
              ->get()->sortBy("nama_folder");
              
        return view('Home',[
            'parent_id'=>$parent_id,
            'tittle'=>"Home",
            'data'=>$folders,
            'data_akses'=>$tampil,
            'files' => $files
            ]);
    }
    public function upload(Request $request){
        $this->validate($request, [
            'file'=>'required|mimes:docx,pdf,csv,xls,xlsx|max:10240',
            'keterangan'=>'required',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
    
        $nama_file = $file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload 
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
    
        File::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->back();
    }

    public function hapus($id){
        $post = File::find($id);
        $post->delete();
        
        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
