<?php

use Illuminate\Http\Request;
include_once(__DIR__.'/Grocery.php');
include_once(__DIR__.'/Restaurant.php');
include_once(__DIR__.'/Services.php');
/* 
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login'); 
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
	// Route::post('details', 'API\UserController@details');
	Route::post('run_query', 'API\UserController@details');
	
	Route::post('insert_query','API\InsertController@insert');
	Route::post('select_query','API\InsertController@select');

	// Route::get('gro_category','API\Groceries\CategoryController@categoryGet');
	// Route::get('gro_subCategory','API\Groceries\CategoryController@subCategoryGet');
	// Route::get('gro_productList','API\Groceries\CategoryController@subProductGet');
	// Route::get('gro_shopInfo','API\Groceries\CategoryController@shopInfoGet');

});