@extends('paypal.inner-layout')
@section ('active-first-item') active @stop
@section ('title') PayPal @stop

@section('content')

        <div class="col-xs-12 col-md-8">
            <h2>Información General</h2>
            <p><strong>Libro: </strong>Persona Normal </p>
            <p><strong>Autor: </strong>Benito Taibo</p>
            <p><strong>Precio </strong>$150.00 MXN</p>
            <p><strong>Descripción: </strong>Tenía un par de padres divertidos y jóvenes, llenos de sueños y de planes. 
                                             Pero a mis doce años, cinco meses, tres días y dos horas y cuarto, aproximadamente, 
                                             me quedé sin ellos...</p>
            <p>Desde que el tío Paco se hizo cargo de él, Sebastián ha vivido aventuras increíbles: tuvo un encuentro inesperado con un enorme felino, 
               conoció a uno de los últimos vampiros que viven en el DF; frente a su casa vio a un mítico personaje saltar de la góndola en la que viajaba, 
               para rescatar a una joven de una inundación; consiguió un mapa estelar para un pobre extraterrestre perdido en la Tierra, 
               sobrevivió el embate de un enorme monstruo marino, peleó al lado de los sioux para defender su territorio de los colonizadores... 
               ¿Qué pasa con Sebastián? ¿Acaso no es una «persona normal»?</p>

            {{ Form::open([ 'url' => 'pay_via_paypal', 'method' => 'post'  ]) }}     
                <input type="hidden" value="Persona Normal" name="product"> 
                <input type="hidden" value="Cómpralo ya" name="description"> 
                <input type="hidden" value="MXN" name="currency"> 
                <input type="hidden" value="150.00" name="price"> 
                <button type="submit" class="btn btn-primary btn-lg">¡CÓMPRALO!</button> 
            {{ Form::close() }}

        </div> 
@stop