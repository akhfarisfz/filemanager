<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function index(){
        $files = File::get();
        return view('File', [
            'files' => $files,
        'tittle'=>'upload']);
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
