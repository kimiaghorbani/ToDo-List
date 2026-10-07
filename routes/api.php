<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

Route::patch('tasks/{task}/toggle', [TaskController::class, 'toggle']);
Route::apiResource('tasks', TaskController::class);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
