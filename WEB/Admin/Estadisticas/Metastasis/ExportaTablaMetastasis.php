<?php

session_start();
require_once ("../../../BDD/conexion.php");


require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

$hoy=date("y-m-d");

        header("Cache-Control: no-cache, must-revalidate"); 
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Content-type: application/x-msexcel");  
header("Content-Disposition: attachment; filename=TablaMetastasis_$hoy.doc"); 
        header("Content-Description: PHP/INTERBASE Generated Data" ); 
        header("Expires: 0"); 
		
		
$DivisionHospital=$_SESSION["TipoInformeHospitales"];
$Hospital=$_SESSION["HospitalKaplanMeier"];

$APER=$_SESSION["reseccion_abd"];
$AR=$_SESSION["reseccion_anterior"];
$Hartmann=$_SESSION["hartmann"];


/*
 * Crea y exporta una tabla con los valores de seguimiento año por año
 * 
 * 
 * 
 */

//1=Todos los hospitales
//2=Seleccion por hospital


if ($DivisionHospital==1){
	

if ($APER==0 && $AR==0 && $Hartmann==3){
	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];	
	

		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	


}else if ($APER==0 && $AR==2 && $Hartmann==0){
	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];	
	

		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	


}else if ($APER==1 && $AR==0 && $Hartmann==0){
	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];	
	

		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	



}else if ($APER==0 && $AR==2 && $Hartmann==3){
	
$sqlValorSeguimientoMes0AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2";
	
	$row0AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0AR=$row0AR[0];
	
	
	
$sqlValorSeguimientoMes12AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2";
	
	$row12AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12AR=$row12AR[0];	



$sqlValorSeguimientoMes24AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2";
	
	$row24AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24AR=$row24AR[0];
	
	

$sqlValorSeguimientoMes36AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2";
	
	$row36AR= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36AR=$row36AR[0];
	
	
	
$sqlValorSeguimientoMes48AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2";
	
	$row48AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48AR=$row48AR[0];	



$sqlValorSeguimientoMes60AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2";
	
	$row60AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60AR=$row60AR[0];	
	
	
	
	
	
	

$sqlValorSeguimientoMes0Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3";
	
	$row0Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hartmann=$row0Hartmann[0];
	
	
	
$sqlValorSeguimientoMes12Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3";
	
	$row12Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hartmann=$row12Hartmann[0];	



$sqlValorSeguimientoMes24Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3";
	
	$row24Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hartmann=$row24Hartmann[0];
	
	

$sqlValorSeguimientoMes36Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3";
	
	$row36Hartmann= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hartmann=$row36Hartmann[0];
	
	
	
$sqlValorSeguimientoMes48Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3";
	
	$row48Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hartmann=$row48Hartmann[0];	



$sqlValorSeguimientoMes60Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3";
	
	$row60Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hartmann=$row60Hartmann[0];		
	
	

		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
			$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";		


}else if ($APER==1 && $AR==0 && $Hartmann==3){
	
$sqlValorSeguimientoMes0APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1";
	
	$row0APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APER=$row0APER[0];
	
	
	
$sqlValorSeguimientoMes12APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1";
	
	$row12APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APER=$row12APER[0];	



$sqlValorSeguimientoMes24APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1";
	
	$row24APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APER=$row24APER[0];
	
	

$sqlValorSeguimientoMes36APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1";
	
	$row36APER= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APER=$row36APER[0];
	
	
	
$sqlValorSeguimientoMes48APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1";
	
	$row48APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APER=$row48APER[0];	



$sqlValorSeguimientoMes60APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1";
	
	$row60APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APER=$row60APER[0];	
	
	
	
	
	
	

$sqlValorSeguimientoMes0Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3";
	
	$row0Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hartmann=$row0Hartmann[0];
	
	
	
$sqlValorSeguimientoMes12Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3";
	
	$row12Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hartmann=$row12Hartmann[0];	



$sqlValorSeguimientoMes24Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3";
	
	$row24Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hartmann=$row24Hartmann[0];
	
	

$sqlValorSeguimientoMes36Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3";
	
	$row36Hartmann= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hartmann=$row36Hartmann[0];
	
	
	
$sqlValorSeguimientoMes48Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3";
	
	$row48Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hartmann=$row48Hartmann[0];	



$sqlValorSeguimientoMes60Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3";
	
	$row60Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hartmann=$row60Hartmann[0];		
	
	

		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
				$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";		
		
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		


}else if ($APER==1 && $AR==2 && $Hartmann==0){
	
$sqlValorSeguimientoMes0APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1";
	
	$row0APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APER=$row0APER[0];
	
	
	
$sqlValorSeguimientoMes12APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1";
	
	$row12APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APER=$row12APER[0];	



$sqlValorSeguimientoMes24APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1";
	
	$row24APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APER=$row24APER[0];
	
	

$sqlValorSeguimientoMes36APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1";
	
	$row36APER= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APER=$row36APER[0];
	
	
	
$sqlValorSeguimientoMes48APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1";
	
	$row48APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APER=$row48APER[0];	



$sqlValorSeguimientoMes60APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1";
	
	$row60APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APER=$row60APER[0];	
	
	
	
	$sqlValorSeguimientoMes0AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2";
	
	$row0AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0AR=$row0AR[0];
	
	
	
$sqlValorSeguimientoMes12AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2";
	
	$row12AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12AR=$row12AR[0];	



$sqlValorSeguimientoMes24AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2";
	
	$row24AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24AR=$row24AR[0];
	
	

$sqlValorSeguimientoMes36AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2";
	
	$row36AR= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36AR=$row36AR[0];
	
	
	
$sqlValorSeguimientoMes48AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2";
	
	$row48AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48AR=$row48AR[0];	



$sqlValorSeguimientoMes60AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2";
	
	$row60AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60AR=$row60AR[0];	
	


		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
				
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";		
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	
		




}else if ($APER==1 && $AR==2 && $Hartmann==3){
	
$sqlValorSeguimientoMes0APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1";
	
	$row0APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APER=$row0APER[0];
	
	
	
$sqlValorSeguimientoMes12APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1";
	
	$row12APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APER=$row12APER[0];	



$sqlValorSeguimientoMes24APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1";
	
	$row24APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APER=$row24APER[0];
	
	

$sqlValorSeguimientoMes36APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1";
	
	$row36APER= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APER=$row36APER[0];
	
	
	
$sqlValorSeguimientoMes48APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1";
	
	$row48APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APER=$row48APER[0];	



$sqlValorSeguimientoMes60APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1";
	
	$row60APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APER=$row60APER[0];	
	
	
	
	$sqlValorSeguimientoMes0AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2";
	
	$row0AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0AR=$row0AR[0];
	
	
	
$sqlValorSeguimientoMes12AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2";
	
	$row12AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12AR=$row12AR[0];	



$sqlValorSeguimientoMes24AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2";
	
	$row24AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24AR=$row24AR[0];
	
	

$sqlValorSeguimientoMes36AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2";
	
	$row36AR= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36AR=$row36AR[0];
	
	
	
$sqlValorSeguimientoMes48AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2";
	
	$row48AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48AR=$row48AR[0];	



$sqlValorSeguimientoMes60AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2";
	
	$row60AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60AR=$row60AR[0];	
	
	
	
$sqlValorSeguimientoMes0Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3";
	
	$row0Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hartmann=$row0Hartmann[0];
	
	
	
$sqlValorSeguimientoMes12Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3";
	
	$row12Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hartmann=$row12Hartmann[0];	



$sqlValorSeguimientoMes24Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3";
	
	$row24Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hartmann=$row24Hartmann[0];
	
	

$sqlValorSeguimientoMes36Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3";
	
	$row36Hartmann= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hartmann=$row36Hartmann[0];
	
	
	
$sqlValorSeguimientoMes48Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3";
	
	$row48Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hartmann=$row48Hartmann[0];	



$sqlValorSeguimientoMes60Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3";
	
	$row60Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hartmann=$row60Hartmann[0];		
		
	


		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";		
		
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	
		


		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";

	}



