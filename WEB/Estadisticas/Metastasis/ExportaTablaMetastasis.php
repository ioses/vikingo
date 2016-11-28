<?php

session_start();
require 'funciones_seguimiento.php';


$imagenTecnicas = $_POST['imagenTecnicas'];

echo $imagenTecnicas;       


$hoy=date("y-m-d");

        header("Cache-Control: no-cache, must-revalidate"); 
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Content-type: application/x-msexcel");  
header("Content-Disposition: attachment; filename=TablaMetastasis_$hoy.doc"); 
        header("Content-Description: PHP/INTERBASE Generated Data" ); 
        header("Expires: 0"); 
		
		
$DivisionHospital=$_SESSION["TipoInformeHospitales"];
$Hospital=$_SESSION["HospitalKaplanMeier"];

$APER=$_SESSION["reseccion_abd"];
$AR=$_SESSION["reseccion_anterior"];
$Hartmann=$_SESSION["hartmann"];




//1=Todos los hospitales
//2=Seleccion por hospital


$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> Tiempo </td>";
$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 0 </td>";
$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 12 </td>";
$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 24 </td>";
$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 36 </td>";
$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 48 </td>";
$TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td> 60 </td>";

$TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
    
    

if ($APER==1)
{
    $PacientesSeguimientoMes0APER = tabla_seguimiento(0, null, $APER);
    $PacientesSeguimientoMes12APER = tabla_seguimiento(12, null, $APER);
    $PacientesSeguimientoMes24APER = tabla_seguimiento(24, null, $APER);
    $PacientesSeguimientoMes36APER = tabla_seguimiento(36, null, $APER);
    $PacientesSeguimientoMes48APER = tabla_seguimiento(48, null, $APER);
    $PacientesSeguimientoMes60APER = tabla_seguimiento(60, null, $APER);
    

    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\"> APER </td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes0APER ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes12APER  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes24APER  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes36APER  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes48APER  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #0000FF; font-size: 90%\">". $PacientesSeguimientoMes60APER  ."</td>";
    
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>"; 

    
    
}
if ($AR==2) 
{
    $PacientesSeguimientoMes0AR = tabla_seguimiento(0, null, $AR);
    $PacientesSeguimientoMes12AR = tabla_seguimiento(12, null, $AR);
    $PacientesSeguimientoMes24AR = tabla_seguimiento(24, null, $AR);
    $PacientesSeguimientoMes36AR = tabla_seguimiento(36, null, $AR);
    $PacientesSeguimientoMes48AR = tabla_seguimiento(48, null, $AR);
    $PacientesSeguimientoMes60AR = tabla_seguimiento(60, null, $AR);
    
    
        $TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
    
    
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\"> AR </td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes0AR ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes12AR  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes24AR  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes36AR  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes48AR  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FF0000; font-size: 90%\">". $PacientesSeguimientoMes60AR  ."</td>";
    
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";     
        
    
} 
if ($Hartmann==3) 
{
    $PacientesSeguimientoMes0Hartmann = tabla_seguimiento(0, null, $Hartmann);
    $PacientesSeguimientoMes12Hartmann = tabla_seguimiento(12, null, $Hartmann);
    $PacientesSeguimientoMes24Hartmann = tabla_seguimiento(24, null, $Hartmann);
    $PacientesSeguimientoMes36Hartmann = tabla_seguimiento(36, null, $Hartmann);
    $PacientesSeguimientoMes48Hartmann = tabla_seguimiento(48, null, $Hartmann);
    $PacientesSeguimientoMes60Hartmann = tabla_seguimiento(60, null, $Hartmann);
    
    
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\"> Hartmann </td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes0Hartmann ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes12Hartmann  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes24Hartmann  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes36Hartmann  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes48Hartmann  ."</td>";
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFCC00; font-size: 90%\">". $PacientesSeguimientoMes60Hartmann  ."</td>";
    
    $TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
    
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
        
    
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\"> APER Hosp. </td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes0APERHospital ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes12APERHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes24APERHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes36APERHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes48APERHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #008000; font-size: 90%\">". $PacientesSeguimientoMes60APERHospital  ."</td>";
            
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
    
        
        
    }
    if ($AR==2) 
    {
        $PacientesSeguimientoMes0ARHospital = tabla_seguimiento(0, $Hospital, $AR);
        $PacientesSeguimientoMes12ARHospital = tabla_seguimiento(12, $Hospital, $AR);
        $PacientesSeguimientoMes24ARHospital = tabla_seguimiento(24, $Hospital, $AR);
        $PacientesSeguimientoMes36ARHospital = tabla_seguimiento(36, $Hospital, $AR);
        $PacientesSeguimientoMes48ARHospital = tabla_seguimiento(48, $Hospital, $AR);
        $PacientesSeguimientoMes60ARHospital = tabla_seguimiento(60, $Hospital, $AR);
        
        
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\"> AR Hosp. </td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes0ARHospital ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes12ARHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes24ARHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes36ARHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes48ARHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #800080; font-size: 90%\">". $PacientesSeguimientoMes60ARHospital  ."</td>";
            
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>"; 
         
            
        
    } 
    if ($Hartmann==3) 
    {
        $PacientesSeguimientoMes0HartmannHospital = tabla_seguimiento(0, $Hospital, $Hartmann);
        $PacientesSeguimientoMes12HartmannHospital = tabla_seguimiento(12, $Hospital, $Hartmann);
        $PacientesSeguimientoMes24HartmannHospital = tabla_seguimiento(24, $Hospital, $Hartmann);
        $PacientesSeguimientoMes36HartmannHospital = tabla_seguimiento(36, $Hospital, $Hartmann);
        $PacientesSeguimientoMes48HartmannHospital = tabla_seguimiento(48, $Hospital, $Hartmann);
        $PacientesSeguimientoMes60HartmannHospital = tabla_seguimiento(60, $Hospital, $Hartmann);
        
        
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<tr>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\"> Hartmann Hosp. </td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes0HartmannHospital ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes12HartmannHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes24HartmannHospital ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes36HartmannHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes48HartmannHospital  ."</td>";
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."<td style=\"color: #FFFF00; font-size: 90%\">". $PacientesSeguimientoMes60HartmannHospital  ."</td>";
            
            $TablaMetastasisTecnica = $TablaMetastasisTecnica ."</tr>";
        
    }

}


