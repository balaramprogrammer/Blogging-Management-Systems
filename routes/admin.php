<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');
Route::get('/bloggers-list', [AdminController::class,'bloggers_list'])->name('bloggers.list');

Route::get('/schedule-posts', [BlogController::class,'scheduled_posts'])->name('schedule.posts');
Route::get('/published-posts', [BlogController::class,'published_posts'])->name('published.posts');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');
Route::get('/blog/draft',[BlogController::class,'draft_blogs'])->name('blog.edit');
Route::delete('/blog/{id}', [BlogController::class,'destroy'])->name('blog.destroy');


Route::post('/category/store',[BlogController::class,'category_store'])->name('category.store');