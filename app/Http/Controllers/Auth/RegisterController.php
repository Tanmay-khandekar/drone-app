<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\EmailTrait;
use Illuminate\Http\Request;
use Session;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use EmailTrait;
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function index(){
        return view('admin.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(isset($data['type']) && $data['type'] == 'on' ){
            $type = 'customer';
            $data['status'] = 1;
        }
        else{
            $type = 'pilot';
            $data['status'] = 0;
        }
        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'type' => $type,
            'verification_code' => sha1(time()),
            'password' => Hash::make($data['password']),
        ]);

        if($user != null){
            $this->sendmail($user);
            Session::put('account-success', 'Your Account Has been Created. Please check email for verification link');
            Session::put('user-id', $user->id);
            // return redirect()->route('login')->with(session()->flash('alert-success', 'Your Account Has been Created. Please check email for verification link'));
        }
        // return redirect()->route('login')->with(session()->flash('alert-danger', 'Somthing went wrong!'));
    }
    public function resend(Request $request){
        $id = $request->varify;
        $user =  User::find($id);
        if($user != null){
            $this->sendmail($user);
            Session::put('account-success', 'Your Account Has been Created. Please check email for verification link');
            Session::put('user-id', $user->id);
            return redirect()->route('login');
        }
    }
    public function verifyUser(Request $request){
        $verification_code = $request->code;

        $user = User::where('verification_code', $verification_code)->first();

        if($user != null){
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Your Account is verified. Please login!'));
        }

        return redirect()->route('login')->with(session()->flash('alert-danger', 'Invalid varification code!'));
    }
}
