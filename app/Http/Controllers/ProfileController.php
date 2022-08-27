<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request){
        $this->validate($request,[
            'image'=> 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        $fail = $request->file('image')->getClientOriginalName();
        $file = $request->file('image');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'data_file/';
        $file->move($tujuan_upload,$nama_file);

        // $gambarInput=$request->file('image');
        // $img=User::make();
        // $img->resize(200,200,function($constraint){
        //     $constraint->aspectRatio();x
        // })->save($tujuan_upload."/".$nama_file);
        // dd($img);

        // SaveImage
        $User=User::find($request->User()->id);
        $User->picture=$fail;

        $User->save();

    return redirect()->back();
    }
}
