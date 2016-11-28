<?php

//Buscar el paciente de Busca paciente (Adyuvante   Patológica  Fecha_Alta)
session_start();

require_once ('../../BDD/conexion.php');


// if the 'term' variable is not sent with the request, exit
if ( !isset($_REQUEST['term']) )
    exit;

$a[] = null;

// query the database table for zip codes that match 'term'

$searchTerm = mysqli_real_escape_string($conexion, $_GET['term']);

$Hospital=$_SESSION["NombreHospital"];

$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

 	$rowH=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
	 	or die('Error: ' . mysqli_error());

	$Hospital=$rowH[0];
	$Hospital=intval($Hospital);


           
$Consulta="SELECT AES_DECRYPT(identificador_paciente.NHC,'$claveNHC') AS NHC, tabla_patologica.Estado AS ESTADO, 
                tratamiento.B_Tto_Ady AS ADY, cirugia.ID AS IDCir FROM identificador_paciente INNER JOIN tabla_patologica 
                ON identificador_paciente.ID=tabla_patologica.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' INNER JOIN tratamiento 
                ON identificador_paciente.ID=tratamiento.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' 
                INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' "; 
                

$res = mysqli_query($conexion, $Consulta);

while ($row=mysqli_fetch_array($res)){      
    
    $ValorNHC=$row[0];
    $ValorEstado=intval($row[1]);
    $ValorAdy=intval($row[2]);
    $IDCirugia=intval($row[3]);

    $sqlSiCirugia="SELECT B_Cirugia FROM cirugia WHERE ID='$IDCirugia'";
        
    $row=mysqli_fetch_array(mysqli_query($conexion,$sqlSiCirugia))
        or die('Error: ' . mysqli_error());
    
    
    $Cirugia=$row[0];
    
    $FechaAlta=1;
    
    if ($Cirugia==1){
        $sqlFechaAlta="SELECT Fecha_Alta FROM tabla_cirugia WHERE Id_Cirugia='$IDCirugia'";
    
        $row=mysqli_fetch_array(mysqli_query($conexion,$sqlFechaAlta))
            or die('Error: ' . mysqli_error());
            
        $FechaAlta=$row[0];     
    }
    
    $FechaAlta=strval($FechaAlta);

    
    if ($ValorEstado==3 || $ValorAdy==0 || $FechaAlta=="0000-00-00" || $FechaAlta==null || $FechaAlta==null)
    {
        $Ady= 0;
        $Estado = 0;
        $FAlta = 0;
        if($ValorAdy==0)
        {
            $Ady = 1;
        }
        
        if($ValorEstado==3)
        {
            $Estado = 1;
        }
        
        if($FechaAlta=="0000-00-00")
        {
            $FAlta = 1;
        }

       $b=array(
            "NHC"=>$ValorNHC,
            "ady"=>$Ady,
            "patologica"=>$Estado,
            "fechaAlta"=>$FAlta
        );
        
        $a[] = $b;
    }
}

 
//loop through each zipcode returned and format the response for jQuery
$data = array();

if (strlen($searchTerm) > 0) 
{
    $hint = "";
    for ($i = 0; $i < count($a); $i++) {
        if (strpos($a[$i]['NHC'], $searchTerm) !== false) {
                 
            $data[] = array(
                'label' => $a[$i]['NHC'],
                'value' => $a[$i]['NHC'],
                'ady' => $a[$i]['ady'],
                'patologica' => $a[$i]['patologica'],
                'fechaAlta' => $a[$i]['fechaAlta']
            );
        }
    }
}
 
mysqli_close($conexion); 
 
// jQuery wants JSON data
echo json_encode($data);
flush();

?>