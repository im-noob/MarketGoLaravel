<?php

namespace App\Http\Controllers\API\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public $successStatus = 200;

    public function Cat_SubCat_Json(Request $request) 
    {
    	$category_list = DB::table('wor_cat_tab')
            ->select('wor_cat_name','wor_cat_id')
            ->get();
        // SELECT wor_cat_name FROM `wor_cat_tab`SELECT * FROM `wor_subcat_tab
        $cat_sub_cat_arr_final = [];
        foreach ($category_list as $key => $value) {
            $subcategory_list = DB::table('wor_subcat_tab')
                ->select('wor_subcat_id','subcat_name')
                ->where('wor_cat_id',$value->wor_cat_id)
                ->get();
            // echo($value->wor_cat_name. "=>" );
            $intermediateArr = [];
            $subcategory_arr = [];
            foreach ($subcategory_list as $key => $subcategory) {
                $tmp = [];
                $tmp["key"] = $subcategory->wor_subcat_id;
                $tmp["value"] = $subcategory->subcat_name;
                array_push($subcategory_arr, $tmp);
            }
            
            $intermediateArr["category"] = $value->wor_cat_name;
            $intermediateArr["subcategory"] = $subcategory_arr;
            array_push($cat_sub_cat_arr_final, $intermediateArr);
        }
      	return response()->json(['data'=>$cat_sub_cat_arr_final],$this->successStatus);
    }
}
