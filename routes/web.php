<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WisudaController;
use App\Http\Controllers\IsiyudisiumController;
use App\Http\Controllers\YudisiumController;
use App\Http\Controllers\TracerStudyController;



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
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autentikasi']); 
Route::post('/logout', [LoginController::class, 'logout'] );   

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth'); 
Route::get('/profil',[ProfilController::class, 'index'])->middleware('auth');
Route::put('/profile/{id}',[ProfilController::class, 'update'])->middleware('auth');

Route::get('/yudisium',[YudisiumController::class, 'index'])->middleware('auth');
Route::post('/yudisium',[YudisiumController::class, 'store'])->middleware('auth');
Route::put('/yudisium/{id}',[YudisiumController::class, 'update'])->middleware('auth');

Route::get('/yudisium/validation/{id}',[YudisiumController::class, 'validation'])->middleware('auth');
Route::put('/yudisium/is_valid/{id}/{param}',[YudisiumController::class, 'is_valid'])->middleware('auth');

Route::get('/wisuda',[WisudaController::class, 'index'])->middleware('auth');
Route::post('/wisuda',[WisudaController::class, 'store'])->middleware('auth');
Route::put('/wisuda/{id}',[WisudaController::class, 'update'])->middleware('auth');

Route::get('/wisuda/validation/{id}',[WisudaController::class, 'validation'])->middleware('auth');
Route::put('/wisuda/is_valid/{id}/{param}',[WisudaController::class, 'is_valid'])->middleware('auth');

Route::get('/tracerstudy',[TracerStudyController::class, 'index'])->middleware('auth');
Route::put('/tracerstudy',[TracerStudyController::class, 'update'])->middleware('auth');