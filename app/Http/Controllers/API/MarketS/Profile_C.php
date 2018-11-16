<?php

namespace App\Http\Controllers\API\MarketS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Profile_C extends Controller
{
    public $successStatus = 200;
    //to show data
    function profile_getdata(){
    	// $request_data = $request->json()->all();
        // $query = $query["query"];
        $data = [
                "displayName"=>"Aarav Kumar",
                "contactNO"=>"8340669783",
                "mainwork"=>"Wire Man | Software Engg.",
                "avtar_url"=>"https://instagram.fpat1-1.fna.fbcdn.net/vp/630aea90950b45a546a77847fa0a2827/5C6BF0AC/t51.2885-19/s150x150/31908285_2109461939310314_4190149362170462208_n.jpg",
                "searched"=>"485",
                "contract"=>"205",
                "ratting"=>"4.9",
                "items0"=>[
                  ['work'=>'Wire Man','price'=>'300-600','list_id'=>'1'],
                  ['work'=>'Warring','price'=>'1000-1200','list_id'=>'2'],
                  ['work'=>'Fan Repair','price'=>'250-550','list_id'=>'3'],
                  ['work'=>'Tv Repair','price'=>'1800-6000','list_id'=>'4'],
                  ['work'=>'Washing Machine Repair','price'=>'2600-6600','list_id'=>'5'],
                ],
                "items1"=> [
                  ['A'=>'Work Experience','B'=>'3'],
                  ['A'=>'Working Hour','B'=>'11:33:PM-12:33:AM'],
                ],
                "items2"=>[
                  ['A'=>'State','B'=>'Bihar'],
                  ['A'=>'City','B'=>'BGP'],
                  ['A'=>'PinCode','B'=>'812001'],
                  ['A'=>'Address','B'=>'Nayabazar,Near Hanuman Mandir, House no:31'],
                ],
        ];
        return response()->json(['data' => $data], $this-> successStatus);  
    }
    //update profile info
    function update_profile_info(Request $request){
        // name:this.state.name,
        //         phoneno=>phoneno,
        //         city=>city,
        //         pincode=>pincode,
        //         address=>address,
        //         state=>state,
        $request_data = $request->json()->all();
        return response()->json(['data' => "saved",'verify'=>$request_data], $this-> successStatus);  
    }
    //update work info
    function update_work_info(Request $request){
    	$request_data = $request->json()->all();
        return response()->json(['data' => "saved",'verify'=>$request_data], $this-> successStatus); 
    }
}
