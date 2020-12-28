<?php

// Routes that only partners and administrators can view
Route::get('/mygift', 'Backend\DashboardController@index');

// Display all information of dashboard
Route::get('/dashboard/user', 'Backend\DashboardController@userInformation');

// EVoucher
Route::get('/voucher/activate', 'Backend\VoucherController@activate');
Route::post('/voucher/register', 'Backend\VoucherController@register');
Route::post('/voucher/ownsership', 'Backend\VoucherController@transferOwnership');