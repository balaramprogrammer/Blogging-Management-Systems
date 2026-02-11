<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Webcontroller;
use Illuminate\Support\Facades\Route;

Route::get('signing', [AuthController::class,'signing'])->name('signing');
Route::post('user_validate',[AuthController::class, 'user_validate'])->name('user_validate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/',[Webcontroller::class,'index'])->name('/');
Route::get('about', [Webcontroller::class,'about'])->name('about');

Route::fallback(function (){ return view('website.404');});
