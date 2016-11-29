<?php
	session_start();

	 require_once ("../../BDD/conexion.php");
	
/*
 * Variable para ver si es la primera vez que se carga la página
 */

$Enviar_Cirugia="Enviar";
$_SESSION["ButtonEnviarCirugia"]=$Enviar_Cirugia;

	


$NHC=$_SESSION["NHC"];
$NHC=strval($NHC);


$Id_Paciente=$_SESSION["Id_Paciente"];
$Id_Paciente=intval($Id_Paciente);	
	
	
	
	
$B_Cirugia=$_POST["B_Cirugia"];
$B_Cirugia=strip_tags($B_Cirugia);
$B_Cirugia=intval($B_Cirugia);

//Variable global SE INTRODUCE EN SESSION

$_SESSION["B_Cirugia"]=$B_Cirugia;



if (isset($_POST["Motivos_No_Cirugia"])){
	$Motivo_No_Cirugia=$_POST["Motivos_No_Cirugia"];
	$Motivo_No_Cirugia=strip_tags($Motivo_No_Cirugia);
	$Motivo_No_Cirugia=intval($Motivo_No_Cirugia);
	$_SESSION["Motivo_No_Cirugia"]=$Motivo_No_Cirugia;	
	$_SESSION["No_Patologica"]=1;
	
}else{
	$Motivo_No_Cirugia=null;
	$_SESSION["Motivo_No_Cirugia"]=$Motivo_No_Cirugia;	
}

if (isset($_POST["Tipo_Cirugia"])){
	$Tipo_Cirugia=$_POST["Tipo_Cirugia"];
	$Tipo_Cirugia=strip_tags($Tipo_Cirugia);
	$Tipo_Cirugia=intval($Tipo_Cirugia);
	$_SESSION["Tipo_Cirugia"]=$Tipo_Cirugia;
}else{
	$Tipo_Cirugia=null;
	$_SESSION["Tipo_Cirugia"]=$Tipo_Cirugia;
}



if (isset($_POST["Fecha_Intervencion"])){
	$Fecha_Intervencion=$_POST["Fecha_Intervencion"];
	$Fecha_Intervencion=strip_tags($Fecha_Intervencion);
	$_SESSION["Fecha_Cirugia"]=$Fecha_Intervencion;
}else{
	$Fecha_Intervencion=null;
	$_SESSION["Fecha_Cirugia"]=$Fecha_Intervencion;
}


if (isset($_POST["Fecha_Alta"])){
	$Fecha_Alta=$_POST["Fecha_Alta"];
	$Fecha_Alta=strip_tags($Fecha_Alta);
	$_SESSION["Fecha_Alta"]=$Fecha_Alta;
}else{
	$Fecha_Alta=null;
	$_SESSION["Fecha_Alta"]=$Fecha_Alta;
}

if (isset($_POST["Cirujano_Principal"])){
	$Cirujano_Principal=$_POST["Cirujano_Principal"];
	$Cirujano_Principal=strip_tags($Cirujano_Principal);
	$Cirujano_Principal=strval($Cirujano_Principal);
	$Cirujano_Principal=utf8_decode($Cirujano_Principal);
	$_SESSION["Cirujano_Principal"]=$Cirujano_Principal;
}else{
	$Cirujano_Principal=null;
	$_SESSION["Cirujano_Principal"]=$Cirujano_Principal;
}


if (isset($_POST["Cirujano_Ayudante"])){
	$Cirujano_Ayudante=$_POST["Cirujano_Ayudante"];
	$Cirujano_Ayudante=strip_tags($Cirujano_Ayudante);
	$Cirujano_Ayudante=strval($Cirujano_Ayudante);
	$Cirujano_Ayudante=utf8_decode($Cirujano_Ayudante);
	$_SESSION["Cirujano_Ayudante"]=$Cirujano_Ayudante;
}else{
	$Cirujano_Adyuvante=null;
	$_SESSION["Cirujano_Ayudante"]=$Cirujano_Ayudante;
}


if (isset($_POST["Tecnicas_Cirugia"])){
	$Tecnica_Cirugia=$_POST["Tecnicas_Cirugia"];
	$Tecnica_Cirugia=strip_tags($Tecnica_Cirugia);
	$Tecnica_Cirugia=intval($Tecnica_Cirugia);
	$_SESSION["Tecnicas_Cirugia"]=$Tecnica_Cirugia;
	if ($Tecnica_Cirugia==7 || $Tecnica_Cirugia==8){
		$_SESSION["No_Patologica"]=1;
	}
}else{
	$Tecnica_Cirugia=null;
	$_SESSION["Tecnicas_Cirugia"]=$Tecnica_Cirugia;
}

if (isset($_POST["Anastomosis_coloanal"])){
	$Anastomosis_coloanal=$_POST["Anastomosis_coloanal"];
	$Anastomosis_coloanal=strip_tags($Anastomosis_coloanal);
	$Anastomosis_coloanal=intval($Anastomosis_coloanal);
	$_SESSION["Anastomosis_coloanal"]=$Anastomosis_coloanal;
}else{
	$Anastomosis_coloanal=null;
	$_SESSION["Anastomosis_coloanal"]=$Anastomosis_coloanal;
}


