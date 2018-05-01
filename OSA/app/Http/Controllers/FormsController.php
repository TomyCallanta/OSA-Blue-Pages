<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Suggestion;
use App\Supplier;
use App\Category;
use Auth;

class FormsController extends Controller{

	function newSuggestion(Request $req){
		$this->insert($req, 'Suggestion');

		return back();
	}

	function newSupplier(Request $req){
		$this->insert($req, 'Accepted');

		return back();
	}

	function insert(Request $req, $state){
		//Supplier Data
		$user = Auth::user();
		if($user){
			$company_name = $req-> input('CompanyName');
			$business_name = $req-> input('BusinessName');
			$address = $req -> input('Address');
			$email = $req -> input('email');
			$contact_no = $req -> input('Celno');
			$category_id = $req -> input('BusinessType');
			$contact_person = $req -> input('ContactPerson');
			$website = $req -> input('website');
			$fbpage = $req -> input('Facebook');

			$supplier_data = array(
				'company_name' => $company_name, 
				'business_name' => $business_name,
				'address' => $address,
				'contact_no' => $contact_no,
				'category_id' => $category_id,
				'email' => $email,
				'fbpage' => $fbpage,
				'website' => $website,
				'state' => $state,
				"contact_person" => $contact_person,
            	"created_at" =>  \Carbon\Carbon::now(),
            	"updated_at" =>  \Carbon\Carbon::now() 
            );
			
			$supplier_id = DB::table('supplier') -> insertGetId($supplier_data);

			//Suggestion Data

			if($state == 'Suggestion'){
				$note_to_admin = $req -> input('Notes');

				$data1 = array(
				 	'supplier_id' => $supplier_id,
				 	'user_id' => $user->id, //ID IS CURRENTLY HARDCODED
				 	'note_to_admin' => $note_to_admin,
            		"created_at" =>  \Carbon\Carbon::now(),
            		"updated_at" =>  \Carbon\Carbon::now() 
				);

				DB::table('suggestion') -> insert($data1);
			}
		}
	}

	function suggestionPage(){
    	$categoriesList = Category::all();

		return view('Suggestion', array('view' => 'yo', 'categories' => $categoriesList));
	}
}

?>