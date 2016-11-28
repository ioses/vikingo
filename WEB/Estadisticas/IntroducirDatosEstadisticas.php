<?php
session_start();
require_once ("../BDD/conexion.php");

/*
 * Variable para ver si es la primera vez que se carga la página
 */


/**** Altura tumor ****/
if (isset($_POST["altura_tumor_05"])){
	$altura_tumor_05=$_POST["altura_tumor_05"];
	$SincroColonDerecho=strip_tags($altura_tumor_05);
	$altura_tumor_05=intval($altura_tumor_05);	
	$_SESSION["altura_tumor_05"]=$altura_tumor_05;
}else{
	$altura_tumor_05=null;
	$_SESSION["altura_tumor_05"]=$altura_tumor_05;
}



if (isset($_POST["altura_tumor_610"])){
	$altura_tumor_610=$_POST["altura_tumor_610"];
	$altura_tumor_610=strip_tags($altura_tumor_610);	
	$altura_tumor_610=intval($altura_tumor_610);
	$_SESSION["altura_tumor_610"]=$altura_tumor_610;
}else{
	$altura_tumor_610=null;
	$_SESSION["altura_tumor_610"]=$altura_tumor_610;
}




if (isset($_POST["altura_tumor_1115"])){
	$altura_tumor_1115=$_POST["altura_tumor_1115"];
	$altura_tumor_1115=strip_tags($altura_tumor_1115);	
	$altura_tumor_1115=intval($altura_tumor_1115);
	$_SESSION["altura_tumor_1115"]=$altura_tumor_1115;
}else{
	$altura_tumor_1115=null;
	$_SESSION["altura_tumor_1115"]=$altura_tumor_1115;
}



/****** Técnica cirugía ****///
if (isset($_POST["reseccion_abd"])){
	$reseccion_abd=$_POST["reseccion_abd"];
	$reseccion_abd=strip_tags($reseccion_abd);	
	$reseccion_abd=intval($reseccion_abd);
	$_SESSION["reseccion_abd"]=$reseccion_abd;
}else{
	$reseccion_abd=null;
	$_SESSION["reseccion_abd"]=$reseccion_abd;
}

if (isset($_POST["reseccion_anterior"])){
    $reseccion_anterior=$_POST["reseccion_anterior"];
    $reseccion_anterior=strip_tags($reseccion_anterior);  
    $reseccion_anterior=intval($reseccion_anterior);
    $_SESSION["reseccion_anterior"]=$reseccion_anterior;
}else{
    $reseccion_anterior=null;
    $_SESSION["reseccion_anterior"]=$reseccion_anterior;
}


if (isset($_POST["hartmann"])){
    $hartmann=$_POST["hartmann"];
    $hartmann=strip_tags($hartmann);  
    $hartmann=intval($hartmann);
    $_SESSION["hartmann"]=$hartmann;
}else{
    $hartmann=null;
    $_SESSION["hartmann"]=$hartmann;
}




/**** Margen de tiempo ****/


if (isset($_POST["inicio"])){
	$inicio=$_POST["inicio"];
	$inicio=strip_tags($inicio);
	$_SESSION["inicio"]=$inicio;
}

if (isset($_POST["fin"])){
    $fin=$_POST["fin"];
    $fin=strip_tags($fin);
    $_SESSION["fin"]=$fin;
}


if (isset($_POST["TipoInformeHospitales"])){
	$TipoInformeHospitales=$_POST["TipoInformeHospitales"];
	$TipoInformeHospitales=strip_tags($TipoInformeHospitales);
	$_SESSION["TipoInformeHospitales"]=$TipoInformeHospitales;
	
}

	$Nombre=$_SESSION["NombreHospital"];
	      	    				
	      	   $sqlIdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Nombre'";
				$res=mysqli_query($conexion, $sqlIdHospital) or die (mysql_error());
				$row=mysqli_fetch_array($res);
				
	$_SESSION["HospitalKaplanMeier"]=$row[0];	



//Selección de meses para cortar

if(isset($_POST["RecortaMeses"])){
	$RecortaMeses=$_POST["RecortaMeses"];

	$_SESSION["RecortaMeses"]=$RecortaMeses;	
}


if(isset($_POST["MesesMinimos"])){
	$MesesMinimos=$_POST["MesesMinimos"];

	$_SESSION["MesesMinimos"]=$MesesMinimos;	
}





mysqli_close($conexion);			



//Para trabajar de momento se deshabilitara
 header("Location: Estadisticas.php");
?>