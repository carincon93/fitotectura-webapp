<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fruto extends Model
{
    protected $table = 'frutos';

    protected $fillable = [
        'fruto_enero',
        'fruto_febrero',
        'fruto_marzo',
        'fruto_abril',
        'fruto_mayo',
        'fruto_junio',
        'fruto_julio',
        'fruto_agosto',
        'fruto_septiembre',
        'fruto_octubre',
        'fruto_noviembre',
        'fruto_diciembre',
    ];

    public function fichas_tecnicas()
    {
    	return $this->hasMany('App\Ficha_Tecnica');
    }
}
