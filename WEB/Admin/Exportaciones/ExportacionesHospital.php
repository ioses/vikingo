<?php 
session_start();
require_once ('../../BDD/conexion.php');

$fecha = date("d-m-Y"); 
$sqlTabla="SELECT * FROM tabla_hospital"; 
$result = mysqli_query($conexion,$sqlTabla) or die(mysql_error()); 
 

header('Content-type: application/vnd.ms-excel'); 
header("Content-Disposition: attachment; filename=Hospitales_$fecha.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

echo "<table border=1> "; 
echo "<tr> "; 
echo "<th>Codigo</th> "; 
echo "<th>Nombre</th> "; 
echo "<th>Pacientes</th> "; 

echo "</tr> "; 
while($row = mysqli_fetch_array($result)){ 
echo "<tr> "; 
echo "<td>".$row['Codigo']."</td> "; 
echo "<td>".$row['Nombre']."</td> "; 
echo "<td>".$row['Pacientes']."</td> "; 

echo "</tr> "; 
} 
echo "</table> "; 


mysqli_close($conexion);
 
?>