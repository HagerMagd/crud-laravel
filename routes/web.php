<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', postController::class);
Route::get('posts/softdelete/{id}', [PostController::class, 'softdelete'])->name('posts.softdelete');








