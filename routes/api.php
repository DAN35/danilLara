<?php

use App\Http\Controllers\CheckInController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServerController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


});

Route::apiResources([
    'checkin' => CheckInController::class,
    'server' => ServerController::class,
    'employee' => EmployeeController::class,
]);
