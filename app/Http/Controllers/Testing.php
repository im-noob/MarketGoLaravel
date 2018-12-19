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
          $data["status"] = true;

        $email = 'aaravonly4you@gmail.com';
        $countArr = DB::table('users')
            ->select('email')
            ->where('email',$email)
            ->get();
        if(sizeof($countArr)>0){
          $data["status"] = false;
        }

        $json = response()->json($data);
        var_dump($json->original);
        // echo "$json";

          $data["status"] = true;

        $email = 'paoopo@gmail.com';
        $countArr = DB::table('users')
        ->select('email')
        ->where('email',$email)
        ->get();
        if(sizeof($countArr)>0){
          $data["status"] = false;
        }

        $json = response()->json($data);
        var_dump($json->original);
        // echo "$json";


    }
}
