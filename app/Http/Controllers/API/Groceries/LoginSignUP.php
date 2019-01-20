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

        if(Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => $user_type])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 

            // work info id fratching 
            $wor_info_id = DB::table('users')->select('id','phone')
                      ->where('email', '=', $email)
                      ->get();
            //sending data according to user type


            if($user_type == 'user'){
                //featching profile data 
                
               
              
            }else if($user_type == 'worker'){
                $data = "Configure your controller in user controller line no 83";
            }else{
                $data = "NOt Configure your controller in user controller line no 83";
            }
            return response()->json(['success' => $success,'profileData' => [],'userID'=>$wor_info_id[0]->id,'status' => 'valid'], $this-> successStatus);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }


    /** 
     * Register api 
     * 
     *  
    */ 
    public function register(Request $request) 
    { 
       /** $name = $request->json()->all()['name'];
        $email = $request->json()->all()['email'];
        // $password = $request->json()->all()['password'];
        // $c_password = $request->json()->all()['c_password'];
        $phone = $request->json()->all()['phone'];
        $user_type = $request->json()->all()['user_type'];*/
		$name = $request->name;
		$email = $request->email;
		$password = $request->password;
		$c_password = $request->c_password;
		$phone = $request->phone;
		$user_type = $request->user_type;
        

        // saving login data to user table 

        $validator = Validator::make($request->json()->all(),[ 
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
        $user_info_id = DB::table('users')->select('id')
                        ->where('email', '=', $email)
                        ->get();
        
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


        }else if($user_type != 'worker'){
            $data = "Configure your controller in user controller line no 83";
        }else{
            $data = "NOt Configure your controller in user controller line no 83";
        }
        



        return response()->json(['success'=>$success,'profileData' =>[],'userID'=>$wor_info_id[0]->id,'reg_done' => 'yes'], $this-> successStatus); 
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
