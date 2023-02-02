<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\BrtabookingController;

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

Route::post('/brtalicence',[BrtabookingController::class, 'licencestore']);
Route::post('/brtabooking',[BrtabookingController::class, 'store']);
Route::post('/brtabookingsubmit',[BrtabookingController::class, 'brtabookinglicencestore']);
Route::get('/brtabookinglicencecheck',[BrtabookingController::class, 'bookingcount']);
Route::get('/brtabookinglicences',[BrtabookingController::class, 'show']);
Route::post('/brtagetbookingdailydata',[BrtabookingController::class, 'bookingdailydata']);
