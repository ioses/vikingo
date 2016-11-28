<?php
session_start();
require_once ('../../BDD/conexion.php');

$Hospital=$_GET["IDH"];



$sqlDevuelveuser="SELECT user, AES_DECRYPT(password,'$clave'), email FROM tabla_login WHERE idHospital='$Hospital'";

$res=mysqli_query($conexion,$sqlDevuelveuser)
            or die('Error: ' . mysqli_error());
			
	$row=mysqli_fetch_array($res);
	
	$User=$row[0];
	$Password=$row[1];	
	$Email=$row[2];	
	






//Fill de array
$a=array(
"User"=>$User,
"Password"=>$Password,
"Email"=>$Email
);


mysqli_close($conexion);
 
echo json_encode($a);

?>