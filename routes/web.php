<?php

use App\Http\Controllers\FormController;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/list_daftar', [App\Http\Controllers\HomeController::class, 'list'])->name('list_daftar');
Route::get('/daftar', [FormController::class, 'index'])->name('daftar');
Route::post('/daftar', [FormController::class, 'store'])->name('daftar');

Route::get('getCourse/{id}', function ($id) {
    $kota = City::where('id_provinsi',$id)->get();
    return response()->json($kota);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
