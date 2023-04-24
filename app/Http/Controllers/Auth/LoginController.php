<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('admin.login');
    }
    
    //google login
    public function redirectToGoogle()
    {
        // echo "hello";die();
        return Socialite::driver('google')->redirect();
    }
    //google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginuser($user);
        return redirect()->route('dashboard');
        // $user->token;
    }

    //facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    //facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginuser($user);
        return redirect()->route('dashboard');
        // $user->token;
    }

    //twitter login
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
    //twitter callback
    public function handleTwitterCallback()
    {
        $user = Socialite::driver('twitter')->user();
        $this->_registerOrLoginuser($user);
        return redirect()->route('dashboard');
        // $user->token;
    }

    protected function _registerOrLoginuser($data){
        $user = User::where('email', '=', $data->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->password = '123456';
            $user->type = 'client';

            $user->save();
        }

        auth()->login($user);
    }
}
