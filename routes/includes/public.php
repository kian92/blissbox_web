<?php

Auth::routes();

Route::get('/instagram/feeds', 'Frontend\HomeController@instagramFeeds');

Route::get('/user/activation/{email}/{activation_code}', 'Backend\UserController@activate');
Route::get('/user/password/create', 'Backend\UserController@updatePassword');

Route::get('/adhoc', 'Backend\AdhocController@instagram');

Route::get('/giftbox/all', 'Frontend\UniverseController@index');
Route::get('/all', 'Frontend\GiftboxController@all');
Route::get('/universe/giftbox/experience/{id}', 'Frontend\ExperienceController@index');
Route::get('/experience/giftbox/{id}', 'Frontend\ExperienceController@all');

Route::get('/search', 'Frontend\SearchController@index');
Route::post('/search', 'Frontend\SearchController@search');

Route::get('/universe/{id}', 'Frontend\UniverseController@fetch');

Route::post('/contact', 'Frontend\HomeController@sendContact');

Route::post('/newsletter', 'Frontend\NewsletterController@store');

Route::get('/cart/session/all', 'Frontend\SessionController@all');
Route::get('/cart/session/count', 'Frontend\SessionController@count');
Route::get('/cart/count', 'Frontend\CartController@count');
Route::post('/cart/session', 'Frontend\SessionController@cart');
Route::post('/cart/session/destroy', 'Frontend\SessionController@destroy');
Route::post('/cart/session/update/package', 'Frontend\CartController@storePackage');
Route::post('/cart/session/update/recipient', 'Frontend\CartController@storeRecipient');
Route::post('/cart/session/update/to', 'Frontend\CartController@storeTo');
Route::post('/cart/session/update/giftmessage', 'Frontend\CartController@storeGiftmessage');
Route::post('/cart/session/update/{id}', 'Frontend\SessionController@update');

Route::get('/giftbox/{id}', 'Frontend\GiftboxController@index');

Route::get('/{path}', 'Frontend\HomeController@handler')->where(['path' => '.*']);

// Coupon
Route::post('/coupon/apply', 'Backend\CouponController@apply');

