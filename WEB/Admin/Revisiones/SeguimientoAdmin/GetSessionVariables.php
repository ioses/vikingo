<?php
session_start();


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
    "Comentarios_Adicionales"=>$_SESSION["Comentarios_Adicionales"],
    
	
	//Datos para deshabilitar recidiva
	"Cirugia"=>$_SESSION["Cirugia"],
	"TecCirugia"=>$_SESSION["TecCirugia"],
	"Reseccion"=>$_SESSION["Reseccion"],
	
	//Datos para deshabilitar metastasis
	"MetastasisInicial"=>$_SESSION["MetastInicial"],
	"MetastasisHepatica"=>$_SESSION["MetastHepaticas"],
	"ImplantesOvaricos"=>$_SESSION["ImplanOvaricos"]

    );


 
//output the response
echo json_encode($a);
?>