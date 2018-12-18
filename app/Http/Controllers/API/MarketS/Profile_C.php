<?php

namespace App\Http\Controllers\API\MarketS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;
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
                  ['work'=>'1','price'=>'300-600','list_id'=>'1'],
                  ['work'=>'2','price'=>'1000-1200','list_id'=>'2'],
                  ['work'=>'3','price'=>'250-550','list_id'=>'3'],
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
        $id = $request_data['userID'];

        DB::table('wor_info_tab')->where('wor_info_id', $id)
            ->update([
              'name' => $request_data['name'],
              'state' => $request_data['state'],
              'city' => $request_data['city'],
              'pin_code' => $request_data['pincode'],
              'address' => $request_data['address'],
            ]);
        DB::table('users')->where('id', $id)
            ->update([
              'phone' => $request_data['phoneno'],
            ]);
        return response()->json(['data' => "saved",'verify'=>$request_data], $this-> successStatus);  
    }
    //update work info
    function update_work_info(Request $request){
      // workingHour:workingHourSend,
      //               expYear:this.state.expYear,
      //               workList:this.state.workList,
    	$request_data = $request->json()->all();
        $id = $request_data['userID'];
      //sending data wor info table 
      DB::table('wor_info_tab')->where('wor_info_id', $id)
            ->update([
              'work_hour' => $request_data['workingHour'],
              'work_exp' => $request_data['expYear'],
            ]);
      

      //deleting each row with the id in wor rate table
      DB::table('wor_rate_tab')->where('wor_info_id', '=', $id)->delete();

      //inserting data to wor rate table 
      $price = $request_data['workList'];
      $temp_price = [];
      foreach ($price as $key => $value) {
        $arr = [  
              'wor_info_id' => $id,
              'wor_subcat_id' => $value['work'],
              'min_price' =>  explode('-', $value['price'])[0],
              'max_price' =>  explode('-',$value['price'])[1]
        ];
          array_push($temp_price,$arr);
      }
      DB::table('wor_rate_tab')->insert($temp_price);
      return response()->json(['data' => "saved",'verify'=>$request_data], $this-> successStatus); 
    }
    // for category and subcategory
    function get_cat_subCatForWork(Request $request)
    {
      $data = [
                [
                    "category"=>"computer","subcategory"=>[
                        ["value"=>"Hard Disk1","key"=>"1"],
                        ["value"=>"CUP finshing1","key"=>"2"],
                        ["value"=>"Fan reparing1","key"=>"3"],
                        ["value"=>"Mother Board repring1","key"=>"4"],
                        ["value"=>"Spari part reparing1","key"=>"5"],
                    ],
                ],
                [
                    "category"=>"Tranport","subcategory"=>[
                        ["value"=>"Hard Disk2","key"=>"6"],
                        ["value"=>"CUP finshing2","key"=>"7"],
                        ["value"=>"Fan reparing2","key"=>"8"],
                        ["value"=>"Mother Board repring2","key"=>"9"],
                        ["value"=>"Spari part reparing2","key"=>"10"],
                    ],
                ],
                [
                    "category"=>"Electrics","subcategory"=>[
                        ["value"=>"Hard Disk3","key"=>"11"],
                        ["value"=>"CUP finshing3","key"=>"12"],
                        ["value"=>"Fan reparing3","key"=>"13"],
                        ["value"=>"Mother Board repring3","key"=>"14"],
                        ["value"=>"Spari part reparing","key"=>"15"],
                    ],
                ],
                [
                    "category"=>"vechical","subcategory"=>[
                        ["value"=>"superHard DISk","key"=>"16"],
                        ["value"=>"CUP finshing4","key"=>"17"],
                        ["value"=>"Fan reparing4","key"=>"18"],
                        ["value"=>"Mother Board repring4","key"=>"19"],
                        ["value"=>"Spari part reparing4","key"=>"20"],
                    ],
                ]
            ];
      return response()->json(['data'=>$data],$this->successStatus);
    }
}
