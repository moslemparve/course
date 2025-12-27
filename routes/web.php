<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about/us/page', [AboutController::class, 'index'])->name('about');
Route::post('post/about', [AboutController::class, 'store'])->name('about.post');
