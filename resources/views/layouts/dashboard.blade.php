<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('scripts-head')
</head>
<body class="{{ Auth::check() ? 'body-admin' : ''}}">
    <div id="app" class="{{Auth::check() && Auth::user()->rol == 'administrador' ? 'padding-check' : ''}}">
        <nav class="navbar navbar-default navbar-fixed-top navbar-dashboard">
            <div class="{{Auth::check() && Auth::user()->rol == 'administrador' ? 'container-fluid' : 'container'}} navbar-dashboard-container">
                <div class="row">
                    <div class="col-sm-4 col-md-6 no-padding">
                        <div class="visible-sm-inline visible-xs-inline menu-toggler pull-left" data-pages="header-toggle" data-pages-element="#header">
                            {{-- <div class="one"></div>
                            <div class="two"></div>
                            <div class="three"></div> --}}
                            <i class="fa fa-fw fa-bars fa-2x"></i>
                        </div>
                        <!-- Branding Image -->
                        <div class="project-brand">
                            <span class="">
                                <img src="{{ asset('images/logo-project.png') }}" alt="" class="img-responsive">
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-6">
                    </div>
                </div>

            </div>
        </nav>
        @if (Auth::check() && Auth::user()->rol == 'administrador')
            <div class="menu-content pull-left clearfix" data-pages-direction="slideLeft" id="sidebar">

                <div class="push-left">
                    <a href="#" class="visible-xs-inline visible-sm-inline pull-right margin-close" data-pages="sidebar-toggle" data-pages-element="#sidebar">
                        <i class="fa fa-fw fa-close"></i>
                    </a>
                </div>


                <div class="header-inner">
                    <ul class="menu">
                        <li class="dropdown user-container">
                            <div class="">
                                <span class="foto-perfil-dashboard center-block">
                                    <img src="{{ asset('images/foto-default.png') }}" alt="" class="img-responsive">
                                </span>
                                <a href="#" class="nombre-usuario btn btn-success dropdown-toggle center-block text-center" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombre_completo }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('admin/dashboard') }}">Panel de administración</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/editar_perfil') }}">Editar perfil</a>
                                    </li>
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
                        <li class="sidebar-title">Administración</li>
                        <li>
                            <a href="{{ url('/admin/dashboard') }}">Inicio</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/fichas_tecnicas') }}">
                                Fichas técnicas
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/administradores') }}">
                                Administradores
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/usuarios') }}">
                                Usuarios
                            </a>
                        </li>
                        <li class="sidebar-title">Páginas del sitio</li>
                        <li>
                            <a href="{{ url('/') }}">
                                Página principal
                            </a>
                        </li>
                        <li><!-- Link with dropdown items -->
                            <a href="#dashboardSubmenu" data-toggle="collapse" aria-expanded="false">Filtros de búsqueda<span class="caret"></span></a>
                            <ul class="collapse list-unstyled" id="dashboardSubmenu">
                                <li><a href="{{ url('buscar_plantas') }}">Página inicial de búsqueda</a></li>
                                <li><a href="{{ url('buscar_plantas/categorizacion') }}">Categorización</a></li>
                                <li><a href="{{ url('buscar_plantas/caracterizacion') }}">Caracterización</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
        <section class="container-fluid dashboard-content">
            @yield('content')
        </section>
    </div>
    <div class="container-fluid footer {{ Auth::user()->rol != 'administrador'  ? '' : 'footer-dashboard' }}">
        <div class="copyright sm-text-center clearfix">
            <p class="copyright-text small no-margin pull-left col-md-6 col-sm-6 col-xs-12">
                <span class="hint-text">Derechos de autor &copy; {{ date('Y') }} </span>
                <span class="company">SENNOVA</span>.
                <span class="hint-text">Todos los derechos reservados. </span>
                {{-- <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span> --}}
            </p>
            <p class="developed small no-margin pull-right col-md-6 col-sm-6 col-xs-12 text-right">
                Desarrollado por <i class="fa fa-fw fa-code"></i> ADSI Squad
            </p>
        </div>
    </div>

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
