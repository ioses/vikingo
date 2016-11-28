<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");


//Variable que se usa para pasar por seguimiento, recidiva y metastasis y crear el total

$_SESSION["Total"]=1;


header("Location: ../Metastasis/CalculaMetastasis.php");	
