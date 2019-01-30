<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RestoModel\ProfileRT;
class profile_RT extends Controller
{
     public $successStatus = 200;


    public function UpdateProfile(Request $request){
    	
    	  $request_data = $request->all();
        $id = $request_data["shop_id"];
        $name = $request_data["name"];
        $state = $request_data["state"];
        $Pin_Code = $request_data["pincode"];
        $city = $request_data["city"];
        $address = $request_data["address"];
        $visiblity = $request_data["visiblility"];
        $isDelivery = $request_data["delivery"];
        $DCharge = $request_data["dcharge"];
        $phoneno = $request_data["phoneno"];
        $phoneno2 = $request_data["phoneno2"];

       $nametoupload = '';
      if(isset($_FILES["photo"])){

        $FILES = $_FILES["photo"];
        $name1 = 'Shop_id_'.$id.'/';
        $upload_dir = storage_path('app/public/Profie/'.$name1);
        // create folder if not exists
        if (!file_exists($upload_dir)) {
          mkdir($upload_dir, 0777, true);
        }

        //Send error 
        if ($FILES['error'])
        {
            return response()->json(['error'=>'Invalid file']);
        }

         //Change file name
         $target_file1 = uniqid().time();
         $imageFileType = pathinfo($FILES["name"],PATHINFO_EXTENSION);
         $target_file = $upload_dir.$target_file1.'.'.$imageFileType;

         //Upload file
         if (move_uploaded_file($FILES["tmp_name"], $target_file))
         { 
            //global $nametoupload;
            $nametoupload = 'http://gomarket.ourgts.com/storage/app/public/Profie/'.$name1.$target_file1.'.'.$imageFileType;
          }
          else
          {
              return response()->json(['error'=>'Invalid file']);
          } 
        }

    	$profileData = ProfileRT::where('res_info_id','=', $id)->first();

    	$report ="";

    	try {
		      
          $profileData->name = $name;
          $profileData->state = $state;
          $profileData->pincode = $Pin_Code;
          $profileData->city = $city;
          $profileData->address = $address;
          $profileData->visiblilty = $visiblity;
          $profileData->isDelivry = $isDelivery;
          $profileData->DCharge = $DCharge;
		      $profileData->save();
		      $report = "Successfully Updated";
		  }
	   	//catch exception
	  	catch(Exception $e) {
		    $report = 'Message: ' .$e->getMessage();
		  }

    	return response()->json(['data' => "saved",'verify'=>$report], $this-> successStatus);
    }
}
