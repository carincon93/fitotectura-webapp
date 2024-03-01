@component('mail::message')
# Nueva planta!

El usuario... te ha notificado para que incluyas una nueva planta en el sistema.

# {{ $plantaRecomendacion}}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
