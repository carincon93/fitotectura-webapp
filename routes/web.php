<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('index');
});

// Dashboard Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function() {

    Route::get('/', function () {
        return redirect('admin/dashboard');
    });

    Route::get('dashboard', function () {
        $fichas_tecnicas = App\Ficha_Tecnica::all()->count();
        $usuarios = App\User::where('rol', 'cliente')->count();
        return view('dashboard.dashboard', compact(['fichas_tecnicas', 'usuarios']));
    });

    Route::post('eliminar_seleccionados', 'Ficha_TecnicaController@eliminar_seleccionados');

    // Ficha tecnica CRUD
    Route::resource('fichas_tecnicas', 'Ficha_TecnicaController');
    // Administrador CRUD
    Route::resource('administradores', 'AdministradorController');
    // Usuario CRUD
	Route::resource('usuarios', 'UserController');

    Route::get('editar_perfil', 'AdministradorController@mostrarEditarPerfil');

});
Route::put('dashboard/usuario/{id}', 'UserController@modificar_perfil')->middleware('auth');
Route::post('dashboard/usuario/cambiar_contrasena', 'UserController@cambiar_contrasena')->middleware('auth');

// Editar perfil usuario normal
Route::get('user/perfil_usuario', function () {
    return view('dashboard.usuarios.editar_perfil');
})->middleware(['auth', 'is_user']);




Route::group(['prefix' => 'buscar_plantas', 'middleware' => ['auth']], function() {

    // Filtros Iniciales
    Route::get('/', function() {
        return view('filtros.index');
    })->middleware('auth');

    Route::get('categorizacion', function() {
        return view('filtros.categorizacion');
    });
    Route::get('caracterizacion', function() {
        return view('filtros.caracterizacion');
    });

    // Filtros Infraestructura Vial
    Route::get('infraestructura_vial/', function () {
        return redirect('buscar_plantas/categorizacion');
    });
    Route::get('infraestructura_vial/separador_avenida', 'Infraestructura_VialController@separador_avenida');
    Route::get('infraestructura_vial/andenes', 'Infraestructura_VialController@andenes');
    Route::get('infraestructura_vial/glorieta_rotonda', 'Infraestructura_VialController@glorieta_rotonda');
    Route::get('infraestructura_vial/puentes', 'Infraestructura_VialController@puentes');

    // Filtros Espacio Publico
    Route::get('espacio_publico/', function () {
        return redirect('buscar_plantas/categorizacion');
    });
    Route::get('espacio_publico/parques', 'Espacio_PublicoController@parques');
    Route::get('espacio_publico/plazoletas', 'Espacio_PublicoController@plazoletas');
    Route::get('espacio_publico/jardines', 'Espacio_PublicoController@jardines');
    Route::get('espacio_publico/instalaciones_deportivas', 'Espacio_PublicoController@instalaciones_deportivas');

    // Filtros Infraestructura Construida
    Route::get('infraestructura_construida/', function () {
        return redirect('buscar_plantas/categorizacion');
    });
    Route::get('infraestructura_construida/uso_residencial/rutainc/{rutainc}', 'Infraestructura_ConstruidaController@uso_residencial');
    Route::get('infraestructura_construida/uso_institucional/rutainc/{rutainc}', 'Infraestructura_ConstruidaController@uso_institucional');
    Route::get('infraestructura_construida/uso_de_servicios_publicos/rutainc/{rutainc}', 'Infraestructura_ConstruidaController@uso_de_servicios_publicos');
    Route::get('infraestructura_construida/uso_comercial/rutainc/{rutainc}', 'Infraestructura_ConstruidaController@uso_comercial');
    Route::get('infraestructura_construida/plazoleta_acceso/rutainc/{rutainc}', 'Infraestructura_ConstruidaController@plazoleta_acceso');

    // Filtros Prevención de riesgos
    Route::get('prevencion_de_riesgos/', function () {
        return redirect('buscar_plantas/categorizacion');
    });
    Route::get('prevencion_de_riesgos/barrera_visual', 'Prevencion_De_RiesgoController@barrera_visual');
    Route::get('prevencion_de_riesgos/barrera_acustica', 'Prevencion_De_RiesgoController@barrera_acustica');
    Route::get('prevencion_de_riesgos/barrera_de_olores', 'Prevencion_De_RiesgoController@barrera_de_olores');
    Route::get('prevencion_de_riesgos/barrera_de_vientos', 'Prevencion_De_RiesgoController@barrera_de_vientos');
    Route::get('prevencion_de_riesgos/cubrir_taludes', 'Prevencion_De_RiesgoController@cubrir_taludes');
    Route::get('prevencion_de_riesgos/ronda_hidrica', 'Prevencion_De_RiesgoController@ronda_hidrica');

    Route::get('obtener_filtros', 'Ficha_TecnicaController@obtener_filtros');

    Route::get('busqueda', 'Ficha_TecnicaController@busqueda')->name('busqueda');
    Route::post('notificacion', 'Ficha_TecnicaController@notificacionPlanta')->name('notificacion');

});

