<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infraestructura_Vial extends Model
{
	protected $table = 'infraestructuras_viales';

    protected $fillable = [
        'separador_de_avenidas', 'glorietas_rotondas', 'andenes', 'puentes',
    ];

    public function fichas_tecnicas()
	{
    	return $this->hasMany('App\Ficha_Tecnica' , 'infraestructura_vial_id');
    }

}
