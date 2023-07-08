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

	public function connect(Request $request)
	{
		$stripe = new \Stripe\StripeClient('sk_test_51MqhFkBYa5wxH4LQ3kmYK0q3R15hxkBLOFaRuUTr8MBUfbjuB9IzddxBRHIotHgn6rYy4vf2jsRJe23vfOHHbWTi0067YMt90l');
		// $code = $request->input('code');

		// Create connected account
		$account = $stripe->accounts->create([
			'type'   	  =>'express',
			'country'	  =>'GB',
			'email'  	  =>'pilot5@gmail.com',
			'capabilities'=>[
				'card_payments'=>['requested'=>true],
				'transfers'    =>['requested'=>true],
			],
		]);
		//store account id in pilot_detail table account_id
		Session::put('stripeAccountId', $account['id']);
		// print_r(Session::get('stripeAccountId'));die();
		$link = $stripe->accountLinks->create([
			'account' 	  => $account['id'],
			'refresh_url' => 'http://drone-app.test/reauth',
			'return_url'  => 'http://drone-app.test/return',
			'type'        => 'account_onboarding',
		  ]);
		// if($link['url']){
		// 	$pilot = User::find($bid->user_id);
		// 	$pilot->url = $link['url'];
		// 	$pilot->message = 'Complate your Profile For payment';
		// 	$pilot->notify(new UserNotification($pilot));
		// }
		return $link['url'];
	}

	public function stripePyament(Request $request)
	{
		
		// print_r(Session::get('stripeAccountId'));die();
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		try {
			$stripe = new \Stripe\StripeClient('sk_test_51MqhFkBYa5wxH4LQ3kmYK0q3R15hxkBLOFaRuUTr8MBUfbjuB9IzddxBRHIotHgn6rYy4vf2jsRJe23vfOHHbWTi0067YMt90l');
			$response = $stripe->paymentIntents->create([
				'amount' => 1099,
				'currency' => 'eur',
  				'payment_method' => 'pm_card_visa',
				'description' => 'Pilot Payment',
				'automatic_payment_methods' => ['enabled' => true],
				'application_fee_amount' => 123,
				'transfer_data' => ['destination' => Session::get('stripeAccountId')],
			]);
		} catch (\Stripe\Exception\ApiErrorException $e) {
			// Handle API errors
			echo 'Error: ' . $e->getMessage();
		} catch (Exception $e) {
			// Handle other exceptions
			echo 'Error: ' . $e->getMessage();
		}
		// echo "<pre>";
		// print_r($response);
		// $client_secret ='pi_3NRXLeBYa5wxH4LQ07gaHdUg_secret_93T4unfZPd0frG1lX2dZJgMcm';
		$this->ConfirmPaymentIntent($response);
	}

	public function ConfirmPaymentIntent($paymentDetail){
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents/'.$paymentDetail['id'].'/confirm');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "payment_method=pm_card_visa");
		curl_setopt($ch, CURLOPT_POSTFIELDS, "return_url=http://drone-app.test/success");
		curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_51MqhFkBYa5wxH4LQ3kmYK0q3R15hxkBLOFaRuUTr8MBUfbjuB9IzddxBRHIotHgn6rYy4vf2jsRJe23vfOHHbWTi0067YMt90l' . ':' . '');
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$headers = array();
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		echo '<pre>';
		print_r(json_decode($result));
	}
}
