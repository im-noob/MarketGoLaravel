<?php
namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function shopInfoGet()
    {
        $data = DB::table('gro_shop_info_tab')->select("*")->orderBy('gro_shop_info_id')->simplePaginate(10);

        return response()->json(['data' => $data]);
    }
	
	public function categoryGet(Request $request)
    {
		 $shopID=$request->Shopid;
	/** SELECT DISTINCT gro_cat_tab.gro_cat_id,gro_cat_tab.gro_cat_name,gro_cat_tab.pic from gro_product_shop_tab  INNER JOIN gro_map_tab ON gro_product_shop_tab.gro_map_id = gro_map_tab.gro_map_id  INNER JOIN gro_cat_tab ON gro_map_tab.gro_cat_id = gro_cat_tab.gro_cat_id */
      // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join("gro_cat_tab","gro_map_tab.gro_cat_id","=","gro_cat_tab.gro_cat_id")
		->select("gro_cat_tab.gro_cat_id","gro_cat_tab.gro_cat_name","gro_cat_tab.pic")
		->where("gro_product_shop_tab.gro_shop_info_id","=",$shopID)
		->distinct()
		->orderBy('gro_cat_id')
		->simplePaginate(20);

        return response()->json(['data' => $data]);
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
		
        return response()->json(['data' => $data]);
    }
	
		/** Product of category*/
	public function productGet(Request $request)
    {
         $value=$request->id;
		$shopID=$request->Shopid;
    
		$data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join('gro_product_list_tab','gro_product_list_tab.gro_product_list_id','=','gro_map_tab.gro_produt_list_id')
        ->select('gro_product_list_tab.gro_product_name','gro_product_shop_tab.gro_price','gro_map_tab.quantity','gro_map_tab.gro_map_id','gro_product_list_tab.gro_product_list_id','gro_product_list_tab.gro_product_info','gro_product_list_tab.pic')
        ->where([['gro_map_tab.gro_subcat_id','=',$value],["gro_product_shop_tab.gro_shop_info_id","=",$shopID]])
        ->distinct()
		->orderBy('gro_cat_id')
		->simplePaginate(20);

        
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
        ->select('gro_product_list_tab.gro_product_name','gro_product_shop_tab.gro_shop_info_id','gro_product_shop_tab.offer','gro_product_shop_tab.gro_price','gro_product_shop_tab.quantity','gro_product_shop_tab.gro_product_shop_id','gro_product_shop_tab.gro_map_id','gro_product_list_tab.gro_product_list_id','gro_product_list_tab.gro_product_info','gro_product_list_tab.pic')
		->where("gro_product_shop_tab.gro_shop_info_id","=",$shopID)
        ->whereIn('gro_product_shop_tab.gro_map_id',$totalProductmap)
		
        ->distinct()
		->orderBy('gro_cat_id')
		->simplePaginate(20);
		// ->whereIn([['gro_product_shop_tab.gro_map_id','=',$totalProductmap],['gro_product_shop_tab.quantity','=',$totalProductQuantity],["gro_product_shop_tab.gro_shop_info_id","=",$shopID]])
       // var_dump($data);
	   $returnArray=array();
		foreach($datas as $data)
		{
			foreach($values as $value)
			{
				if($data->quantity == $value["quantity"] && $data->gro_map_id == $value["gro_map_id"] && $data->gro_shop_info_id == $shopID )
				{
					array_push($returnArray,$data);
				}
			}	
		}
       // var_dump($returnArray);
       return response()->json(['data' => $returnArray]);
    }
}
