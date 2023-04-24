<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Job;

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
        $jobs = job::query();
        if (isset($params['status']) && $params['status'] == 'past' ) {
            $jobs = $jobs->where('end_date','<', $currentDate );
        } elseif (isset($params['status']) && $params['status'] == 'current' ) {
            $jobs = $jobs->where('end_date','>=', $currentDate );
        }
        $jobs = $jobs->get();
        
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
        return view('job-create');
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
                    'country'   =>  'required',
                    'county'    =>  'required',
        ]);
        $params=$request->all();
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
            $job->country   = $params['country'];
            $job->county    = $params['county'];
            $job->type      = $params['type'];
            $job->job_desc  = $params['job_desc'];
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
        $data['job'] = job::find($id);
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
