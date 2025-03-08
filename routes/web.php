<?php

use App\Http\Controllers\postsController;
use Illuminate\Support\Facades\Route;



Route::get('/posts', [postsController::class,'index'])->name('posts.index');
Route::get('/posts/create', [postsController::class,'create'])->name('posts.create');
Route::get('/posts/{postid}', [postsController::class,'show'])->name('posts.show');
Route::get('/posts/{postid}/edit', [postsController::class,'edit'])->name('posts.edit');

Route::post('/posts', [postsController::class,'store'])->name('posts.store');


