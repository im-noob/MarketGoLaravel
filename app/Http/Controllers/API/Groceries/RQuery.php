<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class RQuery extends Controller
{
	public $successStatus = 200;
    public function details(Request $request) 
    {     
        $query = $request->json()->all();
        $data = DB::select($query["query"]);
        return response()->json(['data' => $data], $this-> successStatus); 
    } 
}
