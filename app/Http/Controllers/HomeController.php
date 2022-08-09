<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        
        
    }
    
    public function folder(){
    
        
        $directories = array_map('basename', Storage::directories('public'));
        // dd($directories[]);
        
        
        return view('Home',[
            "tittle"=> "Home"
        ]);
    }
    
    public function folder2(){
       
        return view('access',[
            "tittle"=> "Access Folder",
        ]);
    }
}
