<?php

use App\Http\Controllers\postsController;
use Illuminate\Support\Facades\Route;



Route::get('/posts', [postsController::class,'index'])->name('posts.index');
Route::get('/posts/create', [postsController::class,'create'])->name('posts.create');
Route::get('/posts/{postid}', [postsController::class,'show'])->name('posts.show');
Route::get('/posts/{postid}/edit', [postsController::class,'edit'])->name('posts.edit');
Route::put('/posts/{postid}', [postsController::class,'update'])->name('posts.update');
Route::delete('/posts/{postid}', [postsController::class,'delete'])->name('posts.delete');

Route::post('/posts', [postsController::class,'store'])->name('posts.store');


