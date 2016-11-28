<?php
session_start();

//Fill de array
$a=array(
    "B_Tto_Neo"=>$_SESSION["B_Tto_Neo"],
    "Tipo_TTO_Neoadyuvante"=>$_SESSION["Tipo_TTO_Neoadyuvante"],
    "tipo_no_neo"=>$_SESSION["tipo_no_neo"],
    "Adyuvante_Pendiente"=>$_SESSION["Adyuvante_Pendiente"],
    "TTO_Adyuvante"=>$_SESSION["TTO_Adyuvante"],
    "Tipo_TTO_Adyuvante"=>$_SESSION["Tipo_TTO_Adyuvante"]
    );



 
//output the response
echo json_encode($a);
?>