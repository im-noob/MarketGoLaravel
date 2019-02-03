<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RProductController extends Controller
{
    public function getShpProduct(Request $request){

    	$shop_id = $request->json()->all()['id'];// $_POST['id'];

    	$data1 = DB::table('res_shop_food_tab')
				->select("res_food_map_id")
				->where('res_info_id','=',$shop_id)
				->distinct()
				->get();
		$mapId  = array();

		foreach ($data1 as $key => $value) {
			array_push($mapId,$value->gro_map_id);
		}
		//var_dump($data1);
		$total = DB::table('res_food_map_tab')
				->whereIn('res_food_map_id',$mapId)
				->count();

    	$data = DB::table('res_food_map_tab')
       			->join('res_food_cat_tab','res_food_cat_tab.res_food_cat_id','=','res_food_map_tab.res_food_cat_id')
       			->join('res_food_subcat_tab','res_food_subcat_tab.res_food_subcat_id','=','res_food_map_tab.res_food_subcat_id')
       			->join('res_food_list_tab','res_food_list_tab.res_food_list_id','=','res_food_map_tab.res_food_list_id')
				->select("res_food_cat_tab.res_food_cat_id","res_food_cat_tab.cat_name","res_food_subcat_tab.res_food_subcat_id","res_food_subcat_tab.food_subcat_name","res_food_list_tab.*","res_food_map_tab.res_food_map_id")
				->whereIn('res_food_map_id',$mapId)
				->latest()
				->skip(0)->take(100)
				->get();

		return response()->json(['data' => $data,'total'=>$total]);
    }


    public function getProduct(Request $request){
    	$shop_id = $request->json()->all()['id'];// $_POST['id'];
    	$mapId = $request->json()->all()['mapId'];//$_POST['mapId'];
    	$data1 = DB::table('res_shop_food_tab')
				->select("res_shop_food_tab.*","unit_tab.unit_name")
				->join('unit_tab','unit_tab.unit_id','res_shop_food_tab.unit_id')
				->where([['res_info_id','=',$shop_id],['res_food_map_id','=',$mapId]])
				->get();

		return response()->json(['data'=>$data1]);
    }

    public function ShopSearchData(Request $request){

    	$shop_id = $request->json()->all()['id'];// $_POST['id'];
    	$search = $request->json()->all()['search'];

    	$data1 = DB::table('res_shop_food_tab')
				->select("res_food_map_id")
				->where('res_info_id','=',$shop_id)
				->distinct()
				->get();
		$mapId  = array();

		foreach ($data1 as $key => $value) {
			array_push($mapId,$value->gro_map_id);
		}
		//var_dump($data1);
		$total = DB::table('res_food_map_tab')
				->whereIn('res_food_map_id',$mapId)
				->count();

    	$data = DB::table('res_food_map_tab')
       			->join('res_food_cat_tab','res_food_cat_tab.res_food_cat_id','=','res_food_map_tab.res_food_cat_id')
       			->join('res_food_subcat_tab','res_food_subcat_tab.res_food_subcat_id','=','res_food_map_tab.res_food_subcat_id')
       			->join('res_food_list_tab','res_food_list_tab.res_food_list_id','=','res_food_map_tab.res_food_list_id')
				->select("res_food_cat_tab.res_food_cat_id","res_food_cat_tab.cat_name","res_food_subcat_tab.res_food_subcat_id","res_food_subcat_tab.food_subcat_name","res_food_list_tab.*","res_food_map_tab.res_food_map_id")
				->whereIn('res_food_map_id',$mapId)
				->where('res_food_list_tab.res_food_name','like','%'.$search.'%')
				->skip(0)->take(50)
				->get();

		return response()->json(['data' => $data]);
    }

    public function getRestProductList(Request $request){
    	$shop_id = $request->json()->all()['id'];// $_POST['id'];

    	$data1 = DB::table('res_shop_food_tab')
				->select("res_food_map_id")
				->where('res_info_id','=',$shop_id)
				->distinct()
				->get();
		$mapId  = array();

		foreach ($data1 as $key => $value) {
			array_push($mapId,$value->gro_map_id);
		}
		//var_dump($data1);
		$total = DB::table('res_food_map_tab')
				->whereNotIn('res_food_map_id',$mapId)
				->count();

    	$data = DB::table('res_food_map_tab')
       			->join('res_food_cat_tab','res_food_cat_tab.res_food_cat_id','=','res_food_map_tab.res_food_cat_id')
       			->join('res_food_subcat_tab','res_food_subcat_tab.res_food_subcat_id','=','res_food_map_tab.res_food_subcat_id')
       			->join('res_food_list_tab','res_food_list_tab.res_food_list_id','=','res_food_map_tab.res_food_list_id')
       			->join('unit_tab','unit_tab.unit_id','=','res_food_map_tab.unit_id')
				->select("res_food_cat_tab.res_food_cat_id","res_food_cat_tab.cat_name","res_food_subcat_tab.res_food_subcat_id","res_food_subcat_tab.food_subcat_name","res_food_list_tab.*","res_food_map_tab.res_food_map_id","res_food_map_tab.unit_id","res_food_map_tab.quantity","res_food_map_tab.price")
				->whereNotIn('res_food_map_id',$mapId)
				->inRandomOrder()
				->skip(0)->take(100)
				->get();

		return response()->json(['data' => $data,'total'=>$total]);
    }

    public function getRestProductList(Request $request){

    	$shop_id = $request->json()->all()['id'];// $_POST['id'];
    	$search = $request->json()->all()['search'];
    	$data1 = DB::table('res_shop_food_tab')
				->select("res_food_map_id")
				->where('res_info_id','=',$shop_id)
				->distinct()
				->get();
		$mapId  = array();

		foreach ($data1 as $key => $value) {
			array_push($mapId,$value->gro_map_id);
		}


    	$data = DB::table('res_food_map_tab')
       			->join('res_food_cat_tab','res_food_cat_tab.res_food_cat_id','=','res_food_map_tab.res_food_cat_id')
       			->join('res_food_subcat_tab','res_food_subcat_tab.res_food_subcat_id','=','res_food_map_tab.res_food_subcat_id')
       			->join('res_food_list_tab','res_food_list_tab.res_food_list_id','=','res_food_map_tab.res_food_list_id')
       			->join('unit_tab','unit_tab.unit_id','=','res_food_map_tab.unit_id')
				->select("res_food_cat_tab.res_food_cat_id","res_food_cat_tab.cat_name","res_food_subcat_tab.res_food_subcat_id","res_food_subcat_tab.food_subcat_name","res_food_list_tab.*","res_food_map_tab.res_food_map_id","res_food_map_tab.unit_id","res_food_map_tab.quantity","res_food_map_tab.price")
				->whereNotIn('res_food_map_id',$mapId)
				->where('res_food_list_tab.res_food_name','like','%'.$search.'%')
				->skip(0)->take(50)
				->get();

		return response()->json(['data' => $data]);
    }

    public function addProductItem(Request $request){

    	$FatchData =  $request->json()->all()['data'];
    	$id =  $request->json()->all()['id'];
    	$mid =  $request->json()->all()['mid'];

    	
        foreach ($FatchData as $key => $value) {
        	
        	if(gettype($value['res_shop_food_id']) == 'string'){

        		DB::table('res_shop_food_tab')->insert(
	                [
	                  'res_shop_food_id'=>$id,
	                  'res_food_map_id'=>$mid,
	                  'unit_id' =>$value['unit_name'],
	                  'quantity' => $value['quantity'],
	                  'price'=>$value['price'],
	                  'offer'=>$value['offer'],
	                  'inStock' => $value['inStock']
	                ]
	            );

        	}		
        	else{

        		DB::table('res_shop_food_tab')
                ->where('res_shop_food_id', '=', $value['res_shop_food_id'])
                ->update(
                	[
                	  'unit_id' =>$value['unit_name'],
	                  'quantity' => $value['quantity'],
	                  'price'=>$value['price'],
	                  'offer'=>$value['offer'],
	                  'inStock' => $value['inStock']
                    ]);
        	}
        }
        return response()->json(['data' => "Success"]);
    }
}
