<?php
//Carga de las variables para modificar los datos de un paciente existente
session_start();

//Fill de array
$a=array(
    "NHC"=>$_SESSION["NHC"],
    "Fecha_Nacimiento"=>$_SESSION["Fecha_Nacimiento"],
    "Sexo"=>$_SESSION["Sexo"],
    "Localizacion"=>$_SESSION["Localizacion"],
    "Sincro"=>$_SESSION["Sincro"],
    "SincroColonDerecho"=>$_SESSION["SincroColonDerecho"],
    "SincroColonIzquierdo"=>$_SESSION["SincroColonIzquierdo"],
    "SincroColonTransverso"=>$_SESSION["SincroColonTransverso"],
    "SincroColonSigma"=>$_SESSION["SincroColonSigma"],
    "Estadio_Radio"=>$_SESSION["Estadio_Radio"],
    "ECO"=>$_SESSION["ECO"],
    "ECO_T"=>$_SESSION["ECO_T"],
    "ECO_N"=>$_SESSION["ECO_N"],
    "TAC"=>$_SESSION["TAC"],
    "RMN"=>$_SESSION["RMN"],
    "RMN_T"=>$_SESSION["RMN_T"],
    "RMN_N"=>$_SESSION["RMN_N"],
    "Dist_Tumor"=>$_SESSION["Dist_Tumor"],
    "Dist_Adeno"=>$_SESSION["Dist_Adeno"],
    "Integ_Esfinter"=>$_SESSION["Integ_Esfinter"],
    "Inv_Vecinos"=>$_SESSION["Inv_Vecinos"],
    "MetastInicial"=>$_SESSION["MetastInicial"],
    "Metast_Hepaticas"=>$_SESSION["Metast_Hepaticas"],
    "Metast_Oseas"=>$_SESSION["Metast_Oseas"],
    "Metast_Pulmonares"=>$_SESSION["Metast_Pulmonares"],
    "Metast_Nervioso"=>$_SESSION["Metast_Nervioso"],
    "Inv_Vecinos"=>$_SESSION["Inv_Vecinos"],
    "Inv_Utero"=>$_SESSION["Inv_Utero"],
    "Inv_Prostata"=>$_SESSION["Inv_Prostata"],
    "Inv_Vejiga"=>$_SESSION["Inv_Vejiga"],
    "Inv_Ureter"=>$_SESSION["Inv_Ureter"],
    "Inv_Vagina"=>$_SESSION["Inv_Vagina"],
    "Inv_Seminal"=>$_SESSION["Inv_Seminal"],
    "Inv_Sacro"=>$_SESSION["Inv_Sacro"]

    );


//output the response
echo json_encode($a);
?>