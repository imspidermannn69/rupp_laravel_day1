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

// Route::get('/services', function () {
//     return view('services');
// })->name('services');
Route::get('/service', [App\Http\Controllers\FrontendController::class, 'service'])->name('service');


Auth::routes();


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('dashboard');

Route::group([
    'prefix' => 'backends'
], function () {
    Route::get('/', [App\Http\Controllers\Backends\DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    Route::group([
        'prefix' => 'features'
    ], function () {
        Route::get('/', [App\Http\Controllers\Backends\FeatureController::class, 'index'])->middleware('auth')->name('features');
        Route::get('/create', [App\Http\Controllers\Backends\FeatureController::class, 'create'])->middleware('auth')->name('features.create');
        Route::post('/store', [App\Http\Controllers\Backends\FeatureController::class, 'store'])->middleware('auth')->name('features.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Backends\FeatureController::class, 'edit'])->middleware('auth')->name('features.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Backends\FeatureController::class, 'update'])->middleware('auth')->name('features.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Backends\FeatureController::class, 'destroy'])->middleware('auth')->name('features.delete');
    });
});
