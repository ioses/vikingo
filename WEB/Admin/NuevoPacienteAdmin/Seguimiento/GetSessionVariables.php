<?php
//Carga de las variables para modificar los datos de un paciente existente

session_start();

//Comprobamos si los inputs están coidificados o no (si viene de modificar están ya codificados)
if(!mb_check_encoding($_SESSION["Localizacion_Recidiva"], 'UTF-8')) 
	$_SESSION["Localizacion_Recidiva"] = utf8_encode($_SESSION["Localizacion_Recidiva"]); 

if(!mb_check_encoding($_SESSION["Localizacion_Metastasis"], 'UTF-8')) 
	$_SESSION["Localizacion_Metastasis"] = utf8_encode($_SESSION["Localizacion_Metastasis"]);

if(!mb_check_encoding($_SESSION["Localizacion_Segundo_Tumor"], 'UTF-8')) 
	$_SESSION["Localizacion_Segundo_Tumor"] = utf8_encode($_SESSION["Localizacion_Segundo_Tumor"]);

if(!mb_check_encoding($_SESSION["Causa_Imposibilidad"], 'UTF-8')) 
	$_SESSION["Causa_Imposibilidad"] = utf8_encode($_SESSION["Causa_Imposibilidad"]);

if(!mb_check_encoding($_SESSION["Comentarios_Adicionales"], 'UTF-8')) 
	$_SESSION["Comentarios_Adicionales"] = utf8_encode($_SESSION["Comentarios_Adicionales"]);



//Fill de array
$a=array(
    "Fecha_Revision"=>$_SESSION["Fecha_Revision"],
    "Recidiva"=>$_SESSION["Recidiva"],
    "Fecha_Recidiva"=>$_SESSION["Fecha_Recidiva"],
    "Localizacion_Recidiva"=>$_SESSION["Localizacion_Recidiva"],
    "Intervencion_Recidiva"=>$_SESSION["Intervencion_Recidiva"],
    "Metastasis"=>$_SESSION["Metastasis"],
    "Fecha_Metastasis"=>$_SESSION["Fecha_Metastasis"],
    "Localizacion_Metastasis"=>$_SESSION["Localizacion_Metastasis"],
    "Intervencion_Metastasis"=>$_SESSION["Intervencion_Metastasis"],
    "Segundo_Tumor"=>$_SESSION["Segundo_Tumor"],
    "Fecha_Segundo_Tumor"=>$_SESSION["Fecha_Segundo_Tumor"],
    "Localizacion_Segundo_Tumor"=>$_SESSION["Localizacion_Segundo_Tumor"],
    "Intervencion_Segundo_Tumor"=>$_SESSION["Intervencion_Segundo_Tumor"],
    "Estado"=>$_SESSION["Estado"],
    "Fecha_Muerte"=>$_SESSION["Fecha_Muerte"],
    "Causa_Muerte"=>$_SESSION["Causa_Muerte"],
    "Imposibilidad"=>$_SESSION["Imposibilidad"],
    "Causa_Imposibilidad"=>$_SESSION["Causa_Imposibilidad"],
    "Comentarios_Adicionales"=>$_SESSION["Comentarios_Adicionales"]
 
    );


//output the response
echo json_encode($a);
?>