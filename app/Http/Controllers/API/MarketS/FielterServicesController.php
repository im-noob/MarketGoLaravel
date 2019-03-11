<?php

namespace App\Http\Controllers\API\MarketS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FielterServicesController extends Controller
{
    /** Sub category of category*/
	public function filter(Request $request)
    {
		
    	$searchText = $request->searchText;
        $searchTerm = explode(" ",$searchText);  

        $category = [];
        $sub = [];
        $service = [];

       


        
        foreach ($searchTerm as $key => $value) {
             // SELECT wor_cat_name FROM `wor_cat_tab`SELECT * FROM `wor_subcat_tab`
            $data = DB::table('wor_cat_tab')
                ->select('wor_cat_id as catID','wor_cat_name as name','wor_cat_pic as pic')
                ->where('wor_cat_name', 'like', '%'.$value.'%')
                ->limit(100)
                ->get();
            
            foreach ($data as $key => $value) {
                array_push($category, $value);
            }    
        }
		
		  foreach ($searchTerm as $key => $value) {
           //SELECT `subID`, `categoryID`, `subName` FROM `subcategory` 
            $data = DB::table('wor_subcat_tab')
                ->select('wor_subcat_id as subID','subcat_name as sname','pic')
                ->where('subcat_name', 'like', '%'.$value.'%')
				
                ->limit(100)
                ->get();
            
            foreach ($data as $key => $value) {
                array_push($sub, $value);
            }    
        }
		
		 
		
		 foreach ($searchTerm as $key => $value) {
           //SELECT `DescriptionID`, `categoryID`, `subID`, `Name`, `Description` FROM `description` 
            /**$data = DB::table('description')
                ->select('DescriptionID as dID','Name as name','Description as info')
                ->where('Name', 'like', '%'.$value.'%')
				->limit(100)
                ->get();
				*/
			 $data = DB::table('wor_rate_tab')
                  ->join('wor_info_tab','wor_info_tab.wor_info_id','=','wor_rate_tab.wor_info_id')
                  ->select(
                    'wor_info_tab.wor_info_id as info_id',
                    'name as name',
                    'pic as avtar_url',
                    'rating as ratting',
                    'no_of_work',
                    'no_of_profile_view as review',
                    DB::raw('(min_price + max_price)/2 as rate')
                  )
                  ->where('name', 'like', '%'.$value.'%')
                  
                  ->orderBy('no_of_work', 'desc')
                  ->get();
            
            foreach ($data as $key => $value) {
                array_push($service, $value);
            }    
        }
		
		


       
		return response()->json(['service' => $service,'category' => $category,'sub' => $sub,'received' => 'yes','back'=>$searchText]);
    }

    /* return category */
    public function returnCat(Request $request)
    {
        //  SELECT `categoryID`, `Name` FROM `category`
        $data = DB::table('category')
            ->select('categoryID as catID','Name as name')
            ->get();  
    
        return response()->json(['category' => $data,'received' => 'yes']);
    }

    /* return sub category */
    public function returnSubCat(Request $request)
    {
        $categoryID = $request->catid;
        //SELECT `subID`, `categoryID`, `subName` FROM `subcategory` 
        $data = DB::table('subcategory')
            ->select('subID as subID','subName as sname')
            ->where('categoryID','=',$categoryID)
            ->get();
            
        return response()->json(['sub' => $data,'received' => 'yes']);
    }

    public function returnDesc(Request $request)
    {
        $subcatID = $request->subcatID;
      

        $data = DB::table('description')
                ->select('DescriptionID as dID','Name as name','Description as info')
                ->where('subID','=',$subcatID)
                ->get();
        return response()->json(['sub' => $data,'received' => 'yes']);
    }
}
