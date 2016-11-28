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
 * Operados
 ***************************************/


$T_via_abierta_total = 0;

$T_perf_tumor_total = 0;

$T_int_total = 0;

$T_estoma_deriva_total = 0;




 /****************************************************
 * 
 * ** Cirugía **
 * 
 ***************************************************/

$C_T_via_lapar = 0;
$C_T_via_lapar_conv = 0;
$C_T_via_abierta = 0;

$C_T_perf_tumor_alta = 0;
$C_T_perf_tumor_baja = 0;
$C_T_perf_tumor_amp_abd = 0;
$C_T_perf_tumor_proc = 0;
$C_T_perf_tumor_hart = 0;
$C_T_perf_tumor_total = 0; 


$C_T_int_curativa = 0;
$C_T_int_paliativa = 0;
$C_T_int_no = 0;

$C_T_estoma_deriva = 0;




 
$sqlHospitalRadiologia = "SELECT ID FROM tabla_estadistica
                          WHERE FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$rsHospitalRadiologia = mysqli_query($conexion,$sqlHospitalRadiologia)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalRadiologia=mysqli_fetch_array($rsHospitalRadiologia))
{
    $Id_Paciente=$rowHospitalRadiologia['ID'];
   
    $sqlHospitalTablaCirugiaCarac = "SELECT tabla_cirugia.Id_Tecnica, tabla_cirugia.Id_Exeresis_Meso, tabla_caracteristicas_cirugia.Id_Via_Operacion, tabla_caracteristicas_cirugia.Id_Intencion, tabla_caracteristicas_cirugia.B_Estoma_Derivacion, tabla_caracteristicas_cirugia.Perforacion_Tumoral
                                     FROM cirugia
                                     INNER JOIN tabla_cirugia
                                     ON tabla_cirugia.Id_Cirugia = cirugia.ID
                                     INNER JOIN tabla_caracteristicas_cirugia
                                     ON tabla_caracteristicas_cirugia.Id_Cirugia = cirugia.ID
                                     WHERE cirugia.Id_Paciente = '$Id_Paciente'
                                     AND cirugia.B_Cirugia = 1";

                   
    $rsHospitalTablaCirugiaCarac = mysqli_query($conexion,$sqlHospitalTablaCirugiaCarac)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalTablaCirugiaCarac);
    
    if ($exite > 0)
    {
        while($rowHospitalTablaCirugiaCarac=mysqli_fetch_array($rsHospitalTablaCirugiaCarac))
        {
            switch (intval($rowHospitalTablaCirugiaCarac["Id_Via_Operacion"])) 
            {
                case 1:
                    $C_T_via_lapar++;
                    $T_via_abierta_total++;
                    break;
                case 2:
                    $C_T_via_lapar_conv++;
                    $T_via_abierta_total++;
                    break;
                case 3:
                    $C_T_via_abierta++;
                    $T_via_abierta_total++;
                    break;
                
                default:
                    
                    break;
            }
            
            switch (intval($rowHospitalTablaCirugiaCarac["Id_Intencion"])) 
            {
                case 1:
                    $C_T_int_curativa++;
                    $T_int_total++;
                    break;
                case 2:
                    $C_T_int_paliativa++;
                    $T_int_total++;
                    break;
                case 3:
                    $C_T_int_no++;
                    $T_int_total++;
                    break;
                
                default:
                    
                    break;
            }
            
            switch ($rowHospitalTablaCirugiaCarac["Id_Tecnica"]) 
                {
                    case 2:
                        //$T_estoma_deriva_total++;
                        
                        if ($rowHospitalTablaCirugiaCarac["B_Estoma_Derivacion"] == 1)
                        {
                            $C_T_estoma_deriva++;
                        }
                        
                        break;
                    case 3:
                        //$T_estoma_deriva_total++;
                        
                        if ($rowHospitalTablaCirugiaCarac["B_Estoma_Derivacion"] == 1)
                        {
                            $C_T_estoma_deriva++;
                        }
                        break;
                    
                    default:
                        
                        break;
                }
                
            if ($rowHospitalTablaCirugiaCarac["B_Estoma_Derivacion"] == 1)
            {
                $T_estoma_deriva_total++;  
            }
            else 
            {
                $T_estoma_deriva_total++;   
            }
                        
  
                        
            if ($rowHospitalTablaCirugiaCarac["Perforacion_Tumoral"] == 1)
            {
                $C_T_perf_tumor_total++;
                $T_perf_tumor_total++;
                
                switch ($rowHospitalTablaCirugiaCarac["Id_Tecnica"]) 
                {
                    case 2:
                        $C_T_perf_tumor_alta++;
                        break;
                    case 3:
                        $C_T_perf_tumor_baja++;
                        break;
                    case 4:
                        $C_T_perf_tumor_amp_abd++;
                        break;
                    case 5:
                        $C_T_perf_tumor_proc++;
                        break;
                    case 6:
                        $C_T_perf_tumor_hart++;
                        break;
                    default:
                        
                        break;
                }
            }
            else
            {
               $T_perf_tumor_total++; 
            }

        }
    }//Fin tabla_caracteristicas_cirugia 
    
    mysqli_free_result($rsHospitalTablaCirugiaCarac);


} //Fin HospitalRadiologia
  
mysqli_free_result($rsHospitalRadiologia);









/*
 * "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesHospitalTotal)*100),
    "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesTotal)*100),*/

//Fill de array
$a=array(
   
    "C_T_via_lapar"=>number_format((($C_T_via_lapar/$T_via_abierta_total)*100), 2, '.', ''),
    "C_T_via_lapar_conv"=>number_format((($C_T_via_lapar_conv/$T_via_abierta_total)*100), 2, '.', ''),
    "C_T_via_abierta"=>number_format((($C_T_via_abierta/$T_via_abierta_total)*100), 2, '.', ''),
    
    "C_T_perf_tumor_alta"=>number_format((($C_T_perf_tumor_alta/$T_perf_tumor_total)*100), 2, '.', ''),
    "C_T_perf_tumor_baja"=>number_format((($C_T_perf_tumor_baja/$T_perf_tumor_total)*100), 2, '.', ''),
    "C_T_perf_tumor_amp_abd"=>number_format((($C_T_perf_tumor_amp_abd/$T_perf_tumor_total)*100), 2, '.', ''),
    "C_T_perf_tumor_proc"=>number_format((($C_T_perf_tumor_proc/$T_perf_tumor_total)*100), 2, '.', ''),
    "C_T_perf_tumor_hart"=>number_format((($C_T_perf_tumor_hart/$T_perf_tumor_total)*100), 2, '.', ''),
    "C_T_perf_tumor_total"=>number_format((($C_T_perf_tumor_total/$T_perf_tumor_total)*100), 2, '.', ''),
    
    "C_T_int_curativa"=>number_format((($C_T_int_curativa/$T_int_total)*100), 2, '.', ''),
    "C_T_int_paliativa"=>number_format((($C_T_int_paliativa/$T_int_total)*100), 2, '.', ''),
    "C_T_int_no"=>number_format((($C_T_int_no/$T_int_total)*100), 2, '.', ''),
    
    "C_T_estoma_deriva"=>number_format((($C_T_estoma_deriva/$T_estoma_deriva_total)*100), 2, '.', ''),
    
    
    );



mysqli_close($conexion);
 


//output the response
echo json_encode($a);
?>