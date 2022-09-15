<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::post('/contacts', [ContactController::class, 'store'])->name('contact_store');

Route::get('/sign-up', [UserController::class, 'signUpForm'])
    ->name('sign-up.form');

Route::post('/sign-up', [UserController::class, 'signUp'])
    ->name('sign-up');

Route::get('/verify-email/{id}/{hash}', [UserController::class, 'verifyEmail'])
    ->name('verify.email');


Route::group(['prefix' => '/movies', 'as' => 'movie.'], function() {
    Route::get('', [MovieController::class, 'list'])
        ->name('list');

    Route::get('/create', [MovieController::class, 'createForm'])
        ->name('create.form');

    Route::post('/create', [MovieController::class, 'create'])
        ->name('create');

    Route::get('/{movie}', [MovieController::class, 'show'])
        ->name('show');


    Route::group(['prefix' => '/{movie}/edit'], function () {
        Route::get('', [MovieController::class, 'editForm'])
            ->name('edit.form');

        Route::post('', [MovieController::class, 'edit'])
            ->name('edit');


    });

    Route::post('/{movie}/delete', [MovieController::class, 'delete'])
        ->name('delete');


});
