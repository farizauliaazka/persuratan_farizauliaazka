<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
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

//Buat Route untuk  menampilkan form login dengan nama route 'login'
Route::get('/login',[AuthController::class,'index'])->name('login');
//POST LOGIN untuk check password
Route::post('/login',[AuthController::class,'check']);
//ROUTE LOGOUT
Route::get('/logout',[AuthController::class,'logout']);
//=================
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/surat', [SuratController::class, 'index'])->name('surat.index');
Route::post('users/{id}', function ($id) {
    
});
Route::get('/dashboard/surat/tambah', [SuratController::class, 'tambah'])->name('surat.tambah');
Route::post('/dashboard/surat/simpan', [SuratController::class, 'store'])->name('surat.store');
Route::get('/dashboard/surat/edit/', [SuratController::class, 'edit'])->name('surat.edit');
Route::post('/dashboard/surat/', [SuratController::class, 'update'])->name('surat.update');
Route::delete('/dashboard/surat/', [SuratController::class, 'destroy'])->name('surat.destroy');

