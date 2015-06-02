<?php
use Omnipay\Omnipay;

class PaypalController extends \BaseController {
	private $data;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index(){
		return View::make('paypal.index');
	}

	public function postPayment()
	{
		$params = array(
				'cancelUrl'   => 'http://pay-app.dev/cancel_order',
				'returnUrl'   => 'http://pay-app.dev/payment_success',
				'name'        => Input::get('name'),
				'description' => Input::get('description'),
				'amount'      => Input::get('price'),
				'currency'    => Input::get('currency'),
			);

			Session::put('params', $params);
			Session::save();

		$gateway = Omnipay::create('PayPal_Express');
		$gateway->setUsername('');
		$gateway->setPassword('');
		$gateway->setSignature('');

		$gateway->setTestMode(true);

		//Send data to paypal to identify my current shop
		$response = $gateway->purchase($params)->send();

		if($response->isSuccessful()){
			print_r($response);
		}elseif($response->isRedirect()){
			$response->redirect();
		}else{
			echo $response->getMessage();
		}
	}

	public function getSuccessPayment(){
		$gateway = Omnipay::create('PayPal_Express'); 
		$gateway->setUsername(''); 
		$gateway->setPassword(''); 
		$gateway->setSignature(''); 
		
		$gateway->setTestMode(true); 

		$params = Session::get('params'); 
		$response = $gateway->completePurchase($params)->send(); 
		$paypalResponse = $response->getData(); 
		if(isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') { // Response 
			// print_r($paypalResponse); 
		} else { 
			//Failed transaction 
		} 
		return View::make('paypal.success'); 
	}

	public function getCancelPayment(){
		return View::make('paypal.cancel');
	}
}
