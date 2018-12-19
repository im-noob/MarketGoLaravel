<?php
namespace App\Http\Controllers\API\MarketS;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller 
{
    public $successStatus = 200;

    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
    */ 
    public function login(Request $request){ 
        $email = $request->json()->all()['email'];
        $password = $request->json()->all()['password'];
        $user_type = $request->json()->all()['user_type'];

        if(Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => $user_type])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 






        // work info id fratching 
        $wor_info_id = DB::table('users')->select('id','phone')
                  ->where('email', '=', $email)
                  ->get();
        //sending data according to user type


            if($user_type == 'worker'){
                //featching profile data 
                

                //work info table data 
                $wor_info_tab = DB::table('wor_info_tab')->select()
                                ->where('wor_info_id', '=', $wor_info_id[0]->id)
                                ->get();
                // var_dump($wor_info_tab);
                

                //work rate table featching 
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
                // making sendable aaray         
                $data = [
                        "displayName"=>$wor_info_tab[0]->name,
                        "contactNO"=>$wor_info_id[0]->phone,
                        "mainwork"=>"you are greate to go",
                        "avtar_url"=>$wor_info_tab[0]->pic,
                        "searched"=>$wor_info_tab[0]->no_of_profile_view,
                        "contract"=>$wor_info_tab[0]->no_of_work,
                        "ratting"=>$wor_info_tab[0]->rating,
                        "items0"=>$temp_price,
                        "items1"=> [
                          ['A'=>'Work Experience(In year)','B'=>$wor_info_tab[0]->work_exp],
                          ['A'=>'Working Hour','B'=>$wor_info_tab[0]->work_hour],
                        ],
                        "items2"=>[
                          ['A'=>'State','B'=>$wor_info_tab[0]->state],
                          ['A'=>'City','B'=>$wor_info_tab[0]->city],
                          ['A'=>'PinCode','B'=>$wor_info_tab[0]->pin_code],
                          ['A'=>'Address','B'=>$wor_info_tab[0]->address],
                        ],
                ];

            }else if($user_type == 'worker'){
                $data = "Configure your controller in user controller line no 83";
            }else{
                $data = "NOt Configure your controller in user controller line no 83";
            }










            return response()->json(['success' => $success,'profileData' => $data,'userID'=>$wor_info_id[0]->id,'status' => 'valid'], $this-> successStatus);
            
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }


    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
    */ 
    public function register(Request $request) 
    { 
        $name = $request->json()->all()['name'];
        $email = $request->json()->all()['email'];
        // $password = $request->json()->all()['password'];
        // $c_password = $request->json()->all()['c_password'];
        $phone = $request->json()->all()['phone'];
        $user_type = $request->json()->all()['user_type'];
        

        // saving login data to user table 

        $validator = Validator::make($request->json()->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
            'phone' => 'required|numeric',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->json()->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;




        //fetching user id of the inserted data in users table 
        $wor_info_id = DB::table('users')->select('id')
                        ->where('email', '=', $email)
                        ->get();
        //sending data according to user type
        if($user_type == 'worker'){
               $data = [
                "displayName"=>$name,
                "contactNO"=>$phone,
                "mainwork"=>"update your work and profile",
                "avtar_url"=>"https://i.imgur.com/uj2JaPH.jpg",
                "searched"=>"0",
                "contract"=>"0",
                "ratting"=>"0",
                "items0"=>[
                  ['work'=>'1','price'=>'300-600','list_id'=>'1'],
                  ['work'=>'2','price'=>'1000-1200','list_id'=>'2'],
                  ['work'=>'3','price'=>'250-550','list_id'=>'3']
                ],
                "items1"=> [
                  ['A'=>'Work Experience(In year)','B'=>'3'],
                  ['A'=>'Working Hour','B'=>'10:00:AM-04:00:PM'],
                ],
                "items2"=>[
                  ['A'=>'State','B'=>'Bihar'],
                  ['A'=>'City','B'=>'BGP'],
                  ['A'=>'PinCode','B'=>'812001'],
                  ['A'=>'Address','B'=>'Nayabazar,Near Hanuman Mandir, House no:31'],
                ],
            ];
            
            

            //sendng all data to work info table 
            DB::table('wor_info_tab')->insert(
                [
                  'wor_info_id' => $wor_info_id[0]->id,
                  'name' => $data['displayName'],
                  'state' => $data['items2'][0]['B'],
                  'city' => $data['items2'][1]['B'],
                  'pin_code' => $data['items2'][2]['B'],
                  'address' => $data['items2'][3]['B'],
                  'work_hour' => $data['items1'][1]['B'],
                  'work_exp' => $data['items1'][0]['B'],
                  'location' => '',  
                  'no_of_profile_view' => $data['searched'],
                  'no_of_work' => $data['contract'],
                  'rating' => $data['ratting'],
                  'pic' => $data['avtar_url'],
                ]
            );

            //sending all data to wor rate table 
            $price = $data['items0'];
            $temp_price = [];
            foreach ($price as $key => $value) {
              $arr = [  
                    'wor_info_id' => $wor_info_id[0]->id,
                    'wor_subcat_id' => $value['work'],
                    'min_price' =>  explode('-', $value['price'])[0],
                    'max_price' =>  explode('-',$value['price'])[1]
              ];
                array_push($temp_price,$arr);
            }
            DB::table('wor_rate_tab')->insert($temp_price);

        }else if($user_type == 'worker'){
            $data = "Configure your controller in user controller line no 83";
        }else{
            $data = "NOt Configure your controller in user controller line no 83";
        }
        



        return response()->json(['success'=>$success,'profileData' => $data,'userID'=>$wor_info_id[0]->id,'reg_done' => 'yes'], $this-> successStatus); 
    }
   
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details(Request $request) 
    {     
        $query = $request->json()->all();
        $data = DB::select($query["query"]);
        return response()->json(['data' => $data], $this-> successStatus); 
    } 


    public function avilEmail(Request $request)
    {
      $data["status"] = true;
      $dataInput = $request->json()->all();
      // checking for email
      if($dataInput["check"] == 'email'){
        $email = $dataInput["email"];
        $countArr = DB::table('users')
            ->select('email')
            ->where('email',$email)
            ->get();
          if(sizeof($countArr)>0){
          $data["status"] = false;
        }
      } 
      return response()->json(['data' => $data], $this-> successStatus);
    }

    public function avilPhone(Request $request)
    {
      $data["status"] = true;
      $dataInput = $request->json()->all();
      // checking for phone no
      if($dataInput["check"] == 'phone'){
        $phone = $dataInput["phone"];
        $countArr = DB::table('users')
            ->select('phone')
            ->where('phone',$phone)
            ->get();
        if(sizeof($countArr)>0){
          $data["status"] = false;
        }
      }
      return response()->json(['data' => $data], $this-> successStatus);
    }
} 


