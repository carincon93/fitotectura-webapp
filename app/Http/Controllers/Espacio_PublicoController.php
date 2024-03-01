<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Espacio_Publico;
use App\Ficha_Tecnica;

class Espacio_PublicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function parques()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('espacios_publicos', function ($join) {
                            $join->on('fichas_tecnicas.espacio_publico_id', '=', 'espacios_publicos.id')
                            ->where('espacios_publicos.parques', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.espacio_publico.parques')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function plazoletas()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('espacios_publicos', function ($join) {
                            $join->on('fichas_tecnicas.espacio_publico_id', '=', 'espacios_publicos.id')
                            ->where('espacios_publicos.plazoletas', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.espacio_publico.plazoletas')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function jardines()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('espacios_publicos', function ($join) {
                            $join->on('fichas_tecnicas.espacio_publico_id', '=', 'espacios_publicos.id')
                            ->where('espacios_publicos.jardines', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.espacio_publico.jardines')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function instalaciones_deportivas()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('espacios_publicos', function ($join) {
                            $join->on('fichas_tecnicas.espacio_publico_id', '=', 'espacios_publicos.id')
                            ->where('espacios_publicos.instalaciones_deportivas', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.espacio_publico.instalaciones_deportivas')->with('fichas_tecnicas', $fichas_tecnicas);
    }
}
