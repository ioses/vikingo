<?php
session_start();
require 'funciones_seguimiento.php';


$APER=$_GET["APER"];  //Value==1
$AR=$_GET["AR"];  //Value==2
$Hartmann=$_GET["Hartmann"];  //Value==3


$PacientesSeguimientoAPER = null;
$PacientesSeguimientoMetastasisAPER = null;

$PacientesSeguimientoAR = null;
$PacientesSeguimientoMetastasisAR = null;

$PacientesSeguimientoHartmann = null;
$PacientesSeguimientoMetastasisHartmann = null;

    
$Valores[60]=array
(
    "SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
    "SeguimientoMetastasisAPER"=>$PacientesSeguimientoMetastasisAPER,
    
    "SeguimientoTotalAR"=>$PacientesSeguimientoAR,
    "SeguimientoMetastasisAR"=>$PacientesSeguimientoMetastasisAR,
    
    "SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
    "SeguimientoMetastasisHartmann"=>$PacientesSeguimientoMetastasisHartmann

); 

if($APER==1)
{   
    for($meses=0;$meses<=60;$meses++)
    {
        $Valores[$meses]["SeguimientoTotalAPER"] = meses_dif_mayor_km($meses, $APER, null);
        $Valores[$meses]["SeguimientoMetastasisAPER"] = meses_dif_igual_km($meses, $APER, 1, null);
    }   

}

if($AR==2)
{
    for($meses=0;$meses<=60;$meses++)
    {
        $Valores[$meses]["SeguimientoTotalAR"] = meses_dif_mayor_km($meses, $AR, null);
        $Valores[$meses]["SeguimientoMetastasisAR"] = meses_dif_igual_km($meses, $AR, 1, null);  
    }    
}

if($Hartmann==3)
{ 
    for($meses=0;$meses<=60;$meses++)
    {   
        $Valores[$meses]["SeguimientoTotalHartmann"] = meses_dif_mayor_km($meses, $Hartmann, null);
        $Valores[$meses]["SeguimientoMetastasisHartmann"] = meses_dif_igual_km($meses, $Hartmann, 1, null);  
    } 
}

echo json_encode($Valores);     


?>