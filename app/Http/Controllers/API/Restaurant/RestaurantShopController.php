<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RestaurantShopController extends Controller
{
    public function shopInfoGet()
    {
        $data = DB::table('res_info_tab')->select("*")->orderBy('res_info_id')->simplePaginate(10);

        return response()->json(['data' => $data]);
    }
	
	/** Shoplist */
	public function categoryGet(Request $request)
    {
		 $shopID=$request->Shopid;
	/** SELECT DISTINCT `res_food_cat_tab`.`res_food_cat_id`,`res_food_cat_tab`.`cat_name`,`res_food_cat_tab`.`pic` from `res_shop_food_tab`  
INNER JOIN `res_food_map_tab` ON `res_food_map_tab`.`res_food_map_id` = `res_shop_food_tab`.`res_food_map_id`
INNER JOIN `res_food_cat_tab` ON `res_food_cat_tab`.`res_food_cat_id`  = `res_food_map_tab`.`res_food_cat_id`
WHERE  `res_info_id` = 3*/
      // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('res_shop_food_tab')
		->join("res_food_map_tab", "res_shop_food_tab.res_food_map_id","=","res_food_map_tab.res_food_map_id")
		->join("res_food_cat_tab","res_food_map_tab.res_food_cat_id","=","res_food_cat_tab.res_food_cat_id")
		
		->select("res_food_cat_tab.res_food_cat_id","res_food_cat_tab.cat_name","res_food_cat_tab.pic")
		->where("res_shop_food_tab.res_info_id","=",$shopID)
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
		$shopID=$request->Shopid;
	
		$data = DB::table('res_shop_food_tab')
			->join("res_food_map_tab", "res_shop_food_tab.res_food_map_id","=","res_food_map_tab.res_food_map_id")
			->join('res_food_subcat_tab','res_food_subcat_tab.res_food_subcat_id','=','res_food_map_tab.res_food_subcat_id')
			->select("res_food_subcat_tab.res_food_subcat_id","res_food_subcat_tab.food_subcat_name" ,"res_food_subcat_tab.pic")              
			->where([['res_food_map_tab.res_food_cat_id','=',$value],["res_shop_food_tab.res_info_id","=",$shopID]])
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
		$shopID=$request->Shopid;
    
		$data = DB::table('res_shop_food_tab')
		->join("res_food_map_tab", "res_shop_food_tab.res_food_map_id","=","res_food_map_tab.res_food_map_id")
		->join('res_food_list_tab','res_food_list_tab.res_food_list_id','=','res_food_map_tab.res_food_list_id')

        ->join("unit_tab", "unit_tab.unit_id","=","res_shop_food_tab.unit_id")
   		->select("res_food_list_tab.res_food_name","res_food_list_tab.food_info","res_food_list_tab.pic","res_food_list_tab.res_food_list_id","res_shop_food_tab.res_food_map_id","res_shop_food_tab.price","res_shop_food_tab.pic","res_shop_food_tab.rating","res_shop_food_tab.offer","res_shop_food_tab.quantity","unit_tab.unit_name")
        ->where([['res_food_map_tab.res_food_subcat_id','=',$value],["res_shop_food_tab.res_info_id","=",$shopID]])
        ->distinct()
		->orderBy('res_food_list_tab.res_food_list_id')
		->simplePaginate(40);

        
        return response()->json(['data' => $data]);
    }
	
	/** Product  price */
	public function productPriceGet(Request $request)
    {
         $values=$request->id;
		$shopID=$request->Shopid;
		//var_dump($request->id);
		$totalProductmap=array();
		$totalProductQuantity=array();
		foreach($values as $value){
		  array_push($totalProductmap,$value["gro_map_id"]);
		  array_push($totalProductQuantity,$value["quantity"]);
		 // var_dump($value["quantity"]);
		}
		//var_dump($shopID);
	$datas = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join('gro_product_list_tab','gro_product_list_tab.gro_product_list_id','=','gro_map_tab.gro_produt_list_id')

		->join("unit_tab", "unit_tab.unit_id","=","gro_product_shop_tab.unit_id")
	   ->select('gro_product_list_tab.gro_product_name','gro_map_tab.gro_cat_id','gro_product_shop_tab.gro_shop_info_id','gro_product_shop_tab.offer','gro_product_shop_tab.gro_price','gro_product_shop_tab.quantity','gro_product_shop_tab.gro_product_shop_id','gro_product_shop_tab.gro_map_id','gro_product_list_tab.gro_product_list_id','gro_product_list_tab.gro_product_info','gro_product_list_tab.pic','unit_tab.unit_name')

		->where("gro_product_shop_tab.gro_shop_info_id","=",$shopID)
        ->whereIn('gro_product_shop_tab.gro_map_id',$totalProductmap)
		
        ->distinct()

		->orderBy('gro_map_tab.gro_cat_id')
		->simplePaginate(20);
		// ->whereIn([['gro_product_shop_tab.gro_map_id','=',$totalProductmap],['gro_product_shop_tab.quantity','=',$totalProductQuantity],["gro_product_shop_tab.gro_shop_info_id","=",$shopID]])
       // var_dump($datas);
	   $price=0;
	   $returnArray=array();
		foreach($datas as $data)
		{
			foreach($values as $value)
			{

				if($data->quantity == $value["quantity"] && $data->gro_map_id == $value["gro_map_id"] && $data->unit_name == $value["unit_name"] && $data->gro_shop_info_id == $shopID )
				{
					$data->Quantity = $value["Quantity"];
					$data->price = $value["Quantity"] * $data->gro_price- (($data->gro_price * $data->offer)/100);
					$price  = $price + $data->price;
					array_push($returnArray,$data);
				}
			}	
		}

		
       // var_dump($returnArray);
       return response()->json(['data' => $returnArray,'price'=>$price]);
    }
}
