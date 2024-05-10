<?php

use App\Http\Controllers\ArticleController;
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


Route::get('/articles', [ArticleController::class, "index"]);
Route::get('/articles/create', [ArticleController::class, "create"]);
Route::post('/articles', [ArticleController::class, "store"]);
Route::get('/articles/{article}', [ArticleController::class, "show"]);
Route::get('/articles/{article}/edit', [ArticleController::class, "edit"]);
Route::patch('/articles/{article}', [ArticleController::class, "update"]);
Route::delete('/articles/{article}', [ArticleController::class, "destroy"]);
