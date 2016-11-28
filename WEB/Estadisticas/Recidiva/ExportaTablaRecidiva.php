<?php

session_start();
require 'funciones_seguimiento.php';


$imagenTecnicas = $_POST['imagenTecnicas'];

echo $imagenTecnicas;       


$hoy=date("y-m-d");

        header("Cache-Control: no-cache, must-revalidate"); 
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Content-type: application/x-msexcel");  
header("Content-Disposition: attachment; filename=TablaRecidiva_$hoy.doc"); 
        header("Content-Description: PHP/INTERBASE Generated Data" ); 
        header("Expires: 0"); 
        
        
$DivisionHospital=$_SESSION["TipoInformeHospitales"];
$Hospital=$_SESSION["HospitalKaplanMeier"];

$APER=$_SESSION["reseccion_abd"];
$AR=$_SESSION["reseccion_anterior"];
$Hartmann=$_SESSION["hartmann"];




//1=Todos los hospitales
//2=Seleccion por hospital


$TablaRecidivaTecnica = $TablaRecidivaTecnica ."<tr>";
$TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td> Tiempo </td>";
$TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td> 0 </td>";
$TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td> 12 </td>";
$TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td> 24 </td>";
$TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td> 36 </td>";
$TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td> 48 </td>";
$TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td> 60 </td>";

$TablaRecidivaTecnica = $TablaRecidivaTecnica ."</tr>";
    
    

if ($APER==1)
{
    $PacientesSeguimientoMes0APER = tabla_seguimiento(0, null, $APER);
    $PacientesSeguimientoMes12APER = tabla_seguimiento(12, null, $APER);
    $PacientesSeguimientoMes24APER = tabla_seguimiento(24, null, $APER);
    $PacientesSeguimientoMes36APER = tabla_seguimiento(36, null, $APER);
    $PacientesSeguimientoMes48APER = tabla_seguimiento(48, null, $APER);
    $PacientesSeguimientoMes60APER = tabla_seguimiento(60, null, $APER);
    

    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<tr>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
    
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."</tr>"; 

    
    
}
if ($AR==2) 
{
    $PacientesSeguimientoMes0AR = tabla_seguimiento(0, null, $AR);
    $PacientesSeguimientoMes12AR = tabla_seguimiento(12, null, $AR);
    $PacientesSeguimientoMes24AR = tabla_seguimiento(24, null, $AR);
    $PacientesSeguimientoMes36AR = tabla_seguimiento(36, null, $AR);
    $PacientesSeguimientoMes48AR = tabla_seguimiento(48, null, $AR);
    $PacientesSeguimientoMes60AR = tabla_seguimiento(60, null, $AR);
    
    
        $TablaRecidivaTecnica = $TablaRecidivaTecnica ."</tr>";
    
    
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<tr>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
    
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."</tr>";     
        
    
} 
if ($Hartmann==3) 
{
    $PacientesSeguimientoMes0Hartmann = tabla_seguimiento(0, null, $Hartmann);
    $PacientesSeguimientoMes12Hartmann = tabla_seguimiento(12, null, $Hartmann);
    $PacientesSeguimientoMes24Hartmann = tabla_seguimiento(24, null, $Hartmann);
    $PacientesSeguimientoMes36Hartmann = tabla_seguimiento(36, null, $Hartmann);
    $PacientesSeguimientoMes48Hartmann = tabla_seguimiento(48, null, $Hartmann);
    $PacientesSeguimientoMes60Hartmann = tabla_seguimiento(60, null, $Hartmann);
    
    
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<tr>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
    
    $TablaRecidivaTecnica = $TablaRecidivaTecnica ."</tr>";
    
}


