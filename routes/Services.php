 <?php

	Route::get('Services/Category','API\Service\ServicesController@categoryGet');
	Route::get('Services/Category/sub','API\Service\ServicesController@subCategoryGet');
 	// user Service (US)

	Route::post('cat_sub_cat_US','API\Service\ServicesController@Cat_SubCat_Json');
 ?>