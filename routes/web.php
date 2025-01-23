<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RedisController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[CategoryController::class,'index']);
Route::post('categories.store',[CategoryController::class,'store'])->name('categories.store');
Route::post('categories/{category}',[CategoryController::class,'update'])->name('categories.update');
Route::get('/destroy/{category}',[CategoryController::class,'destroy']);
