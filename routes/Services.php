 <?php

	Route::get('Services/Category','API\Service\ServicesController@categoryGet');
	Route::get('Services/Category/sub','API\Service\ServicesController@subCategoryGet');
 	// user Service (US)

	Route::post('cat_sub_cat_US','API\Service\ServicesController@Cat_SubCat_Json');
	Route::post('render_ServiceManList_US','API\Service\ServicesController@ServiceManList_get');
	Route::post('render_renderProfileData_US','API\Service\ServicesController@renderProfileData_get');
	Route::post('render_HandleSendRequest_HierMe_US','API\Service\ServicesController@HierMe_do');

	// history section
	Route::post('render_userServiceHist_US','API\Service\ServicesController@ServiceHistory_get');
	//
	
	
	
	Route::post('filterS', 'API\MarketS\FielterServicesController@filter'); 
	Route::post('getCatHW', 'API\MarketS\FielterServicesController@returnCat'); 
	Route::post('getSubCatHW', 'API\MarketS\FielterServicesController@returnSubCat'); 
	Route::post('getDescHW', 'API\MarketS\FielterServicesController@returnDesc');

 ?>