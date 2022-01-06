<?php

use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//Class API
Route::get('/class', [StudentClassController::class, 'showAll']);
Route::get('/class/{id}', [StudentClassController::class, 'getOne']);
Route::post('/class/store', [StudentClassController::class, 'store']);
Route::put('/class/update/{id}', [StudentClassController::class, 'update']);
Route::delete('/class/delete/{id}', [StudentClassController::class, 'delete']);

//Subject API

Route::get('/subject', [SubjectController::class, 'showAll']);
Route::get('/subject/{id}', [SubjectController::class, 'getOne']);
Route::post('/subject/store', [SubjectController::class, 'store']);
Route::put('/subject/update/{id}', [SubjectController::class, 'update']);
Route::delete('/subject/delete/{id}', [SubjectController::class, 'delete']);

//JWT API
Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
});
