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

Route::post('/login', 'API\UserController@login');
Route::post('/register', 'API\UserController@register');
Route::post('/forget_password', 'API\UserController@forgetPassword');

Route::get('/experience/all', 'API\ExperienceController@all');

Route::group(['middleware' => 'cors'], function() {
    Route::post('/event/guerrilla/signup', 'API\EventController@store');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/user/all', 'API\UserController@all');
    Route::get('/universe/all', 'API\UniverseController@all');
    Route::get('/giftbox/all', 'API\GiftboxController@all');
});

include('api_includes/merchant.php');