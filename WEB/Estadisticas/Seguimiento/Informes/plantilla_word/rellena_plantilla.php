<?php
session_start();

require_once ('../../../BDD/conexion.php');


$nombre_hospital = $_SESSION["NombreHospital"];               

// Lee la plantilla
$plantilla = file_get_contents('plantilla.rtf');
 
// Agregamos los escapes necesarios
$plantilla = addslashes($plantilla);
$plantilla = str_replace('\r','\\r',$plantilla);
$plantilla = str_replace('\t','\\t',$plantilla);
//  
// Datos de la plantilla

$fecha = date("Y-m-d", time());

$hospital = $nombre_hospital;
$inicio = $_POST["inicio"];
$final = $_POST["fin"];


/******* Radiología *******/
$R_H_rm_eco = $_POST["R_H_rm_eco"];
$R_H_rm = $_POST["R_H_rm"];
$R_H_eco = $_POST["R_H_eco"];
$R_H_no = $_POST["R_H_no"];
$R_H_tac = $_POST["R_H_tac"];
$R_H_dist_integ_libre = $_POST["R_H_dist_integ_libre"];
$R_H_dist_integ_afecto = $_POST["R_H_dist_integ_afecto"];
$R_H_dist_integ_nodatos = $_POST["R_H_dist_integ_nodatos"];

$R_T_rm_eco = $_POST["R_T_rm_eco"];
$R_T_rm = $_POST["R_T_rm"];
$R_T_eco = $_POST["R_T_eco"];
$R_T_no = $_POST["R_T_no"];
$R_T_tac = $_POST["R_T_tac"];
$R_T_dist_integ_libre = $_POST["R_T_dist_integ_libre"];
$R_T_dist_integ_afecto = $_POST["R_T_dist_integ_afecto"];
$R_T_dist_integ_nodatos = $_POST["R_T_dist_integ_nodatos"];


/******* Oncología *******/
$O_H_neo = $_POST["O_H_neo"];
$O_H_neo_III = $_POST["O_H_neo_III"];
$O_H_neo_T4 = $_POST["O_H_neo_T4"];
$O_H_ady = $_POST["O_H_ady"];
$O_H_ady_I = $_POST["O_H_ady_I"];
$O_H_ady_II = $_POST["O_H_ady_II"];
$O_H_ady_III = $_POST["O_H_ady_III"];
$O_H_ady_IV = $_POST["O_H_ady_IV"];

$O_T_neo = $_POST["O_T_neo"];
$O_T_neo_III = $_POST["O_T_neo_III"];
$O_T_neo_T4 = $_POST["O_T_neo_T4"];
$O_T_ady = $_POST["O_T_ady"];
$O_T_ady_I = $_POST["O_T_ady_I"];
$O_T_ady_II = $_POST["O_T_ady_II"];
$O_T_ady_III = $_POST["O_T_ady_III"];
$O_T_ady_IV = $_POST["O_T_ady_IV"];


/******* Cirugía *******/
$C_H_tec_1 = $_POST["C_H_tec_1"];
$C_H_tec_23 = $_POST["C_H_tec_23"];
$C_H_tec_2 = $_POST["C_H_tec_2"];
$C_H_tec_3 = $_POST["C_H_tec_3"];
$C_H_tec_410 = $_POST["C_H_tec_410"];
$C_H_tec_4 = $_POST["C_H_tec_4"];
$C_H_tec_10 = $_POST["C_H_tec_10"];
$C_H_tec_5 = $_POST["C_H_tec_5"];
$C_H_tec_6 = $_POST["C_H_tec_6"];
$C_H_tec_7 = $_POST["C_H_tec_7"];
$C_H_tec_9 = $_POST["C_H_tec_9"];
$C_H_tec_8 = $_POST["C_H_tec_8"];

$C_H_meso_parcial = $_POST["C_H_meso_parcial"];
$C_H_meso_total = $_POST["C_H_meso_total"];
$C_H_meso_no = $_POST["C_H_meso_no"];

