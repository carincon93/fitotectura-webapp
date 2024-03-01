<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Fisiologia;
use App\Ficha_Tecnica;

class FisiologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rapido()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('fisiologias', function ($join) {
                            $join->on('fichas_tecnicas.fisiologia_id', '=', 'fisiologias.id')
                            ->where('fisiologias.rapido', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.fisiologia.rapido')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function medio_crecimiento()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('fisiologias', function ($join) {
                            $join->on('fichas_tecnicas.fisiologia_id', '=', 'fisiologias.id')
                            ->where('fisiologias.medio', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.fisiologia.medio')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function lento()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('fisiologias', function ($join) {
                            $join->on('fichas_tecnicas.fisiologia_id', '=', 'fisiologias.id')
                            ->where('fisiologias.medio', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.fisiologia.lento')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function alta()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('fisiologias', function ($join) {
                            $join->on('fichas_tecnicas.fisiologia_id', '=', 'fisiologias.id')
                            ->where('fisiologias.alta', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.fisiologia.alta')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function media_longevidad()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('fisiologias', function ($join) {
                            $join->on('fichas_tecnicas.fisiologia_id', '=', 'fisiologias.id')
                            ->where('fisiologias.media', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.fisiologia.media_longevidad')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function baja()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('fisiologias', function ($join) {
                            $join->on('fichas_tecnicas.fisiologia_id', '=', 'fisiologias.id')
                            ->where('fisiologias.baja', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.fisiologia.baja')->with('fichas_tecnicas', $fichas_tecnicas);
    }
}
