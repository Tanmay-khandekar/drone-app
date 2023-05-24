<?php
namespace App\Http\Traits;
use App\Mail\SignupEmail;
use Illuminate\Support\Facades\Mail;
trait EmailTrait {

    public function sendmail($data) {

        Mail::to($data->email)->send(new SignupEmail($data));
        
    }

}