<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

/*
$sqlValorSeguimientoTotal="SELECT COUNT(*) FROM seguimiento_kaplan_meier";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoTotal))
    or die('Error: ' . mysqli_error());

	$PacientesTotal=$row[0];

*/



	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];	
	

		$TablaSeguimiento = $TablaSeguimiento ."<tr>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> Tiempo </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 0 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 12 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 24 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 36 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 48 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 60 </td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";
		
		$TablaSeguimiento = $TablaSeguimiento ."<tr>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\"> Total </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";	

mysqli_close($conexion);

echo $TablaSeguimiento;
?>