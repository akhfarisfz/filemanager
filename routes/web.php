<?php

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

Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload/proses', [UploadController::class, 'proses_upload']);

Route::get('/home',[HomeController::class,'index']);


