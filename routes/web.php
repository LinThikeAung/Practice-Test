<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\FormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FormController::class, 'index'])->name('home');


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login/user', [AuthController::class, 'login'])->name('login.user');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register/user', [AuthController::class, 'storeRegister'])->name('register.user');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::post('dynamic', [FormController::class, 'updateForm'])->name('dynamic.form');
});

Route::post('form', [FormController::class, 'create'])->name('form.create');