Route::group(['prefix' => 'buscar_plantas/climatologia', 'middleware' => ['auth']], function() {
    Route::get('/', function () {
        return redirect('buscar_plantas/caracterizacion');
    });
    // Filtros Climatología
    Route::get('ambiente_humedo_tropical', 'ClimatologiaController@humedo_tropical');
    Route::get('ambiente_seco_tropical', 'ClimatologiaController@seco_tropical');
    Route::get('ambiente_selva_premontana', 'ClimatologiaController@selva_premontana');
    Route::get('clima_frio', 'ClimatologiaController@frio');
    Route::get('clima_templado', 'ClimatologiaController@templado');
    Route::get('clima_calido', 'ClimatologiaController@calido');
    Route::get('viento_alto', 'ClimatologiaController@alto');
    Route::get('viento_medio', 'ClimatologiaController@medio');
    Route::get('viento_bajo', 'ClimatologiaController@bajo');
});

Route::group(['prefix' => 'buscar_plantas/suelo', 'middleware' => ['auth']], function() {
    Route::get('/', function () {
        return redirect('buscar_plantas/caracterizacion');
    });
    // Filtros suelo
    Route::get('naturaleza_acido', 'SueloController@acido');
    Route::get('naturaleza_medio', 'SueloController@medio');
    Route::get('naturaleza_medio_acido', 'SueloController@medio_acido');
    Route::get('materia_organica_rico', 'SueloController@rico');
    Route::get('materia_organica_medio_mt', 'SueloController@medio_mt');
    Route::get('materia_organica_pobre', 'SueloController@pobre');
    Route::get('textura_franco', 'SueloController@franco');
    Route::get('textura_arenoso', 'SueloController@arenoso');
    Route::get('textura_arcilloso', 'SueloController@arcilloso');
});

Route::group(['prefix' => 'buscar_plantas/fisiologia', 'middleware' => ['auth']], function() {
    Route::get('/', function () {
        return redirect('buscar_plantas/caracterizacion');
    });
    // Filtros fisiología
    Route::get('longevidad_alta', 'FisiologiaController@alta');
    Route::get('longevidad_media_longevidad', 'FisiologiaController@media_longevidad');
    Route::get('longevidad_baja', 'FisiologiaController@baja');
    Route::get('crecimiento_rapido', 'FisiologiaController@rapido');
    Route::get('crecimiento_medio_crecimiento', 'FisiologiaController@medio_crecimiento');
    Route::get('crecimiento_lento', 'FisiologiaController@lento');
});

// Ficha técnica
Route::get('ficha_tecnica_user/{id}/ruta/{ruta}', 'Ficha_TecnicaController@ficha_tecnica_user');
Route::get('ficha_tecnica_user/{id}/nombre={nombre}', 'Ficha_TecnicaController@descargarFichaTecnica');
Route::get('/politicas', 'PaginaPrincipalController@politicas')->name('politicas');


// Redirección - Error 404
Route::get('error', function()
{
	return Response::view('error.error404', array(), 404);
});
