<?php
//Carga de las variables para modificar los datos de un paciente existente

session_start();

//Comprobamos si los inputs están coidificados o no (si viene de modificar están ya codificados)
if(!mb_check_encoding($_SESSION["Otros_Histologico"], 'UTF-8')) 
	$_SESSION["Otros_Histologico"] = utf8_encode($_SESSION["Otros_Histologico"]); 
	

//Fill de array
$a=array(
    "Patologica_Pendiente"=>$_SESSION["Patologica_Pendiente"],
    "No_Patologica"=>$_SESSION["No_Patologica"],
    "Tipo_Histologico"=>$_SESSION["Tipo_Histologico"],
    "Otros_Histologico"=>$_SESSION["Otros_Histologico"],
    "T_Patologico"=>$_SESSION["T_Patologico"],
    "N_Patologico"=>$_SESSION["N_Patologico"],
    "M_Patologico"=>$_SESSION["M_Patologico"],
    "Ganglios_Aislados"=>$_SESSION["Ganglios_Aislados"],
    "Ganglios_Afectados"=>$_SESSION["Ganglios_Afectados"],
    "Margen_Distal"=>$_SESSION["Margen_Distal"],
    "Margen_Circunferencial"=>$_SESSION["Margen_Circunferencial"],
    "Tipo_Reseccion"=>$_SESSION["Tipo_Res"],
    "Tipo_Regresion"=>$_SESSION["Tipo_Regresion"],
    "Estadio_Tumor_Sincronico"=>$_SESSION["Estadio_Tumor_Sincronico"],
    "Calidad_Mesorrecto"=>$_SESSION["Calidad_Mesorrecto"]
    );


//output the response
echo json_encode($a);
?>