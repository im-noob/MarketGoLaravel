<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class Authentication extends Controller
{
    public $successStatus = 200;

    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
    */ 
    public function login(Request $request){ 
        $email =  $request->json()->all()['email'];
        $password = $request->json()->all()['password'];
        $user_type = $request->json()->all()['user_type'];
        $noti_token = $request->json()->all()['noti_token'];

        if(Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => $user_type])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 






        // work info id fratching 
        $shop_info_id = DB::table('users')->select('id','phone')
                  ->where('email', '=', $email)
                  ->get();


         DB::table('users')
            ->where('email', '=', $email)
            ->update(['noti_token' => $noti_token]);
        //sending data according to user type


            if($user_type == 'shop'){
                //featching profile data 
                

                //work info table data 
                $shop_info_tab = DB::table('gro_shop_info_tab')->select()
                                ->where('user_id', '=', $shop_info_id[0]->id)
                                ->get();
               

                //making a aaray for item0
                $rating = DB::table('gro_cart_tab')
		                ->where('gro_shop_info_id', $shop_info_tab[0]->gro_shop_info_id)
		                ->avg('rating');

                // making sendable aaray         
                $data = [
                        "displayName"=>$shop_info_tab[0]->name,
                        "contactNO"=>$shop_info_id[0]->phone,
                        "state"=>$shop_info_tab[0]->state,
                        "city"=>$shop_info_tab[0]->city,
                        "address"=>$shop_info_tab[0]->address,
                        "location"=>$shop_info_tab[0]->location,
                        "ratting"=>$rating,
                        "pincode"=>$shop_info_tab[0]->Pin_Code,
                	];
             }
			else{
                $data = "NOt Configure your controller in user controller line no 83";
            }
            return response()->json(['success' => $success,'profileData' => $data,'userID'=>$shop_info_tab[0]->gro_shop_info_id,'status' => 'valid'], $this-> successStatus);
            
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
        $password = $request->json()->all()['password'];
        $c_password = $request->json()->all()['c_password'];
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
        if($user_type == 'shop'){
              
            //sendng all data to work info table 
            DB::table('gro_shop_info_tab')->insert(
                [
                  'user_id' => $wor_info_id[0]->id,
                  'name' => $name,
                  'state' => "",
                  'city' => "",
                  'pin_code' => "",
                  'address' => "",
                  'location' => "",  
                  'pic' => "",
                ]
            );
        }else{
            $data = "NOt Configure your controller in user controller line no 83";
        }
        
        return response()->json(['success'=>$success,'userID'=>$wor_info_id[0]->id,'reg_done' => 'yes'], $this-> successStatus); 
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
