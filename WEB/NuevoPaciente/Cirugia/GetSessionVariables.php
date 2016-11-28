<?php
//Carga de las variables para modificar los datos de un paciente existente
session_start();



for ($i=0; $i < count($_SESSION["Otra_Tecnica_Cirugia"]); $i++) { 
	$Tecnicas[] = $_SESSION["Otra_Tecnica_Cirugia"][$i];
}

$Tec = count($_SESSION["Otra_Tecnica_Cirugia"]);

//Comprobamos si los inputs están coidificados o no (si viene de modificar están ya codificados)
if(!mb_check_encoding($_SESSION["Cirujano_Principal"], 'UTF-8')) 
	$_SESSION["Cirujano_Principal"] = utf8_encode($_SESSION["Cirujano_Principal"]); 

if(!mb_check_encoding($_SESSION["Cirujano_Ayudante"], 'UTF-8')) 
	$_SESSION["Cirujano_Ayudante"] = utf8_encode($_SESSION["Cirujano_Ayudante"]); 
	
if(!mb_check_encoding($_SESSION["Tipo_Reintervencion"], 'UTF-8')) 
	$_SESSION["Tipo_Reintervencion"] = utf8_encode($_SESSION["Tipo_Reintervencion"]); 

if(!mb_check_encoding($_SESSION["Causa_Exitus_Intra"], 'UTF-8')) 
	$_SESSION["Causa_Exitus_Intra"] = utf8_encode($_SESSION["Causa_Exitus_Intra"]); 

if(!mb_check_encoding($_SESSION["Causa_Exitus_Post"], 'UTF-8')) 
	$_SESSION["Causa_Exitus_Post"] = utf8_encode($_SESSION["Causa_Exitus_Post"]); 
	
   
