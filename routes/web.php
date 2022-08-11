<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Login');
});

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'authenthicate']);

Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'store']);

Route::get('/file', [FileController::class, 'index']);
Route::post('/file/upload',[FileController::class, 'upload']);
Route::get('/file/hapus/{id}',[FileController::class, 'hapus']);
Route::get('/file/unduh/{id}',[FileController::class, 'unduh']);

Route::get('/fileHome', [FileController::class, 'index']);

Route::get('/home',function(){
    return view('Home',[
        'tittle'=>'Home'
    ]);
})->middleware('auth');

Route::get('/profil',function(){
    return view('Profil',[
        'tittle'=>'Profil'
    ]);
})->middleware('auth');


