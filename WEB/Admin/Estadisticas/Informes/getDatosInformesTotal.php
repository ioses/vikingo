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
 

$pacientesTotalEstadiaje = 0;

$pacientesTotalTAC = 0;

$pacientesTotalIntegEsfint = 0;
 
/***************************************
 * Estadios en totales 
 ***************************************/

/*$sql_T_I_total = "SELECT * FROM tabla_estadistica
                  WHERE HOSPITAL = '$hospital'
                  AND CampoEstadio = 1";
                       
$rs_T_I_total = mysqli_query($conexion,$sql_T_I_total)
or die('Error: ' . mysqli_error());
    
$T_I_total = mysqli_num_rows($rs_T_I_total);




$sql_T_II_total = "SELECT * FROM tabla_estadistica
                   WHERE HOSPITAL = '$hospital'
                   AND CampoEstadio = 2";
                       
$rs_T_II_total = mysqli_query($conexion,$sql_T_II_total)
or die('Error: ' . mysqli_error());
    
$T_II_total = mysqli_num_rows($rs_T_II_total);

$sql_T_III_total = "SELECT * FROM tabla_estadistica
                    WHERE HOSPITAL = '$hospital'
                    AND CampoEstadio = 3";
                       
$rs_T_III_total = mysqli_query($conexion,$sql_T_III_total)
or die('Error: ' . mysqli_error());
    
$T_III_total = mysqli_num_rows($rs_T_III_total);



$sql_T_IV_total = "SELECT * FROM tabla_estadistica
                   WHERE HOSPITAL = '$hospital'
                   AND CampoEstadio = 4";
                       
$rs_T_IV_total = mysqli_query($conexion,$sql_T_IV_total)
or die('Error: ' . mysqli_error());
    
$T_IV_total = mysqli_num_rows($rs_T_IV_total);*/

$T_neo_total = 0;
$T_ady_total = 0;


$T_I_total = 0;
$T_II_total = 0;
$T_III_total = 0;
$T_IV_total = 0;
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

/***************************************
 * Anatomía patológica
 ***************************************/

$T_estadio_Total = 0;

$T_circun_Total = 0;

$T_distal_Total = 0;

$T_resec_Total = 0;

$T_regre_Total = 0;

$T_cal_mesorre_Total = 0;




/***************************************
 * Seguimiento
 ***************************************/
 
$T_rec_Total = 0;


$T_estado_Total = 0;



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

 
 /****************************************************
 * 
 * ** Oncología **
 * 
 ***************************************************/

