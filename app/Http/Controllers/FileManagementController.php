<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\User;
use App\Models\folder_user;
use App\Models\File;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FileManagementController extends Controller
{
    public function index($parent_id=null){
        $folders = Folder::where('parent_id', $parent_id)->get()->sortBy("nama_folder");
        $files = File::get();

        return view('Admin/ManajemenFile',[
            'parent_id'=>$parent_id,
            'tittle'=>'File Manajemen',
            'data'=>$folders,
            'files' => $files
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
        return back();
    }
    public function hapusfolder($id){
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
    public function hapusFile($id){
        $post = File::find($id);
        $post->delete();
        
        return redirect()->back();
    }
    public function getFolderData($id=0){
        if($id==0){ 
            $folders = Folder::orderby('id','asc')->select('*')->get(); 
         }else{   
            $folders = Folder::select('*')->where('id', $id)->get(); 
         }
         // Fetch all records
         $folderData['data'] = $folders;
    
         echo json_encode($folderData);
         exit;
        // $where = array('id' => $id);
        // $folder = Folder::where($where)->first();

        // return response()->json($folder);
    }
}