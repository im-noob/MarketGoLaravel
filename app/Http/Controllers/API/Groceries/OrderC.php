<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderC extends Controller
{
    public function getActiveOrder(Request $request)
    {
       //$id = $_GET['id'];
       $id = $request->json()->all()['id'];
       $data = DB::table('gro_cart_tab')
       			->join('customer_info_tab','customer_info_tab.customer_info_id','=','gro_cart_tab.customer_info_id')
       			->join('users','users.id','=','customer_info_tab.user_id')
  				->select("gro_cart_tab.*","customer_info_tab.cname","users.phone","users.noti_token")
  				->where([['gro_cart_tab.gro_shop_info_id','=',$id],['gro_cart_tab.status','=','0']])
  				->get();

        return response()->json(['data' => $data]);
    }

    public function getPackedOrder(Request $request)
    {
       //$id = $_GET['id'];
       $id = $request->json()->all()['id'];
       $data = DB::table('gro_cart_tab')
       			->join('customer_info_tab','customer_info_tab.customer_info_id','=','gro_cart_tab.customer_info_id')
       			->join('users','users.id','=','customer_info_tab.user_id')
  				->select("gro_cart_tab.*","customer_info_tab.cname","users.phone","users.noti_token")
  				->where([['gro_cart_tab.gro_shop_info_id','=',$id],['gro_cart_tab.status','<>','0']])
          ->orderBy("gro_cart_tab.gro_cart_id","desc")
  				->get();

        return response()->json(['data' => $data]);
    }

    public function getOrderedItem(Request $request){
      // SELECT GR.gro_order_id, unit_tab.unit_name,GR.gro_quantity,GR.real_price,GR.offer_price, 
      // M.menu_name,GP.gro_product_name,GP.pic , GR.order_status,GPS.gro_price,GPS.quantity from gro_order_tab As GR 
      // INNER JOIN gro_product_shop_tab As GPS ON GPS.gro_product_shop_id= GR.gro_product_shop_id
      // INNER JOIN gro_map_tab As GM On GPS.gro_map_id = GM.gro_map_id 
      // INNER JOIN gro_menufacture_tab As M ON M.menu_id = GM.menu_id 
      // INNER JOIN gro_product_list_tab As GP ON GP.gro_product_list_id = GM.gro_produt_list_id
      // INNER JOIN unit_tab On unit_tab.unit_id = GPS.unit_id 
      // WHERE GR.gro_cart_id =45;
      //$id = $_POST['id'];
      $id = $request->json()->all()['id'];
       $data = DB::table('gro_order_tab')
            ->join('gro_product_shop_tab','gro_product_shop_tab.gro_product_shop_id','=','gro_order_tab.gro_product_shop_id')
            ->join('gro_map_tab','gro_map_tab.gro_map_id','=','gro_product_shop_tab.gro_map_id')
            ->join('gro_menufacture_tab','gro_map_tab.menu_id','=','gro_menufacture_tab.menu_id')
            ->join('gro_product_list_tab','gro_map_tab.gro_produt_list_id','=','gro_product_list_tab.gro_product_list_id')
            ->join('unit_tab','gro_map_tab.unit_id','=','unit_tab.unit_id')
            ->select("gro_product_shop_tab.gro_price","gro_product_shop_tab.quantity","gro_product_list_tab.gro_product_name","gro_product_list_tab.pic","gro_order_tab.*","gro_menufacture_tab.menu_name","unit_tab.unit_name")
            ->where('gro_order_tab.gro_cart_id','=',$id)
            ->get();

        return response()->json(['data' => $data]);
    }
}
