<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () 
    {return view('mday-welcome');
});
// Route::get('/', [AuthController::class, 'login'])->name('login');

// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::resource('submit', StoryController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('submit', StoryController::class)->only(['show']);
Route::resource('submit.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::get('/explore', [ExploreController::class, 'search'])->name('explorepage');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');