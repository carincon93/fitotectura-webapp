@extends('layouts.dashboard')

@section('title', 'Mi perfil')

@section('content')
    <div class="page-padding">
        <div class="messages-change-pwd">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('failure'))
                <div class="alert alert-danger">{{ Session::get('failure') }}</div>
            @endif
        </div>
        <div class="page-header">
            <h4>Editar perfil</h4>
            <p><strong>Descripción</strong> Diligencie los datos que desea actualizar.</p>
        </div>
        @include('layouts.messages')
        <div class="row">
            <div class="col-md-3 edit-options">
                <div class="sidebar-editar-perfil">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"  class="{{ !$errors->has('password') && !Session::has('failure') ? ' active' : '' }}"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Editar perfil</a></li>
                        <li role="presentation" class="{{ $errors->has('password') || Session::has('failure') ? ' active' : '' }}"><a href="#contrasena" aria-controls="contrasena" role="tab" data-toggle="tab">Cambiar contraseña</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane {{ !$errors->has('password') && !Session::has('failure') ? ' active' : '' }}" id="profile">
                        <form action="{{ url( 'dashboard/usuario/' . Auth::user()->id) }}" method="POST" id="editar_perfil">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <input id="id" type="hidden" name="id" class="form-control"  value="{{ Auth::user()->id }}">

                            <div class="form-group{{ $errors->has('nombre_completo') ? ' has-error' : '' }}">
                                <label for="nombre_completo" class="control-label">Nombre completo <span class="red-required">*</span></label>
                                <input id="nombre_completo" type="text" name="nombre_completo" class="form-control"  value="{{ Auth::user()->nombre_completo }}">
                                @if ($errors->has('nombre_completo'))
                                    <span class="help-block">
                                        {{ $errors->first('nombre_completo') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">Dirección de correo electrónico <span class="red-required">*</span></label>
                                <input id="email" type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="telefono" class="control-label">Teléfono / Celular <span class="red-required">*</span></label>

                                <input id="telefono" type="number" name="telefono" class="form-control" value="{{ Auth::user()->telefono }}">
                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        {{ $errors->first('telefono') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('profesion') ? ' has-error' : '' }}">
                                <label for="profesion" class="control-label">Profesión <span class="red-required">*</span></label>
                                <input id="profesion" type="text" name="profesion" class="form-control" value="{{ Auth::user()->profesion }}">
                                @if ($errors->has('profesion'))
                                    <span class="help-block">
                                        {{ $errors->first('profesion') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('profesion') ? ' has-error' : '' }}">
                                <label for="uso" class="control-label">Indica en que área se va a utilizar el sistema <span class="red-required">*</span></label>
                                <select class="form-control" name="uso" id="uso" value="{{ old('uso') }}">
                                    <option value="Empresarial" {{ Auth::user()->uso == 'Empresarial' ? 'selected="selected"' : '' }}>Empresarial</option>
                                    <option value="Institucional" {{ Auth::user()->uso == 'Institucional' ? 'selected="selected"' : '' }}>Institucional</option>
                                </select>

                                @if ($errors->has('uso'))
                                    <span class="help-block">
                                        {{ $errors->first('uso') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('nombre_empresa_institucion') ? ' has-error' : '' }}">
                                <label for="nombre_empresa_institucion" class="control-label">Nombre Empresa / Institución <span class="red-required">*</span></label>
                                <input id="nombre_empresa_institucion" type="text" name="nombre_empresa_institucion" class="form-control" value="{{ Auth::user()->nombre_empresa_institucion }}">
                                @if ($errors->has('nombre_empresa_institucion'))
                                    <span class="help-block">
                                        {{ $errors->first('nombre_empresa_institucion') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    Guardar cambios
                                </button>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane {{ $errors->has('password') || Session::has('failure') ? ' active' : '' }}" id="contrasena">
                        <form action="{{ url('dashboard/usuario/cambiar_contrasena') }}" method="POST" role="form">
                            {{csrf_field()}}

                            <div class="form-group{{ $errors->has('old') || Session::has('failure') ? ' has-error' : '' }}">
                                <label for="old-password" class="control-label">Contraseña actual *</label>

                                <input id="old-password" type="password" class="form-control" name="old">

                                @if ($errors->has('old') || Session::has('failure'))
                                    <span class="help-block">
                                        {{ Session::has('failure') ? 'La contraseña actual no es correcta' : '' }}
                                        {{ $errors->first('old') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Nueva contraseña *</label>

                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="control-label">Confirmar contraseña *</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        {{ $errors->first('password_confirmation') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Cambiar contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
