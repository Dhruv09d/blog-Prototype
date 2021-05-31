<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\PostsCommentsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowersController;
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

//facebook auth
// redirecting to facebook login page
Route::get('login/facebook', [LoginController::class, 'redirectToProviderFacebook'])->name('login.facebook');
// getting auth confirmation from  facebook || getting auth data from facebook
Route::get('login/facebook/callback', [LoginController::class, 'handleProviderCallbackFacebook']);





//post Routes
Auth::routes();

// index page
//Route::get('/', [PagesController::class, 'index'])->name('page');
Route::get('/', [HomeController::class, 'index']);

//blog | posts

Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
Route::post('/blog/create', [PostsController::class, 'store']);
Route::get('/blog/{slug}/{id}', [PostsController::class, 'show']);
Route::get('/blog/{slug}', [PostsController::class, 'edit']);
Route::put('/blog/{slug}/update', [PostsController::class, 'update']);
Route::post('/blog/{slug}/confirm-delete', [PostsController::class, 'confirmDel']);
Route::delete('/blog/{slug}/delete', [PostsController::class, 'destroy']);

//Route::resource('/blog', [PostsController::class]);

// like unlike posts
Route::post('posts/{post}/likes', [PostLikesController::class, 'store'])->name('posts.like');
Route::delete('posts/{post}/unlike', [PostLikesController::class, 'destroy'])->name('posts.unlike');

//post comment {post} -> entire post | {id} -> comment id
Route::post('posts/{post}/comment', [PostsCommentsController::class, 'store'])->name('posts.comment');
Route::delete('posts/{id}/comment', [PostsCommentsController::class, 'destroy'])->name('posts.removeComment');

//profile 
// specified profile
Route::get('profiles/profile/{user_id}', [ProfilesController::class, 'index'])->name('profile.index'); 
// all profiles
Route::get('profiles/explore', [ProfilesController::class, 'show'])->name('profile.show'); 
//create form page follwed by storing
Route::get('profiles/{user_id}', [ProfilesController::class, 'create'])->name('profile.create'); 
Route::post('profiles/create/{user_id}', [ProfilesController::class, 'store'])->name('profile.store');
// profile update form page follwed by storing(updating)
Route::get('profiles/edit/{user_id}', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::put('profiles/{user_id}', [ProfilesController::class, 'update'])->name('profile.update');
//profile delete
Route::delete('profiles/{id}', [ProfilesController::class, 'destroy'])->name('profile.delete');


// follow 
Route::post('following/{profile_user_id}', [FollowersController::class, 'follow'])->name('follow.user');
// unfollow
Route::delete('unfollowing/{profile_user_id}', [FollowersController::class, 'unfollow'])->name('unfollow.user');
//Route::post('follower', [FollowersController::class, 'following'])->name('follow.user');

