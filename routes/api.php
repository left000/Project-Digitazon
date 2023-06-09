<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('recipes',App\Http\Controllers\Api\RecipeController::class);
Route::apiResource('likes',App\Http\Controllers\Api\LikeController::class);
Route::apiResource('comments',App\Http\Controllers\Api\CommentController::class);
Route::post('dislike', [App\Http\Controllers\Api\LikeController::class, 'dislike']);
Route::apiResource('recipeIngredients',App\Http\Controllers\Api\RecipeIngredientController::class);

