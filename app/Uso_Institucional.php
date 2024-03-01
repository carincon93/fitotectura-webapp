<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uso_Institucional extends Model
{
    protected $table = 'usos_institucionales';

    protected $fillable = [
        'antejardin',
        'fachadas',
        'cubiertas',
        'plazoletas_acceso',
    ];

    public function fichas_tecnicas()
	{
    	return $this->HasMany('App\Ficha_Tecnica', 'uso_institucional_id');
    }
}
