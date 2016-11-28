<?php
session_start();
require_once ("WEB/BDD/conexion.php");


$nombre=$_POST["name"];

$pass=$_POST["pass"];

$sqlModificaLogin="UPDATE tabla_login SET password=AES_ENCRYPT('$pass','$clave') WHERE user='$nombre'";

mysqli_query($conexion,$sqlModificaLogin)
            or die('Error: ' . mysqli_error());	


?>