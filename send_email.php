<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Validar que los datos no estén vacíos
    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        // Configuración del correo
        $to = "leonardopujol.lp@gmail.com"; // Reemplaza esto con tu dirección de correo electrónico
        $subject = "Nuevo mensaje de contacto de $nombre";
        $body = "Nombre: $nombre\nEmail: $email\n\nMensaje:\n$mensaje";
        $headers = "From: $email";

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensaje enviado con éxito.";
        } else {
            echo "Error al enviar el mensaje. Por favor, intenta de nuevo.";
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
