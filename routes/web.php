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
    //Manajemen User
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/manage-user', [TblUserController::class, 'index'])->name('pengguna.index');
    Route::get('/manage-user/tambah', [TblUserController::class, 'tambah'])->name('pengguna.tambah');
    Route::get('/manage-user/edit/{id}', [TblUserController::class, 'edit'])->name('pengguna.edit');
    Route::delete('/delete', [TblUserController::class, 'index'])->name('pengguna.index');
    //Manajemen Persuratan
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::get('/surat/tambah', [SuratController::class, 'tambah'])->name('surat.tambah');
    Route::post('/surat/simpan', [SuratController::class, 'simpan'])->name('surat.simpan');
    //Manajemem Jenis Surat
    Route::get('/jenissurat', [JenisSuratController::class, 'index'])->name('jenissurat.index');
    Route::get('/jenissurat/tambah', [JenisSuratController::class, 'tambah'])->name('jenissurat.tambah');
    Route::get('/jenissurat/edit/{id}', [JenisSuratController::class, 'edit'])->name('jenissurat.edit');
});

Route::prefix('/auth')->group(function(){
    Route::get('/', [AuthController::class, 'index'])->name('login.formlogin');
    Route::post('/login', [AuthController::class, 'check']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('/')
});