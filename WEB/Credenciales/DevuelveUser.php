<?php

//Del usuario recoge el email, contraseña e email
session_start();
    
require_once ("../BDD/conexion.php");



$HospitalNombre=$_SESSION["NombreHospital"];

$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$HospitalNombre'";

$row2 = mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
    or die('Error: ' . mysqli_error());

$Hospital=$row2[0];



$sqlDevuelveuser="SELECT user, AES_DECRYPT(password,'$clave'), Email FROM tabla_login WHERE idHospital='$Hospital'";

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