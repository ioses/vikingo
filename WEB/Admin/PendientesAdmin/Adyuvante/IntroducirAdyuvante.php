<?php
   session_start();
   
   require_once ("../../../BDD/conexion.php");
 
 
$NHC=$_POST["NHC"];
$_SESSION["NHCPendientes"]=$NHC;
$idHospital=$_POST["idHospital"];

$sqlidPaciente = "SELECT ID FROM identificador_paciente WHERE NHC=AES_ENCRYPT('$NHC','$claveNHC') AND Id_Hospital = '$idHospital'";

$res=mysqli_query($conexion,$sqlidPaciente)
	 or die('Error: ' . mysqli_error());

$row=mysqli_fetch_array($res);

$IdPaciente=$row[0];
$IdPaciente=intval($IdPaciente);



if (isset($_POST["B_Tto_Ady"])){
	$TTO_Adyuvante=$_POST["B_Tto_Ady"];
	$TTO_Adyuvante=intval($TTO_Adyuvante);
}else{
	$TTO_Adyuvante=null;
}


if (isset($_POST["tipo_ady"])){
	$Tipo_TTO_Adyuvante=$_POST["tipo_ady"];
	$Tipo_TTO_Adyuvante=intval($Tipo_TTO_Adyuvante);
}else{
	$Tipo_TTO_Adyuvante=null;
}


$sqlAdyuvante="UPDATE tratamiento SET B_Tto_Ady='$TTO_Adyuvante' WHERE Id_Paciente='$IdPaciente'";

mysqli_query($conexion,$sqlAdyuvante)
	 or die('Error: ' . mysqli_error());



$sqlIdTratamiento="SELECT ID FROM tratamiento WHERE Id_Paciente='$IdPaciente'";

$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdTratamiento))
	 or die('Error: ' . mysqli_error());

$Id_Tratamiento=$row[0];
$Id_Tratamiento=intval($Id_Tratamiento);



if($TTO_Adyuvante==1){
	if($Tipo_TTO_Adyuvante!=null){
		$sqlTipoTTOAdy="INSERT INTO tabla_ady (Id_Tratamiento, Id_Tipo_Ady) VALUES ('$Id_Tratamiento', '$Tipo_TTO_Adyuvante')";
		mysqli_query($conexion,$sqlTipoTTOAdy)
	 		or die('Error: ' . mysqli_error());
	}
	
}

mysqli_close($conexion);
 
//Para trabajar de momento se deshabilitara
 header("Location: ../FinPendientes.php");   
?>