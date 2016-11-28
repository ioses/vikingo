<?php
session_start();
require_once ("../../BDD/conexion.php");

$IDHospital=$_POST["Hospital"];
$IDHospital=intval($IDHospital);
$_SESSION["CodigoHospital"]=$IDHospital;

$sqlHospital="SELECT Nombre FROM tabla_hospital WHERE Codigo='$IDHospital'";

$result=mysqli_query($conexion,$sqlHospital);

$row=mysqli_fetch_array($result);

$_SESSION["NomHosp"]=$row[0];



mysqli_close($conexion);
 
 header("Location: Inicial/Inicial.php");

?>