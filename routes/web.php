<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Color Management
Route::get('/color', [ColorController::class, 'index'])->name('color.index');
Route::get('/color/create', [ColorController::class, 'create'])->name('color.create');
Route::post('/color', [ColorController::class, 'store'])->name('color.store');
Route::get('/color/{color}/edit', [ColorController::class, 'edit'])->name('color.edit');
Route::put('/color/{color}', [ColorController::class, 'update'])->name('color.update');
Route::delete('/color/{color}/destroy', [ColorController::class, 'destroy'])->name('color.destroy');

