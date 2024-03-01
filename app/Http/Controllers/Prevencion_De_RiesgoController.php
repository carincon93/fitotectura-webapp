<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Prevencion_De_Riesgo;
use App\Ficha_Tecnica;

class Prevencion_De_RiesgoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function barrera_visual()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('prevencion_de_riesgos', function ($join) {
                            $join->on('fichas_tecnicas.prevencion_de_riesgo_id', '=', 'prevencion_de_riesgos.id')
                            ->where('prevencion_de_riesgos.barrera_visual', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.prevencion_de_riesgos.barrera_visual')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function barrera_acustica()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('prevencion_de_riesgos', function ($join) {
                            $join->on('fichas_tecnicas.prevencion_de_riesgo_id', '=', 'prevencion_de_riesgos.id')
                            ->where('prevencion_de_riesgos.barrera_acustica', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.prevencion_de_riesgos.barrera_acustica')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function barrera_de_olores()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('prevencion_de_riesgos', function ($join) {
                            $join->on('fichas_tecnicas.prevencion_de_riesgo_id', '=', 'prevencion_de_riesgos.id')
                            ->where('prevencion_de_riesgos.barrera_de_olores', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.prevencion_de_riesgos.barrera_de_olores')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function barrera_de_vientos()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('prevencion_de_riesgos', function ($join) {
                            $join->on('fichas_tecnicas.prevencion_de_riesgo_id', '=', 'prevencion_de_riesgos.id')
                            ->where('prevencion_de_riesgos.barrera_de_vientos', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.prevencion_de_riesgos.barrera_de_vientos')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function cubrir_taludes()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('prevencion_de_riesgos', function ($join) {
                            $join->on('fichas_tecnicas.prevencion_de_riesgo_id', '=', 'prevencion_de_riesgos.id')
                            ->where('prevencion_de_riesgos.cubrir_taludes', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.prevencion_de_riesgos.cubrir_taludes')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function ronda_hidrica()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('prevencion_de_riesgos', function ($join) {
                            $join->on('fichas_tecnicas.prevencion_de_riesgo_id', '=', 'prevencion_de_riesgos.id')
                            ->where('prevencion_de_riesgos.ronda_hidrica', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.prevencion_de_riesgos.ronda_hidrica')->with('fichas_tecnicas', $fichas_tecnicas);
    }
}
