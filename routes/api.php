<?php

use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\SubscriberPropertyController;
use App\Http\Controllers\Api\SubscriberPropertyValueController;
use Illuminate\Http\Request;
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
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('subscribers', SubscriberController::class);

Route::apiResource('subscriber_properties', SubscriberPropertyController::class);

Route::apiResource('subscriber_property_values', SubscriberPropertyValueController::class);
