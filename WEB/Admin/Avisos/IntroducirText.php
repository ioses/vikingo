<?php
session_start();

require_once ("../../BDD/conexion.php");


$Avisos=strval($_POST["Avisos"]);
$hoy = date("y.m.d"); 


//Se carga en la base de datos el texto introducido en la caja de texto.
//Se accede a esta página desde el botón Enviar en administrador
//El primer mensaje aparecerá en la página principal de todos los hospitales


$sqlAviso="INSERT INTO avisos (Aviso, Fecha) VALUES ('$Avisos', '$hoy')";

		mysqli_query($conexion,$sqlAviso)
           or die('Error: ' . mysqli_error());

mysqli_close($conexion);

header("Location: ../../Principal_Admin.php");
?>