<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PencarianController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PencarianController::class, 'index'])->name('home');

Route::view('/about', 'about')->name('about');