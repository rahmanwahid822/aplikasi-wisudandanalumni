<?php

use App\Models\User;
use App\Models\Datayudisium;
use App\Models\Datawisuda;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatawisudaController;
use App\Http\Controllers\IsiyudisiumController;
use App\Http\Controllers\DatayudisiumController;



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

Route::get('/dashboard/bukualumni', function (){
    return view('dashboard.bukualumni',[
        "judul" => "Buku Alumni"
    ]);
});

Route::get('/dashboard/tracerstudy', function(){
    return view ('dashboard.tracerstudy',[
        "judul" => "Tracer Study"
    ]);
});

Route::get('/dashboard/datayudisium',[DatayudisiumController::class, 'index'])->middleware('auth');
Route::get('/dashboard/daftaryudisium', [App\Http\Controllers\DatayudisiumController::class, 'index'])->name('datayudisium.index');
Route::post('/dashboard/daftaryudisium/store', [App\Http\Controllers\DatayudisiumController::class, 'store'])->name('datayudisium.store');
Route::put('/dashboard/daftaryudisium/{id}/update', [App\Http\Controllers\DatayudisiumController::class, 'update'])->name('datayudisium.update');


Route::get('/dashboard/datawisuda',[DatawisudaController::class, 'index'])->middleware('auth');
Route::get('/dashboard/daftarwisuda', [App\Http\Controllers\DatawisudaController::class, 'index'])->name('datawisuda.index');
Route::post('/dashboard/daftarwisuda/store', [App\Http\Controllers\DatawisudaController::class, 'store'])->name('datawisuda.store');
Route::put('/dashboard/daftarwisuda/{id}/update', [App\Http\Controllers\DatawisudaController::class, 'update'])->name('datawisuda.update');

// Route::get('/dashboard/isiyudisium' ,function () {
//     return view('dashboard.isiyudisium',[
//         "judul" => "isiyudisium"
//     ]);
// });
// Route::get('/dashboard/daftarwisuda' ,function () {
//     return view('dashboard.daftarwisuda',[
//         "judul" => "daftarwisuda"
//     ]);
// });
// Route::get('/dashboard/isiwisuda' ,function () {
//     return view('dashboard.isiwisuda',[
//         "judul" => "isiwisuda"
//     ]);
// });


// Route::get('/dashboard/datayudisium', function(User $user) {
//     return view('dashboard.datayudisium',[
//         'judul'=>'Data Yudisium',
//         'data' => $user->datayudisium,
//     ]);
// });


Route::get('/dashboard/profil',[ProfilController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autentikasi'] ); 
Route::post('/logout', [LoginController::class, 'logout'] );   

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth'); 