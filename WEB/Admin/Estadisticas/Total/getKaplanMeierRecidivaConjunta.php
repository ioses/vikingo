<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

for($meses=0;$meses<=60;$meses++){

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesRecidiva="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Dif='$meses' AND B_Recidiva='1'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesRecidiva))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoRecidiva=$row[0];
	
$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoRecidiva"=>$PacientesSeguimientoRecidiva);
	
	
}
mysqli_close($conexion);
	
echo json_encode($Valores);	





?>
