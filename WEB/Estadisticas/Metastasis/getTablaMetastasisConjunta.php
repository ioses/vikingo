<?php
session_start();
require 'funciones_seguimiento.php';


$PacientesSeguimientoMes0 = tabla_seguimiento(0, null, null);
$PacientesSeguimientoMes12 = tabla_seguimiento(12, null, null);
$PacientesSeguimientoMes24 = tabla_seguimiento(24, null, null);
$PacientesSeguimientoMes36 = tabla_seguimiento(36, null, null);
$PacientesSeguimientoMes48 = tabla_seguimiento(48, null, null);
$PacientesSeguimientoMes60 = tabla_seguimiento(60, null, null);
        
        $TablaMetastasis = $TablaMetastasis ."<tr>";
        $TablaMetastasis = $TablaMetastasis ."<td> Tiempo </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 0 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 12 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 24 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 36 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 48 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 60 </td>";
        
        $TablaMetastasis = $TablaMetastasis ."</tr>";
        
        $TablaMetastasis = $TablaMetastasis ."<tr>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\" font-size: 90%\"> Total </td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";
        
        $TablaMetastasis = $TablaMetastasis ."</tr>"; 


echo $TablaMetastasis;
?>