<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha_Tecnica extends Model
{
    protected $table = 'fichas_tecnicas';

    protected $fillable = [
        'ficha_tecnica',
    	'nombre',
        'nombre_cientifico',
        'familia',
        'origen',
        'propagacion',
        'altitud_siembra',
        'descripcion',
        'foto',
        'detalle_flor',
        'detalle_hoja',
        'detalle_tronco',
        'detalle_fruto',
        'detalle_tallo',
        'caracteristica',
        'expresion_vegetal_id',
        'matenimiento_id',
        'climatologia_id',
        'suelo_id',
        'fisiologia_id',
        'prevencion_de_riesgo_id',
        'infraestructura_vial_id',
        'espacio_publico_id',
        'flor_id',
        'hoja_id',
        'fruto_id',
        'uso_residencial_id',
        'uso_institucional_id',
        'uso_de_servicios_publicos_id',
        'uso_comercial_id',
    ];

    public function scopeBusqueda($query, $name)
    {
        if (trim($name) != '') {
            $query->where('nombre', 'LIKE', "%$name%")->orWhere('nombre_cientifico', 'LIKE', "%$name%");
        }
    }

    public function flor()
    {
        return $this->belongsTo('App\Flor');
    }

    public function fruto()
    {
        return $this->belongsTo('App\Fruto');
    }

    public function hoja()
    {
        return $this->belongsTo('App\Hoja');
    }

    public function expresion_vegetal()
    {
        return $this->belongsTo('App\Expresion_Vegetal');
    }

    public function mantenimiento()
    {
        return $this->belongsTo('App\Mantenimiento');
    }

    public function climatologia()
    {
        return $this->belongsTo('App\Climatologia', 'climatologia_id');
    }

    public function suelo()
    {
        return $this->belongsTo('App\Suelo');
    }

    public function fisiologia()
    {
        return $this->belongsTo('App\Fisiologia');
    }

    public function uso_residencial()
    {
        return $this->belongsTo('App\Uso_Residencial');
    }

    public function uso_institucional()
    {
        return $this->belongsTo('App\Uso_Institucional');
    }

    public function uso_de_servicios_publicos()
    {
        return $this->belongsTo('App\Uso_De_Servicio_Publico');
    }

    public function uso_comercial()
    {
        return $this->belongsTo('App\Uso_Comercial');
    }

    public function infraestructura_vial()
    {
    	return $this->belongsTo('App\Infraestructura_Vial');
    }

    public function prevencion_de_riesgo()
    {
        return $this->belongsTo('App\Prevencion_De_Riesgo');
    }

    public function espacio_publico()
    {
        return $this->belongsTo('App\Espacio_Publico');
    }
}
