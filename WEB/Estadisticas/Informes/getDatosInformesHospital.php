<?php
session_start();

require_once ('../../BDD/conexion.php');

$nombre_hospital = $_SESSION["NombreHospital"];
$fecha_inicio = $_GET["fecha_inicio"];
$fecha_fin = $_GET["fecha_fin"];

$sqlHospital = "SELECT Codigo FROM tabla_hospital
                WHERE Nombre = '$nombre_hospital'";
                       
$rsHospital = mysqli_query($conexion,$sqlHospital)
or die('Error: ' . mysqli_error());
    
$exite = mysqli_num_rows($rsHospital);

$hospital = 0;
    
if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
{
    while($rowHospital=mysqli_fetch_array($rsHospital))
    {
        $hospital = $rowHospital["Codigo"];
    }
}


/***************************************
 * Totales
 ***************************************/
 
$sqlHospitalTotal = "SELECT * FROM tabla_estadistica
                     WHERE HOSPITAL = '$hospital'";                   
                       
$rsHospitalTotal = mysqli_query($conexion,$sqlHospitalTotal)
or die('Error: ' . mysqli_error());
    
$pacientesHospitalTotal = mysqli_num_rows($rsHospitalTotal);
 

$pacientesHospitalTotalEstadiaje = 0;

$pacientesHospitalTotalTAC = 0;

$pacientesHospitalTotalIntegEsfint = 0;
 
/***************************************
 * Estadios en totales 
 ***************************************/

/*$sql_H_I_total = "SELECT * FROM tabla_estadistica
                  WHERE HOSPITAL = '$hospital'
                  AND CampoEstadio = 1";
                       
$rs_H_I_total = mysqli_query($conexion,$sql_H_I_total)
or die('Error: ' . mysqli_error());
    
$H_I_total = mysqli_num_rows($rs_H_I_total);




$sql_H_II_total = "SELECT * FROM tabla_estadistica
                   WHERE HOSPITAL = '$hospital'
                   AND CampoEstadio = 2";
                       
$rs_H_II_total = mysqli_query($conexion,$sql_H_II_total)
or die('Error: ' . mysqli_error());
    
$H_II_total = mysqli_num_rows($rs_H_II_total);

$sql_H_III_total = "SELECT * FROM tabla_estadistica
                    WHERE HOSPITAL = '$hospital'
                    AND CampoEstadio = 3";
                       
$rs_H_III_total = mysqli_query($conexion,$sql_H_III_total)
or die('Error: ' . mysqli_error());
    
$H_III_total = mysqli_num_rows($rs_H_III_total);



$sql_H_IV_total = "SELECT * FROM tabla_estadistica
                   WHERE HOSPITAL = '$hospital'
                   AND CampoEstadio = 4";
                       
$rs_H_IV_total = mysqli_query($conexion,$sql_H_IV_total)
or die('Error: ' . mysqli_error());
    
$H_IV_total = mysqli_num_rows($rs_H_IV_total);*/

$H_neo_total = 0;
$H_ady_total = 0;


$H_I_total = 0;
$H_II_total = 0;
$H_III_total = 0;
$H_IV_total = 0;
/***************************************
 * Operados
 ***************************************/

$H_operados_total_tecnica = 0;
$H_operados_total_mesorre = 0;

//ETM en tumores de tercio medio/inferior
$C_H_tumor_inf_total_pacientes = 0;

$H_via_abierta_total = 0;

$H_perf_tumor_total = 0;

$H_int_total = 0;

$H_estoma_deriva_total = 0;

$H_mortalidad_total = 0;

$H_comp_reint_total = 0;
$H_comp_herida_total = 0;
$H_comp_perine_total = 0;
$H_comp_abd_total = 0;
$H_comp_anast_total = 0;

/***************************************
 * Anatomía patológica
 ***************************************/

$H_estadio_Total = 0;

$H_circun_Total = 0;

$H_distal_Total = 0;

$H_resec_Total = 0;

$H_regre_Total = 0;

$H_cal_mesorre_Total = 0;




/***************************************
 * Seguimiento
 ***************************************/
 
$H_rec_Total = 0;


$H_estado_Total = 0;



/****************************************************
 * 
 * ** Radiología **
 * 
 ***************************************************/
$R_H_rm_eco = 0;
$R_H_rm = 0;
$R_H_eco = 0;
$R_H_no = 0;
$R_H_tac = 0;
$R_H_dist_integ_libre = 0;
$R_H_dist_integ_afecto = 0;
$R_H_dist_integ_nodatos = 0;

 
 /****************************************************
 * 
 * ** Oncología **
 * 
 ***************************************************/

$O_H_neo = 0;
$O_H_neo_III = 0;
$O_H_neo_T4 = 0; 
$O_H_ady = 0;
$O_H_ady_I = 0;
$O_H_ady_II = 0;
$O_H_ady_III = 0;
$O_H_ady_IV = 0; 

 /****************************************************
 * 
 * ** Cirugía **
 * 
 ***************************************************/

