<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RestoModel\ProfileRT;
class profile_RT extends Controller
{
    public function UpdateProfile(Request $request){
    	
    	$id = $_POST["id"];
    	$name = $_POST["name"];
    	$address = $_POST["address"];
    	$location = $_POST["location"];


    	$profileData = ProfileRT::where('res_info_tab','=', $id)->first();

    	$report ="";

    	try {
		  $profileData->name = $name;
		  $profileData->address = $address;
		  $profileData->location = $location;
		  $profileData->save();

		  $report = "Successfully Updated";
		}
		//catch exception
		catch(Exception $e) {
		  $report 'Message: ' .$e->getMessage();
		}

    	return $report;
    }
}
