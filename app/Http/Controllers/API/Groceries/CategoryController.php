<?php
namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function categoryGet()
    {	
	 $data = DB::table('gro_product_shop_tab')
		->join("gro_map_tab", "gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->join("gro_cat_tab","gro_map_tab.gro_cat_id","=","gro_cat_tab.gro_cat_id")
		->join("gro_shop_info_tab","gro_shop_info_tab.gro_shop_info_id","=","gro_product_shop_tab.gro_shop_info_id")
		->select("gro_cat_tab.gro_cat_id as mapcid","gro_cat_tab.gro_cat_name as title","gro_cat_tab.pic as pic")
		->where("gro_shop_info_tab.visiblilty","=",1)
		->distinct()
		->orderBy('mapcid')
		->simplePaginate(20);

        return response()->json(['data' => $data,"received" =>"yes"]);
    }
	
	 public function category_subGet()
    {

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
		 ->select('gro_subcat_tab.subcat_name as title','gro_subcat_tab.pic as pic','gro_subcat_tab.gro_subcat_id as mapsid')              
		->where([['gro_map_tab.gro_cat_id','=',$value],["gro_shop_info_tab.visiblilty","=",1]])
		->distinct()
		->simplePaginate(20);
		
        return response()->json(['data' => $data,"received" =>"yes"]);
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
        ->orderBy('map')
		->simplePaginate(100);
        
        return response()->json(['data' => $data,"received" =>"yes"]);
    }

        /** From this function we get Related shop of the product  	visiblilty*/
    public function RelatedShopsGet(Request $request)

    {
        $map = $request->id;
        
        $shop = DB::table('gro_shop_info_tab')
                ->join('gro_product_shop_tab','gro_shop_info_tab.gro_shop_info_id','=','gro_product_shop_tab.gro_shop_info_id')
                ->join('users','gro_shop_info_tab.user_id','=','users.id')
                ->select('gro_shop_info_tab.name','state','gro_shop_info_tab.gro_shop_info_id','city','address','users.noti_token','gro_shop_info_tab.pic')
                ->where('gro_product_shop_tab.gro_map_id' ,'=', $map)
                ->distinct()
                ->get();
        $temp = array();

        foreach ($shop as $key => $value) {
           
            $data = DB::table('gro_product_shop_tab')
                    ->join("unit_tab", "unit_tab.unit_id","=","gro_product_shop_tab.unit_id")
                    ->select('gro_product_shop_tab.gro_map_id as map','gro_product_shop_tab.offer as offer','gro_product_shop_tab.gro_price as price','gro_product_shop_tab.gro_product_shop_id as pid','unit_tab.unit_name as unit','gro_product_shop_tab.quantity')
                    ->where([['gro_product_shop_tab.gro_map_id','=',$map],['gro_product_shop_tab.gro_shop_info_id','=', $value->gro_shop_info_id]])
                    ->get();

             $temp1 = [
                'name' => $value->name ,
                'state' => $value->state,
                'key' => $value->gro_shop_info_id,
                'city' => $value->city,
                'address' => $value->address,
                'ntoken' => $value->noti_token,
                'pic' => $value->pic,
                'data' => $data
            ];
            
            array_push($temp,$temp1);
        }

        return response()->json(['data' => $temp,"received" =>"yes"]);
    }
}
