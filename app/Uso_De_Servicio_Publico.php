<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uso_De_Servicio_Publico extends Model
{
    protected $table = 'uso_de_servicios_publicos';

    protected $fillable = [
        'antejardin',
        'fachadas',
        'cubiertas',
        'plazoletas_acceso',
    ];

    public function fichas_tecnicas()
	{
    	return $this->HasMany('App\Ficha_Tecnica', 'uso_de_servicios_publicos_id');
    }
}