if (isset($_POST["Otras_Tecnicas"])){
    unset($_SESSION["Otra_Tecnica_Cirugia"]);
     foreach ($_POST['Otras_Tecnicas'] as $Otra_Tecnica_Cirugia) {
        $Otra_Tecnica_Cirugia = intval($Otra_Tecnica_Cirugia);
        $_SESSION["Otra_Tecnica_Cirugia"][]=$Otra_Tecnica_Cirugia;
    }
  
}else{
    $Otra_Tecnica_Cirugia=null;
    $_SESSION["Otra_Tecnica_Cirugia"]=$Otra_Tecnica_Cirugia;
}

for ($i=0; $i < count($_SESSION["Otra_Tecnica_Cirugia"]); $i++) { 
	echo ($_SESSION["Otra_Tecnica_Cirugia"][$i] . ", ");
}

if (isset($_POST["Orientacion"])){
	$Orientacion=$_POST["Orientacion"];
	$Orientacion=strip_tags($Orientacion);
	$Orientacion=intval($Orientacion);
	$_SESSION["Orientacion"]=$Orientacion;
}else{
	$Orientacion=0;
	$_SESSION["Orientacion"]=$Orientacion;
}

if (isset($_POST["Exeresis_Mesorrecto"])){
	$Exeresis_Meso=$_POST["Exeresis_Mesorrecto"];
	$Exeresis_Meso=strip_tags($Exeresis_Meso);
	$Exeresis_Meso=intval($Exeresis_Meso);
	$_SESSION["Exeresis_Meso"]=$Exeresis_Meso;
}else{
	$Exeresis_Meso=null;
	$_SESSION["Exeresis_Meso"]=$Exeresis_Meso;
}

if (isset($_POST["Otras_Resecciones"])){
	$Otras_Resecc_Viscerales=$_POST["Otras_Resecciones"];
	$Otras_Resecc_Viscerales=strip_tags($Otras_Resecc_Viscerales);
	$Otras_Resecc_Viscerales=intval($Otras_Resecc_Viscerales);
	$_SESSION["Otras_Resecc_Viscerales"]=$Otras_Resecc_Viscerales;
}else{
	$Otras_Resecc_Viscerales=null;
	$_SESSION["Otras_Resecc_Viscerales"]=$Otras_Resecc_Viscerales;
}


if (isset($_POST["Res_Seminales"])){
	$Res_Seminales=$_POST["Res_Seminales"];
	$Res_Seminales=strip_tags($Res_Seminales);
	$Res_Seminales=intval($Res_Seminales);
	$_SESSION["Res_Seminales"]=$Res_Seminales;
}else{
	$Res_Seminales=null;
	$_SESSION["Res_Seminales"]=$Res_Seminales;
}


if (isset($_POST["Res_Peritoneo"])){
	$Res_Peritoneo=$_POST["Res_Peritoneo"];
	$Res_Peritoneo=strip_tags($Res_Peritoneo);
	$Res_Peritoneo=intval($Res_Peritoneo);
	$_SESSION["Res_Peritoneo"]=$Res_Peritoneo;
}else{
	$Res_Peritoneo=null;
	$_SESSION["Res_Peritoneo"]=$Res_Peritoneo;
}


if (isset($_POST["Res_Vejiga"])){
	$Res_Vejiga=$_POST["Res_Vejiga"];
	$Res_Vejiga=strip_tags($Res_Vejiga);
	$Res_Vejiga=intval($Res_Vejiga);
	$_SESSION["Res_Vejiga"]=$Res_Vejiga;
}else{
	$Res_Vejiga=null;
	$_SESSION["Res_Vejiga"]=$Res_Vejiga;
}



if (isset($_POST["Res_Utero"])){
	$Res_Utero=$_POST["Res_Utero"];
	$Res_Utero=strip_tags($Res_Utero);
	$Res_Utero=intval($Res_Utero);
	$_SESSION["Res_Utero"]=$Res_Utero;
}else{
	$Res_Utero=null;
	$_SESSION["Res_Utero"]=$Res_Utero;
}


if (isset($_POST["Res_Vagina"])){
	$Res_Vagina=$_POST["Res_Vagina"];
	$Res_Vagina=strip_tags($Res_Vagina);
	$Res_Vagina=intval($Res_Vagina);
	$_SESSION["Res_Vagina"]=$Res_Vagina;
}else{
	$Res_Vagina=null;
	$_SESSION["Res_Vagina"]=$Res_Vagina;
}


if (isset($_POST["Res_Prostata"])){
	$Res_Prostata=$_POST["Res_Prostata"];
	$Res_Prostata=strip_tags($Res_Prostata);
	$Res_Prostata=intval($Res_Prostata);
	$_SESSION["Res_Prostata"]=$Res_Prostata;
}else{
	$Res_Prostata=null;
	$_SESSION["Res_Prostata"]=$Res_Prostata;
}

if (isset($_POST["Res_Hepatica"])){
	$Res_Hepatica=$_POST["Res_Hepatica"];
	$Res_Hepatica=strip_tags($Res_Hepatica);
	$Res_Hepatica=intval($Res_Hepatica);
	$_SESSION["Res_Hepatica"]=$Res_Hepatica;
}else{
	$Res_Hepatica=null;
	$_SESSION["Res_Hepatica"]=$Res_Hepatica;
}


