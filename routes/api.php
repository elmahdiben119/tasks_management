<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TypeController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api'] ,'prefix' => 'tasks'], function () {
    Route::get('/{user_id}', [TaskController::class, 'index']);
    Route::get('/get/{id}', [TaskController::class, 'show']);
    Route::post('/create', [TaskController::class, 'create']);
    Route::post('/{id}/update', [TaskController::class, 'update']);
    Route::delete('/{id}/destroy', [TaskController::class, 'destroy']);
    Route::get('/{id}/type', [TaskController::class, 'type']);
});

Route::group(['middleware' => ['auth:api'] ,'prefix' => 'types'], function () {
    Route::get('/', [TypeController::class, 'index']);
});
