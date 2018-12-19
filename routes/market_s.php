<?php
/****** market s ***/



Route::post('login_S', 'API\MarketS\UserController@login'); 
Route::post('register_S', 'API\MarketS\UserController@register');
Route::post('AvilEmail', 'API\MarketS\UserController@avilEmail');
Route::post('AvilPhone', 'API\MarketS\UserController@avilPhone');

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