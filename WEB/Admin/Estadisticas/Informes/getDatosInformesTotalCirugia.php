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

$T_operados_total_tecnica = 0;
$T_operados_total_mesorre = 0;

//ETM en tumores de tercio medio/inferior
$C_T_tumor_inf_total_pacientes = 0;

$T_via_abierta_total = 0;

$T_perf_tumor_total = 0;

$T_int_total = 0;

$T_estoma_deriva_total = 0;

$T_mortalidad_total = 0;

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

$C_T_tec_1 = 0;
$C_T_tec_2 = 0;
$C_T_tec_3 = 0;
$C_T_tec_4 = 0;
$C_T_tec_10 = 0;
$C_T_tec_5 = 0;
$C_T_tec_6 = 0;
$C_T_tec_7 = 0;
$C_T_tec_9 = 0;
$C_T_tec_8 = 0;


$C_T_meso_parcial = 0;                    
$C_T_meso_total = 0;
$C_T_meso_no = 0;


$C_T_tumor_inf_parcial = 0;
$C_T_tumor_inf_total = 0;
$C_T_tumor_inf_no = 0;


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
    
    $sqlHospitalInicial = "SELECT Id_Estadio_Radio, Localizacion FROM inicial
                           WHERE Id_Paciente = '$Id_Paciente'";
                       
    $rsHospitalInicial = mysqli_query($conexion,$sqlHospitalInicial)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalInicial);
    
    $localizacion = 100;
    $Id_Estadio_Radio = 100;
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalInicial=mysqli_fetch_array($rsHospitalInicial))
        {
            
            $localizacion = $rowHospitalInicial["Localizacion"];
            $Id_Estadio_Radio = $rowHospitalInicial["Id_Estadio_Radio"];
            
        }//Fin while  inicial
  
    }//Fin inicial
    mysqli_free_result($rsHospitalInicial);
    

    
    
    
    $sqlHospitalCirugia = "SELECT ID FROM cirugia
                           WHERE Id_Paciente = '$Id_Paciente'
                           AND B_Cirugia = 1";
                       
    $rsHospitalCirugia = mysqli_query($conexion,$sqlHospitalCirugia)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalCirugia);
    
    $Id_Cirugia = -1;
    
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalCirugia=mysqli_fetch_array($rsHospitalCirugia))
        {
            $Id_Cirugia=$rowHospitalCirugia['ID'];
        }//Fin while cirugia
    }//Fin cirugia  
    
    //mysqli_free_result($rsHospitalTablaCirugia);
    mysqli_free_result($rsHospitalCirugia);
    
    $Id_Tecnica = 100;
    if ($Id_Cirugia > -1)
    {
        $sqlHospitalTablaCirugia = "SELECT Id_Tecnica, Id_Exeresis_Meso  FROM tabla_cirugia
                                    WHERE Id_Cirugia = '$Id_Cirugia'";
                   
        $rsHospitalTablaCirugia = mysqli_query($conexion,$sqlHospitalTablaCirugia)
        or die('Error: ' . mysqli_error());
        
        $exite = mysqli_num_rows($rsHospitalTablaCirugia);
        
        if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
        {
            
            while($rowHospitalTablaCirugia=mysqli_fetch_array($rsHospitalTablaCirugia))
            {
                $Id_Tecnica = $rowHospitalTablaCirugia["Id_Tecnica"];
                
                switch (intval($rowHospitalTablaCirugia["Id_Tecnica"])) 
                {
                    case 1:
                        $C_T_tec_1++;
                        $T_operados_total_tecnica++;
                        break;
                    case 2:
                        $C_T_tec_2++;
                        $T_operados_total_tecnica++;
                        break;
                    case 3:
                        $C_T_tec_3++;
                        $T_operados_total_tecnica++;
                        break;
                    case 4:
                        $C_T_tec_4++;
                        $T_operados_total_tecnica++;
                        break;
                    case 5:
                        $C_T_tec_5++;
                        $T_operados_total_tecnica++;
                        break;
                    case 6:
                        $C_T_tec_6++;
                        $T_operados_total_tecnica++;
                        break;
                    case 7:
                        $C_T_tec_7++;
                        $T_operados_total_tecnica++;
                        break;
                    case 8:
                        $C_T_tec_8++;
                        $T_operados_total_tecnica++;
                        break;
                    case 9:
                        $C_T_tec_9++;
                        $T_operados_total_tecnica++;
                        break; 
                    case 10:
                        $C_T_tec_10++;
                        $T_operados_total_tecnica++;
                        break;  
                    default:
                        
                        break;
                }


                switch (intval($rowHospitalTablaCirugia["Id_Exeresis_Meso"])) 
                {
                    case 1:
                        $C_T_meso_parcial++;
                        $T_operados_total_mesorre++;
                        break;
                    case 2:
                        $C_T_meso_total++;
                        $T_operados_total_mesorre++;
                        break;
                    case 3:
                        $C_T_meso_no++;
                        $T_operados_total_mesorre++;
                        break;
                    
                    default:
                        
                        break;
                }
                
                if ($localizacion < 10)
                {
                    switch (intval($rowHospitalTablaCirugia["Id_Exeresis_Meso"]))
                     {
                        case 1:
                            $C_T_tumor_inf_parcial++;
                            $C_T_tumor_inf_total_pacientes++; 
                            break;
                        case 2:
                            $C_T_tumor_inf_total++;
                            $C_T_tumor_inf_total_pacientes++; 
                            break;
                        case 3:
                            $C_T_tumor_inf_no++;
                            $C_T_tumor_inf_total_pacientes++; 
                            break;
                        
                        default:
                            
                            break;
                    }                        
                }

            }//Fin while tabla_cirugia
            
        }//Fin tabla_cirugia 
 
        mysqli_free_result($rsHospitalTablaCirugia);
              
    }


    if ($Id_Cirugia > -1)
    {
        $sqlHospitalTablaCirugiaCarac = "SELECT Id_Via_Operacion, Id_Intencion, B_Estoma_Derivacion, Perforacion_Tumoral  FROM tabla_caracteristicas_cirugia
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
                   
        $rsHospitalTablaCirugiaCarac = mysqli_query($conexion,$sqlHospitalTablaCirugiaCarac)
        or die('Error: ' . mysqli_error());
        
        $exite = mysqli_num_rows($rsHospitalTablaCirugiaCarac);
        
        if ($exite > 0)
        {
            while($rowHospitalTablaCirugiaCarac=mysqli_fetch_array($rsHospitalTablaCirugiaCarac, MYSQLI_BOTH))
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
                
                switch ($Id_Tecnica) 
                    {
                        case 2:
                            $T_estoma_deriva_total++;
                            
                            if ($rowHospitalTablaCirugiaCarac["B_Estoma_Derivacion"] == 1)
                            {
                                $C_T_estoma_deriva++;
                            }
                            
                            break;
                        case 3:
                            $T_estoma_deriva_total++;
                            
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
                    
                    switch ($Id_Tecnica) 
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

    }

    if ($Id_Cirugia > -1)
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
                
                if($rowHospitalTablaCirugiaCompl['B_Herida'] == 1)
                {
                    $C_T_comp_herida++;
                    $T_comp_herida_total++;
                }
                else
                {
                    $T_comp_herida_total++;
                }
                if($rowHospitalTablaCirugiaCompl['B_Herida'] == 1)
                {
                    $C_T_comp_herida++;
                    $T_comp_herida_total++;
                }
                else
                {
                    $T_comp_herida_total++;
                }
                
                if($rowHospitalTablaCirugiaCompl['B_Perine'] == 1)
                {
                    $C_T_comp_perine++;
                    $T_comp_perine_total++;
                }
                else
                {
                    $T_comp_perine_total++;
                }
                
                if($rowHospitalTablaCirugiaCompl['B_Anastomosis'] == 1)
                {
                    $C_T_comp_anast++;
                    $T_comp_anast_total++;
                }
                else
                {
                    $T_comp_anast_total++;
                }
                
                if($rowHospitalTablaCirugiaCompl['B_Abdominales'] == 1)
                {
                    $C_T_comp_abd++;
                    $T_comp_abd_total++;
                }
                else
                {
                    $T_comp_abd_total++;
                }
                
            }
        
            
        }//Fin tabla_complicaciones 
        
        mysqli_free_result($rsHospitalTablaCirugiaCompl);
        
    }


} //Fin HospitalRadiologia
  
