<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getShpProduct(Request $request){

    	$shop_id = $request->json()->all()['id'];// $_POST['id'];

    	$data1 = DB::table('gro_product_shop_tab')
				->select("gro_map_id")
				->where('gro_shop_info_id','=',$shop_id)
				->distinct()
				->get();
		$mapId  = array();

		foreach ($data1 as $key => $value) {
			//echo $value->gro_map_id;
			array_push($mapId,$value->gro_map_id);
		}

		//var_dump($data1);

    	$data = DB::table('gro_map_tab')
       			->join('gro_cat_tab','gro_cat_tab.gro_cat_id','=','gro_map_tab.gro_cat_id')
       			->join('gro_subcat_tab','gro_subcat_tab.gro_subcat_id','=','gro_map_tab.gro_subcat_id')
       			->join('gro_menufacture_tab','gro_menufacture_tab.menu_id','=','gro_map_tab.menu_id')
       			->join('gro_product_list_tab','gro_product_list_tab.gro_product_list_id','=','gro_map_tab.gro_produt_list_id')
				->select("gro_cat_tab.gro_cat_id","gro_cat_tab.gro_cat_name","gro_subcat_tab.gro_subcat_id","gro_subcat_tab.subcat_name","gro_menufacture_tab.menu_name","gro_product_list_tab.*","gro_map_tab.gro_map_id")
				->whereIn('gro_map_id',$mapId)
				->get();

		return response()->json(['data' => $data]);
    }

    public function getProduct(Request $request){
    	$shop_id = $request->json()->all()['id'];// $_POST['id'];
    	$mapId = $request->json()->all()['mapId'];//$_POST['mapId'];
    	$data1 = DB::table('gro_product_shop_tab')
				->select("gro_product_shop_tab.*","unit_tab.unit_name")
				->join('unit_tab','unit_tab.unit_id','gro_product_shop_tab.unit_id')
				->where([['gro_shop_info_id','=',$shop_id],['gro_map_id','=',$mapId]])
				->get();

		return response()->json(['data'=>$data1]);
    }

    public function getRestProductList(Request $request){
    	$shop_id = $_POST['id'];

		$data1 = DB::table('gro_product_shop_tab')
			->select("gro_map_id")
			->where('gro_shop_info_id','=',$shop_id)
			->distinct()
			->get();
		$mapId  = array();

		foreach ($data1 as $key => $value) {
			//echo $value->gro_map_id;
			array_push($mapId,$value->gro_map_id);
		}

		//var_dump($data1);

    	$data = DB::table('gro_map_tab')
       			->join('gro_cat_tab','gro_cat_tab.gro_cat_id','=','gro_map_tab.gro_cat_id')
       			->join('gro_subcat_tab','gro_subcat_tab.gro_subcat_id','=','gro_map_tab.gro_subcat_id')
       			->join('gro_menufacture_tab','gro_menufacture_tab.menu_id','=','gro_map_tab.menu_id')
       			->join('gro_product_list_tab','gro_product_list_tab.gro_product_list_id','=','gro_map_tab.gro_produt_list_id')
       			->join('unit_tab','unit_tab.unit_id','=','gro_map_tab.unit_id')
				->select("gro_cat_tab.gro_cat_id","gro_cat_tab.gro_cat_name","gro_subcat_tab.gro_subcat_id","gro_subcat_tab.subcat_name","gro_menufacture_tab.menu_name","gro_product_list_tab.*","gro_map_tab.gro_map_id","gro_map_tab.price","gro_map_tab.quantity","unit_tab.unit_name")
				->whereNotIn('gro_map_id',$mapId)
				->get();

		return response()->json(['data' => $data]);
    }

    public function addProductItem(Request $request){

    }
}
