<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

/*
$sqlValorSeguimientoTotal="SELECT COUNT(*) FROM recidiva_kaplan_meier";
	
	$row = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoTotal))
    or die('Error: ' . mysqli_error());

	$PacientesTotal=$row[0];

*/

$Hospital=$_GET["Hospital"];


	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];
	
	
	
	
	
	
$sqlValorSeguimientoMes0Hospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=0 AND Hospital='$Hospital'";
	
	$row0Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hospital=$row0Hospital[0];
	
	
	
$sqlValorSeguimientoMes12Hospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=12 AND Hospital='$Hospital'";
	
	$row12Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hospital=$row12Hospital[0];	



$sqlValorSeguimientoMes24Hospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=24 AND Hospital='$Hospital'";
	
	$row24Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hospital=$row24Hospital[0];
	
	

$sqlValorSeguimientoMes36Hospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=36 AND Hospital='$Hospital'";
	
	$row36Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hospital=$row36Hospital[0];
	
	
	
$sqlValorSeguimientoMes48Hospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=48 AND Hospital='$Hospital'";
	
	$row48Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hospital=$row48Hospital[0];	



$sqlValorSeguimientoMes60Hospital="SELECT COUNT(*) FROM recidiva_kaplan_meier WHERE Meses_Seguimiento>=60 AND Hospital='$Hospital'";
	
	$row60Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hospital=$row60Hospital[0];	
		
		
	

		$TablaRecidiva = $TablaRecidiva ."<tr>";
		$TablaRecidiva = $TablaRecidiva ."<td> Tiempo </td>";
		$TablaRecidiva = $TablaRecidiva ."<td> 0 </td>";
		$TablaRecidiva = $TablaRecidiva ."<td> 12 </td>";
		$TablaRecidiva = $TablaRecidiva ."<td> 24 </td>";
		$TablaRecidiva = $TablaRecidiva ."<td> 36 </td>";
		$TablaRecidiva = $TablaRecidiva ."<td> 48 </td>";
		$TablaRecidiva = $TablaRecidiva ."<td> 60 </td>";
		
		$TablaRecidiva = $TablaRecidiva ."</tr>";
		
		$TablaRecidiva = $TablaRecidiva ."<tr>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"font-size: 90%\"> Total </td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaRecidiva = $TablaRecidiva ."</tr>";	
		
		
		
			$TablaRecidiva = $TablaRecidiva ."<tr>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90% \"> Total Hosp. </td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes0Hospital ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes12Hospital  ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes24Hospital  ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes36Hospital  ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes48Hospital  ."</td>";
		$TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes60Hospital  ."</td>";
		
		$TablaRecidiva = $TablaRecidiva ."</tr>";	
		

mysqli_close($conexion);

echo $TablaRecidiva;
?>