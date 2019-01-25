<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
   
	/** Shoplist */
	public function categoryGet(Request $request)
    {
		
	/** SELECT DISTINCT `res_food_cat_tab`.`res_food_cat_id`,`res_food_cat_tab`.`cat_name`,`res_food_cat_tab`.`pic` from `res_shop_food_tab`  
INNER JOIN `res_food_map_tab` ON `res_food_map_tab`.`res_food_map_id` = `res_shop_food_tab`.`res_food_map_id`
INNER JOIN `res_food_cat_tab` ON `res_food_cat_tab`.`res_food_cat_id`  = `res_food_map_tab`.`res_food_cat_id`
WHERE  `res_info_id` = 3*/
      // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('res_shop_food_tab')
		->join("res_food_map_tab", "res_shop_food_tab.res_food_map_id","=","res_food_map_tab.res_food_map_id")
		->join("res_food_cat_tab","res_food_map_tab.res_food_cat_id","=","res_food_cat_tab.res_food_cat_id")
		
		->select("res_food_cat_tab.res_food_cat_id","res_food_cat_tab.cat_name","res_food_cat_tab.pic")
		
		->distinct()
		->orderBy('res_food_cat_tab.res_food_cat_id')
		->simplePaginate(20);

        return response()->json(['data' => $data]);
    }
	
		/** Sub category of category*/
	public function subCategoryGet(Request $request)
    {
		/** SELECT DISTINCT `res_food_subcat_tab`.`res_food_subcat_id`,`res_food_subcat_tab`.`food_subcat_name` ,`res_food_subcat_tab`.`pic` from `res_shop_food_tab`  
INNER JOIN `res_food_map_tab` ON `res_food_map_tab`.`res_food_map_id` = `res_shop_food_tab`.`res_food_map_id`
INNER JOIN `res_food_subcat_tab` ON `res_food_subcat_tab`.`res_food_subcat_id`  = `res_food_map_tab`.`res_food_subcat_id` 
WHERE  `res_shop_food_tab`.`res_info_id` = 3 AND `res_food_map_tab`.`res_food_cat_id` = 1*/
        $value=$request->id;
	
		$data = DB::table('res_shop_food_tab')
			->join("res_food_map_tab", "res_shop_food_tab.res_food_map_id","=","res_food_map_tab.res_food_map_id")
			->join('res_food_subcat_tab','res_food_subcat_tab.res_food_subcat_id','=','res_food_map_tab.res_food_subcat_id')
			->select("res_food_subcat_tab.res_food_subcat_id","res_food_subcat_tab.food_subcat_name" ,"res_food_subcat_tab.pic")              
			->where('res_food_map_tab.res_food_cat_id','=',$value)
			->distinct()
			->simplePaginate(20);
		
        return response()->json(['data' => $data]);
    }
	
		/** Product of category*/
	public function productGet(Request $request)
    {
		/**SELECT DISTINCT `res_food_list_tab`.`res_food_name`,`res_food_list_tab`.`food_info`,`res_food_list_tab`.`pic`,`res_food_list_tab`.`res_food_list_id`,`res_shop_food_tab`.`res_food_map_id`,`res_shop_food_tab`.`price`,`res_shop_food_tab`.`pic`,`res_shop_food_tab`.`rating`,`res_shop_food_tab`.`offer`,`res_shop_food_tab`.`quantity`,`unit_tab`.`unit_name` FROM `res_shop_food_tab`
INNER JOIN `res_food_map_tab` ON `res_food_map_tab`.`res_food_map_id` = `res_shop_food_tab`.`res_food_map_id` 
INNER JOIN `res_food_list_tab` ON `res_food_list_tab`.`res_food_list_id` = `res_food_map_tab`.`res_food_list_id` 

INNER JOIN `unit_tab` ON `unit_tab`.`unit_id` = `res_shop_food_tab`.`unit_id`
WHERE `res_shop_food_tab`.`res_info_id` = 3 AND `res_food_map_tab`.`res_food_subcat_id` = 1*/
         $value=$request->id;
    
		$data = DB::table('res_shop_food_tab')
		->join("res_food_map_tab", "res_shop_food_tab.res_food_map_id","=","res_food_map_tab.res_food_map_id")
		->join('res_food_list_tab','res_food_list_tab.res_food_list_id','=','res_food_map_tab.res_food_list_id')

        ->join("unit_tab", "unit_tab.unit_id","=","res_shop_food_tab.unit_id")
   		->select("res_food_list_tab.res_food_name","res_food_list_tab.food_info","res_food_list_tab.pic","res_food_list_tab.res_food_list_id","res_shop_food_tab.res_food_map_id","res_shop_food_tab.price","res_shop_food_tab.pic","res_shop_food_tab.rating","res_shop_food_tab.offer","res_shop_food_tab.quantity","unit_tab.unit_name")
        ->where('res_food_map_tab.res_food_subcat_id','=',$value)
        ->distinct()
		->orderBy('res_food_list_tab.res_food_list_id')
		->simplePaginate(40);

        
        return response()->json(['data' => $data]);
    }
	
}
