<?php
session_start();
require 'funciones_seguimiento.php';



$Hospital=intval($_GET["Hospital"]);

for($meses=0;$meses<=60;$meses++)
{

    $PacientesSeguimiento = meses_dif_mayor_km($meses, null, null);
    
    $PacientesSeguimientoRecidiva = meses_dif_igual_km($meses, null, 1, null);
    
    $PacientesSeguimientoHospital = meses_dif_mayor_km($meses, null, $Hospital);
    
    $PacientesSeguimientoRecidivaHospital = meses_dif_igual_km($meses, null, 1, $Hospital);
    

    $Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
                           "SeguimientoRecidiva"=>$PacientesSeguimientoRecidiva,
                           "SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
                           "SeguimientoRecidivaHospital"=>$PacientesSeguimientoRecidivaHospital);
    
    
}   

echo json_encode($Valores); 


?>