<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AttendanceController;

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

Route::apiResource('teachers', TeacherController::class);
Route::apiResource('classes', ClassModelController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('statuses', StatusController::class);
Route::apiResource('attendances', AttendanceController::class);
