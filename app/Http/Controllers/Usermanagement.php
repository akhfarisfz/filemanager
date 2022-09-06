<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder;
use App\Models\Folder_user;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;

class Usermanagement extends Controller
{
    public function ubahakses( $id_user=null,Request $request ){
        //  dd( $request->folder);
        $id_folders=$request->folder;
        $folder_tahun=Folder::where('parent_id',null)->get('id');
            // foreach ($folder_tahun as $id_folder_tahun ) {
            //     if(folder_user::where('folders_id',$id_folder_tahun->id)->exists()){
            //         $mesage='Ada Folder Tahunnya';
            //     }
            //     else{
            //     $mesage='Ga ada Folder Tahunnya';
            //     folder_user::create([
            //                 'folders_id'=>$id_folder_tahun->id,
            //                 'users_id'=>$id_user,
            //                 'isAllowed'=>1
            //             ]);
            //         }
                
            // }
        foreach ($id_folders as $id_folder) {
            if(!folder_user::where('users_id',$id_user)->where('folders_id',$id_folder)->exists()){
                folder_user::create([
                    'folders_id'=>$id_folder,
                    'users_id'=>$id_user
                ]);
            }
        }
        $get_id_from_model = DB::table('folder_users')
        ->join('folders', 'folder_users.folders_id', '=', 'folders.id')
        ->where('users_id',$id_user)
        ->whereNotNUll('parent_id')
        ->get();

        foreach ($get_id_from_model  as $id_folder_model ) {
            folder_user::where('folders_id',$id_folder_model->folders_id)
            ->where('users_id',$id_user)
            ->update(['isAllowed'=>false]);
        }
        foreach ($id_folders as $id_folder ) {
            folder_user::where('folders_id',$id_folder_model->folders_id)
            ->where('users_id',$id_user)
            ->update(['isAllowed'=>true]);
        }

        
        
        // echo "<pre>";
        // // int_r($id_folders);
        // // Assign centang -> true
        //     if($id_folder_model->folders_id==$id_folder ){ 
        //         if($id_folder_model->isAllowed==false){
                    
        //         }  //UNCHECK
        //         }
                
                // else {
                //     if($id_folder_model->isAllowed==true ){
                //             // echo "Sebelum cek dengan id folder \n";
                //             // print_r($id_folder_model->folders_id);
                //             // echo "<br>";
                //             // print_r($id_folder);
                //             // echo "\n";
                //             folder_user::where('folders_id',$id_folder_model->folders_id)
                //             ->where('users_id',$id_user)
                //             ->where('isAllowed',true)
                //             ->update(['isAllowed'=>false]);
                //         }
                // }
            // echo "</pre>";

        

        return redirect()->back();
    }
    public function update(Request $request){
        $user = folder_user::find($request->user_id);
        // $user->isAllowed = $request->isAllowed;
        $user->save();
        dd($request->all());
  
        return response()->json(['success'=>'Status change successfully.']);

        
        // return new PostResource(true,"success",array([$id_user,$id_folder,$isAllow]));
    }
}