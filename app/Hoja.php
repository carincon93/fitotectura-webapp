<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoja extends Model
{
    protected $table = 'hojas';

    protected $fillable = [
        'hoja_enero',
        'hoja_febrero',
        'hoja_marzo',
        'hoja_abril',
        'hoja_mayo',
        'hoja_junio',
        'hoja_julio',
        'hoja_agosto',
        'hoja_septiembre',
        'hoja_octubre',
        'hoja_noviembre',
        'hoja_diciembre',
    ];

    public function fichas_tecnicas()
    {
    	return $this->hasMany('App\Ficha_Tecnica');
    }
}
