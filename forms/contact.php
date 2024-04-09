<?php

  $receiving_email_address = 'anabetocampos@gmail.com';

  // Si no puedes encontrar el archivo de la biblioteca PHP Email Form, proporciona una advertencia.
  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( '¡No se pudo cargar la biblioteca "PHP Email Form"!');
  }

  // Crea una instancia de la clase PHP_Email_Form
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  // Configura los destinatarios y los datos del correo electrónico
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Añade mensajes al cuerpo del correo electrónico
  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  // Envía el correo electrónico y devuelve el resultado
  echo $contact->send();
?>
