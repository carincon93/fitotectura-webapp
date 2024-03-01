<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uso_Residencial extends Model
{
    protected $table = 'usos_residenciales';

    protected $fillable = [
        'antejardin',
        'patios',
        'fachadas',
        'cubiertas',
    ];

    public function fichas_tecnicas()
	{
    	return $this->HasMany('App\Ficha_Tecnica', 'uso_residencial_id');
    }
}
