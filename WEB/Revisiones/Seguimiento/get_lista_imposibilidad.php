<?php

//Rellena el autocomplete de imposibilidad de seguimiento
require_once ('../../BDD/conexion.php');


// if the 'term' variable is not sent with the request, exit
if ( !isset($_REQUEST['term']) )
    exit;


// query the database table for zip codes that match 'term'

$searchTerm = mysqli_real_escape_string($conexion, $_GET['term']);

$sql='select Causa from tabla_seg_imposibilidad where Causa like "%'. $searchTerm .'%"';
$rs = mysqli_query($conexion, $sql);


// loop through each zipcode returned and format the response for jQuery
$data = array();

//if($rs)
//{
    while($row = mysqli_fetch_array($rs))
    {
        $data[] = array(
            'label' => utf8_encode($row['Causa']),
            'value' => utf8_encode($row['Causa'])
        );
    }
//}
 
mysqli_close($conexion);
 
// jQuery wants JSON data
echo json_encode($data);
flush();

?>