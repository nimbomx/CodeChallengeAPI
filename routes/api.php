<?php

use Illuminate\Http\Request;

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

Route::get('/test', function (Request $request) {
    return ['mesage' => 'getOk'];
});
Route::post('/test', function (Request $request) {
    return ['mesage' => 'postOk'];
});
Route::put('/test', function (Request $request) {
    return ['mesage' => 'putOk'];
});
Route::delete('/test', function (Request $request) {
    return ['mesage' => 'deleteOk'];
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
