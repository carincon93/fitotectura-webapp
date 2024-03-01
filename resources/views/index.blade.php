<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="application-name" content="Matriz de fitotectura">
    <meta name="author" content="SENNOVA">
    <meta name="description" content="Conoce que vegetación es adecuada para incluir en proyectos urbanísticos y/o arquitectónicos">
    <meta name="keywords" content="matriz, fitotectura, sennova, sena, consulta de plantas, vegetación, arquitectura, urbanismo, colombia, manizales">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-ic"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Matriz de fitotectura</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div id="app">
        <nav class="header bg-header transparent-light " data-pages="header" data-pages-header="autoresize" data-pages-resize-class="green">
            <div class="container relative">

                <div class="pull-left">

                    <div class="header-inner">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/sennova-2.png') }}" width="152" height="29.17" class="welcome-logo-sennova" alt="logo-sennova">
                            <img src="{{ asset('images/logo-project-blanco.png') }}" width="104" height="62" class="welcome-logo-matriz" alt="logo-matriz">
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
                                    <a href="{{ url('/buscar_plantas') }}">Buscar plantas</a>
                                </li>
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
                                        <a href="#" class="nombre-usuario dropdown-toggle text-center name-user name-user-w" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->nombre_completo }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            @if( Auth::check() && Auth::user()->rol == 'administrador' )
                                                <li>
                                                    <a href="{{ url('admin/dashboard') }}">Panel de administración</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('admin/editar_perfil') }}">Editar perfil</a>
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
    <div id="owl-one" class="owl-carousel full-viewport welcome-slider jumbotron no-margin no-padding">
        <div class="align-center slider-item-1">
            <div class="container text-slider animated fadeInDown" data-animation="animated fadeInDown">
                <h1 class="display-1 padding-right-welcome">Integra vegetación de forma adecuada a tus proyectos urbanísticos y arquitectónicos</h1>
                {{-- <p class="padding-right-welcome">
                    Nuestro sistema cuenta con 200 tipos de plantas de la región de Caldas plenamente identificadas, y pronto incluir vegetación del resto del país.
                </p> --}}
                <p class="padding-right-welcome">
                    Nuesto sistema tiene identificados 200 tipos de plantas de la región de Caldas, y pronto incluirá vegetación del resto de las regiones del país.
                </p>
                <a href="{{ url('buscar_plantas') }}" class="btn btn-default btn-jumbotron">Empezar la búsqueda</a>
            </div>
            {{-- <div class="slider-overlay"></div> --}}
        </div>
    </div>
    <main>
        <div class="container">
            <h1 class="display-2 text-center"><strong>Matriz de fitotectura</strong></h1>
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center">Más de 20 categorías de búsqueda</h3>
                    <p class="text-center">
                        Nuestro sistema de búsqueda cuenta con diferentes categorías y filtros
                        que permiten identificar el tipo de vegetación acorde a la necesidad de tu proyecto.
                    </p>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center">200 tipos de plantas</h3>
                    <p class="text-center">
                        La matriz de fitotectura cuenta con 200 tipos de plantas plenamente identificadas.
                    </p>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center">Fichas técnicas</h3>
                    <p class="text-center">
                        Descarga la ficha técnica de la planta en tu ordenador o móvil, así siempre la tendrás diponible para ser consultada
                        y aplicada en tus proyectos.
                    </p>
                </div>
            </div>
        </div>
    </main>
    <section class="colaboradores">
        <h3 class="text-center section-title">Colaboradores</h3>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2 logo-mobile">
                    <img src="{{ asset('images/sennova-logo.png') }}" alt="" class="img-responsive center-block">
                </div>
                <div class="col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2 logo-mobile">
                    <img src="{{ asset('images/cpic-logo-gris.png') }}" alt="" class="img-responsive center-block">
                </div>
                <div class="col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <img src="{{ asset('images/tecnoparque-logo-gris.png') }}" alt="" class="img-responsive center-block">
                </div>
            </div>
        </div>
    </section>
    <section class="semilleros">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <h3 class="text-center section-title">Grupo de investigación</h3>
                    <img src="{{ asset('images/grindda-logo.png') }}" alt="" class="img-responsive center-block">
                </div>
                <div class="col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <h3 class="text-center section-title">Semilleros SENNOVA</h3>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-8 col-xs-offset-2 logo-mobile">
                            <img src="{{ asset('images/sediex-logo.png') }}" alt="" class="img-responsive center-block">
                        </div>
                        <div class="col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-8 col-xs-offset-2 logo-mobile">
                            <img src="{{ asset('images/levelup-logo.png') }}" alt="" class="img-responsive center-block">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<footer class="footer-pages">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 logo-footer-mobile">
                <img src="{{ asset('images/logo-project-footer.png')}}" alt="" class="img-responsive">
            </div>
            <div class="col-sm-3 list-footer-mobile">
                <h4>Información</h4>
                <ul class="list-unstyled">
                    <li>Kilómetro 10 Vía al Magdalena</li>
                    <li>SENA Regional Caldas</li>
                    <li>SENNOVA - GRINDDA-CPIC</li>
                    {{-- <li>Manizales, Colombia</li> --}}
                </ul>
            </div>
            <div class="col-sm-3 list-footer-mobile">
                <h4>Contácto</h4>
                <ul class="list-unstyled">
                    <li><a href="tel:8748444">Línea Manizales: (6) 874 8444 Ext. 62441</a></li>
                    <li><a href="mailto:administracion@grindda.com">administracion@grindda.com</a></li>
                </ul>
            </div>
            <div class="col-sm-2 list-footer-mobile">
                <h4>Páginas del sitio</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ url('buscar_plantas') }}">Buscar plantas</a></li>
                    <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                </ul>
            </div>
        </div>
        <div class="text-footer">
            <p class="small-text muted">
                &copy; <span class="company">SENNOVA</span> {{ date('Y') }}
            </p>
            <div class="col-md-8">
                <p class="footer-desc">
                    <a href="{{ route('politicas') }}"><strong>Política de privacidad</strong></a>
                </p>
            </div>
        </div>
    </div>
