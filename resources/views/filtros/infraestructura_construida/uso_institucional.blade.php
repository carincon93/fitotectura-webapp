@extends('layouts.app-filtros')

@section('title', 'Uso institucional')

@section('content')

    <ul class="breadcrumb">
        <li><a href="{{ url('buscar_plantas') }}">Inicio</a></li>
        <li><a href="{{ url('buscar_plantas/categorizacion') }}">Categorización</a></li>
        <li class="active">Infraestructura Construida <small>(Uso institucional)</small></li>
    </ul>
    <div class="row">
        @foreach($fichas_tecnicas as $ficha_tecnica)
            @if ( $ficha_tecnica->antejardin == 1 && $rutainc == 1 )
                <div class="col-md-4 col-sm-4">
                    <a href="{{ url('ficha_tecnica_user/'.$ficha_tecnica->id.'/ruta/10') }}" class="card card-result">
                        <div class="card-image-result">
                            <img src="{{ Storage::url($ficha_tecnica->foto) }}" alt="foto_ficha_tecnica" class="img-responsive imgresult">
                        </div>
                        <div class="card-desc">
                            <div class="inner-desc">
                                <h4 class="text-center">{{$ficha_tecnica->nombre}}</h4>
                                <span class="text-right center-block">
                                    <small>Ir a la ficha técnica<i class="fa fa-fw fa-long-arrow-right"></i></small>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if ( $ficha_tecnica->fachadas == 1 && $rutainc == 3 )
                <div class="col-md-4 col-sm-4">
                    <a href="{{ url('ficha_tecnica_user/'.$ficha_tecnica->id.'/ruta/10') }}" class="card card-result">
                        <div class="card-image-result">
                            <img src="{{ Storage::url($ficha_tecnica->foto) }}" alt="foto_ficha_tecnica" class="img-responsive imgresult">
                        </div>
                        <div class="card-desc">
                            <div class="inner-desc">
                                <h4 class="text-center">{{$ficha_tecnica->nombre}}</h4>
                                <span class="text-right center-block">
                                    <small>Ir a la ficha técnica<i class="fa fa-fw fa-long-arrow-right"></i></small>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if ( $ficha_tecnica->cubiertas == 1 && $rutainc == 4 )
                <div class="col-md-4 col-sm-4">
                    <a href="{{ url('ficha_tecnica_user/'.$ficha_tecnica->id.'/ruta/10') }}" class="card card-result">
                        <div class="card-image-result">
                            <img src="{{ Storage::url($ficha_tecnica->foto) }}" alt="foto_ficha_tecnica" class="img-responsive imgresult">
                        </div>
                        <div class="card-desc">
                            <div class="inner-desc">
                                <h4 class="text-center">{{$ficha_tecnica->nombre}}</h4>
                                <span class="text-right center-block">
                                    <small>Ir a la ficha técnica<i class="fa fa-fw fa-long-arrow-right"></i></small>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @if ( $ficha_tecnica->plazoletas_acceso == 1 && $rutainc == 5 )
                <div class="col-md-4 col-sm-4">
                    <a href="{{ url('ficha_tecnica_user/'.$ficha_tecnica->id.'/ruta/10') }}" class="card card-result">
                        <div class="card-image-result">
                            <img src="{{ Storage::url($ficha_tecnica->foto) }}" alt="foto_ficha_tecnica" class="img-responsive imgresult">
                        </div>
                        <div class="card-desc">
                            <div class="inner-desc">
                                <h4 class="text-center">{{$ficha_tecnica->nombre}}</h4>
                                <span class="text-right center-block">
                                    <small>Ir a la ficha técnica<i class="fa fa-fw fa-long-arrow-right"></i></small>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endsection