//Creacion de la tabla de metastasis conjunta
	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento >= 0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];	
	

		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<tr>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> Tiempo </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 0 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 12 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 24 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 36 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 48 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 60 </td>";
		
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."</tr>";

		
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<tr>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\"> Total </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."</tr>";	


		

}else{
	if ($APER==0 && $AR==0 && $Hartmann==3){
	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];	
	

	

	
$sqlValorSeguimientoMes0Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Hospital='$Hospital'";
	
	$row0Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hospital=$row0Hospital[0];
	
	
	
$sqlValorSeguimientoMes12Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Hospital='$Hospital'";
	
	$row12Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hospital=$row12Hospital[0];	



$sqlValorSeguimientoMes24Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Hospital='$Hospital'";
	
	$row24Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hospital=$row24Hospital[0];
	
	

$sqlValorSeguimientoMes36Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Hospital='$Hospital'";
	
	$row36Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hospital=$row36Hospital[0];
	
	
	
$sqlValorSeguimientoMes48Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Hospital='$Hospital'";
	
	$row48Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hospital=$row48Hospital[0];	



$sqlValorSeguimientoMes60Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Hospital='$Hospital'";
	
	$row60Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hospital=$row60Hospital[0];			
	
	
	
		
	

		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\"> Hartmann Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes0Hospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes12Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes24Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes36Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes48Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes60Hospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	


}else if ($APER==0 && $AR==2 && $Hartmann==0){
	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];	
	
	
	
