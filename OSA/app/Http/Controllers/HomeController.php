<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
use App\Review;
use App\Rating;
use App\User;
use Searchy;
use Auth;
class HomeController extends Controller
{
    //
    public function index(Request $request){
        $search = $request->input('search');
        $category = $request->input('sort');
        $suppliers;

        if(!empty($search)){

            $suppliers = Searchy::search('supplier')
                                ->fields('company_name', 'business_name', 'address')
                                ->query($search)
                                ->getQuery()
                                ->when($category, function ($query) use($category){
                                    return $query->where('category_id', $category);
                                })
                                ->where('state', "Accepted")
                                ->simplePaginate(12);
        }else{        
        	$suppliers = Supplier::when($category, function ($query) use($category){
        							return $query->where('category_id', $category);
        						})
                                ->where('state', "Accepted")
                                ->simplePaginate(12);
        }
        
    	$categoriesList = Category::all();

    	return view('Homepage', ['suppliers' => $suppliers, 'categories' => $categoriesList, 'current' => $category, 'search' => $search]);
    }

    public function comment(Request $request){
        $user = Auth::user();
        $date;
        $newRate;

        if($user){        
            $review = new Review;
            $review->user_id = $user->id;
            $review->supplier_id = $request->supplier_id;
            $review->rating = $request->rating;
            $review->review_content = $request->review_content; 
            $review->is_visible = 1;

            $review->save();
            $date = $review->created_at;

            $rating = DB::table('rating')
                        ->where('user_id', $user->id)
                        ->where('supplier_id', $request->supplier_id);
            
            if(!$rating->first()){
                $rating = new Rating;
                $rating->user_id = $user->id;
                $rating->supplier_id = $request->supplier_id;
                $rating->rating = $request->rating;
                $rating->save();
            }else{
                $rating->update(['rating' => $request->rating]);
            }

            $supplier = Supplier::find($request->supplier_id);
            $supplier->rating = Rating::where('supplier_id', $supplier->id)->avg('rating');
            $supplier->save();
            $newRate = $supplier->rating;
        }

        return response()->json([
            'newRate' => $newRate,
            'system_date' => $date,
            'avatar' => $user->avatar,
            'name' => $user->first_name." ".$user->last_name
        ]);
    }
}
