<?php
session_start();
require 'funciones_seguimiento.php';




for($meses=0;$meses<=60;$meses++)
{
	$PacientesSeguimiento = meses_dif_mayor_km($meses, null, null);
	$PacientesSeguimientoMuerte = meses_dif_igual_km($meses, null, 2, null);
	
    $Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				           "SeguimientoMuerte"=>$PacientesSeguimientoMuerte);
		
}	

echo json_encode($Valores);	

?>
