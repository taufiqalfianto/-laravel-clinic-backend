<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\DoctorScheduleController;
use App\Http\Controllers\Api\ServiceMedicinesController;
use App\Http\Controllers\Api\PatientScheduleController;
use App\Http\Controllers\Api\SatuSehatTokenController;

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

//patient schedules
Route::apiResource('/api-patient-schedules', PatientScheduleController::class)->middleware('auth:sanctum');

//token satu sehat
Route::get('/satusehattoken', [SatuSehatTokenController::class, 'token'])->middleware('auth:sanctum');