<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class offerController extends Controller
{
    public function getOffer(Request $request){

       $id = $request->json()->all()['id'];
       $data = DB::table('gro_offer_table')
				->where('gro_shop_info_id','=',$id)
				->get();

        return response()->json(['data' => $data]);

    }

    public function setOffer(Request $request){

	  
      //$Data = $request->all();
	  
	  //return response()->json(['request' => $Data,'File'=>$_FILES,'post'=>$_POST]);

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
	      $name = 'Shop_id_'.$shop_id.'/';
		  $upload_dir = storage_path('app/public/offer/'.$name);
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
	              'gro_shop_info_id' => $shop_id,
	              'gro_offer_name' => $offer_name,
	              'gro_offer_from' => $startDate,
	              'gro_offer_to' => $end_date,
	              'gro_offer_minBalance' => $offer_min_balance,
	              'gro_offer_type' => $offer_type,  
	              'gro_offer_value' => $offer_value,
	              'gro_offer_status' => $status,
	              'gro_offer_comment'=>$comment,
	            );


      	if($operation == "Edit"){
      		if ($nametoupload != '') {
	      		$UpdateData['gro_offer_pic'] = $nametoupload; 
	      	}
		  	DB::table('gro_offer_table')
	            ->where('gro_offer_id', '=', $offer_id)
	            ->update($UpdateData);
	  	}
	  	else{
	  		if ($nametoupload != '') {
	      		$UpdateData['gro_offer_pic'] = $nametoupload; 
	      	}
	      	else
	  		{
	  			$UpdateData['gro_offer_pic'] = 'ImageNotFound.png';		
	  		}
	  		DB::table('gro_offer_table')->insert($UpdateData);
	  	}

	  	return response()->json(['Success'=>'Updated Successfully.']);     
    }
}
