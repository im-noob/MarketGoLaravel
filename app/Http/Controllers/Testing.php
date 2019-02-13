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
        // $customerID = '79';

        // $data = [
        //             [
        //                 "workerAvtar"=>"https://i.imgur.com/uj2JaPH.jpg",
        //                 "workerName"=>"Worker Name1",
        //                 "Work"=>"Work Name1",
        //                 "title"=>"Title1",
        //                 "message"=>"Message1",
        //                 "workPorgressStatus"=>5,
        //                 "billList"=>[
        //                     [
        //                     "list_id"=> "11",
        //                     "price"=> "501",
        //                     "work"=> "Condencer1"
        //                     ],
        //                     [
        //                     "list_id"=> "21",
        //                     "price"=> "2001",
        //                     "work"=> "Repairing1"
        //                     ]
        //                 ],
        //             ],   
        //         ];

        // $wor_order_tab = DB::table('wor_order_tab')
        //           ->join('wor_info_tab','wor_info_tab.wor_info_id','=','wor_order_tab.wor_info_id')
        //           ->join('wor_subcat_tab','wor_subcat_tab.wor_subcat_id','=','wor_order_tab.wor_subcat_id')
        //           ->select(
        //             'wor_info_tab.pic as workerAvtar',
        //             'wor_info_tab.name as workerName', 
        //             'wor_subcat_tab.subcat_name as Work', 
        //             'title',  
        //             'message',
        //             'workPorgressStatus',
        //             'bill_list as billList'
                    
        //           )
        //           ->where('customer_info_Id', '=', $customerID)
        //           ->get();

        // $data = [];
        // foreach ($wor_order_tab as $key => $value) {
        //     $dataSingle = [
        //             "workerAvtar"=>$value->workerAvtar,
        //             "workerName"=>$value->workerName,
        //             "Work"=>$value->Work,
        //             "title"=>$value->title,
        //             "message"=>$value->message,
        //             "workPorgressStatus"=>$value->workPorgressStatus,
        //             "billList"=>[
        //                 [
        //                 "list_id"=> "11",
        //                 "price"=> "501",
        //                 "work"=> "Condencer1"
        //                 ],
        //                 [
        //                 "list_id"=> "21",
        //                 "price"=> "2001",
        //                 "work"=> "Repairing1"
        //                 ]
        //             ]
        //         ];
        //             $temp_arr = [];//simply decode the json and and perare bill list of nested aaray 
        //             $decoded_billList = json_decode($value->billList);
        //             foreach ($decoded_billList as $key => $value) {
        //                 $temp_arr['list_id'] = $value->list_id;
        //                 $temp_arr['price'] = $value->price;
        //                 $temp_arr['work'] = $value->work;
        //             }
        //             $dataSingle['billList'] = $temp_arr;
        //         array_push($data, $dataSingle);
        //   }



        $billList = "BillList";
        $order_id = '5';
        
        DB::table('wor_order_tab')
            ->where('wor_order_id', $order_id)
            ->update(['bill_list' => $billList]);

        // echo "\n";
        // $json = response()->json($data);
        // echo "\n\n";
        // var_dump($json->original);
        // echo "\n\n";
        // echo "$json";
      }
}
