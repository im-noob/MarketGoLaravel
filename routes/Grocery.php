<?php
	Route::get('gro_category','API\Groceries\CategoryController@categoryGet');

	Route::post('gro_subCategory','API\Groceries\CategoryController@subCategoryGet');
	// Route::get('gro_productList','API\Groceries\CategoryController@subProductGet');
	// Route::get('gro_shopInfo','API\Groceries\ShopController@shopInfoGet');
	// Route::post('gro_unit','API\Groceries\CategoryController@unitGet');
	Route::post('gro_product','API\Groceries\CategoryController@productGet');
	Route::post('gro_product_shop','API\Groceries\CategoryController@RelatedShopsGet');
	
	/**Order List*/
	Route::post('gro_order','API\Groceries\OrderSet@getRequestOrderValue');

	Route::get('Grocery/Order','API\Groceries\OrderSet@getOrderList');
	
	
	/** Particular shop */
	Route::post('Grocery/Shop/category','API\Groceries\ShopController@categoryGet');
	Route::post('Grocery/Shop/sub','API\Groceries\ShopController@subCategoryGet');
	Route::post('Grocery/Shop/productList','API\Groceries\ShopController@productGet');
	Route::get('Grocery/Shop/List','API\Groceries\ShopController@shopInfoGet');
	Route::post('Grocery/Shop/product/price','API\Groceries\ShopController@productPriceGet')
<<<<<<< HEAD
?> 
=======
?>
>>>>>>> 1804fdb104a8b709269df502d31c8c70dc810ae0
