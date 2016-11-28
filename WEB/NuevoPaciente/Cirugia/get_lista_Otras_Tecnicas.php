<?php
//Rellena el autocomplete de otras complicaciones
require_once ('../../BDD/conexion.php');


header('Content-Type: text/html; charset=utf-8');
// if the 'term' variable is not sent with the request, exit
if ( !isset($_REQUEST['term']) )
    exit;


// query the database table for zip codes that match 'term'

$searchTerm = mysqli_real_escape_string($conexion, $_GET['term']);

$sql='select Tipo from tabla_otras_tecnicas where Tipo like "%'. $searchTerm .'%"';
$rs = mysqli_query($conexion, $sql);


// loop through each zipcode returned and format the response for jQuery
$data = array();

//if($rs)
//{
    while($row = mysqli_fetch_array($rs))
    {
        $data[] = array(
        	
			'label' => utf8_encode($row['Tipo']),
            'value' => utf8_encode($row['Tipo'])
			
		
           // 'label' => utf8_encode(html_entity_decode(htmlentities($row['Tipo'],ENT_QUOTES, "UTF-8"))),
           // 'value' => utf8_encode(html_entity_decode(htmlentities($row['Tipo'],ENT_QUOTES, "UTF-8")))
			
			
        );
    }
//}
 
mysqli_close($conexion);
  
// jQuery wants JSON data
echo json_encode($data);
flush();

?>