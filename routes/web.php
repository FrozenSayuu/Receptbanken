<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;

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

Route::resource('/recipes', RecipeController::class);

Route::middleware('auth')->group(function ()
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('create');
});