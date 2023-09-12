<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::post("article", [PostController::class, 'create']);
Route::get("article/{limit}/{offset}", [PostController::class, 'index']);
Route::get("article/{id}", [PostController::class, 'show']);
Route::put("article/{id}", [PostController::class, 'update']);
Route::delete("article/{id}", [PostController::class, 'delete']);
