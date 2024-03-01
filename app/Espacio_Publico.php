<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espacio_Publico extends Model
{
	protected $table = 'espacios_publicos';

    protected $fillable = [
        'parques', 'plazoletas', 'jardines', 'instalaciones_deportivas',
    ];

    public function fichas_tecnicas()
	{
    	return $this->hasMany('App\Ficha_Tecnica', 'espacio_publico_id');
    }

}
