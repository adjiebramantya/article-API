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

Route::get("post", [PostController::class, 'post'])->name('post');
Route::get("post-preview", [PostController::class, 'preview'])->name('post.preview');
Route::get("post-edit/{id}", [PostController::class, 'edit'])->name('post.edit');
Route::post("post-edit/{id}", [PostController::class, 'editUpdate'])->name('post.update');
Route::get("post-add", [PostController::class, 'createView'])->name('post.add');
Route::post("post-add", [PostController::class, 'createAdd'])->name('post.create');
Route::get("post-trash/{id}", [PostController::class, 'editTrash'])->name('post.trash');

