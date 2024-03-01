@extends('layouts.app-filtros')

@section('title', 'Plazoletas')

@section('content')
    <ul class="breadcrumb">
        <li><a href="{{ url('buscar_plantas') }}">Inicio</a></li>
        <li><a href="{{ url('buscar_plantas/categorizacion') }}">Categorización</a></li>
        <li class="active">Espacio público <small>(Plazoletas)</small></li>
    </ul>
    @if (count($fichas_tecnicas) > 0)
        @foreach($fichas_tecnicas->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $ficha_tecnica)
                    <div class="col-md-4 col-sm-4">
                        <a href="{{ url('ficha_tecnica_user/'.$ficha_tecnica->id.'/ruta/6') }}" class="card card-result">
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
                @endforeach
            </div>
        @endforeach
    @else
        <p class="no-result">
            No se encontraron resultados para esta búsqueda
        </p>
    @endif
    {{ $fichas_tecnicas->links() }}
@endsection
