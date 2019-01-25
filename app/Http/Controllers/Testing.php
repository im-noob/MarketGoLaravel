<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;
class Testing extends Controller
{
    function test(){
          //fetching user id of the inserted data in users table 
        $email = "Aa@gmail.com";
        $wor_info_id = DB::table('users')->select('id','phone')
                  ->where('email', '=', $email)
                  ->get();
        //sending data according to user type

        $userID = $wor_info_id[0]->id; 

        $json = response()->json($wor_info_id);
        echo "\n";
        $json = response()->json($userID);

        // var_dump($json->original);
        echo "$json";


    }
}
