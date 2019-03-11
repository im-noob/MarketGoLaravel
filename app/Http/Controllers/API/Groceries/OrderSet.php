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
       // echo "Real price ".$request->realPrice;
      $cartID = DB::table('gro_cart_tab')
            ->insertGetId(['real_amt'=>$request->realPrice,
						   'offer_amt'=>$request->offer,
						   'Customer_info_id'=>$request->cid,
						   'status'=>0,
						   'paid_amt'=>$request->topay,
						   'order_address'=>$request->address,
						   'gro_shop_info_id'=>$request->shop]);

      //  var_dump($value);
        $mainArray = array();

        foreach ($request->Order as $value) 
        {
           // var_dump($value);
           $secandArray = array();
           $secandArray['gro_cart_id'] = $cartID;
           $secandArray['gro_quantity'] = $value['Quantity'];
           $secandArray['real_price'] = $value['price'];
           $secandArray['offer_price'] = $value['offer'];
           $secandArray['gro_map_id'] = $value['map'];
           $secandArray['order_status']=0;
		   $secandArray['gro_product_shop_id']=$value['spid'];
           array_push($mainArray,$secandArray);
        }
         $orderIDs = DB::table('gro_order_tab')
            ->insert($mainArray);
       
        if($orderIDs)
			return response()->json(['received' => "yes"]);
		else 
			return response()->json(['received' => "false"]);
	
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
		->select("gro_cart_tab.gro_cart_id ","gro_cart_tab.real_amt", 
		"gro_cart_tab.offer_amt", "gro_cart_tab.paid_amt", "gro_cart_tab.customer_info_id",
		"gro_cart_tab.status","gro_cart_tab.gro_shop_info_id", "gro_cart_tab.rating",
		"gro_cart_tab.feedback", "gro_cart_tab.created_at","gro_shop_info_tab.name")
		->where("gro_cart_tab.customer_info_id","=",$request->userID)
		->orderBy("gro_cart_tab.created_at",'desc')
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
select DISTINCT `gro_order_tab`.`gro_order_id`, `gro_order_tab`.`gro_cart_id`, `gro_order_tab`.`gro_quantity`, `gro_order_tab`.`real_price`, 
`gro_order_tab`.`offer_price`, `gro_order_tab`.`gro_map_id`, `gro_order_tab`.`gro_product_shop_id`, `gro_order_tab`.`order_status`, 
`gro_order_tab`.`created_at`, `gro_product_list_tab`.`gro_product_name`, `gro_map_tab`.`gro_cat_id`, `gro_map_tab`.`quantity`, `unit_tab`.`unit_name`,
`gro_map_tab`.`gro_map_id`, `gro_product_list_tab`.`gro_product_list_id`, `gro_product_list_tab`.`gro_product_info`, `gro_product_list_tab`.`pic`
 from `gro_order_tab`
 inner join `gro_map_tab` on `gro_map_tab`.`gro_map_id` = `gro_order_tab`.`gro_map_id`
 inner join `gro_product_list_tab` on `gro_product_list_tab`.`gro_product_list_id` = `gro_map_tab`.`gro_produt_list_id`
 inner join `gro_cart_tab` on `gro_cart_tab`.`gro_cart_id` = `gro_order_tab`.`gro_cart_id`
 inner join `gro_product_shop_tab` on `gro_product_shop_tab`.`gro_map_id` = `gro_map_tab`.`gro_map_id`
 inner join `unit_tab` on `gro_product_shop_tab`.`unit_id` = `unit_tab`.`unit_id`
 where `gro_cart_tab`.`customer_info_id` = 120 order by `gro_order_tab`.`created_at` asc limit 201 offset 0
 */
	
       $data = DB::table('gro_order_tab')
		->JOIN("gro_map_tab","gro_map_tab.gro_map_id", "=" ,"gro_order_tab.gro_map_id")
		->JOIN("gro_product_list_tab","gro_product_list_tab.gro_product_list_id","=","gro_map_tab.gro_produt_list_id")
		->JOIN("gro_cart_tab","gro_cart_tab.gro_cart_id","=","gro_order_tab.gro_cart_id")
		->JOIN("gro_product_shop_tab","gro_product_shop_tab.gro_map_id","=","gro_map_tab.gro_map_id")
		->JOIN("unit_tab","gro_product_shop_tab.unit_id","=","unit_tab.unit_id")
		->select("gro_order_tab.gro_product_shop_id as psid", "gro_order_tab.created_at as c",
		'gro_product_list_tab.gro_product_name as title','gro_map_tab.gro_cat_id as cid','gro_map_tab.quantity as size',
		'gro_map_tab.gro_map_id as map','gro_product_list_tab.gro_product_list_id as plid',
				'gro_product_list_tab.gro_product_info as pinfo','gro_product_list_tab.pic','unit_tab.unit_name as unit')
		->where("gro_cart_tab.customer_info_id","=",$request->userID)
		->distinct()
		->orderBy("c")->simplePaginate(200);
		 
		 $freshArray =array();
		// var_dump($data);
		 foreach($data as $da)
		 {
			 $i=0;
			 $da->flag=false;
			 $da->Quantity=1;
			// var_dump($da);
			 foreach($freshArray as $fresh)
			 {
				if($fresh->title == $da->title) 
					$i++;
			 }
			 if($i == 0)
			 array_push($freshArray,$da);
		 }
		// var_dump($freshArray); $freshArray*/

      return response()->json(['data' =>$freshArray,'received'=>'yes']); 
    }
	
	//UPDATE feedback and rating
	public function feedback(Request $request)
	{
		/**UPDATE `gro_cart_tab` SET `rating`='2',`feedback`='This product is not good'
		WHERE `gro_cart_id`=2*/
		
		DB::table('gro_cart_tab')
            ->where('gro_cart_id','=',$request->cartID)
            ->update(['feedback' => $request->remark,'rating'=>$request->star]);
			
		return response()->json(['data' => "true"]);
	}
}
