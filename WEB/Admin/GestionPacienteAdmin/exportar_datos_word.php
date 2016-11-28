<?php
    session_start();
    require_once ('../../BDD/conexion.php');  
    

$fecha = date("d-m-Y"); 

header('Content-type: application/vnd.ms-word'); 
header("Content-Disposition: attachment; filename=paciente_$fecha.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

require_once ('getDatosPaciente.php');



?>