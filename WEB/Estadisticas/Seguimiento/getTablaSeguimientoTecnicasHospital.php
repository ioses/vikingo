<?php
session_start();
require 'funciones_seguimiento.php';



$APER=$_GET["APER"];  //Value==1
$AR=$_GET["AR"];  //Value==2
$Hartmann=$_GET["Hartmann"];  //Value==3

$Hospital=$_GET["Hospital"];

        $TablaSeguimiento = $TablaSeguimiento ."<tr>";
        $TablaSeguimiento = $TablaSeguimiento ."<td> Tiempo </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td> 0 </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td> 12 </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td> 24 </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td> 36 </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td> 48 </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td> 60 </td>";
        
        $TablaSeguimiento = $TablaSeguimiento ."</tr>";
        

if ($APER==1)
{
    $PacientesSeguimientoMes0APER = tabla_seguimiento(0, null, $APER);
    $PacientesSeguimientoMes12APER = tabla_seguimiento(12, null, $APER);
    $PacientesSeguimientoMes24APER = tabla_seguimiento(24, null, $APER);
    $PacientesSeguimientoMes36APER = tabla_seguimiento(36, null, $APER);
    $PacientesSeguimientoMes48APER = tabla_seguimiento(48, null, $APER);
    $PacientesSeguimientoMes60APER = tabla_seguimiento(60, null, $APER);
    

        $TablaSeguimiento = $TablaSeguimiento ."<tr>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
        
        $TablaSeguimiento = $TablaSeguimiento ."</tr>"; 

    
    
}
if ($AR==2) 
{
    $PacientesSeguimientoMes0AR = tabla_seguimiento(0, null, $AR);
    $PacientesSeguimientoMes12AR = tabla_seguimiento(12, null, $AR);
    $PacientesSeguimientoMes24AR = tabla_seguimiento(24, null, $AR);
    $PacientesSeguimientoMes36AR = tabla_seguimiento(36, null, $AR);
    $PacientesSeguimientoMes48AR = tabla_seguimiento(48, null, $AR);
    $PacientesSeguimientoMes60AR = tabla_seguimiento(60, null, $AR);
    
    
        $TablaSeguimiento = $TablaSeguimiento ."</tr>";
        
        
        $TablaSeguimiento = $TablaSeguimiento ."<tr>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
        
        $TablaSeguimiento = $TablaSeguimiento ."</tr>";     
        
    
} 
if ($Hartmann==3) 
{
    $PacientesSeguimientoMes0Hartmann = tabla_seguimiento(0, null, $Hartmann);
    $PacientesSeguimientoMes12Hartmann = tabla_seguimiento(12, null, $Hartmann);
    $PacientesSeguimientoMes24Hartmann = tabla_seguimiento(24, null, $Hartmann);
    $PacientesSeguimientoMes36Hartmann = tabla_seguimiento(36, null, $Hartmann);
    $PacientesSeguimientoMes48Hartmann = tabla_seguimiento(48, null, $Hartmann);
    $PacientesSeguimientoMes60Hartmann = tabla_seguimiento(60, null, $Hartmann);
    
    
        $TablaSeguimiento = $TablaSeguimiento ."<tr>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
        
        $TablaSeguimiento = $TablaSeguimiento ."</tr>";
    
}


if ($APER==1)
{
    $PacientesSeguimientoMes0APERHospital = tabla_seguimiento(0, $Hospital, $APER);
    $PacientesSeguimientoMes12APERHospital = tabla_seguimiento(12, $Hospital, $APER);
    $PacientesSeguimientoMes24APERHospital = tabla_seguimiento(24, $Hospital, $APER);
    $PacientesSeguimientoMes36APERHospital = tabla_seguimiento(36, $Hospital, $APER);
    $PacientesSeguimientoMes48APERHospital = tabla_seguimiento(48, $Hospital, $APER);
    $PacientesSeguimientoMes60APERHospital = tabla_seguimiento(60, $Hospital, $APER);
    

        $TablaSeguimiento = $TablaSeguimiento ."<tr>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #008000; font-size: 90%\"> APER Hosp. </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes0APERHospital ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes12APERHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes24APERHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes36APERHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes48APERHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes60APERHospital  ."</td>";
        
        $TablaSeguimiento = $TablaSeguimiento ."</tr>";

    
    
}
if ($AR==2) 
{
    $PacientesSeguimientoMes0ARHospital = tabla_seguimiento(0, $Hospital, $AR);
    $PacientesSeguimientoMes12ARHospital = tabla_seguimiento(12, $Hospital, $AR);
    $PacientesSeguimientoMes24ARHospital = tabla_seguimiento(24, $Hospital, $AR);
    $PacientesSeguimientoMes36ARHospital = tabla_seguimiento(36, $Hospital, $AR);
    $PacientesSeguimientoMes48ARHospital = tabla_seguimiento(48, $Hospital, $AR);
    $PacientesSeguimientoMes60ARHospital = tabla_seguimiento(60, $Hospital, $AR);
    
    
        $TablaSeguimiento = $TablaSeguimiento ."<tr>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #800080; font-size: 90%\"> AR Hosp. </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes0ARHospital ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes12ARHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes24ARHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes36ARHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes48ARHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes60ARHospital  ."</td>";
        
        $TablaSeguimiento = $TablaSeguimiento ."</tr>"; 
     
        
    
} 
if ($Hartmann==3) 
{
    $PacientesSeguimientoMes0HartmannHospital = tabla_seguimiento(0, $Hospital, $Hartmann);
    $PacientesSeguimientoMes12HartmannHospital = tabla_seguimiento(12, $Hospital, $Hartmann);
    $PacientesSeguimientoMes24HartmannHospital = tabla_seguimiento(24, $Hospital, $Hartmann);
    $PacientesSeguimientoMes36HartmannHospital = tabla_seguimiento(36, $Hospital, $Hartmann);
    $PacientesSeguimientoMes48HartmannHospital = tabla_seguimiento(48, $Hospital, $Hartmann);
    $PacientesSeguimientoMes60HartmannHospital = tabla_seguimiento(60, $Hospital, $Hartmann);
    
    
        $TablaSeguimiento = $TablaSeguimiento ."<tr>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFFF00; font-size: 90%\"> Hartmann Hosp. </td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes0HartmannHospital ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes12HartmannHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes24HartmannHospital ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes36HartmannHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes48HartmannHospital  ."</td>";
        $TablaSeguimiento = $TablaSeguimiento ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes60HartmannHospital  ."</td>";
        
        $TablaSeguimiento = $TablaSeguimiento ."</tr>";
    
}


echo $TablaSeguimiento;
?>