if (isset($_POST["Res_IDelgado"])){
	$Res_IDelgado=$_POST["Res_IDelgado"];
	$Res_IDelgado=strip_tags($Res_IDelgado);
	$Res_IDelgado=intval($Res_IDelgado);
	$_SESSION["Res_IDelgado"]=$Res_IDelgado;
}else{
	$Res_IDelgado=null;
	$_SESSION["Res_IDelgado"]=$Res_IDelgado;
}


if (isset($_POST["Res_Coccix"])){
	$Res_Coccix=$_POST["Res_Coccix"];
	$Res_Coccix=strip_tags($Res_Coccix);
	$Res_Coccix=intval($Res_Coccix);
	$_SESSION["Res_Coccix"]=$Res_Coccix;
}else{
	$Res_Coccix=null;
	$_SESSION["Res_Coccix"]=$Res_Coccix;
}


if (isset($_POST["Res_Sacro"])){
	$Res_Sacro=$_POST["Res_Sacro"];
	$Res_Sacro=strip_tags($Res_Sacro);
	$Res_Sacro=intval($Res_Sacro);
	$_SESSION["Res_Sacro"]=$Res_Sacro;
}else{
	$Res_Sacro=null;
	$_SESSION["Res_Sacro"]=$Res_Sacro;
}

if (isset($_POST["Res_Ureter"])){
    $Res_Ureter=$_POST["Res_Ureter"];
    $Res_Ureter=strip_tags($Res_Ureter);
    $Res_Ureter=intval($Res_Ureter);
    $_SESSION["Res_Ureter"]=$Res_Ureter;
}else{
    $Res_Ureter=null;
    $_SESSION["Res_Ureter"]=$Res_Ureter;
}

if (isset($_POST["Res_Ovarios"])){
    $Res_Ovarios=$_POST["Res_Ovarios"];
    $Res_Ovarios=strip_tags($Res_Ovarios);
    $Res_Ovarios=intval($Res_Ovarios);
    $_SESSION["Res_Ovarios"]=$Res_Ovarios;
}else{
    $Res_Ovarios=null;
    $_SESSION["Res_Ovarios"]=$Res_Ovarios;
}

if (isset($_POST["Res_Trompas"])){
    $Res_Trompas=$_POST["Res_Trompas"];
    $Res_Trompas=strip_tags($Res_Trompas);
    $Res_Trompas=intval($Res_Trompas);
    $_SESSION["Res_Trompas"]=$Res_Trompas;
}else{
    $Res_Trompas=null;
    $_SESSION["Res_Trompas"]=$Res_Trompas;
}


if (isset($_POST["Tipo_ASA"])){
	$ASA=$_POST["Tipo_ASA"];
	$ASA=strip_tags($ASA);
	$ASA=intval($ASA);
	$_SESSION["ASA"]=$ASA;
}else{
	$ASA=null;
	$_SESSION["ASA"]=$ASA;
}


if (isset($_POST["Tipo_Hallazgos"])){
	$Hallazgos_Intraoperatorios=$_POST["Tipo_Hallazgos"];
	$Hallazgos_Intraoperatorios=strip_tags($Hallazgos_Intraoperatorios);
	$Hallazgos_Intraoperatorios=intval($Hallazgos_Intraoperatorios);
	$_SESSION["Hallazgos_Intraoperatorios"]=$Hallazgos_Intraoperatorios;
}else{
	$Hallazgos_Intraoperatorios=null;
	$_SESSION["Hallazgos_Intraoperatorios"]=$Hallazgos_Intraoperatorios;
}


if (isset($_POST["Perforacion_Tumoral"])){
	$Perforacion_Tumoral=$_POST["Perforacion_Tumoral"];
	$Perforacion_Tumoral=strip_tags($Perforacion_Tumoral);
	$Perforacion_Tumoral=intval($Perforacion_Tumoral);
	$_SESSION["Perforacion_Tumoral"]=$Perforacion_Tumoral;
}else{
	$Perforacion_Tumoral=null;
	$_SESSION["Perforacion_Tumoral"]=$Perforacion_Tumoral;
}


if (isset($_POST["Tipo_Metast_Hepaticas"])){
	$Met_Hepaticas=$_POST["Tipo_Metast_Hepaticas"];
	$Met_Hepaticas=strip_tags($Met_Hepaticas);
	$Met_Hepaticas=intval($Met_Hepaticas);
}else{
	$Met_Hepaticas=null;
}

//Variable global SE INTRODUCE EN SESSION

$_SESSION["Tipo_Metast_Hepaticas"]=$Met_Hepaticas;


if (isset($_POST["Imp_Ovaricos"])){
	$Imp_Ovaricos=$_POST["Imp_Ovaricos"];
	$Imp_Ovaricos=strip_tags($Imp_Ovaricos);
	$Imp_Ovaricos=intval($Imp_Ovaricos);
}else{
	$Imp_Ovaricos=null;
}

//Variable global SE INTRODUCE EN SESSION

$_SESSION["Imp_Ovaricos"]=$Imp_Ovaricos;


if (isset($_POST["Obstruccion"])){
	$Obstruccion=$_POST["Obstruccion"];
	$Obstruccion=strip_tags($Obstruccion);
	$Obstruccion=intval($Obstruccion);
}else{
	$Obstruccion=null;
}

$_SESSION["Obstruccion"]=$Obstruccion;


if (isset($_POST["Tipo_Via"])){
	$Via_Operacion=$_POST["Tipo_Via"];
	$Via_Operacion=strip_tags($Via_Operacion);
	$Via_Operacion=intval($Via_Operacion);
}else{
	$Via_Operacion=null;
}

