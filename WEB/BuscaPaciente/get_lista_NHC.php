<?php

//Autocompletar de los "Busca paciente" por NHC
session_start();

require_once ('../BDD/conexion.php');


// if the 'term' variable is not sent with the request, exit
if ( !isset($_REQUEST['term']) )
    exit;


// query the database table for zip codes that match 'term'

$searchTerm = mysqli_real_escape_string($conexion, $_GET['term']);

$Hospital=$_SESSION["NombreHospital"];

$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

 	$row=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
	 	or die('Error: ' . mysqli_error());

	$Hospital=$row[0];
	$Hospital=intval($Hospital);


$Consulta="SELECT AES_DECRYPT(NHC,'$claveNHC') AS NHC FROM identificador_paciente WHERE Id_Hospital = '$Hospital'";
$rs = mysqli_query($conexion, $Consulta);


// loop through each zipcode returned and format the response for jQuery
$data = array();


   $a[]= null;
    while($row = mysqli_fetch_array($rs))
    {
        $a[] = $row[0];
        
    }

 

 if (strlen($searchTerm) > 0) {
    $hint = "";
    for ($i = 0; $i < count($a); $i++) {
        if (strpos($a[$i], $searchTerm) !== false) {
                 
            $data[] = array(
                'label' => $a[$i],
                'value' => $a[$i]
            );
        }
    }
}
 
 
 
mysqli_close($conexion);
 
// jQuery wants JSON data
echo json_encode($data);
flush();

?>