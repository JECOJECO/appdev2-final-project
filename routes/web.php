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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'submit-story/', 'as' => 'submit.'], function()
{
    Route::post('', [StoryController::class, 'store'])->name('store');
    Route::get('/{story}', [StoryController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function()
    {
        Route::get('/{story}/edit', [StoryController::class, 'edit'])->name('edit');
        Route::put('/{story}', [StoryController::class, 'update'])->name('update');
        Route::delete('/{story}', [StoryController::class, 'destroy'])->name('destroy');
        Route::post('/{story}/comments', [CommentController::class, 'store'])->name('comments.store');
    });

});

Route::get('/explore', [ExploreController::class, 'search'])->name('explorepage');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');