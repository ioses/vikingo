<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");


for($meses=0;$meses<=60;$meses++){

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesMuerte="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Dif='$meses' AND B_Estado='2'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMuerte))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMuerte=$row[0];
	
$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoMuerte"=>$PacientesSeguimientoMuerte);
	
	
}	
mysqli_close($conexion);

echo json_encode($Valores);	



?>
