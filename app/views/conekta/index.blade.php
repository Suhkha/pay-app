@extends('conekta.inner-layout')
@section ('active-second-item') active @stop
@section ('title') Conekta @stop

@section ('api-conekta')
    <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.0/js/conekta.js"></script>
    <script type="text/javascript">
        // Conekta Public Key
        Conekta.setPublishableKey('');
    </script>
@stop

@section('function-conekta')
<script type="text/javascript">
    jQuery(function($) {
        var conektaSuccessResponseHandler;
        conektaSuccessResponseHandler = function(token) {
            var $form;
            $form = $("#card-form");
            /* Inserta el token_id en la forma para que se envíe al servidor */
            $form.append($("<input type=\"hidden\" name=\"conektaTokenId\" />").val(token.id));
            /* and submit */
            $form.get(0).submit();
        };
        
        conektaErrorResponseHandler = function(token) {
            console.log(token);
        };
        
        $("#card-form").submit(function(event) {
            event.preventDefault();
            var $form;
            $form = $(this);
            /* Previene hacer submit más de una vez */
            $form.find("button").prop("disabled", true);
            Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
            /* Previene que la información de la forma sea enviada al servidor */
            return false;
        });
    });
</script>
@stop

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

         <h2>Paga Ahora</h2>
         {{ Form::open([ 'url' => 'pay_via_conekta', 'method' => 'post' , 'id' => 'card-form' ]) }}  
         <span class="card-errors"></span>
         <div class="form-group">
            <input type="text" class="form-control" id="nombretarjetahabiente" placeholder="Nombre de Tarjetahabiente" size="20" data-conekta="card[name]" />
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="tarjeta" placeholder="Num. Tarjeta" size="20" data-conekta="card[number]" />
        </div>
        <div class="form-group">
                <input type="text" size="4" class="form-control" placeholder="CVC" data-conekta="card[cvc]"/>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2 col-md-2">
                    <input type="text" class="form-control" placeholder="MM" data-conekta="card[exp_month]"/>
                </div> 

                <div class="col-xs-2 col-md-2">
                    <input type="text" class="form-control col-xs-2 col-md-2" placeholder="AAAA" data-conekta="card[exp_year]"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="hidden"  class="form-control" value="Persona Normal" name="product"> 
            <input type="hidden"  class="form-control" value="Cómpralo ya" name="description"> 
            <input type="hidden"  class="form-control" value="MXN" name="currency"> 
            <input type="hidden"  class="form-control" value="150" name="amount"> 
            <input type="hidden"  class="form-control" disabled value="persona_normal" name="reference_id"> 
        </div>
        <button type="submit" id="processPayment" class="btn btn-primary btn-lg">¡PAGAR!</button>
        {{ Form::close() }}
    </div> 
@stop

