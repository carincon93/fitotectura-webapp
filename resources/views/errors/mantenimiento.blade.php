@extends('layouts.app-login')

@section('title', 'Página en mantenimiento')

@section('content')
    <section class="background-page main-content">
        <div class="container">

            <img src="{{ asset('images/logo-project.png') }}" alt="" class="img-responsive center-block">
            <figure class="text-center">
              <i class="fa fa-wrench fa-4x"></i>
            </figure>
            <p class="text-center">
              La página se encuentra en mantenimiento, por favor regresa más tarde.
            </p>
        </div>
    </section>
@endsection