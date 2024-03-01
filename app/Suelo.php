<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suelo extends Model
{
    protected $table = 'suelos';

    protected $fillable = [
        'naturaleza',
        'acido',
        'medio',
        'medio_acido',
        'textura',
        'franco',
        'arenoso',
        'arcilloso',
        'materia_organica',
        'rico',
        'medio_mt',
        'pobre',
    ];

    public function fichas_tecnicas()
    {
    	return $this->hasMany('App\Ficha_Tecnica');
    }

}
