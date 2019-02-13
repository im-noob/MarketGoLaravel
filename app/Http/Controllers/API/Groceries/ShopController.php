<?php
namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function shopInfoGet()
    {
        $data = DB::table('gro_shop_info_tab')
		->join('users','gro_shop_info_tab.user_id','=','users.id')
					  
		->select('users.noti_token',"gro_shop_info_tab.*")
		->where("gro_shop_info_tab.visiblilty","=",1)
		->orderBy('gro_shop_info_tab.gro_shop_info_id')->simplePaginate(10);

        return response()->json(['data' => $data,'received'=>'yes']);
    }
	
	public function categoryGet(Request $request)
    {
		 $shopID=$request->Shopid;
	/** SELECT DISTINCT gro_cat_tab.gro_cat_id,gro_cat_tab.gro_cat_name,gro_cat_tab.pic from gro_product_shop_tab  INNER JOIN gro_map_tab ON gro_product_shop_tab.gro_map_id = gro_map_tab.gro_map_id  INNER JOIN gro_cat_tab ON gro_map_tab.gro_cat_id = gro_cat_tab.gro_cat_id */
      // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join("gro_cat_tab","gro_map_tab.gro_cat_id","=","gro_cat_tab.gro_cat_id")
		->join('gro_subcat_tab','gro_subcat_tab.gro_subcat_id','=','gro_map_tab.gro_subcat_id')
		->select('gro_subcat_tab.subcat_name','gro_subcat_tab.pic as spic','gro_subcat_tab.gro_subcat_id',"gro_cat_tab.gro_cat_id","gro_cat_tab.gro_cat_name","gro_cat_tab.pic As cpic")
		->where("gro_product_shop_tab.gro_shop_info_id","=",$shopID)
		->distinct()
		->orderBy('gro_cat_tab.gro_cat_id')
		->get();

        return response()->json(['data' => $data,'received'=>'yes']);
    }
	
		/** Sub category of category*/
	public function subCategoryGet(Request $request)
    {
        $value=$request->id;
		$shopID=$request->Shopid;
	
		$data = DB::table('gro_product_shop_tab')
			->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
			->join('gro_subcat_tab','gro_subcat_tab.gro_subcat_id','=','gro_map_tab.gro_subcat_id')
			->select('gro_subcat_tab.subcat_name','gro_subcat_tab.pic','gro_subcat_tab.gro_subcat_id')              
			->where([['gro_map_tab.gro_cat_id','=',$value],["gro_product_shop_tab.gro_shop_info_id","=",$shopID]])
			->distinct()
			->simplePaginate(20);
		
        return response()->json(['data' => $data,'received'=>'yes']);
    }
	
		/** Product of category*/
	public function productGet(Request $request)
    {
        $value=$request->id;
		$shopID=$request->Shopid;

		$data = DB::table('gro_product_shop_tab As shop')
				->join("unit_tab", "unit_tab.unit_id","=","shop.unit_id")
				->join("gro_map_tab As map", "map.gro_map_id","=","shop.gro_map_id")
				->join('gro_product_list_tab As gpl','gpl.gro_product_list_id','=','map.gro_produt_list_id')
				->select('shop.gro_product_shop_id as psid','gpl.gro_product_name As name','shop.inStock as stock','map.gro_cat_id as cid','shop.gro_price as price','shop.quantity','shop.gro_map_id as mid','gpl.gro_product_list_id as plid','gpl.gro_product_info as pinfo','gpl.pic','unit_tab.unit_name')
				->where([["shop.gro_shop_info_id","=",$shopID],['map.gro_subcat_id','=',$value]])
				->orderBy('map.gro_map_id')
				->get();

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
		  array_push($totalProductmap,$value["map"]);
		  array_push($totalProductQuantity,$value["size"]);
		 // var_dump($value["quantity"]);
		}
		//var_dump($shopID);
	$datas = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join('gro_product_list_tab','gro_product_list_tab.gro_product_list_id','=','gro_map_tab.gro_produt_list_id')

		->join("unit_tab", "unit_tab.unit_id","=","gro_product_shop_tab.unit_id")
	   ->select('gro_product_list_tab.gro_product_name as title','gro_map_tab.gro_cat_id as mapcid','gro_product_shop_tab.gro_shop_info_id as shopID','gro_product_shop_tab.offer as offer','gro_product_shop_tab.gro_price as price','gro_product_shop_tab.quantity as size','gro_product_shop_tab.gro_product_shop_id as spid','gro_product_shop_tab.gro_map_id as map','gro_product_list_tab.gro_product_list_id as pid','gro_product_list_tab.gro_product_info as info','gro_product_list_tab.pic as pic','unit_tab.unit_name as unit')

		->where("gro_product_shop_tab.gro_shop_info_id","=",$shopID)
        ->whereIn('gro_product_shop_tab.gro_map_id',$totalProductmap)
		
        ->distinct()

		->orderBy('mapcid')
		->simplePaginate(20);
		// ->whereIn([['gro_product_shop_tab.gro_map_id','=',$totalProductmap],['gro_product_shop_tab.quantity','=',$totalProductQuantity],["gro_product_shop_tab.gro_shop_info_id","=",$shopID]])
      // var_dump($datas);
	   $price=0;
	   $returnArray=array();
		foreach($datas as $data)
		{
			foreach($values as $value)
			{ 

				if($data->size == $value["size"] && $data->map == $value["map"] && $data->unit == $value["unit"] && $data->shopID == $shopID )
				{
					$data->Quantity = $value["Quantity"];
					$data->price = $value["Quantity"] * $data->price- (($data->price * $data->offer)/100);
					$price  = $price + $data->price;
					array_push($returnArray,$data);
				}
			}	
		}

		
       // var_dump($returnArray);
       return response()->json(['data' => $returnArray,'price'=>$price,'received'=>'yes']);
    }
}
