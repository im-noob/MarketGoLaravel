<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class RestoQuery extends Controller
{
    public $successStatus = 200;
    public function details(Request $request) 
    {     
        $query = $request->json()->all();
        $data = DB::select($query["query"]);
        return response()->json(['data' => $data], $this-> successStatus); 
    }

    public function getCategory(Request $request) 
    {     
        $data = DB::table('res_food_subcat_tab')
        			->join('res_food_cat_tab',"res_food_subcat_tab.res_food_cat_id","=","res_food_cat_tab.res_food_cat_id")
        			->get();

        $data1  = array();

        foreach ($data as $key => $value) {
        	$arrayName = array("res_food_cat_id"=>$value->res_food_cat_id,"res_food_subcat_id"=>$value->res_food_subcat_id,"food_subcat_name"=>$value->food_subcat_name,"cat_name"=>$value->cat_name,"Status"=>0);

        	array_push($data1,$arrayName);
        }

        return response()->json(['data' => $data1], $this-> successStatus); 
    }

    public function getOrderItem(Request $request) 
    {     

        $id = $request->json()->all()['id'];
        //$id = $GET['id'];

        $data = DB::table('res_food_map_tab')
                    ->join('unit_tab',"unit_tab.unit_id","=","res_food_map_tab.unit_id")
                    ->join('res_food_list_tab',"res_food_list_tab.res_food_list_id","res_food_map_tab.res_food_list_id")
                    ->join('res_order_tab',"res_order_tab.res_map_id","res_food_map_tab.res_food_map_id")
                    ->where('res_order_tab.res_cart_id','=',$id)
                    ->get();

        $data1  = array();

        foreach ($data as $key => $value) {
            $arrayName = array("unit_name"=>$value->unit_name,"res_food_qun"=>$value->res_food_qun,"real_price"=>$value->real_price,"offer_price"=>$value->offer_price,"res_food_name"=>$value->res_food_name,"pic"=>$value->pic,"O_status"=>$value->status,"res_order_id"=>$value->res_order_id,"Status"=>0);

            array_push($data1,$arrayName);
        }

        return response()->json(['data' => $data1], $this-> successStatus); 
    }

    public function AddCategory(Request $request) 
    {     

    	$FatchData =  $request->json()->all()['data'];
    	$id =  $request->json()->all()['id'];

    	$flag = "Error";
    	//var_dump($FatchData);
    	$FatchData1 = json_encode($FatchData);
        $data1  = array();
        foreach ($FatchData as $key => $value) {
        	if($value['Status'] == 1)
        		array_push($data1,$value['res_food_subcat_id']);
        }


        //var_dump($data1);
        $data = DB::table('res_food_map_tab')
        			->whereIn('res_food_subcat_id',$data1)
        			->get();

       	//var_dump($data);
        foreach ($data as $key => $value) {

        	DB::table('res_shop_food_tab')->insert(
                [
                  'res_info_id'=>$id,
                  'res_food_map_id'=>$value->res_food_map_id,
                  'unit_id' =>$value->unit_id,
                  'quantity' => $value->quantity,
                  'price'=>$value->price,
                  'offer'=>0
                ]
            );
        }
        return response()->json(['data' => "Success"], $this-> successStatus); 
    }
}
