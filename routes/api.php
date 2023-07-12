<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Using /weather api we can see the weather reports on the behalf of query params.
 */
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// protected routes by jwt auth
// middlle wate applayed in the controller constructer.
Route::get('/weather', [WeatherController::class, 'index']);
