<?php

use App\Http\Controllers\frontend\CommentController;
use App\Http\Controllers\frontend\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontendController;

/* --------------------- public Routes --------------------- */
Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/post/details/{slug}', [FrontendController::class, 'BlogDetails'])->name('blog.details');
Route::get('/comment', [CommentController::class, 'indexfront'])->name('comment.index.fornt');
Route::post('/comment', [CommentController::class, 'storefront'])
    ->name('comment.store.front');
Route::post('/contat',[ContactController::class,'store'])->name('contactUs');


require __DIR__ . '/auth.php';
