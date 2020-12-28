<?php

Route::get('/dashboard/admin', 'Backend\DashboardController@index');
Route::get('/dashboard/orders', 'Backend\DashboardController@adminInformation');

// User
Route::get('/user/fetch/{id}', 'Backend\UserController@fetch');

// Company
Route::get('/company', 'Backend\CompanyController@index');
Route::get('/company/all', 'Backend\CompanyController@all');
Route::get('/company/fetch/{id}', 'Backend\CompanyController@fetch');
Route::get('/company/create', 'Backend\CompanyController@create');
Route::post('/company/create', 'Backend\CompanyController@store');

// Universe
Route::get('/universe', 'Backend\UniverseController@index');
Route::get('/universe/all', 'Backend\UniverseController@all');
Route::get('/universe/create', 'Backend\UniverseController@create');
Route::get('/universe/{id}/edit', 'Backend\UniverseController@edit');
Route::get('/universe/fetch/{id}', 'Backend\UniverseController@fetch');
Route::post('/universe/create', 'Backend\UniverseController@store');
Route::post('/universe/update/{id}', 'Backend\UniverseController@update');
Route::post('/universe/destroy/{id}', 'Backend\UniverseController@destroy');

// Gift boxes
Route::get('/giftbox', 'Backend\GiftboxController@index');
Route::get('/giftbox/parent/{id}', 'Backend\GiftboxController@showParent');
Route::get('/giftbox/admin/all', 'Backend\GiftboxController@all');
Route::get('/giftbox/create', 'Backend\GiftboxController@create');
Route::get('/giftbox/{id}/edit', 'Backend\GiftboxController@edit');
Route::get('/giftbox/fetch/{id}', 'Backend\GiftboxController@fetch');
Route::post('/giftbox/create', 'Backend\GiftboxController@store');
Route::post('/giftbox/update/{id}', 'Backend\GiftboxController@update');
Route::post('/giftbox/destroy/{id}', 'Backend\GiftboxController@destroy');

// EVoucher
Route::get('/voucher/activate/admin', 'Backend\VoucherCOntroller@voucherActivation');
Route::post('/voucher/activate', 'Backend\VoucherCOntroller@activateVoucher');

// Experience
Route::get('/experience', 'Backend\ExperienceController@index');
Route::get('/experience/create', 'Backend\ExperienceController@create');
Route::post('/experience/create', 'Backend\ExperienceController@store');

Route::get('/payment/fetch/{id}', 'Backend\PaymentController@fetch');

// Generate Reference Code
Route::post('/generate', 'Backend\VoucherController@store');

// Temporary
Route::get('/email/media', 'Backend\MailController@media');