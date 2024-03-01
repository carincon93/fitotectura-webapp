@extends('layouts.app-login')

@section('title', 'Restablecer contraseña')

@section('content')
<section class="background-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

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
                <div>
                    <h3>¿Has olvidado la contraseña?</h3>
                </div>


                <form method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Dirección de correo electrónico" required>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Siguiente
                        </button>
                    </div>
                </form>
                <a class="btn-link" href="{{ route('login') }}">Volver al inicio de sesión</a>
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
