<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RestaurantOrderController extends Controller
{
    public function getActiveOrder(Request $request){
    	 
        $id = $request->json()->all()['id'];
        $data = DB::table('res_cart_tab')
       			->join('customer_info_tab','customer_info_tab.customer_info_id','=','res_cart_tab.customer_info_id')
       			->join('users','users.id','=','customer_info_tab.user_id')
  				->select("res_cart_tab.*","customer_info_tab.cname","users.phone","users.noti_token")
  				->where([['res_cart_tab.res_info_id','=',$id],['res_cart_tab.status','=','0']])
  				->get();

        return response()->json(['data' => $data]);

    }

    public function getPackedOrder(Request $request){
    	
    	$id = $request->json()->all()['id'];
        $data = DB::table('res_cart_tab')
       			->join('customer_info_tab','customer_info_tab.customer_info_id','=','res_cart_tab.customer_info_id')
       			->join('users','users.id','=','customer_info_tab.user_id')
  				->select("res_cart_tab.*","customer_info_tab.cname","users.phone","users.noti_token")
  				->where([['res_cart_tab.res_info_id','=',$id],['res_cart_tab.status','<>','0']])
  				->orderBy("res_cart_tab.res_cart_lot_id","desc")
  				->get();

        return response()->json(['data' => $data]);
    }

    public function getOrderedItem(Request $request){

    	$id = $request->json()->all()['id'];
        $data = DB::table('res_order_tab')
            ->join('res_shop_food_tab','res_shop_food_tab.res_shop_food_id','=','res_order_tab.res_shop_food_id')
            ->join('res_food_map_tab','res_food_map_tab.res_food_map_id','=','res_shop_food_tab.res_food_map_id')
            ->join('res_food_list_tab','res_food_map_tab.res_food_list_id','=','res_food_list_tab.res_food_list_id')
            ->join('unit_tab','res_food_map_tab.unit_id','=','unit_tab.unit_id')
            ->select("res_shop_food_tab.price","res_shop_food_tab.quantity","res_food_list_tab.res_food_name","res_food_list_tab.pic","res_order_tab.*","unit_tab.unit_name")
            ->where('res_order_tab.res_cart_id','=',$id)
            ->get();

        return response()->json(['data' => $data]);
    }

    public function UpdateOrder(Request $request) 
    {     

        $FatchData =  $request->json()->all()['data'];
        $id =  $request->json()->all()['id'];


        foreach ($FatchData as $key => $value) {
            
            DB::table('res_order_tab')
                ->where('res_order_id', '=', $value['res_order_id'])
                ->update(['status' => $value['status']]);
        }

         DB::table('res_cart_tab')
                ->where('res_cart_lot_id', '=', $id)
                ->update(['status' => 1]);

        return response()->json(['data' => "Success"], $this-> successStatus); 
    } 

}