//Creacion de la tabla de metastasis conjunta

$PacientesSeguimientoMes0 = tabla_seguimiento(0, null, null);
$PacientesSeguimientoMes12 = tabla_seguimiento(12, null, null);
$PacientesSeguimientoMes24 = tabla_seguimiento(24, null, null);
$PacientesSeguimientoMes36 = tabla_seguimiento(36, null, null);
$PacientesSeguimientoMes48 = tabla_seguimiento(48, null, null);
$PacientesSeguimientoMes60 = tabla_seguimiento(60, null, null);
    
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<tr>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td> Tiempo </td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td> 0 </td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td> 12 </td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td> 24 </td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td> 36 </td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td> 48 </td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td> 60 </td>";

$TablaMetastasisConjunta = $TablaMetastasisConjunta ."</tr>";

$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<tr>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\" font-size: 90%\"> Total </td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes0 ."</td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes12  ."</td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes24  ."</td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes36  ."</td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes48  ."</td>";
$TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\" font-size: 90%\">". $PacientesSeguimientoMes60  ."</td>";

$TablaMetastasisConjunta = $TablaMetastasisConjunta ."</tr>"; 


//Si han incluido los hospitales también
if ($DivisionHospital==2)
{
    $PacientesSeguimientoMes0Hospital = tabla_seguimiento(0, $Hospital, null);
    $PacientesSeguimientoMes12Hospital = tabla_seguimiento(12, $Hospital, null);
    $PacientesSeguimientoMes24Hospital = tabla_seguimiento(24, $Hospital, null);
    $PacientesSeguimientoMes36Hospital = tabla_seguimiento(36, $Hospital, null);
    $PacientesSeguimientoMes48Hospital = tabla_seguimiento(48, $Hospital, null);
    $PacientesSeguimientoMes60Hospital = tabla_seguimiento(60, $Hospital, null);
    
    $TablaMetastasisConjunta = $TablaMetastasisConjunta ."<tr>";
    $TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\"color: #FF0000; font-size: 90% \"> Total Hosp. </td>";
    $TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes0Hospital ."</td>";
    $TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes12Hospital  ."</td>";
    $TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes24Hospital  ."</td>";
    $TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes36Hospital  ."</td>";
    $TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes48Hospital  ."</td>";
    $TablaMetastasisConjunta = $TablaMetastasisConjunta ."<td style=\"color: #FF0000; font-size: 90% \">". $PacientesSeguimientoMes60Hospital  ."</td>";
    
    $TablaMetastasisConjunta = $TablaMetastasisConjunta ."</tr>"; 
}




			

 
echo "Imagen Metastasis 1";

echo "<table> "; 
echo $TablaMetastasisTecnica;		
echo "</table>";	

echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";


echo "Imagen Metastasis Total";	
		
echo "<table> "; 
echo $TablaMetastasisConjunta;		
echo "</table>";		
    

echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
?>