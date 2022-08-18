@component('mail::message')
Hola!<br>
Estas recibiendo este correo porque hemos recibido una solicitud para recuperar la contraseña de tu cuenta

@component('mail::button', ['url' => $urlToken])
Recuperar Contraseña
@endcomponent

Este link para recuperar tu contraseña caducara en 60 minutos.
Si no has solicitado recuperar tu contraseña, no hagas nada.

Si tienes problemas pulsando el boton puedes copiar el siguiente enlace y pegarlo en el navegador
{{$urlToken}}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
