<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;
class LoginSignUP extends Controller
{
	public $successStatus = 200;
    public function login(Request $request){ 
        $email = $request->json()->all()['email'];
        $password = $request->json()->all()['password'];
        $user_type = $request->json()->all()['user_type'];
		 $noti_token = $request->json()->all()['noti_token'];
        if(Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => $user_type])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 

            // work info id fratching 
            $wor_info_id = DB::table('users')->select('id','phone')
                      ->where('email', '=', $email)
                      ->get();
            //sending data according to user type

            $userID = $wor_info_id[0]->id; 

            if($user_type == 'user'){
                //featching profile data 
                $profileData = $this->gerProfileData($userID,$wor_info_id[0]->phone,$email);
               
              
            }else if($user_type == 'worker'){
                $data = "Configure your controller in user controller line no 83";
            }else{
                $data = "NOt Configure your controller in user controller line no 83";
            }
            return response()->json(
              [
                'success' => $success,
                'profileData' => $profileData,
                'userID'=>$userID,
                'status' => 'valid'
              ], $this-> successStatus
            );
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }


    function gerProfileData($id,$phone,$email){
        $profileData = DB::table('customer_info_tab')->select('customer_info_id','cname','state','city','location','address','pic','cpin','user_id')
                      ->where('user_id', '=', $id)
                      ->get();
        $profileData['customer_info_id'] = $profileData[0]->customer_info_id;
        $profileData['cname'] = $profileData[0]->cname;
        $profileData['state'] = $profileData[0]->state;
        $profileData['city'] = $profileData[0]->city;
        $profileData['location'] = $profileData[0]->location;
        $profileData['address'] = $profileData[0]->address;
        $profileData['pic'] = $profileData[0]->pic;
        $profileData['cpin'] = $profileData[0]->cpin;
        $profileData['user_id'] = $profileData[0]->user_id;
        $profileData['phone'] = $phone;
        $profileData['email'] = $email;

        return($profileData);
    }

    public function register(Request $request) 
    { 
        $name = $request->json()->all()['name'];
        $email = $request->json()->all()['email'];
        $password = $request->json()->all()['password'];
        $c_password = $request->json()->all()['c_password'];
        $phone = $request->json()->all()['phone'];
        $user_type = $request->json()->all()['user_type'];


        // saving login data to user table 

        $validator = Validator::make($request->json()->all(),[ 
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
        $wor_info_id = DB::table('users')->select('id','phone')
                        ->where('email', '=', $email)
                        ->get();
        $userID = $wor_info_id[0]->id; 
        //sending data according to user type
        if($user_type == 'user'){
          
            //sendng all data to work info table 
            DB::table('customer_info_tab')->insert(
                [
                  'cname' => 'Your Name',
                  'state' => 'Bihar',
                  'city' => 'Bhagalpur',
                  'location' => 'location',
                  'address' => 'Your Address',
                  'pic' => '',
                  'cpin' => '812001',
                  'user_id' => $wor_info_id[0]->id,
                ]
            );

            //featching profile data 
                $profileData = $this->gerProfileData($userID,$wor_info_id[0]->phone,$email);

        }else if($user_type != 'worker'){
            $data = "Configure your controller in user controller line no 83";
        }else{
            $data = "NOt Configure your controller in user controller line no 83";
        }
        
        return response()->json(['success'=>$success,'profileData' =>$profileData,'userID'=>$userID,'reg_done' => 'yes'], $this-> successStatus); 
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
    public function send_OTP_fun(Request $request)
    {
      $data['sendOTP'] = 'yes';
      $reveiced = $request->json()->all();
      return response()->json(['data'=>$data,'feedback'=>$reveiced]);
    }
    public function change_password_fun(Request $request)
    {
      $data['changed'] = 'yes';
      $reveiced = $request->json()->all();
      return response()->json(['data'=>$data,'feedback'=>$reveiced]);
    }
}