//Fill de array
$a=array(
    "B_Cirugia"=>$_SESSION["B_Cirugia"],
    "Motivo_No_Cirugia"=>$_SESSION["Motivo_No_Cirugia"],
    "Tipo_Cirugia"=>$_SESSION["Tipo_Cirugia"],
    "Fecha_Cirugia"=>$_SESSION["Fecha_Cirugia"],
    "Fecha_Alta_Pendiente"=>$_SESSION["Fecha_Alta_Pendiente"],
    "Fecha_Alta"=>$_SESSION["Fecha_Alta"],
    "Cirujano_Principal"=>$_SESSION["Cirujano_Principal"],
    "Cirujano_Ayudante"=>$_SESSION["Cirujano_Ayudante"],
    "Tecnicas_Cirugia"=>$_SESSION["Tecnicas_Cirugia"],
    "Otra_Tecnica_Cirugia"=>$Tecnicas,
	"Orientacion"=>$_SESSION["Orientacion"],
    "Exeresis_Meso"=>$_SESSION["Exeresis_Meso"],
    "Otras_Resecc_Viscerales"=>$_SESSION["Otras_Resecc_Viscerales"],
    "Res_Seminales"=>$_SESSION["Res_Seminales"],
    "Res_Peritoneo"=>$_SESSION["Res_Peritoneo"],
    "Res_Vejiga"=>$_SESSION["Res_Vejiga"],
    "Res_Utero"=>$_SESSION["Res_Utero"],
    "Res_Vagina"=>$_SESSION["Res_Vagina"],
    "Res_Prostata"=>$_SESSION["Res_Prostata"],
    "Res_Hepatica"=>$_SESSION["Res_Hepatica"],
    "Res_IDelgado"=>$_SESSION["Res_IDelgado"],
    "Res_Coccix"=>$_SESSION["Res_Coccix"],
    "Res_Sacro"=>$_SESSION["Res_Sacro"],
    "Res_Ureter"=>$_SESSION["Res_Ureter"],
    "Res_Ovarios"=>$_SESSION["Res_Ovarios"],
    "Res_Trompas"=>$_SESSION["Res_Trompas"],
    "ASA"=>$_SESSION["ASA"],
    "Hallazgos_Intraoperatorios"=>$_SESSION["Hallazgos_Intraoperatorios"],
    "Perforacion_Tumoral"=>$_SESSION["Perforacion_Tumoral"],
    "Tipo_Metast_Hepaticas"=>$_SESSION["Tipo_Metast_Hepaticas"],
    "Imp_Ovaricos"=>$_SESSION["Imp_Ovaricos"],
    "Obstruccion"=>$_SESSION["Obstruccion"],
    "Via_Operacion"=>$_SESSION["Via_Operacion"],
    "Tiempo_Operacion"=>$_SESSION["Tiempo_Operacion"],
    "Transfusiones"=>$_SESSION["Transfusiones"],
    "Intencion_Operatoria"=>$_SESSION["Intencion_Operatoria"],
    "Anastomosis"=>$_SESSION["Anastomosis"],
    "Reservorio"=>$_SESSION["Reservorio"],
    "Estoma_Der"=>$_SESSION["Estoma_Derivacion"],
    "Tipo_Estoma"=>$_SESSION["Tipo_Estoma"],
    "Complicaciones"=>$_SESSION["Complicaciones"],
    "Reintervencion"=>$_SESSION["Reintervencion"],
    "Tipo_Reintervencion"=>$_SESSION["Tipo_Reintervencion"],
    "Exitus_Intra"=>$_SESSION["Exitus_Intra"],
    "Causa_Exitus_Intra"=>$_SESSION["Causa_Exitus_Intra"],
    "Exitus_Post"=>$_SESSION["Exitus_Post"],
    "Causa_Exitus_Post"=>$_SESSION["Causa_Exitus_Post"],
    "Generales_Sepsis"=>$_SESSION["Generales_Sepsis"],
    "Generales_Shock"=>$_SESSION["Generales_Shock"],
    "Herida_Hemorragia"=>$_SESSION["Herida_Hemorragia"],
    "Herida_Infeccion"=>$_SESSION["Herida_Infeccion"],
    "Herida_Evisceracion"=>$_SESSION["Herida_Evisceracion"],
    "Herida_Eventracion"=>$_SESSION["Herida_Eventracion"],
    "Perine_Hernia"=>$_SESSION["Perine_Hernia"],
    "Perine_Infeccion"=>$_SESSION["Perine_Infeccion"],
    "Perine_Retraso_Cicatrizacion"=>$_SESSION["Perine_Retraso_Cicatrizacion"],
    "Abdominales_Hemoperitoneo"=>$_SESSION["Abdominales_Hemoperitoneo"],
    "Abdominales_Peri_Difusas"=>$_SESSION["Abdominales_Peri_Difusas"],
    "Abdominales_Abceso_Abdominal"=>$_SESSION["Abdominales_Abceso_Abdominal"],
    "Abdominales_Abceso_Pelvico"=>$_SESSION["Abdominales_Abceso_Pelvico"],
	"Abdominales_Hemo_Pelvica"=>$_SESSION["Abdominales_Hemo_Pelvica"],
    "Abdominales_Isquemia_Intestinal"=>$_SESSION["Abdominales_Isquemia_Intestinal"],
    "Abdominales_Colecistitis"=>$_SESSION["Abdominales_Colecistitis"],
    "Abdominales_Iatrog_Vias_Urinarias"=>$_SESSION["Abdominales_Iatrog_Vias_Urinarias"],
    "Abdominales_Iatrog_Vias_Huecas"=>$_SESSION["Abdominales_Iatrog_Vias_Huecas"],
    "Abdominales_Ileo_Paralitico_Prolongado"=>$_SESSION["Abdominales_Ileo_Paralitico_Prolongado"],
    "Abdominales_Ileo_Mecanico"=>$_SESSION["Abdominales_Ileo_Mecanico"],
    "Abdominales_Estoma"=>$_SESSION["Abdominales_Estoma"],
    "Anastomosis_Hemorragia"=>$_SESSION["Anastomosis_Hemorragia"],
    "Anastomosis_Fuga"=>$_SESSION["Anastomosis_Fuga"],
    "Anastomosis_Fistula"=>$_SESSION["Anastomosis_Fistula"],
    "Otras_Hemo_Diges"=>$_SESSION["Otras_Hemo_Diges"],
    "Otras_Infeccion_Urinaria"=>$_SESSION["Otras_Infeccion_Urinaria"],
    "Otras_Cardiovascular"=>$_SESSION["Otras_Cardiovascular"],
    "Otras_Vascular_Infecc"=>$_SESSION["Otras_Vascular_Infecc"],
    "Otras_Vascular_Mec"=>$_SESSION["Otras_Vascular_Mec"],
    "Otras_Hepatica"=>$_SESSION["Otras_Hepatica"],
    "Otras_Respiratoria"=>$_SESSION["Otras_Respiratoria"],
    "Otras_Respiratoria_Infecc"=>$_SESSION["Otras_Respiratoria_Infecc"],
    "Otras_FMO"=>$_SESSION["Otras_FMO"],
    "Otras_TEP"=>$_SESSION["Otras_TEP"],
    "Otras_Neuroapraxia"=>$_SESSION["Otras_Neuroapraxia"],
    "Comp_Otras_Urologicas"=>$_SESSION["Comp_Otras_Urologicas"],
	"Otras_Renal"=>$_SESSION["Otras_Renal"],
    
    /*
     * Localización la vamos a usar para las tecnicas_cirugias,
     * ya que siempre se elimina una de ellas, para controlar los
     * índices
     */
    "Localizacion"=>$_SESSION["Localizacion"] 
   
    );

//output the response
echo json_encode($a);
?>