$_SESSION["Via_Operacion"]=$Via_Operacion;


if (isset($_POST["Tiempo_Operacion"])){
	$Tiempo_Operacion=$_POST["Tiempo_Operacion"];
	$Tiempo_Operacion=strip_tags($Tiempo_Operacion);
	$Tiempo_Operacion=intval($Tiempo_Operacion);
}else{
	$Tiempo_Operacion=null;
}

$_SESSION["Tiempo_Operacion"]=$Tiempo_Operacion;



if (isset($_POST["Transfusion"])){
	$Transfusiones=$_POST["Transfusion"];
	$Transfusiones=strip_tags($Transfusiones);
	$Transfusiones=intval($Transfusiones);
}else{
	$Transfusiones=null;
}

$_SESSION["Transfusiones"]=$Transfusiones;


if (isset($_POST["Tipo_Intencion"])){
	$Intencion_Operatoria=$_POST["Tipo_Intencion"];
	$Intencion_Operatoria=strip_tags($Intencion_Operatoria);
	$Intencion_Operatoria=intval($Intencion_Operatoria);
}else{
	$Intencion_Operatoria=null;
}

$_SESSION["Intencion_Operatoria"]=$Intencion_Operatoria;



if (isset($_POST["Tipo_Anastomosis"])){
	$Anastomosis=$_POST["Tipo_Anastomosis"];
	$Anastomosis=strip_tags($Anastomosis);
	$Anastomosis=intval($Anastomosis);
}else{
	$Anastomosis=null;
}

$_SESSION["Anastomosis"]=$Anastomosis;



if (isset($_POST["Tipo_Reservorio"])){
	$Reservorio=$_POST["Tipo_Reservorio"];
	$Reservorio=strip_tags($Reservorio);
	$Reservorio=intval($Reservorio);
}else{
	$Reservorio=null;
}

$_SESSION["Reservorio"]=$Reservorio;



if (isset($_POST["Radio_Tipo_Estoma"])){
	$Estoma_Derivacion=$_POST["Radio_Tipo_Estoma"];
	$Estoma_Derivacion=strip_tags($Estoma_Derivacion);
	$Estoma_Derivacion=intval($Estoma_Derivacion);
}else{
	$Estoma_Derivacion=null;
}

$_SESSION["Estoma_Derivacion"]=$Estoma_Derivacion;



if (isset($_POST["Tipo_Estoma"])){
	$Tipo_Estoma=$_POST["Tipo_Estoma"];
	$Tipo_Estoma=strip_tags($Tipo_Estoma);
	$Tipo_Estoma=intval($Tipo_Estoma);
}else{
	$Tipo_Estoma=null;
}

$_SESSION["Tipo_Estoma"]=$Tipo_Estoma;



if (isset($_POST["B_Complicaciones"])){
	$Complicaciones=$_POST["B_Complicaciones"];
	$Complicaciones=strip_tags($Complicaciones);
	$Complicaciones=intval($Complicaciones);
}else{
	$Complicaciones=null;
}

$_SESSION["Complicaciones"]=$Complicaciones;



if (isset($_POST["Reintervencion"])){
	$Reintervencion=$_POST["Reintervencion"];
	$Reintervencion=strip_tags($Reintervencion);
	$Reintervencion=intval($Reintervencion);
}else{
	$Reintervencion=null;
}

$_SESSION["Reintervencion"]=$Reintervencion;



if (isset($_POST["Texto_Reintervencion"])){
		
	$Tipo_Reintervencion=$_POST["Texto_Reintervencion"];
	$Tipo_Reintervencion=strip_tags($Tipo_Reintervencion);
	
	if($Tipo_Reintervencion==""){
		$Tipo_Reintervencion=null;
	}else{
		$Tipo_Reintervencion=utf8_decode($Tipo_Reintervencion);
	}
}else{
	$Tipo_Reintervencion=null;
}

$_SESSION["Tipo_Reintervencion"]=$Tipo_Reintervencion;


if (isset($_POST["Exitus_Intra"])){
	$Exitus_Intra=$_POST["Exitus_Intra"];
	$Exitus_Intra=strip_tags($Exitus_Intra);
	$Exitus_Intra=intval($Exitus_Intra);
	$_SESSION["Exitus_Intra"]=$Exitus_Intra;
	
}else{
	$Exitus_Intra=null;
}

$_SESSION["Exitus_Intra"]=$Exitus_Intra;



if (isset($_POST["Texto_Exitus_Intra"])){
	$Causa_Exitus_Intra=$_POST["Texto_Exitus_Intra"];
	$Causa_Exitus_Intra=strip_tags($Causa_Exitus_Intra);
	
	if($Causa_Exitus_Intra==""){
		$Causa_Exitus_Intra=null;
	}else{
		$Causa_Exitus_Intra=utf8_decode($Causa_Exitus_Intra);
	}	
}else{
	$Causa_Exitus_Intra=null;
}

$_SESSION["Causa_Exitus_Intra"]=$Causa_Exitus_Intra;


if (isset($_POST["Exitus_Post"])){
	$Exitus_Post=$_POST["Exitus_Post"];
	$Exitus_Post=strip_tags($Exitus_Post);
	$Exitus_Post=intval($Exitus_Post);
	$_SESSION["Exitus_Post"]=$Exitus_Post;
	
}else{
	$Exitus_Post=null;
}

