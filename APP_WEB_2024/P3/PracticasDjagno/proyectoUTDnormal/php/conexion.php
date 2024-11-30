<?php

  $servidor="127.0.0.1";
  $usuario="root";
  $password="";
  $bd="bd_proyectoutd";


  //Conexion Procedural
  $conexion=mysqli_connect($servidor,$usuario,$password,$bd);
 
//   if ($conexion)
//      echo "Si está conectado, eaaaa";
  $conexion->set_charset("utf8mb4");
?>