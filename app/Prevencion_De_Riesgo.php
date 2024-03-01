<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prevencion_De_Riesgo extends Model
{
    protected $table = 'prevencion_de_riesgos';

    protected $fillable = [
        'barrera_visual',
        'barrera_acustica',
        'barrera_de_olores',
        'barrera_de_vientos',
        'cubrir_taludes',
        'ronda_hidrica',
    ];

    public function fichas_tecnicas()
    {
    	return $this->hasMany('App\Ficha_Tecnica' , 'prevencion_de_riesgo_id');
    }
}
