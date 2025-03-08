<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
Route::get('/posts/{postid}', [PostController::class,'show'])->name('posts.show');
Route::get('/posts/{postid}/edit', [PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/{postid}', [PostController::class,'update'])->name('posts.update');
Route::delete('/posts/{postid}', [PostController::class,'delete'])->name('posts.delete');

Route::post('/posts', [PostController::class,'store'])->name('posts.store');


