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

Route::get('/', function () {
	
    return view('welcome');
});


Route::get('/test','Testing@test');





Route::get('/payu',function(){
	return view('payu');
});





// payment
Route::post('/PaymentStatus','API\MarketS\payuPayment@payment_success_fail');
Route::get('/payment_getway','API\MarketS\payuPayment@openPaymentGateway');


