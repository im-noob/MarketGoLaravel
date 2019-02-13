<?php

namespace App\Http\Controllers\API\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public $successStatus = 200;


    public function Cat_SubCat_Json(Request $request) 
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
      	return response()->json(['received'=>'yes','data'=>$cat_sub_cat_arr_final],$this->successStatus);
    }
    public function ServiceManList_get(Request $request){
        $subcatID = $request->json()->all()['subcategoryID'];
        /*$data = [
                    [
                      "info_id"=>"1",
                      "avtar_url"=>"https://instagram.fpat1-1.fna.fbcdn.net/vp/84c4e443d47dc2aa70a613a017a4c001/5CBB0AAC/t51.2885-19/s150x150/31908285_2109461939310314_4190149362170462208_n.jpg?_nc_ht=instagram.fpat1-1.fna.fbcdn.net",
                      "name"=>"Aarav kumar",
                      "ratting"=>"5.0",
                      "review"=>"1500",
                      "rate"=>"1415"
                    ],
                    [
                      "info_id"=>"2",
                      "avtar_url"=>"https://instagram.fpat1-1.fna.fbcdn.net/vp/836fa6eefe891bacb435221da1a34e9f/5CB68126/t51.2885-19/s150x150/23594988_159717817967684_5705323595526307840_n.jpg?_nc_ht=instagram.fpat1-1.fna.fbcdn.net",
                      "name"=>"Sushant Kumar",
                      "ratting"=>"1.9",
                      "review"=>"640",
                      "rate"=>"1100"
                    ],
                    [
                      "info_id"=>"3",
                      "avtar_url"=>"https://instagram.fpat1-1.fna.fbcdn.net/vp/d9dfa225194e9cbd0a0abfed6f754559/5CD8326A/t51.2885-19/s150x150/40845500_267627190434383_2753863881221734400_n.jpg?_nc_ht=instagram.fpat1-1.fna.fbcdn.net",
                      "name"=>"Ritika",
                      "ratting"=>"4.7",
                      "review"=>"1200",
                      "rate"=>"1000"
                    ],
                    [
                      "info_id"=>"4",
                      "avtar_url"=>"https://instagram.fpat1-1.fna.fbcdn.net/vp/875eed91e71a0354a970d9bbc5adebbd/5CD73B3E/t51.2885-19/s150x150/47173921_268889120486253_4384497285149491200_n.jpg?_nc_ht=instagram.fpat1-1.fna.fbcdn.net",
                      "name"=>"Radhika Garg",
                      "ratting"=>"4.3",
                      "review"=>"574",
                      "rate"=>"918"
                    ]
                ];
*/

        $data = DB::table('wor_rate_tab')
                  ->join('wor_info_tab','wor_info_tab.wor_info_id','=','wor_rate_tab.wor_info_id')
                  ->select(
                    'wor_info_tab.wor_info_id as info_id',
                    'name as name',
                    'pic as avtar_url',
                    'rating as ratting',
                    'no_of_work',
                    'no_of_profile_view as review',
                    DB::raw('(min_price + max_price)/2 as rate')
                  )
                  ->where('wor_subcat_id', '=', $subcatID)
                  
                  ->orderBy('no_of_work', 'desc')
                  ->get();


        return response()->json(['received'=>'yes','data'=>$data,'return_test'=>$subcatID],$this->successStatus);
    }
    public function renderProfileData_get(Request $request){
        $wor_serviceManPorifleID = $request->json()->all()['profileID'];
        /*$data = [
                    'avtar'=>'https://instagram.fpat1-1.fna.fbcdn.net/vp/84c4e443d47dc2aa70a613a017a4c001/5CBB0AAC/t51.2885-19/s150x150/31908285_2109461939310314_4190149362170462208_n.jpg?_nc_ht=instagram.fpat1-1.fna.fbcdn.net',
                    'name'=>'Aarav Kumar',
                    'searched'=>'100',
                    'contract'=>'3000',
                    'ratting'=>'4.5',
                    'startHour'=>'10:00',
                    'endHour'=>'04:00',
                    'experi'=>'5',
                    'addList'=>[
                        [   'key'=>'State','value'=>'Bihar'],
                        [   'key'=>'City','value'=>'Bhagalpur'],
                        [   'key'=>'Pincode','value'=>'812002'],
                        [   'key'=>'Address','value'=>'Room no:3,Block-17,South Colony,Nayabazar,Bhagalpur'],
                    ],
                    'workList' => [
                        [   'key'=>'Temp Reparing','value'=>'4000-8524' , 'workSubCatId'=>'6'],
                        [   'key'=>'Computer Reparing','value'=>'500-855', 'workSubCatId'=>'3'],
                        [   'key'=>'HDD','value'=>'8000-8855', 'workSubCatId'=>'2'],
                        [   'key'=>'Wirring','value'=>'5150-6520', 'workSubCatId'=>'15'],
                    ],
                    'contactNo'=>'1234567890',
                    'workerID'=>'34',
                ];
*/

        $wor_info_tab = DB::table('wor_info_tab')
                  ->join('users','users.id','=','wor_info_tab.wor_info_id')
                  ->select(
                    'wor_info_id as workerID',
                    'wor_info_tab.name as name', 
                    'work_exp as experi', 
                    'no_of_profile_view as searched',  
                    'no_of_work as contract',
                    'rating as ratting',
                    'pic as avtar',
                    'phone as contactNo',
                    'state', 
                    'city', 
                    'pin_code', 
                    'address',
                    'work_hour'
                  )
                  ->where('wor_info_id', '=', $wor_serviceManPorifleID)
                  ->get();

        $data = [];
        foreach ($wor_info_tab as $key => $value) {
            $data = [
                    'avtar'=>$value->avtar,
                    'name'=>$value->name,
                    'searched'=>$value->searched,
                    'contract'=>$value->contract,
                    'ratting'=>$value->ratting,
                    'experi'=>$value->experi,
                    'contactNo'=>$value->contactNo,
                    'workerID'=>$value->workerID,
                    'addList'=>[
                        [   'key'=>'State','value'=>$value->state],
                        [   'key'=>'City','value'=>$value->city],
                        [   'key'=>'Pincode','value'=>$value->pin_code],
                        [   'key'=>'Address','value'=>$value->address],
                    ],
                    'startHour'=>explode('-',$value->work_hour)[0],
                    'endHour'=>explode('-',$value->work_hour)[1],
                    'workList' => [
                        [   'key'=>'Temp Reparing','value'=>'4000-8524' , 'workSubCatId'=>'6'],
                        [   'key'=>'Computer Reparing','value'=>'500-855', 'workSubCatId'=>'3'],
                        [   'key'=>'HDD','value'=>'8000-8855', 'workSubCatId'=>'2'],
                        [   'key'=>'Wirring','value'=>'5150-6520', 'workSubCatId'=>'15'],
                    ]
                    
                ];

                //geting work list 
                $wor_rate_tab = DB::table('wor_rate_tab')
                        ->join('wor_subcat_tab', 'wor_subcat_tab.wor_subcat_id', '=', 'wor_rate_tab.wor_subcat_id')
                        ->where('wor_info_id', '=', $wor_serviceManPorifleID)
                        ->get();
                //making a aaray 
                $i = 1; 
                $temp_price = [];
                foreach ($wor_rate_tab as $key => $value) {
                  $arr = [  
                          'list_id' => $i,
                          'workSubCatId' => $value->wor_subcat_id,
                          'value' => $value->min_price."-".$value->max_price,
                          // 'category' => $value->wor_subcat_id,
                          'key' => $value->subcat_name,
                  ];
                  $i = $i + 1;
                  array_push($temp_price,$arr);
                }
                $data['workList'] = $temp_price;
        }

        return response()->json(['received'=>'yes','data'=>$data,'return_test'=>$wor_serviceManPorifleID],$this->successStatus);
    }
    public function HierMe_do(Request $request){
        $wor_info_id = $request->json()->all()['workerID'];
        $wor_subcat_id = $request->json()->all()['WorkSubCatID'];
        $customer_info_Id = $request->json()->all()['customerID'];
        $message = $request->json()->all()['message'];
        $title = $request->json()->all()['title'];

        $data = [
                    
                ];
        //sendng all data to work info table 
        DB::table('wor_order_tab')->insert(
            [
              'wor_info_id' => $wor_info_id,
              'wor_subcat_id' => $wor_subcat_id,
              'customer_info_Id' => $customer_info_Id,
              'message' => $message,
              'title' => $title,
              'bill_list' => '[{"list_id":"1","price":"00","work":"Work Name"}]',
              'workPorgressStatus' => '0',              
            ]
        );

        return response()->json(['received'=>'yes','data'=>$data,'return_test'=>[
              'wor_info_id' => $wor_info_id,
              'wor_subcat_id' => $wor_subcat_id,
              'customer_info_Id' => $customer_info_Id,
              'message' => $message,
              'title' => $title,
              'bill_list' => '[{"list_id":"1","price":"00","work":"Work Name"}]',
              'workPorgressStatus' => '0',              
            ]],$this->successStatus);
    }

    // histyr geing
    public function ServiceHistory_get(Request $request){
        $customerID = $request->json()->all()['profileID'];

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
        //             [
        //                 "workerAvtar"=>"https://i.imgur.com/uj2JaPH.jpg",
        //                 "workerName"=>"Worker Name2",
        //                 "Work"=>"Work Name2",
        //                 "title"=>"Title2",
        //                 "message"=>"Message2",
        //                 "workPorgressStatus"=>4,
        //                 "billList"=>[
        //                     [
        //                     "list_id"=> "12",
        //                     "price"=> "502",
        //                     "work"=> "Condencer2"
        //                     ],
        //                     [
        //                     "list_id"=> "22",
        //                     "price"=> "2002",
        //                     "work"=> "Repairing2"
        //                     ]
        //                 ],
        //             ],
        //             [
        //                 "workerAvtar"=>"https://i.imgur.com/uj2JaPH.jpg",
        //                 "workerName"=>"Worker Name3",
        //                 "Work"=>"Work Name3",
        //                 "title"=>"Title3",
        //                 "message"=>"Message3",
        //                 "workPorgressStatus"=>3,
        //                 "billList"=>[
        //                     [
        //                     "list_id"=> "13",
        //                     "price"=> "503",
        //                     "work"=> "Condencer3"
        //                     ],
        //                     [
        //                     "list_id"=> "23",
        //                     "price"=> "2003",
        //                     "work"=> "Repairing3"
        //                     ]
        //                 ],
        //             ],
        //             [
        //                 "workerAvtar"=>"https://i.imgur.com/uj2JaPH.jpg",
        //                 "workerName"=>"Worker Name4",
        //                 "Work"=>"Work Name4",
        //                 "title"=>"Title4",
        //                 "message"=>"Message4",
        //                 "workPorgressStatus"=>2,
        //                 "billList"=>[
        //                     [
        //                     "list_id"=> "14",
        //                     "price"=> "504",
        //                     "work"=> "Condencer4"
        //                     ],
        //                     [
        //                     "list_id"=> "24",
        //                     "price"=> "2004",
        //                     "work"=> "Repairing4"
        //                     ]
        //                 ],
        //             ],
        //         ];

        //$customerID = '79';

        $wor_order_tab = DB::table('wor_order_tab')
                  ->join('wor_info_tab','wor_info_tab.wor_info_id','=','wor_order_tab.wor_info_id')
                  ->join('wor_subcat_tab','wor_subcat_tab.wor_subcat_id','=','wor_order_tab.wor_subcat_id')
                  ->select(
                    'wor_info_tab.pic as workerAvtar',
                    'wor_info_tab.name as workerName', 
                    'wor_subcat_tab.subcat_name as Work', 
                    'title',  
                    'message',
                    'workPorgressStatus',
                    'bill_list as billList'
                    
                  )
                  ->where('customer_info_Id', '=', $customerID)
                  ->get();

        $data = [];
        foreach ($wor_order_tab as $key => $value) {
            $dataSingle = [
                    "workerAvtar"=>$value->workerAvtar,
                    "workerName"=>$value->workerName,
                    "Work"=>$value->Work,
                    "title"=>$value->title,
                    "message"=>$value->message,
                    "workPorgressStatus"=>$value->workPorgressStatus,
                    "billList"=>[
                        [
                        "list_id"=> "11",
                        "price"=> "501",
                        "work"=> "Condencer1"
                        ],
                        [
                        "list_id"=> "21",
                        "price"=> "2001",
                        "work"=> "Repairing1"
                        ]
                    ]
                ];

                $billList = [];
                $decoded_billList = json_decode($value->billList);
                foreach ($decoded_billList as $key => $value) {
                    $temp_arr = [];
                    $temp_arr['list_id'] = $value->list_id;
                    $temp_arr['price'] = $value->price;
                    $temp_arr['work'] = $value->work;
                    array_push($billList, $temp_arr);
                }
                $dataSingle['billList'] = $billList;

                array_push($data, $dataSingle);
          }


        return response()->json(['received'=>'yes','data'=>$data,'return_test'=>$customerID],$this->successStatus);
    }
}
