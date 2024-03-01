@extends('layouts.app-login')

@section('title', 'Página no encontrada')

@section('content')
    <section class="background-page main-content">
        <div class="container">
            <h2 class="text-center display-1">404</h2>
            <img src="{{ asset('images/logo-project.png') }}" alt="" class="img-responsive center-block">
            <p class="text-center">
                La página que estás buscando no existe o ha ocurrido un error. <br>
                Por favor retrocede o dirígete a la <a href="{{ url('/') }}" class="btn-link">página principal</a>
            </p>
        </div>
    </section>
@endsection
