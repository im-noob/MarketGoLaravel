<?php

namespace App\Http\Controllers\API\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
     public function categoryGet()
    {
	/** SELECT DISTINCT gro_cat_tab.gro_cat_id,gro_cat_tab.gro_cat_name,gro_cat_tab.pic from gro_product_shop_tab  INNER JOIN gro_map_tab ON gro_product_shop_tab.gro_map_id = gro_map_tab.gro_map_id  INNER JOIN gro_cat_tab ON gro_map_tab.gro_cat_id = gro_cat_tab.gro_cat_id */
      // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('wor_cat_tab')
		->select("wor_cat_name","wor_cat_id","wor_cat_pic")
		->distinct()
		->orderBy('wor_cat_id')
		->simplePaginate(20);

        return response()->json(['data' => $data]);
    }
	
	/** Subcategory*/
	  public function subCategoryGet(Request $request)
    {
		$catID = $request->id; 
	/** SELECT DISTINCT gro_cat_tab.gro_cat_id,gro_cat_tab.gro_cat_name,gro_cat_tab.pic from gro_product_shop_tab  INNER JOIN gro_map_tab ON gro_product_shop_tab.gro_map_id = gro_map_tab.gro_map_id  INNER JOIN gro_cat_tab ON gro_map_tab.gro_cat_id = gro_cat_tab.gro_cat_id */
      // $data = DB::table('gro_cat_tab')->select("gro_cat_id","gro_cat_name","pic")->orderBy('gro_cat_id')->simplePaginate(20);
	 $data = DB::table('wor_subcat_tab')
		->select("subcat_name","wor_cat_id","wor_subcat_id","pic")
		->where("wor_cat_id","=",$catID)
		->distinct()
		->orderBy('wor_subcat_id')
		->simplePaginate(20);

        return response()->json(['data' => $data]);
    }

}
