<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Configura los detalles del correo
    $to = $email;
    $subject = "Recuperación de contraseña";
    $message = "Hola,\n\nSe ha recibido una solicitud para restablecer tu contraseña. Sigue los pasos indicados en el correo para completar el proceso de recuperación.\n\nSaludos,\nEquipo de tu empresa";
    $headers = "From: tu_empresa@example.com";

    // Envía el correo
    if (mail($to, $subject, $message, $headers)) {
        echo "enviado";
    } else {
        echo "error";
    }
}
?>
