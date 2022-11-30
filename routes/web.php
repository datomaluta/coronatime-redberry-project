<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PasswordController;
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
Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');

Route::view('/confirm', 'messages.email-confirm')->name('confirm');
Route::view('/confirmed', 'messages.email-confirmed')->name('confirmed');

Route::view('dashboard', 'dashboard.worldwide.index')->name('dashboard')->middleware(['auth', 'is_verify_email']);

// password reset
Route::view('/forget-password', 'password.forget')->name('forget.password.get');
Route::post('/forget-password', [PasswordController::class, 'submitShowPasswordForm'])->name('forget.password.post');
Route::view('/reset-password/{token}', 'password.reset')->name('reset.password.get');
Route::post('/reset-password/{token}', [PasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::view('/password-updated', 'messages.password-changed')->name('password.changed');

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
