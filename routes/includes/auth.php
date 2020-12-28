<?php


Route::get('/profile', 'Backend\ProfileController@index');

// Cart
Route::get('/cart/all', 'Frontend\CartController@all');
Route::put('/cart/update/{id}', 'Frontend\CartController@update');
Route::post('/cart', 'Frontend\CartController@addToCart');
Route::post('/cart/update/package', 'Frontend\CartController@storePackage');
Route::post('/cart/update/recipient', 'Frontend\CartController@storeRecipient');
Route::post('/cart/update/to', 'Frontend\CartController@storeTo');
Route::post('/cart/update/giftmessage', 'Frontend\CartController@storeGiftmessage');
Route::post('/cart/destroy', 'Frontend\CartController@destroy');

// Order
Route::post('/order/deliver', 'Frontend\OrderController@deliver');
Route::post('/order/store', 'Frontend\OrderController@store');

// Purchase
Route::get('/purchase', 'Backend\PurchaseController@index');
Route::get('/purchase/all', 'Backend\PurchaseController@all');
Route::get('/purchase/success', 'Backend\PurchaseController@purchaseSuccess');
Route::get('/purchase/history', 'Backend\PurchaseController@purchaseHistory');
Route::get('/purchase/history/order/{id}', 'Backend\PurchaseController@showOrder');
Route::post('/purchase', 'Backend\PurchaseController@paymentWithStripe');
Route::post('/purchase/history/', 'Backend\PurchaseController@getPurchaseHistory');

// Delivery
Route::get('/delivery/{id}', 'Backend\BillingInformationController@index');

// Billing
Route::get('/billinginformation/fetch', 'Backend\BillingInformationController@fetch');
Route::post('/billing/store', 'Backend\BillingInformationController@store');

// Experience
Route::get('/experience/all', 'Backend\ExperienceController@all');
Route::get('/giftbox/experience/{id}', 'Backend\ExperienceController@show');
Route::get('/experience/fetch/{id}', 'Backend\GiftboxController@fetchExperience');

// EVoucher
Route::get('/voucher/ownership/{activation}', 'Backend\VoucherController@acceptVoucher');
Route::post('/voucher/check', 'Backend\VoucherController@checkQuantity');
Route::post('/voucher/send', 'Backend\VoucherController@sendEmail');

// Profile
Route::get('/password/change', 'Backend\UserController@changePassword');
Route::post('/password/change', 'Backend\UserController@change');

// Wishlist
Route::post('/wishlist/store', 'Frontend\WishlistController@store');
Route::post('/wishlist/destroy', 'Frontend\WishlistController@destroy');

// Review
Route::post('/review/store', 'Frontend\ReviewController@store');