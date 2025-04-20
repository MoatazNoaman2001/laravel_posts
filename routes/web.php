<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Models\User;
use Illuminate\Support\Facades\Hash;



Route::get('/' , function () {
    
    for ($i = 0; $i < 5; $i++) {
        User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
    
    return "created 5 random users successfully ";
});

Route::get('/posts', [PostController::class, "show"])->name('post.show');

Route::get("/posts/create" , [PostController::class, "create"])->name('post.create');

Route::post("/posts/create" , [PostController::class, "store"])->name('post.store');

Route::get('/posts/{id}', [ PostController::class, "index"]);

Route::get('/posts/{id}/edit', [PostController::class , "edit"])->name('post.edit');

Route::put('/posts/{id}/edit', [PostController::class, 'update'])->name('post.update');

Route::delete('/posts/{id}/delete', [PostController::class , 'destroy'] )->name('post.destroy');