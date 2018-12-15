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
    	$incoming_data_arr = DB::table('wor_order_tab')
            ->join('wor_subcat_tab', 'wor_order_tab.wor_subcat_id', '=', 'wor_subcat_tab.wor_subcat_id')
            ->join('users', 'wor_order_tab.customer_info_Id', '=', 'users.id')
            ->select('title','users.phone as contactNo','wor_subcat_tab.subcat_name as work_type','wor_order_tab.created_at as date','message')
            ->where('wor_info_id', 55)
            ->get();
        $send_arr = [];
        foreach ($incoming_data_arr as $key => $value) {
        	$arrRow = [
        				'title'=>$value->title,
        				"contactNo"=>$value->contactNo,
        				'work_type' =>$value->work_type,
        				'date'=>$value->date,
        				'Message'=>$value->message,
        				'avtar_url'=>'https://instagram.fpat1-1.fna.fbcdn.net/vp/fcdf3b3e3ee0a2f0566166e971154f30/5C8169FA/t51.2885-19/s150x150/20214064_515285498822463_1979634882963308544_a.jpg'
        			];
        	array_push($send_arr, $arrRow);
        }
        var_dump($send_arr);
        
        // echo "=============> real data ---------->";
        // var_dump($data);

    }
}
