<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UserNotification;
use App\Models\User;

class NotificationController extends Controller
{
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (auth()->user()) {
            $user = User::first();
            auth()->user()->notify(new UserNotification($user));
        }
    }
    public function show(){
        $user = User::first();
        $notifications = auth()->user()->notifications;
        $html = '';

        foreach ($notifications as $key => $notification) {
            $markAsRead = (isset($notification->read_at) && !empty($notification->read_at)) ? '' : 'mark as read';
            
            $html .=    '<div class="navi-item">
                            <div class="navi-link d-flex">
                                <a href="'.$notification->data['url'].'" class="d-flex" style="width: 70%;">
                                    <div class="navi-icon mr-2 mt-3">
                                        <i class="flaticon2-notification text-primary"></i>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold">'.$notification->data['data'].'</div>
                                        <div class="text-muted">'.$notification->created_at.'</div>
                                    </div>
                                </a>
                                <a href="'.url('mark-as-read').'/'.$notification->id.'" class="float-right">';
            $html .=                (isset($notification->read_at) && !empty($notification->read_at)) ? '' : 'mark as read';             
            $html .=            '</a>
                            </div>
                        </div>';
        }
        echo $html;
    }
    public function update($id)
    {
        if($id){
            auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        }
        return back();
    }

}