mysqli_free_result($rsHospitalRadiologia);









/*
 * "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesHospitalTotal)*100),
    "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesTotal)*100),*/

//Fill de array
$a=array(
    "C_T_tec_1"=>number_format((($C_T_tec_1/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_23"=>number_format(((($C_T_tec_2 + $C_T_tec_3)/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_2"=>number_format((($C_T_tec_2/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_3"=>number_format((($C_T_tec_3/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_410"=>number_format(((($C_T_tec_4 + $C_T_tec_10)/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_4"=>number_format((($C_T_tec_4/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_10"=>number_format((($C_T_tec_10/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_5"=>number_format((($C_T_tec_5/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_6"=>number_format((($C_T_tec_6/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_7"=>number_format((($C_T_tec_7/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_9"=>number_format((($C_T_tec_9/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_8"=>number_format((($C_T_tec_8/$T_operados_total_tecnica)*100), 2, '.', ''),
    
    "C_T_meso_parcial"=>number_format((($C_T_meso_parcial/$T_operados_total_mesorre)*100), 2, '.', ''),
    "C_T_meso_total"=>number_format((($C_T_meso_total/$T_operados_total_mesorre)*100), 2, '.', ''),
    "C_T_meso_no"=>number_format((($C_T_meso_no/$T_operados_total_mesorre)*100), 2, '.', ''),
    
    
    "C_T_tumor_inf_parcial"=>number_format((($C_T_tumor_inf_parcial/$C_T_tumor_inf_total_pacientes)*100), 2, '.', ''),
    "C_T_tumor_inf_total"=>number_format((($C_T_tumor_inf_total/$C_T_tumor_inf_total_pacientes)*100), 2, '.', ''),
    "C_T_tumor_inf_no"=>number_format((($C_T_tumor_inf_no/$C_T_tumor_inf_total_pacientes)*100), 2, '.', ''),
    
    
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