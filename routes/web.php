<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ColorController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Color Management
Route::get('/color', [ColorController::class, 'index'])->name('color.index');
Route::get('/color/create', [ColorController::class, 'create'])->name('color.create');
Route::post('/color', [ColorController::class, 'store'])->name('color.store');
Route::get('/color/{color}/edit', [ColorController::class, 'edit'])->name('color.edit');
Route::put('/color/{color}', [ColorController::class, 'update'])->name('color.update');
Route::delete('/color/{color}/destroy', [ColorController::class, 'destroy'])->name('color.destroy');

//Type Management
Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/create', [TypeController::class, 'create'])->name('type.create');
Route::post('/type', [TypeController::class, 'store'])->name('type.store');
Route::get('/type/{type}/edit', [TypeController::class, 'edit'])->name('type.edit');
Route::put('/type/{type}', [TypeController::class, 'update'])->name('type.update');
Route::delete('/type/{type}/destroy', [TypeController::class, 'destroy'])->name('type.destroy');

//Item Management
Route::get('/item', [ItemController::class, 'index'])->name('item.index');
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
Route::post('/item', [ItemController::class, 'store'])->name('item.store');
Route::get('/item/{item:uuid}', [ItemController::class, 'show'])->name('item.show');
Route::get('/item/{item:uuid}/edit', [ItemController::class, 'edit'])->name('item.edit');
Route::put('/item/{item:uuid}', [ItemController::class, 'update'])->name('item.update');
Route::delete('/item/{item:uuid}/destroy', [ItemController::class, 'destroy'])->name('item.destroy');
