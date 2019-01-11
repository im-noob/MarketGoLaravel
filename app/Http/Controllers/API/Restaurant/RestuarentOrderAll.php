<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class RestuarentOrderAll extends Controller
{
    public function getCurrentOrder(Request $request){

    	$id = $_GET["id"];

  		$record =  DB::table('res_cart_tab')
  			->join("customer_info_tab","res_cart_tab.customer_info_tab","=","customer_info_tab.customer_info_id")
  			->join("users","users.user_id","=","customer_info_tab.user_id")
  			->select('res_info_tab.name','res_info_tab.address','res_cart_tab.*','res_info_tab.address','users.phone')
  			->where(['res_cart_tab.res_info_id','=',$id],["res_cart_tab.status",'=','0'])
  			->get();

  		return $record;
    }

	//All packed and delivered
    public function getAllOrder(Request $request){

    	$id = $_GET["id"];

  		$record =  DB::table('res_cart_tab')
  			->join("customer_info_tab","res_cart_tab.customer_info_tab","=","customer_info_tab.customer_info_id")
  			->join("users","users.user_id","=","customer_info_tab.user_id")
  			->select('res_info_tab.name','res_info_tab.address','res_cart_tab.*','res_info_tab.address','users.phone')
  			->where(['res_cart_tab.res_info_id','=',$id],["res_cart_tab.status",'<>','0'])
  			->get();

  		return $record;
    }

    //All ordered item
     

    //update status
    public function UpdatecCartStatus(Request $request){

    	$id = $_GET["id"];
    	$status = $_GET["status"];

  		$record =  DB::table('res_cart_tab')
            ->where('res_info_id', '=', $id)
            ->update(['status' => $status]);

  		return $record;
    }

    //update status
    public function UpdatecCartBalance(Request $request){

    	$id = $_GET["id"];
    	$bal = $_GET["balance"];

  		$record =  DB::table('res_cart_tab')
            ->where('res_info_id', '=', $id)
            ->update(['paid_amt' => $bal]);

  		return $record;
    }


}
