<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Supplier;
use App\Suggestion;
use App\User;
use App\Category;
use App\Review;
use Searchy;
use Auth;

class AdminController extends Controller
{
    public function index($view, Request $request){ // what you are requesting
    	$search = $request->input('search');
        $category = $request->input('sort');
        if($category == "All"){
        	$category = null;
        }

        if($search){
        	$suppliers = Searchy::search('supplier')
                        ->fields('company_name', 'business_name', 'address')
                        ->query($search)
                        ->getQuery()
                        ->when($category, function ($query) use($category){
                            return $query->where('category_id', $category);
                            })
                        ->where('state', $view)
                        ->orderBy('rating', 'desc')
                        ->simplePaginate(12);
        }else{
            $suppliers =Supplier::when($category, function ($query) use($category){
                            return $query->where('category_id', $category);
                            })
                        ->where('state', $view)
                        ->orderBy('rating', 'desc')
                        ->simplePaginate(12);
        }
    	$categoriesList = Category::all();

    	return view('Admin.base', [
            'suppliers' => $suppliers,
            'categories' => $categoriesList,
            'current' => $category,
            'search' => $search,
            'view' => $view,
            'page' => 'Admin.View'
        ]);
    }

    /*
    *Sends complete supplier info to modal as json
    *
    *$id id of supplier required
    *return json with information
    */
    public function view($id){
        $supplier = Supplier::find($id);
        $suggestion = Suggestion::where('supplier_id', $id)->get();
        $reviews = Review::where('supplier_id', $id)->get();

        if(is_null($suggestion)){
            $suggestor = User::find($suggestion->user_id);
            $name = $suggestor->first_name . " " . $suggestor->last_name;
            return response()->json([
                'company_name' => $supplier->company_name,
                'business_name' => $supplier->business_name,
                'address' => $supplier->address,
                'email' => $supplier->email,
                'contact_no' => $supplier->contact_no,
                'category_id' => $supplier->category_id,
                'contact_person' => $supplier->contact_person,
                'website' => $supplier->website,
                'fbpage' => $supplier->fbpage,
                'verified' => $supplier ->verified,
                'tags' => $supplier ->tags,

                'num_reviews' => count($reviews),

                'suggestor' => $name,
                'note_to_admin' => $suggestion->note_to_admin
            ]);
        }else{
            return response()->json([
                'company_name' => $supplier->company_name,
                'business_name' => $supplier->business_name,
                'address' => $supplier->address,
                'email' => $supplier->email,
                'contact_no' => $supplier->contact_no,
                'category_id' => $supplier->category_id,
                'contact_person' => $supplier->contact_person,
                'website' => $supplier->website,
                'fbpage' => $supplier->fbpage,
                'verified' => $supplier ->verified,
                'tags' => $supplier ->tags,
                'num_reviews' => count($reviews)
            ]);
        }
    }

    public function edit($id, Request $request){
        $supplier = Supplier::find($id);
        $suggestion = DB::table('suggestion')->where('supplier_id', $id)->first();
        $category = Category::find($request->category_id)->name;

        if($suggestion != null){
            $suggestion->toArray();
            $suggestion->note_to_admin = $request->note_to_admin;
            $suggestion->save();
        }

        $supplier->company_name = $request->company_name;
        $supplier->business_name = $request->business_name;
        $supplier->address = $request->address;
        $supplier->email = $request->email;
        $supplier->contact_no = $request->contact_no;
        $supplier->category_id = $request->category_id;
        $supplier->contact_person = $request->contact_person;
        $supplier->website = $request->website;
        $supplier->fbpage = $request->fbpage;

        $supplier->save();

        return response()->json([
            'company_name' => $request->company_name,
            'category_id' => $request->category_id,
            'category' => $category,
            'contact_no' => $request->contact_no
        ]);
    }

    public function change($status, Request $request){
        $supplierIDs = $request->suppliers;
        foreach($supplierIDs as $id){
            $supplier = Supplier::find($id);
            $supplier->state = $status;

            $supplier->save();
        }
    }

