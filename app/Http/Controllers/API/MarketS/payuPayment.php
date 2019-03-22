<?php
namespace App\Http\Controllers\API\MarketS;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class payuPayment extends Controller 
{
    public $successStatus = 200;

    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
    */ 
    function makeHash(Request $request){
        $key = $request->key;
        $txnid = $request->txnid;
        $amount = $request->amount;
        $productinfo = $request->productinfo;
        $firstname = $request->firstname;
        $email = $request->email;
        $salt = "XXXXXX"; //Please change the value with the live salt for production environment
        
        $payhash_str = $key . '|' . $this->checkNull($txnid) . '|' . $this->checkNull($amount) . '|' . $this->checkNull($productinfo) . '|' . $this->checkNull($firstname) . '|' . $this->checkNull($email) . '|||||||||||' . $salt;
        
        $hash = strtolower(hash('sha512', $payhash_str));
        return $hash;
    }
     
    function checkNull($value)
    {
        if ($value == null) {
            return '';
        } else {
            return $value;
        }
    }

        //open payment gateway for paying
    function openPaymentGateway(Request $request){
        //geting package id form post request
        // $package_id = $request->package_id;

        //feteching details about the package from the pacakge id
        // $package_details = DB::table('package_list_table')
        // ->select( 'package_name','package_cost', 'validity')
        // ->where('package_id', '=', $package_id)
        // ->first();





        $MERCHANT_KEY = "QrJSX8h2";
        $SALT = "J3G8tzrUnt";
        // Merchant Key and Salt as provided by Payu.

        $PAYU_BASE_URL = "https://sandboxsecure.payu.in";       // For Sandbox Mode
        //$PAYU_BASE_URL = "https://secure.payu.in";            // For Production Mode




        //initilizing post aaray to sending request to the payment gateway
        $_POST['firstname'] = "Aarav";
        $_POST['amount'] = '10';
        $_POST['email'] = "aaravonly4you@gmail.com";
        $_POST['phone'] = "8340669783";
        $_POST['productinfo'] = '1 kg aalu';
        $_POST['surl'] = url('/')."/PaymentStatus";
        $_POST['furl'] = url('/')."/PaymentStatus";
        $_POST['txnid'] = "4-"."123"."-"."456";
        $_POST['key'] = env("MERCHANT_KEY",$MERCHANT_KEY);
        $_POST['service_provider'] = env("PAYMENT_GATEWAY_PROVIDER","payu");


        /* making hash */ 


        
        $action = '';

        $posted = array();
        if(!empty($_POST)) {
            //print_r($_POST);
          foreach($_POST as $key => $value) {    
            $posted[$key] = $value; 
            
          }
        }

        $formError = 0;

        if(empty($posted['txnid'])) {
          // Generate random transaction id
          $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        } else {
          $txnid = $posted['txnid'];
        }
        $hash = '';
        // Hash Sequence
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
        if(empty($posted['hash']) && sizeof($posted) > 0) {
          if(
                  empty($posted['key'])
                  || empty($posted['txnid'])
                  || empty($posted['amount'])
                  || empty($posted['firstname'])
                  || empty($posted['email'])
                  || empty($posted['phone'])
                  || empty($posted['productinfo'])
                  || empty($posted['surl'])
                  || empty($posted['furl'])
                  || empty($posted['service_provider'])
          ) {
            $formError = 1;
          } else {
            //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
            $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';  
            foreach($hashVarsSeq as $hash_var) {
              $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
              $hash_string .= '|';
            }

            $hash_string .= $SALT;


            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '/_payment';
          }

        }




        /* ending making hash */

        if($formError == 1){
            echo "Form Submitation Error";
        }else{
            return view('payment.PayGo',[
                                                "MERCHANT_KEY"=>$MERCHANT_KEY,
                                                "hash"=>$hash,
                                                'txnid'=>$txnid,
                                                'firstname'=>$_POST['firstname'],
                                                'amount'=>$_POST['amount'],
                                                'email'=>$_POST['email'],
                                                'phone'=>$_POST['phone'],
                                                'productinfo'=>$_POST['productinfo'] ,
                                                'surl'=>$_POST['surl'],
                                                'furl'=>$_POST['furl']
                                            ]
                        );
        }

    }
    function payment_success_fail(){
        $status=$_POST["status"];
        //$firstname=$_POST["firstname"];
        $amount=$_POST["amount"];
        $txnid=$_POST["txnid"];
        //$posted_hash=$_POST["hash"];
        $productinfo=$_POST["productinfo"];
        ////$mobile=$_POST['mobile'];
        //$email=$_POST["email"];
        // appending timestamp to make unique id
        $payuMoneyId=$_POST["payuMoneyId"]."_".time();
        $mode=$_POST["mode"];
        
        $clint_package_validity = explode('-',$txnid);
        /* inserting success data in database */
        $date_y = date("Y")+$clint_package_validity[2];
        $date_m = date("m");
        $date_d = date("d");
        $expiry_date = $date_y."-".$date_m."-".$date_d;

        //time stamp for created at
        $t=time();
        $created_at = date("Y-m-d",$t);
        // if($status = "success"){
        //     buy_package_model::insert(
        //         [   
        //             'my_clint_id' => $clint_package_validity[0], 
        //             'package_id' => $clint_package_validity[1],
        //             'transaction_id' => $payuMoneyId, 
        //             'payment_method' => $mode,
        //             'price'=>$amount,
        //             'running_status'=>"true",
        //             'expiry_date' => $expiry_date,
        //             'created_at' => $created_at,
        //         ]
        //     );
        // }

        return view('payment.PaymentStatus',['status'=>$status,'amount'=>$amount,'productinfo'=>$productinfo,'payment_id'=>$payuMoneyId,'mode'=>$mode]);
    }
} 


