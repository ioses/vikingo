<?php
session_start();

require_once ('../../BDD/conexion.php');





$fecha_inicio = $_GET["fecha_inicio"];
$fecha_fin = $_GET["fecha_fin"];

$nombre_hospital = $_SESSION["NombreHospital"];

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

$entraHospital=0;

$numero_pacientes = 0;
    
$reseccion_local_pos2_n = 0;
    
$reseccion_recto_pos2_n = 0;
    
$no_resectivos_pos2_n = 0;


$proctocolectomia_pos3_n = 0;
$exent_pelvica_pos3_n = 0;

$res_curativa_pos3_n = 0;


$res_paliativa_pos3_M1 = 0;
$res_paliativa_pos3_M0_R2 = 0;
$res_paliativa_pos3_VACIA_h=0;
$adentro=0;

/*
$sqlHospitalInicial = "SELECT t1.ID FROM identificador_paciente t1
						INNER JOIN cirugia t2 ON (t1.ID=t2.Id_Paciente)
						INNER JOIN tabla_cirugia t3 ON (t2.ID=t3.Id_Cirugia)
                       WHERE (t3.Fecha_Intervencion NOT BETWEEN '$fecha_inicio' AND '$fecha_fin')
                       AND t1.Id_Hospital = '$hospital'"; 
*/
$sqlHospitalInicial = "SELECT ID,CIRUGIA, TEC_CIR, CampoEstadio, TIPO_RES FROM tabla_estadistica
                       WHERE HOSPITAL = '$hospital' AND FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'"; 


$rsHospitalInicial = mysqli_query($conexion,$sqlHospitalInicial)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalInicial=mysqli_fetch_array($rsHospitalInicial))
{
	$entraHospital=$entraHospital+1;
	$adentro=1;
	if (intval($rowHospitalInicial["CIRUGIA"])==1){
	switch (intval($rowHospitalInicial["TEC_CIR"])) 
                {
                    case 1:
                        $reseccion_local_pos2_n++;
                        $numero_pacientes++;
                        break;
                    case 5:
                        $reseccion_recto_pos2_n++;
                        $proctocolectomia_pos3_n++;
                        $numero_pacientes++;
                        break;
                    case 7:
                        $no_resectivos_pos2_n++;
                        $numero_pacientes++;
                        break;
                    case 8:
                        $no_resectivos_pos2_n++;
                        $numero_pacientes++;
                        break;
                    case 9:
                        $reseccion_recto_pos2_n++;
                        $exent_pelvica_pos3_n++;
                        $numero_pacientes++;
                        break;
                    case 2 || 3 || 4 || 6 || 10:
                        if ($rowHospitalInicial['CampoEstadio']== 4 || $rowHospitalInicial['CampoEstadio']==5){
                        
                            $reseccion_recto_pos2_n++;
                            $numero_pacientes++;
                            $res_paliativa_pos3_M1++;

                        }elseif($rowHospitalInicial['TIPO_RES']==3){

                            $reseccion_recto_pos2_n++;
                            $numero_pacientes++;
                            $res_paliativa_pos3_M0_R2++;

                        }elseif($rowHospitalInicial['TIPO_RES']==4 || $rowHospitalInicial['TIPO_RES']==0){

                            $reseccion_recto_pos2_n++;
                            $numero_pacientes++;
                            $res_paliativa_pos3_VACIA_h++;

                        }else{
                            $reseccion_recto_pos2_n++;
                            $numero_pacientes++;

                        }
                       
                        break;
                }
	/*

			 switch ($rowHospitalInicial['CampoEstadio']) 
            {
                case 4: //M1
                    $res_paliativa_pos3_M1++;
                    break;
                case 5: //M1
                    $res_paliativa_pos3_M1++;
                    break;    
                default: //M0
                    if($rowHospitalInicial['TIPO_RES'] == 2)
                    {
                        $res_paliativa_pos3_M0_R2++;
                    }
                    break;

            }
	
	*/
	
	}
	
	 
} //Fin Inicial
  
mysqli_free_result($rsHospitalInicial);

$res_paliativa_pos3_n=$res_paliativa_pos3_M1+$res_paliativa_pos3_M0_R2+$res_paliativa_pos3_VACIA_h;

$res_curativa_pos3_n = $reseccion_recto_pos2_n - $res_paliativa_pos3_n - $proctocolectomia_pos3_n - $exent_pelvica_pos3_n;



$numero_pacientes_T = 0;
    
$reseccion_local_pos2_n_T = 0;
    
$reseccion_recto_pos2_n_T = 0;
    
$no_resectivos_pos2_n_T = 0;


$proctocolectomia_pos3_n_T = 0;
$exent_pelvica_pos3_n_T = 0;

$res_curativa_pos3_n_T = 0;


$res_paliativa_pos3_M1_T = 0;
$res_paliativa_pos3_M0_R2_T = 0;
$res_paliativa_pos3_VACIA_T=0;

