<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RestuarentProductAll extends Controller
{
    public function getAllShopProduct(Request $request){

    	$id = $_GET["id"];

    	$record =  DB::table('res_food_map_tab')
  			->join("res_food_cat_tab","res_food_cat_tab.res_food_cat_id","=","res_food_map_tab.res_food_cat_id")
  			->join("res_food_list_tab","res_food_list_tab.res_food_list_id","=","res_food_map_tab.res_food_list_id")
  			->join("res_food_subcat_tab","res_food_subcat_tab.res_food_subcat_id","=","res_food_map_tab.res_food_subcat_id")
  			->join("res_shop_food_tab","res_shop_food_tab.res_food_map_id","=","res_food_map_tab.res_food_map_id")
  			->join("unit_tab","unit_tab.unit_id","=","res_shop_food_tab.unit_id")
  			->select('unit_tab.unit_name','res_food_map_tab.res_food_map_id','res_shop_food_tab.price','res_shop_food_tab.offer','res_shop_food_tab.quantity','res_food_subcat_tab.food_subcat_name','res_food_list_tab.res_food_name','res_food_list_tab.pic')
  			->where('res_shop_food_tab.res_info_id','=',$id)
  			->get();

  		return $record;
    }


    //get Category & sub category list
    public function getCategoryList(Request $request){

    	$record =  DB::table('res_food_cat_tab')
  			->join("res_food_subcat_tab","res_food_subcat_tab.res_food_cat_id","=","res_food_cat_tab.res_food_cat_id")
  			->select('res_food_subcat_tab.*','res_food_cat_tab.cat_name')
  			->get();

  		return $record;

    }


    //get Addable item
    public function addableItem(Request $request){

    	$id = $_GET["id"];

    	$record =  DB::table('res_food_map_tab')
  			->join("res_food_cat_tab","res_food_cat_tab.res_food_cat_id","=","res_food_map_tab.res_food_cat_id")
  			->join("res_food_list_tab","res_food_list_tab.res_food_list_id","=","res_food_map_tab.res_food_list_id")
  			->join("res_food_subcat_tab","res_food_subcat_tab.res_food_subcat_id","=","res_food_map_tab.res_food_subcat_id")
  			->join("unit_tab","unit_tab.unit_id","=","res_food_map_tab.unit_id")
  			->select('unit_tab.unit_name','res_food_map_tab.res_food_map_id','res_food_map_tab.price','res_food_map_tab.offer','res_food_map_tab.quantity','res_food_subcat_tab.food_subcat_name','res_food_list_tab.res_food_name','res_food_list_tab.pic')
  			->whereNotIn('res_food_map_id', function($data){
  				$data->select('res_food_map_tab.res_food_map_id')
                      ->from('res_food_map_tab')
                      ->join('res_shop_food_tab','res_shop_food_tab.res_food_map_id','=','res_food_map_tab.res_food_map_id')
                      ->where('res_food_map_tab.res_info_id','=',$id);
  			})
  			->get();


  		return $record;

    }

}
