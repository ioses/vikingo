<?php
//Introducimos los datos en las variables de sesión
session_start();

require_once ("../../BDD/conexion.php");


//Variable para ver si es la primera vez que se carga la página

$Enviar_Inicial="Enviar";
$_SESSION["ButtonEnviarInicial"]=$Enviar_Inicial;


$NHC=$_POST["NHC"];
echo $NHC;
echo "<br>";
$NHC=strip_tags($NHC);

echo $NHC;
echo "<br>";

$NHC=strval($NHC);

echo $NHC;
echo "<br>";


//Variable global SE INTRODUCE EN SESSION
$_SESSION["NHC"]=$NHC;

echo $_SESSION["NHC"];

$Fecha_Nacimiento=$_POST["Nacimiento"];
$Fecha_Nacimiento=strip_tags($Fecha_Nacimiento);
$_SESSION["Fecha_Nacimiento"]=$Fecha_Nacimiento;

$Sexo=$_POST["Radio_Sexo"];
$Sexo=strip_tags($Sexo);
$Sexo=intval($Sexo);

//Variable global SE INTRODUCE EN SESSION

$_SESSION["Sexo"]=$Sexo;

$Localizacion=$_POST["Localizacion"];
$Localizacion=strip_tags($Localizacion);
$Localizacion=intval($Localizacion);

//Variable global SE INTRODUCE EN SESSION

$_SESSION["Localizacion"]=$Localizacion;

$Sincro=$_POST["B_Sincro"];
$Sincro=strip_tags($Sincro);
$Sincro=intval($Sincro);

//Variable global SE INTRODUCE EN SESSION

$_SESSION["Sincro"]=$Sincro;


if (isset($_POST["Colon_Derecho"])){
	$SincroColonDerecho=$_POST["Colon_Derecho"];
	$SincroColonDerecho=strip_tags($SincroColonDerecho);
	$SincroColonDerecho=intval($SincroColonDerecho);	
	$_SESSION["SincroColonDerecho"]=$SincroColonDerecho;
}else{
	$SincroColonDerecho=null;
	$_SESSION["SincroColonDerecho"]=$SincroColonDerecho;
}



if (isset($_POST["Colon_Izquierdo"])){
	$SincroColonIzquierdo=$_POST["Colon_Izquierdo"];
	$SincroColonIzquierdo=strip_tags($SincroColonIzquierdo);	
	$SincroColonIzquierdo=intval($SincroColonIzquierdo);
	$_SESSION["SincroColonIzquierdo"]=$SincroColonIzquierdo;
}else{
	$SincroColonIzquierdo=null;
	$_SESSION["SincroColonIzquierdo"]=$SincroColonIzquierdo;
}




if (isset($_POST["Colon_transverso"])){
	$SincroColonTransverso=$_POST["Colon_transverso"];
	$SincroColonTransverso=strip_tags($SincroColonTransverso);	
	$SincroColonTransverso=intval($SincroColonTransverso);
	$_SESSION["SincroColonTransverso"]=$SincroColonTransverso;
}else{
	$SincroColonTransverso=null;
	$_SESSION["SincroColonTransverso"]=$SincroColonTransverso;
}


if (isset($_POST["Colon_Sigma"])){
	$SincroColonSigma=$_POST["Colon_Sigma"];
	$SincroColonSigma=strip_tags($SincroColonSigma);	
	$SincroColonSigma=intval($SincroColonSigma);
	$_SESSION["SincroColonSigma"]=$SincroColonSigma;
}else{
	$SincroColonSigma=null;
	$_SESSION["SincroColonSigma"]=$SincroColonSigma;
}

if (isset($_POST["B_Tec_ECO"])){
	$ECO=$_POST["B_Tec_ECO"];
	$ECO=strip_tags($ECO);
	$ECO=intval($ECO);
	$_SESSION["ECO"]=$ECO;
}


if (isset($_POST["ECO_Tipo_T"])){
	$ECO_T=$_POST["ECO_Tipo_T"];
	$ECO_T=strip_tags($ECO_T);
	$ECO_T=intval($ECO_T);
	$_SESSION["ECO_T"]=$ECO_T;
}else{
	$ECO_T=null;
	$_SESSION["ECO_T"]=$ECO_T;
}


if (isset($_POST["ECO_Tipo_N"])){
	$ECO_N=$_POST["ECO_Tipo_N"];
	$ECO_N=strip_tags($ECO_N);
	$ECO_N=intval($ECO_N);
	$_SESSION["ECO_N"]=$ECO_N;
}else{
	$ECO_N=null;
	$_SESSION["ECO_N"]=$ECO_N;
}


