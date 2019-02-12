 <?php
	Route::get('Restaurant/Shop/List','API\Restaurant\RestaurantShopController@shopInfoGet');
	Route::post('Restaurant/Shop/cat','API\Restaurant\RestaurantShopController@categoryGet');
	Route::post('Restaurant/Shop/subCat','API\Restaurant\RestaurantShopController@subCategoryGet');
	Route::post('Restaurant/Shop/pro','API\Restaurant\RestaurantShopController@productGet');

	
	Route::get('Restaurant/cat','API\Restaurant\RestaurantController@categoryGet');
	Route::post('Restaurant/subCat','API\Restaurant\RestaurantController@subCategoryGet');
	Route::post('Restaurant/pro','API\Restaurant\RestaurantController@productGet');

	

	//Root for restirent Apps
	Route::post('loginRT', 'API\Restaurant\AuthemticationR@login'); 
	Route::post('registerRT', 'API\Restaurant\AuthemticationR@register');
	Route::group(['middleware' => 'auth:api'], function(){
		// Route::post('details', 'API\UserController@details');
		Route::post('profileRT', 'API\Restaurant\profile_RT@UpdateProfile');
		Route::Post('order/getItem', 'API\Restaurant\RestoQuery@getOrderItem');
		Route::post('user/retting', 'API\Restaurant\RestuarentRating@getRating');
		Route::get('order/active', 'API\Restaurant\RestuarentOrderAll@getCurrentOrder');
		Route::get('order/Inactive', 'API\Restaurant\RestuarentOrderAll@getAllOrder');
		Route::get('order/status', 'API\Restaurant\RestuarentOrderAll@UpdatecCartStatus');
		Route::get('order/balance', 'API\Restaurant\RestuarentOrderAll@UpdatecCartBalance');
		Route::get('product/added', 'API\Restaurant\RestuarentProductAll@getAllShopProduct');
		Route::get('product/addable', 'API\Restaurant\RestuarentOrderAll@addableItem');
		Route::get('product/catlist', 'API\Restaurant\RestuarentOrderAll@getCategoryList');



		Route::post('profileRT', 'API\Restaurant\profile_RT@UpdateProfile');
		Route::post('Restaurant/UpdateOrder', 'API\Restaurant\RestaurantOrderController@UpdateOrder');
		Route::post('Restaurant/getOrder', 'API\Restaurant\RestaurantOrderController@getActiveOrder');
		Route::post('Restaurant/getOrderItem', 'API\Restaurant\RestaurantOrderController@getOrderedItem');
		Route::post('Restaurant/getOffer', 'API\Restaurant\ROfferController@getOffer');
		Route::post('Restaurant/setOffer', 'API\Restaurant\ROfferController@setOffer');
		Route::post('Restaurant/getPOrder', 'API\Restaurant\RestaurantOrderController@getPackedOrder');
		Route::post('Restaurant/getProductList', 'API\Restaurant\RProductController@getShpProduct');
		Route::post('Restaurant/getRPList', 'API\Restaurant\RProductController@getRestProductList');
		Route::post('Restaurant/addProduct', 'API\Restaurant\RProductController@addProductItem');
		Route::post('Restaurant/getProduct', 'API\Restaurant\RProductController@getProduct');
		Route::POST('Restaurant/searchP', 'API\Restaurant\RProductController@ShopSearchData');
		Route::POST('Restaurant/searchR', 'API\Restaurant\RProductController@RestSearchData');
	});

	Route::get('Resto/getCatrgory', 'API\Restaurant\RestoQuery@getCategory');
	Route::post('Resto/AddCategory', 'API\Restaurant\RestoQuery@AddCategory');
 ?>