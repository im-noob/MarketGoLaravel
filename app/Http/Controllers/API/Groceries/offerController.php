<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class offerController extends Controller
{
    public function getOffer(Request $request){

       $id = $request->json()->all()['id'];
       $data = DB::table('gro_offer_table')
				->where('gro_shop_info_id','=',$id)
				->get();

        return response()->json(['data' => $data]);

    }

    public function setOffer(Request $request){

    }
}
