<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponseController;

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

Route::get('/responses', [ResponseController::class, 'index']);
Route::get('/responses/{id}', [ResponseController::class, 'show']);
Route::post('/response', [ResponseController::class, 'store']);
Route::delete('/response/{id}', [ResponseController::class, 'delete']);
