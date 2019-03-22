<?php


use Illuminate\Http\Request;
include_once(__DIR__.'/Grocery.php');
include_once(__DIR__.'/Restaurant.php');
include_once(__DIR__.'/Services.php');
include_once(__DIR__.'/market_s.php');
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
Route::post('filter', 'FiltersController@filter'); 

Route::post('login', 'API\MarketS\UserController@login'); 
Route::post('register', 'API\MarketS\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
	// Route::post('details', 'API\UserController@details')
	Route::post('run_query', 'API\Groceries\RQuery@details');
	
	Route::post('insert_query','API\InsertController@insert');
	Route::post('select_query','API\InsertController@select');
	Route::post('update_query','API\InsertController@update');

});