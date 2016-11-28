<?php
   session_start();
   
 require_once ("../../../BDD/conexion.php");
 
 /*
 * Variable para ver si es la primera vez que se carga la página
 */

$Enviar_Tratamiento="Enviar";
$_SESSION["ButtonEnviarTratamiento"]=$Enviar_Tratamiento;

 
 
 
$NHC=$_SESSION["NHC"];
$NHC=strval($NHC);


$Id_Paciente=$_SESSION["Id_Paciente"];
$Id_Paciente=intval($Id_Paciente);


 
$TTO_Neoadyuvante=$_POST["B_Tto_Neo"];
$TTO_Neoadyuvante=strip_tags($TTO_Neoadyuvante);
$TTO_Neoadyuvante=intval($TTO_Neoadyuvante);

//Variable global SE INTRODUCE EN SESSION

$_SESSION["B_Tto_Neo"]=$TTO_Neoadyuvante;


if (isset($_POST["tipo_neo"])){
	$Tipo_TTO_Neoadyuvante=$_POST["tipo_neo"];
	$Tipo_TTO_Neoadyuvante=strip_tags($Tipo_TTO_Neoadyuvante);	
	$Tipo_TTO_Neoadyuvante=intval($Tipo_TTO_Neoadyuvante);
	$_SESSION["Tipo_TTO_Neoadyuvante"]=$Tipo_TTO_Neoadyuvante;
}else{
	$Tipo_TTO_Neoadyuvante=null;
	$_SESSION["Tipo_TTO_Neoadyuvante"]=$Tipo_TTO_Neoadyuvante;
}


if (isset($_POST["tipo_no_neo"])){
	$Motivo_No_Neoadyuvante=$_POST["tipo_no_neo"];
	$Motivo_No_Neoadyuvante=strip_tags($Motivo_No_Neoadyuvante);
	$Motivo_No_Neoadyuvante=intval($Motivo_No_Neoadyuvante);
	$_SESSION["tipo_no_neo"]=$Motivo_No_Neoadyuvante;
}else{
	$Motivo_No_Neoadyuvante=null;
	$_SESSION["tipo_no_neo"]=$Motivo_No_Neoadyuvante;
}

//Variable global SE INTRODUCE EN SESSION

//$_SESSION["tipo_no_neo"]=$Motivo_No_Neoadyuvante;


if (isset($_POST["B_Tto_Ady"])){
	$TTO_Adyuvante=$_POST["B_Tto_Ady"];
	$TTO_Adyuvante=strip_tags($TTO_Adyuvante);
	$TTO_Adyuvante=intval($TTO_Adyuvante);
	$_SESSION["TTO_Adyuvante"]=$TTO_Adyuvante;
}else{
	$TTO_Adyuvante=null;
	$_SESSION["TTO_Adyuvante"]=$TTO_Adyuvante;
}

if (isset($_POST["tipo_ady"])){
	$Tipo_TTO_Adyuvante=$_POST["tipo_ady"];
	$Tipo_TTO_Adyuvante=strip_tags($Tipo_TTO_Adyuvante);
$Tipo_TTO_Adyuvante=intval($Tipo_TTO_Adyuvante);
	$_SESSION["Tipo_TTO_Adyuvante"]=$Tipo_TTO_Adyuvante;
}else{
	$Tipo_TTO_Adyuvante=null;
	$_SESSION["Tipo_TTO_Adyuvante"]=$Tipo_TTO_Adyuvante;
}



if (isset($_POST["rellenar"])){
	$_SESSION["Adyuvante_Pendiente"]=$_POST["rellenar"];
}else{
    $_SESSION["Adyuvante_Pendiente"] = null;
}



/*
 * Si tratamiento neoadyuvante == 2 y motiva = "Muerte"
 * 
 */
 
 $_SESSION["No_Patologica"] = null; //Variable que si se pone a 1 indica que no hay q rellenar la patologica
 
 if ($_SESSION["tipo_no_neo"] == 3)
 {
 	
 	 $_SESSION["B_Cirugia"] = 2;
     $_SESSION["Motivo_No_Cirugia"] = 3;
     $_SESSION["No_Patologica"] = 1;
     $_SESSION["TTO_Adyuvante"] = 3;
	 
 }

//INTRODUCCIÓN DE LOS DATOS EN LA BASE DE DATOS

/*
$sqlTratamiento="INSERT INTO tratamiento (Id_Paciente, B_Tto_Neo, B_Tto_Ady) VALUES ('$Id_Paciente', '$TTO_Neoadyuvante','$TTO_Adyuvante')";

mysqli_query($conexion,$sqlTratamiento)
	 or die('Error: ' . mysqli_error());



$sqlIdTratamiento="SELECT LAST_INSERT_ID()";

$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdTratamiento))
	 or die('Error: ' . mysqli_error());

$Id_Tratamiento=$row[0];
$Id_Tratamiento=intval($Id_Tratamiento);

echo($Id_Tratamiento);


if($TTO_Neoadyuvante==1){
	if($Tipo_TTO_Neoadyuvante!=null){
		$sqlTipoTTONeo="INSERT INTO tabla_neo (Id_Tratamiento, Id_Tipo_Neo) VALUES ('$Id_Tratamiento', '$Tipo_TTO_Neoadyuvante')";
		mysqli_query($conexion,$sqlTipoTTONeo)
	 		or die('Error: ' . mysqli_error());
	}
}else if($TTO_Neoadyuvante==2){
			
		if($Motivo_No_Neoadyuvante!=null){
		$sqlMotivoNoNeo="INSERT INTO tabla_no_neo (Id_Tratamiento, Id_Tipo_No_Neo) VALUES ('$Id_Tratamiento', '$Motivo_No_Neoadyuvante')";
		mysqli_query($conexion,$sqlMotivoNoNeo)
	 		or die('Error: ' . mysqli_error());
	}
	
}else{
	echo ("Error en Neoadyuvante");
}


if($TTO_Adyuvante==1){
	if($Tipo_TTO_Adyuvante!=null){
		$sqlTipoTTOAdy="INSERT INTO tabla_ady (Id_Tratamiento, Id_Tipo_Ady) VALUES ('$Id_Tratamiento', '$Tipo_TTO_Adyuvante')";
		mysqli_query($conexion,$sqlTipoTTOAdy)
	 		or die('Error: ' . mysqli_error());
	}
	
}
*/

mysqli_close($conexion);

if ($_SESSION["B_Tto_Neo"] == 2 && $_SESSION["tipo_no_neo"] == 3)
{
    
     $_SESSION["B_Cirugia"] = 2;
     $_SESSION["Motivo_No_Cirugia"] = 3;
     $_SESSION["No_Patologica"] = 1;
     $_SESSION["TTO_Adyuvante"] = 3;
     
     header("Location: ../Cirugia/Salto_Cirugia.php"); 

}

else
{
   header("Location: ../Cirugia/Cirugia.php"); 
}
?>