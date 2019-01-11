 <?php
	Route::get('Services/Category','API\Service\ServicesController@categoryGet');
	Route::get('Services/Category/sub','API\Service\ServicesController@subCategoryGet');

 ?>