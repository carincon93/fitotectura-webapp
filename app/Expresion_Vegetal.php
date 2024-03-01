<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expresion_Vegetal extends Model
{
    protected $table = 'expresiones_vegetales';

    protected $fillable = [
        'raiz', 'tronco', 'corteza', 'ramas', 'hojas', 'flores', 'frutos', 'formas', 'tallo',
    ];

    public function fichas_tecnicas()
    {
    	return $this->hasMany('App\Ficha_Tecnica', 'expresion_vegetal_id');
    }
}
