<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\LoginController;
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


//google auth
// redirecting to google login page
Route::get('login/google', [LoginController::class, 'redirectToProviderGoogle'])->name('login.google');
// getting auth confirmation from google || getting auth data from google
Route::get('login/google/callback', [LoginController::class, 'handleProviderCallbackGoogle']);

//github auth
// redirecting to github login page
Route::get('login/github', [LoginController::class, 'redirectToProviderGithub'])->name('login.github');
// getting auth confirmation from github || getting auth data from github
Route::get('login/github/callback', [LoginController::class, 'handleProviderCallbackGithub']);





//post Routes
Auth::routes();

// index page
//Route::get('/', [PagesController::class, 'index'])->name('page');
Route::get('/home', [HomeController::class, 'index'])->name('home');

//blog | posts

Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/create', [PostsController::class, 'create']);
Route::post('/blog/create', [PostsController::class, 'store']);
Route::get('/blog/{slug}', [PostsController::class, 'show']);
Route::get('/blog/{slug}/edit', [PostsController::class, 'edit']);
Route::patch('/blog/{slug}/update', [PostsController::class, 'update']);
Route::get('/blog/{slug}', [PostsController::class, 'destroy']);

//Route::resource('/blog', [PostsController::class]);


