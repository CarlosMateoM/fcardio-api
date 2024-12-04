<?php

use App\Http\Controllers\ActivityTrackingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicalProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/login',       [AuthController::class, 'login']);
Route::post('/register',    [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('medical-profiles',      MedicalProfileController::class);
    Route::apiResource('activity-trackings',    ActivityTrackingController::class);

    Route::get('/user',     [AuthController::class, 'getUser']);
    Route::post('/user' ,   [AuthController::class, 'updateUser']);

    Route::post('/logout', [AuthController::class, 'logout']);
});


