<?php
namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function categoryGet()
    {
	/** SELECT DISTINCT gro_cat_tab.*,gro_subcat_tab.*
	from gro_product_shop_tab  INNER JOIN gro_map_tab ON gro_product_shop_tab.gro_map_id = 
	gro_map_tab.gro_map_id  INNER JOIN gro_cat_tab ON gro_map_tab.gro_cat_id = gro_cat_tab.gro_cat_id
     INNER JOIN gro_subcat_tab ON gro_map_tab.gro_subcat_id = gro_subcat_tab.gro_subcat_id
INNER JOIN gro_shop_info_tab ON gro_shop_info_tab.gro_shop_info_id = gro_product_shop_tab.gro_shop_info_id
WHERE gro_shop_info_tab.visiblilty =1 */
      // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join("gro_cat_tab","gro_map_tab.gro_cat_id","=","gro_cat_tab.gro_cat_id")
		->join("gro_shop_info_tab","gro_shop_info_tab.gro_shop_info_id","=","gro_product_shop_tab.gro_shop_info_id")
		->select("gro_cat_tab.gro_cat_id","gro_cat_tab.gro_cat_name","gro_cat_tab.pic")
		->where("gro_shop_info_tab.visiblilty","=",1)
		->distinct()
		->orderBy('gro_cat_id')
		->simplePaginate(20);

        return response()->json(['data' => $data]);
    }
	
	 public function category_subGet()
    {
	/** SELECT DISTINCT gro_cat_tab.*,gro_subcat_tab.*
	from gro_product_shop_tab  INNER JOIN gro_map_tab ON gro_product_shop_tab.gro_map_id = 
	gro_map_tab.gro_map_id  INNER JOIN gro_cat_tab ON gro_map_tab.gro_cat_id = gro_cat_tab.gro_cat_id
     INNER JOIN gro_subcat_tab ON gro_map_tab.gro_subcat_id = gro_subcat_tab.gro_subcat_id
INNER JOIN gro_shop_info_tab ON gro_shop_info_tab.gro_shop_info_id = gro_product_shop_tab.gro_shop_info_id
WHERE gro_shop_info_tab.visiblilty =1 */
      // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join("gro_cat_tab","gro_map_tab.gro_cat_id","=","gro_cat_tab.gro_cat_id")
		->join("gro_subcat_tab","gro_map_tab.gro_subcat_id","=","gro_subcat_tab.gro_subcat_id")
		->join("gro_shop_info_tab","gro_shop_info_tab.gro_shop_info_id","=","gro_product_shop_tab.gro_shop_info_id")
		->select("gro_cat_tab.gro_cat_id as cKey","gro_cat_tab.gro_cat_name as cname","gro_cat_tab.pic as cpic","gro_subcat_tab.gro_subcat_id as sKey","gro_subcat_tab.subcat_name as sName","gro_subcat_tab.pic as sPic")
		->where("gro_shop_info_tab.visiblilty","=",1)
		->distinct()
		->orderBy('cKey')
		->get();

        return response()->json(['data' => $data,"received" =>"yes"]);
    }



    public function subCategoryGet(Request $request)
    {
        $value=$request->id;
	
		 $data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		 ->join('gro_subcat_tab','gro_subcat_tab.gro_subcat_id','=','gro_map_tab.gro_subcat_id')
		 ->join("gro_shop_info_tab","gro_shop_info_tab.gro_shop_info_id","=","gro_product_shop_tab.gro_shop_info_id")
		 ->select('gro_subcat_tab.subcat_name','gro_subcat_tab.pic','gro_subcat_tab.gro_subcat_id')              
		->where([['gro_map_tab.gro_cat_id','=',$value],["gro_shop_info_tab.visiblilty","=",1]])
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
		->join("gro_shop_info_tab","gro_shop_info_tab.gro_shop_info_id","=","gro_product_shop_tab.gro_shop_info_id")
		->join("unit_tab", "unit_tab.unit_id","=","gro_product_shop_tab.unit_id")
   		
	   ->select('gro_product_list_tab.gro_product_name as title','gro_product_shop_tab.inStock as stock','gro_map_tab.gro_cat_id as mapcid','gro_product_shop_tab.gro_price as price','gro_map_tab.quantity as size','gro_map_tab.gro_map_id as map','gro_product_list_tab.gro_product_list_id as pid','gro_product_list_tab.gro_product_info as info','gro_product_list_tab.pic as pic','unit_tab.unit_name as unit')
        ->where([['gro_map_tab.gro_subcat_id','=',$value],["gro_shop_info_tab.visiblilty","=",1]])
        ->distinct()
		->orderBy('mapcid')
		->simplePaginate(20);

        
        return response()->json(['data' => $data,"received" =>"yes"]);
    }

        /** From this function we get Related shop of the product  	visiblilty*/
    public function RelatedShopsGet(Request $request)
    {
        $value = $request->id;
      //  SELECT `gro_map_id` FROM `gro_map_tab` WHERE `gro_produt_list_id` =45
        $mapID=DB::table('gro_map_tab')->select('gro_map_id')->where('gro_produt_list_id','=',$value)->get();
      // var_dump($mapID[0]);
	    $data = DB::table('gro_product_shop_tab')
                        ->join('gro_shop_info_tab','gro_shop_info_tab.gro_shop_info_id','=','gro_product_shop_tab.gro_shop_info_id')
                       ->join('users','gro_shop_info_tab.user_id','=','users.id')
					   ->join("unit_tab", "unit_tab.unit_id","=","gro_product_shop_tab.unit_id")
   		
					   ->select('gro_shop_info_tab.name as title','gro_product_shop_tab.gro_map_id as map','users.noti_token as ntoken','gro_shop_info_tab.city as city','gro_shop_info_tab.address as address','gro_shop_info_tab.gro_shop_info_id as key','gro_shop_info_tab.state as state','gro_product_shop_tab.offer as offer','gro_product_shop_tab.gro_price as price','gro_product_shop_tab.gro_product_shop_id as pid','unit_tab.unit_name as unit')
                        ->where('gro_product_shop_tab.gro_map_id','=',$mapID[0]->gro_map_id)
                        ->simplePaginate(100);
		  //  var_dump($data);	$mapID[0]->gro_map_id
		return response()->json(['data' => $data,"received" =>"yes"]);
    }
        
    // public function orderListGet()
    // {
    //     $data = DB::table(' gro_cart_tab')->orderBy('gro_cart_id')->simplePaginate(10);

        
    //     return response()->json(['data' => $data]);
    // }
}
