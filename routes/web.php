<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Blissbox Frontend
 * Everyone is allow to view the content of the view without restriction
 *
 */

/*
 * Blissbox Backend
 * Only authenticate user is allow to access the specified route
 *
 * Authenticate Type
 * U = User,
 * M = Merchant,
 * A = Administrator
 *
 */

Route::get('/test/pdf', 'Backend\AdhocController@generateFakeData');

Route::post('/shopify/user/register', 'Shopify\RegisterController@register');

// Route for Authenticate Users
Route::group(['middleware' => ['auth']], function() {

    include('includes/auth.php');

    Route::get('/', 'Backend\ProfileController@index');

});

// Route for User Only
Route::group(['middleware' => ['auth', 'type:U']], function () {

    include('includes/user.php');

});

// Route for Merchant Only
Route::group(['middleware' => ['auth', 'type:M']], function () {

    include('includes/merchant.php');

});

// Route for Administrator Only
Route::group(['middleware' => ['auth', 'type:A']], function () {

    include('includes/admin.php');

});

include('includes/public.php');