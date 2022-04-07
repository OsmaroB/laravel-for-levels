<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
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

Route::get('eloquent', [PostController::class, 'index'])->name('eloquent.read');
Route::get('eloquent/read', [PostController::class, 'readSpecific'])->name('eloquent.readSpecific');
Route::get('eloquent/posts', [PostController::class, 'posts'])->name('posts.read');
Route::get('eloquent/users', [PostController::class, 'users'])->name('users.read');
Route::get('eloquent/collections', [PostController::class, 'collections'])->name('collections.read');
Route::get('eloquent/serialization', [PostController::class, 'serialization'])->name('serialization.read');

