@extends('layouts.dashboard')

@section('title', 'Editar usuario')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h3>Editar usuario</h3>
            <form action="{{url('admin/usuarios/'.$user->id)}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <input id="id" type="hidden" name="id" class="form-control"  value="{{ Auth::user()->id }}">

                <div class="form-group{{ $errors->has('nombre_completo') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="nombre_completo" class="control-label">Nombre completo <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input id="nombre_completo" type="text" name="nombre_completo" class="form-control"  value="{{$user->nombre_completo}}">
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
                            <input id="email" type="text" name="email" class="form-control" value="{{$user->email}}">
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
                            <input id="telefono" type="number" name="telefono" class="form-control" value="{{$user->telefono}}">
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
                            <input id="profesion" type="text" name="profesion" class="form-control" value="{{$user->profesion}}">
                            @if ($errors->has('profesion'))
                                <span class="help-block">
                                    {{ $errors->first('profesion') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('profesion') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="uso" class="control-label">Indica en que área se va a utilizar el sistema <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" name="uso" id="uso" value="{{ old('uso') }}">
                                <option value="Empresarial" {{ $user->uso == 'Empresarial' ? 'selected="selected"' : '' }}>Empresarial</option>
                                <option value="Institucional" {{ $user->uso == 'Institucional' ? 'selected="selected"' : '' }}>Institucional</option>
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
                            <label for="nombre_empresa_institucion" class="control-label">Nombre Empresa / Institucion <span class="red-required">*</span></label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <input id="nombre_empresa_institucion" type="text" name="nombre_empresa_institucion" class="form-control" value="{{$user->nombre_empresa_institucion}}">
                            @if ($errors->has('nombre_empresa_institucion'))
                                <span class="help-block">
                                    {{ $errors->first('nombre_empresa_institucion') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="rol" class="control-label">Seleccione el rol del usuario</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" name="rol" id="rol" value="{{ old('rol') }}">
                                <option value="administrador" {{ $user->rol == 'administrador' ? 'selected="selected"' : '' }}>Administrador</option>
                                <option value="cliente" {{ $user->rol == 'cliente' ? 'selected="selected"' : ''}}>Usuario</option>
                            </select>
                            @if ($errors->has('rol'))
                                <span class="help-block">
                                    {{ $errors->first('rol') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <p>
                                <small>Una vez diligenciado el formulario, dale clic a 'Guardar cambios'.</small>
                            </p>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <button class="btn btn-success" type="submit">
                                Guardar cambios
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
