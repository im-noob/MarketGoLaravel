<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Pages extends Controller
{
    //
  
  //the method below shows the home page
  public function showHomePage(){


  	
    return view('web.index',['data'=>'sme data']);
  }


    //the method below shows the home page
  public function showCategoryProducts($cat_id){


  	$data = array();

  	$data['cat_id'] = $cat_id;
  	$data['data'] = "sme data";

    return view('web.category',$data);
  }


  //the method below shows the view for finalising order
  public function finaliseOrder(){

    return view('web.finalise_order');
  }
}

