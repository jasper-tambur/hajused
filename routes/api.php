<?php

use App\Http\Controllers\WeatherApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('api')->get('/cars', [CarsController::class, 'index'])->name("cars");
Route::middleware('api')->get('cars/add', [CarsController::class, 'addCar']);
Route::middleware('api')->post('/cars', [CarsController::class, 'store'])->name("add.car");