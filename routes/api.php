<?php

use App\Http\Controllers\ArticleLikeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('articles/{articleId}/like', [ArticleLikeController::class, 'like'])->name('articles.like');
