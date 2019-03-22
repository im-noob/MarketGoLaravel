<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdmminC extends Controller
{
    public $successStatus = 200;
    public function getUser(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $ratting = $_GET['Ratting'];
            $view = $_GET['View'];
            $update = array(
                'rating' => $ratting,
                'no_of_profile_view' => $view
            );

            DB::table('wor_info_tab')
                ->where('wor_info_id', $id)
                ->update($update);
        }

        $category_list = DB::table('wor_info_tab')
            ->join('users','users.id','=','wor_info_tab.wor_info_id')
            //->join('wor_rate_tab','wor_rate_tab.wor_info_id','=','wor_info_tab.wor_info_id')
            //->join('wor_subcat_tab','wor_subcat_tab.wor_subcat_id','=','wor_rate_tab.wor_subcat_id')
            ->select('users.phone','wor_info_tab.*')
            ->distinct()
            ->get();
		//return response()->json(['received'=>'yes','data'=>$category_list],$this->successStatus);
		return view('Admin.user',['data'=>$category_list]);
	}

	public function dashboard(){
        $total = DB::table('wor_order_tab')->count();

        $active = DB::table('wor_order_tab')
                ->select('wor_order_tab.workPorgressStatus','<>','5')->count();

        $total_Order = DB::table('wor_order_tab')
             ->join('wor_info_tab','wor_order_tab.wor_info_id','=','wor_info_tab.wor_info_id')
             ->join('users','users.id','=','wor_info_tab.wor_info_id')
             ->join('customer_info_tab','customer_info_tab.customer_info_Id','=','wor_order_tab.customer_info_Id')
            ->select('wor_order_tab.*','wor_info_tab.*','users.phone as Wphone')
            ->get();
       // var_dump($total_Order);
		return view('Admin.dashboard',['data'=>$total_Order,'total'=>$total,'active'=>$active]);
    }
    
    public function login(Request $request){

        $userName = $_POST["email"];
        $password = $_POST["pwd"];

        // echo $userName;
        // echo $password;
        $password1 = DB::table('users')
                        ->select('password')
                        ->where('email','=',$userName)
                        ->get();
        //echo $password1[0]->password;
        if($password1[0]->password == $password){
            $request->session()->put('user', $userName);
            return Redirect::to('/admin/Dashboard');
        }
        else{
            echo "error in password";
            return Redirect::to('/admin');
        }
    }
    
    public function logout(Request $request){
        $request->session()->forget('user');
        return Redirect::to('/admin');        
    }
}
