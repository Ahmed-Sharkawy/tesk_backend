<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Dashboard
|--------------------------------------------------------------------------
|
| Here is where you can register Dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [PostController::class, 'index'])->name('dashboard');

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{post}/update', [PostController::class, 'update'])->name('posts.update');

Route::get('posts/{post:slug}/delete', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::get('posts/onlyTrashed', [PostController::class, 'onlyTrashed'])->name('posts.onlyTrashed');
Route::get('posts/{id}/forceDelete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');

Route::post('posts/{id}/comment', [CommentController::class, 'store'])->name('comment.post');
