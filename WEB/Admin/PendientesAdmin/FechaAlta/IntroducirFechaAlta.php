<?php
session_start();

require_once ("../../../BDD/conexion.php");

$NHC=$_POST["NHC"];
$_SESSION["NHCPendientes"]=$NHC;

if (isset($_POST["FechaAlta"])){
	$FechaAlta=$_POST["FechaAlta"];
}else{
	$FechaAlta=null;
}

$sqlIdPaciente="SELECT ID FROM identificador_paciente WHERE NHC= AES_ENCRYPT('$NHC','$claveNHC')";

$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdPaciente))
	 or die('Error: ' . mysqli_error());

$IdPaciente=$row[0];
$IdPaciente=intval($IdPaciente);

$sqlIdCirugia="SELECT ID FROM cirugia WHERE Id_Paciente='$IdPaciente'";

$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdCirugia))
	 or die('Error: ' . mysqli_error());
	 
$IdCirugia=$row[0];
$IdCirugia=intval($IdCirugia);

$sqlFechaAlta="UPDATE tabla_cirugia SET Fecha_Alta='$FechaAlta' WHERE Id_Cirugia='$IdCirugia'";

	mysqli_query($conexion,$sqlFechaAlta)
	 or die('Error: ' . mysqli_error());

mysqli_close($conexion);
 	 
	  header("Location: ../FinPendientes.php");   

?>