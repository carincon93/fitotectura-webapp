<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flor extends Model
{
    protected $table = 'flores';

    protected $fillable = [
        'flor_enero',
        'flor_febrero',
        'flor_marzo',
        'flor_abril',
        'flor_mayo',
        'flor_junio',
        'flor_julio',
        'flor_agosto',
        'flor_septiembre',
        'flor_octubre',
        'flor_noviembre',
        'flor_diciembre',
    ];

    public function fichas_tecnicas()
    {
    	return $this->hasMany('App\Ficha_Tecnica');
    }
}
