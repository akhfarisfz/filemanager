<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        User::create([
            'nama_user'=>$request->nama_user,
            'nip'=>$request->nip,
            'alamat'=>$request->alamat,
            'unitkerja'=>$request->unitkerja,
            'email'=>$request->email,
            'telepon'=>$request->telepon,
            'password'=>Hash::make($request->password)
        ]);

        $request->session()->flash('success','Registrasi berhasil! Silahkan Login');
        
        return redirect('/');
    }
}
