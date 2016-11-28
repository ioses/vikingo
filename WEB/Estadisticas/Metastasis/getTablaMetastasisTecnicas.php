<?php
session_start();
require 'funciones_seguimiento.php';



$APER=$_GET["APER"];  //Value==1
$AR=$_GET["AR"];  //Value==2
$Hartmann=$_GET["Hartmann"];  //Value==3


        $TablaMetastasis = $TablaMetastasis ."<tr>";
        $TablaMetastasis = $TablaMetastasis ."<td> Tiempo </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 0 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 12 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 24 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 36 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 48 </td>";
        $TablaMetastasis = $TablaMetastasis ."<td> 60 </td>";
        
        $TablaMetastasis = $TablaMetastasis ."</tr>";
        
        

if ($APER==1)
{
    $PacientesSeguimientoMes0APER = tabla_seguimiento(0, null, $APER);
    $PacientesSeguimientoMes12APER = tabla_seguimiento(12, null, $APER);
    $PacientesSeguimientoMes24APER = tabla_seguimiento(24, null, $APER);
    $PacientesSeguimientoMes36APER = tabla_seguimiento(36, null, $APER);
    $PacientesSeguimientoMes48APER = tabla_seguimiento(48, null, $APER);
    $PacientesSeguimientoMes60APER = tabla_seguimiento(60, null, $APER);
    

        $TablaMetastasis = $TablaMetastasis ."<tr>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
        
        $TablaMetastasis = $TablaMetastasis ."</tr>"; 

    
    
}
if ($AR==2) 
{
    $PacientesSeguimientoMes0AR = tabla_seguimiento(0, null, $AR);
    $PacientesSeguimientoMes12AR = tabla_seguimiento(12, null, $AR);
    $PacientesSeguimientoMes24AR = tabla_seguimiento(24, null, $AR);
    $PacientesSeguimientoMes36AR = tabla_seguimiento(36, null, $AR);
    $PacientesSeguimientoMes48AR = tabla_seguimiento(48, null, $AR);
    $PacientesSeguimientoMes60AR = tabla_seguimiento(60, null, $AR);
    
    
        $TablaMetastasis = $TablaMetastasis ."</tr>";
        
        
        $TablaMetastasis = $TablaMetastasis ."<tr>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
        
        $TablaMetastasis = $TablaMetastasis ."</tr>";     
        
    
} 
if ($Hartmann==3) 
{
    $PacientesSeguimientoMes0Hartmann = tabla_seguimiento(0, null, $Hartmann);
    $PacientesSeguimientoMes12Hartmann = tabla_seguimiento(12, null, $Hartmann);
    $PacientesSeguimientoMes24Hartmann = tabla_seguimiento(24, null, $Hartmann);
    $PacientesSeguimientoMes36Hartmann = tabla_seguimiento(36, null, $Hartmann);
    $PacientesSeguimientoMes48Hartmann = tabla_seguimiento(48, null, $Hartmann);
    $PacientesSeguimientoMes60Hartmann = tabla_seguimiento(60, null, $Hartmann);
    
    
        $TablaMetastasis = $TablaMetastasis ."<tr>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
        
        $TablaMetastasis = $TablaMetastasis ."</tr>";
    
}

echo $TablaMetastasis;

?>
