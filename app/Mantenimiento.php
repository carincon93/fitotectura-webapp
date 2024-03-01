<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos';

    protected $fillable = [
        'poda_de_formacion',
        'poda_de_ramas_bajas',
        'poda_estructurada_o_estetica',
        'poda_de_estabilidad',
        'observaciones',
    ];

    public function fichas_tecnicas()
    {
    	return $this->hasMany('App\Ficha_Tecnica');
    }
}
