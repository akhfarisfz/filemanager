<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\folder_user;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('Register',[
            'tittle'=>'Register',
            // 'active'=>'register'    
        ]);
    }
    public function store(Request $request){
        $validatedData=$request->validate([
            'nama_user'=>'required',
            'password' => 'min:6|required_with:konfirm|same:konfirm',
            'konfirm' => 'min:6'
        ]);

        // Avatar
        $path='data_file/';
        $fontPath= public_path('font/Roboto-Black.ttf');
        $char1 =strtoupper($request->nama_user);
        $char=$char1[0];
        // dd($char);
        $newAvatarname =rand(12,34353).time().'_avatar.png';
        $dest = $path.$newAvatarname;

        $createAvatar =makeAvatar($fontPath,$dest,$char);
        $picture = $createAvatar == true? $newAvatarname:'';
        User::create([
            'nama_user'=>$request->nama_user,
            'nip'=>$request->nip,
            'alamat'=>$request->alamat,
            'unitkerja'=>$request->unitkerja,
            'email'=>$request->email,
            'telepon'=>$request->telepon,
            'role'=>'admin',
            'password'=>Hash::make($request->password),
            'picture'=>$picture
        ]);

        // $data_folder=Folder::where('parent_id',null)
        $request->session()->flash('success','Registrasi berhasil! Silahkan Login');
        
        return redirect('/');
    }
}
