@extends('layouts.dashboard')

@section('title', 'Añadir ficha técnica')

@section('content')
    <div class="overlay-form align-center">
        <img src="{{ asset('images/loader.gif') }}" alt="" class="img-responsive">
    </div>
    <div class="jumbotron jumbotron-transparent">
        <div class="row">
            <div class="col-md-7 col-md-push-5">
                <div class="text-left page-desc">
                    <small class="text-uppercase">Información</small>
                    <h3>Formulario para añadir una nueva ficha técnica de una planta</h3>
                    <p>
                        Ingresa toda la información de la planta para generar una nueva ficha técnica,
                        además puede asignar propiedades de <strong>caracaterización y categorización</strong> para que pueda ser consultada mediante el sistema de búsqueda.
                    </p>
                </div>
            </div>
            <div class="col-md-5 col-md-pull-7">
                <img src="{{ asset('images/form-img.png') }}" alt="" class="img-responsive center-block">
            </div>
        </div>
    </div>
    <form action="{{ url('/admin/fichas_tecnicas') }}" enctype="multipart/form-data" method="POST" id="fichaTecnica" class="form-horizontal {{ count($errors) > 0 ? 'form-error' : '' }}">
        {{ csrf_field() }}
        <fieldset class="big-gray" id="info-principal">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center form-titles"><strong>Información principal de la planta</strong></h1>
                    <div class="col-md-10">
                        <div class="form-group{{ $errors->has('foto') ? ' has-error' : ''  }}">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <label for="foto">Foto principal <span class="red-required">*</span></label>
                                    <p>
                                        <small>El tamaño de la imágen no debe sobrepasar las 4MB</small>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <div class="box js foto-principal-planta">
                                        <input type="file" name="foto" id="foto" class="inputfile inputfile-5 required" data-preview="Foto" accept="image/*">
                                        <label for="foto" class="img-container">
                                            <img src="" alt="" class="img-responsive foto-registro" id="outputFoto">
                                            <span></span>
                                        </label>
                                        @if ($errors->has('foto'))
                                            <span class="help-block">
                                                {{ $errors->first('foto') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ficha_tecnica') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3" for="ficha_tecnica">Archivo ficha técnica <span class="red-required">*</span></label>
                                <div class="col-md-9">
                                    <p>
                                        Carga el archivo con la ficha técnica de la planta. El formato del archivo debe ser .pdf
                                    </p>
                                    <p>
                                        <small>Este es el archivo que podrá ser descargado por el usuario</small>
                                    </p>
                                    <input type="file" name="ficha_tecnica" value="{{ old('ficha_tecnica') }}" id="ficha_tecnica" class="form-control required" accept="application/pdf">
                                    @if ($errors->has('ficha_tecnica'))
                                        <span class="help-block">
                                            {{ $errors->first('ficha_tecnica') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3" for="nombre">Nombre <span class="red-required">*</span></label>
                                <div class="col-md-9">

                                    <input type="text" name="nombre" value="{{ old('nombre') }}" id="nombre" class="form-control" placeholder="Ej: Tulipán Africano">
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                            {{ $errors->first('nombre') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nombre_cientifico') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3" for="nombre_cientifico">Nombre científico <span class="red-required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="nombre_cientifico" value="{{ old('nombre_cientifico') }}" id="nombre_cientifico" class="form-control" placeholder="Ej: Spathodea Campanulata">
                                    @if ($errors->has('nombre_cientifico'))
                                        <span class="help-block">
                                            {{ $errors->first('nombre_cientifico') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('familia') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3" for="familia">Familia <span class="red-required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="familia" value="{{ old('familia') }}" id="familia" class="form-control" placeholder="Ej: Bignoniaceae">
                                    @if ($errors->has('familia'))
                                        <span class="help-block">
                                            {{ $errors->first('familia') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('origen') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3" for="origen">Origen <span class="red-required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="origen" value="{{ old('origen') }}" id="origen" class="form-control" placeholder="Ej: América, Europa">
                                    @if ($errors->has('origen'))
                                        <span class="help-block">
                                            {{ $errors->first('origen') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('propagacion') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3" for="propagacion">Propagación <span class="red-required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="propagacion" value="{{ old('propagacion') }}" id="propagacion" class="form-control" placeholder="Ej: Semillas">
                                    @if ($errors->has('propagacion'))
                                        <span class="help-block">
                                            {{ $errors->first('propagacion') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('altitud_siembra') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3" for="altitud_siembra">Altitud siembra <span class="red-required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="altitud_siembra" value="{{ old('altitud_siembra') }}" id="altitud_siembra" class="form-control">
                                    @if ($errors->has('altitud_siembra'))
                                        <span class="help-block">
                                            {{ $errors->first('altitud_siembra') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3" for="descripcion">Descripción <span class="red-required">*</span></label>
                                <div class="col-md-9">
                                    <textarea name="descripcion" rows="4" class="form-control" id="descripcion">{{ old('descripcion') }}</textarea>
                                    @if ($errors->has('descripcion'))
                                        <span class="help-block">
                                            {{ $errors->first('descripcion') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('caracteristica') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3" for="caracteristica">Característica <span class="red-required">*</span></label>
                                <div class="col-md-9">
                                    <select class="form-control" name="caracteristica" id="caracteristica">
                                        <option value="">Seleccione una opción</option>
                                        <option value="árbol">Árbol</option>
                                        <option value="árbol medio">Árbol medio</option>
                                        <option value="trepadora">Trepadora</option>
                                        <option value="arbusto">Arbusto</option>
                                        <option value="tapizante">Tapizante</option>
                                    </select>
                                    @if ($errors->has('caracteristica'))
                                        <span class="help-block">
                                            {{ $errors->first('caracteristica') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="margin-imagenes">
                                <h3>Imágenes de la planta</h3>
                                <p>
                                    Seleccione una imágen para cada detalle de la planta
                                    <br>
                                    <small>El tamaño de cada imágen no debe sobrepasar las 4MB</small>
                                </p>
                            </div>
                            <div class="row margin-imagenes">
                                <div class="col-md-3 col-sm-3">
                                    <div class="{{ $errors->has('detalle_tronco') ? ' has-error' : ''  }}">
                                        <label class="" for="detalle_tronco">Detalle del tronco</label>

                                        <div class="box js">
                                            <button type="button" class="btn clear_foto">Limpiar</button>
                                            <input type="file" name="detalle_tronco" id="detalle_tronco" class="inputfile inputfile-5" data-preview="Tronco" accept="image/*">
                                            <label for="detalle_tronco" class="img-container">
                                                <img src="" alt="" class="img-responsive foto-registro" id="outputTronco">
                                                <span></span>
                                            </label>
                                            @if ($errors->has('detalle_tronco'))
                                                <span class="help-block">
                                                    {{ $errors->first('detalle_tronco') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="{{ $errors->has('detalle_tallo') ? ' has-error' : ''  }}">
                                        <label class="" for="detalle_tallo">Detalle del tallo</label>
                                        <div class="box js">
                                            <button type="button" class="btn clear_foto">Limpiar</button>
                                            <input type="file" name="detalle_tallo" id="detalle_tallo" class="inputfile inputfile-5" data-preview="Tallo" accept="image/*">
                                            <label for="detalle_tallo" class="img-container">
                                                <img src="" alt="" class="img-responsive foto-registro" id="outputTallo">
                                                <span></span>
                                            </label>
                                            @if ($errors->has('detalle_tallo'))
                                                <span class="help-block">
                                                    {{ $errors->first('detalle_tallo') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="{{ $errors->has('detalle_hoja') ? ' has-error' : ''  }}">
                                        <label class="" for="detalle_hoja">Detalle de la hoja</label>
                                        <div class="box js">
                                            <button type="button" class="btn clear_foto">Limpiar</button>
                                            <input type="file" name="detalle_hoja" id="detalle_hoja" class="inputfile inputfile-5" data-preview="Hoja" accept="image/*">
                                            <label for="detalle_hoja" class="img-container">
                                                <img src="" alt="" class="img-responsive foto-registro" id="outputHoja">
                                                <span></span>
                                            </label>
                                            @if ($errors->has('detalle_hoja'))
                                                <span class="help-block">
                                                    {{ $errors->first('detalle_hoja') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="{{ $errors->has('detalle_flor') ? ' has-error' : ''  }}">
                                        <label class="" for="detalle_flor">Detalle de la flor</label>
                                        <div class="box js">
                                            <button type="button" class="btn clear_foto">Limpiar</button>
                                            <input type="file" name="detalle_flor" id="detalle_flor" class="inputfile inputfile-5" data-preview="Flor" accept="image/*">
                                            <label for="detalle_flor" class="img-container">
                                                <img src="" alt="" class="img-responsive foto-registro" id="outputFlor">
                                                <span></span>
                                            </label>
                                            @if ($errors->has('detalle_flor'))
                                                <span class="help-block">
                                                    {{ $errors->first('detalle_flor') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <div class="{{ $errors->has('detalle_fruto') ? ' has-error' : ''  }}">
                                        <label class="" for="detalle_fruto">Detalle del fruto</label>
                                        <div class="box js">
                                            <button type="button" class="btn clear_foto">Limpiar</button>
                                            <input type="file" name="detalle_fruto" id="detalle_fruto" class="inputfile inputfile-5" data-preview="Fruto" accept="image/*">
                                            <label for="detalle_fruto" class="img-container">
                                                <img src="" alt="" class="img-responsive foto-registro" id="outputFruto">
                                                <span></span>
                                            </label>
                                            @if ($errors->has('detalle_fruto'))
                                                <span class="help-block">
                                                    {{ $errors->first('detalle_fruto') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="big-gray" id="comp-fisionomico">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Comportamiento fisionómico</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="comportamiento-part">
                                        <label>Flor</label>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_enero" value="1">Enero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_febrero" value="1">Febrero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_marzo" value="1">Marzo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_abril" value="1">Abril
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_mayo" value="1">Mayo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_junio" value="1">Junio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_julio" value="1">Julio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_agosto" value="1">Agosto
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_septiembre" value="1">Septiembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_octubre" value="1">Octubre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_noviembre" value="1">Noviembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_diciembre" value="1">Diciembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comportamiento-part">
                                        <label>Fruto</label>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_enero" value="1">Enero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_febrero" value="1">Febrero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_marzo" value="1">Marzo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_abril" value="1">Abril
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_mayo" value="1">Mayo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_junio" value="1">Junio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_julio" value="1">Julio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_agosto" value="1">Agosto
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_septiembre" value="1">Septiembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_octubre" value="1">Octubre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_noviembre" value="1">Noviembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_diciembre" value="1">Diciembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comportamiento-part">
                                        <label>Hoja</label>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_enero" value="1">Enero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_febrero" value="1">Febrero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_marzo" value="1">Marzo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_abril" value="1">Abril
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_mayo" value="1">Mayo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_junio" value="1">Junio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_julio" value="1">Julio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_agosto" value="1">Agosto
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_septiembre" value="1">Septiembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_octubre" value="1">Octubre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_noviembre" value="1">Noviembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_diciembre" value="1">Diciembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="big-gray" id="exp-vegetal">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Expresión vegetal</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="raiz" value="1">Raíz
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="tronco" value="1">Tronco
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="corteza" value="1">Corteza
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="ramas" value="1">Ramas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="hojas" value="1">Hojas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="flores" value="1">Flores
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="frutos" value="1">Frutos
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="formas" value="1">Formas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="tallo" value="1">Tallo
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="big-gray" id="mantenimiento">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Mantenimiento</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="poda_de_formacion" value="1">Poda de formación
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="poda_de_ramas_bajas" value="1">Poda de ramas bajas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="poda_estructurada_o_estetica" value="1">Poda estructurada o estética
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="poda_de_estabilidad" value="1">Poda de estabilidad
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="observaciones">
                                        <label for="observaciones">
                                            Observaciones
                                        </label>
                                        <textarea id="observaciones" name="observaciones" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="" id="caracterizacion">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-titles">
                            <h1><strong>Caracterización</strong></h1>
                            <blockquote class="d-flex-info">
                                <div class="">
                                    <i class="fa fa-fw fa-info"></i>
                                </div>
                                <div>
                                    Resgistra propiedades de caracterización a esta la planta para que pueda ser consultada mediante el sistema de búsqueda.
                                </div>
                            </blockquote>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Climatología</label>
                                </div>
                                <div class="col-md-9">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Ambiente</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="humedo_tropical" value="1">Húmedo tropical
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="seco_tropical" value="1">Seco tropical
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="selva_premontana" value="1">Selva premontana
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Clima</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="frio" value="1">Frío
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="templado" value="1">Templado
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="calido" value="1">Cálido
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Viento</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="alto" value="1">Alto
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="viento_medio" value="1">Medio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="viento_bajo" value="1">Baja
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Suelo</label>
                                </div>
                                <div class="col-md-9">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Naturaleza</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="acido" value="1">Ácido
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="naturaleza_medio" value="1">Medio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="medio_acido" value="1">Medio ácido
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Textura</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="franco" value="1">Franco
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="arenoso" value="1">Arenoso
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="arcilloso" value="1">Arcilloso
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Materia orgánica</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="rico" value="1">Rico
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="medio_mt" value="1">Medio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="pobre" value="1">Pobre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Fisiología</label>
                                </div>
                                <div class="col-md-9">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Crecimiento</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="rapido" value="1">Rápido
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="cremimiento_medio" value="1">Medio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="lento" value="1">Lento
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Longevidad</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="alta" value="1">Alta
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="media" value="1">Media
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="longevidad_baja" value="1">Baja
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="" id="categorizacion">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-titles">
                            <h1><strong>Categorización</strong></h1>
                            <blockquote class="d-flex-info">
                                <div class="">
                                    <i class="fa fa-fw fa-info"></i>
                                </div>
                                <div>
                                    Resgistra propiedades de categorización a esta la planta para que pueda ser consultada mediante el sistema de búsqueda.
                                </div>
                            </blockquote>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Infraestructura construida</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <h5 class="title-height form-subtitles">Uso residencial</h5>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="r_antejardin" value="1">Antejardín
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="r_patios" value="1">Patios
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="r_fachadas" value="1">Fachadas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="r_cubiertas" value="1">Cubiertas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <h5 class="title-height form-subtitles">Uso institucional</h5>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="i_antejardin" value="1">Antejardín
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="i_fachadas" value="1">Fachadas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="i_cubiertas" value="1">Cubiertas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="i_plazoletas_acceso" value="1">Plazoletas de acceso
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <h5 class="title-height form-subtitles">Uso de servicios públicos</h5>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="s_antejardin" value="1">Antejardín
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="s_fachadas" value="1">Fachadas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="s_cubiertas" value="1">Cubiertas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="s_plazoletas_acceso" value="1">Plazoletas de acceso
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <h5 class="title-height form-subtitles">Uso comercial</h5>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="c_antejardin" value="1">Antejardín
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="c_fachadas" value="1">Fachadas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="c_cubiertas" value="1">Cubiertas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="c_plazoletas_acceso" value="1">Plazoletas de acceso
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Infraestructura vial</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="separador_de_avenidas" value="1">Separador de avenidas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="glorietas_rotondas" value="1">Glorietas / Rotondas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="andenes" value="1">Andenes
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="puentes" value="1">Puentes
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Prevención de riesgo</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="barrera_visual" value="1">Barrera visual
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="barrera_acustica" value="1">Barrera acústica
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="barrera_de_olores" value="1">Barrera de olores
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="barrera_de_vientos" value="1">Barrera de vientos
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="cubrir_taludes" value="1">Cubrir taludes
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="ronda_hidrica" value="1">Ronda hídrica
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Espacio público</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="parques" value="1">Parques
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="plazoletas" value="1">Plazoletas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="jardines" value="1">Jardines
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="instalaciones_deportivas" value="1">Instalaciones deportivas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <p>
                                    <small>Una vez diligenciado el formulario, dale clic a 'Guardar ficha técnica'.</small>
                                </p>
                            </div>
                            <div class="col-md-9">
                                <button type="submit" name="button" id="guardar-ficha" class="btn btn-success">Guardar ficha técnica</button>
                                <button type="reset" name="button" id="reset-form" class="btn btn-default">Limpiar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script type="text/javascript">
    function previewFoto() {
        var preview = document.getElementById('outputFoto');
        var file    = document.getElementById('foto').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    function previewFlor() {
        var preview = document.getElementById('outputFlor');
        var file    = document.getElementById('detalle_flor').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    function previewHoja() {
        var preview = document.getElementById('outputHoja');
        var file    = document.getElementById('detalle_hoja').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    function previewTronco() {
        var preview = document.getElementById('outputTronco');
        var file    = document.getElementById('detalle_tronco').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    function previewFruto() {
        var preview = document.getElementById('outputFruto');
        var file    = document.getElementById('detalle_fruto').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    function previewTallo() {
        var preview = document.getElementById('outputTallo');
        var file    = document.getElementById('detalle_tallo').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    $(document).ready(function() {


    });

</script>
@endpush