$O_T_neo = 0;
$O_T_neo_III = 0;
$O_T_neo_T4 = 0; 
$O_T_ady = 0;
$O_T_ady_I = 0;
$O_T_ady_II = 0;
$O_T_ady_III = 0;
$O_T_ady_IV = 0; 

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
    
    
    
    $sqlHospitalOncologia = "SELECT B_Tto_Neo, B_Tto_Ady FROM tratamiento
                             WHERE Id_Paciente = '$Id_Paciente'";
                       
    $rsHospitalOncologia = mysqli_query($conexion,$sqlHospitalOncologia)
    or die('Error: ' . mysqli_error());

    $exite = mysqli_num_rows($rsHospitalOncologia);
    
    if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
    {
        while($rowHospitalOncologia=mysqli_fetch_array($rsHospitalOncologia))
        {
            
            switch ($Id_Estadio_Radio) {
                    
                case 1:
                    $T_I_total++;
                    
                    if($rowHospitalOncologia["B_Tto_Ady"] == 2)
                    {
                        $O_T_ady_I++;
                    }
                    
                    break;
                case 2:
                    $T_II_total++;
                    
                    if($rowHospitalOncologia["B_Tto_Ady"] == 2)
                    {
                        $O_T_ady_II++;
                    }
                    
                    break;
                case 3:
                    $T_III_total++;
                    
                    if($rowHospitalOncologia["B_Tto_Neo"] == 2)
                    {
                        $O_T_neo_III++;
                    }
                    
                    if($rowHospitalOncologia["B_Tto_Ady"] == 2)
                    {
                        $O_T_ady_III++;
                    }
                    
                    break;
                    
                case 4:
                    $T_IV_total++;
                    
                    if($rowHospitalOncologia["B_Tto_Neo"] == 2)
                    {
                        $O_T_neo_T4++;
                    }
                    
                    if($rowHospitalOncologia["B_Tto_Ady"] == 2)
                    {
                        $O_T_ady_IV++;
                    }
                    
                    break;
                
                default:
                    
                    break;
            }

            
            
            /*** Neoadyuvancia **/
            if ($rowHospitalOncologia["B_Tto_Neo"] == 2)
            {
                $O_T_neo++;
                $T_neo_total++;
            }
            else 
            {
                $T_neo_total++;
            }
            
            
            /*if($rowHospitalOncologia["B_Tto_Neo"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 3)
            {
                $O_T_neo_III++;
            }
            elseif($rowHospitalOncologia["B_Tto_Neo"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 4)
            {
                $O_T_neo_T4++;
            }*/
            
            /*** Adyuvancia ***/
            if($rowHospitalOncologia["B_Tto_Ady"] == 2)
            {
                $O_T_ady++;
                $T_ady_total++;
            }
            else
            {
                $T_ady_total++;    
            }
            
            
            /*if($rowHospitalOncologia["B_Tto_Ady"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 1)
            {
                $O_T_ady_I++;
            }
            elseif($rowHospitalOncologia["B_Tto_Ady"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 2)
            {
                $O_T_ady_II++;
            }
            elseif($rowHospitalOncologia["B_Tto_Ady"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 3)
            {
                $O_T_ady_III++;
            }
            elseif($rowHospitalOncologia["B_Tto_Ady"] == 2 && $rowHospitalInicial["Id_Estadio_Radio"] == 4)
            {
                $O_T_ady_IV++;
            }*/
        } //Fin while oncología
   
    }//Fin oncología
    
    //Liberamos memoria
    mysqli_free_result($rsHospitalOncologia);
    
    
    
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
                $T_rec_Total++;
            }
            elseif($rowHospitalSeguimiento['B_Recidiva'] == 1) 
            {
                $S_T_rec_local++;
            	$T_rec_Total++;
            }
            elseif($rowHospitalSeguimiento['B_Metastasis'] == 1) 
            {
                $S_T_rec_sistematica++;
                $S_T_rec_local++;
                
            }
            else 
            {
                $T_rec_Total++;
            }
            
            
            if($rowHospitalSeguimiento['B_Estado'] == 1)
            {
                $S_T_estado_vivo++;
                $T_estado_Total++;
            }
            elseif($rowHospitalSeguimiento['B_Estado'] == 2) 
            {
                $S_T_estado_muerto++;
                $T_estado_Total++;
            }
            

            
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
   
    
    "R_T_rm_eco"=>number_format((($R_T_rm_eco/$pacientesTotalEstadiaje)*100), 2, '.', ''),
    "R_T_rm"=>number_format((($R_T_rm/$pacientesTotalEstadiaje)*100), 2, '.', ''),
    "R_T_eco"=>number_format((($R_T_eco/$pacientesTotalEstadiaje)*100), 2, '.', ''),
    "R_T_no"=>number_format((($R_T_no/$pacientesTotalEstadiaje)*100), 2, '.', ''),
    "R_T_tac"=>number_format((($R_T_tac/$pacientesTotalTAC)*100), 2, '.', ''),
    "R_T_dist_integ_libre"=>number_format((($R_T_dist_integ_libre/$pacientesTotalIntegEsfint)*100), 2, '.', ''),
    "R_T_dist_integ_afecto"=>number_format((($R_T_dist_integ_afecto/$pacientesTotalIntegEsfint)*100), 2, '.', ''),
    "R_T_dist_integ_nodatos"=>number_format((($R_T_dist_integ_nodatos/$pacientesTotalIntegEsfint)*100), 2, '.', ''),
    

    "O_T_neo"=>number_format((($O_T_neo/$T_neo_total)*100), 2, '.', ''),
    "O_T_neo_III"=>number_format((($O_T_neo_III/$T_III_total)*100), 2, '.', ''),
    "O_T_neo_T4"=>number_format((($O_T_neo_T4/$T_IV_total)*100), 2, '.', ''),       
    "O_T_ady"=>number_format((($O_T_ady/$T_ady_total)*100), 2, '.', ''),
    "O_T_ady_I"=>number_format((($O_T_ady_I/$T_I_total)*100), 2, '.', ''),       
    "O_T_ady_II"=>number_format((($O_T_ady_II/$T_II_total)*100), 2, '.', ''),         
    "O_T_ady_III"=>number_format((($O_T_ady_III/$T_III_total)*100), 2, '.', ''),        
    "O_T_ady_IV"=>number_format((($O_T_ady_IV/$T_IV_total)*100), 2, '.', ''),        
    
    
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