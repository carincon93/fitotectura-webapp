<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Suelo;
use App\Ficha_Tecnica;

class SueloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function acido() {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('suelos', function ($join) {
                            $join->on('fichas_tecnicas.suelo_id', '=', 'suelos.id')
                            ->where('suelos.acido', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.suelo.acido')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function medio() {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('suelos', function ($join) {
                            $join->on('fichas_tecnicas.suelo_id', '=', 'suelos.id')
                            ->where('suelos.medio', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.suelo.medio')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function medio_acido() {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('suelos', function ($join) {
                            $join->on('fichas_tecnicas.suelo_id', '=', 'suelos.id')
                            ->where('suelos.medio_acido', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.suelo.medio_acido')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function franco() {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('suelos', function ($join) {
                            $join->on('fichas_tecnicas.suelo_id', '=', 'suelos.id')
                            ->where('suelos.franco', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.suelo.franco')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function arenoso() {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('suelos', function ($join) {
                            $join->on('fichas_tecnicas.suelo_id', '=', 'suelos.id')
                            ->where('suelos.arenoso', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.suelo.arenoso')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function arcilloso() {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('suelos', function ($join) {
                            $join->on('fichas_tecnicas.suelo_id', '=', 'suelos.id')
                            ->where('suelos.arcilloso', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.suelo.arcilloso')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function rico() {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('suelos', function ($join) {
                            $join->on('fichas_tecnicas.suelo_id', '=', 'suelos.id')
                            ->where('suelos.rico', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.suelo.rico')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function medio_mt() {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('suelos', function ($join) {
                            $join->on('fichas_tecnicas.suelo_id', '=', 'suelos.id')
                            ->where('suelos.medio_mt', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.suelo.medio_mt')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function pobre() {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('suelos', function ($join) {
                            $join->on('fichas_tecnicas.suelo_id', '=', 'suelos.id')
                            ->where('suelos.pobre', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.suelo.pobre')->with('fichas_tecnicas', $fichas_tecnicas);
    }
}
