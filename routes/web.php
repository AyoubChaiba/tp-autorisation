<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/articles', [PostsController::class, "index"])->name("articles.index");
Route::get('/articles/create', [PostsController::class, "create"]);
Route::post('/articles', [PostsController::class, "store"]);
Route::get('/articles/{article}', [PostsController::class, "show"]);
Route::get('/articles/{article}/edit', [PostsController::class, "edit"])->name('articles.edit');
Route::patch('/articles/{article}', [PostsController::class, "update"]);
Route::delete('/articles/{article}', [PostsController::class, "destroy"]);
