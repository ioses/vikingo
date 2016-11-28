<?php
session_start();
require 'funciones_seguimiento.php';



$PacientesSeguimientoMes0 = tabla_seguimiento(0, null, null);
$PacientesSeguimientoMes12 = tabla_seguimiento(12, null, null);
$PacientesSeguimientoMes24 = tabla_seguimiento(24, null, null);
$PacientesSeguimientoMes36 = tabla_seguimiento(36, null, null);
$PacientesSeguimientoMes48 = tabla_seguimiento(48, null, null);
$PacientesSeguimientoMes60 = tabla_seguimiento(60, null, null);

	

		$TablaSeguimiento = $TablaSeguimiento ."<tr>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> Tiempo </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 0 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 12 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 24 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 36 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 48 </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td> 60 </td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";
		
		$TablaSeguimiento = $TablaSeguimiento ."<tr>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\"> Total </td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
		$TablaSeguimiento = $TablaSeguimiento ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
		
		$TablaSeguimiento = $TablaSeguimiento ."</tr>";	


echo $TablaSeguimiento;
?>