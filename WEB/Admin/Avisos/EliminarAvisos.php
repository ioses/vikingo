<?php
session_start();
require_once ("../../BDD/conexion.php");


//Se eliminan todas las filas de la tabla avisos para que se queden en blanco
//Se llega a través del botón Eliminar Avisos en la página principal de administrador

$sqlAviso="DELETE FROM avisos";

		mysqli_query($conexion,$sqlAviso)
           or die('Error: ' . mysqli_error());


mysqli_close($conexion);

header("Location: ../../Principal_Admin.php");
?>