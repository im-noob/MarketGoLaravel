<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GroceriesModel\Profile;

class profile_GR extends Controller
{
	    public $successStatus = 200;

    public function UpdateProfile(Request $request){

    	$request_data = $request->json()->all();
    	$id = $request_data["id"];
    	$name = $request_data["name"];
    	$state = $request_data["state"];
    	$Pin_Code = $request_data["Pin_Code"];
    	$city = $request_data["city"];
    	$address = $request_data["address"];
    	$visiblity = $request_data["visiblility"];
    	$isDelivery = $request_data["delivery"];
    	$DCharge = $request_data["dcharge"];


    	$profileData = Profile::where('gro_shop_info_id','=', $id)->first();

    	$report ="";

    	try {
		  $profileData->name = $name;
		  $profileData->state = $state;
		  $profileData->Pin_Code = $Pin_Code;
		  $profileData->city = $city;
		  $profileData->address = $address;
		  $profileData->visiblilty = $visiblity;
		  $profileData->IsDelivery = $isDelivry;
		  $profileData->DCharge = $DCharge;
		  //$profileData->location = $location;
		  $profileData->save();

		  $report = "Successfully Updated";
		}
		//catch exception
		catch(Exception $e) {
		  $report = 'Message: '.$e->getMessage();
		}

    	return response()->json(['data' => "saved",'verify'=>$report], $this-> successStatus);
    }
}