$entra=0;


/*
$sqlHospitalInicial = "SELECT t1.ID FROM identificador_paciente t1
						INNER JOIN cirugia t2 ON (t1.ID=t2.Id_Paciente)
						INNER JOIN tabla_cirugia t3 ON (t2.ID=t3.Id_Cirugia)
                       WHERE (t3.Fecha_Intervencion NOT BETWEEN '$fecha_inicio' AND '$fecha_fin')
                       AND t1.Id_Hospital = '$hospital'"; 
*/
$sqlHospitalInicial_T = "SELECT ID,CIRUGIA, TEC_CIR, CampoEstadio, TIPO_RES FROM tabla_estadistica
                       WHERE FEC_CIR BETWEEN '$fecha_inicio' AND '$fecha_fin'"; 


$rsHospitalInicial_T = mysqli_query($conexion,$sqlHospitalInicial_T)
  or die('Error: ' . mysqli_error());
  

while($rowHospitalInicial_T=mysqli_fetch_array($rsHospitalInicial_T))
{
	$entraTotal=$entraTotal+1;
	if (intval($rowHospitalInicial_T["CIRUGIA"])==1){
	switch (intval($rowHospitalInicial_T["TEC_CIR"])) 
                {
                    case 1:
                        $reseccion_local_pos2_n_T++;
                        $numero_pacientes_T++;
                        break;
                    case 5:
                        $reseccion_recto_pos2_n_T++;
                        $proctocolectomia_pos3_n_T++;
                        $numero_pacientes_T++;
                        break;
                    case 7:
                        $no_resectivos_pos2_n_T++;
                        $numero_pacientes_T++;
                        break;
                    case 8:
                        $no_resectivos_pos2_n_T++;
                        $numero_pacientes_T++;
                        break;
                    case 9:
                        $reseccion_recto_pos2_n_T++;
                        $exent_pelvica_pos3_n_T++;
                        $numero_pacientes_T++;
                        break;
                    case 2 || 3 || 4 || 6 || 10:
                        if ($rowHospitalInicial_T['CampoEstadio']==4 || $rowHospitalInicial_T['CampoEstadio']==5){
                        $reseccion_recto_pos2_n_T++;
                        $numero_pacientes_T++;
                        $res_paliativa_pos3_M1_T++;
                        
                        }elseif ($rowHospitalInicial_T['TIPO_RES']==4 || $rowHospitalInicial_T['TIPO_RES']==0) {
                            $reseccion_recto_pos2_n_T++;
                            $numero_pacientes_T++;                       
                            $res_paliativa_pos3_VACIA_T++;
                        
                        }elseif($rowHospitalInicial_T['TIPO_RES']==3){
                            $reseccion_recto_pos2_n_T++;
                            $numero_pacientes_T++; 
                            $res_paliativa_pos3_M0_R2_T++;

                        }else{
                            $reseccion_recto_pos2_n_T++;
                            $numero_pacientes_T++;

                        }   
                        break;
                }
	/*
			 switch ($rowHospitalInicial_T['CampoEstadio']) 
            {
                case 4: //Estadio4
                    $res_paliativa_pos3_M1_T++;
                    break;
                case 5: //Estadio5
                    $res_paliativa_pos3_M1_T++;
                    break;    
                default: //M0
                    if($rowHospitalInicial_T['TIPO_RES'] == 2)
                    {
                        $res_paliativa_pos3_M0_R2_T++;
                    }
                    break;

            }
	
	*/
	
	}
}
	
	mysqli_free_result($rsHospitalInicial_T);


$res_paliativa_pos3_n_T=$res_paliativa_pos3_M1_T+$res_paliativa_pos3_M0_R2_T+$res_paliativa_pos3_VACIA_T;

$res_curativa_pos3_n_T = $reseccion_recto_pos2_n_T - $res_paliativa_pos3_n_T - $proctocolectomia_pos3_n_T - $exent_pelvica_pos3_n_T;


/*if ($numero_pacientes == 0)
{
    $numero_pacientes = 1;
    $reseccion_recto_pos2_n = 1;
}*/


/*
 *  "R_H_rm_eco"=>number_format((($R_H_rm_eco/$pacientesHospitalTotalEstadiaje)*100), 2, '.', ''),
    "R_H_rm"=>number_format((($R_H_rm/$pacientesHospitalTotalEstadiaje)*100), 2, '.', ''),*/

