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

Route::post('/login', \App\Http\Controllers\Auth\LoginController::class);
Route::post('/logout', \App\Http\Controllers\Auth\LogoutController::class);

Route::get('/user', \App\Http\Controllers\Auth\UserController::class);
Route::get('/user/usage', \App\Http\Controllers\UserUsageController::class);
Route::get('/user/plan/availability', \App\Http\Controllers\UserPlanAvailabilityController::class);

Route::get('/plans', \App\Http\Controllers\PlanController::class);
Route::get('/subscriptions/intent', \App\Http\Controllers\StripIntentController::class);
Route::post('/subscriptions', [\App\Http\Controllers\SubscriptionController::class, 'store']);
Route::patch('/subscriptions', [\App\Http\Controllers\SubscriptionController::class, 'update']);

Route::get('/files', [\App\Http\Controllers\FileController::class, 'index']);
Route::post('/files/signed', [\App\Http\Controllers\FileController::class, 'signed']);
Route::post('/files', [\App\Http\Controllers\FileController::class, 'store']);
Route::delete('/files/{file:uuid}', [\App\Http\Controllers\FileController::class, 'destroy']);
Route::post('/files/{file:uuid}/link', [\App\Http\Controllers\FileLinkController::class, 'store']);
Route::get('/files/{file:uuid}/link', [\App\Http\Controllers\FileDownloadController::class, 'show']);