$_SESSION["Exitus_Post"]=$Exitus_Post;


if (isset($_POST["Texto_Exitus_Post"])){
	$Causa_Exitus_Post=$_POST["Texto_Exitus_Post"];
	$Causa_Exitus_Post=strip_tags($Causa_Exitus_Post);
	if($Causa_Exitus_Post==""){
		$Causa_Exitus_Post=null;
	}else{
		$Causa_Exitus_Post=utf8_decode($Causa_Exitus_Post);
	}	
}else{
	$Causa_Exitus_Post=null;
}

$_SESSION["Causa_Exitus_Post"]=$Causa_Exitus_Post;



if (isset($_POST["Comp_Generales_Sepsis"])){
	$Generales_Sepsis=$_POST["Comp_Generales_Sepsis"];
	$Generales_Sepsis=strip_tags($Generales_Sepsis);
	$Generales_Sepsis=intval($Generales_Sepsis);
}else{
	$Generales_Sepsis=null;
}

$_SESSION["Generales_Sepsis"]=$Generales_Sepsis;


if (isset($_POST["Comp_Generales_Shock"])){
	$Generales_Shock=$_POST["Comp_Generales_Shock"];
	$Generales_Shock=strip_tags($Generales_Shock);
	$Generales_Shock=intval($Generales_Shock);
}else{
	$Generales_Shock=null;
}

$_SESSION["Generales_Shock"]=$Generales_Shock;


if (isset($_POST["Comp_Herida_Hemorragia"])){
	$Herida_Hemorragia=$_POST["Comp_Herida_Hemorragia"];
	$Herida_Hemorragia=strip_tags($Herida_Hemorragia);
	$Herida_Hemorragia=intval($Herida_Hemorragia);
}else{
	$Herida_Hemorragia=null;
}

$_SESSION["Herida_Hemorragia"]=$Herida_Hemorragia;



if (isset($_POST["Comp_Herida_Infeccion"])){
	$Herida_Infeccion=$_POST["Comp_Herida_Infeccion"];
	$Herida_Infeccion=strip_tags($Herida_Infeccion);
	$Herida_Infeccion=intval($Herida_Infeccion);
}else{
	$Herida_Infeccion=null;
}

$_SESSION["Herida_Infeccion"]=$Herida_Infeccion;



if (isset($_POST["Comp_Herida_Evisceracion"])){
	$Herida_Evisceracion=$_POST["Comp_Herida_Evisceracion"];
	$Herida_Evisceracion=strip_tags($Herida_Evisceracion);
	$Herida_Evisceracion=intval($Herida_Evisceracion);
}else{
	$Herida_Evisceracion=null;
}

$_SESSION["Herida_Evisceracion"]=$Herida_Evisceracion;



if (isset($_POST["Comp_Herida_Eventracion"])){
	$Herida_Eventracion=$_POST["Comp_Herida_Eventracion"];
	$Herida_Eventracion=strip_tags($Herida_Eventracion);
	$Herida_Eventracion=intval($Herida_Eventracion);
}else{
	$Herida_Eventracion=null;
}

$_SESSION["Herida_Eventracion"]=$Herida_Eventracion;



if (isset($_POST["Comp_Perine_Hernia"])){
	$Perine_Hernia=$_POST["Comp_Perine_Hernia"];
	$Perine_Hernia=strip_tags($Perine_Hernia);
	$Perine_Hernia=intval($Perine_Hernia);
}else{
	$Perine_Hernia=null;
}

$_SESSION["Perine_Hernia"]=$Perine_Hernia;



if (isset($_POST["Comp_Perine_Infeccion"])){
	$Perine_Infeccion=$_POST["Comp_Perine_Infeccion"];
	$Perine_Infeccion=strip_tags($Perine_Infeccion);
	$Perine_Infeccion=intval($Perine_Infeccion);
}else{
	$Perine_Infeccion=null;
}

$_SESSION["Perine_Infeccion"]=$Perine_Infeccion;



if (isset($_POST["Comp_Perine_Retraso"])){
	$Perine_Retraso_Cicatrizacion=$_POST["Comp_Perine_Retraso"];
	$Perine_Retraso_Cicatrizacion=strip_tags($Perine_Retraso_Cicatrizacion);
	$Perine_Retraso_Cicatrizacion=intval($Perine_Retraso_Cicatrizacion);
}else{
	$Perine_Retraso_Cicatrizacion=null;
}

$_SESSION["Perine_Retraso_Cicatrizacion"]=$Perine_Retraso_Cicatrizacion;



if (isset($_POST["Comp_Abdominales_Hemoperitoneo"])){
	$Abdominales_Hemoperitoneo=$_POST["Comp_Abdominales_Hemoperitoneo"];
	$Abdominales_Hemoperitoneo=strip_tags($Abdominales_Hemoperitoneo);
	$Abdominales_Hemoperitoneo=intval($Abdominales_Hemoperitoneo);
}else{
	$Abdominales_Hemoperitoneo=null;
}

$_SESSION["Abdominales_Hemoperitoneo"]=$Abdominales_Hemoperitoneo;



