<?php

session_start();

require_once ("../../../BDD/conexion.php");


//Variable para ver si es la primera vez que se carga la página
$Enviar_Seguimiento="Enviar";
$_SESSION["ButtonEnviarSeguimiento"]=$Enviar_Seguimiento;


if (isset($_POST["Fecha_Revision"])){
	$Fecha_Revision=$_POST["Fecha_Revision"];
	$Fecha_Revision=strip_tags($Fecha_Revision);
}else{
    $Fecha_Revision=2;
}

$_SESSION["Fecha_Revision"]=$Fecha_Revision;



if (isset($_POST["B_Recidiva"])){
	$Recidiva=$_POST["B_Recidiva"];
	$Recidiva=strip_tags($Recidiva);
    $Recidiva=intval($Recidiva);
}else{
    $Recidiva=2;
}

$_SESSION["Recidiva"]=$Recidiva;



if (isset($_POST["Fecha_Recidiva"])){
	$Fecha_Recidiva=$_POST["Fecha_Recidiva"];
	$Fecha_Recidiva=strip_tags($Fecha_Recidiva);
}else{
    $Fecha_Recidiva=null;
}

$_SESSION["Fecha_Recidiva"]=$Fecha_Recidiva;



if (isset($_POST["tabla_seg_localiz_recidiva"])){
	$Localizacion_Recidiva=$_POST["tabla_seg_localiz_recidiva"];
	$Localizacion_Recidiva=strip_tags($Localizacion_Recidiva);
    $Localizacion_Recidiva=utf8_decode($Localizacion_Recidiva);
}else{
    $Localizacion_Recidiva=null;
}

$_SESSION["Localizacion_Recidiva"]=$Localizacion_Recidiva;



if (isset($_POST["B_Recidiva_Intervencion"])){
	$Intervencion_Recidiva=$_POST["B_Recidiva_Intervencion"];
	$Intervencion_Recidiva=strip_tags($Intervencion_Recidiva);
    $Intervencion_Recidiva=intval($Intervencion_Recidiva);
}else{
    $Intervencion_Recidiva=null;
}

$_SESSION["Intervencion_Recidiva"]=$Intervencion_Recidiva;



if (isset($_POST["B_Metastasis"])){
	$Metastasis=$_POST["B_Metastasis"];
	$Metastasis=strip_tags($Metastasis);
    $Metastasis=intval($Metastasis);
}else{
    $Metastasis=2;
}

$_SESSION["Metastasis"]=$Metastasis;




if (isset($_POST["Fecha_Metastasis"])){
	$Fecha_Metastasis=$_POST["Fecha_Metastasis"];
	$Fecha_Metastasis=strip_tags($Fecha_Metastasis);
}else{
    $Fecha_Metastasis=null;
}

$_SESSION["Fecha_Metastasis"]=$Fecha_Metastasis;




if (isset($_POST["tabla_seg_localiz_metastasis"])){
	$Localizacion_Metastasis=$_POST["tabla_seg_localiz_metastasis"];
	$Localizacion_Metastasis=strip_tags($Localizacion_Metastasis);
    $Localizacion_Metastasis=utf8_decode($Localizacion_Metastasis);
}else{
    $Localizacion_Metastasis=null;
}

$_SESSION["Localizacion_Metastasis"]=$Localizacion_Metastasis;



if (isset($_POST["B_Metastasis_Intervencion"])){
	$Intervencion_Metastasis=$_POST["B_Metastasis_Intervencion"];
	$Intervencion_Metastasis=strip_tags($Intervencion_Metastasis);
    $Intervencion_Metastasis=intval($Intervencion_Metastasis);
}else{
    $Intervencion_Metastasis=null;
}

$_SESSION["Intervencion_Metastasis"]=$Intervencion_Metastasis;



if (isset($_POST["B_Segundo_Tumor"])){
	$Segundo_Tumor=$_POST["B_Segundo_Tumor"];
	$Segundo_Tumor=strip_tags($Segundo_Tumor);
    $Segundo_Tumor=intval($Segundo_Tumor);
}else{
    $Segundo_Tumor=2;
}

