<?php
	Route::get('gro_category','API\Groceries\CategoryController@categoryGet');

	Route::post('gro_subCategory','API\Groceries\CategoryController@subCategoryGet');
	// Route::get('gro_productList','API\Groceries\CategoryController@subProductGet');
	// Route::get('gro_shopInfo','API\Groceries\ShopController@shopInfoGet');
	// Route::post('gro_unit','API\Groceries\CategoryController@unitGet');
	Route::post('gro_product','API\Groceries\CategoryController@productGet');
?>