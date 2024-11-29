<?php
// Configuración del correo
$destinatario = "techesscode@gmail.com"; // Tu correo electrónico
$asunto = "Nuevo mensaje desde el formulario de contacto";

// Validar datos del formulario
$nombre = isset($_POST['introducir_nombre']) ? strip_tags($_POST['introducir_nombre']) : '';
$email = isset($_POST['introducir_email']) ? strip_tags($_POST['introducir_email']) : '';
$telefono = isset($_POST['introducir_telefono']) ? strip_tags($_POST['introducir_telefono']) : 'No proporcionado';
$website = isset($_POST['introducir_website']) ? strip_tags($_POST['introducir_website']) : 'No proporcionado';
$mensaje = isset($_POST['introducir_mensaje']) ? strip_tags($_POST['introducir_mensaje']) : '';
$asunto_form = isset($_POST['introducir_asunto']) ? strip_tags($_POST['introducir_asunto']) : 'Sin asunto';

// Verificar que los campos obligatorios estén llenos
if (empty($nombre) || empty($email) || empty($mensaje)) {
    echo "Por favor, completa todos los campos obligatorios.";
    exit;
}

// Crear el mensaje
$cuerpo = "
    <html>
    <head>
        <title>Nuevo mensaje desde el formulario de contacto</title>
    </head>
    <body>
        <h2>Información del remitente:</h2>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Teléfono:</strong> $telefono</p>
        <p><strong>Sitio web:</strong> $website</p>
        <p><strong>Asunto:</strong> $asunto_form</p>
        <p><strong>Mensaje:</strong></p>
        <p>$mensaje</p>
    </body>
    </html>
";

// Encabezados para enviar correo en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: $nombre <$email>\r\n";

// Enviar el correo
if (mail($destinatario, $asunto, $cuerpo, $headers)) {
    echo "Mensaje enviado exitosamente. ¡Gracias por contactarnos!";
} else {
    echo "Ocurrió un error al enviar el mensaje. Por favor, inténtalo de nuevo.";
}
?>