if (isset($_POST["Comp_Abdominales_Difusas"])){
	$Abdominales_Peri_Difusas=$_POST["Comp_Abdominales_Difusas"];
	$Abdominales_Peri_Difusas=strip_tags($Abdominales_Peri_Difusas);
	$Abdominales_Peri_Difusas=intval($Abdominales_Peri_Difusas);
}else{
	$Abdominales_Peri_Difusas=null;
}

$_SESSION["Abdominales_Peri_Difusas"]=$Abdominales_Peri_Difusas;



if (isset($_POST["Comp_Abdominales_Abcs"])){
	$Abdominales_Abceso_Abdominal=$_POST["Comp_Abdominales_Abcs"];
	$Abdominales_Abceso_Abdominal=strip_tags($Abdominales_Abceso_Abdominal);
	$Abdominales_Abceso_Abdominal=intval($Abdominales_Abceso_Abdominal);
}else{
	$Abdominales_Abceso_Abdominal=null;
}

$_SESSION["Abdominales_Abceso_Abdominal"]=$Abdominales_Abceso_Abdominal;

if (isset($_POST["Comp_Pelvico_Abcs"])){
	$Abdominales_Abceso_Pelvico=$_POST["Comp_Pelvico_Abcs"];
	$Abdominales_Abceso_Pelvico=strip_tags($Abdominales_Abceso_Pelvico);
	$Abdominales_Abceso_Pelvico=intval($Abdominales_Abceso_Pelvico);
}else{
	$Abdominales_Abceso_Pelvico=null;
}

echo $_SESSION["Abdominales_Abceso_Pelvico"]=$Abdominales_Abceso_Pelvico;



if (isset($_POST["Comp_Pelvico_Hemo"])){
	$Abdominales_Hemo_Pelvica=$_POST["Comp_Pelvico_Hemo"];
	$Abdominales_Hemo_Pelvica=strip_tags($Abdominales_Hemo_Pelvica);
	$Abdominales_Hemo_Pelvica=intval($Abdominales_Hemo_Pelvica);
}else{
	$Abdominales_Hemo_Pelvica=null;
}

$_SESSION["Abdominales_Hemo_Pelvica"]=$Abdominales_Hemo_Pelvica;




if (isset($_POST["Comp_Abdominales_Isquemia"])){
	$Abdominales_Isquemia_Intestinal=$_POST["Comp_Abdominales_Isquemia"];
	$Abdominales_Isquemia_Intestinal=strip_tags($Abdominales_Isquemia_Intestinal);
	$Abdominales_Isquemia_Intestinal=intval($Abdominales_Isquemia_Intestinal);
}else{
	$Abdominales_Isquemia_Intestinal=null;
}

$_SESSION["Abdominales_Isquemia_Intestinal"]=$Abdominales_Isquemia_Intestinal;



if (isset($_POST["Comp_Abdominales_Colecistitis"])){
	$Abdominales_Colecistitis=$_POST["Comp_Abdominales_Colecistitis"];
	$Abdominales_Colecistitis=strip_tags($Abdominales_Colecistitis);
	$Abdominales_Colecistitis=intval($Abdominales_Colecistitis);
}else{
	$Abdominales_Colecistitis=null;
}

$_SESSION["Abdominales_Colecistitis"]=$Abdominales_Colecistitis;



if (isset($_POST["Comp_Abdominales_Iatrog"])){
	$Abdominales_Iatrog_Vias_Urinarias=$_POST["Comp_Abdominales_Iatrog"];
	$Abdominales_Iatrog_Vias_Urinarias=strip_tags($Abdominales_Iatrog_Vias_Urinarias);
	$Abdominales_Iatrog_Vias_Urinarias=intval($Abdominales_Iatrog_Vias_Urinarias);
}else{
	$Abdominales_Iatrog_Vias_Urinarias=null;
}

$_SESSION["Abdominales_Iatrog_Vias_Urinarias"]=$Abdominales_Iatrog_Vias_Urinarias;




if (isset($_POST["Comp_Abdominales_Iatrog_Vias_Huecas"])){
	$Abdominales_Iatrog_Vias_Huecas=$_POST["Comp_Abdominales_Iatrog_Vias_Huecas"];
	$Abdominales_Iatrog_Vias_Huecas=strip_tags($Abdominales_Iatrog_Vias_Huecas);
	$Abdominales_Iatrog_Vias_Huecas=intval($Abdominales_Iatrog_Vias_Huecas);
}else{
	$Abdominales_Iatrog_Vias_Huecas=null;
}

$_SESSION["Abdominales_Iatrog_Vias_Huecas"]=$Abdominales_Iatrog_Vias_Huecas;



if (isset($_POST["Comp_Abdominales_Ileo"])){
	$Abdominales_Ileo_Paralitico_Prolongado=$_POST["Comp_Abdominales_Ileo"];
	$Abdominales_Ileo_Paralitico_Prolongado=strip_tags($Abdominales_Ileo_Paralitico_Prolongado);
	$Abdominales_Ileo_Paralitico_Prolongado=intval($Abdominales_Ileo_Paralitico_Prolongado);
}else{
	$Abdominales_Ileo_Paralitico_Prolongado=null;
}

$_SESSION["Abdominales_Ileo_Paralitico_Prolongado"]=$Abdominales_Ileo_Paralitico_Prolongado;




