<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class profile_CUS extends Controller
{
	//supproting function
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

	//supproting function
    function getPhoneAndEmail($id){
    	$wor_info_id = DB::table('users')->select('email','phone')
                        ->where('id', '=', $id)
                        ->get();

        return($this->gerProfileData($userID,$wor_info_id[0]->phone,$wor_info_id[0]->email));
    }

    public function setProfileBasicDetails(Request $request) 
    { 
        
        $incomingData = $request->json()->all();
        
        $profile_name = $incomingData['profile_name'],
        $profile_phonheno = $incomingData['profile_phonheno'],
        $profile_email = $incomingData['profile_email'],

        $userID = $incomingData['userID'],

        DB::table('customer_info_tab')
            ->where('user_id', $userID)
            ->update([
            	'cname' => $profile_name
            ]);

       DB::table('users')
        ->where('user_id', $userID)
        ->update([
        	'name' => $profile_name,
        	'email' => $profile_email,
            'phone' => $profile_phonheno,
        ]);


        $data = $this->getPhoneAndEmail($userID);

        return response()->json([
        		'data' => $data,
        		'received' => 'yes',
        	], $this-> successStatus); 
    } 

    public function setProfileShippingDetails(Request $request) 
    { 
        
        $incomingData = $request->json()->all();

        $shipping_state = $incomingData['shipping_state'],
        $shipping_city = $incomingData['shipping_city'],
        $shipping_street = $incomingData['shipping_street'],
        $shipping_pincode = $incomingData['shipping_pincode'],


        DB::table('customer_info_tab')
            ->where('user_id', $userID)
            ->update([
            	'state' => $shipping_state,
            	'city' => $shipping_city,
            	'address' => $shipping_street,
            	'cpin' => $shipping_pincode,
            ]);

        $userID = $incomingData['userID'],
        $data = $this->getPhoneAndEmail($userID);
        return response()->json([
        		'data' => $data,
        		'received' => 'yes',
        	], $this-> successStatus); 
    } 
}
