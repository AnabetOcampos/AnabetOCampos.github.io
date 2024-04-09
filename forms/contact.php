<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configura el correo electrónico de destino
    $receiving_email_address = 'anabetocampos@gmail.com';

    // Obtiene los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Formatea el mensaje de correo electrónico
    $email_message = "Nombre: $name\n";
    $email_message .= "Correo electrónico: $email\n";
    $email_message .= "Asunto: $subject\n";
    $email_message .= "Mensaje:\n$message\n";

    // Envía el correo electrónico
    if (mail($receiving_email_address, $subject, $email_message)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
