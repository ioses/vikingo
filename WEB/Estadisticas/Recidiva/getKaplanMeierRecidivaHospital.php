<?php
session_start();
require 'funciones_seguimiento.php';



$APER=$_GET["APER"];  //Value==1
$AR=$_GET["AR"];  //Value==2
$Hartmann=$_GET["Hartmann"];  //Value==3

$Hospital=intval($_GET["Hospital"]);

$PacientesSeguimientoAPER = null;
$PacientesSeguimientoRecidivaAPER = null;

$PacientesSeguimientoAR = null;
$PacientesSeguimientoRecidivaAR = null;

$PacientesSeguimientoHartmann = null;
$PacientesSeguimientoRecidivaHartmann = null;


$PacientesSeguimientoAPERHospital = null;
$PacientesSeguimientoRecidivaAPERHospital = null;

$PacientesSeguimientoARHospital = null;
$PacientesSeguimientoRecidivaARHospital = null;

$PacientesSeguimientoHartmannHospital = null;
$PacientesSeguimientoRecidivaHartmannHospital = null;

    
$Valores[60]=array
(
    "SeguimientoTotalAPER"=>$PacientesSeguimientoAPER,
    "SeguimientoRecidivaAPER"=>$PacientesSeguimientoRecidivaAPER,
    
    "SeguimientoTotalAR"=>$PacientesSeguimientoAR,
    "SeguimientoRecidivaAR"=>$PacientesSeguimientoRecidivaAR,
    
    "SeguimientoTotalHartmann"=>$PacientesSeguimientoHartmann,
    "SeguimientoRecidivaHartmann"=>$PacientesSeguimientoRecidivaHartmann,
    
    "SeguimientoTotalAPERHospital"=>$PacientesSeguimientoAPERHospital,
    "SeguimientoRecidivaAPERHospital"=>$PacientesSeguimientoRecidivaAPERHospital,
 
    "SeguimientoTotalARHospital"=>$PacientesSeguimientoARHospital,
    "SeguimientoRecidivaARHospital"=>$PacientesSeguimientoRecidivaARHospital,
                    
    "SeguimientoTotalHartmannHospital"=>$PacientesSeguimientoHartmannHospital,
    "SeguimientoRecidivaHartmannHospital"=>$PacientesSeguimientoRecidivaHartmannHospital
); 

if($APER==1)
{   
    for($meses=0;$meses<=60;$meses++)
    {
        $Valores[$meses]["SeguimientoTotalAPER"] = meses_dif_mayor_km($meses, $APER, null);
        $Valores[$meses]["SeguimientoRecidivaAPER"] = meses_dif_igual_km($meses, $APER, 1, null);

        $Valores[$meses]["SeguimientoTotalAPERHospital"] = meses_dif_mayor_km($meses, $APER, $Hospital);
        $Valores[$meses]["SeguimientoRecidivaAPERHospital"] = meses_dif_igual_km($meses, $APER, 1, $Hospital);
    }   
}


if($AR==2)
{
    for($meses=0;$meses<=60;$meses++)
    {       
        $Valores[$meses]["SeguimientoTotalAR"] = meses_dif_mayor_km($meses, $AR, null);
        $Valores[$meses]["SeguimientoRecidivaAR"] = meses_dif_igual_km($meses, $AR, 1, null);

        $Valores[$meses]["SeguimientoTotalARHospital"] = meses_dif_mayor_km($meses, $AR, $Hospital);
        $Valores[$meses]["SeguimientoRecidivaARHospital"] = meses_dif_igual_km($meses, $AR, 1, $Hospital);    
    }    
}

if($Hartmann==3)
{ 
    for($meses=0;$meses<=60;$meses++)
    {
        $Valores[$meses]["SeguimientoTotalHartmann"] = meses_dif_mayor_km($meses, $Hartmann, null);
        $Valores[$meses]["SeguimientoRecidivaHartmann"] = meses_dif_igual_km($meses, $Hartmann, 1, null);

        $Valores[$meses]["SeguimientoTotalHartmannHospital"] = meses_dif_mayor_km($meses, $Hartmann, $Hospital);
        $Valores[$meses]["SeguimientoRecidivaHartmannHospital"] = meses_dif_igual_km($meses, $Hartmann, 1, $Hospital);        
    } 
}    

echo json_encode($Valores);                     
                

?>