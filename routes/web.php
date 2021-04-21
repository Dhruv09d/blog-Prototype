<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
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

// athentication routes
Auth::routes();

// index page
Route::get('/', [PagesController::class, 'index'])->name('page');
Route::get('/home', [HomeController::class, 'index'])->name('home');

//blog | posts
/*
Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/create', [PostsController::class, 'create']);
Route::post('/blog/create', [PostsController::class, 'store']);
Route::get('/blog/{slug}', [PostsController::class, 'show']);
Route::get('/blog/{slug}/edit', [PostsController::class, 'edit']);
Route::patch('/blog/{slug}/update', [PostsController::class, 'update']);
*/
Route::resource('/blog', [PostsController::class]);