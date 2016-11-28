<?php
//Guarda los cambios realizados en Email, contraseña o email

session_start();
    
require_once ("../BDD/conexion.php");


$Dato=$_GET["dato"];
$Que=$_GET["que"];


$HospitalNombre=$_SESSION["NombreHospital"];

$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$HospitalNombre'";

$row2 = mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
    or die('Error: ' . mysqli_error());

$Hospital=$row2[0];



if ($Que == 1)
{
	$sqlDevuelveuser="UPDATE tabla_login SET user = '$Dato' WHERE idHospital='$Hospital'";

	$res=mysqli_query($conexion,$sqlDevuelveuser)
            or die('Error: ' . mysqli_error());

}
else if ($Que == 2)
{
	$sqlDevuelveuser="UPDATE tabla_login SET password = AES_ENCRYPT('$Dato','$clave') WHERE idHospital='$Hospital'";

	$res=mysqli_query($conexion,$sqlDevuelveuser)
            or die('Error: ' . mysqli_error());
}
else if ($Que == 3)
{
	$sqlDevuelveuser="UPDATE tabla_login SET Email = '$Dato' WHERE idHospital='$Hospital'";

	$res=mysqli_query($conexion,$sqlDevuelveuser)
            or die('Error: ' . mysqli_error());
}

 
echo "btn btn-success";

mysqli_close($conexion);


?>