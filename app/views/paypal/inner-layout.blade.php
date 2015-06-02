@extends('layout')
@section ('active-first-item') active @stop

@section('inner-layout')

    <div class="well">
      <h2>@yield('title')</h2>
      <blockquote>
        <p>
            Paga de manera fácil y segura en millones de tiendas en línea con solo proporcionar tu correo electrónico y contraseña. 
            En PayPal no compartimos tu información financiera.
        </p>
      </blockquote>
      <p><a class="btn btn-primary btn-lg" href="https://www.paypal.com" target="_blank">¡CONOCE MÁS!</a></p>
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