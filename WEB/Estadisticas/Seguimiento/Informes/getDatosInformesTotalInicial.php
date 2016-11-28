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
 

$pacientesTotalEstadiaje = 0;

$pacientesTotalTAC = 0;

$pacientesTotalIntegEsfint = 0;
 



/****************************************************
 * 
 * ** Radiología **
 * 
 ***************************************************/
$R_T_rm_eco = 0;
$R_T_rm = 0;
$R_T_eco = 0;
$R_T_no = 0;
$R_T_tac = 0;
$R_T_dist_integ_libre = 0;
$R_T_dist_integ_afecto = 0;
$R_T_dist_integ_nodatos = 0;




$sqlHospitalRadiologia = "SELECT ID FROM tabla_estadistica
                          WHERE FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$rsHospitalRadiologia = mysqli_query($conexion,$sqlHospitalRadiologia)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalRadiologia=mysqli_fetch_array($rsHospitalRadiologia))
{
    $Id_Paciente=$rowHospitalRadiologia['ID'];
    
    $sqlHospitalInicial = "SELECT B_Tec_RMN, B_Tec_ECO, Tec_TAC, Id_Integ_Esfint, Id_Estadio_Radio, Localizacion FROM inicial
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
            
            /*** Estadiaje preoperatorio **/
            if ($rowHospitalInicial["B_Tec_RMN"] == 1 && $rowHospitalInicial["B_Tec_ECO"] == 1)
            {
                $R_T_rm_eco++;
                $pacientesTotalEstadiaje++;
            }
            elseif($rowHospitalInicial["B_Tec_RMN"] == 1 && $rowHospitalInicial["B_Tec_ECO"] == 0)
            {
                $R_T_rm++;
                $pacientesTotalEstadiaje++;
            }
            elseif($rowHospitalInicial["B_Tec_RMN"] == 0 && $rowHospitalInicial["B_Tec_ECO"] == 1)
            {
                $R_T_eco++;
                $pacientesTotalEstadiaje++;
            }
            else
            {
                $R_T_no++;
                $pacientesTotalEstadiaje++;
            }
            
            /*** Estudio de extensión ***/
            if($rowHospitalInicial["Tec_TAC"] == 1)
            {
                $R_T_tac++;
                $pacientesTotalTAC++;
            }
            else 
            {
                $pacientesTotalTAC++;   
            }
            
            /*** Medición de distancia margen radial (RMN) ****/
            
            if ($rowHospitalInicial["Id_Integ_Esfint"] == 1)
            {
                $R_T_dist_integ_libre++;
                $pacientesTotalIntegEsfint++;
            }
            elseif ($rowHospitalInicial["Id_Integ_Esfint"] == 2) 
            {
                $R_T_dist_integ_afecto++;
                $pacientesTotalIntegEsfint++;
            }
            else 
            {
                $R_T_dist_integ_nodatos++;
                $pacientesTotalIntegEsfint++;
            }
            
            
            
            
        }//Fin while  inicial
  
    }//Fin inicial
    mysqli_free_result($rsHospitalInicial);
    
} //Fin HospitalRadiologia
  
mysqli_free_result($rsHospitalRadiologia);









/*
 * "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesHospitalTotal)*100),
    "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesTotal)*100),*/

//Fill de array
$a=array(
   
    
    "R_T_rm_eco"=>number_format((($R_T_rm_eco/$pacientesTotalEstadiaje)*100), 2, '.', ''),
    "R_T_rm"=>number_format((($R_T_rm/$pacientesTotalEstadiaje)*100), 2, '.', ''),
    "R_T_eco"=>number_format((($R_T_eco/$pacientesTotalEstadiaje)*100), 2, '.', ''),
    "R_T_no"=>number_format((($R_T_no/$pacientesTotalEstadiaje)*100), 2, '.', ''),
    "R_T_tac"=>number_format((($R_T_tac/$pacientesTotalTAC)*100), 2, '.', ''),
    "R_T_dist_integ_libre"=>number_format((($R_T_dist_integ_libre/$pacientesTotalIntegEsfint)*100), 2, '.', ''),
    "R_T_dist_integ_afecto"=>number_format((($R_T_dist_integ_afecto/$pacientesTotalIntegEsfint)*100), 2, '.', ''),
    "R_T_dist_integ_nodatos"=>number_format((($R_T_dist_integ_nodatos/$pacientesTotalIntegEsfint)*100), 2, '.', ''),
    
    );



mysqli_close($conexion);
 


//output the response
echo json_encode($a);
?>