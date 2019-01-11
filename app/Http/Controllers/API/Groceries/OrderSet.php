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
            ->insertGetId(['real_amt'=>$request->real_Price,'offer_amt'=>$request->Offer_Price,'paid_amt'=>$request->paid_amt,'Customer_info_id'=>$request->customerID,'status'=>0,'order_address'=>$request->Order_address,'gro_shop_info_id'=>$request->gro_shop_ID]);

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
           array_push($mainArray,$secandArray);
        }
         $orderIDs = DB::table('gro_order_tab')
            ->insert($mainArray);
       
        var_dump($orderIDs);
    }

    //
    public function getOrderList()
    {
       $data = DB::table('gro_cart_tab')
		->select("real_amt","offer_amt","paid_amt","customer_info_id","status")
		->orderBy('gro_cart_id')
		->simplePaginate(20);

        return response()->json(['data' => $data]);
    }
}
