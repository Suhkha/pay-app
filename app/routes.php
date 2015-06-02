<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//-- PayPal
Route::get('/', 'PaypalController@index');
Route::post('pay_via_paypal', 'PaypalController@postPayment');
Route::get('payment_success', 'PaypalController@getSuccessPayment');
Route::get('cancel_order', 'PaypalController@getCancelPayment');

//-- Conekta
Route::get('form_conekta', 'ConektaController@index');
Route::resource('pay_via_conekta', 'ConektaController@payment');
