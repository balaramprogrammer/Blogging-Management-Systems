<?php
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Webcontroller;
use Illuminate\Support\Facades\Route;

Route::get('signing', [AuthController::class,'signing'])->name('signing');
Route::post('user_validate',[AuthController::class, 'user_validate'])->name('user_validate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/',[Webcontroller::class,'index'])->name('website.index');
Route::get('about', [Webcontroller::class,'about'])->name('about');
Route::get('post/{slug}', [Webcontroller::class,'blog_reading'])->name('blog.read');

Route::fallback(function (){ return view('website.404');});


Route::get('/clear-cache', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return "All Cache Cleared Successfully";

})->name('clear.cache');
