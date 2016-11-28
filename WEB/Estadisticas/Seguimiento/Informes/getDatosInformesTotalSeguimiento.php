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
 * Seguimiento
 ***************************************/
 
$T_rec_Total = 0;


$T_estado_Total = 0;



 /****************************************************
 * 
 * ** Seguimiento **
 * 
 ***************************************************/
 
$S_T_rec_local = 0;
$S_T_rec_sistematica = 0;
$S_T_rec_local_sistematica = 0;

$S_T_estado_vivo = 0;
$S_T_estado_muerto = 0;





$sqlHospitalRadiologia = "SELECT ID FROM tabla_estadistica
                          WHERE FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$rsHospitalRadiologia = mysqli_query($conexion,$sqlHospitalRadiologia)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalRadiologia=mysqli_fetch_array($rsHospitalRadiologia))
{
    $Id_Paciente=$rowHospitalRadiologia['ID'];
    
   
    $sqlHospitalSeguimiento = "SELECT B_Recidiva, B_Metastasis, B_Estado  FROM seguimiento
                               WHERE Id_Paciente = '$Id_Paciente'";
                       
    $rsHospitalSeguimiento = mysqli_query($conexion,$sqlHospitalSeguimiento)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalSeguimiento);
    
    if ($exite > 0)
    {
        while($rowHospitalSeguimiento=mysqli_fetch_array($rsHospitalSeguimiento))
        {
            if($rowHospitalSeguimiento['B_Recidiva'] == 1 && $rowHospitalSeguimiento['B_Metastasis'] == 1)
            {
                $S_T_rec_local_sistematica++;
            }
            elseif($rowHospitalSeguimiento['B_Recidiva'] == 1) 
            {
                $S_T_rec_local++;
            }
            elseif($rowHospitalSeguimiento['B_Metastasis'] == 1) 
            {
                $S_T_rec_sistematica++;
                
            }

            $T_rec_Total++;
            
            
            if($rowHospitalSeguimiento['B_Estado'] == 1)
            {
                $S_T_estado_vivo++;
            }
            elseif($rowHospitalSeguimiento['B_Estado'] == 2) 
            {
                $S_T_estado_muerto++;
                
            }
			
			$T_estado_Total++;
            

            
        }// Fin while Seguimiento

    }// Fin Seguimiento
    
    mysqli_free_result($rsHospitalSeguimiento);
    
    

} //Fin HospitalRadiologia
  
mysqli_free_result($rsHospitalRadiologia);









/*
 * "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesHospitalTotal)*100),
    "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesTotal)*100),*/

//Fill de array
$a=array(

   
    "S_T_rec_local"=>number_format((($S_T_rec_local/$T_rec_Total)*100), 2, '.', ''),
    "S_T_rec_sistematica"=>number_format((($S_T_rec_sistematica/$T_rec_Total)*100), 2, '.', ''),
    "S_T_rec_local_sistematica"=>number_format((($S_T_rec_local_sistematica/$T_rec_Total)*100), 2, '.', ''),
     
     
    "S_T_estado_vivo"=>number_format((($S_T_estado_vivo/$T_estado_Total)*100), 2, '.', ''),
    "S_T_estado_muerto"=>number_format((($S_T_estado_muerto/$T_estado_Total)*100), 2, '.', ''),
    
    );




mysqli_close($conexion);
 

//output the response
echo json_encode($a);
?>