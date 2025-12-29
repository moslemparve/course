<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{  TaskController, TestController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about/us/page', [TaskController::class, 'index'])->name('about');
Route::post('post/about', [TaskController::class, 'store'])->name('about.post');