<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Auth;
use App\Notifications\UserNotification;

class ChatController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $where = array('id' => $id);
        $users  = User::where($where)->first();
        return response()->json($users);
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
    public function messages(Request $request)
    {
        //
        $fromuser = $_GET["fromuser"];
        $touser = $_GET["touser"];
        $where = ['fromuser' => $fromuser, 'touser' => $touser];
        $orwhere = ['fromuser' => $touser, 'touser' => $fromuser];
        $data['msg'] = Message::join('users','users.id','=','messages.fromuser')
        ->where($where)
        ->orWhere($orwhere)->get();
        
        $html = '';
        $cuttent_data = date("Y-m-d h:i:s");
        // echo url('/');die();
        // print_r($data['msg']->toArray());die();
        foreach ($data['msg'] as $key => $value) {

            if($value->fromuser == auth()->user()->id){
                $html .=    '<div class="d-flex flex-column mb-5 align-items-end">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span class="text-muted font-size-sm">'.$value->created_at.'</span>
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                    </div>
                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                        <img alt="Pic" src="'.url('/').'/'.$value->user_profile.'" />
                                    </div>
                                </div>
                                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">'. $value->message.'</div>
                            </div>';
            }
            elseif($value->fromuser == $touser) {
            
                $html .= '<div class="d-flex align-items-center">
                    <div class="symbol symbol-circle symbol-40 mr-3">
                        <img alt="Pic" src="'.url('/').'/'.$value->user_profile.'"/>
                    </div>
                    <div>
                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">'.$value->name.'</a>
                        <span class="text-muted font-size-sm">'.$value->created_at.'</span>
                    </div>
                </div>
                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                '. $value->message.'
                </div>';
            }
            else{
                $html= '<p>no chat available</p>';
            }
        }            
        

            
        echo $html;
    }
    public function sendmsg(Request $request)
    {
        //
        if($request->message != ''){
            $message = new Message;
            $message->message= $request->message;
            $message->touser= $request->touser;
            $message->fromuser= $request->fromuser;
            $message->save();
            //notification
            $user = User::find($request->touser);
            $user->message = $request->message;
            $user->url = '';
            $user->notify(new UserNotification($user)); 
            return response()->json(['success'=>'Message Send successfully.']);
        }
        else{
            return response()->json(['errors' => 'please enter message']);

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
