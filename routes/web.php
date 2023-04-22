<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentsController;



Route::get('/', [HomeController::class, 'show_post'])->name('home');

  
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth'])->name('admin');


    

Route::group(['middleware' => ['auth']], function() {
    Route::resource('posts', PostController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    
});

Route::post('comments', [CommentsController::class, 'store'])->name('comments.store');
// Route::get('/author/{user:firstname}', [PostController::class, 'authorWisePosts'])->name('author-post');


require __DIR__.'/auth.php';