<?php
/****** market s ***/

Route::group(['middleware' => 'auth:api'], function(){
	
	//for home
	Route::post('incoming_request', 'API\MarketS\Home_C@incoming_request');
	Route::post('SendBill', 'API\MarketS\Home_C@sendBill');
	
	//for profile
	Route::post('postProfileData', 'API\MarketS\Profile_C@profile_getdata');
	Route::post('updateProfileInfo', 'API\MarketS\Profile_C@update_profile_info');
	Route::post('updateWorkInfo', 'API\MarketS\Profile_C@update_work_info');
});