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
        $data = DB::table('gro_subcat_tab')
        			->join('gro_cat_tab',"gro_subcat_tab.gro_cat_id","=","gro_cat_tab.gro_cat_id")
        			->get();

        $data1  = array();

        foreach ($data as $key => $value) {
        	$arrayName = array("gro_subcat_id"=>$value->gro_subcat_id,"gro_cat_id"=>$value->gro_cat_id,"subcat_name"=>$value->subcat_name,"gro_cat_name"=>$value->gro_cat_name,"Status"=>0);
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
        		array_push($data1,$value['gro_subcat_id']);
        }


        //var_dump($data1);
        $data = DB::table('gro_map_tab')
        			->whereIn('gro_subcat_id',$data1)
        			->get();


       	//var_dump($data);
        foreach ($data as $key => $value) {

        	DB::table('gro_product_shop_tab')->insert(
                [
                  'gro_shop_info_id'=>$id,
                  'gro_map_id'=>$value->gro_map_id,
                  'unit_id' =>$value->unit_id,
                  'quantity' => $value->quantity,
                  'gro_price'=>$value->price,
                  'offer'=>0
                ]
            );
        }
        return response()->json(['data' => "Success"], $this-> successStatus); 
    }

    public function UpdateOrder(Request $request) 
    {     

        $FatchData =  $request->json()->all()['data'];
        $id =  $request->json()->all()['id'];

        $flag = "Error";
        //var_dump($FatchData);
        $FatchData1 = json_encode($FatchData);
        $data1  = array();
       

        foreach ($FatchData as $key => $value) {
            
            DB::table('gro_order_tab')
                ->where('gro_order_id', '=', $value['gro_order_id'])
                ->update(['order_status' => $value['order_status']]);
        }

         DB::table('gro_cart_tab')
                ->where('gro_cart_id', '=', $id)
                ->update(['status' => 1]);

        return response()->json(['data' => "Success"], $this-> successStatus); 
    } 
}
