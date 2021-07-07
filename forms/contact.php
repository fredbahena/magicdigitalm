<?php

  $errors = '';
  $myemail = 'mdm.digitalagency@gmail.com'; 
  if(empty($_POST['name'])  || 
    empty($_POST['email']) ||
    empty($_POST['subject']) || 
    empty($_POST['message']))
  {
      $errors .= "\n Error: Todos los campos son requeridos";
  }

  $name = $_POST['name']; 
  $email_address = $_POST['email'];
  $subject = $_POST['subject']; 
  $message = $_POST['message']; 

  if (!preg_match(
  "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
  $email_address))
  {
      $errors .= "\n Error: Correo electrónico no válido";
  }

  if( empty($errors))
  {
    $to = $myemail; 
    $email_subject = "MDM - $subject :: $name";
    $email_body = "You have received a new message. ".
    " Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
    
    $headers = "From: $myemail\n"; 
    $headers .= "Reply-To: $email_address";
    
    mail($to,$email_subject,$email_body,$headers);
    
  } 

    
?>
