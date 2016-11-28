<?php

session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

/*
 * Creación de un array con el número de pacientes seguidos por meses
 * 
 * TIEMPO DE SEGUIMIENTO
 * 
 * El array resultante se utiliza para crear el gráfico kaplan-meier
 * 
 */


for($meses=0;$meses<=60;$meses++){

	$sqlValorSeguimientoMes="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif>'$meses'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimiento=$row[0];
	
	

		$sqlValorSeguimientoMesMetastasis="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Dif='$meses' AND B_Metastasis='1'";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMesMetastasis))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMetastasis=$row[0];
	


$Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				"SeguimientoMetastasis"=>$PacientesSeguimientoMetastasis);
	
	
}	
mysqli_close($conexion);

echo json_encode($Valores);	


?>