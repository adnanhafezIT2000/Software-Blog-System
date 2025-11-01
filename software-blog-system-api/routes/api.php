<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
->group(function (){

    Route::post('register' , [AuthController::class , 'register']);

    Route::post('login' , [AuthController::class , 'login']);

    Route::post('logout' , [AuthController::class , 'logout'])
    ->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')
->group(function(){

    Route::get('profile' , [ProfileController::class , 'getProfile']);

    Route::get('profile/{id}' , [ProfileController::class , 'getProfileByID']);
});
