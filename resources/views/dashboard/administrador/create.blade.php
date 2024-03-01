@extends('layouts.dashboard')

@section('title', 'Añadir administrador')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h3>Añadir administrador</h3>
            <form action="{{ url('admin/administradores') }}" method="POST" id="administrador" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('nombre_completo') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="nombre_completo" class="control-label">Nombre completo <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input id="nombre_completo" class="form-control required" type="text" name="nombre_completo" value="{{ old('nombre_completo') }}">
                            @if ($errors->has('nombre_completo'))
                                <span class="help-block">
                                    {{ $errors->first('nombre_completo') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="email" class="control-label">Dirección de correo electrónico <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input id="email" class="form-control required" type="text" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="telefono" class="control-label">Teléfono / Celular <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input id="telefono" type="number" name="telefono" class="form-control" value="{{old('telefono')}}">
                            @if ($errors->has('telefono'))
                                <span class="help-block">
                                    {{ $errors->first('telefono') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('profesion') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="profesion" class="control-label">Profesión <span class="red-required">*</span></label>

                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input id="profesion" type="text" name="profesion" class="form-control" value="{{ old('profesion') }}">
                            @if ($errors->has('profesion'))
                                <span class="help-block">
                                    {{ $errors->first('profesion') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('uso') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="uso" class="control-label">Indica en que área se va a utilizar el sistema <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" name="uso" id="uso" value="{{ old('uso') }}">
                                <option value="">Seleccione una opción...</option>
                                <option value="Empresarial">Empresarial</option>
                                <option value="Institucional">Institucional</option>
                            </select>
                            @if ($errors->has('uso'))
                                <span class="help-block">
                                    {{ $errors->first('uso') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('nombre_empresa_institucion') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="nombre_empresa_institucion" class="control-label" >Nombre Empresa / Institución <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input id="nombre_empresa_institucion" type="text" name="nombre_empresa_institucion" class="form-control" value="{{ old('nombre_empresa_institucion') }}">
                            @if ($errors->has('nombre_empresa_institucion'))
                                <span class="help-block">
                                    {{ $errors->first('nombre_empresa_institucion') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="password" class="control-label">Contraseña <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input id="password" type="password" name="password" class="form-control">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="password_confirmation" class="control-label">Confirmar contraseña <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <p>
                                <small>Una vez diligenciado el formulario, dale clic a 'Guardar'.</small>
                            </p>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
