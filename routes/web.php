<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{  TaskController, HomeController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth')->name('task.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/task/update/{id}', [TaskController::class, 'update'])->name('task.update');
Route::get('task/show/{id}', [TaskController::class, 'show'])->name('task.show');
Route::get('task/delete/{id}', [TaskController::class, 'destroy'])->name('task.delete');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('admin',function(){
    return view('admin');
});