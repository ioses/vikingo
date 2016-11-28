<?php
session_start();
require 'funciones_seguimiento.php';



$APER=$_GET["APER"];  //Value==1
$AR=$_GET["AR"];  //Value==2
$Hartmann=$_GET["Hartmann"];  //Value==3

$PacientesSeguimientoAPER = null;
$PacientesSeguimientoMuerteAPER = null;

$PacientesSeguimientoAR = null;
$PacientesSeguimientoMuerteAR = null;

$PacientesSeguimientoHartmann = null;
$PacientesSeguimientoMuerteHartmann = null;

    
$Valores[60]=array
(
    "SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
    "SeguimientoMuerteAPER"=>$PacientesSeguimientoMuerteAPER,
    
    "SeguimientoTotalAR"=>$PacientesSeguimientoAR,
    "SeguimientoMuerteAR"=>$PacientesSeguimientoMuerteAR,
    
    "SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
    "SeguimientoMuerteHartmann"=>$PacientesSeguimientoMuerteHartmann

); 


if($APER==1)
{   
    for($meses=0;$meses<=60;$meses++)
    {        
        $Valores[$meses]["SeguimientoTotalAPER"] = meses_dif_mayor_km($meses, $APER, null);;
        $Valores[$meses]["SeguimientoMuerteAPER"] = meses_dif_igual_km($meses, $APER, 2, null);
    }   
}

if($AR==2){
    for($meses=0;$meses<=60;$meses++)
    {
        $Valores[$meses]["SeguimientoTotalAR"] = meses_dif_mayor_km($meses, $AR, null);
        $Valores[$meses]["SeguimientoMuerteAR"] = meses_dif_igual_km($meses, $AR, 2, null);  
    }   
}

if($Hartmann==3){
    for($meses=0;$meses<=60;$meses++)
    {
        $Valores[$meses]["SeguimientoTotalHartmann"] = meses_dif_mayor_km($meses, $Hartmann, null);
        $Valores[$meses]["SeguimientoMuerteHartmann"] = meses_dif_igual_km($meses, $Hartmann, 2, null);     
    } 
}

echo json_encode($Valores);     

?>