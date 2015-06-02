@extends('layout')
@section ('active-second-item') active @stop

@section('inner-layout')

    <div class="well">
      <h2>@yield('title')</h2>
      <blockquote>
        <p>
            Acepta pagos en tu sitio web o aplicación móvil.
        </p>
        <p> 
            Recibe dinero por medio de tarjetas de crédito y débito, efectivo, SPEI y meses sin intereses.
        </p>
      </blockquote>
      <p><a class="btn btn-primary btn-lg" href="https://www.conekta.io/" target="_blank">¡CONOCE MÁS!</a></p>
    </div>
    <div class="well">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                {{ HTML::image('images/img__book.jpg', '', array('class' => 'img-thumbnail')) }}
            </div>
        
        @yield('content')

        </div>
    </div>
@stop