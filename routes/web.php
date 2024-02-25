<?php

use App\Models\Kandidat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\KandidatController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/vote', [HomeController::class, 'login'])->name('pemilih.login');
Route::post('/vote/{pemilih}', [HomeController::class, 'vote'])->name('vote');
Route::get('/golput/{pemilih}', [HomeController::class, 'golput'])->name('golput');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);


});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/admin/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::resource('/admin/pemilih', PemilihController::class);

    Route::resource('/admin/jabatan', JabatanController::class);

    Route::resource('/admin/kandidat', KandidatController::class);

    Route::get('/admin/perolehan', [AdminController::class, 'perolehan'])->name('perolehan');
    Route::post('/admin/hapus', [AdminController::class, 'hapus'])->name('hapus.suara');


});
