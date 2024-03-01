<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Climatologia;
use App\Ficha_Tecnica;

class ClimatologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function humedo_tropical()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('climatologias', function ($join) {
                            $join->on('fichas_tecnicas.climatologia_id', '=', 'climatologias.id')
                            ->where('climatologias.humedo_tropical', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.climatologia.humedo_tropical')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function seco_tropical()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('climatologias', function ($join) {
                            $join->on('fichas_tecnicas.climatologia_id', '=', 'climatologias.id')
                            ->where('climatologias.seco_tropical', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.climatologia.seco_tropical')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function selva_premontana()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('climatologias', function ($join) {
                            $join->on('fichas_tecnicas.climatologia_id', '=', 'climatologias.id')
                            ->where('climatologias.selva_premontana', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.climatologia.selva_premontana')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function frio()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('climatologias', function ($join) {
                            $join->on('fichas_tecnicas.climatologia_id', '=', 'climatologias.id')
                            ->where('climatologias.frio', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.climatologia.frio')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function templado()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('climatologias', function ($join) {
                            $join->on('fichas_tecnicas.climatologia_id', '=', 'climatologias.id')
                            ->where('climatologias.templado', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.climatologia.templado')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function calido()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('climatologias', function ($join) {
                            $join->on('fichas_tecnicas.climatologia_id', '=', 'climatologias.id')
                            ->where('climatologias.calido', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.climatologia.calido')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function alto()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('climatologias', function ($join) {
                            $join->on('fichas_tecnicas.climatologia_id', '=', 'climatologias.id')
                            ->where('climatologias.alto', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.climatologia.alto')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function medio()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('climatologias', function ($join) {
                            $join->on('fichas_tecnicas.climatologia_id', '=', 'climatologias.id')
                            ->where('climatologias.medio', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.climatologia.medio')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function bajo()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('climatologias', function ($join) {
                            $join->on('fichas_tecnicas.climatologia_id', '=', 'climatologias.id')
                            ->where('climatologias.baja', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.climatologia.bajo')->with('fichas_tecnicas', $fichas_tecnicas);
    }
}
