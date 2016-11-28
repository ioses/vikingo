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

$T_operados_total_tecnica = 0;
$T_operados_total_mesorre = 0;

//ETM en tumores de tercio medio/inferior
$C_T_tumor_inf_total_pacientes = 0;

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


 
$sqlHospitalRadiologia = "SELECT ID FROM tabla_estadistica
                          WHERE FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$rsHospitalRadiologia = mysqli_query($conexion,$sqlHospitalRadiologia)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalRadiologia=mysqli_fetch_array($rsHospitalRadiologia))
{
    $Id_Paciente=$rowHospitalRadiologia['ID'];
    
    $sqlHospitalTablaCirugia = "SELECT inicial.Localizacion, tabla_cirugia.Id_Tecnica, tabla_cirugia.Id_Exeresis_Meso 
                                FROM inicial, cirugia 
                                INNER JOIN tabla_cirugia
                                ON tabla_cirugia.Id_Cirugia = cirugia.ID
                                WHERE inicial.Id_Paciente = '$Id_Paciente'
                                AND cirugia.Id_Paciente = '$Id_Paciente'
                                AND B_Cirugia = 1";
               
    $rsHospitalTablaCirugia = mysqli_query($conexion,$sqlHospitalTablaCirugia)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalTablaCirugia);
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        
        while($rowHospitalTablaCirugia=mysqli_fetch_array($rsHospitalTablaCirugia))
        {
            
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
                    $T_operados_total_mesorre++;
                    break;
            }
            
            if ($rowHospitalTablaCirugia["Localizacion"] < 10)
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
              


} //Fin HospitalRadiologia
  
mysqli_free_result($rsHospitalRadiologia);


//Fill de array
$a=array(
    "C_T_tec_1"=>number_format((($C_T_tec_1/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_23"=>number_format(((($C_T_tec_2 + $C_T_tec_3)/$T_operados_total_tecnica)*100), 2, '.', ''),
    //"C_T_tec_2"=>number_format((($C_T_tec_2/$T_operados_total_tecnica)*100), 2, '.', ''),
    //"C_T_tec_3"=>number_format((($C_T_tec_3/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_410"=>number_format(((($C_T_tec_4 + $C_T_tec_10)/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_4"=>number_format((($C_T_tec_4/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_10"=>number_format((($C_T_tec_10/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_5"=>number_format((($C_T_tec_5/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_6"=>number_format((($C_T_tec_6/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_7"=>number_format((($C_T_tec_7/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_9"=>number_format((($C_T_tec_9/$T_operados_total_tecnica)*100), 2, '.', ''),
    "C_T_tec_8"=>number_format((($C_T_tec_8/$T_operados_total_tecnica)*100), 2, '.', ''),
    
    "C_T_meso_parcial"=>number_format((($C_T_meso_parcial/$T_operados_total_mesorre)*100), 2, '.', ''),
    "C_T_meso_total"=>number_format((($C_T_meso_total/$T_operados_total_mesorre)*100), 2, '.', '')
    //"C_T_meso_no"=>number_format((($C_T_meso_no/$T_operados_total_mesorre)*100), 2, '.', ''),
    
    
    //"C_T_tumor_inf_parcial"=>number_format((($C_T_tumor_inf_parcial/$C_T_tumor_inf_total_pacientes)*100), 2, '.', ''),
    //"C_T_tumor_inf_total"=>number_format((($C_T_tumor_inf_total/$C_T_tumor_inf_total_pacientes)*100), 2, '.', ''),
    //"C_T_tumor_inf_no"=>number_format((($C_T_tumor_inf_no/$C_T_tumor_inf_total_pacientes)*100), 2, '.', ''),
    
    );



mysqli_close($conexion);
 

//output the response
echo json_encode($a);
?>