//Si han incluido los hospitales también
if ($DivisionHospital==2)
{
    if ($APER==1)
    {
        $PacientesSeguimientoMes0APERHospital = tabla_seguimiento(0, $Hospital, $APER);
        $PacientesSeguimientoMes12APERHospital = tabla_seguimiento(12, $Hospital, $APER);
        $PacientesSeguimientoMes24APERHospital = tabla_seguimiento(24, $Hospital, $APER);
        $PacientesSeguimientoMes36APERHospital = tabla_seguimiento(36, $Hospital, $APER);
        $PacientesSeguimientoMes48APERHospital = tabla_seguimiento(48, $Hospital, $APER);
        $PacientesSeguimientoMes60APERHospital = tabla_seguimiento(60, $Hospital, $APER);
        
    
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<tr>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #008000; font-size: 90%\"> APER Hosp. </td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes0APERHospital ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes12APERHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes24APERHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes36APERHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes48APERHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes60APERHospital  ."</td>";
            
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."</tr>";
    
        
        
    }
    if ($AR==2) 
    {
        $PacientesSeguimientoMes0ARHospital = tabla_seguimiento(0, $Hospital, $AR);
        $PacientesSeguimientoMes12ARHospital = tabla_seguimiento(12, $Hospital, $AR);
        $PacientesSeguimientoMes24ARHospital = tabla_seguimiento(24, $Hospital, $AR);
        $PacientesSeguimientoMes36ARHospital = tabla_seguimiento(36, $Hospital, $AR);
        $PacientesSeguimientoMes48ARHospital = tabla_seguimiento(48, $Hospital, $AR);
        $PacientesSeguimientoMes60ARHospital = tabla_seguimiento(60, $Hospital, $AR);
        
        
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<tr>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #800080; font-size: 90%\"> AR Hosp. </td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes0ARHospital ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes12ARHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes24ARHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes36ARHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes48ARHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes60ARHospital  ."</td>";
            
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."</tr>"; 
         
            
        
    } 
    if ($Hartmann==3) 
    {
        $PacientesSeguimientoMes0HartmannHospital = tabla_seguimiento(0, $Hospital, $Hartmann);
        $PacientesSeguimientoMes12HartmannHospital = tabla_seguimiento(12, $Hospital, $Hartmann);
        $PacientesSeguimientoMes24HartmannHospital = tabla_seguimiento(24, $Hospital, $Hartmann);
        $PacientesSeguimientoMes36HartmannHospital = tabla_seguimiento(36, $Hospital, $Hartmann);
        $PacientesSeguimientoMes48HartmannHospital = tabla_seguimiento(48, $Hospital, $Hartmann);
        $PacientesSeguimientoMes60HartmannHospital = tabla_seguimiento(60, $Hospital, $Hartmann);
        
        
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<tr>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFFF00; font-size: 90%\"> Hartmann Hosp. </td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes0HartmannHospital ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes12HartmannHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes24HartmannHospital ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes36HartmannHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes48HartmannHospital  ."</td>";
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes60HartmannHospital  ."</td>";
            
            $TablaRecidivaTecnica = $TablaRecidivaTecnica ."</tr>";
        
    }

}


//Creacion de la tabla de Recidiva conjunta

$PacientesSeguimientoMes0 = tabla_seguimiento(0, null, null);
$PacientesSeguimientoMes12 = tabla_seguimiento(12, null, null);
$PacientesSeguimientoMes24 = tabla_seguimiento(24, null, null);
$PacientesSeguimientoMes36 = tabla_seguimiento(36, null, null);
$PacientesSeguimientoMes48 = tabla_seguimiento(48, null, null);
$PacientesSeguimientoMes60 = tabla_seguimiento(60, null, null);
    
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<tr>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td> Tiempo </td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td> 0 </td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td> 12 </td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td> 24 </td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td> 36 </td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td> 48 </td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td> 60 </td>";

$TablaRecidivaConjunta = $TablaRecidivaConjunta ."</tr>";

$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<tr>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\" font-size: 90%\"> Total </td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
$TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";

$TablaRecidivaConjunta = $TablaRecidivaConjunta ."</tr>"; 


//Si han incluido los hospitales también
if ($DivisionHospital==2)
{
    $PacientesSeguimientoMes0Hospital = tabla_seguimiento(0, $Hospital, null);
    $PacientesSeguimientoMes12Hospital = tabla_seguimiento(12, $Hospital, null);
    $PacientesSeguimientoMes24Hospital = tabla_seguimiento(24, $Hospital, null);
    $PacientesSeguimientoMes36Hospital = tabla_seguimiento(36, $Hospital, null);
    $PacientesSeguimientoMes48Hospital = tabla_seguimiento(48, $Hospital, null);
    $PacientesSeguimientoMes60Hospital = tabla_seguimiento(60, $Hospital, null);
    
    $TablaRecidivaConjunta = $TablaRecidivaConjunta ."<tr>";
    $TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\"color: #FF0000; font-size: 90% \"> Total Hosp. </td>";
    $TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes0Hospital ."</td>";
    $TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes12Hospital  ."</td>";
    $TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes24Hospital  ."</td>";
    $TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes36Hospital  ."</td>";
    $TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes48Hospital  ."</td>";
    $TablaRecidivaConjunta = $TablaRecidivaConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes60Hospital  ."</td>";
    
    $TablaRecidivaConjunta = $TablaRecidivaConjunta ."</tr>"; 
}




echo "Imagen Recidiva 1";

echo "<table> "; 
echo $TablaRecidivaTecnica;		
echo "</table>";	

echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";


echo "Imagen Recidiva Total";	
		
echo "<table> "; 
echo $TablaRecidivaConjunta;		
echo "</table>";



?>	
	