if (isset($_POST["Comp_Abdominales_Ileo_Mecanico"])){
	$Abdominales_Ileo_Mecanico=$_POST["Comp_Abdominales_Ileo_Mecanico"];
	$Abdominales_Ileo_Mecanico=strip_tags($Abdominales_Ileo_Mecanico);
	$Abdominales_Ileo_Mecanico=intval($Abdominales_Ileo_Mecanico);
}else{
	$Abdominales_Ileo_Mecanico=null;
}

$_SESSION["Abdominales_Ileo_Mecanico"]=$Abdominales_Ileo_Mecanico;


if (isset($_POST["Comp_Abdominales_Estoma"])){
	$Abdominales_Estoma=$_POST["Comp_Abdominales_Estoma"];
	$Abdominales_Estoma=strip_tags($Abdominales_Estoma);
	$Abdominales_Estoma=intval($Abdominales_Estoma);
}else{
	$Abdominales_Estoma=null;
}

$_SESSION["Abdominales_Estoma"]=$Abdominales_Estoma;


if (isset($_POST["Comp_Anastomosis_Hemorragia"])){
	$Anastomosis_Hemorragia=$_POST["Comp_Anastomosis_Hemorragia"];
	$Anastomosis_Hemorragia=strip_tags($Anastomosis_Hemorragia);
	$Anastomosis_Hemorragia=intval($Anastomosis_Hemorragia);
}else{
	$Anastomosis_Hemorragia=null;
}

$_SESSION["Anastomosis_Hemorragia"]=$Anastomosis_Hemorragia;



if (isset($_POST["Comp_Anastomosis_Fuga"])){
	$Anastomosis_Fuga=$_POST["Comp_Anastomosis_Fuga"];
	$Anastomosis_Fuga=strip_tags($Anastomosis_Fuga);
	$Anastomosis_Fuga=intval($Anastomosis_Fuga);
}else{
	$Anastomosis_Fuga=null;
}

$_SESSION["Anastomosis_Fuga"]=$Anastomosis_Fuga;



if (isset($_POST["Comp_Anastomosis_Fistula"])){
	$Anastomosis_Fistula=$_POST["Comp_Anastomosis_Fistula"];
	$Anastomosis_Fistula=strip_tags($Anastomosis_Fistula);
	$Anastomosis_Fistula=intval($Anastomosis_Fistula);
}else{
	$Anastomosis_Fistula=null;
}

$_SESSION["Anastomosis_Fistula"]=$Anastomosis_Fistula;





if (isset($_POST["Comp_Otras_Hemo_Diges"])){
	$Otras_Hemo_Diges=$_POST["Comp_Otras_Hemo_Diges"];
	$Otras_Hemo_Diges=strip_tags($Otras_Hemo_Diges);
	$Otras_Hemo_Diges=intval($Otras_Hemo_Diges);
}else{
	$Otras_Hemo_Diges=null;
}

$_SESSION["Otras_Hemo_Diges"]=$Otras_Hemo_Diges;



if (isset($_POST["Comp_Otras_Inf_Urinaria"])){
	$Otras_Infeccion_Urinaria=$_POST["Comp_Otras_Inf_Urinaria"];
	$Otras_Infeccion_Urinaria=strip_tags($Otras_Infeccion_Urinaria);
	$Otras_Infeccion_Urinaria=intval($Otras_Infeccion_Urinaria);
}else{
	$Otras_Infeccion_Urinaria=null;
}

$_SESSION["Otras_Infeccion_Urinaria"]=$Otras_Infeccion_Urinaria;



if (isset($_POST["Comp_Otras_Cardiovascular"])){
	$Otras_Cardiovascular=$_POST["Comp_Otras_Cardiovascular"];
	$Otras_Cardiovascular=strip_tags($Otras_Cardiovascular);
	$Otras_Cardiovascular=intval($Otras_Cardiovascular);
}else{
	$Otras_Cardiovascular=null;
}

$_SESSION["Otras_Cardiovascular"]=$Otras_Cardiovascular;



if (isset($_POST["Comp_Otras_Vascular_Mec"])){
	$Otras_Vascular_Mec=$_POST["Comp_Otras_Vascular_Mec"];
	$Otras_Vascular_Mec=strip_tags($Otras_Vascular_Mec);
	$Otras_Vascular_Mec=intval($Otras_Vascular_Mec);
}else{
	$Otras_Vascular_Mec=null;
}

$_SESSION["Otras_Vascular_Mec"]=$Otras_Vascular_Mec;




if (isset($_POST["Comp_Otras_Vascular_Infecc"])){
	$Otras_Vascular_Infecc=$_POST["Comp_Otras_Vascular_Infecc"];
	$Otras_Vascular_Infecc=strip_tags($Otras_Vascular_Infecc);
	$Otras_Vascular_Infecc=intval($Otras_Vascular_Infecc);
}else{
	$Otras_Vascular_Infecc=null;
}

$_SESSION["Otras_Vascular_Infecc"]=$Otras_Vascular_Infecc;




if (isset($_POST["Comp_Otras_Renal"])){
	$Otras_Renal=$_POST["Comp_Otras_Renal"];
	$Otras_Renal=strip_tags($Otras_Renal);
	$Otras_Renal=intval($Otras_Renal);
}else{
	$Otras_Renal=null;
}

$_SESSION["Otras_Renal"]=$Otras_Renal;





if (isset($_POST["Comp_Otras_Hepatica"])){
	$Otras_Hepatica=$_POST["Comp_Otras_Hepatica"];
	$Otras_Hepatica=strip_tags($Otras_Hepatica);
	$Otras_Hepatica=intval($Otras_Hepatica);
}else{
	$Otras_Hepatica=null;
}

