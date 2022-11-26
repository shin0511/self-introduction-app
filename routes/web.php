<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntroductionController;
use App\Http\Controllers\SnslinkController;
use App\Http\Controllers\WebController;



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

Route::get('/', [WebController::class, 'index'])->name('web.index');

Auth::routes();

Route::get('/home', [WebController::class, 'index'])->name('home');

Route::resource('introduction', IntroductionController::class)->except(['show'])->middleware('auth');
Route::get('/introduction/{introduction}',[IntroductionController::class,'show'])->name('introduction.show');

Route::resource('introduction.snslinks', SnslinkController::class)->only(['store', 'update', 'destroy'])->middleware('auth');
