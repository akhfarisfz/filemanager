<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class UploadController extends Controller
{
    public function index(){
        $files = Upload::get();
        return view('Uploadfile', ['files' => $files]);
    }

    public function upload(Request $request){
        $this->validate($request, [
            'file'=>'required|file|mimes:docx,pdf,csv,xls,xlsx|max:10240',
            'keterangan'=>'required',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
    
        $nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
    
    
        Upload::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->back();
    }

    public function hapus($id){
        $post = Upload::find($id);
        $post->delete();
        
        return redirect()->back();
    }
}
