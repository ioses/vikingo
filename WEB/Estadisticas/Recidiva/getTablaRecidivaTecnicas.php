<?php
session_start();
require 'funciones_seguimiento.php';



$APER=$_GET["APER"];  //Value==1
$AR=$_GET["AR"];  //Value==2
$Hartmann=$_GET["Hartmann"];  //Value==3


        $TablaRecidiva = $TablaRecidiva ."<tr>";
        $TablaRecidiva = $TablaRecidiva ."<td> Tiempo </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 0 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 12 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 24 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 36 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 48 </td>";
        $TablaRecidiva = $TablaRecidiva ."<td> 60 </td>";
        
        $TablaRecidiva = $TablaRecidiva ."</tr>";
        
        

if ($APER==1)
{
    $PacientesSeguimientoMes0APER = tabla_seguimiento(0, null, $APER);
    $PacientesSeguimientoMes12APER = tabla_seguimiento(12, null, $APER);
    $PacientesSeguimientoMes24APER = tabla_seguimiento(24, null, $APER);
    $PacientesSeguimientoMes36APER = tabla_seguimiento(36, null, $APER);
    $PacientesSeguimientoMes48APER = tabla_seguimiento(48, null, $APER);
    $PacientesSeguimientoMes60APER = tabla_seguimiento(60, null, $APER);
    

        $TablaRecidiva = $TablaRecidiva ."<tr>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
        
        $TablaRecidiva = $TablaRecidiva ."</tr>"; 

    
    
}
if ($AR==2) 
{
    $PacientesSeguimientoMes0AR = tabla_seguimiento(0, null, $AR);
    $PacientesSeguimientoMes12AR = tabla_seguimiento(12, null, $AR);
    $PacientesSeguimientoMes24AR = tabla_seguimiento(24, null, $AR);
    $PacientesSeguimientoMes36AR = tabla_seguimiento(36, null, $AR);
    $PacientesSeguimientoMes48AR = tabla_seguimiento(48, null, $AR);
    $PacientesSeguimientoMes60AR = tabla_seguimiento(60, null, $AR);
    
    
        $TablaRecidiva = $TablaRecidiva ."</tr>";
        
        
        $TablaRecidiva = $TablaRecidiva ."<tr>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
        
        $TablaRecidiva = $TablaRecidiva ."</tr>";     
        
    
} 
if ($Hartmann==3) 
{
    $PacientesSeguimientoMes0Hartmann = tabla_seguimiento(0, null, $Hartmann);
    $PacientesSeguimientoMes12Hartmann = tabla_seguimiento(12, null, $Hartmann);
    $PacientesSeguimientoMes24Hartmann = tabla_seguimiento(24, null, $Hartmann);
    $PacientesSeguimientoMes36Hartmann = tabla_seguimiento(36, null, $Hartmann);
    $PacientesSeguimientoMes48Hartmann = tabla_seguimiento(48, null, $Hartmann);
    $PacientesSeguimientoMes60Hartmann = tabla_seguimiento(60, null, $Hartmann);
    
    
        $TablaRecidiva = $TablaRecidiva ."<tr>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
        $TablaRecidiva = $TablaRecidiva ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
        
        $TablaRecidiva = $TablaRecidiva ."</tr>";
    
}

echo $TablaRecidiva;
	
?>
