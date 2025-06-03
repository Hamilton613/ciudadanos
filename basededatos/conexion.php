<?php 
   // define las variables
   $servidor = "localhost";
   $usuario = "root";
   $password = ""; // usuario root no tiene contraseña
   $basededatos = "fs2025_ciudadanos";

   // conexión con mysqli
   $conexion = mysqli_connect($servidor, $usuario, $password, $basededatos);
   if (!$conexion) {
       die("Error en conexión: " . mysqli_connect_error());
   }
?>
