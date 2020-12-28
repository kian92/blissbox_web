<?php
/**
 * Created by PhpStorm.
 * User: Wee Hong
 * Date: 21/12/2017
 * Time: 1:22 AM
 */

Route::post('/merchant/status', 'API\Merchant\AuthController@status');

Route::group(['middleware' => 'auth:api', 'cors'], function() {
    Route::get('/merchant/dashboard/search/{id}/{query}', 'API\Merchant\DashboardController@searchUpcomingBooking');    
    Route::get('/merchant/dashboard/{id}/{limit}/{offset}', 'API\Merchant\DashboardController@dashboard');
    Route::post('/merchant/dashboard/booking/redeem', 'API\Merchant\RedemptionController@redeem');
    Route::delete('/merchant/dashboard/booking/revoke',  'API\Merchant\BookingController@revoke');
});