    public function delete(Request $request){
        $supplierIDs = $request->suppliers;
        foreach($supplierIDs as $id){
            $supplier = Supplier::find($id);
            $suggestion = DB::table('suggestion')->where('supplier_id', $supplier->id);
            if($suggestion){
                $suggestion->delete();
            }

            $supplier->delete();
        }
    }

    public function add(){
        $categoriesList = Category::all();
        return view('Admin.base', [
            'categories' => $categoriesList,
            'view' => 'New Supplier',
            'page' => 'Admin.Form'
        ]);
    }

    public function newAdmin(Request $request){
        //see if an admin with same email already has an account
        $admin = User::where('email', $request->email);

        if(!$admin->first()){
            $admin = new User;
            $admin->account_type = 'Admin';
            $admin->email = $request->email;
            $admin->save();

            return response()->json([
                'status' => 'Success'
            ]);
        }else{
            $admin->where('account_type', 'User');
            if($admin->first()){
                return response()->json([
                    'status' => 'owner of email, '.$request->email.", is already a user"
                ]);
            }else{
                return response()->json([
                    'status' => 'owner of email, '.$request->email.", is already an admin"
                ]);
            }
        }
    }

    public function editAccountType(Request $request){
        $user = DB::table('user')->where('email', $request->email);
        $user->update(['account_type'=>$request->account_type]);
    }

    public function viewCategories(){
        Auth::loginUsingId(1);
        $categories = Category::all();
        $autofill = array();
        foreach ($categories as $category) {
            $autofill[$category->name] = null;
        }
        return view('Admin.base', array(
            'autofill' => json_encode($autofill),
            'categories' => $categories,
            'view' => 'Category',
            'page' => 'Admin.category'
        ));
    }

    public function validateEditCategory(Request $request){
        $category = Supplier::where('category_id', $request->category_id);
        if(!$category){
            $this->editCategory($request);
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => $category->count()." suppliers will be editted. Are you sure?"
            ]);
        }
    }

    public function editCategory(Request $request){
        $category = Category::find($request->category_id);

        if(!$category){
            $category = new Category;
        }

        $category->name = $request->name;
        $category->save();
    }

    public function addTags(Request $request){
        $supplier = Supplier::find($request->supplier_id);
        $editted = false;
        if($supplier->tags){
            $tags = explode("|", $supplier->tags);

            foreach($request->tags as $tag){
                if(!in_array($tag, $tags)){
                    $supplier->tags = $supplier->tags."|".$tag;
                    $tags[] = $tag;
                    $editted = true;
                }
            }
        }else{
            $editted = true;
            $tags = array();

            $supplier->tags = $request->tags[0];
            $tags[] = $request->tags[0];
            for($i = 1; $i < count($request->tags); $i++){
                if(!in_array($request->tags[$i], $tags)){
                    $supplier->tags = $supplier->tags."|".$request->tags[$i];
                    $tags[] = $request->tags[$i];
                }
            }
        }

        if($editted){
            $supplier->save();
        }
    }

    public function viewAdmin(Request $request){
      $user = User::where('account_type', 'Admin')
                ->simplePaginate(12);
      return view('Admin.base', [
        'admins' => $user, // that is the name of the user (array of it )
        'page' => 'Admin.EditAdmin',
        'view' => 'Edit Admin'
      ]);
    }

    public function removeTags(Request $request){
        $supplier = Supplier::find($request->supplier_id);

        if($supplier->tags){
            $tags = explode("|", $supplier->tags);
            $newTags;

            $editted = false;
            $firstAdd = false;

            foreach($tags as $tag){
                if(!in_array($tag, $request->tags)){
                    if($firstAdd){
                        $newTags = $newTags."|".$tag;
                    }else{
                        $newTags = $tag;
                        $firstAdd = true;
                    }
                }else{
                    $editted = true;
                }
            }

            if($editted){
                if($firstAdd){
                    $supplier->tags = $newTags;
                }else{
                    $supplier->tags = null;
                }
                $supplier->save();
            }
        }
    }
}
