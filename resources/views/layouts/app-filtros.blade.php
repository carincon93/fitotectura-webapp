<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" >
    <meta name="keywords" content="fitotectura, sennova, sena, consulta de plantas" >

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div id="app" class="pos-r">
        <nav class="header green-navbar" data-pages="header" data-pages-header="autoresize" data-pages-resize-class="green">
            <div class="container relative">

                <div class="pull-left">

                    <div class="header-inner align-center">
                        {{-- <a href="{{ url('buscar_plantas') }}"><i class="fa fa-fw fa-chevron-left"></i> Volver atrás</a> --}}
                        <a href="{{ url('/') }}" class="project-brand">
                            <img src="{{ asset('images/logo-project.png') }}" alt="matriz_fitotectura" class="img-responsive">
                        </a>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="header-inner">
                        <a href="#" data-toggle="search" class="search-toggle visible-sm-inline visible-xs-inline p-r-10"><i class="fs-14 pg-search"></i></a>
                        <div class="visible-sm-inline visible-xs-inline menu-toggler pull-right p-l-10" data-pages="header-toggle" data-pages-element="#header">
                            <div class="one"></div>
                            <div class="two"></div>
                            <div class="three"></div>
                        </div>
                    </div>
                </div>

                <div class="menu-content mobile-dark pull-right clearfix" data-pages-direction="slideRight" id="header">

                    <div class="pull-right">
                        <a href="#" class="visible-xs-inline visible-sm-inline pull-right margin-close" data-pages="header-toggle" data-pages-element="#header">
                            <i class="fa fa-fw fa-close"></i>
                        </a>
                    </div>


                    <div class="header-inner">
                        <ul class="menu">
                            <li>
                                <a href="{{ url('/') }}">Inicio</a>
                            </li>
                            @if (Auth::check())
                                <li>
                                    <a href="{{ url('buscar_plantas') }}">Buscar plantas</a>
                                </li>
                                <!-- Link with dropdown items -->
                                {{-- <li>
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Buscar plantas <span class="caret"></span></a>
                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                        <li><a href="{{ url('categorizacion') }}">Categorización</a></li>
                                        <li><a href="{{ url('caracterizacion') }}">Caracterización</a></li>
                                    </ul>
                                </li> --}}
                            @endif
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                                <li class="registrarse"><a href="{{ route('register') }}">Registrarse</a></li>
                            @else
                                <li class="dropdown">
                                    <div class="perfil">
                                        <span class="foto-perfil center-block">
                                            <img src="{{ asset('images/foto-default.png') }}" alt="" class="img-responsive">
                                        </span>
                                        <a href="#" class="nombre-usuario dropdown-toggle text-center name-user" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->nombre_completo }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            @if( Auth::check() && Auth::user()->rol == 'administrador' )
                                                <li>
                                                    <a href="{{ url('admin/dashboard') }}">Panel de administración</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('user/editar_perfil') }}">Editar perfil</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ url('user/perfil_usuario') }}">Editar perfil</a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    Cerrar sesión
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                        </ul>

                        <div class="visible-sm visible-xs copyright-sidebar">
                            {{-- <p class="small-text"></p> --}}
                            <p class="small-text muted">&copy; {{ date('Y') }} <span class="company">SENNOVA</span></p>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
        <section class="background-page main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
    </div>
    @yield('footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/velocity.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/velocity.ui.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/custom.js') }}" charset="utf-8"></script>
    @stack('scripts')
</body>
</html>
