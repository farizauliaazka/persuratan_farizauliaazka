<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TblUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/dashboard')
        ->middleware(['auth', 'OnlyAdmin'])
        ->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/manage-user', [TblUserController::class, 'index'])->name('pengguna.index');
    Route::get('/manage-user/tambah', [TblUserController::class, 'tambah'])->name('pengguna.tambah');
    Route::get('/manage-user/edit', [TblUserController::class, 'edit'])->name('pengguna.edit');
});

Route::prefix('/auth')->group(function(){
    Route::get('/', [AuthController::class, 'index'])->name('login.formlogin');
    Route::post('/login', [AuthController::class, 'check']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('/')
});