@extends('layouts.app-login')

@section('title', 'Restablecer contraseña')

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
                <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{$token}}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Dirección de correo electrónico" required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>

                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Restablecer contraseña
                        </button>
                    </div>
                </form>
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
