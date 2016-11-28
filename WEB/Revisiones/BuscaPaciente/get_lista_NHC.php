<?php

//Busca el paciente de Busca paciente
session_start();

require_once ('../../BDD/conexion.php');


// if the 'term' variable is not sent with the request, exit
if ( !isset($_REQUEST['term']) )
    exit;

$hoy = date("y.m.d"); 

// query the database table for zip codes that match 'term'

$searchTerm = mysqli_real_escape_string($conexion, $_GET['term']);

$Hospital=$_SESSION["NombreHospital"];

$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

 	$rowH=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
	 	or die('Error: ' . mysqli_error());

	$Hospital=$rowH[0];
	$Hospital=intval($Hospital);
	
	$Consulta="SELECT AES_DECRYPT (identificador_paciente.NHC, '$claveNHC') AS NHC, seguimiento.Fecha_Revision FROM identificador_paciente
				INNER JOIN seguimiento ON identificador_paciente.ID= seguimiento.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' AND seguimiento.B_Estado=1 AND seguimiento.B_Imposibilidad=2 
				AND DATEDIFF('$hoy', seguimiento.Fecha_Revision)>365
				INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND cirugia.B_Cirugia=1 
				INNER JOIN tabla_cirugia ON cirugia.ID=tabla_cirugia.Id_Cirugia AND DATEDIFF(seguimiento.Fecha_Revision,tabla_cirugia.Fecha_Intervencion)<1825";
	
$rs = mysqli_query($conexion, $Consulta);


// loop through each zipcode returned and format the response for jQuery
$data = array();

   $a[] = null;
   $fecha[] = null;
    while($row = mysqli_fetch_array($rs))
    {
        $a[] = $row[0];
        $fecha[] = $row[1];
    }

 

 if (strlen($searchTerm) > 0) {
    $hint = "";
    for ($i = 0; $i < count($a); $i++) {
        if (strpos($a[$i], $searchTerm) !== false) {
                 
            $data[] = array(
                'label' => $a[$i],
                'value' => $a[$i],
                'FechaRevision' => $fecha[$i]
            );
        }
    }
}
 
mysqli_close($conexion); 
 
// jQuery wants JSON data
echo json_encode($data);
flush();

?>