<?php
session_start();
require 'funciones_seguimiento.php';



$APER=$_GET["APER"];  //Value==1
$AR=$_GET["AR"];  //Value==2
$Hartmann=$_GET["Hartmann"];  //Value==3

$Hospital=intval($_GET["Hospital"]);

$PacientesSeguimientoAPER = null;
$PacientesSeguimientoMetastasisAPER = null;

$PacientesSeguimientoAR = null;
$PacientesSeguimientoMetastasisAR = null;

$PacientesSeguimientoHartmann = null;
$PacientesSeguimientoMetastasisHartmann = null;


$PacientesSeguimientoAPERHospital = null;
$PacientesSeguimientoMetastasisAPERHospital = null;

$PacientesSeguimientoARHospital = null;
$PacientesSeguimientoMetastasisARHospital = null;

$PacientesSeguimientoHartmannHospital = null;
$PacientesSeguimientoMetastasisHartmannHospital = null;

    
$Valores[60]=array
(
    "SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
    "SeguimientoMetastasisAPER"=>$PacientesSeguimientoMetastasisAPER,
    
    "SeguimientoTotalAR"=>$PacientesSeguimientoAR,
    "SeguimientoMetastasisAR"=>$PacientesSeguimientoMetastasisAR,
    
    "SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
    "SeguimientoMetastasisHartmann"=>$PacientesSeguimientoMetastasisHartmann,
    
    "SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
    "SeguimientoMetastasisAPERHospital"=>$PacientesSeguimientoMetastasisAPERHospital,
 
    "SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
    "SeguimientoMetastasisARHospital"=>$PacientesSeguimientoMetastasisARHospital,
                    
    "SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
    "SeguimientoMetastasisHartmannHospital"=>$PacientesSeguimientoMetastasisHartmannHospital
); 

if($APER==1)
{   
    for($meses=0;$meses<=60;$meses++)
    {       
        $Valores[$meses]["SeguimientoTotalAPER"] = meses_dif_mayor_km($meses, $APER, null);
        $Valores[$meses]["SeguimientoMetastasisAPER"] = meses_dif_igual_km($meses, $APER, 1, null);
        
        $Valores[$meses]["SeguimientoTotalAPERHospital"] = meses_dif_mayor_km($meses, $APER, $Hospital);
        $Valores[$meses]["SeguimientoMetastasisAPERHospital"] = meses_dif_igual_km($meses, $APER, 1, $Hospital);
    }   
}

if($AR==2)
{
    for($meses=0;$meses<=60;$meses++)
    {
        $Valores[$meses]["SeguimientoTotalAR"] = meses_dif_mayor_km($meses, $AR, null);
        $Valores[$meses]["SeguimientoMetastasisAR"] = meses_dif_igual_km($meses, $AR, 1, null);

        $Valores[$meses]["SeguimientoTotalARHospital"] = meses_dif_mayor_km($meses, $AR, $Hospital);
        $Valores[$meses]["SeguimientoMetastasisARHospital"] = meses_dif_igual_km($meses, $AR, 1, $Hospital); 
    }   
}

if($Hartmann==3)
{
    for($meses=0;$meses<=60;$meses++)
    {
        $Valores[$meses]["SeguimientoTotalHartmann"] = meses_dif_mayor_km($meses, $Hartmann, null);
        $Valores[$meses]["SeguimientoMetastasisHartmann"] = meses_dif_igual_km($meses, $Hartmann, 1, null);

        $Valores[$meses]["SeguimientoTotalHartmannHospital"] = meses_dif_mayor_km($meses, $Hartmann, $Hospital);
        $Valores[$meses]["SeguimientoMetastasisHartmannHospital"] = meses_dif_igual_km($meses, $Hartmann, 1, $Hospital);        
    } 
}    

echo json_encode($Valores);                     
                



?>