$_SESSION["Segundo_Tumor"]=$Segundo_Tumor;



if (isset($_POST["Fecha_Segundo_Tumor"])){
	$Fecha_Segundo_Tumor=$_POST["Fecha_Segundo_Tumor"];
	$Fecha_Segundo_Tumor=strip_tags($Fecha_Segundo_Tumor);
}else{
    $Fecha_Segundo_Tumor=null;
}

$_SESSION["Fecha_Segundo_Tumor"]=$Fecha_Segundo_Tumor;




if (isset($_POST["tabla_seg_localiz_segundo_tumor"])){
	$Localizacion_Segundo_Tumor=$_POST["tabla_seg_localiz_segundo_tumor"];
	$Localizacion_Segundo_Tumor=strip_tags($Localizacion_Segundo_Tumor);
   	$Localizacion_Segundo_Tumor=utf8_decode($Localizacion_Segundo_Tumor);
}else{
    $Localizacion_Segundo_Tumor=null;
}

$_SESSION["Localizacion_Segundo_Tumor"]=$Localizacion_Segundo_Tumor;


if (isset($_POST["B_Segundo_Tumor_Intervencion"])){
	$Intervencion_Segundo_Tumor=$_POST["B_Segundo_Tumor_Intervencion"];
	$Intervencion_Segundo_Tumor=strip_tags($Intervencion_Segundo_Tumor);
    $Intervencion_Segundo_Tumor=intval($Intervencion_Segundo_Tumor);
}else{
    $Intervencion_Segundo_Tumor=null;
}

$_SESSION["Intervencion_Segundo_Tumor"]=$Intervencion_Segundo_Tumor;



if (isset($_POST["B_Estado"])){
	$Estado=$_POST["B_Estado"];
	$Estado=strip_tags($Estado);
    $Estado=intval($Estado);
}else{
    $Estado=2;
}

$_SESSION["Estado"]=$Estado;



if (isset($_POST["Fecha_Muerte"])){
	$Fecha_Muerte=$_POST["Fecha_Muerte"];
	$Fecha_Muerte=strip_tags($Fecha_Muerte);
}else{
    $Fecha_Muerte=null;
}

$_SESSION["Fecha_Muerte"]=$Fecha_Muerte;



if (isset($_POST["Relacion_Muerte"])){
	$Causa_Muerte=$_POST["Relacion_Muerte"];
    $Causa_Muerte=utf8_decode($Causa_Muerte);
}else{
    $Causa_Muerte=null;
}

$_SESSION["Causa_Muerte"]=$Causa_Muerte;



if (isset($_POST["B_Imposibilidad"])){
	$Imposibilidad=$_POST["B_Imposibilidad"];
	$Imposibilidad=strip_tags($Imposibilidad);
    $Imposibilidad=intval($Imposibilidad);
}else{
    $Imposibilidad=2;
}

$_SESSION["Imposibilidad"]=$Imposibilidad;




if (isset($_POST["tabla_seg_imposibilidad"])){
	$Causa_Imposibilidad=$_POST["tabla_seg_imposibilidad"];
	$Causa_Imposibilidad=strip_tags($Causa_Imposibilidad);
   $Causa_Imposibilidad=utf8_decode($Causa_Imposibilidad);
}else{
    $Causa_Imposibilidad=null;
}

$_SESSION["Causa_Imposibilidad"]=$Causa_Imposibilidad;

if (isset($_POST["Comentarios_Adicionales"])){
    $Comentarios_Adicionales=$_POST["Comentarios_Adicionales"];
    $Comentarios_Adicionales=strip_tags($Comentarios_Adicionales);
    $Comentarios_Adicionales=utf8_decode($Comentarios_Adicionales);
}else{
    $Comentarios_Adicionales=null;
}

$_SESSION["Comentarios_Adicionales"]=$Comentarios_Adicionales;


 header("Location: ../IntroducirDatosBDD.php");
?>