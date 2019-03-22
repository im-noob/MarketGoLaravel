<?php

namespace App\Http\Controllers\API\Filter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    	
		/** Sub category of category*/
	public function groSearch(Request $request)
    {
    	$searchText = $request->searchText;
        $searchTerm = explode(" ",$searchText);  

        $groItems = [];
        $resItems = [];
        $serItems = [];
        $shopItems = [];

        $groItemsID = [];
        $resItemsID = [];
        $serItemsID = [];


        
        foreach ($searchTerm as $key => $value) {
            // Grocery Result
            $gro_data = DB::table('gro_product_list_tab')
                ->select('gro_product_list_id')
                ->where('TAGS', 'like', '%'.$value.'%')
                // ->where('TAGS', 'like', $value)

                ->limit(100)
                ->get();
            // var_dump($gro_data);
            foreach ($gro_data as $key => $value) {
                array_push($groItemsID, $value->gro_product_list_id);
            }

            
            // Resturent Searchs

            // Service Search
        }
        $shopItems = $this->shopInfoGet($searchText);


        $groItems = $this->productGet($groItemsID);
		return response()->json([
            'gro_data' => $groItems,
            'shop_data' => $shopItems,
            'received' => 'yes',
            'back'=>$searchText]);
    }


    public function shopInfoGet($searchText)
    {
        $data = DB::table('gro_shop_info_tab')
        ->join('users','gro_shop_info_tab.user_id','=','users.id')
                      
        ->select('users.noti_token',"gro_shop_info_tab.*")
        ->where("gro_shop_info_tab.visiblilty","=",1)
        ->where("gro_shop_info_tab.name","like",'%'.$searchText.'%')
        ->orderBy('gro_shop_info_tab.gro_shop_info_id')
        ->limit(3)
        ->simplePaginate(10);

        return($data);
    }

    public function productGet($groItemsID)
    {
        $data = DB::table('gro_product_shop_tab As shop')
                ->join("unit_tab", "unit_tab.unit_id","=","shop.unit_id")
                ->join("gro_map_tab As map", "map.gro_map_id","=","shop.gro_map_id")
                ->join('gro_product_list_tab As gpl','gpl.gro_product_list_id','=','map.gro_produt_list_id')
                ->select('shop.gro_product_shop_id as psid','gpl.gro_product_name As name','shop.inStock as stock','map.gro_cat_id as cid','shop.gro_price as price','shop.quantity','shop.gro_map_id as mid','gpl.gro_product_list_id as plid','gpl.gro_product_info as pinfo','gpl.pic','unit_tab.unit_name')
                ->whereIn('gpl.gro_product_list_id', $groItemsID)
                ->orderBy('gpl.gro_product_name')
                ->get();

        return $data;     
    }
	
}
