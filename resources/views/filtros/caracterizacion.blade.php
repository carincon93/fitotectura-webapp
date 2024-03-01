@extends('layouts.app')

@section('title', 'Caracterización')

@section('content')
    <section class="background-page main-content">
        <div class="{{ Auth::check() && Auth::user()->rol != 'administrador' ? 'container-fluid' : '' }}">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="content-desc">
                        <h1 class="text-center">Caracterización</h1>
                        <p class="text-center">
                            {{-- <strong>Descripción</strong> la caracterización es una fase descriptiva con fines de identificación, entre otros aspectos, de los componentes y acontecimientos. --}}
                        </p>
                        <p>
                            Por favor seleccione una opción.
                        </p>
                        <div id="climatologiamodal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><strong>Climatologia</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>La climatología es la ciencia o rama de la geografía y por ende de las ciencias de la Tierra que se ocupa del estudio del clima y sus variaciones a lo largo del tiempo cronológico. A continuación se explicara las sub-categorías de Climatología </p>
                                        <p><strong>Ambiente: </strong> Atmósfera o aire que se respira o rodea a los seres vivos y plantas. </p>
                                        <p><strong>Húmedo tropical:</strong> Los bosques húmedos tropicales son extensiones de tierra cubierta de densa vegetación circundante a la región ecuatorial a nivel global, es decir, poseen representatividad a nivel mundial, tanto en el Hemisferio Norte como el Sur, pero siempre circunscritos a la línea ecuatorial y unos cuántos paralelos tanto al Norte como Sur de ésta. </p>
                                        <p><strong>Seco tropical:</strong> Los bosques secos tropicales se encuentran, por lo general, en zonas bajas y cálidas, pero también a mayores alturas. En estos bosques las épocas secas se prolongan durante varios meses del año, en los cuales el sol arde constantemente y hay una gran escasez de agua. Aquí las lluvias se presentan durante temporadas cortas, tiempo en que algunos bosques se inundan por las crecientes de los ríos. En los bosques muy secos, las temporadas de sequía son más prolongadas, las lluvias son más escasas y rara vez se inundan. Allí predominan los cactus, las brómelas espinosas y las plantas de tallos y hojas suculentas. </p>
                                        <p><strong>Selva premontana:</strong> El bosque <strong>premontano</strong> o <strong>selva</strong> montana tiene un clima tropical de altitud que es equiparable al clima subtropical en cuanto a su temperatura (media anual de 18 a 24ºC) pero más lluvioso, con una pluviosidad similar a la selva tropical </p>
                                        <p><strong>Clima:</strong> Conjunto de condiciones atmosféricas propias de un lugar, constituido por la cantidad y frecuencia de lluvias, la humedad, la temperatura, los vientos, etc., y cuya acción compleja influye en la existencia de los seres sometidos a ella.</p>
                                        <p><strong>Clima frío:</strong> Frío, del latín o mejor dicho ausencia de calor se define según la RAE como aquel cuerpo que tiene una temperatura muy inferior a la ordinaria del ambiente.  Se define como una propiedad adjetiva de un cuerpo, sin aportar una definición del sustantivo. El frío, en sí, es una temperatura baja (o la ausencia de una temperatura elevada), tratándose por lo tanto de una consecuencia del calor, y no de un fenómeno independiente.</p>
                                        <p><strong>Clima templado:</strong> El <strong>clima templado</strong> es un tipo de clima que se caracteriza por temperaturas medias anuales de alrededor de 15 °C y precipitaciones medias entre 1000 mm y 2000 mm anuales.</p>
                                        <p><strong>Clima cálido:</strong> El <strong>clima cálido</strong> presenta elevadas temperaturas anuales, sin grandes variaciones estacionales. Predominio de bosques tropicales, selvas y sabanas (praderas de pastos altos con algunas especies arbóreas y arbustos aislados o que forman pequeños grupos). </p>
                                        <p><strong>Viento:</strong> Corriente de aire que se produce en la atmósfera al variar la presión.</p>
                                        <p><strong>Viento alto:</strong> Es aquel que corre con más fuerza o con otra dirección a cierta altura. </p>
                                        <p><strong>Viento medio:</strong> Es una corriente de aire que se produce con una fuerza media por causas naturales. </p>
                                        <p><strong>Viento bajo:</strong> Es una corriente de aire muy baja por causas naturales. </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="suelomodal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><strong>Suelo</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Suelo:</strong> Superficie de la corteza terrestre.</p>
                                        <p><strong>Naturaleza de suelo:</strong> La clase de suelo con que se interactúa influye de manera decisiva en el proceso de compactación. Las técnicas se emplean y los resultados que se obtengan se diferencian precisamente en el tipo de suelo empleado.</p>
                                        <p><strong>Suelo ácido:</strong> Los <strong>suelos sulfúricos ácidos</strong> (SSA) son suelos que existen en la naturaleza, sedimentos o substratos orgánicos (por ejemplo turba) que se forman bajo condiciones de inundación. Estos suelos contienen minerales de sulfuros de hierro (predominantemente del mineral pirita) o sus productos de oxidación. En estado no alterado por debajo de la tabla de agua, los suelos sulfatados ácidos son benignos. Sin embargo, si los suelos se drenan, se excavan o se exponen al aire por desplazamiento hacia abajo de la tabla de agua, los sulfuros reaccionarán con el oxígeno para formar ácido sulfúrico, el suelo es tratado totalmente.</p>
                                        <p><strong>Suelo medio:</strong> es aquel que está compuesto de materiales, minerales, materiales meteorizados, materia orgánica aire y agua, el suelo es tratado medianamente. </p>
                                        <p><strong>Suelo medio acido:</strong> los suelos medio ácidos tienen deficiencias de fosforo y magnesio estas se miden en unidades de pH en una escala de 1 a 14.
                                        </p>
                                        <p><strong>Textura del suelo:</strong> La textura indica el contenido relativo de partículas de diferente tamaño, como la arena, el limo y la arcilla, en el suelo. La textura tiene que ver con la facilidad con que se puede trabajar el suelo, la cantidad de agua y aire que retiene y la velocidad con que el agua penetra en el suelo y lo atraviesa.</p>
                                        <p><strong>Suelo textura franco:</strong> Tienen abundante materia orgánica en descomposición, de color oscuro, retienen bien el agua y son excelentes para el cultivo.</p>
                                        <p><strong>Suelo textura arenosa:</strong> No retienen el agua, tienen muy poca materia orgánica y no son aptos para la agricultura.</p>
                                        <p><strong>Suelo textura arcillosa:</strong> Están formados por granos finos de color amarillento y retienen el agua formando charcos. Si se mezclan con humus pueden ser buenos para cultivar.</p>
                                        <p><strong>Materia orgánica:</strong> La materia orgánica por lo general está más elevada en los suelos, no sólo existe una mayor fertilidad y estabilidad de los suelos orgánicos sino también una capacidad de retención de humedad más elevada, que reduce el riesgo de erosión y desertización.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="fisiologiamodal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><strong>Fisiologia</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Fisiología:</strong> La fisiología vegetal es la subdisciplina de la botánica dedicada al estudio de los procesos metabólicos.</p>
                                        <p>El campo de trabajo de esta disciplina está estrechamente relacionado con la anatomía de las plantas, la ecología (interacciones con el medio ambiente), la fitoquímica (bioquímica de las plantas), la biología celular y la biología molecular.</p>
                                        <p><strong>Crecimiento:</strong> la germinación es el conjunto de fenómenos que ocurren cuando el embrión contenido de la semillas pasa a la vida latente a la vida activa. Ocurre cuando las reservas nutritivas son movilizadas por la acción de las diastatas, al ser puesta la semilla en condiciones de temperatura y humedad adecuadas.</p>
                                        <p><strong>Longevidad:</strong> Larga duración de la vida.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-filtros clearfix" data-color="#6b7531" data-background="climatologia" data-id="5">
                        <i class="fa fa-info-circle infoicon" data-toggle="modal" data-target="#climatologiamodal" data-placement="top" title="Ver Más"></i>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4>Climatología</h4>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding">
                            <div class="card-image">
                                <img src="{{ asset('images/climatologia.jpg') }}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="card-filtros clearfix" data-color="#6b7531" data-background="suelo" data-id="6">
                        <i class="fa fa-info-circle infoicon" data-toggle="modal" data-target="#suelomodal" data-placement="top" title="Ver Más"></i>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4>Suelo</h4>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding">
                            <div class="card-image">
                                <img src="{{ asset('images/suelo.jpg') }}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="card-filtros clearfix" data-color="#6b7531" data-background="fisiologia" data-id="7">
                        <i class="fa fa-info-circle infoicon" data-toggle="modal" data-target="#fisiologiamodal" data-placement="top" title="Ver Más"></i>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4>Fisiología</h4>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding">
                            <div class="card-image">
                                <img src="{{ asset('images/fisiologia.jpg') }}" alt="" class="img-responsive">
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
                </div>
            </div>
        </div>
    </div>
@endsection
