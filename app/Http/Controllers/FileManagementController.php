<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\File;

class FileManagementController extends Controller
{
    public function index($parent_id=null){
        $files = File::get();

        $folders = Folder::where('parent_id', $parent_id)->get()->sortBy("nama_folder");

        return view('Admin/ManajemenFile',[
            'parent_id'=>$parent_id,
            'tittle'=>'File Manajemen',
            'data'=>$folders,
            'files' => $files,
            'tittle'=>'upload'
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
    public function upload(Request $request){
        $this->validate($request, [
            'file'=>'required|mimes:docx,pdf,csv,xls,xlsx|max:10240',
            'keterangan'=>'required',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
    
        $nama_file = time()."_".$file->getClientOriginalName();
 
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

    public function unduh($id){
        return response()->download(public_path($id));
    }
}
