<?php

namespace App\Http\Controllers\API\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	public $successStatus = 200;
    public function getUser(){
		$category_list = DB::table('wor_info_tab')
        ->get();
		//return response()->json(['received'=>'yes','data'=>$category_list],$this->successStatus);
		return view('Admin.user');
	}

	public function dashboard(){
		return view('Admin.Dashboard');
	}
}
