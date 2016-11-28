<?php
   session_start();

require_once ("../../BDD/conexion.php");

$login=$_POST["login"];
$password=$_POST["Password"];
$hospital=$_POST["IdHospital"];
$mail=$_POST["mail"];

echo ("Hospital".$hospital);

$sqlExisteHospital="SELECT COUNT(*) FROM tabla_login WHERE idHospital='$hospital'";

$res=mysqli_query($conexion,$sqlExisteHospital)
            or die('Error: ' . mysqli_error()."15");
			
$row=mysqli_fetch_array($res);



$AsignaHospital=$row[0]; // Si es 1 significa que ya tiene usuario 

if($AsignaHospital==0){
	
	$sqlNuevoLogin="INSERT INTO tabla_login (user, password, idHospital, Email) VALUES ('$login',AES_ENCRYPT('$password','$clave') ,'$hospital', '$mail')";
				
		mysqli_query($conexion,$sqlNuevoLogin)
            or die('Error: ' . mysqli_error()."27");	
            
     header("Location: VerPassword.php");
}else{
	echo "El hospital ya tiene un usuario";
}


mysqli_close($conexion);
 
?>