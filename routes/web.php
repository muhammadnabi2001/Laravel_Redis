<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RedisController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SurpriseController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[CategoryController::class,'index']);
Route::post('categories.store',[CategoryController::class,'store'])->name('categories.store');
Route::post('categories/{category}',[CategoryController::class,'update'])->name('categories.update');
Route::delete('/destroy/{id}',[CategoryController::class,'destroy'])->name('destroy');
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('user',[RegisterController::class,'register'])->name('register.user');
Route::get('/surprise',[SurpriseController::class,'index'])->name('surprise');
Route::post('store',[SurpriseController::class,'store'])->name('surprise.store');
