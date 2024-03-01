<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fisiologia extends Model
{
    protected $table = 'fisiologias';

     protected $fillable = [
        'crecimiento', 'rapido', 'medio', 'lento', 'longevidad', 'alta', 'media', 'baja',
    ];

    public function fichas_tecnicas()
    {
    	return $this->hasMany('App\Ficha_Tecnica');
    }
}
