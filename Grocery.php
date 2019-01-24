<?php
	Route::get('gro_category','API\Groceries\CategoryController@categoryGet');

	Route::post('gro_subCategory','API\Groceries\CategoryController@subCategoryGet');
	// Route::get('gro_productList','API\Groceries\CategoryController@subProductGet');
	// Route::get('gro_shopInfo','API\Groceries\ShopController@shopInfoGet');
	// Route::post('gro_unit','API\Groceries\CategoryController@unitGet');
	Route::post('gro_product','API\Groceries\CategoryController@productGet');
	Route::post('gro_product_shop','API\Groceries\CategoryController@RelatedShopsGet');
	
	
	
	/** Particular shop */
	Route::post('Grocery/Shop/category','API\Groceries\ShopController@categoryGet');
	Route::post('Grocery/Shop/sub','API\Groceries\ShopController@subCategoryGet');
	Route::post('Grocery/Shop/productList','API\Groceries\ShopController@productGet');
	Route::get('Grocery/Shop/List','API\Groceries\ShopController@shopInfoGet');
	Route::post('Grocery/Shop/product/price','API\Groceries\ShopController@productPriceGet');


	//For Authenticated user.
	Route::group(['middleware' => 'auth:api'], function(){
		Route::post('gro_order','API\Groceries\OrderSet@getRequestOrderValue');
		Route::post('Grocery/Order/History/Item','API\Groceries\OrderSet@getOrderListItem');
		Route::post('Grocery/Order/History','API\Groceries\OrderSet@getOrderList');
		Route::post('Recent','API\Groceries\OrderSet@getRecentListItem');
		
		Route::post('profileGR', 'API\Groceries\profile_GR@UpdateProfile');
		Route::post('Retailer/UpdateOrder', 'API\Groceries\RQuery@UpdateOrder');
		Route::post('Retailer/getOrder', 'API\Groceries\OrderC@getActiveOrder');
		Route::post('Retailer/getPOrder', 'API\Groceries\OrderC@getPackedOrder');
	});

	Route::get('Retailer/getCatrgory', 'API\Groceries\RQuery@getCategory');
	Route::post('Retailer/AddCategory', 'API\Groceries\RQuery@AddCategory');
	
	
		
		
?>