<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;


class InsertController extends Controller
{
    public function select(Request $request) 
    { 
        
        $query = $_POST["query"];
        $data = DB::select($query);
        return response()->json(['data' => $data]); 
    } 

    public function insert(Request $request) 
    { 
        
        $query = $_POST["query"];
        $data = DB::select($query);
        return response()->json(['data' => "Sucess"]); 
    } 
}
