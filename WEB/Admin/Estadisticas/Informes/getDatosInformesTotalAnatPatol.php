<?php
session_start();

require_once ('../../../BDD/conexion.php');


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
 * Anatomía patológica
 ***************************************/

$T_estadio_Total = 0;

$T_circun_Total = 0;

$T_distal_Total = 0;

$T_resec_Total = 0;

$T_regre_Total = 0;

$T_cal_mesorre_Total = 0;



 /****************************************************
 * 
 * ** Anatomía patológica **
 * 
 ***************************************************/

$AP_T_estadio_0 = 0;
$AP_T_estadio_I = 0;
$AP_T_estadio_II = 0;
$AP_T_estadio_III = 0;
$AP_T_estadio_IV = 0;

$AP_T_gang_aisl_min = 10000;
$AP_T_gang_aisl_med = 0;
$AP_T_gang_aisl_max = 0;

$AP_T_gang_afec_min = 10000;
$AP_T_gang_afec_med = 0;
$AP_T_gang_afec_max = 0;


$AP_T_circun_afecto = 0;
$AP_T_circun_libre = 0;

$AP_T_distal_afecto = 0;
$AP_T_distal_libre = 0;


$AP_T_resec_R0 = 0;
$AP_T_resec_R1 = 0;
$AP_T_resec_R2 = 0;


    
$AP_T_regre_GR0 = 0;
$AP_T_regre_GR1 = 0;
$AP_T_regre_GR2 = 0;
$AP_T_regre_GR3 = 0;
$AP_T_regre_GR4 = 0;


$AP_T_cal_mesorre_satisf = 0;
$AP_T_cal_mesorre_parc_satisf = 0;
$AP_T_cal_mesorre_insatisf = 0;



