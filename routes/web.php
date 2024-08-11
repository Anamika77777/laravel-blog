<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\site\BlogController;
use App\Http\Controllers\site\CommentController;
use App\Http\Controllers\site\ReplyCommentController;
use App\Models\Admin;
use App\Models\post;
use App\Models\User;
use App\Notifications\BlogPostCreated;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('post/comment/{postId}', [CommentController::class, 'postComment'])->name('comments.store');
    Route::post('post/reply/{commmentId}', [ReplyCommentController::class, 'postReply'])->name('comments.reply');
    Route::resource('auth/post', PostController::class);
});


Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{id}', [BlogController::class, 'singleBlog'])->name('singleblog');


Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [AdminAuthController::class, 'register'])->name('register');
        Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminAuthController::class, 'login']);
    });

  
    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('auth/post', AdminPostController::class);
        Route::get('categories', [CategoryController::class, 'openCategoriesPage'])->name('categories');
        Route::get('tags', [TagController::class, 'openTagsPage'])->name('tags');
        Route::patch('post/{post}/status', [AdminPostController::class, 'updateStatus'])->name('post.updateStatus');
        
        Route::get('/admin/comments', [CommentController::class, 'adminIndex'])->name('comments');
        Route::post('/admin/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
        Route::post('/admin/comments/{comment}/reject', [CommentController::class, 'reject'])->name('comments.reject');
        Route::get('/markAsRead', [NotificationController::class, 'markAsRead'])->name('markAsRead');

    });
});