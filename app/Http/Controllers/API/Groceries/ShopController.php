<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function shopInfoGet()
    {
        $data = DB::table('gro_shop_info_tab')->orderBy('gro_shop_info_id')->simplePaginate(10);

        
        return response()->json(['data' => $data]);
    }

}
