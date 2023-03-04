<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\BrtabookingController;
use App\Http\Controllers\Back\EpassportController;
use App\Http\Controllers\Back\BookingController;

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

// with bariyer tokan 

// Route::post('/brtalicence',[BrtabookingController::class, 'licencestore'])->middleware('auth:sanctum');
// Route::post('/brtabooking',[BrtabookingController::class, 'store'])->middleware('auth:sanctum');
// Route::post('/brtabookingsubmit',[BrtabookingController::class, 'brtabookinglicencestore'])->middleware('auth:sanctum');
// Route::get('/brtabookinglicencecheck',[BrtabookingController::class, 'bookingcount'])->middleware('auth:sanctum');
// Route::get('/brtabookinglicences',[BrtabookingController::class, 'show'])->middleware('auth:sanctum');
// Route::post('/brtagetbookingdailydata',[BrtabookingController::class, 'bookingdailydata'])->middleware('auth:sanctum');

// Route::delete('/brtaboolingdelete/{id}', [BrtabookingController::class,'destroy']);





// =========================Driving licence API Route=======================================================
Route::post('/brtalicence',[BrtabookingController::class, 'licencestore']);
Route::post('/brtabooking',[BrtabookingController::class, 'store']);
Route::post('/brtabookingsubmit',[BrtabookingController::class, 'brtabookinglicencestore']);
Route::get('/brtabookinglicencecheck',[BrtabookingController::class, 'bookingcount']);
Route::get('/brtabookinglicences',[BrtabookingController::class, 'show']);
Route::post('/brtagetbookingdailydata',[BrtabookingController::class, 'bookingdailydata']);

Route::delete('/brtaboolingdelete/{id}', [BrtabookingController::class,'destroy']);


//============================ Epasspost Route API with Bariyar=============================================== 
// Route::post('/epassportchack',[EpassportController::class, 'chackpassport'])->middleware('auth:sanctum');
// Route::post('/epassportstore',[EpassportController::class, 'storepassport'])->middleware('auth:sanctum');
// Route::post('/epassportsubmit',[EpassportController::class, 'submitpassport'])->middleware('auth:sanctum');
// Route::post('/epassportdate',[EpassportController::class, 'datewisepassport'])->middleware('auth:sanctum');

//============================ Epasspost Route API =========================================================== 
Route::post('/epassportchack',[EpassportController::class, 'chackpassport']);
Route::post('/epassportstore',[EpassportController::class, 'storepassport']);

Route::post('/epassportpanding',[EpassportController::class, 'pandingpassport']);

Route::post('/epassportsubmit',[EpassportController::class, 'submitpassport']);
Route::post('/epassportdate',[EpassportController::class, 'datewisepassport']);

//============================ Operator Route Api=======================================================
Route::post('/operator-login',[BookingController::class, 'operatorlogin']);
Route::post('/passportoperator-login',[EpassportController::class, 'operatorlogin']);