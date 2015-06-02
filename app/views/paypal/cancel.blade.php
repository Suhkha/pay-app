@extends('paypal.inner-layout')
@section ('active-first-item') active @stop
@section ('title') PayPal @stop

@section('content')
    <h2>Cancelado</h2>  
    <p>Su pedido ha sido cancelado, por lo que el proceso de pago no ha sido completado.</p> 
    <p>Si desea adquirir libro <strong>Persona Normal</strong> de clic <strong><a href="{{ action('PaypalController@index') }}">aquí</a></strong></p>
@stop