if (isset($_POST["B_TAC"])){
	$TAC=$_POST["B_TAC"];
	$TAC=strip_tags($TAC);
	$TAC=intval($TAC);
	$_SESSION["TAC"]=$TAC;
}



if (isset($_POST["B_Tec_RNM"])){
	$RMN=$_POST["B_Tec_RNM"];
	$RMN=strip_tags($RMN);
	$RMN=intval($RMN);
	$_SESSION["RMN"]=$RMN;
}

if (isset($_POST["RNM_Tipo_T"])){
	$RMN_T=$_POST["RNM_Tipo_T"];
	$RMN_T=strip_tags($RMN_T);
	$RMN_T=intval($RMN_T);
	$_SESSION["RMN_T"]=$RMN_T;
}else{
	$RMN_T=null;
	$_SESSION["RMN_T"]=$RMN_T;
}

if (isset($_POST["RNM_Tipo_N"])){
	$RMN_N=$_POST["RNM_Tipo_N"];
	$RMN_N=strip_tags($RMN_N);
	$RMN_N=intval($RMN_N);
	$_SESSION["RMN_N"]=$RMN_N;
}else{
	$RMN_N=null;
	$_SESSION["RMN_N"]=$RMN_N;
}

if (isset($_POST["Dist_Tumor"])){
	$Dist_Tumor=$_POST["Dist_Tumor"];
	$Dist_Tumor=strip_tags($Dist_Tumor);
	$Dist_Tumor=intval($Dist_Tumor);
	$_SESSION["Dist_Tumor"]=$Dist_Tumor;
}else{
	$Dist_Tumor=-1;
	$_SESSION["Dist_Tumor"]=$Dist_Tumor;
}


if (isset($_POST["Dist_Adeno"])){
	$Dist_Adeno=$_POST["Dist_Adeno"];
	$Dist_Adeno=strip_tags($Dist_Adeno);
	$Dist_Adeno=intval($Dist_Adeno);
	$_SESSION["Dist_Adeno"]=$Dist_Adeno;
}else{
	$Dist_Adeno=-1;
	$_SESSION["Dist_Adeno"]=$Dist_Adeno;
}


if (isset($_POST["Id_Estadio_Radio"])){
	$Estadio_Radio=$_POST["Id_Estadio_Radio"];
	$Estadio_Radio=strip_tags($Estadio_Radio);
	$Estadio_Radio=intval($Estadio_Radio);
	$_SESSION["Estadio_Radio"]=$Estadio_Radio;
	if($Estadio_Radio==0){
	$Estadio_Radio=6;
	$Estadio_Radio=intval($Estadio_Radio);
	$_SESSION["Estadio_Radio"]=$Estadio_Radio;
	}	
}
else {
    $Estadio_Radio=5;
	$_SESSION["Estadio_Radio"]=$Estadio_Radio;
}


$Integ_Esfinter=$_POST["Id_Integ_Esfint"];
$Integ_Esfinter=strip_tags($Integ_Esfinter);
$Integ_Esfinter=intval($Integ_Esfinter);
$_SESSION["Integ_Esfinter"]=$Integ_Esfinter;


if (isset($_POST["Metast"])){
	$Metast_Inicial=$_POST["Metast"];
	$Metast_Inicial=strip_tags($Metast_Inicial);
	$Metast_Inicial=intval($Metast_Inicial);
}

$_SESSION["MetastInicial"]=$Metast_Inicial;


if (isset($_POST["Metast_Hepaticas"])){
	$Metast_Hepaticas=$_POST["Metast_Hepaticas"];
	$Metast_Hepaticas=strip_tags($Metast_Hepaticas);
	$Metast_Hepaticas=intval($Metast_Hepaticas);
	$_SESSION["Metast_Hepaticas"]=$Metast_Hepaticas;	
}else{
	$Metast_Hepaticas=null;
	$_SESSION["Metast_Hepaticas"]=$Metast_Hepaticas;
}

if (isset($_POST["Metast_Oseas"])){
	$Metast_Oseas=$_POST["Metast_Oseas"];
	$Metast_Oseas=strip_tags($Metast_Oseas);
	$Metast_Oseas=intval($Metast_Oseas);
	$_SESSION["Metast_Oseas"]=$Metast_Oseas;
}else{
	$Metast_Oseas=null;
	$_SESSION["Metast_Oseas"]=$Metast_Oseas;
}

