<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Uso_Comercial;
use App\Ficha_Tecnica;
use App\Uso_Residencial;
use App\Uso_Institucional;
use App\Uso_De_Servicio_Publico;

class Infraestructura_ConstruidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uso_residencial($rutainc)
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('usos_residenciales', function ($join) {
                            $join->on('fichas_tecnicas.uso_residencial_id', '=', 'usos_residenciales.id');
                        })
                        ->orderBy('nombre')->get();
                        // ->paginate(15);
        return view('filtros.infraestructura_construida.uso_residencial', compact('fichas_tecnicas', 'rutainc'));
    }

    public function uso_institucional($rutainc)
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('usos_institucionales', function ($join) {
                            $join->on('fichas_tecnicas.uso_institucional_id', '=', 'usos_institucionales.id');
                        })
                        ->orderBy('nombre')->get();
                        // ->paginate(15);
        return view('filtros.infraestructura_construida.uso_institucional', compact('fichas_tecnicas', 'rutainc'));
    }

    public function uso_de_servicios_publicos($rutainc)
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('uso_de_servicios_publicos', function ($join) {
                            $join->on('fichas_tecnicas.uso_de_servicios_publicos_id', '=', 'uso_de_servicios_publicos.id');
                        })
                        ->orderBy('nombre')->get();
                        // ->paginate(15);
        return view('filtros.infraestructura_construida.uso_de_servicios_publicos', compact('fichas_tecnicas', 'rutainc'));
    }

    public function uso_comercial($rutainc)
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('usos_comerciales', function ($join) {
                            $join->on('fichas_tecnicas.uso_comercial_id', '=', 'usos_comerciales.id');
                        })
                        ->orderBy('nombre')->get();
                        // ->paginate(15);
        return view('filtros.infraestructura_construida.uso_comercial', compact('fichas_tecnicas', 'rutainc'));
    }
}
