<?php

use App\Http\Controllers\ReportController;
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

//Route::get('/report', [ReportController::class, 'show'])->name('report');

Route::post('/report', [ReportController::class, 'store'])->name('report_store');

Route::post('/form', [MainController::class, 'form'])->name('form');
