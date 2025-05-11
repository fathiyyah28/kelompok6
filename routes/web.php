<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LoginController;


Route::get('/home', function () {
    return view('welcome');
});


Route::resource('/pengguna', PenggunaController::class);

Route::get('/', [LoginController::class,'login'])->name('auth.login');
Route::post('/',[LoginController::class,'authenticate']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');