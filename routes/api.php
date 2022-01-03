<?php

use App\Http\Controllers\Api\StudentClassController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/class', [StudentClassController::class, 'showAll']);
Route::get('/class/{id}', [StudentClassController::class, 'getOne']);
Route::post('/class/store', [StudentClassController::class, 'store']);
Route::put('/class/update/{id}', [StudentClassController::class, 'update']);
Route::delete('/class/delete/{id}', [StudentClassController::class, 'delete']);

