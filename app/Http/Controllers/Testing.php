<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;
class Testing extends Controller
{
    function test(){
         $wor_rate_tab = DB::table('wor_rate_tab')
                        ->join('wor_subcat_tab', 'wor_subcat_tab.wor_subcat_id', '=', 'wor_rate_tab.wor_subcat_id')
                        ->where('wor_info_id', '=', 55)
                        ->get();


        //making a aaray for item0
        $i = 1; 
        $temp_price = [];
        foreach ($wor_rate_tab as $key => $value) {
          $arr = [  
                'work' => $value->wor_subcat_id,
                'price' => $value->min_price."-".$value->max_price,
                'list_id' => $i,
                'category' => $value->wor_subcat_id,
                'work_name' => $value->subcat_name,
          ];
          $i = $i + 1;
          array_push($temp_price,$arr);
        }

        $json = response()->json($temp_price);
        var_dump($json->original);
        // echo "$json";


    }
}
