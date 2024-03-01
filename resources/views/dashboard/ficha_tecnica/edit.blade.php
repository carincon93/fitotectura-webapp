@extends('layouts.dashboard')

@section('title', 'Editar ficha técnica')

@section('content')
    <div class="jumbotron jumbotron-transparent">
        <div class="row">
            <div class="col-md-7 col-md-push-5">
                <div class="text-left page-desc">
                    <small class="text-uppercase">Información</small>
                    <h3>Formulario para editar una ficha técnica de una planta</h3>
                    <p>
                        Realiza modificaciones en la información de la ficha técnica de la planta <strong>{{ $ft->nombre }}</strong>.
                    </p>
                </div>
            </div>
            <div class="col-md-5 col-md-pull-7">
                <img src="{{ asset('images/form-img.png') }}" alt="" class="img-responsive center-block">
            </div>
        </div>
    </div>
    <form action="{{ url('/admin/fichas_tecnicas/' . $ft->id) }}" enctype="multipart/form-data" method="POST" id="fichaTecnicaEdit" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <fieldset class="big-gray" id="info-principal">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center form-titles"><strong>Información principal de la planta</strong></h1>
                    <div class="col-md-10">
                        <div class="form-group{{ $errors->has('foto') ? ' has-error' : ''  }}">
                            <div class="row">
                                <label class="col-md-3 col-sm-3" for="foto">Foto principal <span class="red-required">*</span></label>
                                <div class="col-md-3 col-sm-3">
                                    <div class="box js">
                                        <input type="file" name="foto" id="foto" class="inputfile inputfile-5" onchange="previewFoto()" accept="image/*">
                                        <label for="foto" class="img-container">
                                            <img src="{{ Storage::url($ft->foto) }}" alt="" class="img-responsive foto-registro" id="outputFoto">
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
                                    <input type="file" name="ficha_tecnica" value="{{ Storage::url($ft->ficha_tecnica) }}" id="ficha_tecnica" class="form-control" accept="application/pdf">
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
                                    <input type="text" name="nombre" value="{{ $ft->nombre }}" id="nombre" class="form-control" placeholder="Ej: Tulipán Africano">
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
                                    <input type="text" name="nombre_cientifico" value="{{ $ft->nombre_cientifico }}" id="nombre_cientifico" class="form-control" placeholder="Ej: Spathodea Campanulata">
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
                                    <input type="text" name="familia" value="{{ $ft->familia }}" id="familia" class="form-control" placeholder="Ej: Bignoniaceae">
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
                                    <input type="text" name="origen" value="{{ $ft->origen }}" id="origen" class="form-control" placeholder="Ej: América, Europa">
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
                                    <input type="text" name="propagacion" value="{{ $ft->propagacion }}" id="propagacion" class="form-control" placeholder="Ej: Semillas">
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
                                    <input type="text" name="altitud_siembra" value="{{ $ft->altitud_siembra }}" id="altitud_siembra" class="form-control">
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
                                    <textarea name="descripcion" rows="4" class="form-control" id="descripcion">{{ $ft->descripcion }}</textarea>
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
                                        <option value="árbol" {{ $ft->caracteristica == 'arbol' ? 'selected="selected"' : ''}}>Árbol</option>
                                        <option value="árbol medio" {{ $ft->caracteristica == 'arbol medio' ? 'selected="selected"' : ''}}>Árbol medio</option>
                                        <option value="trepadora" {{ $ft->caracteristica == 'trepadora' ? 'selected="selected"' : ''}}>Trepadora</option>
                                        <option value="arbusto" {{ $ft->caracteristica == 'arbusto' ? 'selected="selected"' : ''}}>Arbusto</option>
                                        <option value="tapizante" {{ $ft->caracteristica == 'tapizante' ? 'selected="selected"' : ''}}>Tapizante</option>
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
                                </p>
                            </div>
                            <div class="margin-imagenes">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="{{ $errors->has('detalle_tronco') ? ' has-error' : ''  }}">
                                            <label class="" for="detalle_tronco">Detalle del tronco</label>
                                            <div class="box js">
                                                {{-- <button type="button" class="clear_foto">Limpiar</button> --}}
                                                <input type="file" name="detalle_tronco" id="detalle_tronco" data-preview="Tronco" class="inputfile inputfile-5" onchange="previewTronco()" accept="image/*">
                                                <label for="detalle_tronco" class="img-container">
                                                    <img src="{{ $ft->detalle_tronco == NULL ? '' : Storage::url($ft->detalle_tronco) }}" alt="" class="img-responsive foto-registro" id="outputTronco">
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
                                                {{-- <button type="button" class="clear_foto">Limpiar</button> --}}
                                                <input type="file" name="detalle_tallo" id="detalle_tallo" class="inputfile inputfile-5" data-preview="Tallo" accept="image/*">
                                                <label for="detalle_tallo" class="img-container">
                                                    <img src="{{ $ft->detalle_tallo == NULL ? '' : Storage::url($ft->detalle_tallo) }}" alt="" class="img-responsive foto-registro" id="outputTallo">
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
                                                {{-- <button type="button" class="clear_foto">Limpiar</button> --}}
                                                <input type="file" name="detalle_hoja" id="detalle_hoja" data-preview="Hoja" class="inputfile inputfile-5" onchange="previewHoja()" accept="image/*">
                                                <label for="detalle_hoja" class="img-container">
                                                    <img src="{{ $ft->detalle_hoja == NULL ? '' : Storage::url($ft->detalle_hoja) }}" alt="" class="img-responsive foto-registro" id="outputHoja">
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
                                                {{-- <button type="button" class="clear_foto">Limpiar</button> --}}
                                                <input type="file" name="detalle_flor" id="detalle_flor" data-preview="Flor" class="inputfile inputfile-5" onchange="previewFlor()" accept="image/*">
                                                <label for="detalle_flor" class="img-container">
                                                    <img src="{{ $ft->detalle_flor == NULL ? '' : Storage::url($ft->detalle_flor) }}" alt="" class="img-responsive foto-registro" id="outputFlor">
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
                                                {{-- <button type="button" class="clear_foto">Limpiar</button> --}}
                                                <input type="file" name="detalle_fruto" id="detalle_fruto" data-preview="Fruto" class="inputfile inputfile-5" onchange="previewFruto()" accept="image/*">
                                                <label for="detalle_fruto" class="img-container">
                                                    <img src="{{ $ft->detalle_fruto == NULL ? '' : Storage::url($ft->detalle_fruto) }}" alt="" class="img-responsive foto-registro" id="outputFruto">
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
                                                        <input type="checkbox" name="flor_enero" value="1" {{ $ft->flor->flor_enero == 1 ? 'checked="checked"' : '' }}>Enero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_febrero" value="1" {{ $ft->flor->flor_febrero == 1 ? 'checked="checked"' : '' }}>Febrero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_marzo" value="1" {{ $ft->flor->flor_marzo == 1 ? 'checked="checked"' : '' }}>Marzo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_abril" value="1" {{ $ft->flor->flor_abril == 1 ? 'checked="checked"' : '' }}>Abril
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_mayo" value="1" {{ $ft->flor->flor_mayo == 1 ? 'checked="checked"' : '' }}>Mayo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_junio" value="1" {{ $ft->flor->flor_junio == 1 ? 'checked="checked"' : '' }}>Junio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_julio" value="1" {{ $ft->flor->flor_julio == 1 ? 'checked="checked"' : '' }}>Julio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_agosto" value="1" {{ $ft->flor->flor_agosto == 1 ? 'checked="checked"' : '' }}>Agosto
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_septiembre" value="1" {{ $ft->flor->flor_septiembre == 1 ? 'checked="checked"' : '' }}>Septiembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_octubre" value="1" {{ $ft->flor->flor_octubre == 1 ? 'checked="checked"' : '' }}>Octubre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_noviembre" value="1" {{ $ft->flor->flor_noviembre == 1 ? 'checked="checked"' : '' }}>Noviembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="flor_diciembre" value="1" {{ $ft->flor->flor_diciembre == 1 ? 'checked="checked"' : '' }}>Diciembre
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
                                                        <input type="checkbox" name="fruto_enero" value="1" {{ $ft->fruto->fruto_enero == 1 ? 'checked="checked"' : '' }}>Enero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_febrero" value="1" {{ $ft->fruto->fruto_febrero == 1 ? 'checked="checked"' : '' }}>Febrero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_marzo" value="1" {{ $ft->fruto->fruto_marzo == 1 ? 'checked="checked"' : '' }}>Marzo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_abril" value="1" {{ $ft->fruto->fruto_abril == 1 ? 'checked="checked"' : '' }}>Abril
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_mayo" value="1" {{ $ft->fruto->fruto_mayo == 1 ? 'checked="checked"' : '' }}>Mayo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_junio" value="1" {{ $ft->fruto->fruto_junio == 1 ? 'checked="checked"' : '' }}>Junio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_julio" value="1" {{ $ft->fruto->fruto_julio == 1 ? 'checked="checked"' : '' }}>Julio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_agosto" value="1" {{ $ft->fruto->fruto_agosto == 1 ? 'checked="checked"' : '' }}>Agosto
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_septiembre" value="1" {{ $ft->fruto->fruto_septiembre == 1 ? 'checked="checked"' : '' }}>Septiembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_octubre" value="1" {{ $ft->fruto->fruto_octubre == 1 ? 'checked="checked"' : '' }}>Octubre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_noviembre" value="1" {{ $ft->fruto->fruto_noviembre == 1 ? 'checked="checked"' : '' }}>Noviembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="fruto_diciembre" value="1" {{ $ft->fruto->fruto_diciembre == 1 ? 'checked="checked"' : '' }}>Diciembre
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
                                                        <input type="checkbox" name="hoja_enero" value="1" {{ $ft->hoja->hoja_enero == 1 ? 'checked="checked"' : '' }}>Enero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_febrero" value="1" {{ $ft->hoja->hoja_febrero == 1 ? 'checked="checked"' : '' }}>Febrero
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_marzo" value="1" {{ $ft->hoja->hoja_marzo == 1 ? 'checked="checked"' : '' }}>Marzo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_abril" value="1" {{ $ft->hoja->hoja_abril == 1 ? 'checked="checked"' : '' }}>Abril
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_mayo" value="1" {{ $ft->hoja->hoja_mayo == 1 ? 'checked="checked"' : '' }}>Mayo
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_junio" value="1" {{ $ft->hoja->hoja_junio == 1 ? 'checked="checked"' : '' }}>Junio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_julio" value="1" {{ $ft->hoja->hoja_julio == 1 ? 'checked="checked"' : '' }}>Julio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_agosto" value="1" {{ $ft->hoja->hoja_agosto == 1 ? 'checked="checked"' : '' }}>Agosto
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_septiembre" value="1" {{ $ft->hoja->hoja_septiembre == 1 ? 'checked="checked"' : '' }}>Septiembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_octubre" value="1" {{ $ft->hoja->hoja_octubre == 1 ? 'checked="checked"' : '' }}>Octubre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_noviembre" value="1" {{ $ft->hoja->hoja_noviembre == 1 ? 'checked="checked"' : '' }}>Noviembre
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="hoja_diciembre" value="1" {{ $ft->hoja->hoja_diciembre == 1 ? 'checked="checked"' : '' }}>Diciembre
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
                                        <div class="col-md-3 col-sm-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="raiz" value="1" {{ $ft->expresion_vegetal->raiz == 1 ? 'checked="checked"' : '' }}>Raíz
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="tronco" value="1" {{ $ft->expresion_vegetal->tronco == 1 ? 'checked="checked"' : '' }}>Tronco
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="corteza" value="1" {{ $ft->expresion_vegetal->corteza == 1 ? 'checked="checked"' : '' }}>Corteza
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="ramas" value="1" {{ $ft->expresion_vegetal->ramas == 1 ? 'checked="checked"' : '' }}>Ramas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="hojas" value="1" {{ $ft->expresion_vegetal->hojas == 1 ? 'checked="checked"' : '' }}>Hojas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="flores" value="1" {{ $ft->expresion_vegetal->flores == 1 ? 'checked="checked"' : '' }}>Flores
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="frutos" value="1" {{ $ft->expresion_vegetal->frutos == 1 ? 'checked="checked"' : '' }}>Frutos
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="formas" value="1" {{ $ft->expresion_vegetal->formas == 1 ? 'checked="checked"' : '' }}>Formas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="tallo" value="1" {{ $ft->expresion_vegetal->tallo == 1 ? 'checked="checked"' : '' }}>Tallo
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
                                                    <input type="checkbox" name="poda_de_formacion" value="1" {{ $ft->mantenimiento->poda_de_formacion == 1 ? 'checked="checked"' : '' }}>Poda de formación
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="poda_de_ramas_bajas" value="1" {{ $ft->mantenimiento->poda_de_ramas_bajas == 1 ? 'checked="checked"' : '' }}>Poda de ramas bajas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="poda_estructurada_o_estetica" value="1" {{ $ft->mantenimiento->poda_estructurada_o_estetica == 1 ? 'checked="checked"' : '' }}>Poda estructurada o estética
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="poda_de_estabilidad" value="1" {{ $ft->mantenimiento->poda_de_estabilidad == 1 ? 'checked="checked"' : '' }}>Poda de estabilidad
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="observaciones">
                                        <label for="observaciones">
                                            Observaciones
                                        </label>
                                        <textarea id="observaciones" name="observaciones" rows="5" class="form-control">{{ $ft->mantenimiento->observaciones }}</textarea>
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
                                                        <input type="checkbox" name="humedo_tropical" value="1" {{ $ft->climatologia->humedo_tropical == 1 ? 'checked="checked"' : '' }}>Húmedo tropical
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="seco_tropical" value="1" {{ $ft->climatologia->seco_tropical == 1 ? 'checked="checked"' : '' }}>Seco tropical
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="selva_premontana" value="1" {{ $ft->climatologia->selva_premontana == 1 ? 'checked="checked"' : '' }}>Selva premontana
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Clima</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="frio" value="1" {{ $ft->climatologia->frio == 1 ? 'checked="checked"' : '' }}>Frío
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="templado" value="1" {{ $ft->climatologia->templado == 1 ? 'checked="checked"' : '' }}>Templado
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="calido" value="1" {{ $ft->climatologia->calido == 1 ? 'checked="checked"' : '' }}>Cálido
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Viento</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="alto" value="1" {{ $ft->climatologia->alto == 1 ? 'checked="checked"' : '' }}>Alto
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="viento_medio" value="1" {{ $ft->climatologia->medio == 1 ? 'checked="checked"' : '' }}>Medio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="viento_bajo" value="1" {{ $ft->climatologia->baja == 1 ? 'checked="checked"' : '' }}>Baja
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
                                                        <input type="checkbox" name="acido" value="1" {{ $ft->suelo->acido == 1 ? 'checked="checked"' : '' }}>Ácido
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="naturaleza_medio" value="1" {{ $ft->suelo->medio == 1 ? 'checked="checked"' : '' }}>Medio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="medio_acido" value="1" {{ $ft->suelo->medio_acido == 1 ? 'checked="checked"' : '' }}>Medio ácido
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Textura</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="franco" value="1" {{ $ft->suelo->franco == 1 ? 'checked="checked"' : '' }}>Franco
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="arenoso" value="1" {{ $ft->suelo->arenoso == 1 ? 'checked="checked"' : '' }}>Arenoso
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="arcilloso" value="1" {{ $ft->suelo->arcilloso == 1 ? 'checked="checked"' : '' }}>Arcilloso
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Materia orgánica</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="rico" value="1" {{ $ft->suelo->rico == 1 ? 'checked="checked"' : '' }}>Rico
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="medio_mt" value="1" {{ $ft->suelo->medio_mt == 1 ? 'checked="checked"' : '' }}>Medio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="pobre" value="1" {{ $ft->suelo->pobre == 1 ? 'checked="checked"' : '' }}>Pobre
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
                                                        <input type="checkbox" name="rapido" value="1" {{ $ft->fisiologia->rapido == 1 ? 'checked="checked"' : '' }}>Rápido
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="cremimiento_medio" value="1" {{ $ft->fisiologia->medio == 1 ? 'checked="checked"' : '' }}>Medio
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="lento" value="1" {{ $ft->fisiologia->lento == 1 ? 'checked="checked"' : '' }}>Lento
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <h5 class="form-subtitles">Longevidad</h5>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="alta" value="1" {{ $ft->fisiologia->alta == 1 ? 'checked="checked"' : '' }}>Alta
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="media" value="1" {{ $ft->fisiologia->media == 1 ? 'checked="checked"' : '' }}>Media
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" name="longevidad_baja" value="1" {{ $ft->fisiologia->baja == 1 ? 'checked="checked"' : '' }}>Baja
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
                                                    <input type="checkbox" name="r_antejardin" value="1" {{ $ft->uso_residencial->antejardin == 1 ? 'checked="checked"' : '' }}>Antejardín
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="r_patios" value="1" {{ $ft->uso_residencial->patios == 1 ? 'checked="checked"' : '' }}>Patios
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="r_fachadas" value="1" {{ $ft->uso_residencial->fachadas == 1 ? 'checked="checked"' : '' }}>Fachadas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="r_cubiertas" value="1" {{ $ft->uso_residencial->cubiertas == 1 ? 'checked="checked"' : '' }}>Cubiertas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <h5 class="title-height form-subtitles">Uso institucional</h5>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="i_antejardin" value="1" {{ $ft->uso_institucional->antejardin == 1 ? 'checked="checked"' : '' }}>Antejardín
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="i_fachadas" value="1" {{ $ft->uso_institucional->fachadas == 1 ? 'checked="checked"' : '' }}>Fachadas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="i_cubiertas" value="1" {{ $ft->uso_institucional->cubiertas == 1 ? 'checked="checked"' : '' }}>Cubiertas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="i_plazoletas_acceso" value="1" {{ $ft->uso_institucional->plazoletas_acceso == 1 ? 'checked="checked"' : '' }}>Plazoletas de acceso
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <h5 class="title-height form-subtitles">Uso de servicios públicos</h5>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="s_antejardin" value="1" {{ $ft->uso_de_servicios_publicos->antejardin == 1 ? 'checked="checked"' : '' }}>Antejardín
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="s_fachadas" value="1" {{ $ft->uso_de_servicios_publicos->fachadas == 1 ? 'checked="checked"' : '' }}>Fachadas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="s_cubiertas" value="1" {{ $ft->uso_de_servicios_publicos->cubiertas == 1 ? 'checked="checked"' : '' }}>Cubiertas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="s_plazoletas_acceso" value="1" {{ $ft->uso_de_servicios_publicos->plazoletas_acceso == 1 ? 'checked="checked"' : '' }}>Plazoletas de acceso
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <h5 class="title-height form-subtitles">Uso comercial</h5>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="c_antejardin" value="1" {{ $ft->uso_comercial->antejardin == 1 ? 'checked="checked"' : '' }}>Antejardín
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="c_fachadas" value="1" {{ $ft->uso_comercial->fachadas == 1 ? 'checked="checked"' : '' }}>Fachadas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="c_cubiertas" value="1" {{ $ft->uso_comercial->cubiertas == 1 ? 'checked="checked"' : '' }}>Cubiertas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="c_plazoletas_acceso" value="1" {{ $ft->uso_comercial->plazoletas_acceso == 1 ? 'checked="checked"' : '' }}>Plazoletas de acceso
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
                                                    <input type="checkbox" name="separador_de_avenidas" value="1" {{ $ft->infraestructura_vial->separador_de_avenidas == 1 ? 'checked="checked"' : '' }}>Separador de avenidas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="glorietas_rotondas" value="1" {{ $ft->infraestructura_vial->glorietas_rotondas == 1 ? 'checked="checked"' : '' }}>Glorietas / Rotondas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="andenes" value="1" {{ $ft->infraestructura_vial->andenes == 1 ? 'checked="checked"' : '' }}>Andenes
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="puentes" value="1" {{ $ft->infraestructura_vial->puentes == 1 ? 'checked="checked"' : '' }}>Puentes
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
                                                    <input type="checkbox" name="barrera_visual" value="1" {{ $ft->prevencion_de_riesgo->barrera_visual == 1 ? 'checked="checked"' : '' }}>Barrera visual
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="barrera_acustica" value="1" {{ $ft->prevencion_de_riesgo->barrera_acustica == 1 ? 'checked="checked"' : '' }}>Barrera acústica
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="barrera_de_olores" value="1" {{ $ft->prevencion_de_riesgo->barrera_de_olores == 1 ? 'checked="checked"' : '' }}>Barrera de olores
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="barrera_de_vientos" value="1" {{ $ft->prevencion_de_riesgo->barrera_de_vientos == 1 ? 'checked="checked"' : '' }}>Barrera de vientos
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="cubrir_taludes" value="1" {{ $ft->prevencion_de_riesgo->cubrir_taludes == 1 ? 'checked="checked"' : '' }}>Cubrir taludes
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="ronda_hidrica" value="1" {{ $ft->prevencion_de_riesgo->ronda_hidrica == 1 ? 'checked="checked"' : '' }}>Ronda hídrica
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
                                                    <input type="checkbox" name="parques" value="1" {{ $ft->espacio_publico->parques == 1 ? 'checked="checked"' : '' }}>Parques
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="plazoletas" value="1" {{ $ft->espacio_publico->plazoletas == 1 ? 'checked="checked"' : '' }}>Plazoletas
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="jardines" value="1" {{ $ft->espacio_publico->jardines == 1 ? 'checked="checked"' : '' }}>Jardines
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" name="instalaciones_deportivas" value="1" {{ $ft->espacio_publico->instalaciones_deportivas == 1 ? 'checked="checked"' : '' }}>Instalaciones deportivas
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
                                    <small>Una vez diligenciado el formulario, dale clic a 'Guardar cambios'.</small>
                                </p>
                            </div>
                            <div class="col-md-9">
                                <button type="submit" name="button" id="guardar-ficha" class="btn btn-success">Guardar cambios</button>
                                {{-- <button type="reset" name="button" id="reset-form" class="btn btn-default">Limpiar</button> --}}
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
