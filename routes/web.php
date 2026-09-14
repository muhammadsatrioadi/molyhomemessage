<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/areas', [HomeController::class, 'areas'])->name('areas');
    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
    Route::get('/terms-conditions', [HomeController::class, 'terms'])->name('terms');
    Route::get('/language/{locale}', [HomeController::class, 'language'])->name('language');
});
