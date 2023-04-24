<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PilotDetails;
use App\Models\User;
use Auth;

class PilotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pilots = User::with('pilot_detail')->where('type','pilot')->get();
        return response(['data' => $pilots], 200);
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
        //
    }

    /**
     * Display the specified resource.
     * Display the Pilot varification page
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        if(!Auth::check()){
            return redirect("login")->withSuccess('Opps! You do not have access');
        }
        return view('pilot-varification');
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
        $pilot = User::with('pilot_detail')->where('id',$id)->where('type','pilot')->first();
        return response(['data' => $pilot], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $params=$request->all();
        if(isset($params['gov_license'])){
            $govUploadedFile = $request->file('gov_license');
            $gov_license = $params['user_id'].'-pilot-gov-license.'.$govUploadedFile->getClientOriginalExtension();  
            $govUploadedFile->move(public_path('licenses'), $gov_license);
            $params['gov_license'] = 'licenses/'.$gov_license; 
        }

        if(isset($params['pilot_license'])){
            $uploadedFile = $request->file('pilot_license');
            $pilot_license = $params['user_id'].'-pilot-licenses.'.$uploadedFile->getClientOriginalExtension();  
            $uploadedFile->move(public_path('licenses'), $pilot_license);
            $params['pilot_license'] = 'licenses/'.$pilot_license;
        }
        if (isset($params['gov_license']) && !empty($params['gov_license']) ) {
            $pilot = PilotDetails::updateOrCreate(['user_id'=>$params['user_id']],
            [
                'user_id'=>$params['user_id'],
                'gov_license'=>$params['gov_license'],
                'pilot_license'=>$params['pilot_license'],
            ]);
        }        
        $user = User::find($params['user_id']);
        $user->update($params);
        return response()->json(['success'=>'Pilot Varification Details Uploaded Successfully']);

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