$sqlHospitalRadiologia = "SELECT ID FROM tabla_estadistica
                          WHERE FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$rsHospitalRadiologia = mysqli_query($conexion,$sqlHospitalRadiologia)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalRadiologia=mysqli_fetch_array($rsHospitalRadiologia))
{
    $Id_Paciente=$rowHospitalRadiologia['ID'];
    
       
    $sqlHospitalAnatPatol = "SELECT Id_Estadio_Patologico, Glangios_Ais, Glangios_Afec, Id_Margen_Circunferencial, Id_Margen_Distal, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal  FROM anatomia_patologica
                             WHERE Id_Paciente = '$Id_Paciente'";
                       
    $rsHospitalAnatPatol = mysqli_query($conexion,$sqlHospitalAnatPatol)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalAnatPatol);
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalAnatPatol=mysqli_fetch_array($rsHospitalAnatPatol))
        {
            $T_estadio_Total++;
            
            if($rowHospitalAnatPatol['Id_Estadio_Patologico'] == 1)
            {
                $AP_T_estadio_I++;
            }
            elseif ($rowHospitalAnatPatol['Id_Estadio_Patologico'] == 2) 
            {
                $AP_T_estadio_II++;
            }
            elseif ($rowHospitalAnatPatol['Id_Estadio_Patologico'] == 3) 
            {
                $AP_T_estadio_III++;
            }
            elseif ($rowHospitalAnatPatol['Id_Estadio_Patologico'] == 4) 
            {
                $AP_T_estadio_IV++;
            }
            else
            {
                $AP_T_estadio_0++;
            }
            
            if($rowHospitalAnatPatol['Glangios_Ais'] < $AP_T_gang_aisl_min)
            {
                $AP_T_gang_aisl_min = intval($rowHospitalAnatPatol['Glangios_Ais']);
            }
              
            
            if($rowHospitalAnatPatol['Glangios_Ais'] > $AP_T_gang_aisl_max)
            {
                $AP_T_gang_aisl_max = $rowHospitalAnatPatol['Glangios_Ais'];
            }

            $AP_T_gang_aisl_med = $AP_T_gang_aisl_med + $rowHospitalAnatPatol['Glangios_Ais'];





            if($rowHospitalAnatPatol['Glangios_Afec'] < $AP_T_gang_afec_min)
            {
                $AP_T_gang_afec_min = intval($rowHospitalAnatPatol['Glangios_Afec']);
            }
              
            
            if($rowHospitalAnatPatol['Glangios_Afec'] > $AP_T_gang_afec_max)
            {
                $AP_T_gang_afec_max = $rowHospitalAnatPatol['Glangios_Afec'];
            }

            $AP_T_gang_afec_med = $AP_T_gang_afec_med + $rowHospitalAnatPatol['Glangios_Afec'];

            
            
            if($rowHospitalAnatPatol['Id_Margen_Circunferencial'] == 1)
            {
                $AP_T_circun_libre++;
                $T_circun_Total++;
            }
            else
            {
                $AP_T_circun_afecto++;
                $T_circun_Total++;
            }
            
            if($rowHospitalAnatPatol['Id_Margen_Distal'] == 1)
            {
                $AP_T_distal_libre++;
                $T_distal_Total++;
            }
            else
            {
                $AP_T_distal_afecto++;
                $T_distal_Total++;
            }
            
            if($rowHospitalAnatPatol['Id_Tipo_Res'] == 1)
            {
                $AP_T_resec_R0++;
                $T_resec_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Tipo_Res'] == 2) 
            {
                $AP_T_resec_R1++;
                $T_resec_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Tipo_Res'] == 3)
            {
                $AP_T_resec_R2++;
                $T_resec_Total++;
            }
            
            
            
            
            if($rowHospitalAnatPatol['Id_Regresion'] == 1)
            {
                $AP_T_regre_GR0++;
                $T_regre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Regresion'] == 2) 
            {
                $AP_T_regre_GR1++;
                $T_regre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Regresion'] == 3)
            {
                $AP_T_regre_GR2++;
                $T_regre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Regresion'] == 4)
            {
                $AP_T_regre_GR3++;
                $T_regre_Total++;
            }
            else
            {
                $AP_T_regre_GR4++;
                $T_regre_Total++;
            }
            
            
            if($rowHospitalAnatPatol['Id_Meso_Cal'] == 1)
            {
                $AP_T_cal_mesorre_satisf++;
                $T_cal_mesorre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Meso_Cal'] == 2) 
            {
                $AP_T_cal_mesorre_parc_satisf++;
                $T_cal_mesorre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Meso_Cal'] == 3)
            {
                $AP_T_cal_mesorre_insatisf++;
                $T_cal_mesorre_Total++;
            }
            


            
        }//Fin while anatomía patológica
          
    }//Fin anatomía patológica

    mysqli_free_result($rsHospitalAnatPatol);
   


} //Fin HospitalRadiologia
  
mysqli_free_result($rsHospitalRadiologia);









/*
 * "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesHospitalTotal)*100),
    "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesTotal)*100),*/

//Fill de array
$a=array(

    
    "AP_T_estadio_0"=>number_format((($AP_T_estadio_0/$T_estadio_Total)*100), 2, '.', ''),
    "AP_T_estadio_I"=>number_format((($AP_T_estadio_I/$T_estadio_Total)*100), 2, '.', ''),
    "AP_T_estadio_II"=>number_format((($AP_T_estadio_II/$T_estadio_Total)*100), 2, '.', ''),
    "AP_T_estadio_III"=>number_format((($AP_T_estadio_III/$T_estadio_Total)*100), 2, '.', ''),
    "AP_T_estadio_IV"=>number_format((($AP_T_estadio_IV/$T_estadio_Total)*100), 2, '.', ''),
    
    "AP_T_gang_aisl_min"=>$AP_T_gang_aisl_min,
    "AP_T_gang_aisl_med"=>number_format(($AP_T_gang_aisl_med/$T_estadio_Total), 2, '.', ''),
    "AP_T_gang_aisl_max"=>$AP_T_gang_aisl_max,
    
    "AP_T_gang_afec_min"=>$AP_T_gang_afec_min,
    "AP_T_gang_afec_med"=>number_format(($AP_T_gang_afec_med/$T_estadio_Total), 2, '.', ''),
    "AP_T_gang_afec_max"=>$AP_T_gang_afec_max,
    
    "AP_T_circun_afecto"=>number_format((($AP_T_circun_afecto/$T_circun_Total)*100), 2, '.', ''),
    "AP_T_circun_libre"=>number_format((($AP_T_circun_libre/$T_circun_Total)*100), 2, '.', ''),
    
    
    "AP_T_distal_afecto"=>number_format((($AP_T_distal_afecto/$T_circun_Total)*100), 2, '.', ''),
    "AP_T_distal_libre"=>number_format((($AP_T_distal_libre/$T_circun_Total)*100), 2, '.', ''),
    
    
    "AP_T_resec_R0"=>number_format((($AP_T_resec_R0/$T_resec_Total)*100), 2, '.', ''),
    "AP_T_resec_R1"=>number_format((($AP_T_resec_R1/$T_resec_Total)*100), 2, '.', ''),
    "AP_T_resec_R2"=>number_format((($AP_T_resec_R2/$T_resec_Total)*100), 2, '.', ''),
    
  
    "AP_T_regre_GR0"=>number_format((($AP_T_regre_GR0/$T_regre_Total)*100), 2, '.', ''),
    "AP_T_regre_GR1"=>number_format((($AP_T_regre_GR1/$T_regre_Total)*100), 2, '.', ''),
    "AP_T_regre_GR2"=>number_format((($AP_T_regre_GR2/$T_regre_Total)*100), 2, '.', ''),
    "AP_T_regre_GR3"=>number_format((($AP_T_regre_GR3/$T_regre_Total)*100), 2, '.', ''),
    "AP_T_regre_GR4"=>number_format((($AP_T_regre_GR4/$T_regre_Total)*100), 2, '.', ''),
    
    
    "AP_T_cal_mesorre_satisf"=>number_format((($AP_T_cal_mesorre_satisf/$T_cal_mesorre_Total)*100), 2, '.', ''),
    "AP_T_cal_mesorre_parc_satisf"=>number_format((($AP_T_cal_mesorre_parc_satisf/$T_cal_mesorre_Total)*100), 2, '.', ''),
    "AP_T_cal_mesorre_insatisf"=>number_format((($AP_T_cal_mesorre_insatisf/$T_cal_mesorre_Total)*100), 2, '.', ''),
   
   
    
    );



mysqli_close($conexion);

//output the response
echo json_encode($a);
?>