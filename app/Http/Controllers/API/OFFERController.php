<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OFFERController extends Controller
{
   public function foodOffer(Request $request)
	{
		//food offer
		/**SELECT `pic`, `height`, `width`, `advid`, `start`, `end`, `category`, `message`, `TAGS`
		FROM `advertisement` WHERE 1*/
		$data = DB::table('Advertisement')
		->select('pic','height','width','advid','start','end','category','message')->get();
		
		return response()->json(['received' => "yes",'data'=>$data]);
	}
	
	//Best Product
	public function bestOffer(Request $request)
	{
		//Best offer
		/**SELECT `pic`, `height`, `width`, `advid`, `start`, `end`, `category`, `message`, `TAGS`
		FROM `advertisement` WHERE 1*/
		$data = DB::table('Advertisement')
		->select('pic','height','width','advid','start','end','category','message')->get();
		
		return response()->json(['received' => "yes",'data'=>$data]);
	}
}
