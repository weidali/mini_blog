<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('articles/{articleId}/like', [ArticleController::class, 'like'])->name('articles.like');
Route::get('/articles/{id}/increment-views', [ArticleController::class, 'incrementViews']);
Route::post('/articles/{id}/comments', [CommentController::class, 'store']);
