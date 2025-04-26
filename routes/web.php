<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/home', function () {
    return view('home');
})->name('home');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('dashboard');