if (isset($_POST["Metast_Pulmonares"])){
	$Metast_Pulmonares=$_POST["Metast_Pulmonares"];
	$Metast_Pulmonares=strip_tags($Metast_Pulmonares);
	$Metast_Pulmonares=intval($Metast_Pulmonares);
	$_SESSION["Metast_Pulmonares"]=$Metast_Pulmonares;
}else{
	$Metast_Pulmonares=null;
	$_SESSION["Metast_Pulmonares"]=$Metast_Pulmonares;
}


if (isset($_POST["Metast_Nervioso"])){
	$Metast_Nervioso=$_POST["Metast_Nervioso"];
	$Metast_Nervioso=strip_tags($Metast_Nervioso);
	$Metast_Nervioso=intval($Metast_Nervioso);
	$_SESSION["Metast_Nervioso"]=$Metast_Nervioso;
}else{
	$Metast_Nervioso=null;
	$_SESSION["Metast_Nervioso"]=$Metast_Nervioso;
}


if(isset($_POST["B_Inv_Vecinos"])){
	$Inv_Vecinos=$_POST["B_Inv_Vecinos"];
	$Inv_Vecinos=strip_tags($Inv_Vecinos);
	$Inv_Vecinos=intval($Inv_Vecinos);
	$_SESSION["Inv_Vecinos"]=$Inv_Vecinos;
}



if (isset($_POST["Inv_Utero"])){
	$Inv_Utero=$_POST["Inv_Utero"];
	$Inv_Utero=strip_tags($Inv_Utero);
	$Inv_Utero=intval($Inv_Utero);
	$_SESSION["Inv_Utero"]=$Inv_Utero;
}else{
	$Inv_Utero=null;
	$_SESSION["Inv_Utero"]=$Inv_Utero;
}

if (isset($_POST["Inv_Prostata"])){
	$Inv_Prostata=$_POST["Inv_Prostata"];
	$Inv_Prostata=strip_tags($Inv_Prostata);
	$Inv_Prostata=intval($Inv_Prostata);
	$_SESSION["Inv_Prostata"]=$Inv_Prostata;
}else{
	$Inv_Prostata=null;
	$_SESSION["Inv_Prostata"]=$Inv_Prostata;
}


if (isset($_POST["Inv_Vejiga"])){
	$Inv_Vejiga=$_POST["Inv_Vejiga"];
	$Inv_Vejiga=strip_tags($Inv_Vejiga);
	$Inv_Vejiga=intval($Inv_Vejiga);
	$_SESSION["Inv_Vejiga"]=$Inv_Vejiga;
}else{
	$Inv_Vejiga=null;
	$_SESSION["Inv_Vejiga"]=$Inv_Vejiga;
}


if (isset($_POST["Inv_Ureteres"])){
	$Inv_Ureter=$_POST["Inv_Ureteres"];
	$Inv_Ureter=strip_tags($Inv_Ureter);
	$Inv_Ureter=intval($Inv_Ureter);
	$_SESSION["Inv_Ureter"]=$Inv_Ureter;
}else{
	$Inv_Ureter=null;
	$_SESSION["Inv_Ureter"]=$Inv_Ureter;
}


if (isset($_POST["Inv_Vagina"])){
	$Inv_Vagina=$_POST["Inv_Vagina"];
	$Inv_Vagina=strip_tags($Inv_Vagina);
	$Inv_Vagina=intval($Inv_Vagina);
	$_SESSION["Inv_Vagina"]=$Inv_Vagina;
}else{
	$Inv_Vagina=null;
	$_SESSION["Inv_Vagina"]=$Inv_Vagina;
}


if (isset($_POST["Inv_Seminales"])){
	$Inv_Seminal=$_POST["Inv_Seminales"];
	$Inv_Seminal=strip_tags($Inv_Seminal);
	$Inv_Seminal=intval($Inv_Seminal);
	$_SESSION["Inv_Seminal"]=$Inv_Seminal;
}else{
	$Inv_Seminal=null;
	$_SESSION["Inv_Seminal"]=$Inv_Seminal;
}


if (isset($_POST["Inv_Sacro"])){
	$Inv_Sacro=$_POST["Inv_Sacro"];
	$Inv_Sacro=strip_tags($Inv_Sacro);
	$Inv_Sacro=intval($Inv_Sacro);
	$_SESSION["Inv_Sacro"]=$Inv_Sacro;
}else{
	$Inv_Sacro=null;
	$_SESSION["Inv_Sacro"]=$Inv_Sacro;	
}

mysqli_close($conexion);			



//Para trabajar de momento se deshabilitara
header("Location: ../Tratamiento/Tratamiento.php");
?>