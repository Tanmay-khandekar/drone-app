<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\User;
use App\Models\Bids;
use App\Models\Payment;
use App\Models\PilotDetails;
use Illuminate\Http\Request;
use Stripe\OAuth;
use Stripe\Charge;
use App\Notifications\UserNotification;

class StripeController extends Controller
{
    public function stripeFullPyament(Request $req){
		$pilot = User::find($req->pilot_id);
    	Stripe\Stripe::setApiKey(env('STRIPE_SECRET', 'sk_test_51MqhFkBYa5wxH4LQ3kmYK0q3R15hxkBLOFaRuUTr8MBUfbjuB9IzddxBRHIotHgn6rYy4vf2jsRJe23vfOHHbWTi0067YMt90l'));
		$data = Stripe\Charge::create([
    			"amount"=>$req->price*100,
    			"source"=>$req->stripeToken,
				"currency"=>'inr',
    			"description"=>"Payment from".$pilot->first_name,
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
			$pilotDetail = PilotDetails::where('user_id', $req->pilot_id)->first();
			if(empty($pilotDetail->account_id)){
				$this->connect($pilotDetail);
			}
			Session::flash("success","Payment successfully!");
		}

    	return back();
    }

	public function connect( $request){
		$stripe = new \Stripe\StripeClient('sk_test_51MqhFkBYa5wxH4LQ3kmYK0q3R15hxkBLOFaRuUTr8MBUfbjuB9IzddxBRHIotHgn6rYy4vf2jsRJe23vfOHHbWTi0067YMt90l');
		// $code = $request->input('code');
		$pilot = User::find($request->user_id);
		// Create connected account
		$account = $stripe->accounts->create([
			'type'   	  		=> 'express',
			'country'	  		=> 'GB',
			'email'  	  		=> $pilot->email,
			'capabilities'		=> [
				'card_payments' => ['requested'=>true],
				'transfers'    	=> ['requested'=>true],
			],
		]);
		//store account id in pilot_detail table account_id
		
		$pilotDetail = PilotDetails::where('user_id',$request->user_id)->first();
		$pilotDetail->update(['account_id' => $account['id']]);
		// Session::put('stripeAccountId', $account['id']);
		// print_r(Session::get('stripeAccountId'));die();

		$link = $stripe->accountLinks->create([
			'account' 	  => $account['id'],
			'refresh_url' => 'http://drone-app.test/reauth',
			'return_url'  => 'http://drone-app.test/return',
			'type'        => 'account_onboarding',
		  ]);
		if($link['url']){
			$pilot->url = $link['url'];
			$pilot->message = 'Complate your Profile For payment';
			$pilot->notify(new UserNotification($pilot));
		}
	}

	public function stripePyament(Request $request){
		$bid = Bids::find($request->bid_id);
		if($request->status == 'paid'){
			$amount = ($bid->price * 10) / 100;
			$status = 'advance-paid';
		}elseif($request->status == 'advance-paid'){
			$advanceAmt = ($bid->price * 10) / 100;
			$adminFee = ($bid->price * 10) / 100;
			$amount = $bid->price - ($advanceAmt + $adminFee);
			$status = 'complate-job';
		}
		$pilot = PilotDetails::where(['user_id'=>$request->pilot_id])->first();
		
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		try {
			$stripe = new \Stripe\StripeClient('sk_test_51MqhFkBYa5wxH4LQ3kmYK0q3R15hxkBLOFaRuUTr8MBUfbjuB9IzddxBRHIotHgn6rYy4vf2jsRJe23vfOHHbWTi0067YMt90l');
			$response = $stripe->paymentIntents->create([
				'amount' => $amount,
				'currency' => 'eur',
  				'payment_method' => 'pm_card_visa',
				'description' => 'Pilot Payment',
				'automatic_payment_methods' => ['enabled' => true],
				// 'application_fee_amount' => 123,
				'transfer_data' => ['destination' => $pilot->account_id],
			]);
		} catch (\Stripe\Exception\ApiErrorException $e) {
			// Handle API errors
			return 'Error: ' . $e->getMessage();
		} catch (Exception $e) {
			// Handle other exceptions
			return 'Error: ' . $e->getMessage();
		}

		$result = $this->ConfirmPaymentIntent($response);
		if($result == 'succeeded'){
			$bid = Bids::find($request->bid_id);
			$bid->status = $status;
			$bid->update();
		}
		return $result;
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
		$result = json_decode($result);

		return $result->status;
	}

	public function delete($id){
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/accounts/'.$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_51MqhFkBYa5wxH4LQ3kmYK0q3R15hxkBLOFaRuUTr8MBUfbjuB9IzddxBRHIotHgn6rYy4vf2jsRJe23vfOHHbWTi0067YMt90l' . ':' . '');

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		return json_decode($result);
	}
}
