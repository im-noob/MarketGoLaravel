<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/Dashboard','web\AdmminC@dashboard')->middleware('aauth');
Route::get('/admin/user','web\AdmminC@getUser')->middleware('aauth');
Route::get('/admin/Ctegory','web\AdmminC@category')->middleware('aauth');
Route::get('admin/selectSub','web\AdmminC@subcat')->middleware('aauth');
Route::post('/admin/addCat','web\AdmminC@catAdd')->middleware('aauth');
Route::post('/admin/addSubcat','web\AdmminC@subcatAdd')->middleware('aauth');
Route::post('/admin/login','web\AdmminC@login');
Route::get('/admin/logout','web\AdmminC@logout');
Route::get('/admin',function(){
    return view('Admin.login');
});

Route::get('/test','Testing@test');


Route::get('/production','Web\Pages@showHomePage');

Route::get('/category/{cat_id}','Web\Pages@showCategoryProducts');


Route::get('/finalise_order','Web\Pages@finaliseOrder');

