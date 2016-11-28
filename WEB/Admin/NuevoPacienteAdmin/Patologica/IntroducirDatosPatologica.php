<?php


session_start();
require_once ("../../../BDD/conexion.php");

/*
 * Variable para ver si es la primera vez que se carga la página
 */

$Enviar_Patologica="Enviar";
$_SESSION["ButtonEnviarPatologica"]=$Enviar_Patologica;



if (isset($_POST["tabla_tipo_histologico"])){
	$Tipo_Histologico=$_POST["tabla_tipo_histologico"];
	$Tipo_Histologico=strip_tags($Tipo_Histologico);
    $Tipo_Histologico=intval($Tipo_Histologico);
}else{
    $Tipo_Histologico=null;
}

$_SESSION["Tipo_Histologico"]=$Tipo_Histologico;


if (isset($_POST["tabla_tipo_otros_histologico"])){
	$Otros_Histologico=$_POST["tabla_tipo_otros_histologico"];
	$Otros_Histologico=strip_tags($Otros_Histologico);
    $Otros_Histologico=utf8_decode($Otros_Histologico);
    
}else{
    $Otros_Histologico=null;
}

$_SESSION["Otros_Histologico"]=$Otros_Histologico;



if (isset($_POST["tabla_tipo_t"])){
	$T_Patologico=$_POST["tabla_tipo_t"];
	$T_Patologico=strip_tags($T_Patologico);
    if($T_Patologico == 0)
    {
        $T_Patologico=null;
    }
    $T_Patologico=intval($T_Patologico);
}else{
    $T_Patologico=null;
}

$_SESSION["T_Patologico"]=$T_Patologico;



if (isset($_POST["tabla_tipo_n"])){
	$N_Patologico=$_POST["tabla_tipo_n"];
	$N_Patologico=strip_tags($N_Patologico);
    //$N_Patologico=intval($N_Patologico);
}else{
    $N_Patologico=null;
}

$_SESSION["N_Patologico"]=$N_Patologico;



if (isset($_POST["tabla_tipo_m"])){
	$M_Patologico=$_POST["tabla_tipo_m"];
    //$M_Patologico=intval($M_Patologico);
}else{
    $M_Patologico=null;
}

$_SESSION["M_Patologico"]=$M_Patologico;



if (isset($_POST["Ganglios_Ais"])){
	$Ganglios_Aislados=$_POST["Ganglios_Ais"];
	$Ganglios_Aislados=strip_tags($Ganglios_Aislados);
    $Ganglios_Aislados=intval($Ganglios_Aislados);
}else{
    $Ganglios_Aislados=null;
}

$_SESSION["Ganglios_Aislados"]=$Ganglios_Aislados;



if (isset($_POST["Ganglios_Afec"])){
	$Ganglios_Afectados=$_POST["Ganglios_Afec"];
	$Ganglios_Afectados=strip_tags($Ganglios_Afectados);
    $Ganglios_Afectados=intval($Ganglios_Afectados);
}else{
    $Ganglios_Afectados=null;
}

$_SESSION["Ganglios_Afectados"]=$Ganglios_Afectados;



if (isset($_POST["tabla_estadio_tumor"])){
	$Estadio_Patologico=$_POST["tabla_estadio_tumor"];
	$Estadio_Patologico=strip_tags($Estadio_Patologico);
	$Estadio_Patologico=intval($Estadio_Patologico);
	if ($Estadio_Patologico==0){
		$Estadio_Patologico=6;
	}
}else{
    $Estadio_Patologico=5;
}

$_SESSION["Estadio_Patologico"]=$Estadio_Patologico;



if (isset($_POST["Id_Margen_Distal"])){
	$Margen_Distal=$_POST["Id_Margen_Distal"];
	$Margen_Distal=strip_tags($Margen_Distal);
	$Margen_Distal=intval($Margen_Distal);
}else{
    $Margen_Distal=null;
}

$_SESSION["Margen_Distal"]=$Margen_Distal;



if (isset($_POST["Id_Margen_Circunferencial"])){
	$Margen_Circunferencial=$_POST["Id_Margen_Circunferencial"];
	$Margen_Circunferencial=strip_tags($Margen_Circunferencial);
    $Margen_Circunferencial=intval($Margen_Circunferencial);
}else{
    $Margen_Circunferencial=null;
}

$_SESSION["Margen_Circunferencial"]=$Margen_Circunferencial;



if (isset($_POST["tabla_tipo_reseccion"])){
	$Tipo_Reseccion=$_POST["tabla_tipo_reseccion"];
	$Tipo_Reseccion=strip_tags($Tipo_Reseccion);
    $Tipo_Reseccion=intval($Tipo_Reseccion);
}else{
    $Tipo_Reseccion=null;
}


//Variable global SE INTRODUCE EN SESSION

$_SESSION["Tipo_Res"]=$Tipo_Reseccion;//$_REQUEST["tabla_tipo_reseccion"];


if (isset($_POST["tabla_tipo_regresion"])){
	$Tipo_Regresion=$_POST["tabla_tipo_regresion"];
	$Tipo_Regresion=strip_tags($Tipo_Regresion);
	$Tipo_Regresion=intval($Tipo_Regresion);
	if($Tipo_Regresion==0)
	{
		$Tipo_Regresion=6;
		$Tipo_Regresion=intval($Tipo_Regresion);
		$_SESSION["Tipo_Regresion"]=$Tipo_Regresion;
	}	
}else{
    $Tipo_Regresion=6;
}

$_SESSION["Tipo_Regresion"]=$Tipo_Regresion;



if (isset($_POST["Id_Estadio_Sincronico"])){
	$Estadio_Tumor_Sincronico=$_POST["Id_Estadio_Sincronico"];
	$Estadio_Tumor_Sincronico=strip_tags($Estadio_Tumor_Sincronico);
	$Estadio_Tumor_Sincronico=intval($Estadio_Tumor_Sincronico);
}else{
    $Estadio_Tumor_Sincronico=null;
}

$_SESSION["Estadio_Tumor_Sincronico"]=$Estadio_Tumor_Sincronico;



if (isset($_POST["tabla_tipo_calidad_meso"])){
	$Calidad_Mesorrecto=$_POST["tabla_tipo_calidad_meso"];
	$Calidad_Mesorrecto=strip_tags($Calidad_Mesorrecto);
	$Calidad_Mesorrecto=intval($Calidad_Mesorrecto);
}else{
    $Calidad_Mesorrecto=null;
}

$_SESSION["Calidad_Mesorrecto"]=$Calidad_Mesorrecto;



if (isset($_POST["rellenar"])){
	$Rellenar=$_POST["rellenar"];
    $Rellenar=intval($Rellenar);
}else{
    $Rellenar=null;
}

$_SESSION["Patologica_Pendiente"]=$Rellenar;



mysqli_close($conexion);
 
 header("Location: ../Seguimiento/Seguimiento.php");
	

?>