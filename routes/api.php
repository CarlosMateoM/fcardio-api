<?php

use App\Http\Controllers\ActivityTrackingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicalProfileController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    $user = $request->user();
    
    $user->load('medicalProfile');

    return new UserResource($user);
})->middleware('auth:sanctum');


Route::post('/login',       [AuthController::class, 'login']);
Route::post('/register',    [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('medical-profiles', MedicalProfileController::class);
    Route::apiResource('activity-trackings', ActivityTrackingController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});