$C_H_tumor_inf_parcial = $_POST["C_H_tumor_inf_parcial"];
$C_H_tumor_inf_total = $_POST["C_H_tumor_inf_total"];
$C_H_tumor_inf_no = $_POST["C_H_tumor_inf_no"];



$C_T_tec_1 = $_POST["C_T_tec_1"];
$C_T_tec_23 = $_POST["C_T_tec_23"];
$C_T_tec_2 = $_POST["C_T_tec_2"];
$C_T_tec_3 = $_POST["C_T_tec_3"];
$C_T_tec_410 = $_POST["C_T_tec_410"];
$C_T_tec_4 = $_POST["C_T_tec_4"];
$C_T_tec_10 = $_POST["C_T_tec_10"];
$C_T_tec_5 = $_POST["C_T_tec_5"];
$C_T_tec_6 = $_POST["C_T_tec_6"];
$C_T_tec_7 = $_POST["C_T_tec_7"];
$C_T_tec_9 = $_POST["C_T_tec_9"];
$C_T_tec_8 = $_POST["C_T_tec_8"];

$C_T_meso_parcial = $_POST["C_T_meso_parcial"];
$C_T_meso_total = $_POST["C_T_meso_total"];
$C_T_meso_no = $_POST["C_T_meso_no"];

$C_T_tumor_inf_parcial = $_POST["C_T_tumor_inf_parcial"];
$C_T_tumor_inf_total = $_POST["C_T_tumor_inf_total"];
$C_T_tumor_inf_no = $_POST["C_T_tumor_inf_no"];




$C_H_via_lapar = $_POST["C_H_via_lapar"];
$C_H_via_lapar_conv = $_POST["C_H_via_lapar_conv"];
$C_H_via_abierta = $_POST["C_H_via_abierta"];

$C_H_perf_tumor_alta = $_POST["C_H_perf_tumor_alta"];
$C_H_perf_tumor_baja = $_POST["C_H_perf_tumor_baja"];
$C_H_perf_tumor_amp_abd = $_POST["C_H_perf_tumor_amp_abd"];
$C_H_perf_tumor_proc = $_POST["C_H_perf_tumor_proc"];
$C_H_perf_tumor_hart = $_POST["C_H_perf_tumor_hart"];
$C_H_perf_tumor_total = $_POST["C_H_perf_tumor_total"];

$C_H_int_curativa = $_POST["C_H_int_curativa"];
$C_H_int_paliativa = $_POST["C_H_int_paliativa"];
$C_H_int_no = $_POST["C_H_int_no"];

$C_H_estoma_deriva = $_POST["C_H_estoma_deriva"];



$C_T_via_lapar = $_POST["C_T_via_lapar"];
$C_T_via_lapar_conv = $_POST["C_T_via_lapar_conv"];
$C_T_via_abierta = $_POST["C_T_via_abierta"];

$C_T_perf_tumor_alta = $_POST["C_T_perf_tumor_alta"];
$C_T_perf_tumor_baja = $_POST["C_T_perf_tumor_baja"];
$C_T_perf_tumor_amp_abd = $_POST["C_T_perf_tumor_amp_abd"];
$C_T_perf_tumor_proc = $_POST["C_T_perf_tumor_proc"];
$C_T_perf_tumor_hart = $_POST["C_T_perf_tumor_hart"];
$C_T_perf_tumor_total = $_POST["C_T_perf_tumor_total"];

$C_T_int_curativa = $_POST["C_T_int_curativa"];
$C_T_int_paliativa = $_POST["C_T_int_paliativa"];
$C_T_int_no = $_POST["C_T_int_no"];

$C_T_estoma_deriva = $_POST["C_T_estoma_deriva"];



$C_H_mortalidad = $_POST["C_H_mortalidad"];

$C_H_comp_herida = $_POST["C_H_comp_herida"];
$C_H_comp_perine = $_POST["C_H_comp_perine"];
$C_H_comp_anast = $_POST["C_H_comp_anast"];
$C_H_comp_abd = $_POST["C_H_comp_abd"];
$C_H_comp_reint = $_POST["C_H_comp_reint"];

