<?php

// Dirección de correo electrónico del destinatario
$receiving_email_address = 'anabetocampos@gmail.com';

// Verificar si existe la biblioteca PHP Email Form
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('¡No se pudo cargar la biblioteca "PHP Email Form"!');
}

// Crear una instancia de la clase PHP_Email_Form
$contact = new PHP_Email_Form;
$contact->ajax = true;

// Configurar destinatarios y datos del correo electrónico
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Agregar mensajes al cuerpo del correo electrónico
$contact->add_message($_POST['name'], 'Nombre');
$contact->add_message($_POST['email'], 'Correo electrónico');
$contact->add_message($_POST['message'], 'Mensaje', 10);

// Enviar el correo electrónico y devolver el resultado
echo $contact->send();

