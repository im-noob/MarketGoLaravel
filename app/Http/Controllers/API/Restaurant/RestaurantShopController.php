<?php

namespace App\Http\Controllers\API\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RestaurantShopController extends Controller
{
    public function shopInfoGet()
    {
        $data = DB::table('res_info_tab')->select("*")->orderBy('res_info_id')->simplePaginate(10);

        return response()->json(['data' => $data]);
    }
}
