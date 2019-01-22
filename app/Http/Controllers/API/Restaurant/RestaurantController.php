<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    //
	public function categoryGet(Request $request)
    {
		 $shopID=$request->Shopid;
	/** SELECT DISTINCT gro_cat_tab.gro_cat_id,gro_cat_tab.gro_cat_name,gro_cat_tab.pic 
	from gro_product_shop_tab  INNER JOIN gro_map_tab ON
	gro_product_shop_tab.gro_map_id = gro_map_tab.gro_map_id  
	INNER JOIN gro_cat_tab ON gro_map_tab.gro_cat_id = gro_cat_tab.gro_cat_id */
 // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('res_shop_food_tab')
		->join("res_food_map_tab", "res_shop_food_tab.res_food_map_tab","=","res_food_map_tab.res_food_map_tab_id")
		->join("res_food_cat_tab","res_food_cat_tab.gro_cres_food_cat_id","=","res_food_map_tab.gro_cres_food_cat_id")
		->select("res_food_cat_tab.cat_name","res_food_cat_tab.res_food_cat_id","res_food_cat_tab.pic")
		->where("res_shop_food_tab.res_info_id","=",$shopID)
		->distinct()
		->orderBy('res_food_cat_id')
		->simplePaginate(20);
		
        return response()->json(['data' => $data]);
    }
	
	 public function subCategoryGet(Request $request)
    {
        $value=$request->id;
	
		 $data = DB::table('res_shop_food_tab')
		->join("res_food_map_tab", "res_shop_food_tab.gro_map_id","=","res_food_map_tab.gro_map_id")
		->join('res_food_subcat_tab','res_food_subcat_tab.gro_subcat_id','=','res_food_map_tab.gro_subcat_id')
		->select('res_food_subcat_tab.food_subcat_name','res_food_subcat_tab.pic','res_food_subcat_tab.res_food_subcat_id')              
		->where('res_food_map_tab.res_food_cat_id','=',$value)
		->distinct()
		->simplePaginate(20);
		
        return response()->json(['data' => $data]);
    }
}
