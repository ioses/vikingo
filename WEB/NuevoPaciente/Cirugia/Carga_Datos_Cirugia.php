<?php

//CARGA DE DATOS HOJA CIRUGIA

//Motivos no cirugía

$Motivos_No_Cirugia="SELECT * FROM tabla_motivos_no_cirugia";

//Técnicas cirugia

$Tecnicas_Cirugia_Menor="SELECT * FROM tabla_tecnicas WHERE ID <> 2";

$Tecnicas_Cirugia_Mayor="SELECT * FROM tabla_tecnicas WHERE ID <> 3";

//Otras técnicas cirugia

$Otras_Tecnicas="SELECT * FROM tabla_tipo_otras_tecnicas";

//Exeresis del mesorrecto

$Tipo_Exeresis_Mesorrecto="SELECT * FROM tabla_exeresis_meso";

//Otras resecciones viscerales

$Tipo_Otras_Resecciones="SELECT * FROM tabla_tipo_otras_resecciones";


//CARACTERÍSTICAS DE LA CIRUGIA

//Tipo ASA

$Tipo_ASA="SELECT * FROM tabla_tipo_asa";

//Hallazgos intraoperatorios

$Tipo_Hallazgos="SELECT * FROM tabla_tipo_hallazgos_intra";


//Metástasis hepáticas

$Tipo_Metastasis_Hepaticas="SELECT * FROM tabla_metast_hepaticas";

//Via operacion

$Tipo_Via="SELECT * FROM tabla_tipo_via_operacion";

//Tipo de intención de la cirugía

$Tipo_Intencion="SELECT * FROM tabla_tipo_intencion";

//Tipos de anastomosis

$Tipo_Anastomosis="SELECT * FROM tabla_tipo_anastomosis";

// Tipo de reservorio

$Tipo_Reservorio="SELECT * FROM tabla_tipo_reservorio";

//Tipo de estoma de derivación

$Tipo_Estoma_1="SELECT * FROM tabla_tipo_estoma_derivacion";



//COMPLICACIONES EN CIRUGIA

//Tipos de reintervención en las complicaciones de cirugía

$Tipo_Reintervencion_Complicaciones="SELECT * FROM tabla_tipo_reintervencion";

// Campo de texto de exitus intraoperatorio

$Tipo_Exitus_Intra_Complicaciones="SELECT * FROM tabla_tipo_exitus_intraop";

//Campo de texto de exitus postoperatorio

$Tipo_Exitus_Post_Complicaciones="SELECT * FROM tabla_tipo_exitus_postop";

//Tipo de herida en complicaciones

$Tipo_Herida_Complicaciones="SELECT * FROM tabla_tipo_herida";

//Tipo de complicaciones de periné

$Tipo_Perine_Complicaciones="SELECT * FROM tabla_tipo_perine";

//Complicaciones en abdominales

$Tipo_Abdominales_Complicaciones="SELECT * FROM tabla_tipo_abdominales";

//Complicaciones de anstomosis

$Tipo_Anastomosis_Complicaciones="SELECT * FROM tabla_tipo_anastomosis_complicaciones";

// Otros tipos de complicaciones

$Tipo_Otras_Complicaciones="SELECT * FROM tabla_tipo_otras_complicaciones";






?>