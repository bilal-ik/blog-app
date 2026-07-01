<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ShortVideoController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// All post routes require login
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('stories', StoryController::class)->except(['edit', 'update']);
    Route::resource('short-videos', ShortVideoController::class)->except(['edit', 'update']);
});

require __DIR__.'/auth.php';