<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OFFERController extends Controller
{
    public foodOffer(Request $request)
	{
		//food offer
		/**SELECT `pic`, `height`, `width`, `advid`, `start`, `end`, `category`, `message`, `TAGS`
		FROM `advertisement` WHERE 1*/
		$data = DB::table('advertisement')
		->select('pic','height','width','advid','start','end','category','message');
		
		return response()->json(['received' => "yes",'data'=>$data]);
	}
}
