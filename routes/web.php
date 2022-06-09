<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[UserController::class,'home'])->name('user.home');
Route::get('/register',[UserController::class,'reg'])->name('user.register');
Route::get('/login',[UserController::class,'login'])->name('user.login');
Route::get('/dashboard',[UserController::class,'dash'])->name('user.dash');
Route::get('/user/details/{id}',[UserController::class,'details'])->name('user.details');

Route::post('/register',[UserController::class,'regSubmit'])->name('user.register.submit');

