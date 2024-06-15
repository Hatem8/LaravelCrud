<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [PostController::class,'home'])->name('posts.home');
Route::get('/posts/search', [PostController::class,'search'])->name('posts.search');

Route::resource('/posts',PostController::class);

Route::get('/mail/create',[OrderController::class,'create'])->name('mail.create');


