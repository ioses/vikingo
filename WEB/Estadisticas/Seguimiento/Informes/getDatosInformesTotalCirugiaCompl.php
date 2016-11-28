<?php
session_start();

require_once ('../../BDD/conexion.php');


$fecha_inicio = $_GET["fecha_inicio"];
$fecha_fin = $_GET["fecha_fin"];


/***************************************
 * Totales
 ***************************************/
 
$sqlPacientesTotal = "SELECT * FROM tabla_estadistica";                   
                       
$rsPacientesTotal = mysqli_query($conexion,$sqlPacientesTotal)
or die('Error: ' . mysqli_error());
    
$pacientesTotal = mysqli_num_rows($rsPacientesTotal);
 

/***************************************
 * Operados
 ***************************************/

$T_comp_reint_total = 0;
$T_comp_herida_total = 0;
$T_comp_perine_total = 0;
$T_comp_abd_total = 0;
$T_comp_anast_total = 0;


 /****************************************************
 * 
 * ** Cirugía **
 * 
 ***************************************************/


$C_T_mortalidad = 0;



$C_T_comp_herida = 0;
$C_T_comp_perine = 0;
$C_T_comp_anast = 0;
$C_T_comp_abd = 0;
$C_T_comp_reint = 0;

$T_comp_total = 0;

 
$sqlHospitalRadiologia = "SELECT ID FROM tabla_estadistica
                          WHERE FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$rsHospitalRadiologia = mysqli_query($conexion,$sqlHospitalRadiologia)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalRadiologia=mysqli_fetch_array($rsHospitalRadiologia))
{
    $Id_Paciente=$rowHospitalRadiologia['ID'];


    $sqlHospitalCirugia = "SELECT * FROM cirugia
                           INNER JOIN tabla_tipo_complicaciones
                           ON tabla_tipo_complicaciones.Id_Cirugia = cirugia.ID
                           WHERE cirugia.Id_Paciente = '$Id_Paciente'
                           AND cirugia.B_Cirugia = 1";
                       
    $rsHospitalCirugia = mysqli_query($conexion,$sqlHospitalCirugia)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalCirugia);
    
    $Id_Cirugia = -1;
    
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalCirugia=mysqli_fetch_array($rsHospitalCirugia))
        {
            $Id_Cirugia=$rowHospitalCirugia['ID'];
            $T_operados_total_tecnica++;
        }//Fin while cirugia
    }//Fin cirugia  
    
    //mysqli_free_result($rsHospitalTablaCirugia);
    mysqli_free_result($rsHospitalCirugia);
    

    if ($Id_Cirugia > -1)  //Buscar reintervención y mortalidad
    {
        $sqlHospitalTablaCirugiaCompl = "SELECT * FROM tabla_tipo_complicaciones
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
                   
        $rsHospitalTablaCirugiaCompl = mysqli_query($conexion,$sqlHospitalTablaCirugiaCompl)
        or die('Error: ' . mysqli_error());
        
        $exite = mysqli_num_rows($rsHospitalTablaCirugiaCompl);
        
        if ($exite > 0)
        {
            while($rowHospitalTablaCirugiaCompl=mysqli_fetch_array($rsHospitalTablaCirugiaCompl))
            {	
                if($rowHospitalTablaCirugiaCompl['B_Exitus_Intraop'] == 1 or $rowHospitalTablaCirugiaCompl['B_Exitus_Postop'] == 1)
                {
                    $C_T_mortalidad++;
                    $T_mortalidad_total++;
                }
                else 
                {
                    $T_mortalidad_total++;
                }
                
                
                
                if($rowHospitalTablaCirugiaCompl['B_Reintervencion'] == 1)
                {
                    $C_T_comp_reint++;
                    $T_comp_reint_total++;
                }
                else
                {
                    $T_comp_reint_total++;
                }
            
			}//Fin tabla_complicaciones 
        
			mysqli_free_result($rsHospitalTablaCirugiaCompl);
        
		}
		
		
		//Buscar H_herida
		
		$sqlHospitalTablaCirugiaComplHerida = "SELECT * FROM tabla_herida
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
                   
        $rsHospitalTablaCirugiaComplHerida = mysqli_query($conexion,$sqlHospitalTablaCirugiaComplHerida)
        or die('Error: ' . mysqli_error());
        
        $exite = mysqli_num_rows($rsHospitalTablaCirugiaComplHerida);
        
        if ($exite > 0)
        {
            while($rowHospitalTablaCirugiaComplHerida=mysqli_fetch_array($rsHospitalTablaCirugiaComplHerida))
            {	
 
                if($rowHospitalTablaCirugiaComplHerida['Id_Tipo_Herida'] == 2) //Herida
                {
                    $C_T_comp_herida++;
                    $T_comp_herida_total++;
                }
                else
                {
                    $T_comp_herida_total++;
                }
            
			}
        
			mysqli_free_result($rsHospitalTablaCirugiaComplHerida);
        
		}
		
		
		//Buscar P_infeccion
		
		$sqlHospitalTablaCirugiaComplPerine = "SELECT * FROM tabla_perine
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
                   
        $rsHospitalTablaCirugiaComplPerine = mysqli_query($conexion,$sqlHospitalTablaCirugiaComplPerine)
        or die('Error: ' . mysqli_error());
        
        $exite = mysqli_num_rows($rsHospitalTablaCirugiaComplPerine);
        
        if ($exite > 0)
        {
            while($rowHospitalTablaCirugiaComplPerine=mysqli_fetch_array($rsHospitalTablaCirugiaComplPerine))
            {	
 
                if($rowHospitalTablaCirugiaComplPerine['Id_Tipo_Perine'] == 1) //infección
                {
                    $C_T_comp_perine++;
                    $T_comp_perine_total++;
                }
                else
                {
                    $T_comp_perine_total++;
                }
            
			}
        
			mysqli_free_result($rsHospitalTablaCirugiaComplPerine);
        
		}
		
		
		//Buscar A_ABSCE
		
		$sqlHospitalTablaCirugiaComplAbdo = "SELECT * FROM tabla_abdominales
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
                   
        $rsHospitalTablaCirugiaComplAbdo = mysqli_query($conexion,$sqlHospitalTablaCirugiaComplAbdo)
        or die('Error: ' . mysqli_error());
        
        $exite = mysqli_num_rows($rsHospitalTablaCirugiaComplAbdo);
        
        if ($exite > 0)
        {
            while($rowHospitalTablaCirugiaComplAbdo=mysqli_fetch_array($rsHospitalTablaCirugiaComplAbdo))
            {	
 
                if($rowHospitalTablaCirugiaComplAbdo['Id_Tipo_Abdominales'] == 3) //Abceso abdominal
                {
                    $C_T_comp_abd++;
                    $T_comp_abd_total++;
                }
                else
                {
                    $T_comp_abd_total++;
                }
            
			}
        
			mysqli_free_result($rsHospitalTablaCirugiaComplAbdo);
        
		}
		
		
		//Buscar AN_FUGA
		
		$sqlHospitalTablaCirugiaComplAnast = "SELECT * FROM tabla_anastomosis_complicaciones
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
                   
        $rsHospitalTablaCirugiaComplAnast= mysqli_query($conexion,$sqlHospitalTablaCirugiaComplAnast)
        or die('Error: ' . mysqli_error());
        
        $exite = mysqli_num_rows($rsHospitalTablaCirugiaComplAnast);
        
        if ($exite > 0)
        {
            while($rowHospitalTablaCirugiaComplAnast=mysqli_fetch_array($rsHospitalTablaCirugiaComplAnast))
            {	
 
                if($rowHospitalTablaCirugiaComplAnast['Id_Tipo_Anastomosis_Complicaciones'] == 2) //Abnastomosis Fuga
                {
                    $C_T_comp_anast++;
                    $T_comp_anast_total++;
                }
                else
                {
                    $T_comp_anast_total++;
                }
            
			}
        
			mysqli_free_result($rsHospitalTablaCirugiaComplAnast);
        
		}
	
	
	


	} //Fin HospitalRadiologia
  
mysqli_free_result($rsHospitalRadiologia);









/*
 * "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesHospitalTotal)*100),
    "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesTotal)*100),*/

//Fill de array
$a=array(

    "C_T_mortalidad"=>number_format((($C_T_mortalidad/$T_operados_total_tecnica)*100), 2, '.', ''),
    
    "C_T_comp_herida"=>number_format((($C_T_comp_herida/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_comp_perine"=>number_format((($C_T_comp_perine/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_comp_anast"=>number_format((($C_T_comp_anast/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_comp_abd"=>number_format((($C_T_comp_abd/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_comp_reint"=>number_format((($C_T_comp_reint/$T_operados_total_tecnica)*100), 2, '.', ''),
    
    
    );




mysqli_close($conexion);
 

//output the response
echo json_encode($a);
?>