//Datos del hospital concreto	
	
	
$sqlValorSeguimientoMes0Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Hospital='$Hospital'";
	
	$row0Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hospital=$row0Hospital[0];
	
	
	
$sqlValorSeguimientoMes12Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Hospital='$Hospital'";
	
	$row12Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hospital=$row12Hospital[0];	



$sqlValorSeguimientoMes24Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Hospital='$Hospital'";
	
	$row24Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hospital=$row24Hospital[0];
	
	

$sqlValorSeguimientoMes36Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Hospital='$Hospital'";
	
	$row36Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hospital=$row36Hospital[0];
	
	
	
$sqlValorSeguimientoMes48Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Hospital='$Hospital'";
	
	$row48Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hospital=$row48Hospital[0];	



$sqlValorSeguimientoMes60Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Hospital='$Hospital'";
	
	$row60Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hospital=$row60Hospital[0];			
	
//Tabla resultante	


		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	
		
		
		
				$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\"> AR Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes0Hospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes12Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes24Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes36Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes48Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes60Hospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		


}else if ($APER==1 && $AR==0 && $Hartmann==0){
	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];	
	
	
	
	
	

	//Datos del hospital concreto	
	
	
$sqlValorSeguimientoMes0Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Hospital='$Hospital'";
	
	$row0Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hospital=$row0Hospital[0];
	
	
	
$sqlValorSeguimientoMes12Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Hospital='$Hospital'";
	
	$row12Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hospital=$row12Hospital[0];	



$sqlValorSeguimientoMes24Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Hospital='$Hospital'";
	
	$row24Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hospital=$row24Hospital[0];
	
	

$sqlValorSeguimientoMes36Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Hospital='$Hospital'";
	
	$row36Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hospital=$row36Hospital[0];
	
	
	
$sqlValorSeguimientoMes48Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Hospital='$Hospital'";
	
	$row48Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hospital=$row48Hospital[0];	



