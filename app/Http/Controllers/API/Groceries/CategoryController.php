<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function categoryGet()
    {
       $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);

        return response()->json(['data' => $data]);
    }


    public function subCategoryGet(Request $request)
    {
       // var_dump($request->id);
        $value=$request->id;
         $data = DB::table('gro_map_tab')
                        ->join('gro_subcat_tab','gro_subcat_tab.gro_subcat_id','=','gro_map_tab.gro_subcat_id')
                        ->select('gro_subcat_tab.subcat_name','gro_subcat_tab.pic','gro_subcat_tab.gro_subcat_id')
                        ->where('gro_map_tab.gro_cat_id','=',$value)
                        ->orderBy('gro_map_id')
                        ->distinct()->simplePaginate(20);
           
        
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
        $data = DB::table('gro_map_tab')
                        ->join('gro_product_list_tab','gro_product_list_tab.gro_product_list_id','=','gro_map_tab.gro_produt_list_id')
                        ->select('gro_product_list_tab.gro_product_name','gro_product_list_tab.gro_product_list_id','gro_product_list_tab.gro_product_info','gro_product_list_tab.pic')
                        ->where('gro_map_tab.gro_subcat_id','=',$value)
                        ->orderBy('gro_map_id')
                        ->distinct()
                        ->simplePaginate(100);

        
        return response()->json(['data' => $data]);
    }

        /** From this function we get Related shop of the product */
    public function RelatedShopsGet(Request $request)
    {
        $value = $request->id;

        $data = DB::table('gro_product_shop_tab')
                        ->join('gro_shop_info_tab','gro_shop_info_tab.gro_shop_info_id','=','gro_product_shop_tab.gro_shop_info_id')
                        ->select('gro_shop_info_tab.name','gro_shop_info_tab.city','gro_shop_info_tab.address','gro_shop_info_tab.gro_shop_info_id','gro_shop_info_tab.state','gro_product_shop_tab.offer','gro_product_shop_tab.gro_price','gro_product_shop_tab.gro_product_shop_id')
                        ->where('gro_product_shop_tab.gro_map_id','=',$value)
                        ->orderBy('gro_map_id')
                        ->distinct()
                        ->simplePaginate(100);

        return response()->json(['data' => $data]);
    }
        
    // public function orderListGet()
    // {
    //     $data = DB::table(' gro_cart_tab')->orderBy('gro_cart_id')->simplePaginate(10);

        
    //     return response()->json(['data' => $data]);
    // }
}
