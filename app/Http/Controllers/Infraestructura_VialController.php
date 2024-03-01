<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Ficha_Tecnica;
use App\Infraestructura_Vial;

class Infraestructura_VialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function separador_avenida()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('infraestructuras_viales', function ($join) {
                            $join->on('fichas_tecnicas.infraestructura_vial_id', '=', 'infraestructuras_viales.id')
                            ->where('infraestructuras_viales.separador_de_avenidas', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.infraestructura_vial.separador_avenida')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function andenes()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('infraestructuras_viales', function ($join) {
                            $join->on('fichas_tecnicas.infraestructura_vial_id', '=', 'infraestructuras_viales.id')
                            ->where('infraestructuras_viales.andenes', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.infraestructura_vial.andenes')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function glorieta_rotonda()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('infraestructuras_viales', function ($join) {
                            $join->on('fichas_tecnicas.infraestructura_vial_id', '=', 'infraestructuras_viales.id')
                            ->where('infraestructuras_viales.glorietas_rotondas', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.infraestructura_vial.glorieta_rotonda')->with('fichas_tecnicas', $fichas_tecnicas);
    }

    public function puentes()
    {
        $fichas_tecnicas = DB::table('fichas_tecnicas')
                        ->join('infraestructuras_viales', function ($join) {
                            $join->on('fichas_tecnicas.infraestructura_vial_id', '=', 'infraestructuras_viales.id')
                            ->where('infraestructuras_viales.puentes', '=', 1);
                        })
                        ->orderBy('nombre')
                        ->paginate(15);
        return view('filtros.infraestructura_vial.puentes')->with('fichas_tecnicas', $fichas_tecnicas);
    }

}
