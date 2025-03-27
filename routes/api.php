<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('accounts', App\Http\Controllers\AccountController::class);

Route::apiResource('authors', App\Http\Controllers\AuthorController::class);

Route::apiResource('categories', App\Http\Controllers\CategoryController::class);

Route::apiResource('stories', App\Http\Controllers\StoryController::class);

Route::apiResource('chapters', App\Http\Controllers\ChapterController::class);

Route::apiResource('comments', App\Http\Controllers\CommentController::class);

Route::apiResource('favorites', App\Http\Controllers\FavoriteController::class);

Route::apiResource('views', App\Http\Controllers\ViewController::class);
