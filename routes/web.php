<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('/create', 'createRecipe');
Route::view('/recipes', 'recipe');
Route::view('/info', 'info');
Route::view('/chef', 'chef');



Route::resource('ingredients', App\Http\Controllers\IngredientController::class);
Route::resource('instructions', App\Http\Controllers\InstructionController::class);
Route::resource('recipeIngredients', App\Http\Controllers\RecipeIngredientController::class);

Route::get('recipes/{id}', [App\Http\Controllers\RecipeController::class, 'show']);