<?php

namespace App\Http\Controllers\API\MarketS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class Home_C extends Controller
{
  public $successStatus = 200;
    //returning icoming request
    function incoming_request(Request $request){
        $request_data = $request->json()->all();
        $userID = $request_data["userID"];
        $incoming_data_arr = DB::table('wor_order_tab')
            ->join('wor_subcat_tab', 'wor_order_tab.wor_subcat_id', '=', 'wor_subcat_tab.wor_subcat_id')
            ->join('users', 'wor_order_tab.customer_info_Id', '=', 'users.id')
            ->select('title','users.phone as contactNo','wor_subcat_tab.subcat_name as work_type','wor_order_tab.created_at as date','message')
            ->where('wor_info_id', $userID)
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

        
        return response()->json(['data' => $send_arr], $this-> successStatus);     
    }

    //for sacing bill
    function sendBill(Request $request){
        $request_data = $request->json()->all();
        return response()->json(['success' => "yes",'verify'=>$request_data], $this-> successStatus);  
    }
}
