<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Review;
use App\User;

class ReviewsController extends Controller
{
    //
    public function view($id, $page){
    	Input::merge([ 'page' => $page ]);
        $reviews = Review::where('supplier_id', $id)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);

        $users = array();
        foreach($reviews as $review){
            $user = User::find($review->user_id);
            $users[] = $user->first_name . " " . $user->last_name;
        }
        $reviews->toJson();

        return response()->json([
            $reviews,
            'users' => $users
        ]);
    }
}
