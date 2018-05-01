<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
class HomeController extends Controller
{
    //
    public function index(Request $request){
        $search = $request->input('search');
        $category = $request->input('category');
    	$suppliers = Supplier::when($category, function ($query) use($category){
    							return $query->where('category_id', $category);
    						})
                            ->where('company_name', 'LIKE', $search.'%')//Only the earched company is is displayed
                            ->where('state', "Accepted")
    						->orderBy('rating', 'desc')
    						->paginate(12);
    	$categoriesList = Category::all();
    	
    	return view('Home', ['suppliers' => $suppliers, 'categories' => $categoriesList, 'current' => $category, 'search' => $search]);
    }
}
