<?php

// Dashboard
Route::get('/dashboard/merchant', 'Backend\DashboardController@index');
Route::get('/dashboard/merchant/all', 'Backend\DashboardController@merchantInformation');

// Experience
Route::get('/experience/search/{value}', 'Backend\ExperienceController@search');
Route::get('/experience/fetch/validate/{code}', 'Backend\ExperienceController@fetchExperience');
Route::get('/experience/fetch', 'Backend\ExperienceController@fetch');

// Booking
Route::get('/booking', 'Backend\BookingController@index');
Route::get('/booking/create', 'Backend\BookingController@create');
Route::post('/booking/store', 'Backend\BookingController@store');
Route::post('/booking/fetch', 'Backend\BookingController@fetch');

// EVoucher
Route::get('/voucher/validate', 'Backend\VoucherController@check');
Route::post('/voucher/validate', 'Backend\VoucherController@validateVoucher');
Route::get('/voucher/redeem', 'Backend\RedemptionController@redeem');
Route::post('/voucher/redeem', 'Backend\RedemptionController@redeemVoucher');
Route::post('/voucher/dashboard/redeem', 'Backend\RedemptionController@redeemDashboard');
Route::post('/voucher/user/check', 'Backend\VoucherController@checkVoucherOwner');
Route::post('/voucher/cancellation', 'Backend\BookingController@cancellation');