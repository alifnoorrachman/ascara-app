<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\RetailController;
use Illuminate\Support\Facades\Route;



//Public
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/services', [PublicController::class, 'services'])->name('services');
Route::get('/works', [PublicController::class, 'works'])->name('works');
Route::get('/articles', [PublicController::class, 'articles'])->name('articles');
Route::get('/faqs', [PublicController::class, 'faqs'])->name('faqs');
// Routes untuk public article detail
Route::get('/articles/{id}', [PublicController::class, 'articleShow'])->name('articles.show');
// routes/web.php
Route::get('/works/{id}', [PublicController::class, 'workShow'])->name('works.show');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('works', WorkController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('retails', RetailController::class);
    Route::resource('faqs', FaqController::class);
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
