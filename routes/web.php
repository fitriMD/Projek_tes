<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Auth;

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
//     return view('karyawan.index');
// });

Route::get('/', function () {
    return redirect('login');
});
Route::resource('karyawan', KaryawanController::class);
Route::resource('daftarKaryawan', KaryawanController::class);
Route::get('/createKaryawan', [KaryawanController::class, 'create']);
Route::post('createkaryawan', [KaryawanController::class, 'store'])->name('karyawan.create');
Route::get('karyawan/hapus/{id}', [KaryawanController::class, 'destroy']);
Route::get('karyawan/update/{id}', [KaryawanController::class, 'edit']);
Route::post('/karyawan-update/{id}', [KaryawanController::class, 'update']);
Route::get('karyawan/detail/{id}', [KaryawanController::class, 'show']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
