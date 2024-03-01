@extends('layouts.app')

@section('title', 'Búsqueda de plantas')

@section('content')
    <section class="background-page clearfix main-content">
        <div class="col-md-8 col-md-offset-2">
            <div class="content-desc">
                <div class="text-center">
                    {{-- <h1>Búsqueda</h1>
                    <p>Por favor seleccione una opción</p> --}}
                </div>
            </div>
            <div>
                <i class="fa fa-info-circle infoicon" data-toggle="modal" data-target="#CaracterizacionModal" data-placement="top" title="Ver Más"></i>
                <a href="{{ url('buscar_plantas/caracterizacion') }}">
                    <div class="caracterizacion">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <img src="{{ asset('images/recurso_1.png') }}" alt="" class="img-responsive arbol">
                            </div>
                            <div class="col-md-8 col-sm-6">
                                <h3 class="text-center text-uppercase">Caracterización</h3>
                                <p class="text-center">
                                    {{-- Desde una perspectiva investigativa la caracterización es una fase descriptiva con fines de identificación, entre otros aspectos, de los componentes y acontecimientos. --}}
                                </p>
                                <br>
                                <img src="{{ asset('images/recurso_11.png') }}" alt="" class="img-responsive">
                                <br>
                                <p class="text-center">
                                    Realiza una búsqueda por los siguientes filtros: <strong>Climatología, Fisiología, Suelo</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>


                <div id="CaracterizacionModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><strong>Caracterización</strong></h4>
                            </div>
                            <div class="modal-body">
                                {{-- <p>Desde una perspectiva investigativa la caracterización es una fase descriptiva con fines de identificación, entre otros aspectos, de los componentes y acontecimientos.</p> --}}
                                {{-- <p>La caracterización es un tipo de descripción cualitativa que puede recurrir a datos o a lo cuantitativo con el fin de profundizar el conocimiento sobre algo. Para cualificar ese algo previamente se deben identificar y organizar los datos; y a partir de ellos, describir (caracterizar) de una forma estructurada; y posteriormente, establecer su significado (sistematizar de forma crítica).</p> --}}
                                <img src="{{ asset('images/caracterizacionmodal.png') }}" alt="" class="img-responsive">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div>
                <i class="fa fa-info-circle infoicon" data-toggle="modal" data-target="#Categorizacionmodal" data-placement="top" title="Ver Más"></i>
                <a href="{{ url('buscar_plantas/categorizacion') }}">
                    <div class="categorizacion">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <img src="{{ asset('images/recurso_9.png') }}" alt="" class="img-responsive edificio">
                            </div>
                            <div class="col-md-8 col-sm-6">
                                <h3 class="text-center text-uppercase">Categorización</h3>
                                <p class="text-center">
                                    {{-- Una categorización,  es una capacidad de clasificar de manera ordenada y por categoría una o varias informaciones; es un intento progresivo de agrupar la información recogida en base a ciertos criterios. --}}
                                </p>
                                <br>
                                <img src="{{ asset('images/recurso_12.png') }}" alt="" class="img-responsive">
                                <br>
                                <p class="text-center">
                                    Realiza una búsqueda por los siguientes filtros: <strong>Infraestructura vial, Infraestructura construida, Espacio público, Prevención de riesgos</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>

                <form class="" action="{{ route('busqueda') }}" method="get">
                    <div class="form-group">
                        <label for="[object Object]">Buscar por nombre común o científico de la planta</label>
                        <input type="search" name="nombre_planta" value="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>

                <div id="Categorizacionmodal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><strong>Categorización</strong></h4>
                            </div>
                            <div class="modal-body">
                                {{-- <p>Una categorización,  es una capacidad de clasificar de manera ordenada y por categoría una o varias informaciones; es un intento progresivo de agrupar la información recogida en base a ciertos criterios.</p> --}}
                                {{-- <p>Teniendo en cuenta lo anterior, para la categorización de las especies investigadas se tendrán los siguientes parámetros de espacios de usos urbanos en los cuales son más frecuentes encontrar todo tipo de especies sean árbol, árbol medio, arbustos, plantas rastreras, plantas trepadoras.</p> --}}
                                <img src="{{ asset('images/categorizacionmodal.PNG') }}" alt="" class="img-responsive">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
