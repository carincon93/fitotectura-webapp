@extends('layouts.app-login')

@section('title', 'Registrarse')

@section('content')
<section class="background-page">

    <div class="container register-container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
                <div class="login-heading">
                    <div class="row align-center">
                        <div class="col-md-6 col-xs-6">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('images/sennova.png') }}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('images/logo-project-footer.png') }}" alt="" class="img-responsive auth-logo">
                            </a>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('nombre_completo') ? ' has-error' : '' }}">

                        <input id="nombre_completo" type="text" class="form-control" name="nombre_completo" value="{{ old('nombre_completo') }}" placeholder="Nombre completo *" required autofocus>

                        @if ($errors->has('nombre_completo'))
                        <span class="help-block">
                            {{ $errors->first('nombre_completo') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Dirección de correo electrónico *" required>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                        <input id="telefono" type="number" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono / Celular *" required>

                        @if ($errors->has('telefono'))
                        <span class="help-block">
                            {{ $errors->first('telefono') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('profesion') ? ' has-error' : '' }}">
                        <input id="profesion" type="text" class="form-control" name="profesion" value="{{ old('profesion') }}" placeholder="Profesión *" required>
                        @if ($errors->has('profesion'))
                        <span class="help-block">
                            {{ $errors->first('profesion') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('uso') ? ' has-error' : '' }}">
                        <label for="uso" class="control-label">Indica en que área se va a utilizar el sistema <span class="red-required">*</span></label>
                        <select class="form-control" name="uso" id="uso">
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

                    <div class="form-group{{ $errors->has('nombre_empresa_institucion') ? ' has-error' : '' }}">
                        <input id="nombre_empresa_institucion" type="text" class="form-control" name="nombre_empresa_institucion" value="{{ old('nombre_empresa_institucion') }}" placeholder="Nombre de la Empresa o Institución *" required>
                        @if ($errors->has('nombre_empresa_institucion'))
                        <span class="help-block">
                            {{ $errors->first('nombre_empresa_institucion') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña *" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña *" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Registrarse
                        </button>
                    </div>
                </form>
                ¿Ya dispones de una cuenta? <a class="btn-link" href="{{ route('login') }}">Inicia sesión</a>
            </div>
        </div>
    </div>
    <div class="mini-footer">
        <div class="container">
            <div class="col-md-4 col-md-offset-4">

            </div>
        </div>
    </div>
</section>
@endsection
