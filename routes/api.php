<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

Route::post('/user', function (Request $request) {
    return [
        'uuid' => '840e3056-ca69-42f8-9590-4a87b6a3dd65',
        'email' => 'some@email'
    ];
});

Route::any('{catchall}', function (Request $request) {
    return response("there is nothing here",  Response::HTTP_NOT_FOUND);
})->where('catchall', '(.*)');
