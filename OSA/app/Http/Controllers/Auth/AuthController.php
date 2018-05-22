<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;
use Exception;


class AuthController extends Controller
{
  
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        $socialite_user = Socialite::driver($provider)->user();
        $socialite_id = $socialite_user->getId();
        $user;

        if($provider == "google"){
            $user = DB::table('user')->where('google_id', $socialite_id)->first();

            // register if never logged in before
            if (!$user) {
                $domain = explode("@", $socialite_user->email)[1];
                $user = DB::table('user')->where('email', $socialite_user->email)->where('account_type', 'Admin');
                if($user->first()){
                    $user->update([
                        'first_name' => $socialite_user['name']['givenName'],
                        'last_name' => $socialite_user['name']['familyName'],
                        'avatar' =>$socialite_user->avatar_original,
                        'google_id' => $socialite_id
                    ]);
                    $user = $user->first();
                }else if($domain == "obf.ateneo.edu"){
                    $user = new User;
                    $user->first_name = $socialite_user->user['name']['givenName'];
                    $user->last_name = $socialite_user->user['name']['familyName'];
                    $user->avatar = $socialite_user->avatar_original;
                    $user->email = $socialite_user->email;
                    $user->google_id = $socialite_id;
                    $user->account_type = "User";
                    $user->save();
                }else{
                    return redirect('/must-log-in');
                }
            }
        }

        Auth::loginUsingId($user->id);
        if($user->account_type == "Admin"){
            return redirect('/admin/view/Suggestion');
        }
        return redirect('/');
    }

    /*
    http://itsolutionstuff.com/post/laravel-5-google-oauth-authentication-using-socialite-packageexample.html
    */
}