$sqlValorSeguimientoMes60Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Hospital='$Hospital'";
	
	$row60Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hospital=$row60Hospital[0];	
	
		
	
	

		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	
		
		
			$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\"> APER Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes0Hospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes12Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes24Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes36Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes48Hospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes60Hospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		



}else if ($APER==0 && $AR==2 && $Hartmann==3){
	
$sqlValorSeguimientoMes0AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2";
	
	$row0AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0AR=$row0AR[0];
	
	
	
$sqlValorSeguimientoMes12AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2";
	
	$row12AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12AR=$row12AR[0];	



$sqlValorSeguimientoMes24AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2";
	
	$row24AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24AR=$row24AR[0];
	
	

$sqlValorSeguimientoMes36AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2";
	
	$row36AR= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36AR=$row36AR[0];
	
	
	
$sqlValorSeguimientoMes48AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2";
	
	$row48AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48AR=$row48AR[0];	



$sqlValorSeguimientoMes60AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2";
	
	$row60AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60AR=$row60AR[0];	
	
	
	
	
	
	

$sqlValorSeguimientoMes0Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3";
	
	$row0Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hartmann=$row0Hartmann[0];
	
	
	
$sqlValorSeguimientoMes12Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3";
	
	$row12Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hartmann=$row12Hartmann[0];	



$sqlValorSeguimientoMes24Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3";
	
	$row24Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hartmann=$row24Hartmann[0];
	
	

$sqlValorSeguimientoMes36Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3";
	
	$row36Hartmann= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hartmann=$row36Hartmann[0];
	
	
	
$sqlValorSeguimientoMes48Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3";
	
	$row48Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hartmann=$row48Hartmann[0];	



$sqlValorSeguimientoMes60Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3";
	
	$row60Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hartmann=$row60Hartmann[0];	
	
	
	
	
	
	
	$sqlValorSeguimientoMes0ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row0ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0ARHospital=$row0ARHospital[0];
	
	
	
$sqlValorSeguimientoMes12ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row12ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12ARHospital=$row12ARHospital[0];	



$sqlValorSeguimientoMes24ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row24ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24ARHospital=$row24ARHospital[0];
	
	

$sqlValorSeguimientoMes36ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row36ARHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36ARHospital=$row36ARHospital[0];
	
	
	
$sqlValorSeguimientoMes48ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row48ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48ARHospital=$row48ARHospital[0];	



$sqlValorSeguimientoMes60ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row60ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60ARHospital=$row60ARHospital[0];	
	
	
	
	
	
	

$sqlValorSeguimientoMes0HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row0HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0HartmannHospital=$row0HartmannHospital[0];
	
	
	
$sqlValorSeguimientoMes12HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row12HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12HartmannHospital=$row12HartmannHospital[0];	



$sqlValorSeguimientoMes24HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row24HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24HartmannHospital=$row24HartmannHospital[0];
	
	

$sqlValorSeguimientoMes36HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row36HartmannHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36HartmannHospital=$row36HartmannHospital[0];
	
	
	
$sqlValorSeguimientoMes48HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row48HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48HartmannHospital=$row48HartmannHospital[0];	



$sqlValorSeguimientoMes60HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row60HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60HartmannHospital=$row60HartmannHospital[0];	
	
	


		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		

		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\"> AR Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes0ARHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes12ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes24ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes36ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes48ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes60ARHospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	
		
				
		
		
			$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\"> Hartmann Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes0HartmannHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes12HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes24HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes36HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes48HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes60HartmannHospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
				


}else if ($APER==1 && $AR==0 && $Hartmann==3){
	
$sqlValorSeguimientoMes0APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1";
	
	$row0APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APER=$row0APER[0];
	
	
	
$sqlValorSeguimientoMes12APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1";
	
	$row12APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APER=$row12APER[0];	



$sqlValorSeguimientoMes24APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1";
	
	$row24APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APER=$row24APER[0];
	
	

$sqlValorSeguimientoMes36APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1";
	
	$row36APER= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APER=$row36APER[0];
	
	
	
$sqlValorSeguimientoMes48APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1";
	
	$row48APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APER=$row48APER[0];	



$sqlValorSeguimientoMes60APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1";
	
	$row60APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APER=$row60APER[0];	
	
	
	
	
	
	

$sqlValorSeguimientoMes0Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3";
	
	$row0Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hartmann=$row0Hartmann[0];
	
	
	
$sqlValorSeguimientoMes12Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3";
	
	$row12Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hartmann=$row12Hartmann[0];	



$sqlValorSeguimientoMes24Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3";
	
	$row24Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hartmann=$row24Hartmann[0];
	
	

$sqlValorSeguimientoMes36Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3";
	
	$row36Hartmann= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hartmann=$row36Hartmann[0];
	
	
	
$sqlValorSeguimientoMes48Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3";
	
	$row48Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hartmann=$row48Hartmann[0];	



$sqlValorSeguimientoMes60Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3";
	
	$row60Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hartmann=$row60Hartmann[0];		
	
	



$sqlValorSeguimientoMes0APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row0APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APERHospital=$row0APERHospital[0];
	
	
	
$sqlValorSeguimientoMes12APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row12APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APERHospital=$row12APERHospital[0];	



$sqlValorSeguimientoMes24APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row24APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APERHospital=$row24APERHospital[0];
	
	

$sqlValorSeguimientoMes36APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row36APERHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APERHospital=$row36APERHospital[0];
	
	
	
$sqlValorSeguimientoMes48APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row48APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APERHospital=$row48APERHospital[0];	



$sqlValorSeguimientoMes60APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row60APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APERHospital=$row60APERHospital[0];
	
	
	
	
	
	

$sqlValorSeguimientoMes0HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row0HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0HartmannHospital=$row0HartmannHospital[0];
	
	
	
$sqlValorSeguimientoMes12HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row12HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12HartmannHospital=$row12HartmannHospital[0];	



$sqlValorSeguimientoMes24HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row24HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24HartmannHospital=$row24HartmannHospital[0];
	
	

$sqlValorSeguimientoMes36HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row36HartmannHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36HartmannHospital=$row36HartmannHospital[0];
	
	
	
$sqlValorSeguimientoMes48HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row48HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48HartmannHospital=$row48HartmannHospital[0];	



$sqlValorSeguimientoMes60HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row60HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60HartmannHospital=$row60HartmannHospital[0];	
			

		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
				$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
	
		
		
			$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\"> APER Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes0APERHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes12APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes24APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes36APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes48APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes60APERHospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";


			
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\"> Hartmann Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes0HartmannHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes12HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes24HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes36HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes48HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes60HartmannHospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		



}else if ($APER==1 && $AR==2 && $Hartmann==0){
	
$sqlValorSeguimientoMes0APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1";
	
	$row0APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APER=$row0APER[0];
	
	
	
$sqlValorSeguimientoMes12APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1";
	
	$row12APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APER=$row12APER[0];	



$sqlValorSeguimientoMes24APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1";
	
	$row24APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APER=$row24APER[0];
	
	

$sqlValorSeguimientoMes36APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1";
	
	$row36APER= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APER=$row36APER[0];
	
	
	
$sqlValorSeguimientoMes48APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1";
	
	$row48APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APER=$row48APER[0];	



$sqlValorSeguimientoMes60APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1";
	
	$row60APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APER=$row60APER[0];	
	
	
	
	$sqlValorSeguimientoMes0AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2";
	
	$row0AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0AR=$row0AR[0];
	
	
	
$sqlValorSeguimientoMes12AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2";
	
	$row12AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12AR=$row12AR[0];	



$sqlValorSeguimientoMes24AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2";
	
	$row24AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24AR=$row24AR[0];
	
	

$sqlValorSeguimientoMes36AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2";
	
	$row36AR= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36AR=$row36AR[0];
	
	
	
$sqlValorSeguimientoMes48AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2";
	
	$row48AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48AR=$row48AR[0];	



$sqlValorSeguimientoMes60AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2";
	
	$row60AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60AR=$row60AR[0];	
	
	
	
	
	

$sqlValorSeguimientoMes0APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row0APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APERHospital=$row0APERHospital[0];
	
	
	
$sqlValorSeguimientoMes12APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row12APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APERHospital=$row12APERHospital[0];	



$sqlValorSeguimientoMes24APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row24APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APERHospital=$row24APERHospital[0];
	
	

$sqlValorSeguimientoMes36APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row36APERHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APERHospital=$row36APERHospital[0];
	
	
	
$sqlValorSeguimientoMes48APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row48APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APERHospital=$row48APERHospital[0];	



$sqlValorSeguimientoMes60APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row60APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APERHospital=$row60APERHospital[0];
	
	
	
	
	
	
	$sqlValorSeguimientoMes0ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row0ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0ARHospital=$row0ARHospital[0];
	
	
	
$sqlValorSeguimientoMes12ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row12ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12ARHospital=$row12ARHospital[0];	



$sqlValorSeguimientoMes24ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row24ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24ARHospital=$row24ARHospital[0];
	
	

$sqlValorSeguimientoMes36ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row36ARHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36ARHospital=$row36ARHospital[0];
	
	
	
$sqlValorSeguimientoMes48ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row48ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48ARHospital=$row48ARHospital[0];	



$sqlValorSeguimientoMes60ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row60ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60ARHospital=$row60ARHospital[0];	
		


		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	
		


		
		
		
					$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\"> APER Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes0APERHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes12APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes24APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes36APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes48APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes60APERHospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
		
		
				$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\"> AR Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes0ARHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes12ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes24ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes36ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes48ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes60ARHospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	
				


}else if ($APER==1 && $AR==2 && $Hartmann==3){
	
$sqlValorSeguimientoMes0APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1";
	
	$row0APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APER=$row0APER[0];
	
	
	
$sqlValorSeguimientoMes12APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1";
	
	$row12APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APER=$row12APER[0];	



$sqlValorSeguimientoMes24APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1";
	
	$row24APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APER=$row24APER[0];
	
	

$sqlValorSeguimientoMes36APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1";
	
	$row36APER= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APER=$row36APER[0];
	
	
	
$sqlValorSeguimientoMes48APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1";
	
	$row48APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APER=$row48APER[0];	



$sqlValorSeguimientoMes60APER="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1";
	
	$row60APER = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APER))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APER=$row60APER[0];	
	
	
	
	$sqlValorSeguimientoMes0AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2";
	
	$row0AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0AR=$row0AR[0];
	
	
	
