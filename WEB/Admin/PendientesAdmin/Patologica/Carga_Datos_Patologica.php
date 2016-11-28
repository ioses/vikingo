<?php
//Carga de datos de la hoja de patología

//HISTOLOGIA

//Tipo histologico

$Tipo_Histologico="SELECT * FROM tabla_tipo_histologico";

//Otro tipo histologico

$Otros_Histologico="SELECT * FROM tabla_tipo_otros_histologico";

//T de clasificacion TNM

$Tipo_T="SELECT * FROM tabla_tipo_t";

//N de clasificacion TNM

$Tipo_N="SELECT * FROM tabla_tipo_n";

//M de clasificación TNM

$Tipo_M="SELECT * FROM  tabla_tipo_m";

//Estadio patologico

$Estadio_Patologico="SELECT * FROM tabla_estadio_tumor";


//MÁRGENES DE RESECCION

//Márgenes (distal y circunferencial)

$Tipo_Margen="SELECT * FROM tabla_margen";

//Grado de regresión

$Tipo_Regresion="SELECT * FROM tabla_tipo_regresion";

//Estadio tumor sincronico

$Estadio_sincronico="SELECT * FROM tabla_estadio_tumor";

// Calidad del mesorrecto

$Tipo_Calidad_Mesorrecto="SELECT * FROM tabla_tipo_calidad_meso";

//Tipo de resección

$Tipo_Reseccion="SELECT * FROM tabla_tipo_reseccion";


?>