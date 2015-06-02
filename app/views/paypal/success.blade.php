@extends('paypal.inner-layout')
@section ('active-first-item') active @stop
@section ('title') PayPal @stop

@section('content')
    <h2>¡Gracias por su compra!</h2>  
    <p>Su pago ha sido completado, por lo que su pedido se está procesando.</p> 
    <p>Si desea saber sobre libro <strong>Persona Normal</strong> de clic <strong><a href="{{ action('PaypalController@index') }}">aquí</a></strong></p>
@stop