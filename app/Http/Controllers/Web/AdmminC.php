<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function GuzzleHttp\json_encode;
use PHPUnit\Framework\Constraint\Exception;

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
            ->select('wor_order_tab.*','wor_info_tab.*','users.phone as Wphone','customer_info_tab.*')
            ->get();
        //var_dump($total_Order);
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

    public function category(Request $request){
        $categoryList = DB::table('wor_cat_tab')
                        ->select('wor_cat_id','wor_cat_name')
                        ->get();

        $subcat = DB::table('wor_subcat_tab')
                ->select('wor_subcat_id','subcat_name','pic')
                ->where('wor_cat_id',$categoryList[0]->wor_cat_id)
                ->get();

        return view('Admin.category',['data' => $categoryList,'subcat'=>$subcat]);
    }
    public function subcat(Request $request){
        $categoryList = DB::table('wor_subcat_tab')
                        ->select('wor_subcat_id','subcat_name')
                        ->where('wor_cat_id',$request->form_id)
                        ->get();
                        
       return json_encode($categoryList);

    }
    public function catAdd(Request $request){
       
    
    	$nametoupload = '';
        if(isset($_FILES["pic"])){

            $FILES = $_FILES["pic"];
            $upload_dir = storage_path('app/public/category/');
            // create folder if not exists
            if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
            }

            //Send error 
            if ($FILES['error'])
            {
                echo "<script type='text/javascript'> alert('Invalid Image'); </script>";
                return Redirect::to('/admin/Ctegory');
            }

            //Change file name
            $target_file1 = uniqid().time();
            $imageFileType = pathinfo($FILES["name"],PATHINFO_EXTENSION);
            $target_file = $upload_dir.$target_file1.'.'.$imageFileType;

        
            //Upload file
            if (move_uploaded_file($FILES["tmp_name"], $target_file))
            {	
                //global $nametoupload;
                $nametoupload = '/storage/app/public/category/'.$target_file1.'.'.$imageFileType;
            }
            else
            {
                echo "<script type='text/javascript'> alert('Invalid Image'); </script>";
                return Redirect::to('/admin/Ctegory');
            }	
        }
        else{
            echo "<script type='text/javascript'> alert('Image Not Found'); </script>";
        }

        try{
            DB::table('wor_cat_tab')
                ->insert([
                    "wor_cat_name"=>$_POST["catname"],
                    "wor_cat_pic" => $nametoupload
                ]); 
        }
        catch(Exception $ex){
            return $ex;
        }
        
        return Redirect::to('/admin/Ctegory');
    }

    public function subcatAdd(Request $request){
        
        $nametoupload = '';
        if(isset($_FILES["pic"])){

            $FILES = $_FILES["pic"];
            $upload_dir = storage_path('app/public/category/subcategory/');
            // create folder if not exists
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            //Send error 
            if ($FILES['error'])
            {
                echo "<script type='text/javascript'> alert('Invalid Image'); </script>";
                return Redirect::to('/admin/Ctegory');
            }

            //Change file name
            $target_file1 = uniqid().time();
            $imageFileType = pathinfo($FILES["name"],PATHINFO_EXTENSION);
            $target_file = $upload_dir.$target_file1.'.'.$imageFileType;

            //Upload file
            if (move_uploaded_file($FILES["tmp_name"], $target_file))
            {	
                //global $nametoupload;
                $nametoupload = '/storage/app/public/category/subcategory/'.$target_file1.'.'.$imageFileType;
            }
            else
            {
                echo "<script type='text/javascript'> alert('Invalid Image'); </script>";
                return Redirect::to('/admin/Ctegory');    
            }	
        }
        else{
            echo "<script type='text/javascript'> alert('Image Not Found'); </script>";
        }
        
        try{

            DB::table('wor_subcat_tab')
                ->insert([
                       "wor_cat_id"=>$_POST["id"],
                       "subcat_name"=>$_POST["subname"],
                        "pic" => $nametoupload
                    ]);
        } 
        catch(Exception $ex){
            echo $ex;
        }

        return Redirect::to('/admin/Ctegory');
    }

}
