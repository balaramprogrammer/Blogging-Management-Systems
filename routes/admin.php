<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');
Route::get('/bloggers-list', [AdminController::class,'bloggers_list'])->name('bloggers.list');

//post management routes
Route::get('/schedule-posts', [BlogController::class,'scheduled_posts'])->name('schedule.posts');
Route::get('/published-posts', [BlogController::class,'published_posts'])->name('published.posts');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');
Route::put('/blog/{id}/store_updated_post',[BlogController::class,'store_updated_post'])->name('blog.store_updated_post');
Route::get('/blog/draft',[BlogController::class,'draft_blogs'])->name('blog.draft');
Route::delete('/blog/{id}', [BlogController::class,'destroy'])->name('blog.delete');
Route::get('/blog/{id}/edit', [BlogController::class,'edit'])->name('blog.edit');

//categories routes
Route::post('/category/store',[BlogController::class,'category_store'])->name('category.store');
Route::get('/category',[BlogController::class,'category_list'])->name('category_list');
Route::get('/category_edit',[BlogController::class,'category_edit'])->name('category.edit');
Route::delete('/category_delete/{id}', [BlogController::class,'category_delete'])->name('category.delete');
Route::put('/category/updated_store/{id}',[BlogController::class,'category_updated_store'])->name('category.updated_store');

//Tags managements
Route::get('/tags-managements',[BlogController::class,'tags_managements'])->name('tags_managements');
Route::delete('/tag_delete/{id}', [BlogController::class,'tag_delete'])->name('tag.delete');

//comment routes 
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comments/{post_id}', [CommentController::class, 'fetch'])->name('comments');
Route::get('/comments', [CommentController::class, 'comments'])->name('comments');