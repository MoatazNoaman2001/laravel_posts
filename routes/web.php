<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;


Route::get('/' , function () {
    return view('root');
});

Route::get('/posts', [postController::class, "show"]);

Route::get('/post/{id}',[ postController::class, "index" ] );

Route::get('/post/{id}/edit', [postController::class , "edit"])->name('post.edit');

Route::put('/post/{id}/edit', [postController::class, 'update'])->name('post.update');

Route::delete('/post/{id}/delete',[postController::class , 'delete'] )->name('post.delete');