$C_H_tec_1 = 0;
$C_H_tec_2 = 0;
$C_H_tec_3 = 0;
$C_H_tec_4 = 0;
$C_H_tec_10 = 0;
$C_H_tec_5 = 0;
$C_H_tec_6 = 0;
$C_H_tec_7 = 0;
$C_H_tec_9 = 0;
$C_H_tec_8 = 0;


$C_H_meso_parcial = 0;                    
$C_H_meso_total = 0;
$C_H_meso_no = 0;


$C_H_tumor_inf_parcial = 0;
$C_H_tumor_inf_total = 0;
$C_H_tumor_inf_no = 0;


$C_H_via_lapar = 0;
$C_H_via_lapar_conv = 0;
$C_H_via_abierta = 0;

$C_H_perf_tumor_alta = 0;
$C_H_perf_tumor_baja = 0;
$C_H_perf_tumor_amp_abd = 0;
$C_H_perf_tumor_proc = 0;
$C_H_perf_tumor_hart = 0;
$C_H_perf_tumor_total = 0; 


$C_H_int_curativa = 0;
$C_H_int_paliativa = 0;
$C_H_int_no = 0;

$C_H_estoma_deriva = 0;

$C_H_mortalidad = 0;



$C_H_comp_herida = 0;
$C_H_comp_perine = 0;
$C_H_comp_anast = 0;
$C_H_comp_abd = 0;
$C_H_comp_reint = 0;

$H_comp_total = 0;

 /****************************************************
 * 
 * ** Anatomía patológica **
 * 
 ***************************************************/

$AP_H_estadio_0 = 0;
$AP_H_estadio_I = 0;
$AP_H_estadio_II = 0;
$AP_H_estadio_III = 0;
$AP_H_estadio_IV = 0;

$AP_H_gang_aisl_min = 10000;
$AP_H_gang_aisl_med = 0;
$AP_H_gang_aisl_max = 0;

$AP_H_gang_afec_min = 10000;
$AP_H_gang_afec_med = 0;
$AP_H_gang_afec_max = 0;


$AP_H_circun_afecto = 0;
$AP_H_circun_libre = 0;

$AP_H_distal_afecto = 0;
$AP_H_distal_libre = 0;


$AP_H_resec_R0 = 0;
$AP_H_resec_R1 = 0;
$AP_H_resec_R2 = 0;


    
$AP_H_regre_GR0 = 0;
$AP_H_regre_GR1 = 0;
$AP_H_regre_GR2 = 0;
$AP_H_regre_GR3 = 0;
$AP_H_regre_GR4 = 0;


$AP_H_cal_mesorre_satisf = 0;
$AP_H_cal_mesorre_parc_satisf = 0;
$AP_H_cal_mesorre_insatisf = 0;


 /****************************************************
 * 
 * ** Seguimiento **
 * 
 ***************************************************/
 
$S_H_rec_local = 0;
$S_H_rec_sistematica = 0;
$S_H_rec_local_sistematica = 0;

$S_H_estado_vivo = 0;
$S_H_estado_muerto = 0;





