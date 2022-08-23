<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Usermanagement;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FileManagementController;

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

Route::get('/home',[HomeController::class,'folder'])->middleware('auth');

Route::get('/folder',[HomeController::class,'folder2'])->middleware('auth');

Route::get('/profil',function(){
    return view('Profil',[
        'tittle'=>'Profil'
    ]);
})->middleware('auth');



//Admin
Route::get('/admin',function(){
    return view('Admin.Home',[
        'tittle'=>'AdminHome'
    ]);
});

Route::get('/usermanagement',function(){
    return view('Admin/Usermanagement',[
        'tittle'=>'User',
    ]);
});


Route::get('/managementfile',[FileManagementController::class,'index']);

Route::get('/Files/{parent_id?}',[FileManagementController::class,'index']);
Route::post('/Files/{parent_id?}',[FileManagementController::class,'tambahfolder']);

