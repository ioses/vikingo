<?php
//Comprueba la Fecha de alta del paciente con la fecha de intervención
session_start();
require_once ("../../BDD/conexion.php");

   

$HospitalN=$_SESSION["NombreHospital"];


$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$HospitalN'";

 	$row=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
	 	or die('Error: ' . mysqli_error());

	$Hospital=$row[0];
	
$NHC=$_SESSION["NHCPendientes"];	

	$sqlIdPaciente="SELECT ID FROM identificador_paciente WHERE NHC=AES_ENCRYPT('$NHC','$claveNHC') AND Id_Hospital = '$Hospital'";
	
	$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdPaciente))
	 	or die('Error: ' . mysqli_error());

	$IdPaciente=$row[0];
	
	
	$sqlIdCirugia="SELECT ID FROM cirugia WHERE Id_Paciente='$IdPaciente'";
	
	$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdCirugia))
	 	or die('Error: ' . mysqli_error());

	$IdCirugia=$row[0];
	

$FechaAlta = $_GET["q"];
   
   $sqlFechaComprueba="SELECT Fecha_Intervencion FROM tabla_cirugia WHERE Id_Cirugia='$IdCirugia'";
   
   	$row=mysqli_fetch_array(mysqli_query($conexion,$sqlFechaComprueba))
	 	or die('Error: ' . mysqli_error());
		
		
	$FechaIntervencion=$row[0];	
	
	$FechaAlta=strval($FechaAlta);
	$FechaIntervencion=strval($FechaIntervencion);
	
	if ($FechaAlta<$FechaIntervencion){
		echo ("1");
	}

	//echo ($FechaAlta);
	//echo ($FechaIntervencion);
	
	//$Diferencia=date_diff($FechaAlta,$FechaIntervencion);	
		
		
  	//echo($Hospital);
  //	echo ($Diferencia);
 mysqli_close($conexion); 	 
?>