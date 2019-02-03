<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ROfferController extends Controller
{
    public function getOffer(Request $request){

       $id = $request->json()->all()['id'];
       $data = DB::table('resto_offer_table')
				->where('resto_offer_id','=',$id)
				->get();

        return response()->json(['data' => $data]);

    }
    public function setOffer(Request $request){

      $comment = $_POST['comment'];
      $end_date = $_POST['end_date'];
      $offer_id = $_POST['offer_id'];
      $offer_min_balance = $_POST['offer_min_balance'];
      $offer_name = $_POST['offer_name'];
      $offer_type = $_POST['offer_type'];
      $offer_value = $_POST['offer_value'];
      $operation = $_POST['operation'];
      $shop_id = $_POST['shop_id'];
      $startDate = $_POST['startDate'];
      $status = $_POST['status'];

      $nametoupload = '';
      if(isset($_FILES["photo"])){

    	  $FILES = $_FILES["photo"];
	      $name = 'Resto_id_'.$shop_id.'/';
		  $upload_dir = storage_path('app/public/Resto/offer/'.$name);
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
		  	$nametoupload = $name.$target_file1.'.'.$imageFileType;
		  }
		  else
		  {
		    return response()->json(['error'=>'Invalid file']);
		  }	
      }

      $UpdateData = array(
	              'resto_info_id' => $shop_id,
	              'resto_offer_name' => $offer_name,
	              'resto_offer_from' => $startDate,
	              'resto_offer_to' => $end_date,
	              'resto_offer_minBalance' => $offer_min_balance,
	              'resto_offer_type' => $offer_type,  
	              'resto_offer_value' => $offer_value,
	              'resto_offer_status' => $status,
	              'resto_offer_comment'=>$comment,
	            );


      	if($operation == "Edit"){
      		if ($nametoupload != '') {
	      		$UpdateData['resto_offer_pic'] = $nametoupload; 
	      	}
		  	DB::table('resto_offer_table')
	            ->where('resto_offer_id', '=', $offer_id)
	            ->update($UpdateData);
	  	}
	  	else{
	  		if ($nametoupload != '') {
	      		$UpdateData['resto_offer_pic'] = $nametoupload; 
	      	}
	      	else
	  		{
	  			$UpdateData['resto_offer_pic'] = 'ImageNotFound.png';		
	  		}
	  		DB::table('resto_offer_table')->insert($UpdateData);
	  	}

	  	return response()->json(['Success'=>'Updated Successfully.']);     
    }


}
