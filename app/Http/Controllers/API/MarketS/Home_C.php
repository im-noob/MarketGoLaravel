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
        // $request_data = $request->json()->all();
        // $query = $query["query"];
        $data = [
              ['title'=>'Ajay Devgan',"contactNo"=>"9334022484",'work_type' =>'Fan Reparing','date'=>'2 Dec 2018 1:25 AM','contact'=>"",'avtar_url'=>'https://instagram.fpat1-1.fna.fbcdn.net/vp/fcdf3b3e3ee0a2f0566166e971154f30/5C8169FA/t51.2885-19/s150x150/20214064_515285498822463_1979634882963308544_a.jpg'],
              ['title'=>'Narandra Modi',"contactNo"=>"8340669783",'work_type'=>'AC Reparing','date'=>'2 Dec 2018 2:35 AM','contact'=>"",'avtar_url'=>'https://instagram.fpat1-1.fna.fbcdn.net/vp/e126efcd0ff85dedec1db28153438a22/5C775B6F/t51.2885-19/10785125_732015440209238_1064321366_a.jpg'],
              ['title'=>'Donald Trump',"contactNo"=>"4225784596",'work_type'=>'Car Reparing','date'=>'28 Nov 2018 11:24 AM','contact'=>"",'avtar_url'=>'https://instagram.fpat1-1.fna.fbcdn.net/vp/6d5170dcf49f011a0c016d4b572543d8/5C662705/t51.2885-19/s150x150/23823676_515039535523575_7479748231031685120_n.jpg'],
              ['title'=>'Akshay Kumar',"contactNo"=>"9999988888",'work_type'=>'Laptop Reparing','date'=>'25 Nov 2018 2:38 PM','contact'=>"",'avtar_url'=>'https://instagram.fpat1-1.fna.fbcdn.net/vp/ee936c0c7ea5ed553dc0be21928327b6/5C7C4289/t51.2885-19/s150x150/17265645_1686057661694242_1994307655182581760_a.jpg'],
            ];
        return response()->json(['data' => $data], $this-> successStatus);     
    }

    //for sacing bill
    function sendBill(Request $request){
        $request_data = $request->json()->all();
        return response()->json(['success' => "yes",'verify'=>$request_data], $this-> successStatus);  
    }
}
