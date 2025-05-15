<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

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


Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::get('/login', [TaskController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskController::class, 'taskApi']);
    Route::get('/tasks-details/{id}', [TaskController::class, 'getTaskDetails']);
    Route::post('/tasks/{id}/update-status', [TaskController::class, 'userTaskStatusUpdate']);
});