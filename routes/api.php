<?php

use App\Http\Controllers\MotorcycleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'store']);
Route::put('/users/update/{user_id}', [UserController::class, 'update']);
Route::delete('/users/delete/{user_id}', [UserController::class, 'delete']);

Route::get('/moto', [MotorcycleController::class, 'index']);
Route::post('/moto/create', [MotorcycleController::class, 'store']);
Route::put('/moto/update/{user_id}', [MotorcycleController::class, 'update']);
Route::delete('/moto/delete/{user_id}', [MotorcycleController::class, 'delete']);
