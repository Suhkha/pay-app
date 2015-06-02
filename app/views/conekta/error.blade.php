@extends('conekta.inner-layout')
@section ('active-second-item') active @stop
@section ('title') Conekta @stop

@section('content')
    <h2>Error</h2>  
    <p>Su pedido ha sido cancelado, por lo que el proceso de pago no ha sido completado.</p> 
    <p>Si desea adquirir libro <strong>Persona Normal</strong> de clic <strong><a href="{{ action('ConektaController@index') }}">aquí</a></strong></p>
    <?php echo $message ?>
@stop