<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RestuarentRating extends Controller
{
  public function getRating(Request $request)
  {
  		$id = $_POST["id"];
  		$record =  DB::table('res_cart_tab')
  			->join("res_info_tab","res_cart_tab.res_info_id","=","res_info_tab.res_info_id")
  			->select('res_info_tab.name','res_cart_tab.rating','res_cart_tab.feedback','res_cart_tab.res_cart_lot_id')
  			->where('res_cart_tab.res_info_id','=',$id)
  			->get();

  		return $record;

  }  
}
