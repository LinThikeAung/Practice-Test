<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Api\MailController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('mail/send', [MailController::class, 'send']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::prefix('v2')->group(function () {
    Route::get('forms',   [FormController::class, 'list']);
    Route::post('/forms', [FormController::class, 'update']);
    Route::get('/posts',  [PostController::class, 'postByUser']);
    Route::post('/posts', [PostController::class, 'create']);
})->middleware('auth:sanctum');
