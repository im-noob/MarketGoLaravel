<?php

namespace App\Http\Controllers\API\Groceries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function categoryGet()
    {
       $data = DB::table('gro_cat_tab')->orderBy('gro_cat_id')->simplePaginate(10);

        return response()->json(['data' => $data]);
    }

    public function subCategoryGet()
    {
        $data = DB::table('gro_subcat_tab')->orderBy('gro_subcat_id')->simplePaginate(10);

        
        return response()->json(['data' => $data]);
    }

    public function subProductGet()
    {
        $data = DB::table('gro_product_list_tab')->orderBy('gro_product_list_id')->simplePaginate(10);

        
        return response()->json(['data' => $data]);
    }

    public function shopInfoGet()
    {
        $data = DB::table('gro_shop_info_tab')->orderBy('gro_shop_info_id')->simplePaginate(10);

        
        return response()->json(['data' => $data]);
    }
}
