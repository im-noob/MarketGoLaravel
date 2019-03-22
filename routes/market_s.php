<?php

/*  Makret User login   MU*/ 

Route::post('login_MU', 'API\Groceries\LoginSignUP@login'); 
Route::post('register_MU', 'API\Groceries\LoginSignUP@register');
Route::post('AvilEmail_MU', 'API\Groceries\LoginSignUP@avilEmail');
Route::post('AvilPhone_MU', 'API\Groceries\LoginSignUP@avilPhone');

Route::post('send_OTP_MU', 'API\Groceries\LoginSignUP@send_OTP_fun');
Route::post('change_password_MU', 'API\Groceries\LoginSignUP@change_password_fun');


Route::get('getAllUser','API\Service\AdminController@getUser');


Route::group(['middleware' => 'auth:api'], function(){
	
	// save profle data
	Route::post('render_setBasicProfile_MU', 'API\Groceries\profile_CUS@setProfileBasicDetails');
	Route::post('render_setShippingAddress_MU', 'API\Groceries\profile_CUS@setProfileShippingDetails');


});





























Route::group(['middleware' => 'auth:api'], function(){
	
	// save profle data
	Route::post('render_setBasicProfile_MU', 'API\Groceries\profile_CUS@setProfileBasicDetails');
	Route::post('render_setShippingAddress_MU', 'API\Groceries\profile_CUS@setProfileShippingDetails');


});






















// payment
Route::post('/PaymentStatus','API\MarketS\payuPayment@payment_success_fail');
Route::get('/payment_getway','API\MarketS\payuPayment@openPaymentGateway');





/****** market s ***/



Route::post('login_S', 'API\MarketS\UserController@login'); 
Route::post('register_S', 'API\MarketS\UserController@register');
Route::post('AvilEmail', 'API\MarketS\UserController@avilEmail');
Route::post('AvilPhone', 'API\MarketS\UserController@avilPhone');

Route::post('send_OTP_S', 'API\MarketS\UserController@send_OTP_fun');
Route::post('change_password_S', 'API\MarketS\UserController@change_password_fun');


Route::group(['middleware' => 'auth:api'], function(){
	
	//for home
	Route::post('incoming_request', 'API\MarketS\Home_C@incoming_request');
	Route::post('SendBill', 'API\MarketS\Home_C@sendBill');
	
	//for profile
	Route::post('postProfileData', 'API\MarketS\Profile_C@profile_getdata');
	Route::post('updateProfileInfo', 'API\MarketS\Profile_C@update_profile_info');
	Route::post('updateWorkInfo', 'API\MarketS\Profile_C@update_work_info');
	Route::post('get_cat_subCat', 'API\MarketS\Profile_C@get_cat_subCatForWork');
	// AvilEmailorPhone
});