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


$APER=$_GET["APER"];  //Value==1

$AR=$_GET["AR"];  //Value==2

$Hartmann=$_GET["Hartmann"];  //Value==3


if ($APER==0 && $AR==0 && $Hartmann==3){
	
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
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";	


}else if ($APER==0 && $AR==2 && $Hartmann==0){
	
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
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";	


}else if ($APER==1 && $AR==0 && $Hartmann==0){
	
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
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";	



}else if ($APER==0 && $AR==2 && $Hartmann==3){
	
$sqlValorSeguimientoMes0AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2";
	
	$row0AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0AR=$row0AR[0];
	
	
	
$sqlValorSeguimientoMes12AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2";
	
	$row12AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12AR=$row12AR[0];	



$sqlValorSeguimientoMes24AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2";
	
	$row24AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24AR=$row24AR[0];
	
	

$sqlValorSeguimientoMes36AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2";
	
	$row36AR= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36AR=$row36AR[0];
	
	
	
$sqlValorSeguimientoMes48AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2";
	
	$row48AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48AR=$row48AR[0];	



$sqlValorSeguimientoMes60AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2";
	
	$row60AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60AR=$row60AR[0];	
	
	
	
	
	
	

$sqlValorSeguimientoMes0Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3";
	
	$row0Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hartmann=$row0Hartmann[0];
	
	
	
$sqlValorSeguimientoMes12Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3";
	
	$row12Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hartmann=$row12Hartmann[0];	



$sqlValorSeguimientoMes24Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3";
	
	$row24Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hartmann=$row24Hartmann[0];
	
	

$sqlValorSeguimientoMes36Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3";
	
	$row36Hartmann= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hartmann=$row36Hartmann[0];
	
	
	
$sqlValorSeguimientoMes48Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3";
	
	$row48Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hartmann=$row48Hartmann[0];	



$sqlValorSeguimientoMes60Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3";
	
	$row60Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hartmann=$row60Hartmann[0];		
	
	

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
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";		
		
		
		$TablaSeguimiento = $TablaSeguimiento ."<tr>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";


}else if ($APER==1 && $AR==0 && $Hartmann==3){
	
$sqlValorSeguimientoMes0APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1";
	
	$row0APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APER=$row0APER[0];
	
	
	
$sqlValorSeguimientoMes12APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1";
	
	$row12APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APER=$row12APER[0];	



$sqlValorSeguimientoMes24APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1";
	
	$row24APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APER=$row24APER[0];
	
	

$sqlValorSeguimientoMes36APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1";
	
	$row36APER= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APER=$row36APER[0];
	
	
	
$sqlValorSeguimientoMes48APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1";
	
	$row48APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APER=$row48APER[0];	



$sqlValorSeguimientoMes60APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1";
	
	$row60APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APER=$row60APER[0];	
	
	
	
	
	
	

$sqlValorSeguimientoMes0Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3";
	
	$row0Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hartmann=$row0Hartmann[0];
	
	
	
$sqlValorSeguimientoMes12Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3";
	
	$row12Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hartmann=$row12Hartmann[0];	



$sqlValorSeguimientoMes24Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3";
	
	$row24Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hartmann=$row24Hartmann[0];
	
	

$sqlValorSeguimientoMes36Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3";
	
	$row36Hartmann= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hartmann=$row36Hartmann[0];
	
	
	
$sqlValorSeguimientoMes48Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3";
	
	$row48Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hartmann=$row48Hartmann[0];	



$sqlValorSeguimientoMes60Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3";
	
	$row60Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hartmann=$row60Hartmann[0];		
	
	

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
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";		
		
		
			$TablaSeguimiento = $TablaSeguimiento ."<tr>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";
		


}else if ($APER==1 && $AR==2 && $Hartmann==0){
	
$sqlValorSeguimientoMes0APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1";
	
	$row0APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APER=$row0APER[0];
	
	
	
$sqlValorSeguimientoMes12APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1";
	
	$row12APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APER=$row12APER[0];	



$sqlValorSeguimientoMes24APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1";
	
	$row24APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APER=$row24APER[0];
	
	

$sqlValorSeguimientoMes36APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1";
	
	$row36APER= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APER=$row36APER[0];
	
	
	
$sqlValorSeguimientoMes48APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1";
	
	$row48APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APER=$row48APER[0];	



$sqlValorSeguimientoMes60APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1";
	
	$row60APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APER=$row60APER[0];	
	
	
	
	$sqlValorSeguimientoMes0AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2";
	
	$row0AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0AR=$row0AR[0];
	
	
	
$sqlValorSeguimientoMes12AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2";
	
	$row12AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12AR=$row12AR[0];	



$sqlValorSeguimientoMes24AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2";
	
	$row24AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24AR=$row24AR[0];
	
	

$sqlValorSeguimientoMes36AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2";
	
	$row36AR= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36AR=$row36AR[0];
	
	
	
$sqlValorSeguimientoMes48AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2";
	
	$row48AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48AR=$row48AR[0];	



$sqlValorSeguimientoMes60AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2";
	
	$row60AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60AR=$row60AR[0];	
	


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
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";	
		
		
				
		
		$TablaSeguimiento = $TablaSeguimiento ."<tr>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";	
			


}else if ($APER==1 && $AR==2 && $Hartmann==3){
	
$sqlValorSeguimientoMes0APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1";
	
	$row0APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APER=$row0APER[0];
	
	
	
$sqlValorSeguimientoMes12APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1";
	
	$row12APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APER=$row12APER[0];	



$sqlValorSeguimientoMes24APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1";
	
	$row24APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APER=$row24APER[0];
	
	

$sqlValorSeguimientoMes36APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1";
	
	$row36APER= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APER=$row36APER[0];
	
	
	
$sqlValorSeguimientoMes48APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1";
	
	$row48APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APER=$row48APER[0];	



$sqlValorSeguimientoMes60APER="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1";
	
	$row60APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APER=$row60APER[0];	
	
	
	
	$sqlValorSeguimientoMes0AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2";
	
	$row0AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0AR=$row0AR[0];
	
	
	
$sqlValorSeguimientoMes12AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2";
	
	$row12AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12AR=$row12AR[0];	



$sqlValorSeguimientoMes24AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2";
	
	$row24AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24AR=$row24AR[0];
	
	

$sqlValorSeguimientoMes36AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2";
	
	$row36AR= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36AR=$row36AR[0];
	
	
	
$sqlValorSeguimientoMes48AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2";
	
	$row48AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48AR=$row48AR[0];	



$sqlValorSeguimientoMes60AR="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2";
	
	$row60AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60AR=$row60AR[0];	
	
	
	
$sqlValorSeguimientoMes0Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3";
	
	$row0Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hartmann=$row0Hartmann[0];
	
	
	
$sqlValorSeguimientoMes12Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3";
	
	$row12Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hartmann=$row12Hartmann[0];	



$sqlValorSeguimientoMes24Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3";
	
	$row24Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hartmann=$row24Hartmann[0];
	
	

$sqlValorSeguimientoMes36Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3";
	
	$row36Hartmann= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hartmann=$row36Hartmann[0];
	
	
	
$sqlValorSeguimientoMes48Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3";
	
	$row48Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hartmann=$row48Hartmann[0];	



$sqlValorSeguimientoMes60Hartmann="SELECT COUNT(*) FROM seguimiento_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3";
	
	$row60Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hartmann=$row60Hartmann[0];		
		
	


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
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";		
		
		
				
		
		$TablaSeguimiento = $TablaSeguimiento ."<tr>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";	
		
		
		
		
		$TablaSeguimiento = $TablaSeguimiento ."<tr>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";


}
mysqli_close($conexion);

echo $TablaSeguimiento;
?>
