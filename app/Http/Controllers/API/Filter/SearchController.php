<?php

namespace App\Http\Controllers\API\Filter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    	
		/** Sub category of category*/
	public function groSearch(Request $request)
    {
/**SELECT `gro_product_shop_tab`.`gro_price`,`gro_product_list_tab`.`gro_product_name`,
 `gro_product_list_tab`.`gro_product_info`,`gro_product_shop_tab`.`gro_price`, 
 `gro_product_shop_tab`.`offer`,`gro_product_shop_tab`.`pic`,`gro_product_shop_tab`.`gro_map_id`,
 `gro_product_shop_tab`.`quantity`,`unit_tab`.`unit_name` FROM `gro_product_shop_tab` 
INNER JOIN `gro_map_tab` ON `gro_map_tab`.`gro_map_id` = `gro_product_shop_tab`.`gro_map_id`
INNER JOIN `gro_product_list_tab` ON `gro_product_list_tab`.`gro_product_list_id` = `gro_map_tab`.`gro_produt_list_id` 
INNER JOIN `unit_tab` ON `unit_tab`.`unit_id` = `gro_product_shop_tab`.`unit_id`
WHERE `gro_product_shop_tab`.`TAGS` LIKE 'Lif%' || `gro_product_list_tab`.`gro_product_name` LIKE 'Lif%' 
|| `gro_product_list_tab`.`gro_product_info` LIKE 'Lif%' || `gro_product_list_tab`.`tags` LIKE 'Lif%'
*/
	$data =	DB::table('gro_product_shop_tab')
		->join('gro_map_tab','gro_map_tab.gro_map_id','=','gro_map_tab.gro_map_id')
		->join('gro_product_list_tab','gro_product_list_tab.gro_product_list_id','=','gro_map_tab.gro_produt_list_id')
		->join('unit_tab','unit_tab.unit_id','=','gro_product_shop_tab.unit_id')
		->select('gro_product_shop_tab.gro_price','gro_product_list_tab.gro_product_name',
'gro_product_list_tab.gro_product_info','gro_product_shop_tab.gro_price',
'gro_product_shop_tab.offer','gro_product_shop_tab.pic','gro_product_shop_tab.gro_map_id',
'gro_product_shop_tab.quantity','unit_tab.unit_name')
		->where('gro_product_shop_tab.TAGS','LIKE',$request->search.'%')
		->orWhere('gro_product_list_tab.gro_product_name','LIKE',$request->serch.'%')
		->orWhere('gro_product_list_tab.gro_product_info','LIKE',$request->serch.'%')
		->orWhere('gro_product_list_tab.tags','LIKE',$request->serch.'%')
		->distinct()
		->simplePaginate(20);
		
	return response()->json(['data' => $data]);
    }
	
}
