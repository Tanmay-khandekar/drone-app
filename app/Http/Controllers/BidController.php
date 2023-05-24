<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Bids;
use App\Models\User;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                    'user_id' =>  'required',
                    'job_id'  =>  'required',
                    'bid_start_end_date'   =>  'required',
                    'price'   =>  'required',
        ]);
        $params=$request->all();
        $bid_start_end_date = explode('-',$params['bid_start_end_date']);
        $startDate = str_replace('/', '-', $bid_start_end_date[0]);
        $endDate = str_replace('/', '-', $bid_start_end_date[1]);

        $start_date = date("Y-m-d", strtotime($startDate));
        $end_date = date("Y-m-d", strtotime($endDate));
        if ($validator->passes() ) {    
            $bid = new Bids;
            $bid->user_id   = $params['user_id'];
            $bid->job_id    = $params['job_id'];
            $bid->type      = $params['type'];
            $bid->bid_desc  = $params['bid_desc'];
            $bid->price  = $params['price'];
            $bid->start_date= $start_date;
            $bid->end_date  = $end_date;
            $bid->save();
            return response()->json(['success' => 'Bid saved successfully.']);
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
    public function show($id)
    {
        //
        if(!empty($id)){
            $bids = Bids::with('user')->where('job_id', $id)->get();
            
            return response(['data' => $bids], 200);
        }
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
