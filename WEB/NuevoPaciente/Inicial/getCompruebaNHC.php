<?php

//comprueba que el NHC introducido por el usuario no coincida con
//uno existente
session_start();
require_once ("../../BDD/conexion.php");
require_once("Carga_Datos_Inicial.php");

   

$Hospital=$_SESSION["NombreHospital"];

$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

 	$row=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
	 	or die('Error: ' . mysqli_error());

	$Hospital=$row[0];

$NHC = $_GET["q"];
   
   $sqlNHCComprueba="SELECT COUNT(*) FROM identificador_paciente WHERE NHC=AES_ENCRYPT('$NHC','$claveNHC') AND Id_Hospital='$Hospital'";
   
   	$row=mysqli_fetch_array(mysqli_query($conexion,$sqlNHCComprueba))
	 	or die('Error: ' . mysqli_error());
		
  	//echo($Hospital);
  
  	if($row[0]!=0){
  	echo (1);
  	}  
    
mysqli_close($conexion);
 
?>