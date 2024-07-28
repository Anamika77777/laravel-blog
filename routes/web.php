<?php

use App\Http\Controllers\auth\CategoryController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\auth\TagController;
use App\Http\Controllers\site\BlogController;
use App\Http\Controllers\site\CommentController;
use App\Http\Controllers\site\ReplyCommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')->group(function(){
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('auth/categories', [CategoryController::class, 'openCategoriesPage'])->name('auth.categories');
Route::post('post/comment/{postId}', [CommentController::class, 'postComment'])->name('comments.store');
Route::post('post/reply/{commmentId}', [ReplyCommentController::class, 'postReply'])->name('comments.reply');

});


Route::resource('auth/post', PostController::class);

Route::get('auth/tags', [TagController::class, 'openTagsPage'])->name('auth.tags');

Route::get('/', [BlogController::class, 'index'])->name('index');

Route::get('/{id}', [BlogController::class,'singleBlog'])->name('singleblog');








