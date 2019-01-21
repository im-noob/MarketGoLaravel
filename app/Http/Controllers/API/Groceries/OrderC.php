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
				->select("gro_cart_tab.*","customer_info_tab.cname","users.phone")
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
				->select("gro_cart_tab.*","customer_info_tab.cname","users.phone")
				->where([['gro_cart_tab.gro_shop_info_id','=',$id],['gro_cart_tab.status','<>','0']])
				->get();

        return response()->json(['data' => $data]);
    }
}
