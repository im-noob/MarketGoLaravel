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
    	$name = 'amritesh kumar';
        $email = 'aaravonly4you@gmail.com';


        
        // echo "=============> real data ---------->";
        // var_dump($data);

    }
}
