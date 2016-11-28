<?php
session_start();
require 'funciones_seguimiento.php';


$PacientesSeguimientoMes0 = tabla_seguimiento(0, null, null);
$PacientesSeguimientoMes12 = tabla_seguimiento(12, null, null);
$PacientesSeguimientoMes24 = tabla_seguimiento(24, null, null);
$PacientesSeguimientoMes36 = tabla_seguimiento(36, null, null);
$PacientesSeguimientoMes48 = tabla_seguimiento(48, null, null);
$PacientesSeguimientoMes60 = tabla_seguimiento(60, null, null);
        
        $TablaRecidiva = $TablaRecidiva ."<tr>";
        $TablaRecidiva = $TablaRecidiva ."<td> Tiempo </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 0 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 12 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 24 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 36 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 48 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 60 </td>";
        
        $TablaRecidiva = $TablaRecidiva ."</tr>";
        
        $TablaRecidiva = $TablaRecidiva ."<tr>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\" font-size: 90%\"> Total </td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
        
        $TablaRecidiva = $TablaRecidiva ."</tr>"; 


echo $TablaRecidiva;
?>