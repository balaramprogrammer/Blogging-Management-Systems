<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Webcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('signing', [AuthController::class,'signing'])->name('signing');
Route::post('user_validate',[AuthController::class, 'user_validate'])->name('user_validate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
