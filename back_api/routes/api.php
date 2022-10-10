<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Auth')->group(function() {
    Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']); // ログイン
    Route::post('/refresh', [App\Http\Controllers\Auth\AuthController::class, 'refresh']); // トークン再発行
    Route::get('/me', [App\Http\Controllers\Auth\AuthController::class, 'me'])->middleware('auth:users'); // ユーザ情報取得
    Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->middleware('auth:users'); // ログアウト

});

Route::middleware('auth:users')->group(function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'response']);
});