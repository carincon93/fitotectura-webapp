@extends('layouts.app-filtros')

@section('title', 'Búsqueda')

@section('content')
    <ul class="breadcrumb">
        <li><a href="{{ url('buscar_plantas') }}">Inicio</a></li>
        <li class="active">Búsqueda por nombre</li>
    </ul>
        @forelse ($query->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $ficha_tecnica)
                    <div class="col-md-4 col-sm-4">
                        <a href="{{ url('ficha_tecnica_user/'.$ficha_tecnica->id.'/ruta/40') }}" class="card card-result">
                            <div class="card-image-result">
                                <img src="{{ Storage::url($ficha_tecnica->foto) }}" alt="foto_ficha_tecnica" class="img-responsive imgresult">
                            </div>
                            <div class="card-desc">
                                <div class="inner-desc">
                                    <h4 class="text-left small">Nombre común: {{$ficha_tecnica->nombre}}</h4>
                                    <h4 class="text-left small">Nombre científico: {{$ficha_tecnica->nombre_cientifico}}</h4>
                                    <span class="text-right center-block">
                                        <small>Ir a la ficha técnica<i class="fa fa-fw fa-long-arrow-right"></i></small>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @empty
            <p class="no-result">
                No se encontraron resultados para esta búsqueda.
                <br>
                Por favor notifícanos para realizar la investigación e incluir la planta en la matriz.
            </p>
            <form class="" action="{{ route('notificacion') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="planta_recomendacion" value="{{ $nombrePlanta }}">
                <button type="submit" class="btn btn-default">Realizar notificación</button>
            </form>
        @endforelse
@endsection
