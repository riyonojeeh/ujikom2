<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\role\RoleController;
use App\Http\Controllers\menu\MenuController;
use App\Http\Controllers\user\PasswordController;
use App\Http\Controllers\menu\SubmenuController;
use App\Http\Controllers\menu\SubsubmenuController;
use App\Http\Controllers\admin\DataMasyarakatController;
use App\Http\Controllers\admin\DataPetugasController;
use App\Http\Controllers\admin\PengaduanController;
use App\Http\Controllers\masyarakat\PengaduanMController;
use App\Http\Controllers\petugas\PengaduanPController;

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

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAdd'])->name('register');
Route::middleware(['login'])->group(function () {
    Route::resource('/login', AuthController::class);
    Route::resource('/', AuthController::class);
});

Route::resource('/password', PasswordController::class);
Route::get('/verify/{token}/{email}', [AuthController::class, 'verified']);

//Route Groups Kepala_ruangan

Route::middleware(['kepala_ruangan', 'user'])->group(function () {

    Route::resource('/data_masyarakat', DataMasyarakatController::class);
    Route::resource('/data_pengaduan', PengaduanController::class);
    Route::resource('/data_petugas', DataPetugasController::class);
    Route::resource('/menu', MenuController::class);
    Route::resource('/sub_menu', SubmenuController::class);
    Route::resource('/sub_sub_menu', SubsubmenuController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/user_verify', UserVerifyController::class);
    Route::get('/user_verify_role/{id}/{role}', [UserVerifyController::class, 'user_verify_role']);
    Route::post('/access', [RoleController::class, 'access'])->name('access');
    

});

//Route Groups User

Route::middleware(['user'])->group(function () {
   
    Route::resource('/user', UserController::class);
    Route::resource('/pengaduan_masyarakat', PengaduanMController::class);
    Route::resource('/pengaduan_baru', PengaduanPController::class);
    
});
