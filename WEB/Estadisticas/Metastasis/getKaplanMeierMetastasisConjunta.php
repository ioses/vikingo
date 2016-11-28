<?php
session_start();
require 'funciones_seguimiento.php';


for($meses=0;$meses<=60;$meses++)
{

    $PacientesSeguimiento = meses_dif_mayor_km($meses, null, null);

    $PacientesSeguimientoMetastasis = meses_dif_igual_km($meses, null, 1, null);
    
    $Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
                           "SeguimientoMetastasis"=>$PacientesSeguimientoMetastasis);
    
    
}   

echo json_encode($Valores); 


?>