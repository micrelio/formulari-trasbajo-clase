<?php
 $showMessage = false;
if ($response != null && $response->success) {
    $showMessage = true;
    // a quien se envia el email
    $to = "info@microdeveloper.es";
    // sujeto del email
    $subject = "Micrelio web";
    // quien envia el correo
    $headers = "From: web@microdeveloper.es" . "\r\n";
    // quito el valor del recaptcha
    unset($_POST["g-recaptcha-response"]);
    $body = '';
    foreach ($_POST as $key => $value) {
        $body .= "{$key}: {$value}\n";
    }
    if (mail($to, $subject, $body, $headers)) {
        $error = false;
         echo "ENVIADO";
        $message = 'Enviado con exito';
    } else {
        echo "ERROR1";
        $error = true;
        $message = 'Error al enviar el email';
    }
} else {
//--si vacio
    if ($_POST) {
        echo "ERROR2";
        $showMessage = true;
        $error = true;
        $message = 'Error al enviar el formulario intente de nuevo';
    }
}
?>