<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificacionNuevaPlanta extends Mailable
{
    use Queueable, SerializesModels;

    public $plantaRecomendacion;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($plantaRecomendacion)
    {
        $this->plantaRecomendacion = $plantaRecomendacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notificacion_planta')
                    ->with([
                        'plantaRecomendacion' => $this->plantaRecomendacion,
                    ]);
    }
}
