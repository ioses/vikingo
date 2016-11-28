<?php
session_start();
require_once ("WEB/BDD/conexion.php");


$nombre=$_POST["name"];

$pass=$_POST["pass"];

$sqlNuevoLogin="INSERT INTO tabla_login (user, password) VALUES ('$nombre',AES_ENCRYPT('$pass','$clave'))";

mysqli_query($conexion,$sqlNuevoLogin)
            or die('Error: ' . mysqli_error());	


?>