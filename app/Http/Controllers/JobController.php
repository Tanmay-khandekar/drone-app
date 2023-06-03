<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use App\Models\Job;
use App\Models\Countries;
use App\Models\User;
use App\Models\Industry;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $params=$request->all();
        $currentDate = date('Y-m-d');
        $user = user::with('address')->where('id', $params['uid'])->first();
        $industry_ids = explode(",",$user->industry_id);
        
        $jobsQuery = job::query()->with(['country','county','city']);
        if($user->type == 'pilot'){
            if($params['status'] == 'all'){
                $jobsQuery->Where(function ($query) use($industry_ids) {
                    for ($i = 0; $i < count($industry_ids); $i++){
                       $query->orwhere('industry_id', 'like',  '%' . $industry_ids[$i] .'%');
                    }      
                })->where('county', $user->address->state);
                if(count($jobsQuery->get()) == 0){
                    $jobsQuery = job::query()->with(['country','county','city']);
                    $jobsQuery->Where(function ($query) use($industry_ids) {
                        for ($i = 0; $i < count($industry_ids); $i++){
                            $query->orwhere('industry_id', 'like',  '%' . $industry_ids[$i] .'%');
                        }      
                    })->where('location', '105');
                }
                if(count($jobsQuery->get()) == 0){
                    $jobsQuery = job::query()->with(['country','county','city']);
                    $jobsQuery->Where(function ($query) use($industry_ids) {
                        for ($i = 0; $i < count($industry_ids); $i++){
                        $query->orwhere('industry_id', 'like',  '%' . $industry_ids[$i] .'%');
                        }      
                    });
                }
            }elseif($params['status'] == 'past'){

                $jobsQuery->with('bids', function($q) use ($user){
                    if( isset($user->id) && !empty($user->id) ){
                      $q = $q->where('bids.user_id',$user->id );
                    }
                })
                ->Where(function ($query) use($industry_ids) {
                    for ($i = 0; $i < count($industry_ids); $i++){
                       $query->orwhere('industry_id', 'like',  '%' . $industry_ids[$i] .'%');
                    }      
                })->get();
                $jobs = $jobsQuery->get()->toArray();
                $pastJobs = [];
                $count = 0;
                foreach ($jobs as $jkey => $job) {
                    if(count($job['bids'])){
                        $pastJobs[$count] = $job;
                        $count++;
                    }
                }

                return response(['data' => $pastJobs], 200);
            }
        } elseif( $user->type == 'customer'){
            $jobsQuery->where('user_id', $params['uid']);
        }
        $jobs = $jobsQuery->get();
        
        return response(['data' => $jobs], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(!Auth::check()){
            return redirect("login")->withSuccess('Opps! You do not have access');
        }
        $data['countries'] = Countries::get();
        $data['industry'] = Industry::get();
        return view('job-create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // echo "hello";die();
        $validator = Validator::make($request->all(),[
                    'job_title' =>  'required',
                    'location'  =>  'required',
                    'county'    =>  'required',
                    'city'      =>  'required',
                    'type'      =>  'required',
                    'job_desc'  =>  'required',
                    'industry'  =>  'required',
        ]);
        $params=$request->all();
        if(isset($params['industry']) && !empty($params['industry'])){
            $industry = $params['industry'];
            $params['industry'] = implode(',', $industry);
        }
        $job_start_end_date= explode('-',$params['job_start_end_date']);
        $startDate = str_replace('/', '-', $job_start_end_date[0]);
        $endDate = str_replace('/', '-', $job_start_end_date[1]);
        
        $start_date = date("Y-m-d", strtotime($startDate));
        $end_date = date("Y-m-d", strtotime($endDate));
        if ($validator->passes() ) {    
            $job = new Job;
            $job->user_id   = $params['user_id'];
            $job->job_title = $params['job_title'];
            $job->location  = $params['location'];
            $job->county    = $params['county'];
            $job->city      = $params['city'];
            $job->type      = $params['type'];
            $job->job_desc  = $params['job_desc'];
            $job->industry_id= $params['industry'];
            $job->start_date= $start_date;
            $job->end_date  = $end_date;
            $job->save();
            return response()->json(['success' => 'Job saved successfully.']);
        }else{
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        if(!Auth::check()){
            return redirect("login")->withSuccess('Opps! You do not have access');
        }
        
        return view('jobs.job-list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(!Auth::check()){
            return redirect("login")->withSuccess('Opps! You do not have access');
        }
        $data['job'] = job::with(['country','county','city'])->where('id', $id)->first()->toArray();
        // print_r($data['job']->toArray());die();
        return view('jobs.job-detail', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
