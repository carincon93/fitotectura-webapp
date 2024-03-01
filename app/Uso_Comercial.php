<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uso_Comercial extends Model
{
    protected $table = 'usos_comerciales';

    protected $fillable = [
        'antejardin',
        'fachadas',
        'cubiertas',
        'plazoletas_acceso',
    ];

    public function fichas_tecnicas()
	{
    	return $this->hasMany('App\Ficha_Tecnica', 'uso_comercial_id');
    }
}