$C_T_mortalidad = $_POST["C_T_mortalidad"];

$C_T_comp_herida = $_POST["C_T_comp_herida"];
$C_T_comp_perine = $_POST["C_T_comp_perine"];
$C_T_comp_anast = $_POST["C_T_comp_anast"];
$C_T_comp_abd = $_POST["C_T_comp_abd"];
$C_T_comp_reint = $_POST["C_T_comp_reint"];


/******* Anatomía patológica *******/
$AP_T_estadio_0 = $_POST["AP_T_estadio_0"];
$AP_T_estadio_I = $_POST["AP_T_estadio_I"];
$AP_T_estadio_II = $_POST["AP_T_estadio_II"];
$AP_T_estadio_III = $_POST["AP_T_estadio_III"];
$AP_T_estadio_IV = $_POST["AP_T_estadio_IV"];

$AP_T_gang_aisl_min = $_POST["AP_T_gang_aisl_min"];
$AP_T_gang_aisl_med = $_POST["AP_T_gang_aisl_med"];
$AP_T_gang_aisl_max = $_POST["AP_T_gang_aisl_max"];

$AP_T_gang_afec_min = $_POST["AP_T_gang_afec_min"];
$AP_T_gang_afec_med = $_POST["AP_T_gang_afec_med"];
$AP_T_gang_afec_max = $_POST["AP_T_gang_afec_max"];

$AP_T_circun_afecto = $_POST["AP_T_circun_afecto"];
$AP_T_circun_libre = $_POST["AP_T_circun_libre"];

$AP_T_distal_afecto = $_POST["AP_T_distal_afecto"];
$AP_T_distal_libre = $_POST["AP_T_distal_libre"];

$AP_T_resec_R0 = $_POST["AP_T_resec_R0"];
$AP_T_resec_R1 = $_POST["AP_T_resec_R1"];
$AP_T_resec_R2 = $_POST["AP_T_resec_R2"];

$AP_T_regre_GR0 = $_POST["AP_T_regre_GR0"];
$AP_T_regre_GR1 = $_POST["AP_T_regre_GR1"];
$AP_T_regre_GR2 = $_POST["AP_T_regre_GR2"];
$AP_T_regre_GR3 = $_POST["AP_T_regre_GR3"];
$AP_T_regre_GR4 = $_POST["AP_T_regre_GR4"];

$AP_T_cal_mesorre_satisf = $_POST["AP_T_cal_mesorre_satisf"];
$AP_T_cal_mesorre_parc_satisf = $_POST["AP_T_cal_mesorre_parc_satisf"];
$AP_T_cal_mesorre_insatisf = $_POST["AP_T_cal_mesorre_insatisf"];


$AP_H_estadio_0 = $_POST["AP_H_estadio_0"];
$AP_H_estadio_I = $_POST["AP_H_estadio_I"];
$AP_H_estadio_II = $_POST["AP_H_estadio_II"];
$AP_H_estadio_III = $_POST["AP_H_estadio_III"];
$AP_H_estadio_IV = $_POST["AP_H_estadio_IV"];

$AP_H_gang_aisl_min = $_POST["AP_H_gang_aisl_min"];
$AP_H_gang_aisl_med = $_POST["AP_H_gang_aisl_med"];
$AP_H_gang_aisl_max = $_POST["AP_H_gang_aisl_max"];

$AP_H_gang_afec_min = $_POST["AP_H_gang_afec_min"];
$AP_H_gang_afec_med = $_POST["AP_H_gang_afec_med"];
$AP_H_gang_afec_max = $_POST["AP_H_gang_afec_max"];

$AP_H_circun_afecto = $_POST["AP_H_circun_afecto"];
$AP_H_circun_libre = $_POST["AP_H_circun_libre"];

$AP_H_distal_afecto = $_POST["AP_H_distal_afecto"];
$AP_H_distal_libre = $_POST["AP_H_distal_libre"];

