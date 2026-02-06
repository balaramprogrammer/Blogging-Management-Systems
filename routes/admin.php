<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [Admincontroller::class,'dashboard'])->name('dashboard');
Route::get('/add_product',[ProductController::class,'add_product'])->name('add_product');