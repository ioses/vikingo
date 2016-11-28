<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

$Imagen=$_GET["Imagen"];


$sqlBorrarImagen="DELETE tabla_imagenes WHERE ImagenMetastasis1 not null";
	
	mysqli_fetch_array(mysqli_query($conexion,$sqlBorrarImagen))
    or die('Error: ' . mysqli_error());


$sqlMeterImagen="INSERT INTO tabla_imagenes (ImagenMetastasis1) VALUES ('$Imagen')";
	
	mysqli_fetch_array(mysqli_query($conexion,$sqlMeterImagen))
    or die('Error: ' . mysqli_error());

mysqli_close($conexion);

?>