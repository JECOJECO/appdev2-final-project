<?php

use App\Http\Controllers\AuthController;
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

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::group(['prefix' => 'submit/', 'as' => 'submit.'], function ()
{
    Route::post('', [StoryController::class, 'store'])->name('store');
    Route::get('/{story}', [StoryController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/{story}/edit', [StoryController::class, 'edit'])->name('edit');
        Route::put('/{story}', [StoryController::class, 'update'])->name('update');
        Route::delete('/{story}', [StoryController::class, 'destroy'])->name('destroy');
        Route::post('/{story}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});
// Route::post('/submit', [StoryController::class, 'store'])->name('submit.store');
// Route::get('/submit/{story}', [StoryController::class, 'show'])->name('submit.show');
// Route::get('/submit/{story}/edit', [StoryController::class, 'edit'])->name('submit.edit');
// Route::put('/submit/{story}', [StoryController::class, 'update'])->name('submit.update');
// Route::delete('/submit/{story}', [StoryController::class, 'destroy'])->name('submit.destroy');

// Route::resource('submit', StoryController::class)->except(['index', 'create', 'show'])->middleware('auth');
// Route::resource('submit.id', StoryController::class)->only(['show']);
// Route::resource('submit.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::get('/explore', [ExploreController::class, 'search'])->name('explorepage');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
