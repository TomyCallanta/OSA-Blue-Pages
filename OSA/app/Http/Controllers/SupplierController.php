<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
use App\Review;
use App\Rating;
use App\User;
use Searchy;

class SupplierController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show($id)
    {
    	$supplier = Supplier::find($id);
        $category = Category::where('id', $supplier->category_id)->value('name');

        $reviews = Review::where('supplier_id', $id)
                    ->where('is_visible', 1)
                    ->orderBy('created_at', 'desc')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(3);

        $users = array();
        foreach($reviews as $review){
            $user = User::find($review->user_id);
            $users[] = $user;
        }

        $related = Searchy::search('supplier')
                    ->fields('category_id')
                    ->query($supplier->category_id)
                    ->getQuery()
                    ->where('state', 'Accepted')
                    ->where('id', '!=', $supplier->id)
                    ->limit(3)
                    ->get();


        $categoriesList = Category::all();
    	return view('CompanyPage', array('supplier' => $supplier, 'categories' => $categoriesList, 'category' => $category, 'reviews' => $reviews, 'users' => $users, 'related' => $related));
    }

    public function moreReviews($id){
        $reviews = Review::where('supplier_id', $id)
                    ->where('is_visible', 1)
                    ->orderBy('created_at', 'desc')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(3);

        $users = array();
        $users_avatars = array();
        foreach($reviews as $review){
            $user = User::find($review->user_id);
            $users[] = $user->first_name . " " . $user->last_name;
            $users_avatars[] = $user->avatar;
        }

        return response()->json([
            'reviews' => $reviews,
            'users' => $users,
            'avatars' => $users_avatars
        ]);
    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {

    }
}
