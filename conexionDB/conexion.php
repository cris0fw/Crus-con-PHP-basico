<?php
  // Voy a iniciar una session
  session_start();

    $conexion = mysqli_connect('localhost', 'root', "", 'crudconphp');

    if(isset($conexion)){
        return $conexion;
    }
   
?>