$sqlHospitalRadiologia = "SELECT ID FROM tabla_estadistica
                          WHERE HOSPITAL = '$hospital'
                          AND FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$rsHospitalRadiologia = mysqli_query($conexion,$sqlHospitalRadiologia)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalRadiologia=mysqli_fetch_array($rsHospitalRadiologia))
{
    $Id_Paciente=$rowHospitalRadiologia['ID'];
    
    $sqlHospitalInicial = "SELECT * FROM inicial
                           WHERE Id_Paciente = '$Id_Paciente'";
                       
    $rsHospitalInicial = mysqli_query($conexion,$sqlHospitalInicial)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalInicial);
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalInicial=mysqli_fetch_array($rsHospitalInicial))
        {
            /*** Estadiaje preoperatorio **/
            if ($rowHospitalInicial["B_Tec_RMN"] == 1 && $rowHospitalInicial["B_Tec_ECO"] == 1)
            {
                $R_H_rm_eco++;
                $pacientesHospitalTotalEstadiaje++;
            }
            elseif($rowHospitalInicial["B_Tec_RMN"] == 1 && $rowHospitalInicial["B_Tec_ECO"] == 0)
            {
                $R_H_rm++;
                $pacientesHospitalTotalEstadiaje++;
            }
            elseif($rowHospitalInicial["B_Tec_RMN"] == 0 && $rowHospitalInicial["B_Tec_ECO"] == 1)
            {
                $R_H_eco++;
                $pacientesHospitalTotalEstadiaje++;
            }
            else
            {
                $R_H_no++;
                $pacientesHospitalTotalEstadiaje++;
            }
            
            /*** Estudio de extensión ***/
            if($rowHospitalInicial["Tec_TAC"] == 1)
            {
                $R_H_tac++;
                $pacientesHospitalTotalTAC++;
            }
            else 
            {
                $pacientesHospitalTotalTAC++;   
            }
            
            /*** Medición de distancia margen radial (RMN) ****/
            
            if ($rowHospitalInicial["Id_Integ_Esfint"] == 1)
            {
                $R_H_dist_integ_libre++;
                $pacientesHospitalTotalIntegEsfint++;
            }
            elseif ($rowHospitalInicial["Id_Integ_Esfint"] == 2) 
            {
                $R_H_dist_integ_afecto++;
                $pacientesHospitalTotalIntegEsfint++;
            }
            else 
            {
                $R_H_dist_integ_nodatos++;
                $pacientesHospitalTotalIntegEsfint++;
            }
            
            $sqlHospitalOncologia = "SELECT * FROM tratamiento
                             WHERE Id_Paciente = '$Id_Paciente'";
                       
            $rsHospitalOncologia = mysqli_query($conexion,$sqlHospitalOncologia)
            or die('Error: ' . mysqli_error());
    
            $exite = mysqli_num_rows($rsHospitalOncologia);
            
            if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
            {
                while($rowHospitalOncologia=mysqli_fetch_array($rsHospitalOncologia))
                {
                    
                    switch ($rowHospitalInicial["Id_Estadio_Radio"]) {
                            
                        case 1:
                            $H_I_total++;
                            
                            if($rowHospitalOncologia["B_Tto_Ady"] == 1)
                            {
                                $O_H_ady_I++;
                            }
                            
                            break;
                        case 2:
                            $H_II_total++;
                            
                            if($rowHospitalOncologia["B_Tto_Ady"] == 1)
                            {
                                $O_H_ady_II++;
                            }
                            
                            break;
                        case 3:
                            $H_III_total++;
                            
                            if($rowHospitalOncologia["B_Tto_Neo"] == 1)
                            {
                                $O_H_neo_III++;
                            }
                            
                            if($rowHospitalOncologia["B_Tto_Ady"] == 1)
                            {
                                $O_H_ady_III++;
                            }
                            
                            break;
                            
                        case 4:
                            $H_IV_total++;
                            
                            if($rowHospitalOncologia["B_Tto_Neo"] == 1)
                            {
                                $O_H_neo_T4++;
                            }
                            
                            if($rowHospitalOncologia["B_Tto_Ady"] == 1)
                            {
                                $O_H_ady_IV++;
                            }
                            
                            break;
                        
                        default:
                            
                            break;
                    }

                    
                    
                    /*** Neoadyuvancia **/
                    if ($rowHospitalOncologia["B_Tto_Neo"] == 1)
                    {
                        $O_H_neo++;
                        $H_neo_total++;
                    }
                    else 
                    {
                        $H_neo_total++;
                    }
                    
                    
                    /*if($rowHospitalOncologia["B_Tto_Neo"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 3)
                    {
                        $O_H_neo_III++;
                    }
                    elseif($rowHospitalOncologia["B_Tto_Neo"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 4)
                    {
                        $O_H_neo_T4++;
                    }*/
                    
                    /*** Adyuvancia ***/
                    if($rowHospitalOncologia["B_Tto_Ady"] == 1)
                    {
                        $O_H_ady++;
                        $H_ady_total++;
                    }
                    else
                    {
                        $H_ady_total++;    
                    }
                    
                    
                    /*if($rowHospitalOncologia["B_Tto_Ady"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 1)
                    {
                        $O_H_ady_I++;
                    }
                    elseif($rowHospitalOncologia["B_Tto_Ady"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 2)
                    {
                        $O_H_ady_II++;
                    }
                    elseif($rowHospitalOncologia["B_Tto_Ady"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 3)
                    {
                        $O_H_ady_III++;
                    }
                    elseif($rowHospitalOncologia["B_Tto_Ady"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 4)
                    {
                        $O_H_ady_IV++;
                    }*/
                } //Fin while oncología

            }//Fin oncología
            
            $sqlHospitalCirugia = "SELECT * FROM cirugia
                           WHERE Id_Paciente = '$Id_Paciente'
                           AND B_Cirugia = 1";
                       
            $rsHospitalCirugia = mysqli_query($conexion,$sqlHospitalCirugia)
            or die('Error: ' . mysqli_error());
            
            $exite = mysqli_num_rows($rsHospitalCirugia);
            
            if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
            {
                while($rowHospitalCirugia=mysqli_fetch_array($rsHospitalCirugia))
                {
                    $Id_Cirugia=$rowHospitalCirugia['ID'];
                    
                    
                    $sqlHospitalTablaCirugia = "SELECT * FROM tabla_cirugia
                                                WHERE Id_Cirugia = '$Id_Cirugia'";
                               
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
                                    $C_H_tec_1++;
                                    $H_operados_total_tecnica++;
                                    break;
                                case 2:
                                    $C_H_tec_2++;
                                    $H_operados_total_tecnica++;
                                    break;
                                case 3:
                                    $C_H_tec_3++;
                                    $H_operados_total_tecnica++;
                                    break;
                                case 4:
                                    $C_H_tec_4++;
                                    $H_operados_total_tecnica++;
                                    break;
                                case 5:
                                    $C_H_tec_5++;
                                    $H_operados_total_tecnica++;
                                    break;
                                case 6:
                                    $C_H_tec_6++;
                                    $H_operados_total_tecnica++;
                                    break;
                                case 7:
                                    $C_H_tec_7++;
                                    $H_operados_total_tecnica++;
                                    break;
                                case 8:
                                    $C_H_tec_8++;
                                    $H_operados_total_tecnica++;
                                    break;
                                case 9:
                                    $C_H_tec_9++;
                                    $H_operados_total_tecnica++;
                                    break; 
                                case 10:
                                    $C_H_tec_10++;
                                    $H_operados_total_tecnica++;
                                    break;  
                                default:
                                    
                                    break;
                            }
        
        
                            switch (intval($rowHospitalTablaCirugia["Id_Exeresis_Meso"])) 
                            {
                                case 1:
                                    $C_H_meso_parcial++;
                                    $H_operados_total_mesorre++;
                                    break;
                                case 2:
                                    $C_H_meso_total++;
                                    $H_operados_total_mesorre++;
                                    break;
                                case 3:
                                    $C_H_meso_no++;
                                    $H_operados_total_mesorre++;
                                    break;
                                
                                default:
                                    
                                    break;
                            }
                            
                            if ($rowHospitalInicial['Localizacion'] < 10)
                            {
                                switch (intval($rowHospitalTablaCirugia["Id_Exeresis_Meso"]))
                                 {
                                    case 1:
                                        $C_H_tumor_inf_parcial++;
                                        $C_H_tumor_inf_total_pacientes++; 
                                        break;
                                    case 2:
                                        $C_H_tumor_inf_total++;
                                        $C_H_tumor_inf_total_pacientes++; 
                                        break;
                                    case 3:
                                        $C_H_tumor_inf_no++;
                                        $C_H_tumor_inf_total_pacientes++; 
                                        break;
                                    
                                    default:
                                        
                                        break;
                                }                        
                            }
                            
                            $sqlHospitalTablaCirugiaCarac = "SELECT * FROM tabla_caracteristicas_cirugia
                                                     WHERE Id_Cirugia = '$Id_Cirugia'";
                               
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
                                            $C_H_via_lapar++;
                                            $H_via_abierta_total++;
                                            break;
                                        case 2:
                                            $C_H_via_lapar_conv++;
                                            $H_via_abierta_total++;
                                            break;
                                        case 3:
                                            $C_H_via_abierta++;
                                            $H_via_abierta_total++;
                                            break;
                                        
                                        default:
                                            
                                            break;
                                    }
                                    
                                    switch (intval($rowHospitalTablaCirugiaCarac["Id_Intencion"])) 
                                    {
                                        case 1:
                                            $C_H_int_curativa++;
                                            $H_int_total++;
                                            break;
                                        case 2:
                                            $C_H_int_paliativa++;
                                            $H_int_total++;
                                            break;
                                        case 3:
                                            $C_H_int_no++;
                                            $H_int_total++;
                                            break;
                                        
                                        default:
                                            
                                            break;
                                    }
                                    
                                    switch (intval($rowHospitalTablaCirugia["Id_Tecnica"])) 
                                        {
                                            case 2:
                                                $H_estoma_deriva_total++;
                                                
                                                if ($rowHospitalTablaCirugiaCarac["B_Estoma_Derivacion"] == 1)
                                                {
                                                    $C_H_estoma_deriva++;
                                                }
                                                
                                                break;
                                            case 3:
                                                $H_estoma_deriva_total++;
                                                
                                                if ($rowHospitalTablaCirugiaCarac["B_Estoma_Derivacion"] == 1)
                                                {
                                                    $C_H_estoma_deriva++;
                                                }
                                                break;
                                            
                                            default:
                                                
                                                break;
                                        }
                                        
                                    if ($rowHospitalTablaCirugiaCarac["B_Estoma_Derivacion"] == 1)
                                    {
                                        $H_estoma_deriva_total++;
                                        
                                        
                                    }
                                    else 
                                    {
                                        $H_estoma_deriva_total++;   
                                    }
                                    
              
                                    
                                    if ($rowHospitalTablaCirugiaCarac["Perforacion_Tumoral"] == 1)
                                    {
                                        $C_H_perf_tumor_total++;
                                        $H_perf_tumor_total++;
                                        
                                        switch (intval($rowHospitalTablaCirugia["Id_Tecnica"])) 
                                        {
                                            case 2:
                                                $C_H_perf_tumor_alta++;
                                                break;
                                            case 3:
                                                $C_H_perf_tumor_baja++;
                                                break;
                                            case 4:
                                                $C_H_perf_tumor_amp_abd++;
                                                break;
                                            case 5:
                                                $C_H_perf_tumor_proc++;
                                                break;
                                            case 6:
                                                $C_H_perf_tumor_hart++;
                                                break;
                                            default:
                                                
                                                break;
                                        }
                                    }
                                    else
                                    {
                                       $H_perf_tumor_total++; 
                                    }
        
                                }
                            }//Fin tabla_caracteristicas_cirugia 
                                        
                        }//Fin while tabla_cirugia
                    }//Fin tabla_cirugia 
                
                    
        
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
                                $C_H_mortalidad++;
                                $H_mortalidad_total++;
                            }
                            else 
                            {
                                $H_mortalidad_total++;
                            }
                            
                            
                            
                            if($rowHospitalTablaCirugiaCompl['B_Reintervencion'] == 1)
                            {
                                $C_H_comp_reint++;
                                $H_comp_reint_total++;
                            }
                            else
                            {
                                $H_comp_reint_total++;
                            }
                            
                        }
                    }//Fin tabla_complicaciones 
					
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
								$C_H_comp_herida++;
                                $H_comp_herida_total++;
							}
							else
							{
								$H_comp_herida_total++;
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
								$C_H_comp_perine++;
                                $H_comp_perine_total++;
							}
							else
							{
								$H_comp_perine_total++;
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
								$C_H_comp_abd++;
								$H_comp_abd_total++;
							}
							else
							{
								$H_comp_abd_total++;
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
								$C_H_comp_anast++;
								$H_comp_anast_total++;
							}
							else
							{
								$H_comp_anast_total++;
							}
						
						}
					
						mysqli_free_result($rsHospitalTablaCirugiaComplAnast);
					
					}
                    
        
                }//Fin while cirugia
            }//Fin cirugia  
   
        }//Fin while  inicial
    }//Fin inicial
    
    
    
    
    $sqlHospitalAnatPatol = "SELECT * FROM anatomia_patologica
                           WHERE Id_Paciente = '$Id_Paciente'";
                       
    $rsHospitalAnatPatol = mysqli_query($conexion,$sqlHospitalAnatPatol)
    or die('Error: ' . mysqli_error());
    
    $exite = mysqli_num_rows($rsHospitalAnatPatol);
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalAnatPatol=mysqli_fetch_array($rsHospitalAnatPatol))
        {
            $H_estadio_Total++;
            
            if($rowHospitalAnatPatol['Id_Estadio_Patologico'] == 1)
            {
                $AP_H_estadio_I++;
            }
            elseif ($rowHospitalAnatPatol['Id_Estadio_Patologico'] == 2) 
            {
                $AP_H_estadio_II++;
            }
            elseif ($rowHospitalAnatPatol['Id_Estadio_Patologico'] == 3) 
            {
                $AP_H_estadio_III++;
            }
            elseif ($rowHospitalAnatPatol['Id_Estadio_Patologico'] == 4) 
            {
                $AP_H_estadio_IV++;
            }
            else
            {
                $AP_H_estadio_0++;
            }
            
            if($rowHospitalAnatPatol['Glangios_Ais'] < $AP_H_gang_aisl_min)
            {
                $AP_H_gang_aisl_min = intval($rowHospitalAnatPatol['Glangios_Ais']);
            }
              
            
            if($rowHospitalAnatPatol['Glangios_Ais'] > $AP_H_gang_aisl_max)
            {
                $AP_H_gang_aisl_max = $rowHospitalAnatPatol['Glangios_Ais'];
            }

            $AP_H_gang_aisl_med = $AP_H_gang_aisl_med + $rowHospitalAnatPatol['Glangios_Ais'];





            if($rowHospitalAnatPatol['Glangios_Afec'] < $AP_H_gang_afec_min)
            {
                $AP_H_gang_afec_min = intval($rowHospitalAnatPatol['Glangios_Afec']);
            }
              
            
            if($rowHospitalAnatPatol['Glangios_Afec'] > $AP_H_gang_afec_max)
            {
                $AP_H_gang_afec_max = $rowHospitalAnatPatol['Glangios_Afec'];
            }

            $AP_H_gang_afec_med = $AP_H_gang_afec_med + $rowHospitalAnatPatol['Glangios_Afec'];

            
            
            if($rowHospitalAnatPatol['Id_Margen_Circunferencial'] == 1)
            {
                $AP_H_circun_libre++;
                $H_circun_Total++;
            }
            else
            {
                $AP_H_circun_afecto++;
                $H_circun_Total++;
            }
            
            if($rowHospitalAnatPatol['Id_Margen_Distal'] == 1)
            {
                $AP_H_distal_libre++;
                $H_distal_Total++;
            }
            else
            {
                $AP_H_distal_afecto++;
                $H_distal_Total++;
            }
            
            if($rowHospitalAnatPatol['Id_Tipo_Res'] == 1)
            {
                $AP_H_resec_R0++;
                $H_resec_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Tipo_Res'] == 2) 
            {
                $AP_H_resec_R1++;
                $H_resec_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Tipo_Res'] == 3)
            {
                $AP_H_resec_R2++;
                $H_resec_Total++;
            }
            
            
            
            
            if($rowHospitalAnatPatol['Id_Regresion'] == 1)
            {
                $AP_H_regre_GR0++;
                $H_regre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Regresion'] == 2) 
            {
                $AP_H_regre_GR1++;
                $H_regre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Regresion'] == 3)
            {
                $AP_H_regre_GR2++;
                $H_regre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Regresion'] == 4)
            {
                $AP_H_regre_GR3++;
                $H_regre_Total++;
            }
            else
            {
                $AP_H_regre_GR4++;
                $H_regre_Total++;
            }
            
            
            if($rowHospitalAnatPatol['Id_Meso_Cal'] == 1)
            {
                $AP_H_cal_mesorre_satisf++;
                $H_cal_mesorre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Meso_Cal'] == 2) 
            {
                $AP_H_cal_mesorre_parc_satisf++;
                $H_cal_mesorre_Total++;
            }
            elseif ($rowHospitalAnatPatol['Id_Meso_Cal'] == 3)
            {
                $AP_H_cal_mesorre_insatisf++;
                $H_cal_mesorre_Total++;
            }
            


            
        }//Fin while anatomía patológica
    }//Fin anatomía patológica



    $sqlHospitalSeguimiento = "SELECT * FROM seguimiento
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
                $S_H_rec_local_sistematica++;
            }
            if($rowHospitalSeguimiento['B_Recidiva'] == 1) 
            {
                $S_H_rec_local++;
            }
            if($rowHospitalSeguimiento['B_Metastasis'] == 1) 
            {
                $S_H_rec_sistematica++;
                
            }

            
            $H_rec_Total++;
            
            
            if($rowHospitalSeguimiento['B_Estado'] == 1)
            {
                $S_H_estado_vivo++;
            }
            elseif($rowHospitalSeguimiento['B_Estado'] == 2) 
            {
                $S_H_estado_muerto++;
                
            }
            $H_estado_Total++;
            

            
        }// Fin while Seguimiento
        
    }// Fin Seguimiento



} //Fin HospitalRadiologia
  




/*
 * "R_H_rm_eco"=>intval(($R_H_rm_eco/$pacientesHospitalTotal)*100),
    "R_T_rm_eco"=>intval(($R_T_rm_eco/$pacientesTotal)*100),*/

    //Quitarnos los errores de de división por 0
    if ($pacientesHospitalTotalEstadiaje == 0)
    {
        $pacientesHospitalTotalEstadiaje = 1;
    }
    if ($pacientesHospitalTotalTAC == 0)
    {
        $pacientesHospitalTotalTAC = 1;
    }
    if ($pacientesHospitalTotalIntegEsfint == 0)
    {
        $pacientesHospitalTotalIntegEsfint = 1;
    }
    if ($H_neo_total == 0)
    {
        $H_neo_total = 1;
    }
    if ($H_III_total == 0)
    {
        $H_III_total = 1;
    }
    if ($H_IV_total == 0)
    {
        $H_IV_total = 1;
    }
    if ($H_ady_total == 0)
    {
        $H_ady_total = 1;
    }
    if ($H_I_total == 0)
    {
        $H_I_total = 1;
    }
    if ($H_II_total == 0)
    {
        $H_II_total = 1;
    }
    if ($H_III_total == 0)
    {
        $H_III_total = 1;
    }
    if ($H_IV_total == 0)
    {
        $H_IV_total = 1;
    }
    if ($H_operados_total_tecnica == 0)
    {
        $H_operados_total_tecnica = 1;
    }
    if ($H_operados_total_mesorre == 0)
    {
        $H_operados_total_mesorre = 1;
    }
    if ($C_H_tumor_inf_total_pacientes == 0)
    {
        $C_H_tumor_inf_total_pacientes = 1;
    }
    if ($H_via_abierta_total == 0)
    {
        $H_via_abierta_total = 1;
    }
    if ($H_perf_tumor_total == 0)
    {
        $H_perf_tumor_total = 1;
    }
    if ($H_int_total == 0)
    {
        $H_int_total = 1;
    }
    if ($H_estoma_deriva_total == 0)
    {
        $H_estoma_deriva_total = 1;
    }
    if ($H_operados_total_tecnica == 0)
    {
        $H_operados_total_tecnica = 1;
    }
    if ($H_estadio_Total == 0)
    {
        $H_estadio_Total = 1;
    }
    if ($H_circun_Total == 0)
    {
        $H_circun_Total = 1;
    }
    if ($H_resec_Total == 0)
    {
        $H_resec_Total = 1;
    }
    if ($H_regre_Total == 0)
    {
        $H_regre_Total = 1;
    }
    if ($H_cal_mesorre_Total == 0)
    {
        $H_cal_mesorre_Total = 1;
    }
    if ($H_rec_Total == 0)
    {
        $H_rec_Total = 1;
    }
    if ($H_estado_Total == 0)
    {
        $H_estado_Total = 1;
    }

    $alta = (number_format((($C_H_perf_tumor_alta/$H_perf_tumor_total)*100), 2, '.', '') + number_format((($C_H_perf_tumor_baja/$H_perf_tumor_total)*100), 2, '.', '')) / 2;
    
//Fill de array
$a=array(
   
    
    "R_H_rm_eco"=>number_format((($R_H_rm_eco/$pacientesHospitalTotalEstadiaje)*100), 2, '.', ''),
    "R_H_rm"=>number_format((($R_H_rm/$pacientesHospitalTotalEstadiaje)*100), 2, '.', ''),
    "R_H_eco"=>number_format((($R_H_eco/$pacientesHospitalTotalEstadiaje)*100), 2, '.', ''),
    "R_H_no"=>number_format((($R_H_no/$pacientesHospitalTotalEstadiaje)*100), 2, '.', ''),
    "R_H_tac"=>number_format((($R_H_tac/$pacientesHospitalTotalTAC)*100), 2, '.', ''),
    "R_H_dist_integ_libre"=>number_format((($R_H_dist_integ_libre/$pacientesHospitalTotalIntegEsfint)*100), 2, '.', ''),
    "R_H_dist_integ_afecto"=>number_format((($R_H_dist_integ_afecto/$pacientesHospitalTotalIntegEsfint)*100), 2, '.', ''),
    "R_H_dist_integ_nodatos"=>number_format((($R_H_dist_integ_nodatos/$pacientesHospitalTotalIntegEsfint)*100), 2, '.', ''),
    

    "O_H_neo"=>number_format((($O_H_neo/$H_neo_total)*100), 2, '.', ''),
    "O_H_neo_III"=>number_format((($O_H_neo_III/$O_H_neo)*100), 2, '.', ''),
    "O_H_neo_T4"=>number_format((($O_H_neo_T4/$O_H_neo)*100), 2, '.', ''),       
    "O_H_ady"=>number_format((($O_H_ady/$H_ady_total)*100), 2, '.', ''),
    "O_H_ady_I"=>number_format((($O_H_ady_I/$O_H_ady)*100), 2, '.', ''),       
    "O_H_ady_II"=>number_format((($O_H_ady_II/$O_H_ady)*100), 2, '.', ''),         
    "O_H_ady_III"=>number_format((($O_H_ady_III/$O_H_ady)*100), 2, '.', ''),        
    "O_H_ady_IV"=>number_format((($O_H_ady_IV/$O_H_ady)*100), 2, '.', ''),       
    
    
    "C_H_tec_1"=>number_format((($C_H_tec_1/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_tec_23"=>number_format(((($C_H_tec_2 + $C_H_tec_3)/$H_operados_total_tecnica)*100), 2, '.', ''),
    //"C_H_tec_2"=>number_format((($C_H_tec_2/$H_operados_total_tecnica)*100), 2, '.', ''),
    //"C_H_tec_3"=>number_format((($C_H_tec_3/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_tec_410"=>number_format(((($C_H_tec_4 + $C_H_tec_10)/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_tec_4"=>number_format((($C_H_tec_4/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_tec_10"=>number_format((($C_H_tec_10/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_tec_5"=>number_format((($C_H_tec_5/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_tec_6"=>number_format((($C_H_tec_6/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_tec_7"=>number_format((($C_H_tec_7/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_tec_9"=>number_format((($C_H_tec_9/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_tec_8"=>number_format((($C_H_tec_8/$H_operados_total_tecnica)*100), 2, '.', ''),
    
    "C_H_meso_parcial"=>number_format((($C_H_meso_parcial/$H_operados_total_mesorre)*100), 2, '.', ''),
    "C_H_meso_total"=>number_format((($C_H_meso_total/$H_operados_total_mesorre)*100), 2, '.', ''),
    //"C_H_meso_no"=>number_format((($C_H_meso_no/$H_operados_total_mesorre)*100), 2, '.', ''),
    
    
    //"C_H_tumor_inf_parcial"=>number_format((($C_H_tumor_inf_parcial/$C_H_tumor_inf_total_pacientes)*100), 2, '.', ''),
    //"C_H_tumor_inf_total"=>number_format((($C_H_tumor_inf_total/$C_H_tumor_inf_total_pacientes)*100), 2, '.', ''),
    //"C_H_tumor_inf_no"=>number_format((($C_H_tumor_inf_no/$C_H_tumor_inf_total_pacientes)*100), 2, '.', ''),
    
    
    "C_H_via_lapar"=>number_format((($C_H_via_lapar/$H_via_abierta_total)*100), 2, '.', ''),
    "C_H_via_lapar_conv"=>number_format((($C_H_via_lapar_conv/$H_via_abierta_total)*100), 2, '.', ''),
    "C_H_via_abierta"=>number_format((($C_H_via_abierta/$H_via_abierta_total)*100), 2, '.', ''),
    "C_H_perf_tumor_alta"=>$alta,
    //"C_H_perf_tumor_alta"=>number_format((($C_H_perf_tumor_alta/$H_perf_tumor_total)*100), 2, '.', ''),
    //"C_H_perf_tumor_baja"=>number_format((($C_H_perf_tumor_baja/$H_perf_tumor_total)*100), 2, '.', ''),
    "C_H_perf_tumor_amp_abd"=>number_format((($C_H_perf_tumor_amp_abd/$H_perf_tumor_total)*100), 2, '.', ''),
    "C_H_perf_tumor_proc"=>number_format((($C_H_perf_tumor_proc/$H_perf_tumor_total)*100), 2, '.', ''),
    "C_H_perf_tumor_hart"=>number_format((($C_H_perf_tumor_hart/$H_perf_tumor_total)*100), 2, '.', ''),
    "C_H_perf_tumor_total"=>number_format((($C_H_perf_tumor_total/$H_perf_tumor_total)*100), 2, '.', ''),
    
    "C_H_int_curativa"=>number_format((($C_H_int_curativa/$H_int_total)*100), 2, '.', ''),
    "C_H_int_paliativa"=>number_format((($C_H_int_paliativa/$H_int_total)*100), 2, '.', ''),
    "C_H_int_no"=>number_format((($C_H_int_no/$H_int_total)*100), 2, '.', ''),
    
    "C_H_estoma_deriva"=>number_format((($C_H_estoma_deriva/$H_estoma_deriva_total)*100), 2, '.', ''),
    
    "C_H_mortalidad"=>number_format((($C_H_mortalidad/$H_operados_total_tecnica)*100), 2, '.', ''),
    
    "C_H_comp_herida"=>number_format((($C_H_comp_herida/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_comp_perine"=>number_format((($C_H_comp_perine/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_comp_anast"=>number_format((($C_H_comp_anast/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_comp_abd"=>number_format((($C_H_comp_abd/$H_operados_total_tecnica)*100), 2, '.', ''),
    "C_H_comp_reint"=>number_format((($C_H_comp_reint/$H_operados_total_tecnica)*100), 2, '.', ''),
    
    
    
    "AP_H_estadio_0"=>number_format((($AP_H_estadio_0/$H_estadio_Total)*100), 2, '.', ''),
    "AP_H_estadio_I"=>number_format((($AP_H_estadio_I/$H_estadio_Total)*100), 2, '.', ''),
    "AP_H_estadio_II"=>number_format((($AP_H_estadio_II/$H_estadio_Total)*100), 2, '.', ''),
    "AP_H_estadio_III"=>number_format((($AP_H_estadio_III/$H_estadio_Total)*100), 2, '.', ''),
    "AP_H_estadio_IV"=>number_format((($AP_H_estadio_IV/$H_estadio_Total)*100), 2, '.', ''),
    
    "AP_H_gang_aisl_min"=>$AP_H_gang_aisl_min,
    "AP_H_gang_aisl_med"=>number_format(($AP_H_gang_aisl_med/$H_estadio_Total), 2, '.', ''),
    "AP_H_gang_aisl_max"=>$AP_H_gang_aisl_max,
    
    "AP_H_gang_afec_min"=>$AP_H_gang_afec_min,
    "AP_H_gang_afec_med"=>number_format(($AP_H_gang_afec_med/$H_estadio_Total), 2, '.', ''),
    "AP_H_gang_afec_max"=>$AP_H_gang_afec_max,
    
    "AP_H_circun_afecto"=>number_format((($AP_H_circun_afecto/$H_circun_Total)*100), 2, '.', ''),
    "AP_H_circun_libre"=>number_format((($AP_H_circun_libre/$H_circun_Total)*100), 2, '.', ''),
    
    
    "AP_H_distal_afecto"=>number_format((($AP_H_distal_afecto/$H_circun_Total)*100), 2, '.', ''),
    "AP_H_distal_libre"=>number_format((($AP_H_distal_libre/$H_circun_Total)*100), 2, '.', ''),
    
    
    "AP_H_resec_R0"=>number_format((($AP_H_resec_R0/$H_resec_Total)*100), 2, '.', ''),
    "AP_H_resec_R1"=>number_format((($AP_H_resec_R1/$H_resec_Total)*100), 2, '.', ''),
    "AP_H_resec_R2"=>number_format((($AP_H_resec_R2/$H_resec_Total)*100), 2, '.', ''),
    
  
    "AP_H_regre_GR0"=>number_format((($AP_H_regre_GR0/$H_regre_Total)*100), 2, '.', ''),
    "AP_H_regre_GR1"=>number_format((($AP_H_regre_GR1/$H_regre_Total)*100), 2, '.', ''),
    "AP_H_regre_GR2"=>number_format((($AP_H_regre_GR2/$H_regre_Total)*100), 2, '.', ''),
    "AP_H_regre_GR3"=>number_format((($AP_H_regre_GR3/$H_regre_Total)*100), 2, '.', ''),
    "AP_H_regre_GR4"=>number_format((($AP_H_regre_GR4/$H_regre_Total)*100), 2, '.', ''),
    
    
    "AP_H_cal_mesorre_satisf"=>number_format((($AP_H_cal_mesorre_satisf/$H_cal_mesorre_Total)*100), 2, '.', ''),
    "AP_H_cal_mesorre_parc_satisf"=>number_format((($AP_H_cal_mesorre_parc_satisf/$H_cal_mesorre_Total)*100), 2, '.', ''),
    "AP_H_cal_mesorre_insatisf"=>number_format((($AP_H_cal_mesorre_insatisf/$H_cal_mesorre_Total)*100), 2, '.', ''),
   
   
    "S_H_rec_local"=>number_format((($S_H_rec_local/$H_rec_Total)*100), 2, '.', ''),
    "S_H_rec_sistematica"=>number_format((($S_H_rec_sistematica/$H_rec_Total)*100), 2, '.', ''),
    "S_H_rec_local_sistematica"=>number_format((($S_H_rec_local_sistematica/$H_rec_Total)*100), 2, '.', ''),
     
     
    "S_H_estado_vivo"=>number_format((($S_H_estado_vivo/$H_estado_Total)*100), 2, '.', ''),
    "S_H_estado_muerto"=>number_format((($S_H_estado_muerto/$H_estado_Total)*100), 2, '.', ''),
    
    );




mysqli_close($conexion);
 

//output the response
echo json_encode($a);
?>