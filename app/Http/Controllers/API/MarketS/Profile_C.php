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


       $category_list = DB::table('wor_cat_tab')
            ->select('wor_cat_name','wor_cat_id')
            ->get();
        // SELECT wor_cat_name FROM `wor_cat_tab`SELECT * FROM `wor_subcat_tab
        $cat_sub_cat_arr_final = [];
        foreach ($category_list as $key => $value) {
            $subcategory_list = DB::table('wor_subcat_tab')
                ->select('wor_subcat_id','subcat_name')
                ->where('wor_cat_id',$value->wor_cat_id)
                ->get();
            // echo($value->wor_cat_name. "=>" );
            $intermediateArr = [];
            $subcategory_arr = [];
            foreach ($subcategory_list as $key => $subcategory) {
                $tmp = [];
                $tmp["key"] = $subcategory->wor_subcat_id;
                $tmp["value"] = $subcategory->subcat_name;
                array_push($subcategory_arr, $tmp);
            }
            
            $intermediateArr["category"] = $value->wor_cat_name;
            $intermediateArr["subcategory"] = $subcategory_arr;
            array_push($cat_sub_cat_arr_final, $intermediateArr);
        }
      return response()->json(['data'=>$cat_sub_cat_arr_final],$this->successStatus);
    }
}