$AP_H_resec_R0 = $_POST["AP_H_resec_R0"];
$AP_H_resec_R1 = $_POST["AP_H_resec_R1"];
$AP_H_resec_R2 = $_POST["AP_H_resec_R2"];

$AP_H_regre_GR0 = $_POST["AP_H_regre_GR0"];
$AP_H_regre_GR1 = $_POST["AP_H_regre_GR1"];
$AP_H_regre_GR2 = $_POST["AP_H_regre_GR2"];
$AP_H_regre_GR3 = $_POST["AP_H_regre_GR3"];
$AP_H_regre_GR4 = $_POST["AP_H_regre_GR4"];

$AP_H_cal_mesorre_satisf = $_POST["AP_H_cal_mesorre_satisf"];
$AP_H_cal_mesorre_parc_satisf = $_POST["AP_H_cal_mesorre_parc_satisf"];
$AP_H_cal_mesorre_insatisf = $_POST["AP_H_cal_mesorre_insatisf"];





/******* Seguimiento *******/
$S_H_rec_local = $_POST["S_H_rec_local"];
$S_H_rec_sistematica = $_POST["S_H_rec_sistematica"];
$S_H_rec_local_sistematica = $_POST["S_H_rec_local_sistematica"];

$S_H_estado_vivo = $_POST["S_H_estado_vivo"];
$S_H_estado_muerto = $_POST["S_H_estado_muerto"];


$S_T_rec_local = $_POST["S_T_rec_local"];
$S_T_rec_sistematica = $_POST["S_T_rec_sistematica"];
$S_T_rec_local_sistematica = $_POST["S_T_rec_local_sistematica"];

$S_T_estado_vivo = $_POST["S_T_estado_vivo"];
$S_T_estado_muerto = $_POST["S_T_estado_muerto"];


 $numero_pacientes = $_POST["numero_pacientes"];
 
 $reseccion_local_pos2_n = $_POST["reseccion_local_pos2_n"];
 $reseccion_local_pos2_p = $_POST["reseccion_local_pos2_p"];
 
 $reseccion_recto_pos2_n = $_POST["reseccion_recto_pos2_n"];
 $reseccion_recto_pos2_p = $_POST["reseccion_recto_pos2_p"];
 
 $no_resectivos_pos2_n = $_POST["no_resectivos_pos2_n"];
 $no_resectivos_pos2_p = $_POST["no_resectivos_pos2_p"];
 
 $proctocolectomia_pos3_n = $_POST["proctocolectomia_pos3_n"];
 $proctocolectomia_pos3_p = $_POST["proctocolectomia_pos3_p"];
 $exent_pelvica_pos3_n = $_POST["exent_pelvica_pos3_n"];
 $exent_pelvica_pos3_p = $_POST["exent_pelvica_pos3_p"];
 
 $res_curativa_pos3_n = $_POST["res_curativa_pos3_n"];
 $res_curativa_pos3_p = $_POST["res_curativa_pos3_p"];
 
 $res_paliativa_pos3_n = $_POST["res_paliativa_pos3_n"];
 $res_paliativa_pos3_p = $_POST["res_paliativa_pos3_p"];
 
 $res_paliativa_pos3_M1 = $_POST["res_paliativa_pos3_M1"];
 $res_paliativa_pos3_M0_R2 = $_POST["res_paliativa_pos3_M0_R2"];


 
// Procesa la plantilla
eval( '$rtf = <<<EOF_RTF
' . $plantilla . '
EOF_RTF;
' );

$rtf = str_replace('\\\\','\\',$rtf);

// Guarda el RTF generado, el nombre del RTF en este caso sera el apellido-nombre.fechaactual.rtf
file_put_contents("informe_comparativas-$fecha.rtf",$rtf);


//echo "<a href=\"informe_comparativas-$fecha.rtf\">descargar informe . $fecha </a>";


mysqli_close($conexion);
 
 
header("location: informe_comparativas-$fecha.rtf")
?>

