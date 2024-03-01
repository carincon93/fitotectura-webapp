@extends('layouts.app')

@section('title', 'Categorización')

@section('content')
    <section class="background-page main-content">
        <div class="{{ Auth::check() && Auth::user()->rol != 'administrador' ? 'container-fluid' : '' }}">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="content-desc">
                        <h1 class="text-center">Categorización</h1>
                        <p class="text-center">
                            {{-- <strong>Descripción</strong> Aqui podra ver los tipos de categorizaciones existentes (Infraestructura Vial, Infraestructura Construida, Espacio Público). --}}
                        </p>
                        <p class="text-center">
                            Por favor seleccione una opcion.
                        </p>
                        <div id="Infraestructuravialmodal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><strong>Infraestructura Vial</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>INFRAESTRUCTURA VIAL:</strong> conjunto de componentes físicos que interrelacionados entre sí de manera coherente y bajo cumplimiento de ciertas especificaciones técnicas de diseño y construcción, ofrecen condiciones cómodas y seguras para la circulación de los usuarios que hacen uso de ella.</p>
                                        <p><strong>SEPARADOR VIAL:</strong> se utilizan para dividir una calzada de gran magnitud de tamaño, y son pesados también se puede definir como el  aumento en la sección transversal de una calzada en las curvas, que nos servirían para asegurar espacios libres adecuados entre los vehículos que se cruzan en calzadas bidireccionales o unidireccionales, y entre el vehículo y el borde de la carretera. Los separadores viales anchos en algunas ocasiones sirven como zonas verdes ya que dentro del separador se pueden plantar algunas especies de plantas para dar un aspecto de armonía y aire puro.</p>
                                        <p><strong>ANDENES:</strong> Parte lateral de una calle o carretera destinada al paso de los peatones; sitio destinado para andar, a lo largo de una calle, un muelle, la vía de un ferrocarril, etc.</p>
                                        <p><strong>GLORIETAS-ROTONDAS:</strong> es un concepto que se emplea para nombrar a diferentes construcciones y estructuras de forma circular. ... Una rotonda, también conocida como redondel, óvalo o glorieta, es una intersección de carreteras (rutas), avenidas o calles.</p>
                                        <p><strong>PUENTES:</strong> es una construcción que permite salvar un accidente geográfico como un río, un cañón, un valle, una carretera, un camino, una vía férrea, un cuerpo de agua o cualquier otro obstáculo físico. El diseño de cada puente varía dependiendo de su función y de la naturaleza del terreno sobre el que se construye.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="Infraestructuraconstruidamodal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><strong>Infraestructura Construida</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>INFRAESTRUTURA CONSTRUIDA:</strong> una infraestructura alude a la parte construida, por debajo del suelo, en las edificaciones, como sostén de las mismas, aplicándose por extensión a todo lo que sirve de sustento o andamiaje para que se desarrolle una actividad o para que cumpla su objetivo una organización.</p>
                                        <p><strong>USO RESIDENCIAL:</strong> Edificio o establecimiento destinado a proporcionar alojamiento temporal, regentado por un titular de la actividad diferente del conjunto de los ocupantes y que puede disponer de servicios comunes, tales como limpieza, comedor, lavandería, locales para reuniones y espectáculos, deportes, etc.</p>
                                        <p><strong>USO INSTITUCIONAL: </strong> Lugares de uso para la educación, de las personas está relacionado con un organismo o fundación.</p>
                                        <p><strong>USO COMERCIAL:</strong> Es el que está destinado al transporte de personas o carga con fines comerciales o de lucro, o bien, a brindar servicio de seguridad pública, privada o de emergencia, incluyendo los vehículos con placas de Servicio Público Federal. Aplica para cualquier tonelaje; se dedica a la venta al detal, sin transformación del producto dentro del local, así como a todo tipo de servicios personales que se ofrezcan en establecimientos abiertos al público.</p>
                                        <p><strong>USO DE SERVICIOS PUBLICOS:</strong> conjunto de actividades y prestaciones permitidas, reservadas o exigidas a las administraciones públicas por la legislación en cada Estado, y que tienen como finalidad responder a diferentes imperativos del funcionamiento social, y, en última instancia, favorecer la realización efectiva de la igualdad y del bienestar social. Suelen tener carácter gratuito, ya que los costos corren a cargo del Estado.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="Espaciopublicomodal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><strong>Espacio Público</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>ESPACIOS URBANOS:</strong> es el espacio propio de una ciudad, esto es, de un agrupamiento poblacional de alta densidad. El mismo se caracteriza por tener una infraestructura como para que este elevado número de gente pueda desenvolverse armoniosamente en su vida cotidiana.</p>
                                        <p><strong>PARQUES:</strong> es un terreno situado en el interior de una población, que se destina a prados, jardines y arbolado sirviendo como lugar de esparcimiento y recreación de los ciudadanos, es de acceso público a sus visitantes y en general debe su diseño y mantenimiento a los poderes públicos, en general, municipales. Regularmente, este tipo de parque incluye en su mobiliario juegos, senderos, amplias zonas verdes, baños públicos, etc., dependiendo del presupuesto y las características naturales; aun así, pueden llegar a recibir millones de visitas anualmente.</p>
                                        <p><strong>PLAZOLETA:</strong> Una plaza o plazoleta es un espacio urbano público, amplio o pequeño y descubierto, en el que se suelen realizar gran variedad de actividades. Las hay de múltiples formas y tamaños, y construidas en todas las épocas, pero no hay ciudad en el mundo que no cuente con una. También son amplias zonas verdes. En las plazoletas al momento de plantar especies se deben tener en cuenta las siguientes características Árboles longevos, de especies adecuadas, que desarrollen un tronco único, que no presenten poda natural, con troncos que, en lo posible, no desarrollen tunas o púas, con látex o exudados tóxicos.</p>
                                        <p><strong>JARDIN:</strong> Un jardín es una zona del terreno donde se cultivan especies vegetales, con posible añadidura de otros elementos como fuentes o esculturas, para el placer de los sentidos. En castellano se llamaba antiguamente huerto de flor para distinguirlo del huerto donde se cultivan hortalizas. Un jardín puede incorporar tanto materiales naturales como hechos por el hombre. Los jardines occidentales están casi universalmente basados en las plantas.jardinería es el arte de crear estos espacios, y acompaña a la arquitectura, puesto que son un complemento de los edificios e, incluso, a menudo tienen construcciones en su diseño.</p>
                                        <p><strong>INSTALACIONES DEPORTIVAS:</strong> es un recinto o una construcción provista de los medios necesarios para el aprendizaje, la práctica y la competición de uno o más deportes. ... Las instalaciones deportivas se componen de uno o más espacios deportivos específicos para un tipo de deporte.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-filtros clearfix" data-color="#233142" data-background="i_vial" data-id="1">
                        <i class="fa fa-info-circle infoicon" data-toggle="modal" data-target="#Infraestructuravialmodal" data-placement="top" title="Ver Más"></i>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4>Infraestructura vial</h4>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding">
                            <div class="card-image">
                                <img src="{{ asset('images/infraestructura_vial.jpg') }}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="card-filtros clearfix" data-color="#4e4534" data-background="i_construida" data-id="2">
                        <i class="fa fa-info-circle infoicon" data-toggle="modal" data-target="#Infraestructuraconstruidamodal" data-placement="top" title="Ver Más"></i>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4>Infraestructura construida</h4>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding">
                            <div class="card-image">
                                <img src="{{ asset('images/infraestructura_construida.jpg') }}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="card-filtros clearfix" data-color="#2f1831" data-background="e_publico" data-id="3">
                        <i class="fa fa-info-circle infoicon" data-toggle="modal" data-target="#Espaciopublicomodal" data-placement="top" title="Ver Más"></i>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4>Espacio público</h4>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding">
                            <div class="card-image">
                                <img src="{{ asset('images/espacio_publico.jpg') }}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="card-filtros clearfix" data-color="#596109" data-background="p_riesgos" data-id="4">
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4>Prevención de riesgos</h4>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding">
                            <div class="card-image">
                                <img src="{{ asset('images/prevencion_de_riesgo.jpg') }}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="overlay">
        <div class="container padding-overlay">
            <header>
                <i class="fa fa-times close-overlay"></i>
                <div class="">
                    {{-- <img src="{{ asset('images/sennova-2.png') }}" alt="" class="logo- img-responsive"> --}}
                </div>
            </header>
            <div class="title-overlay">

            </div>
            <div class="links-overlay">
                <div class="row">
                    <div class="first-col col-md-4">
                        <ul class="list-unstyled"></ul>
                    </div>
                    <div class="second-col col-md-4">
                        <ul class="list-unstyled"></ul>
                    </div>
                    <div class="third-col col-md-4">
                        <ul class="list-unstyled"></ul>
                    </div>
                </div>
                <div class="row">
                    <div class="fourth-col col-md-4">
                        <ul class="list-unstyled"></ul>
                    </div>
                    <div class="fifth-col col-md-4">
                        <ul class="list-unstyled"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
