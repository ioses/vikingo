<?php
session_start();
require 'funciones_seguimiento.php';



$Hospital=intval($_GET["Hospital"]);

for($meses=0;$meses<=60;$meses++)
{

	$PacientesSeguimiento = meses_dif_mayor_km($meses, null, null);
	
	$PacientesSeguimientoMuerte = meses_dif_igual_km($meses, null, 2, null);
	
	$PacientesSeguimientoHospital = meses_dif_mayor_km($meses, null, $Hospital);
	
	$PacientesSeguimientoMuerteHospital = meses_dif_igual_km($meses, null, 2, $Hospital);
	

    $Valores[$meses]=array("SeguimientoTotal"=>$PacientesSeguimiento,
				           "SeguimientoMuerte"=>$PacientesSeguimientoMuerte,
				           "SeguimientoTotalHospital"=>$PacientesSeguimientoHospital,
				           "SeguimientoMuerteHospital"=>$PacientesSeguimientoMuerteHospital);
	
	
}	


echo json_encode($Valores);	




?>
