<?php
namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function categoryGet()
    {
	/** SELECT DISTINCT gro_cat_tab.gro_cat_id,gro_cat_tab.gro_cat_name,gro_cat_tab.pic from gro_product_shop_tab  INNER JOIN gro_map_tab ON gro_product_shop_tab.gro_map_id = gro_map_tab.gro_map_id  INNER JOIN gro_cat_tab ON gro_map_tab.gro_cat_id = gro_cat_tab.gro_cat_id */
      // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join("gro_cat_tab","gro_map_tab.gro_cat_id","=","gro_cat_tab.gro_cat_id")
		->select("gro_cat_tab.gro_cat_id","gro_cat_tab.gro_cat_name","gro_cat_tab.pic")
		->distinct()
		->orderBy('gro_cat_id')
		->simplePaginate(20);

        return response()->json(['data' => $data]);
    }



    public function subCategoryGet(Request $request)
    {
        $value=$request->id;
	
		 $data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		 ->join('gro_subcat_tab','gro_subcat_tab.gro_subcat_id','=','gro_map_tab.gro_subcat_id')
		 ->select('gro_subcat_tab.subcat_name','gro_subcat_tab.pic','gro_subcat_tab.gro_subcat_id')              
		->where('gro_map_tab.gro_cat_id','=',$value)
		->distinct()
		->simplePaginate(20);
		
        return response()->json(['data' => $data]);
    }
	
   public function subProductGet()
    {
        $data = DB::table('gro_product_list_tab')->orderBy('gro_product_list_id')->simplePaginate(10);

        
        return response()->json(['data' => $data]);
    }
    
    public function unitGet()
    {
        $data = DB::table('unit_tab')->orderBy('unit_id')->simplePaginate(10);

        
        return response()->json(['data' => $data]);
    }

    public function productGet(Request $request)
    {
        $value=$request->id;
    
		$data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join('gro_product_list_tab','gro_product_list_tab.gro_product_list_id','=','gro_map_tab.gro_produt_list_id')

        ->select('gro_product_list_tab.gro_product_name','gro_map_tab.gro_cat_id','gro_product_shop_tab.gro_price','gro_map_tab.quantity','gro_map_tab.gro_map_id','gro_product_list_tab.gro_product_list_id','gro_product_list_tab.gro_product_info','gro_product_list_tab.pic')
        ->where('gro_map_tab.gro_subcat_id','=',$value)
        ->distinct()
		->orderBy('gro_map_tab.gro_cat_id')
		->simplePaginate(20);

        
        return response()->json(['data' => $data]);
    }

        /** From this function we get Related shop of the product */
    public function RelatedShopsGet(Request $request)
    {
        $value = $request->id;
      //  SELECT `gro_map_id` FROM `gro_map_tab` WHERE `gro_produt_list_id` =45
        $mapID=DB::table('gro_map_tab')->select('gro_map_id')->where('gro_produt_list_id','=',$value)->get();
      // var_dump($mapID[0]);
	    $data = DB::table('gro_product_shop_tab')
                        ->join('gro_shop_info_tab','gro_shop_info_tab.gro_shop_info_id','=','gro_product_shop_tab.gro_shop_info_id')
                        ->select('gro_shop_info_tab.name','gro_product_shop_tab.gro_map_id','gro_shop_info_tab.city','gro_shop_info_tab.address','gro_shop_info_tab.gro_shop_info_id','gro_shop_info_tab.state','gro_product_shop_tab.offer','gro_product_shop_tab.gro_price','gro_product_shop_tab.gro_product_shop_id')
                        ->where('gro_product_shop_tab.gro_map_id','=',$mapID[0]->gro_map_id)
                        ->simplePaginate(100);
      //  var_dump($data);	$mapID[0]->gro_map_id
     return response()->json(['data' => $data]);
    }
        
    // public function orderListGet()
    // {
    //     $data = DB::table(' gro_cart_tab')->orderBy('gro_cart_id')->simplePaginate(10);

        
    //     return response()->json(['data' => $data]);
    // }
}
