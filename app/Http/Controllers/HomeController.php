<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Industry;
use App\Models\Countries;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['countries'] = Countries::get();
        if (auth()->user()->type == 'admin') {
            $data['customers'] = User::where('type','customer')->count();
            $data['activepilots'] = User::where('type','pilot')->where('status','1')->count();
            $data['inactivepilots'] = User::where('type','pilot')->where('status','0')->count();
            $data['jobs'] = job::count();
            return view('admin.admin-dashboard',$data);
        }else{
            $data['industry'] = Industry::get();
            $data['user'] = User::with('address')->with('pilot_detail')->find(auth()->user()->id);
            if(isset($data['user']['pilot_detail']['social_links']) && !empty($data['user']['pilot_detail']['social_links']) ){
                $data['user']['pilot_detail']['social_links'] = json_decode($data['user']['pilot_detail']['social_links']);
            }
            return view('profile',$data);
        }
    }
}
