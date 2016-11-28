<?php
session_start();
require 'funciones_seguimiento.php';


$APER=$_GET["APER"];  //Value==1
$AR=$_GET["AR"];  //Value==2
$Hartmann=$_GET["Hartmann"];  //Value==3

$Hospital=$_GET["Hospital"];


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


if ($APER==1)
{
    $PacientesSeguimientoMes0APERHospital = tabla_seguimiento(0, $Hospital, $APER);
    $PacientesSeguimientoMes12APERHospital = tabla_seguimiento(12, $Hospital, $APER);
    $PacientesSeguimientoMes24APERHospital = tabla_seguimiento(24, $Hospital, $APER);
    $PacientesSeguimientoMes36APERHospital = tabla_seguimiento(36, $Hospital, $APER);
    $PacientesSeguimientoMes48APERHospital = tabla_seguimiento(48, $Hospital, $APER);
    $PacientesSeguimientoMes60APERHospital = tabla_seguimiento(60, $Hospital, $APER);
    

        $TablaMetastasis = $TablaMetastasis ."<tr>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #008000; font-size: 90%\"> APER Hosp. </td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes0APERHospital ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes12APERHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes24APERHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes36APERHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes48APERHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes60APERHospital  ."</td>";
        
        $TablaMetastasis = $TablaMetastasis ."</tr>";

    
    
}
if ($AR==2) 
{
    $PacientesSeguimientoMes0ARHospital = tabla_seguimiento(0, $Hospital, $AR);
    $PacientesSeguimientoMes12ARHospital = tabla_seguimiento(12, $Hospital, $AR);
    $PacientesSeguimientoMes24ARHospital = tabla_seguimiento(24, $Hospital, $AR);
    $PacientesSeguimientoMes36ARHospital = tabla_seguimiento(36, $Hospital, $AR);
    $PacientesSeguimientoMes48ARHospital = tabla_seguimiento(48, $Hospital, $AR);
    $PacientesSeguimientoMes60ARHospital = tabla_seguimiento(60, $Hospital, $AR);
    
    
        $TablaMetastasis = $TablaMetastasis ."<tr>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #800080; font-size: 90%\"> AR Hosp. </td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes0ARHospital ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes12ARHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes24ARHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes36ARHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes48ARHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes60ARHospital  ."</td>";
        
        $TablaMetastasis = $TablaMetastasis ."</tr>"; 
     
        
    
} 
if ($Hartmann==3) 
{
    $PacientesSeguimientoMes0HartmannHospital = tabla_seguimiento(0, $Hospital, $Hartmann);
    $PacientesSeguimientoMes12HartmannHospital = tabla_seguimiento(12, $Hospital, $Hartmann);
    $PacientesSeguimientoMes24HartmannHospital = tabla_seguimiento(24, $Hospital, $Hartmann);
    $PacientesSeguimientoMes36HartmannHospital = tabla_seguimiento(36, $Hospital, $Hartmann);
    $PacientesSeguimientoMes48HartmannHospital = tabla_seguimiento(48, $Hospital, $Hartmann);
    $PacientesSeguimientoMes60HartmannHospital = tabla_seguimiento(60, $Hospital, $Hartmann);
    
    
        $TablaMetastasis = $TablaMetastasis ."<tr>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFFF00; font-size: 90%\"> Hartmann Hosp. </td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes0HartmannHospital ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes12HartmannHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes24HartmannHospital ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes36HartmannHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes48HartmannHospital  ."</td>";
        $TablaMetastasis = $TablaMetastasis ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes60HartmannHospital  ."</td>";
        
        $TablaMetastasis = $TablaMetastasis ."</tr>";
    
}

echo $TablaMetastasis;
?>