$_SESSION["Otras_Hepatica"]=$Otras_Hepatica;



if (isset($_POST["Comp_Otras_Respiratoria"])){
	$Otras_Respiratoria=$_POST["Comp_Otras_Respiratoria"];
	$Otras_Respiratoria=strip_tags($Otras_Respiratoria);
	$Otras_Respiratoria=intval($Otras_Respiratoria);
}else{
	$Otras_Respiratoria=null;
}

$_SESSION["Otras_Respiratoria"]=$Otras_Respiratoria;



if (isset($_POST["Comp_Otras_Respiratoria_Infecc"])){
	$Otras_Respiratoria_Infecc=$_POST["Comp_Otras_Respiratoria_Infecc"];
	$Otras_Respiratoria_Infecc=strip_tags($Otras_Respiratoria_Infecc);
	$Otras_Respiratoria_Infecc=intval($Otras_Respiratoria_Infecc);
}else{
	$Otras_Respiratoria_Infecc=null;
}

$_SESSION["Otras_Respiratoria_Infecc"]=$Otras_Respiratoria_Infecc;



if (isset($_POST["Comp_Otras_FMO"])){
	$Otras_FMO=$_POST["Comp_Otras_FMO"];
	$Otras_FMO=strip_tags($Otras_FMO);
	$Otras_FMO=intval($Otras_FMO);
}else{
	$Otras_FMO=null;
}

$_SESSION["Otras_FMO"]=$Otras_FMO;



if (isset($_POST["Comp_Otras_TEP"])){
	$Otras_TEP=$_POST["Comp_Otras_TEP"];
	$Otras_TEP=strip_tags($Otras_TEP);
	$Otras_TEP=intval($Otras_TEP);
}else{
	$Otras_TEP=null;
}

$_SESSION["Otras_TEP"]=$Otras_TEP;



if (isset($_POST["Comp_Otras_Neuroapraxia"])){
	$Otras_Neuroapraxia=$_POST["Comp_Otras_Neuroapraxia"];
	$Otras_Neuroapraxia=strip_tags($Otras_Neuroapraxia);
	$Otras_Neuroapraxia=intval($Otras_Neuroapraxia);
}else{
	$Otras_Neuroapraxia=null;
}

$_SESSION["Otras_Neuroapraxia"]=$Otras_Neuroapraxia;

if (isset($_POST["Comp_Otras_Urologicas"])){
	$Otras_Urologicas=$_POST["Comp_Otras_Urologicas"];
	$Otras_Urologicas=strip_tags($Otras_Urologicas);
	$Otras_Urologicas=intval($Otras_Urologicas);
}else{
	$Otras_Urologicas=null;
}

$_SESSION["Comp_Otras_Urologicas"]=$Otras_Urologicas;


if (isset($_POST["rellenarAlta"])){
	$_SESSION["Fecha_Alta_Pendiente"]=$_POST["rellenarAlta"];
}else{
    $_SESSION["Fecha_Alta_Pendiente"]=null;
}




//Mesorrecto
if($_SESSION["Tecnicas_Cirugia"] == 1 || $_SESSION["Tecnicas_Cirugia"] == 7 || $_SESSION["Tecnicas_Cirugia"] == 8)// || $_SESSION["Tecnicas_Cirugia"] == 5 || $_SESSION["Tecnicas_Cirugia"] == 6) 
{
	$_SESSION["Exeresis_Meso"] = 3;
}
elseif($_SESSION["Tecnicas_Cirugia"] == 4 || $_SESSION["Tecnicas_Cirugia"] == 9 || $_SESSION["Tecnicas_Cirugia"] == 10)
{
	$_SESSION["Exeresis_Meso"] = 2;
}
elseif ($_SESSION["Localizacion"]<=10 && ($_SESSION["Tecnicas_Cirugia"] == 2 || $_SESSION["Tecnicas_Cirugia"] == 3))
{
	$_SESSION["Exeresis_Meso"] = 2;
}



//Anatomosis
if($_SESSION["Tecnicas_Cirugia"] == 1 || $_SESSION["Tecnicas_Cirugia"] == 4 || $_SESSION["Tecnicas_Cirugia"] == 6 || $_SESSION["Tecnicas_Cirugia"] == 7 || $_SESSION["Tecnicas_Cirugia"] == 8 || $_SESSION["Tecnicas_Cirugia"] == 10) 
{
	$_SESSION["Anastomosis"] = 1;
}


//Reservorio
if($_SESSION["Tecnicas_Cirugia"] == 4 || $_SESSION["Tecnicas_Cirugia"] == 6 || $_SESSION["Tecnicas_Cirugia"] == 10)
{
	$_SESSION["Reservorio"] = 1;
	$_SESSION["Estoma_Derivacion"]=2;
}





mysqli_close($conexion);


if ($_SESSION["Tecnicas_Cirugia"] == 7 || $_SESSION["Tecnicas_Cirugia"] == 8 || $_SESSION["B_Cirugia"] == 2 || $_SESSION["tipo_no_neo"] == 3)
{
    $_SESSION["No_Patologica"] = 1;
    header("Location: ../Patologica/Salto_Patologica.php");
    
}
else
{
    header("Location: ../Patologica/Patologica.php");
}








?>