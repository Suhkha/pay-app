<?php

class ConektaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('conekta.index');
	}

	public function payment() {
        Conekta::setApiKey("");
        try {
            $charge = Conekta_Charge::create(array(
            "amount" =>Input::get('amount'),
            "currency" => Input::get('currency'),
            "description" => Input::get('description'),
            "reference_id"=> Input::get('reference_id'),
            "card" => Input::get('conektaTokenId') //$_POST['conektaTokenId'] //"tok_a4Ff0dD2xYZZq82d9"
            ));
        } catch (Conekta_Error $e) {
           return View::make('conekta.error',array('message'=>$e->getMessage()));
        }
        
        return View::make('conekta.success',array('message'=>$charge->status));
        
    }


	

}
