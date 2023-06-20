<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\User;
use App\Models\Bids;
use App\Models\Payment;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripePyament(Request $req)
    {
    	// print_r($req->all()); die();
    	Stripe\Stripe::setApiKey(env('STRIPE_SECRET', 'sk_test_51MqhFkBYa5wxH4LQ3kmYK0q3R15hxkBLOFaRuUTr8MBUfbjuB9IzddxBRHIotHgn6rYy4vf2jsRJe23vfOHHbWTi0067YMt90l'));
		/* $customer = User::with('address')->find($req->customer_id);
		print_r($customer->toArray()); die();
    	$address = [
					"city" => $customer->address->city,
					"country" => $customer->address->country,
					"line1" => '',
					"line2" => "",
					"postal_code" => '',
					"state" => $customer->address->state
				]; */
		$data = Stripe\Charge::create([
    			"amount"=>$req->price*100,
    			"source"=>$req->stripeToken,
				"currency"=>'inr',
    			"description"=>"Payment from Tanmay Khandekar",
				//optional
				/* "address" => $address,
				"email" => $customer->email,
				"name" => $customer->first_name." ".$customer->last_name,
				"phone" => $customer->phone, */
				//optional
    	]);

		if($data['status'] = 'succeeded'){
			$payment = [
				'payment_id'=> $data['id'],
				'customer_id'=> $req->customer_id,
				'pilot_id'=> $req->pilot_id,
				'amount'=> $data['amount'],
			];
			Payment::create($payment);
			$bid = Bids::find($req->bid_id);
			if($bid){
				$bid->status='paid';
				$bid->update();
			}
			Session::flash("success","Payment successfully!");
		}

    	return back();
    }
}
