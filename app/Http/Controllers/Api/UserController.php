<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customer = User::where('type','customer')->get();
        return response(['data' => $customer], 200);
       
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
        ]);
        $params=$request->all();
        if(isset($params['user_profile'])){
            $uploadedFile = $request->file('user_profile');
            $user_profile = $request->id.'-user.'.$uploadedFile->getClientOriginalExtension();  
            $uploadedFile->move(public_path('user-profile'), $user_profile);
            $params['user_profile'] = 'user-profile/'.$user_profile; 
        }
        if(isset($params['industry_id']) && !empty($params['industry_id'])){
            $industry = $params['industry_id'];
            $params['industry_id'] = implode(',', $industry);
        }
        if(isset($params['packages']) && !empty($params['packages'])){
            $params['packages'] = json_encode($params['packages']);
        }
        
        if ($validator->passes() ) {
            $user = User::find($request->id);
            $user->update($params);
            return response()->json(['success'=>'Profile Update successfully.']);
        }else{
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
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
