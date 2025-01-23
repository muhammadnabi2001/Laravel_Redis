<?php

use App\Http\Controllers\Api\BotController;
use App\Http\Controllers\RedisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('/shazam-bot',[BotController::class,'index']);