$sqlValorSeguimientoMes12AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2";
	
	$row12AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12AR=$row12AR[0];	



$sqlValorSeguimientoMes24AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2";
	
	$row24AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24AR=$row24AR[0];
	
	

$sqlValorSeguimientoMes36AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2";
	
	$row36AR= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36AR=$row36AR[0];
	
	
	
$sqlValorSeguimientoMes48AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2";
	
	$row48AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48AR=$row48AR[0];	



$sqlValorSeguimientoMes60AR="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2";
	
	$row60AR = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60AR))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60AR=$row60AR[0];	
	
	
	
$sqlValorSeguimientoMes0Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3";
	
	$row0Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hartmann=$row0Hartmann[0];
	
	
	
$sqlValorSeguimientoMes12Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3";
	
	$row12Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hartmann=$row12Hartmann[0];	



$sqlValorSeguimientoMes24Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3";
	
	$row24Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hartmann=$row24Hartmann[0];
	
	

$sqlValorSeguimientoMes36Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3";
	
	$row36Hartmann= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hartmann=$row36Hartmann[0];
	
	
	
$sqlValorSeguimientoMes48Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3";
	
	$row48Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hartmann=$row48Hartmann[0];	



$sqlValorSeguimientoMes60Hartmann="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3";
	
	$row60Hartmann = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hartmann))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hartmann=$row60Hartmann[0];	
	
	
	
	

