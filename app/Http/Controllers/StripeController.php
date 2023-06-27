<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\User;
use App\Models\Bids;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\OAuth;
use Stripe\Charge;

class StripeController extends Controller
{
    public function stripePyament_old(Request $req)
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

	public function authorizee(Request $req)
	{
		$url = OAuth::authorizeUrl([
			'client_id' => config('services.stripe.client_id'),
			'scope' => 'read_write', // Adjust the scope according to your requirements
		]);

		return redirect()->away($url);
	}

	public function connect(Request $request)
	{
		$stripe = new \Stripe\StripeClient('sk_test_51JT6PDSIBz6O0EhiRiXBW1ZRDvUJjfKdnisirob2q8quTkdDSEIWH8kW3HT3IB88lf4b5Q3mcTIsJ6dpgId6Xabz00fs2TNkQU');
		// $code = $request->input('code');

		// Create connected account
		$account = $stripe->accounts->create([
			'type'=>'express',
			'country'=>'US',
			'email'=>'pilot@gmail.com',
			'capabilities'=>[
				'card_payments'=>['requested'=>true],
				'transfers'=>['requested'=>true],
			],
		]);
		print_r($account);die();
		$response = OAuth::token([
			'grant_type' => 'authorization_code',
			'code' => $code,
		]);
		// $id = ''
		// Store the connected account ID or any relevant information in your database

		// return redirect('/')->with('success', 'Stripe Connect successful!');
	}

	public function stripePyament(Request $request)
	{
		$stripeSecretKey = config('services.stripe.secret');
		Stripe\Stripe::setApiKey($stripeSecretKey);

		$token = $request->input('stripeToken');
		$amount = 1000; // Adjust the amount as per your requirements

		// Create a charge on the connected account
		$charge = Charge::create([
			'amount' => $amount,
			'currency' => 'usd',
			'source' => $token,
			'application_fee_amount' => 200, // Adjust the platform fee as per your requirements
		], [
			'stripe_account' => 'connected_account_id', // Replace with the connected account ID
		]);

		// Handle successful payment

		return redirect('/')->with('success', 'Payment successful');
	}
}
