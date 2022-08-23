<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\AuthorizationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Usermanagement;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
//,[Usermanagement::class,'index']