$sqlValorSeguimientoMes0HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row0HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0HartmannHospital=$row0HartmannHospital[0];
	
	
	
$sqlValorSeguimientoMes12HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row12HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12HartmannHospital=$row12HartmannHospital[0];	



$sqlValorSeguimientoMes24HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row24HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24HartmannHospital=$row24HartmannHospital[0];
	
	

$sqlValorSeguimientoMes36HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row36HartmannHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36HartmannHospital=$row36HartmannHospital[0];
	
	
	
$sqlValorSeguimientoMes48HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row48HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48HartmannHospital=$row48HartmannHospital[0];	



$sqlValorSeguimientoMes60HartmannHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=3 AND Hospital='$Hospital'";
	
	$row60HartmannHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60HartmannHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60HartmannHospital=$row60HartmannHospital[0];	
				
				



$sqlValorSeguimientoMes0APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row0APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0APERHospital=$row0APERHospital[0];
	
	
	
$sqlValorSeguimientoMes12APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row12APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12APERHospital=$row12APERHospital[0];	



$sqlValorSeguimientoMes24APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row24APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24APERHospital=$row24APERHospital[0];
	
	

$sqlValorSeguimientoMes36APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row36APERHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36APERHospital=$row36APERHospital[0];
	
	
	
$sqlValorSeguimientoMes48APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row48APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48APERHospital=$row48APERHospital[0];	



$sqlValorSeguimientoMes60APERHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=1 AND Hospital='$Hospital'";
	
	$row60APERHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60APERHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60APERHospital=$row60APERHospital[0];
	
	
	
	
	
	
	$sqlValorSeguimientoMes0ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row0ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0ARHospital=$row0ARHospital[0];
	
	
	
