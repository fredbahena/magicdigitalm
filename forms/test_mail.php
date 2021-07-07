<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = 'mdm.digitalagency@gmail.com';
    $to = 'fred.bahena@gmail.com';
    $subject = 'Test MDM';
    $message = 'Mensaje de Prueba';
    $headers = "From: $from";    
    mail($to,$subject,$message,$headers);
    echo 'El Email fue enviado';
?>