</footer>
@if ($errors->has('token_error'))
    <!-- Modal -->
    <div class="modal fade" id="modalSession" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Sesión expirada</h4>
                </div>
                <div class="modal-body">
                    {{ $errors->first('token_error') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">
                        <a href="{{ url('/') }}">Volver a la página principal</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

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
<script type="text/javascript">
/**
* @description Modal sesión expirada
* Activa el modal en la página inicial cuando la sesión ha caducado
*/
$(window).on('load', function () {
    $('#modalSession').modal({ backdrop: 'static', keyboard: false });
});

$(document).ready(function() {
    $("#owl-two").owlCarousel(
        {
            margin: 100,
            responsiveClass:true,
            autoplay: true,
            autoplayTimeout: 6000,
            loop:true,
            responsive:{
                0:{
                    items:2,
                    nav:false,
                    margin: 20,
                    dots: true
                },
                600:{
                    items:3,
                    nav:false,
                    dots: true
                },
                1000:{
                    items:4,
                    nav:false,
                    // mouseDrag: false,
                }
            }
        }
    );
    var owl = $("#owl-one").owlCarousel(
        {
            loop:true,
            responsiveClass:true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            // onInitialized: function() {
            //     $('video').get(0).play();
            // },
            responsive:{
                0:{
                    items:1,
                    nav:false,
                    dots: true
                },
                600:{
                    items:1,
                    nav:false,
                    dots: true
                },
                1000:{
                    items:1,
                    nav:true,
                    mouseDrag: false,
                    loop:false
                }
            }
        }
    );

    // $(window).on('load', function(event) {
    //     event.preventDefault();
    //     $('.owl-item.active').find('video').get(0).play();
    // });

    $('.owl-prev').on('click', function(event) {
        event.preventDefault();
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        var $t = $('.text-slider').attr('data-animation');
        // $('.text-slider').addClass($t);

        $('.text-slider').addClass($t);
        setTimeout(function() {
            $('.text-slider').removeClass($t);
        }, 900);
        // $('.text-slider').removeClass($t);

        owl.trigger('prev.owl.carousel', [300]);
    });

    $('.owl-next').on('click', function(event) {
        event.preventDefault();
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        var $t = $('.text-slider').attr('data-animation');
        // $('.text-slider').addClass($t);

        $('.text-slider').addClass($t);
        setTimeout(function() {
            $('.text-slider').removeClass($t);
        }, 900);
        // $('.text-slider').removeClass($t);

        owl.trigger('next.owl.carousel', [300]);
    });
});
</script>
</body>
</html>
