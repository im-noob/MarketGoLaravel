<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class RQuery extends Controller
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
