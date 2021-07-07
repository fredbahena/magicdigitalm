<?php

  $errors = 0;
  $msg = '';

  $from = 'mdm.digitalagency@gmail.com'; 

  if(empty($_POST['name'])  || 
    empty($_POST['email']) ||
    empty($_POST['subject']) || 
    empty($_POST['message']))
  {
    $msg = 'Error: Todos los campos son requeridos'
    die( $msg );
    $errors += 1;
  }

  $name = $_POST['name']; 
  $to = $_POST['email'];
  $subject = $_POST['subject']; 
  $message = $_POST['message']; 

  if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $to)) {
    $msg = 'Error: Correo electrónico no válido'
    die( $msg );
    $errors += 1
  }

  if( $errors == 0 ) {
    
    $email_subject = "MDM - $subject :: $name";
    $email_message = "Recibiste un nuevo mensaje. Aquí los detalles:".
    "\n Nombre: $name \n Email: $to \n Mensaje: \n $message"; 
    
    $headers = "From: $from"; 
        
    mail($to,$email_subject,$email_message,$headers);

    $msg = 'OK';
    echo $msg;
    
  } else {

    echo $msg;

  }
    
?>
