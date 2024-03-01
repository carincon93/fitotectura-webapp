@extends('layouts.dashboard')

@section('title', 'Panel de administración')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <h1><strong>Bienvenido</strong> <small>{{ Auth::user()->nombre_completo }}</small></h1>
                <p>Para administrar fichas tecnicas o usuarios seleccione las opciones de la parte izquierda.</p>
                <div class="row">
                    <div class="col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                        <div class="card-dashboard">
                            <div class="text-center">
                                <i class="fa fa-file-pdf-o fa-3x center-block"></i>
                                <p>Fichas técnicas registradas</p>
                            </div>
                            <div class="text-center card-count">
                                <span class="">{{ $fichas_tecnicas }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                        <div class="card-dashboard">
                            <div class="text-center">
                                {{-- <i class="fa fa-users fa-2x"></i> --}}
                                <img src="{{ asset('images/users.png') }}" alt="" class="img-responsive users-registrados center-block">
                                <p>Usuarios registrados</p>
                            </div>
                            <div class="text-center card-count">
                                {{ $usuarios }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
