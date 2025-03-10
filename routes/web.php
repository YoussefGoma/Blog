<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use Illuminate\Support\Facades\Route;



Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
Route::get('/posts/{postid}', [PostController::class,'show'])->name('posts.show');
Route::get('/posts/{postid}/edit', [PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/{postid}', [PostController::class,'update'])->name('posts.update');
Route::delete('/posts/{postid}', [PostController::class,'destroy'])->name('posts.destroy');
Route::post('/posts', [PostController::class,'store'])->name('posts.store');

 // ============================= comments routes (to be seperated?) ============================
Route::post('/comment/{postid}', [CommentController::class,'store'])->name('comments.store');
Route::get('/comment/{commentid}/edit', [CommentController::class,'edit'])->name('comments.edit');
Route::put('/comment/{commentid}', [CommentController::class,'update'])->name('comments.update');
Route::delete('/comment/{commentid}', [CommentController::class,'destroy'])->name('comments.destroy');




