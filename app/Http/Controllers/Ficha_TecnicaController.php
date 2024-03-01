<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\FichaTecnicaRequest;
use App\Mail\NotificacionNuevaPlanta;

use App\Ficha_Tecnica;
use App\Flor;
use App\Fruto;
use App\Hoja;
use App\Expresion_Vegetal;
use App\Mantenimiento;
use App\Suelo;
use App\Fisiologia;
use App\Climatologia;
use App\Prevencion_De_Riesgo;
use App\Infraestructura_Vial;
use App\Espacio_Publico;
use App\Uso_Residencial;
use App\Uso_Institucional;
use App\Uso_De_Servicio_Publico;
use App\Uso_Comercial;


class Ficha_TecnicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $ficha_tecnica = Ficha_Tecnica::all();
        return view('dashboard.ficha_tecnica.index')->with('ficha_tecnica', $ficha_tecnica);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('dashboard.ficha_tecnica.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(FichaTecnicaRequest $request)
    {
        $ficha_tecnica = new Ficha_Tecnica();

        if ( $request->hasFile('ficha_tecnica') ) {
            $path   = Storage::disk('local')->putFile(
                'fichas_tecnicas', $request->file('ficha_tecnica')
            );
            $ficha_tecnica->ficha_tecnica = $path;
        }

        $ficha_tecnica->nombre                = $request->nombre;
        $ficha_tecnica->nombre_cientifico     = $request->nombre_cientifico;
        $ficha_tecnica->familia               = $request->familia;
        $ficha_tecnica->origen                = $request->origen;
        $ficha_tecnica->propagacion           = $request->propagacion;
        $ficha_tecnica->altitud_siembra       = $request->altitud_siembra;
        $ficha_tecnica->descripcion           = $request->descripcion;

        if ( $request->hasFile('foto') ) {

            $path   = Storage::putFile(
                'public/plantas', $request->file('foto')
            );
            $ficha_tecnica->foto = $path;
        }

        if ( $request->hasFile('detalle_flor') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_flor')
            );
            $ficha_tecnica->detalle_flor = $path;
        }

        if ( $request->hasFile('detalle_hoja') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_hoja')
            );
            $ficha_tecnica->detalle_hoja = $path;
        }

        if ( $request->hasFile('detalle_tronco') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_tronco')
            );
            $ficha_tecnica->detalle_tronco = $path;
        }

        if ( $request->hasFile('detalle_fruto') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_fruto')
            );
            $ficha_tecnica->detalle_fruto = $path;
        }

        if ( $request->hasFile('detalle_tallo') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_tallo')
            );
            $ficha_tecnica->detalle_tallo = $path;
        }

        $ficha_tecnica->caracteristica = $request->caracteristica;


        /**
        * Guardar Comportamiento fisionómico
        */
        $flor = new Flor();
        $flor->flor_enero       = $request->flor_enero;
        $flor->flor_febrero     = $request->flor_febrero;
        $flor->flor_marzo       = $request->flor_marzo;
        $flor->flor_abril       = $request->flor_abril;
        $flor->flor_mayo        = $request->flor_mayo;
        $flor->flor_junio       = $request->flor_junio;
        $flor->flor_junio       = $request->flor_junio;
        $flor->flor_julio       = $request->flor_julio;
        $flor->flor_agosto      = $request->flor_agosto;
        $flor->flor_septiembre  = $request->flor_septiembre;
        $flor->flor_octubre     = $request->flor_octubre;
        $flor->flor_noviembre   = $request->flor_noviembre;
        $flor->flor_diciembre   = $request->flor_diciembre;
        $flor->save();

        $flor->fichas_tecnicas()->save($ficha_tecnica);

        $fruto = new Fruto();
        $fruto->fruto_enero         = $request->fruto_enero;
        $fruto->fruto_febrero       = $request->fruto_febrero;
        $fruto->fruto_marzo         = $request->fruto_marzo;
        $fruto->fruto_abril         = $request->fruto_abril;
        $fruto->fruto_mayo          = $request->fruto_mayo;
        $fruto->fruto_junio         = $request->fruto_junio;
        $fruto->fruto_junio         = $request->fruto_junio;
        $fruto->fruto_julio         = $request->fruto_julio;
        $fruto->fruto_agosto        = $request->fruto_agosto;
        $fruto->fruto_septiembre    = $request->fruto_septiembre;
        $fruto->fruto_octubre       = $request->fruto_octubre;
        $fruto->fruto_noviembre     = $request->fruto_noviembre;
        $fruto->fruto_diciembre     = $request->fruto_diciembre;
        $fruto->save();

        $fruto->fichas_tecnicas()->save($ficha_tecnica);


        $hoja = new Hoja();
        $hoja->hoja_enero       = $request->hoja_enero;
        $hoja->hoja_febrero     = $request->hoja_febrero;
        $hoja->hoja_marzo       = $request->hoja_marzo;
        $hoja->hoja_abril       = $request->hoja_abril;
        $hoja->hoja_mayo        = $request->hoja_mayo;
        $hoja->hoja_junio       = $request->hoja_junio;
        $hoja->hoja_junio       = $request->hoja_junio;
        $hoja->hoja_julio       = $request->hoja_julio;
        $hoja->hoja_agosto      = $request->hoja_agosto;
        $hoja->hoja_septiembre  = $request->hoja_septiembre;
        $hoja->hoja_octubre     = $request->hoja_octubre;
        $hoja->hoja_noviembre   = $request->hoja_noviembre;
        $hoja->hoja_diciembre   = $request->hoja_diciembre;
        $hoja->save();

        $hoja->fichas_tecnicas()->save($ficha_tecnica);


        /**
        * Guardar Expresion vegetal
        */
        $expresion_vegetal = new Expresion_Vegetal();
        $expresion_vegetal->raiz    = $request->raiz;
        $expresion_vegetal->tronco  = $request->tronco;
        $expresion_vegetal->corteza = $request->corteza;
        $expresion_vegetal->ramas   = $request->ramas;
        $expresion_vegetal->hojas   = $request->hojas;
        $expresion_vegetal->flores  = $request->flores;
        $expresion_vegetal->frutos  = $request->frutos;
        $expresion_vegetal->formas  = $request->formas;
        $expresion_vegetal->tallo   = $request->tallo;
        $expresion_vegetal->save();

        $expresion_vegetal->fichas_tecnicas()->save($ficha_tecnica);


        /**
        * Guardar Mantenimiento
        */
        $mantenimiento = new Mantenimiento();
        $mantenimiento->poda_de_formacion               = $request->poda_de_formacion;
        $mantenimiento->poda_de_ramas_bajas             = $request->poda_de_ramas_bajas;
        $mantenimiento->poda_estructurada_o_estetica    = $request->poda_estructurada_o_estetica;
        $mantenimiento->poda_de_estabilidad             = $request->poda_de_estabilidad;
        $mantenimiento->observaciones                   = $request->observaciones;
        $mantenimiento->save();

        $mantenimiento->fichas_tecnicas()->save($ficha_tecnica);


        /**
        * Guardar Caracterización
        */
        $climatologia = new Climatologia();
        $climatologia->humedo_tropical      = $request->humedo_tropical;
        $climatologia->seco_tropical        = $request->seco_tropical;
        $climatologia->selva_premontana     = $request->selva_premontana;
        $climatologia->frio                 = $request->frio;
        $climatologia->templado             = $request->templado;
        $climatologia->calido               = $request->calido;
        $climatologia->alto                 = $request->alto;
        $climatologia->medio                = $request->viento_medio;
        $climatologia->baja                 = $request->viento_bajo;
        $climatologia->save();

        $climatologia->fichas_tecnicas()->save($ficha_tecnica);


        $suelo = new Suelo();
        $suelo->acido       = $request->acido;
        $suelo->medio       = $request->naturaleza_medio;
        $suelo->medio_acido = $request->medio_acido;
        $suelo->franco      = $request->franco;
        $suelo->arenoso     = $request->arenoso;
        $suelo->arcilloso   = $request->arcilloso;
        $suelo->rico        = $request->rico;
        $suelo->medio_mt    = $request->medio_mt;
        $suelo->pobre       = $request->pobre;
        $suelo->save();

        $suelo->fichas_tecnicas()->save($ficha_tecnica);


        $fisiologia = new Fisiologia();
        $fisiologia->rapido  = $request->rapido;
        $fisiologia->medio   = $request->cremimiento_medio;
        $fisiologia->lento   = $request->lento;
        $fisiologia->alta    = $request->alta;
        $fisiologia->media   = $request->media;
        $fisiologia->baja    = $request->longevidad_baja;
        $fisiologia->save();

        $fisiologia->fichas_tecnicas()->save($ficha_tecnica);


        /**
        * Guardar Categorización
        */
        $uso_residencial = new Uso_Residencial();
        $uso_residencial->antejardin             = $request->r_antejardin;
        $uso_residencial->patios                 = $request->r_patios;
        $uso_residencial->fachadas               = $request->r_fachadas;
        $uso_residencial->cubiertas              = $request->r_cubiertas;
        $uso_residencial->save();

        $uso_residencial->fichas_tecnicas()->save($ficha_tecnica);

        $uso_institucional = new Uso_Institucional();
        $uso_institucional->antejardin             = $request->i_antejardin;
        $uso_institucional->fachadas               = $request->i_fachadas;
        $uso_institucional->cubiertas              = $request->i_cubiertas;
        $uso_institucional->plazoletas_acceso      = $request->i_plazoletas_acceso;
        $uso_institucional->save();

        $uso_institucional->fichas_tecnicas()->save($ficha_tecnica);

        $uso_servicio = new Uso_De_Servicio_Publico();
        $uso_servicio->antejardin             = $request->s_antejardin;
        $uso_servicio->fachadas               = $request->s_fachadas;
        $uso_servicio->cubiertas              = $request->s_cubiertas;
        $uso_servicio->plazoletas_acceso      = $request->s_plazoletas_acceso;
        $uso_servicio->save();

        $uso_servicio->fichas_tecnicas()->save($ficha_tecnica);

        $uso_comercial = new Uso_Comercial();
        $uso_comercial->antejardin             = $request->c_antejardin;
        $uso_comercial->fachadas               = $request->c_fachadas;
        $uso_comercial->cubiertas              = $request->c_cubiertas;
        $uso_comercial->plazoletas_acceso      = $request->c_plazoletas_acceso;
        $uso_comercial->save();

        $uso_comercial->fichas_tecnicas()->save($ficha_tecnica);

        $infraestructura_vial = new Infraestructura_Vial();
        $infraestructura_vial->separador_de_avenidas    = $request->separador_de_avenidas;
        $infraestructura_vial->glorietas_rotondas       = $request->glorietas_rotondas;
        $infraestructura_vial->andenes                  = $request->andenes;
        $infraestructura_vial->puentes                  = $request->puentes;
        $infraestructura_vial->save();

        $infraestructura_vial->fichas_tecnicas()->save($ficha_tecnica);


        $prevencion_riesgo = new Prevencion_De_Riesgo();
        $prevencion_riesgo->barrera_visual      = $request->barrera_visual;
        $prevencion_riesgo->barrera_acustica    = $request->barrera_acustica;
        $prevencion_riesgo->barrera_de_olores   = $request->barrera_de_olores;
        $prevencion_riesgo->barrera_de_vientos  = $request->barrera_de_vientos;
        $prevencion_riesgo->cubrir_taludes      = $request->cubrir_taludes;
        $prevencion_riesgo->ronda_hidrica       = $request->ronda_hidrica;
        $prevencion_riesgo->save();

        $prevencion_riesgo->fichas_tecnicas()->save($ficha_tecnica);


        $espacio_publico = new Espacio_Publico();
        $espacio_publico->parques                   = $request->parques;
        $espacio_publico->plazoletas                = $request->plazoletas;
        $espacio_publico->jardines                  = $request->jardines;
        $espacio_publico->instalaciones_deportivas  = $request->instalaciones_deportivas;
        $espacio_publico->save();

        $espacio_publico->fichas_tecnicas()->save($ficha_tecnica);

        return redirect('admin/fichas_tecnicas')->with('status', 'La ficha técnica de la planta '. $ficha_tecnica->nombre .' fue adicionada con éxito');

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        return view('dashboard.ficha_tecnica.show')->with('ficha_tecnica', Ficha_tecnica::findOrFail($id));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $ft = Ficha_tecnica::findOrFail($id);
        return view('dashboard.ficha_tecnica.edit')->with('ft', $ft);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(FichaTecnicaRequest $request, $id)
    {
        $ficha_tecnica = Ficha_tecnica::findOrFail($id);
        $ficha_tecnica->nombre                = $request->nombre;
        $ficha_tecnica->nombre_cientifico     = $request->nombre_cientifico;
        $ficha_tecnica->familia               = $request->familia;
        $ficha_tecnica->origen                = $request->origen;
        $ficha_tecnica->propagacion           = $request->propagacion;
        $ficha_tecnica->altitud_siembra       = $request->altitud_siembra;
        $ficha_tecnica->descripcion           = $request->descripcion;

        if ( $request->hasFile('foto') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('foto')
            );
            $ficha_tecnica->foto = $path;
        }

        if ( $request->hasFile('detalle_flor') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_flor')
            );
            $ficha_tecnica->detalle_flor = $path;
        }

        if ( $request->hasFile('detalle_hoja') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_hoja')
            );
            $ficha_tecnica->detalle_hoja = $path;
        }

        if ( $request->hasFile('detalle_tronco') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_tronco')
            );
            $ficha_tecnica->detalle_tronco = $path;
        }

        if ( $request->hasFile('detalle_fruto') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_fruto')
            );
            $ficha_tecnica->detalle_fruto = $path;
        }

        if ( $request->hasFile('detalle_tallo') ) {
            $path   = Storage::putFile(
                'public/plantas', $request->file('detalle_tallo')
            );
            $ficha_tecnica->detalle_tallo = $path;
        }

        $ficha_tecnica->caracteristica = $request->caracteristica;


        /**
        * Guardar Comportamiento fisionómico
        */
        $flor = Flor::findOrFail($id);
        $flor->flor_enero       = $request->flor_enero;
        $flor->flor_febrero     = $request->flor_febrero;
        $flor->flor_marzo       = $request->flor_marzo;
        $flor->flor_abril       = $request->flor_abril;
        $flor->flor_mayo        = $request->flor_mayo;
        $flor->flor_junio       = $request->flor_junio;
        $flor->flor_junio       = $request->flor_junio;
        $flor->flor_julio       = $request->flor_julio;
        $flor->flor_agosto      = $request->flor_agosto;
        $flor->flor_septiembre  = $request->flor_septiembre;
        $flor->flor_octubre     = $request->flor_octubre;
        $flor->flor_noviembre   = $request->flor_noviembre;
        $flor->flor_diciembre   = $request->flor_diciembre;
        $flor->save();

        $flor->fichas_tecnicas()->save($ficha_tecnica);

        $fruto = Fruto::findOrFail($id);
        $fruto->fruto_enero         = $request->fruto_enero;
        $fruto->fruto_febrero       = $request->fruto_febrero;
        $fruto->fruto_marzo         = $request->fruto_marzo;
        $fruto->fruto_abril         = $request->fruto_abril;
        $fruto->fruto_mayo          = $request->fruto_mayo;
        $fruto->fruto_junio         = $request->fruto_junio;
        $fruto->fruto_junio         = $request->fruto_junio;
        $fruto->fruto_julio         = $request->fruto_julio;
        $fruto->fruto_agosto        = $request->fruto_agosto;
        $fruto->fruto_septiembre    = $request->fruto_septiembre;
        $fruto->fruto_octubre       = $request->fruto_octubre;
        $fruto->fruto_noviembre     = $request->fruto_noviembre;
        $fruto->fruto_diciembre     = $request->fruto_diciembre;
        $fruto->save();

        $fruto->fichas_tecnicas()->save($ficha_tecnica);


        $hoja = Hoja::findOrFail($id);
        $hoja->hoja_enero       = $request->hoja_enero;
        $hoja->hoja_febrero     = $request->hoja_febrero;
        $hoja->hoja_marzo       = $request->hoja_marzo;
        $hoja->hoja_abril       = $request->hoja_abril;
        $hoja->hoja_mayo        = $request->hoja_mayo;
        $hoja->hoja_junio       = $request->hoja_junio;
        $hoja->hoja_junio       = $request->hoja_junio;
        $hoja->hoja_julio       = $request->hoja_julio;
        $hoja->hoja_agosto      = $request->hoja_agosto;
        $hoja->hoja_septiembre  = $request->hoja_septiembre;
        $hoja->hoja_octubre     = $request->hoja_octubre;
        $hoja->hoja_noviembre   = $request->hoja_noviembre;
        $hoja->hoja_diciembre   = $request->hoja_diciembre;
        $hoja->save();

        $hoja->fichas_tecnicas()->save($ficha_tecnica);


        /**
        * Guardar Expresion vegetal
        */
        $expresion_vegetal = Expresion_Vegetal::findOrFail($id);
        $expresion_vegetal->raiz    = $request->raiz;
        $expresion_vegetal->tronco  = $request->tronco;
        $expresion_vegetal->corteza = $request->corteza;
        $expresion_vegetal->ramas   = $request->ramas;
        $expresion_vegetal->hojas   = $request->hojas;
        $expresion_vegetal->flores  = $request->flores;
        $expresion_vegetal->frutos  = $request->frutos;
        $expresion_vegetal->formas  = $request->formas;
        $expresion_vegetal->tallo   = $request->tallo;
        $expresion_vegetal->save();

        $expresion_vegetal->fichas_tecnicas()->save($ficha_tecnica);


        /**
        * Guardar Mantenimiento
        */
        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->poda_de_formacion               = $request->poda_de_formacion;
        $mantenimiento->poda_de_ramas_bajas             = $request->poda_de_ramas_bajas;
        $mantenimiento->poda_estructurada_o_estetica    = $request->poda_estructurada_o_estetica;
        $mantenimiento->poda_de_estabilidad             = $request->poda_de_estabilidad;
        $mantenimiento->observaciones                   = $request->observaciones;
        $mantenimiento->save();

        $mantenimiento->fichas_tecnicas()->save($ficha_tecnica);


        /**
        * Guardar Caracterización
        */
        $climatologia = Climatologia::findOrFail($id);
        $climatologia->humedo_tropical      = $request->humedo_tropical;
        $climatologia->seco_tropical        = $request->seco_tropical;
        $climatologia->selva_premontana     = $request->selva_premontana;
        $climatologia->frio                 = $request->frio;
        $climatologia->templado             = $request->templado;
        $climatologia->calido               = $request->calido;
        $climatologia->alto                 = $request->alto;
        $climatologia->medio                = $request->viento_medio;
        $climatologia->baja                 = $request->viento_bajo;
        $climatologia->save();

        $climatologia->fichas_tecnicas()->save($ficha_tecnica);


        $suelo = Suelo::findOrFail($id);
        $suelo->acido       = $request->acido;
        $suelo->medio       = $request->naturaleza_medio;
        $suelo->medio_acido = $request->medio_acido;
        $suelo->franco      = $request->franco;
        $suelo->arenoso     = $request->arenoso;
        $suelo->arcilloso   = $request->arcilloso;
        $suelo->rico        = $request->rico;
        $suelo->medio_mt    = $request->medio_mt;
        $suelo->pobre       = $request->pobre;
        $suelo->save();

        $suelo->fichas_tecnicas()->save($ficha_tecnica);


        $fisiologia = Fisiologia::findOrFail($id);
        $fisiologia->rapido  = $request->rapido;
        $fisiologia->medio   = $request->cremimiento_medio;
        $fisiologia->lento   = $request->lento;
        $fisiologia->alta    = $request->alta;
        $fisiologia->media   = $request->media;
        $fisiologia->baja    = $request->longevidad_baja;
        $fisiologia->save();

        $fisiologia->fichas_tecnicas()->save($ficha_tecnica);


        /**
        * Guardar Categorización
        */

        $uso_residencial = Uso_Residencial::findOrFail($id);
        $uso_residencial->antejardin             = $request->r_antejardin;
        $uso_residencial->patios                 = $request->r_patios;
        $uso_residencial->fachadas               = $request->r_fachadas;
        $uso_residencial->cubiertas              = $request->r_cubiertas;
        $uso_residencial->save();

        $uso_residencial->fichas_tecnicas()->save($ficha_tecnica);

        $uso_institucional = Uso_Institucional::findOrFail($id);
        $uso_institucional->antejardin             = $request->i_antejardin;
        $uso_institucional->fachadas               = $request->i_fachadas;
        $uso_institucional->cubiertas              = $request->i_cubiertas;
        $uso_institucional->plazoletas_acceso      = $request->i_plazoletas_acceso;
        $uso_institucional->save();

        $uso_institucional->fichas_tecnicas()->save($ficha_tecnica);

        $uso_servicio = Uso_De_Servicio_Publico::findOrFail($id);
        $uso_servicio->antejardin             = $request->s_antejardin;
        $uso_servicio->fachadas               = $request->s_fachadas;
        $uso_servicio->cubiertas              = $request->s_cubiertas;
        $uso_servicio->plazoletas_acceso      = $request->s_plazoletas_acceso;
        $uso_servicio->save();

        $uso_servicio->fichas_tecnicas()->save($ficha_tecnica);

        $uso_comercial = Uso_Comercial::findOrFail($id);
        $uso_comercial->antejardin             = $request->c_antejardin;
        $uso_comercial->fachadas               = $request->c_fachadas;
        $uso_comercial->cubiertas              = $request->c_cubiertas;
        $uso_comercial->plazoletas_acceso      = $request->c_plazoletas_acceso;
        $uso_comercial->save();

        $uso_comercial->fichas_tecnicas()->save($ficha_tecnica);


        $infraestructura_vial = Infraestructura_Vial::findOrFail($id);
        $infraestructura_vial->separador_de_avenidas    = $request->separador_de_avenidas;
        $infraestructura_vial->glorietas_rotondas       = $request->glorietas_rotondas;
        $infraestructura_vial->andenes                  = $request->andenes;
        $infraestructura_vial->puentes                  = $request->puentes;
        $infraestructura_vial->save();

        $infraestructura_vial->fichas_tecnicas()->save($ficha_tecnica);


        $prevencion_riesgo = Prevencion_De_Riesgo::findOrFail($id);
        $prevencion_riesgo->barrera_visual      = $request->barrera_visual;
        $prevencion_riesgo->barrera_acustica    = $request->barrera_acustica;
        $prevencion_riesgo->barrera_de_olores   = $request->barrera_de_olores;
        $prevencion_riesgo->barrera_de_vientos  = $request->barrera_de_vientos;
        $prevencion_riesgo->cubrir_taludes      = $request->cubrir_taludes;
        $prevencion_riesgo->ronda_hidrica       = $request->ronda_hidrica;
        $prevencion_riesgo->save();

        $prevencion_riesgo->fichas_tecnicas()->save($ficha_tecnica);


        $espacio_publico = Espacio_Publico::findOrFail($id);
        $espacio_publico->parques                   = $request->parques;
        $espacio_publico->plazoletas                = $request->plazoletas;
        $espacio_publico->jardines                  = $request->jardines;
        $espacio_publico->instalaciones_deportivas  = $request->instalaciones_deportivas;
        $espacio_publico->save();

        $espacio_publico->fichas_tecnicas()->save($ficha_tecnica);

        return redirect('/admin/fichas_tecnicas')->with('status', 'La ficha técnica de la planta '. $ficha_tecnica->nombre .' fue modificada con éxito');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $ficha_tecnica = Ficha_Tecnica::findOrFail($id);
        $pdf        = $ficha_tecnica->ficha_tecnica;
        $foto       = $ficha_tecnica->foto;
        $hoja       = $ficha_tecnica->detalle_hoja;
        $tronco     = $ficha_tecnica->detalle_tronco;
        $especie    = $ficha_tecnica->detalle_especie;
        $fruto      = $ficha_tecnica->detalle_fruto;

        if ( $hoja !== 'public/plantas/default-photo.png' ) {
            Storage::delete([$hoja]);
        }

        if ( $tronco !== 'public/plantas/default-photo.png' ) {
            Storage::delete([$tronco]);
        }

        if ( $especie !== 'public/plantas/default-photo.png' ) {
            Storage::delete([$especie]);
        }

        if ( $fruto !== 'public/plantas/default-photo.png' ) {
            Storage::delete([$fruto]);
        }

        Storage::delete([$pdf, $foto]);
        $ficha_tecnica->flor()->delete();
        $ficha_tecnica->fruto()->delete();
        $ficha_tecnica->hoja()->delete();
        $ficha_tecnica->expresion_vegetal()->delete();
        $ficha_tecnica->mantenimiento()->delete();
        $ficha_tecnica->climatologia()->delete();
        $ficha_tecnica->suelo()->delete();
        $ficha_tecnica->fisiologia()->delete();
        $ficha_tecnica->uso_residencial()->delete();
        $ficha_tecnica->uso_institucional()->delete();
        $ficha_tecnica->uso_de_servicios_publicos()->delete();
        $ficha_tecnica->uso_comercial()->delete();
        $ficha_tecnica->infraestructura_vial()->delete();
        $ficha_tecnica->prevencion_de_riesgo()->delete();
        $ficha_tecnica->espacio_publico()->delete();

        Ficha_Tecnica::destroy($id);
        return redirect('admin/fichas_tecnicas')->with('status', 'La ficha técnica de la planta fue eliminada con éxito');
    }

    public function ficha_tecnica_user($id, $ruta)
    {
        $ficha_tecnica = Ficha_Tecnica::findorFail($id);
        return view('filtros.ficha_tecnica_user.index', compact('ficha_tecnica', 'ruta') );
    }

    public function eliminar_seleccionados(Request $request)
    {
        $ficha_tecnica = Ficha_Tecnica::whereIn('id', $request->id)->get();

        $ficha_tecnica_length = count($ficha_tecnica);
        for ($i=0; $i < $ficha_tecnica_length; $i++) {
            if ( $ficha_tecnica[$i]->detalle_hoja !== 'public/plantas/default-photo.png' ) {
                Storage::delete([$ficha_tecnica[$i]->detalle_hoja]);
            }

            if ( $ficha_tecnica[$i]->detalle_tronco !== 'public/plantas/default-photo.png' ) {
                Storage::delete([$ficha_tecnica[$i]->detalle_tronco]);
            }

            if ( $ficha_tecnica[$i]->detalle_especie !== 'public/plantas/default-photo.png' ) {
                Storage::delete([$ficha_tecnica[$i]->detalle_especie]);
            }

            if ( $ficha_tecnica[$i]->detalle_fruto !== 'public/plantas/default-photo.png' ) {
                Storage::delete([$ficha_tecnica[$i]->detalle_fruto]);
            }
            Storage::delete([$ficha_tecnica[$i]->ficha_tecnica, $ficha_tecnica[$i]->foto]);
        }
        Ficha_Tecnica::whereIn('id', $request->id)->delete();
        return redirect('admin/fichas_tecnicas')->with('status', 'Las fichas técnicas seleccionadas han sido eliminadas con éxito');
    }

    public function descargarFichaTecnica($id, $nombre)
    {
        $ficha_tecnica = Ficha_Tecnica::where('id', $id)->first();

        $filename = $ficha_tecnica->ficha_tecnica;
        if ($filename != null) {
            $pathToFile = storage_path('app/'.$filename);
            return response()->download($pathToFile, $nombre.'.pdf');
        }
    }

    public function obtener_filtros(Request $request)
    {
        if ($request->id == 1) {
            return response()->json([
                'nombre_filtro' => 'infraestructura_vial',
                'separador_avenida' => '<a href="' . url("buscar_plantas/infraestructura_vial/separador_avenida") . '" class="separador_avenida"><span class="squadre-filtro"></span>Separador de avenidas</a>',
                'andenes' => '<a href="' . url("buscar_plantas/infraestructura_vial/andenes") . '" class="andenes">Andenes</a>',
                'glorieta_rotonda' => '<a href="' . url('buscar_plantas/infraestructura_vial/glorieta_rotonda') . '" class="glorieta_rotonda">Glorieta - Rotonda</a>',
                'puentes' => '<a href="' . url('buscar_plantas/infraestructura_vial/puentes') . '" class="puentes">Puentes</a>'
            ]);
        }   elseif ($request->id == 2) {
            return response()->json([
                'nombre_filtro' => 'infraestructura_construida',
                'r_antejardin' => '<a href="' . url("buscar_plantas/infraestructura_construida/uso_residencial/rutainc/1") . '">Antejardín</a>',
                'r_patios' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_residencial/rutainc/2') . '">Patios</a>',
                'r_fachadas' => '<a href=" ' . url('buscar_plantas/infraestructura_construida/uso_residencial/rutainc/3'). '">Fachadas</a>',
                'r_cubiertas' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_residencial/rutainc/4') . '">Cubiertas</a>',

                'i_antejardin' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_institucional/rutainc/1') . '">Antejardín</a>',
                'i_fachadas' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_institucional/rutainc/3') . '">Fachadas</a>',
                'i_cubiertas' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_institucional/rutainc/4') . '">Cubiertas</a>',
                'i_plazoletas_acceso' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_institucional/rutainc/5') . '">Plazoletas de acceso</a>',

                'c_antejardin' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_comercial/rutainc/1') . '">Antejardín</a>',
                'c_fachadas' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_comercial/rutainc/3') . '">Fachadas</a>',
                'c_cubiertas' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_comercial/rutainc/4') . '">Cubiertas</a>',
                'c_plazoletas_acceso' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_comercial/rutainc/5') . '">Plazoletas de acceso</a>',

                's_antejardin' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_de_servicios_publicos/rutainc/1') . '">Antejardín</a>',
                's_fachadas' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_de_servicios_publicos/rutainc/3') . '">Fachadas</a>',
                's_cubiertas' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_de_servicios_publicos/rutainc/4') . '">Cubiertas</a>',
                's_plazoletas_acceso' => '<a href="' . url('buscar_plantas/infraestructura_construida/uso_de_servicios_publicos/rutainc/5') . '">Plazoletas de acceso</a>',

            ]);
        }   elseif ($request->id == 3) {
            return response()->json([
                'nombre_filtro' => 'espacio_publico',
                'parques' => '<a href="' . url('buscar_plantas/espacio_publico/parques') . '" class="parques">Parques</a>',
                'plazoletas' => '<a href="' . url('buscar_plantas/espacio_publico/plazoletas') . '" class="plazoletas">Plazoletas</a>',
                'jardines' => '<a href="' . url('buscar_plantas/espacio_publico/jardines') . '" class="jardines">Jardines</a>',
                'instalaciones_deportivas' => '<a href="' . url('buscar_plantas/espacio_publico/instalaciones_deportivas') . '" class="instalaciones_deportivas">Instalaciones deportivas</a>'
            ]);
        }   elseif ($request->id == 4) {
            return response()->json([
                'nombre_filtro' => 'prevencion_de_riesgos',
                'barrera_visual' => '<a href="' . url('buscar_plantas/prevencion_de_riesgos/barrera_visual') . '" class="barrera_visual">Barrera visual</a>',
                'barrera_acustica' => '<a href="' . url('buscar_plantas/prevencion_de_riesgos/barrera_acustica') . '" class="barrera_acustica">Barrera acústica</a>',
                'barrera_de_olores' => '<a href="' . url('buscar_plantas/prevencion_de_riesgos/barrera_de_olores') . '" class="barrera_de_olores">Barrera de olores</a>',
                'barrera_de_vientos' => '<a href="' . url('buscar_plantas/prevencion_de_riesgos/barrera_de_vientos') . '" class="barrera_de_vientos">Barrera de vientos</a>',
                'cubrir_taludes' => '<a href="' . url('buscar_plantas/prevencion_de_riesgos/cubrir_taludes') . '" class="cubrir_taludes">Cubrir taludes</a>',
                'ronda_hidrica' => '<a href="' . url('buscar_plantas/prevencion_de_riesgos/ronda_hidrica') . '" class="ronda_hidrica">Ronda hídrica</a>'
            ]);
        }   elseif ($request->id == 5) {
            return response()->json([
                'nombre_filtro' => 'climatologia',
                'cl_humedo_tropical' => '<a href="' . url('buscar_plantas/climatologia/ambiente_humedo_tropical') . '">Húmedo Tropical</a>',
                'cl_seco_tropical' => '<a href="' . url('buscar_plantas/climatologia/ambiente_seco_tropical') . '">Seco Tropical</a>',
                'cl_selva_premontana' => '<a href="' . url('buscar_plantas/climatologia/ambiente_selva_premontana') . '">Selva Premontana</a>',

                'cl_frio' => '<a href="' . url('buscar_plantas/climatologia/clima_frio') . '">Frío</a>',
                'cl_templado' => '<a href="' . url('buscar_plantas/climatologia/clima_templado') . '">Templado</a>',
                'cl_calido' => '<a href="' . url('buscar_plantas/climatologia/clima_calido') . '">Cálido</a>',

                'cl_alto' => '<a href="' . url('buscar_plantas/climatologia/viento_alto') . '">Alto</a>',
                'cl_medio' => '<a href="' . url('buscar_plantas/climatologia/viento_medio') . '">Medio</a>',
                'cl_bajo' => '<a href="' . url('buscar_plantas/climatologia/viento_bajo') . '">Bajo</a>'
            ]);
        }   elseif ($request->id == 6) {
            return response()->json([
                'nombre_filtro' => 'suelo',
                'su_acido' => '<a href="' . url('buscar_plantas/suelo/naturaleza_acido') . '">Ácido</a>',
                'su_medio' => '<a href="' . url('buscar_plantas/suelo/naturaleza_medio') . '">Medio</a>',
                'su_medio_acido' => '<a href="' . url('buscar_plantas/suelo/naturaleza_medio_acido') . '">Medio ácido</a>',

                'su_rico' => '<a href="' . url('buscar_plantas/suelo/materia_organica_rico') . '">Rico</a>',
                'su_medio_mo' => '<a href="' . url('buscar_plantas/suelo/materia_organica_medio_mt') . '">Medio</a>',
                'su_pobre' => '<a href="' . url('buscar_plantas/suelo/materia_organica_pobre') . '">Pobre</a>',

                'su_franco' => '<a href="' . url('buscar_plantas/suelo/textura_franco') . '">Franco</a>',
                'su_arenoso' => '<a href="' . url('buscar_plantas/suelo/textura_arenoso') . '">Arenoso</a>',
                'su_arcilloso' => '<a href="' . url('buscar_plantas/suelo/textura_arcilloso') . '">Arcilloso</a>'
            ]);
        }   elseif ($request->id == 7) {
            return response()->json([
                'nombre_filtro' => 'fisiologia',
                'fi_alta' => '<a href="' . url('buscar_plantas/fisiologia/longevidad_alta') . '">Alta</a>',
                'fi_media' => '<a href="' . url('buscar_plantas/fisiologia/longevidad_media_longevidad') . '">Media</a>',
                'fi_ba' => '<a href="' . url('buscar_plantas/fisiologia/longevidad_baja') . '">Baja</a>',

                'fi_rapido' => '<a href="' . url('buscar_plantas/fisiologia/crecimiento_rapido') . '">Rápido</a>',
                'fi_medio_crec' => '<a href="' . url('buscar_plantas/fisiologia/crecimiento_medio_crecimiento') . '">Medio</a>',
                'fi_lento' => '<a href="' . url('buscar_plantas/fisiologia/crecimiento_lento') . '">Lento</a>'
            ]);
        }
    }

    public function busqueda(Request $request)
    {
        $nombrePlanta = $request->get('nombre_planta');
        $query = Ficha_Tecnica::busqueda($nombrePlanta)->get();

        return view('filtros.ficha_tecnica_user.busqueda', compact('query', 'nombrePlanta'));
    }

    public function notificacionPlanta(Request $request)
    {
        $plantaRecomendacion = $request->get('planta_recomendacion');
        Mail::to('administracion@grindda.com')->queue(new NotificacionNuevaPlanta($plantaRecomendacion));
        
        return redirect('buscar_plantas')->with('notificacion_enviada', 'Hemos recibido tu notificación de nueva planta, pronto la incluiremos en nuestra matriz, gracias.');
    }
}
