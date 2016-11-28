<?php
	session_start();
	require_once ('../../BDD/conexion.php');

	$nombre_hospital = $_SESSION["NombreHospital"];

	$sqlHospital = "SELECT Codigo FROM tabla_hospital
	                WHERE Nombre = '$nombre_hospital'";
	                       
	$rsHospital = mysqli_query($conexion,$sqlHospital)
	or die('Error: ' . mysqli_error());
	    
	$exite = mysqli_num_rows($rsHospital);
	
	$hospital = 0;
	    
	if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
	{
	    while($rowHospital=mysqli_fetch_array($rsHospital))
	    {
	        $hospital = $rowHospital["Codigo"];
	    }
	}
	
	
	$ruta = "";
	switch ($hospital) {
		case '1':
			$ruta = "Hospital1";
			break;
			
		case '2':
			$ruta = "Hospital2";
			break;
		case '3':
			$ruta = "Hospital3";
			break;
			
		case '4':
			$ruta = "Hospital4";
			break;
			
		case '5':
			$ruta = "Hospital5";
			break;
			
		case '7':
			$ruta = "Hospital7";
			break;
			
		case '8':
			$ruta = "Hospital8";
			break;
			
		case '9':
			$ruta = "Hospital9";
			break;
			
		case '11':
			$ruta = "Hospital11";
			break;
			
		case '13':
			$ruta = "Hospital13";
			break;
			
		case '16':
			$ruta = "Hospital16";
			break;
			
		case '17':
			$ruta = "Hospital17";
			break;
			
		case '18':
			$ruta = "Hospital18";
			break;
			
		case '19':
			$ruta = "Hospital19";
			break;
			
		case '20':
			$ruta = "Hospital20";
			break;
			
		case '22':
			$ruta = "Hospital22";
			break;
			
		case '24':
			$ruta = "Hospital24";
			break;
			
		case '25':
			$ruta = "Hospital25";
			break;
			
		case '26':
			$ruta = "Hospital26";
			break;
			
		case '27':
			$ruta = "Hospital27";
			break;
			
		case '28':
			$ruta = "Hospital28";
			break;
			
		case '29':
			$ruta = "Hospital29";
			break;
			
		case '33':
			$ruta = "Hospital33";
			//$ruta = "False";
			break;
			
		case '35':
			$ruta = "Hospital35";
			break;
			
		case '36':
			$ruta = "Hospital36";
			break;
			
		case '37':
			$ruta = "Hospital37";
			//$ruta = "False";
			break;
			
		case '38':
			$ruta = "Hospital38";
			break;
			
		case '39':
			$ruta = "Hospital39";
			break;
			
		case '40':
			$ruta = "Hospital40";
			break;
			
		case '41':
			$ruta = "Hospital41";
			break;
			
		case '42':
			$ruta = "Hospital42";
			break;
			
		case '43':
			$ruta = "Hospital43";
			break;
			
		case '44':
			$ruta = "Hospital44";
			break;
			
		case '45':
			$ruta = "Hospital45";
			break;
			
		case '46':
			$ruta = "Hospital46";
			break;
			
		case '47':
			$ruta = "Hospital47";
			break;
			
		case '49':
			$ruta = "Hospital49";
			//$ruta = "False";
			break;
			
		case '50':
			$ruta = "Hospital50";
			break;
			
		case '51':
			$ruta = "Hospital51";
			break;
			
		case '52':
			$ruta = "Hospital52";
			break;
			
		case '53':
			$ruta = "Hospital53";
			break;
			
		case '54':
			$ruta = "Hospital54";
			break;
			
		case '55':
			$ruta = "Hospital55";
			//$ruta = "False";
			break;
			
		case '56':
			$ruta = "Hospital56";
			break;
			
		case '57':
			$ruta = "Hospital57";
			//$ruta = "False";
			break;
			
		case '59':
			$ruta = "Hospital59";
			break;
			
		case '60':
			$ruta = "Hospital60";
			break;
			
		case '61':
			$ruta = "Hospital61";
			//$ruta = "False";
			break;
			
		case '63':
			$ruta = "Hospital63";
			break;
			
		case '64':
			$ruta = "Hospital64";
			//$ruta = "False";
			break;
			
		case '65':
			$ruta = "Hospital65";
			//$ruta = "False";
			break;
			
		case '66':
			$ruta = "Hospital66";
			break;
			
		case '67':
			$ruta = "Hospital67";
			//$ruta = "False";
			break;
			
		case '68':
			$ruta = "Hospital68";
			break;
			
		case '69':
			$ruta = "Hospital69";
			break;
			
		case '70':
			$ruta = "Hospital70";
			break;
			
		case '71':
			$ruta = "Hospital71";
			//$ruta = "False";
			break;
			
		case '72':
			$ruta = "Hospital72";
			//$ruta = "False";
			break;
			
		case '73':
			$ruta = "Hospital73";
			break;
			
		case '74':
			$ruta = "Hospital74";
			//$ruta = "False";
			break;
			
		case '75':
			$ruta = "Hospital75";
			//$ruta = "False";
			break;
			
		case '78':
			$ruta = "Hospital78";
			//$ruta = "False";
			break;
			
		case '79':
			$ruta = "Hospital79";
			break;
			
		case '80':
			$ruta = "Hospital80";
			break;
			
		case '83':
			$ruta = "Hospital83";
			break;
			
		case '84':
			$ruta = "Hospital84";
			//$ruta = "False";
			break;
			
		case '85':
			$ruta = "Hospital85";
			//$ruta = "False";
			break;
			
		case '86':
			$ruta = "Hospital86";
			break;
			
		case '87':
			$ruta = "Hospital87";
			break;
			
		case '88':
			$ruta = "Hospital88";
			//$ruta = "False";
			break;
			
		case '89':
			$ruta = "Hospital89";
			break;
			
		case '90':
			$ruta = "Hospital90";
			//$ruta = "False";
			break;
			
		case '91':
			$ruta = "Hospital91";
			break;
			
		case '92':
			$ruta = "Hospital92";
			break;
			
		case '93':
			$ruta = "Hospital93";
			//$ruta = "False";
			break;
			
		case '94':
			$ruta = "Hospital94";
			break;
			
		case '95':
			$ruta = "Hospital95";
			//$ruta = "False";
			break;
			
		case '96':
			$ruta = "Hospital96";
			//$ruta = "False";
			break;
			
		case '97':
			$ruta = "Hospital97";
			//$ruta = "False";
			break;
			
		case '98':
			$ruta = "Hospital98";
			//$ruta = "False";
			break;
			
		case '99':
			$ruta = "Hospital99";
			//$ruta = "False";
			break;
			
		case '101':
			$ruta = "Hospital101";
			//$ruta = "False";
			break;
		
		case '102':
			$ruta = "Hospital102";
			//$ruta = "False";
			break;
			
		case '104':
			$ruta = "Hospital104";
			//$ruta = "False";
			break;
			
		case '105':
			$ruta = "Hospital105";
			//$ruta = "False";
			break;
						
		default:
			$ruta = "False";
			break;
	}
	
	if ($ruta == "False"){
		header("Location: Error_Datos.php");
	}else{
		header("Location: KMpdf.php?ruta=http://proyectovikingo.org/WEB/CSV/Analysis/" . $ruta ."/".$ruta.".pdf");
	}
	
?>
