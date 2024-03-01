@extends('layouts.app-login')

@section('title', 'Iniciar sesión')

@section('content')
<section class="background-page">
    <div class="container">
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
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Dirección de correo electrónico" required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group clearfix">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Permanecer con la sesión iniciada
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a class="btn-link" href="{{ route('password.request') }}">
                                    ¿Has olvidado la contraseña?
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Iniciar sesión
                        </button>
                    </div>
                </form>
                ¿Todavía no eres miembro?
                <div>
                    <a class="" href="{{ route('register') }}">Obtener una cuenta</a>
                </div>
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
