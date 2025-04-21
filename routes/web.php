<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('pengguna', PenggunaController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
