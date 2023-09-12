<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post("article", [PostController::class, 'create']);
Route::get("article/{limit}/{offset}", [PostController::class, 'index']);
Route::get("article/{id}", [PostController::class, 'show']);
Route::put("article/{id}", [PostController::class, 'update']);
Route::delete("article/{id}", [PostController::class, 'delete']);

