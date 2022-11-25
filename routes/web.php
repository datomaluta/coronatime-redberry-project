<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

Route::view('/register', 'register.create')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

Route::view('/login', 'sessions.create')->name('login');
Route::post('/login', [SessionController::class, 'login'])->name('login.post');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

Route::view('/confirm', 'email.confirm')->name('confirm');
Route::view('confirmed', 'email.confirmed')->name('confirmed');

Route::view('dashboard', 'dashboard.index')->name('dashboard')->middleware(['auth', 'is_verify_email']);
Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');
