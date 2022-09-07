<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Usermanagement;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\FileManagementController;
use App\Http\Controllers\AdminUserManagementController;

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

Route::get('/home/{parent_id?}',[HomeController::class,'folder'])->middleware('auth');
Route::get('/logout',[HomeController::class,'logout'])->middleware('auth');

Route::get('/profil',function(){
    return view('Profil',[
        'tittle'=>'Profil'
    ]);
})->middleware('auth');


Route::post('/update',[ProfileController::class,'update']);





//ADMIN
//Admin
Route::get('/admin/home', [AdminController::class, 'index'])->middleware('auth');
//User
Route::get('/user/home', [UserController::class, 'index']);

Route::get('/usermanagement',[AdminUserManagementController::class,'index']);

Route::resource('/admin/usermanagement', AdminUserManagementController::class)->except('show')->middleware('auth');

Route::post('/ubahakses/{id_user}/update',[Usermanagement::class,'ubahakses']);



Route::get('/managementfile',[FileManagementController::class,'index']);

Route::get('/managementfile/{parent_id?}',[FileManagementController::class,'index']);
Route::post('/managementfile/{parent_id?}',[FileManagementController::class,'tambahfolder']);
Route::get('/managementfile/{parent_id?}',[FileManagementController::class,'getFolderData']);

Route::get('/managementfile/delete/{id}',[FileManagementController::class,'hapusfolder']);
Route::post('/managementfile/rename/{id}',[FileManagementController::class,'rename']);


<<<<<<< HEAD
Route::resource('/admin/usermanagement', AdminUserManagementController::class)->except('show')->middleware('auth');
// Route::resource('/admin/usermanagement', AdminUserManagementController::class,'akeses')->except('show')->middleware('auth');
// Route::get('/admin/')
=======
>>>>>>> 8054e97a369f57926ff7ac86d33cc88197447cd5
Route::get('/logout',[HomeController::class,'logout'])->middleware('auth');

Route :: get('/gate',[AuthorizationController::class,'index'])->name('gate.index')->middleware('can:isAdmin');


