<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Climatologia extends Model
{
    protected $table = 'climatologias';

    protected $fillable = [
        'ambiente',
        'humedo_tropical',
        'seco_tropical',
        'selva_premontana',
        'clima',
        'frio',
        'templado',
        'calido',
        'viento',
        'alto',
        'medio',
        'baja',
    ];

    public function fichas_tecnicas()
    {
    	return $this->hasMany('App\Ficha_Tecnica', 'climatologia_id');
    }
}
