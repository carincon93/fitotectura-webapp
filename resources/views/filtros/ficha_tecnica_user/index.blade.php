@extends('layouts.app')

@section('title', 'Ficha técnica')

@section('content')
    <section class="background-page ficha_tecnica_user">
        <div style="padding-top: 6rem;">
            <div class="container">
                @include('layouts.breadcrumb_ficha_tecnica')
                <div class="well">
                    <a href="{{ url('ficha_tecnica_user/' . $ficha_tecnica->id .'/nombre='.$ficha_tecnica->nombre) }}" class="btn btn-success"><i class="fa fa-fw fa-download"></i>Descargar ficha técnica de esta planta</a>
                </div>
                <div class="row section-ficha">
                    <div class="col-md-4 col-md-push-8">
                        <div class="imagen-principal img-container">
                            <img src="{{ Storage::url($ficha_tecnica->foto) }}" class="lightbox img-responsive foto" alt="foto_ficha_tecnica">
                            <div class="middle">
                                <div class="text">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                        </div>
                        {{-- @if(count($ficha_tecnica->mantenimiento->observaciones) > 0) --}}
                            <div class="observacion">
                                <p><strong>Observaciones:</strong> {{ $ficha_tecnica->mantenimiento->observaciones }}</p>
                            </div>
                        {{-- @endif --}}
                    </div>
                    <div class="col-md-8 col-md-pull-4 dbasicos">
                        <h1>{{ $ficha_tecnica->nombre }}</h1>
                        <h4>
                            <strong>Descripción:</strong>
                        </h4>
                        <p>{{ $ficha_tecnica->descripcion }}</p>
                        <p class="des">
                            <strong>Nombre científico:</strong> {{ $ficha_tecnica->nombre_cientifico }}
                        </p>
                        <p>
                            <strong>Familia:</strong> {{ $ficha_tecnica->familia }}
                        </p>
                        <p>
                            <strong>Origen:</strong> {{ $ficha_tecnica->origen }}
                        </p>
                        <p>
                            <strong>Altitud:</strong> {{ $ficha_tecnica->altitud_siembra }}
                        </p>
                        <p>
                            <strong>Propagación:</strong> {{ $ficha_tecnica->propagacion }}
                        </p>
                        <p>
                            <strong>Característica:</strong> {{ $ficha_tecnica->caracteristica }}
                        </p>
                    </div>
                </div>
                <div class="row section-ficha">
                    <div class="col-md-8 col-sm-6 mantenimiento">
                        <h4><strong>Cuadro de mantenimiento</strong></h4>
                        <div class="col-md-5">
                            <ul class="list-unstyled">
                                <li class="{{ $ficha_tecnica->mantenimiento->poda_de_formacion == 1 ? 'square-done' : '' }}">Poda de formación</li>
                                <li class="{{ $ficha_tecnica->mantenimiento->poda_de_ramas_bajas == 1 ? 'square-done' : '' }}">Poda de ramas bajas</li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <ul class="list-unstyled">
                                <li class="{{ $ficha_tecnica->mantenimiento->poda_estructurada_o_estetica == 1 ? 'square-done' : '' }}">Poda estructural o estética</li>
                                <li class="{{ $ficha_tecnica->mantenimiento->poda_de_estabilidad == 1 ? 'square-done' : '' }}">Poda de estabilidad</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 expresion">
                        <h4><strong>Expresión vegetal</strong></h4>
                        <div class="col-md-6 col-sm-6">
                            <ul class="list-unstyled">
                                <li class="{{ $ficha_tecnica->expresion_vegetal->raiz == 1 ? 'square-done' : '' }}">Raíz</li>
                                <li class="{{ $ficha_tecnica->expresion_vegetal->tronco == 1 ? 'square-done' : '' }}">Tronco</li>
                                <li class="{{ $ficha_tecnica->expresion_vegetal->corteza == 1 ? 'square-done' : '' }}">Corteza</li>
                                <li class="{{ $ficha_tecnica->expresion_vegetal->ramas == 1 ? 'square-done' : '' }}">Ramas</li>
                                <li class="{{ $ficha_tecnica->expresion_vegetal->tallo == 1 ? 'square-done' : '' }}">Tallo</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul class="list-unstyled">
                                <li class="{{ $ficha_tecnica->expresion_vegetal->hojas == 1 ? 'square-done' : '' }}">Hojas</li>
                                <li class="{{ $ficha_tecnica->expresion_vegetal->flores == 1 ? 'square-done' : '' }}">Flores</li>
                                <li class="{{ $ficha_tecnica->expresion_vegetal->frutos == 1 ? 'square-done' : '' }}">Frutos</li>
                                <li class="{{ $ficha_tecnica->expresion_vegetal->formas == 1 ? 'square-done' : '' }}">Formas</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row section-ficha">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            @if($ficha_tecnica->detalle_tronco  != NULL)
                            <div class="col-md-3 col-sm-3">
                                <h6><strong>Detalle del tronco</strong></h6>
                                <div class="imag img-container">
                                    <img src="{{ Storage::url($ficha_tecnica->detalle_tronco) }}" class="lightbox img-responsive det"  alt="foto_ficha_tecnica">
                                    <div class="middle">
                                        <div class="text">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($ficha_tecnica->detalle_tallo != NULL)
                            <div class="col-md-3">
                                <h6><strong>Detalle del tallo</strong></h6>
                                <div class="imag img-container">
                                    <img src="{{ Storage::url($ficha_tecnica->detalle_tallo) }}" class="lightbox img-responsive det" alt="foto_ficha_tecnica">
                                    <div class="middle">
                                        <div class="text">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($ficha_tecnica->detalle_hoja  != NULL)
                            <div class="col-md-3 col-sm-3">
                                <h6><strong>Detalle de la hoja</strong></h6>
                                <div class="imag img-container">
                                    <img src="{{ Storage::url($ficha_tecnica->detalle_hoja) }}" class="lightbox img-responsive det" alt="foto_ficha_tecnica">
                                    <div class="middle">
                                        <div class="text">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($ficha_tecnica->detalle_flor  != NULL)
                            <div class="col-md-3 col-sm-3">
                                <h6><strong>Detalles de la flor</strong></h6>
                                <div class="imag img-container">
                                    <img src="{{ Storage::url($ficha_tecnica->detalle_flor) }}" class="lightbox img-responsive det" alt="foto_ficha_tecnica">
                                    <div class="middle">
                                        <div class="text">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($ficha_tecnica->detalle_fruto  != NULL)
                            <div class="col-md-3 col-sm-3">
                                <h6><strong>Detalle del fruto</strong></h6>
                                <div class="imag img-container">
                                    <img src="{{ Storage::url($ficha_tecnica->detalle_fruto) }}" class="lightbox img-responsive det" alt="foto_ficha_tecnica">
                                    <div class="middle">
                                        <div class="text">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="comportamiento-fisionomico">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="comportamiento-heading">
                                    <h1 class="text-center"><strong>Comportamiento fisionómico</strong></h1>
                                    <p class="text-center">
                                        <strong>Descripción</strong> Aqui podra apreciar el comportamiento fisionomico de la planta.
                                    </p>
                                    <i class="fa fa-fw fa-calendar fa-3x center-block"></i>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Enero</th>
                                                <th>Febrero</th>
                                                <th>Marzo</th>
                                                <th>Abril</th>
                                                <th>Mayo</th>
                                                <th>Junio</th>
                                                <th>Julio</th>
                                                <th>Agosto</th>
                                                <th>Septiembre</th>
                                                <th>Octubre</th>
                                                <th>Noviembre</th>
                                                <th>Diciembre</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Flor</td>
                                                <td class="{{ $ficha_tecnica->flor->flor_enero == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_febrero == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_marzo == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_abril == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_mayo == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_junio == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_julio == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_agosto == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_septiembre == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_octubre == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_noviembre == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->flor->flor_diciembre == 1 ? 'cell-done' : '' }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Hoja</td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_enero == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_febrero == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_marzo == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_abril == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_mayo == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_junio == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_julio == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_agosto == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_septiembre == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_octubre == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_noviembre == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->hoja->hoja_diciembre == 1 ? 'cell-done' : '' }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Fruto</td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_enero == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_febrero == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_marzo == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_abril == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_mayo == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_junio == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_julio == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_agosto == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_septiembre == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_octubre == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_noviembre == 1 ? 'cell-done' : '' }}"></td>
                                                <td class="{{ $ficha_tecnica->fruto->fruto_diciembre == 1 ? 'cell-done' : '' }}"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /container -->
        </div>
    </section>
@endsection