//Fill de array
$a=array(
   "hospital"=>$hospital,
   "exite"=>$exite,
   "entraTotal"=>$entraTotal,
   "entraHospital"=>$entraHospital,
   "adentro"=>$adentro,
   
   "fecha_inicio"=>$fecha_inicio,
   "fecha_fin"=>$fecha_fin,
   
    "numero_pacientes_h"=>$numero_pacientes,
    //"numero_pacientes"=>$hospital,
    
    
    "reseccion_local_pos2_n_h"=>$reseccion_local_pos2_n,
    "reseccion_local_pos2_p_h"=>number_format((($reseccion_local_pos2_n/$numero_pacientes)*100), 2, '.', ''),
    
    "reseccion_recto_pos2_n_h"=>$reseccion_recto_pos2_n,
    "reseccion_recto_pos2_p_h"=>number_format((($reseccion_recto_pos2_n/$numero_pacientes)*100), 2, '.', ''),
    
    "no_resectivos_pos2_n_h"=>$no_resectivos_pos2_n,
    "no_resectivos_pos2_p_h"=>number_format((($no_resectivos_pos2_n/$numero_pacientes)*100), 2, '.', ''),
    
    
    "proctocolectomia_pos3_n_h"=>$proctocolectomia_pos3_n,
    "proctocolectomia_pos3_p_h"=>number_format((($proctocolectomia_pos3_n/$reseccion_recto_pos2_n)*100), 2, '.', ''),
    "exent_pelvica_pos3_n_h"=>$exent_pelvica_pos3_n,
    "exent_pelvica_pos3_p_h"=>number_format((($exent_pelvica_pos3_n/$reseccion_recto_pos2_n)*100), 2, '.', ''),
    
    "res_curativa_pos3_n_h"=>$res_curativa_pos3_n,
    "res_curativa_pos3_p_h"=>number_format((($res_curativa_pos3_n/$reseccion_recto_pos2_n)*100), 2, '.', ''),  
    
    "res_paliativa_pos3_n_h"=>$res_paliativa_pos3_M1 + $res_paliativa_pos3_M0_R2,
    "res_paliativa_pos3_p_h"=>number_format(((($res_paliativa_pos3_M1 + $res_paliativa_pos3_M0_R2)/$reseccion_recto_pos2_n)*100), 2, '.', ''),
    
    "res_paliativa_pos3_M1_h"=>$res_paliativa_pos3_M1,
    "res_paliativa_pos3_M0_R2_h"=>$res_paliativa_pos3_M0_R2,
    "res_paliativa_pos3_VACIA_h"=>$res_paliativa_pos3_VACIA_h,
	
	
	
	"numero_pacientes_T"=>$numero_pacientes_T,
	
    //"numero_pacientes"=>$hospital,
    
    
    "reseccion_local_pos2_n_T"=>$reseccion_local_pos2_n_T,
    "reseccion_local_pos2_p_T"=>number_format((($reseccion_local_pos2_n_T/$numero_pacientes_T)*100), 2, '.', ''),
    
    "reseccion_recto_pos2_n_T"=>$reseccion_recto_pos2_n_T,
    "reseccion_recto_pos2_p_T"=>number_format((($reseccion_recto_pos2_n_T/$numero_pacientes_T)*100), 2, '.', ''),
    
    "no_resectivos_pos2_n_T"=>$no_resectivos_pos2_n_T,
    "no_resectivos_pos2_p_T"=>number_format((($no_resectivos_pos2_n_T/$numero_pacientes_T)*100), 2, '.', ''),
    
    
    "proctocolectomia_pos3_n_T"=>$proctocolectomia_pos3_n_T,
    "proctocolectomia_pos3_p_T"=>number_format((($proctocolectomia_pos3_n_T/$reseccion_recto_pos2_n_T)*100), 2, '.', ''),
    "exent_pelvica_pos3_n_T"=>$exent_pelvica_pos3_n_T,
    "exent_pelvica_pos3_p_T"=>number_format((($exent_pelvica_pos3_n_T/$reseccion_recto_pos2_n_T)*100), 2, '.', ''),
    
    "res_curativa_pos3_n_T"=>$res_curativa_pos3_n_T,
    "res_curativa_pos3_p_T"=>number_format((($res_curativa_pos3_n_T/$reseccion_recto_pos2_n_T)*100), 2, '.', ''),  
    
    "res_paliativa_pos3_n_T"=>$res_paliativa_pos3_M1_T + $res_paliativa_pos3_M0_R2_T+$res_paliativa_pos3_VACIA_T,
    "res_paliativa_pos3_p_T"=>number_format(((($res_paliativa_pos3_M1_T + $res_paliativa_pos3_M0_R2_T+$res_paliativa_pos3_VACIA_T)/$reseccion_recto_pos2_n_T)*100), 2, '.', ''),
    
    "res_paliativa_pos3_M1_T"=>$res_paliativa_pos3_M1_T,
    "res_paliativa_pos3_M0_R2_T"=>$res_paliativa_pos3_M0_R2_T,
    "res_paliativa_pos3_VACIA_T"=>$res_paliativa_pos3_VACIA_T
 
    
    );



mysqli_close($conexion);
 


//output the response
echo json_encode($a);
?>