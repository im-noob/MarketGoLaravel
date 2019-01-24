<?php
namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderSet extends Controller
{
    //get request
    public function getRequestOrderValue(Request $request)
    {
        
      $cartID = DB::table('gro_cart_tab')
            ->insertGetId(['real_amt'=>$request->real_Price,
						   'offer_amt'=>$request->Offer_Price,
						   'Customer_info_id'=>$request->customerID,
						   'status'=>0,
						   'paid_amt'=>$request->paid_amt,
						   'order_address'=>$request->Order_address,
						   'gro_shop_info_id'=>$request->gro_shop_ID]);

      //  var_dump($value);
        $mainArray = array();

        foreach ($request->Item as $value) 
        {
           // var_dump($value);
           $secandArray = array();
           $secandArray['gro_cart_id'] = $cartID;
           $secandArray['gro_quantity'] = $value['qua'];
           $secandArray['real_price'] = $value['real_Price'];
           $secandArray['offer_price'] = $value['offer_price'];
           $secandArray['gro_map_id'] = $value['map_id'];
           $secandArray['order_status']=0;
		   $secandArray['gro_product_shop_id']=$value['gro_product_shop_id'];
           array_push($mainArray,$secandArray);
        }
         $orderIDs = DB::table('gro_order_tab')
            ->insert($mainArray);
       
        if($orderIDs)
			return response()->json(['data' => "true"]);
		else 
			return response()->json(['data' => "false"]);
	
    }

    //GET Order List 
    public function getOrderList(Request $request)
    {
		/**SELECT `gro_cart_tab`.`gro_cart_id`, `gro_cart_tab`.`real_amt`, 
		`gro_cart_tab`.`offer_amt`, `gro_cart_tab`.`paid_amt`, `gro_cart_tab`.`customer_info_id`,
		`gro_cart_tab`.`status`,`gro_cart_tab`.`gro_shop_info_id`, `gro_cart_tab`.`rating`,
		`gro_cart_tab`.`feedback`, `gro_cart_tab`.`created_at`,`gro_shop_info_tab`.`name` FROM `gro_cart_tab`
        INNER JOIN `gro_shop_info_tab` ON `gro_shop_info_tab`.`gro_shop_info_id` = `gro_cart_tab`.`gro_shop_info_id`
		WHERE `gro_cart_tab`.`customer_info_id` = 24 ORDER BY `gro_cart_tab`.`created_at` DESC  */
       $data = DB::table('gro_cart_tab')
	   ->JOIN('gro_shop_info_tab','gro_shop_info_tab.gro_shop_info_id','=','gro_cart_tab.gro_shop_info_id')
		->select("gro_cart_tab.gro_cart_id","gro_cart_tab.real_amt", 
		"gro_cart_tab.offer_amt", "gro_cart_tab.paid_amt", "gro_cart_tab.customer_info_id",
		"gro_cart_tab.status","gro_cart_tab.gro_shop_info_id", "gro_cart_tab.rating",
		"gro_cart_tab.feedback", "gro_cart_tab.created_at")
		->where("gro_cart_tab.customer_info_id","=",$request->userID)
		->orderBy("gro_cart_tab.created_at")
		->simplePaginate(20);

        return response()->json(['data' => $data]);
    }
	
	//GET cart item
	public function getOrderListItem(Request $request)
    {
	/**SELECT `gro_order_tab`.`gro_order_id`, `gro_order_tab`.`gro_cart_id`,
		`gro_order_tab`.`gro_quantity`, `gro_order_tab`.`real_price`, `gro_order_tab`.`offer_price`, 
		`gro_order_tab`.`gro_map_id`, `gro_order_tab`.`gro_product_shop_id`, 
		`gro_order_tab`.`order_status`, `gro_order_tab`.`created_at`,
		`gro_product_list_tab`.`gro_product_name` FROM `gro_order_tab` 
		INNER JOIN`gro_map_tab` ON `gro_map_tab`.`gro_map_id` = `gro_order_tab`.`gro_map_id`
		INNER JOIN `gro_product_list_tab`
		ON `gro_product_list_tab`.`gro_product_list_id` = `gro_map_tab`.`gro_produt_list_id`
		WHERE `gro_order_tab`.`gro_cart_id` =10 */
       $data = DB::table('gro_order_tab')
		->JOIN("gro_map_tab","gro_map_tab.gro_map_id", "=" ,"gro_order_tab.gro_map_id")
		->JOIN("gro_product_list_tab","gro_product_list_tab.gro_product_list_id","=","gro_map_tab.gro_produt_list_id")
		->select("gro_order_tab.gro_order_id", "gro_order_tab.gro_cart_id","gro_order_tab.gro_quantity",
		"gro_order_tab.real_price", "gro_order_tab.offer_price", 
		"gro_order_tab.gro_map_id", "gro_order_tab.gro_product_shop_id", 
		"gro_order_tab.order_status", "gro_order_tab.created_at",
		"gro_product_list_tab.gro_product_name")
		->where("gro_order_tab.gro_cart_id","=",$request->cartID)
		->orderBy("gro_order_tab.created_at")
		->simplePaginate(20);

        return response()->json(['data' => $data]);
    }
	
	
	
	//GET recent item
	public function getRecentListItem(Request $request)
    {
	/**
		SELECT DISTINCT  `gro_order_tab`.`gro_order_id`, `gro_order_tab`.`gro_cart_id`,
		`gro_order_tab`.`gro_quantity`, `gro_order_tab`.`real_price`, `gro_order_tab`.`offer_price`, 
		`gro_order_tab`.`gro_map_id`, `gro_order_tab`.`gro_product_shop_id`, 
		`gro_order_tab`.`order_status`, `gro_order_tab`.`created_at`,
		`gro_product_list_tab`.`gro_product_name` FROM `gro_order_tab` 
		INNER JOIN`gro_map_tab` ON `gro_map_tab`.`gro_map_id` = `gro_order_tab`.`gro_map_id`
		INNER JOIN `gro_product_list_tab` ON `gro_product_list_tab`.`gro_product_list_id` = `gro_map_tab`.`gro_produt_list_id`
        INNER JOIN `gro_cart_tab` ON `gro_cart_tab`.`gro_cart_id` = `gro_order_tab`.`gro_cart_id`
		WHERE `gro_cart_tab`.`customer_info_id` = 24 ORDER BY `gro_order_tab`.`created_at` DESC*/
	
       $data = DB::table('gro_order_tab')
		->JOIN("gro_map_tab","gro_map_tab.gro_map_id", "=" ,"gro_order_tab.gro_map_id")
		->JOIN("gro_product_list_tab","gro_product_list_tab.gro_product_list_id","=","gro_map_tab.gro_produt_list_id")
		->JOIN("gro_cart_tab","gro_cart_tab.gro_cart_id","=","gro_order_tab.gro_cart_id")
		->select("gro_order_tab.gro_order_id", "gro_order_tab.gro_cart_id","gro_order_tab.gro_quantity",
		"gro_order_tab.real_price", "gro_order_tab.offer_price","gro_order_tab.gro_map_id", 
		"gro_order_tab.gro_product_shop_id","gro_order_tab.order_status", "gro_order_tab.created_at",
		'gro_product_list_tab.gro_product_name','gro_map_tab.gro_cat_id',
				'gro_map_tab.quantity','gro_map_tab.gro_map_id','gro_product_list_tab.gro_product_list_id',
				'gro_product_list_tab.gro_product_info','gro_product_list_tab.pic')
		->where("gro_cart_tab.customer_info_id","=",$request->userID)
		->orderBy("gro_order_tab.created_at")->simplePaginate(200);
		 
		 $freshArray =array();
		 
		 foreach($data as $da)
		 {
			 $i=0;
			 var_dump($da);
			 foreach($freshArray as $fresh)
			 {
				if($fresh->gro_product_name == $da->gro_product_name) 
					$i++;
			 }
			 if($i == 0)
			 array_push($freshArray,$da);
		 }
		// var_dump($freshArray);*/

      return response()->json(['data' => $freshArray]);
	   
    }
}