$sqlValorSeguimientoMes12ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row12ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12ARHospital=$row12ARHospital[0];	



$sqlValorSeguimientoMes24ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row24ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24ARHospital=$row24ARHospital[0];
	
	

$sqlValorSeguimientoMes36ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row36ARHospital= mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36ARHospital=$row36ARHospital[0];
	
	
	
$sqlValorSeguimientoMes48ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row48ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48ARHospital=$row48ARHospital[0];	



$sqlValorSeguimientoMes60ARHospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Tec_Cir=2 AND Hospital='$Hospital'";
	
	$row60ARHospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60ARHospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60ARHospital=$row60ARHospital[0];	
						
				
		
		
	


		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
				
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";		
		
		
		
		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	
		

		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		

		
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\"> APER Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes0APERHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes12APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes24APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes36APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes48APERHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes60APERHospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
		
		
		
				$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\"> AR Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes0ARHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes12ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes24ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes36ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes48ARHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes60ARHospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";	



				
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\"> Hartmann Hosp. </td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes0HartmannHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes12HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes24HartmannHospital ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes36HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes48HartmannHospital  ."</td>";
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes60HartmannHospital  ."</td>";
		
		$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
		
			

}

	
$sqlValorSeguimientoMes0="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento >= 0";
	
	$row0 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0=$row0[0];
	
	
	
$sqlValorSeguimientoMes12="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12";
	
	$row12 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12=$row12[0];	



$sqlValorSeguimientoMes24="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24";
	
	$row24 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24=$row24[0];
	
	

$sqlValorSeguimientoMes36="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36";
	
	$row36 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36=$row36[0];
	
	
	
$sqlValorSeguimientoMes48="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48";
	
	$row48 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48=$row48[0];	



$sqlValorSeguimientoMes60="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60";
	
	$row60 = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60=$row60[0];
	
	
	
	
	
	
$sqlValorSeguimientoMes0Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=0 AND Hospital='$Hospital'";
	
	$row0Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes0Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes0Hospital=$row0Hospital[0];
	
	
	
$sqlValorSeguimientoMes12Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=12 AND Hospital='$Hospital'";
	
	$row12Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes12Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes12Hospital=$row12Hospital[0];	



$sqlValorSeguimientoMes24Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=24 AND Hospital='$Hospital'";
	
	$row24Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes24Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes24Hospital=$row24Hospital[0];
	
	

$sqlValorSeguimientoMes36Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=36 AND Hospital='$Hospital'";
	
	$row36Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes36Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes36Hospital=$row36Hospital[0];
	
	
	
$sqlValorSeguimientoMes48Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=48 AND Hospital='$Hospital'";
	
	$row48Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes48Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes48Hospital=$row48Hospital[0];	



$sqlValorSeguimientoMes60Hospital="SELECT COUNT(*) FROM metastasis_kaplan_meier WHERE Meses_Seguimiento>=60 AND Hospital='$Hospital'";
	
	$row60Hospital = mysqli_fetch_array(mysqli_query($conexion,$sqlValorSeguimientoMes60Hospital))
    or die('Error: ' . mysqli_error());

	$PacientesSeguimientoMes60Hospital=$row60Hospital[0];	
		
		
	

		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<tr>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> Tiempo </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 0 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 12 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 24 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 36 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 48 </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td> 60 </td>";
		
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."</tr>";
		
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<tr>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\"> Total </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."</tr>";	
		
		
		
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<tr>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"color: #FF0000; font-size: 90% \"> Total Hosp. </td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes0Hospital ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes12Hospital  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes24Hospital  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes36Hospital  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes48Hospital  ."</td>";
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes60Hospital  ."</td>";
		
		$TablaMetastasisTecnicaConjunta = $TablaMetastasisTecnicaConjunta ."</tr>";	
	
}		
		
mysqli_close($conexion);			

echo "Imagen Metastasis 1";

echo "<table> "; 
echo $TablaMetastasisTecnica;		
echo "</table>";	

echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";


echo "Imagen Metastasis Total";	
		
echo "<table> "; 
echo $TablaMetastasisTecnicaConjunta;		
echo "</table>";		


?>