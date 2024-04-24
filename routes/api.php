<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\DoctorscheduleController;
use App\Http\Controllers\Api\ServiceMedicinesController;
use App\Models\ServiceMedicine;
use App\Models\ServiceMedicines;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('/login', [AuthController::class, 'login']);

//logout
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

//index doctor
Route::middleware('auth:sanctum')->apiResource('/get-doctor', DoctorController::class);

//patients
Route::middleware('auth:sanctum')->apiResource('/get-patients', PatientController::class);

//doctorschedule
Route::middleware('auth:sanctum')->apiResource('/get-doctor-schedule', DoctorscheduleController::class);

//servicemedicine
Route::middleware('auth:sanctum')->apiResource('/get-service-medicine', ServiceMedicinesController::class);

