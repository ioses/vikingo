<?php
  //Se cierra la sesión del usuario en proyectovikingo.es
  //El enlace está referenciado en todas las páginas (Cerrar sesión)
  require_once ("../BDD/conexion.php");
  require_once ("../BDD/cierre_conexion.php");
  
  session_start();
  unset($_SESSION['Hospital']); 
  unset($_SESSION['autentificado']);
  unset($_SESSION['ultimoAcceso']);
  session_destroy();
  mysqli_close($conexion);
  header("Location: Sign_In.php");
  exit;
?>