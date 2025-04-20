<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/' , function () {
    
    return view('root');
});

Route::get('/posts', [PostController::class, "show"])->name('post.show');

Route::get("/posts/create" , [PostController::class, "create"])->name('post.create');

Route::post("/posts/create" , [PostController::class, "store"])->name('post.store');

Route::get('/posts/{id}', [ PostController::class, "index"]);

Route::get('/posts/{id}/edit', [PostController::class , "edit"])->name('post.edit');

Route::put('/posts/{id}/edit', [PostController::class, 'update'])->name('post.update');

Route::delete('/posts/{id}/delete', [PostController::class , 'destroy'] )->name('post.destroy');