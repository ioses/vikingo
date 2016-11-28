<?php 
session_start();
require_once ('../../../BDD/conexion.php');



$Hospital=$_POST["Hospital"];

$sqlPendientes="SELECT identificador_paciente.Id_Hospital, AES_DECRYPT (identificador_paciente.NHC,'$claveNHC') AS NHC, tabla_patologica.Estado AS ESTADO, 
	      		tratamiento.B_Tto_Ady AS ADY, cirugia.ID AS IDCir FROM identificador_paciente INNER JOIN tabla_patologica 
	      		ON identificador_paciente.ID=tabla_patologica.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' INNER JOIN tratamiento 
	      		ON identificador_paciente.ID=tratamiento.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' 
	      		INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' ";


$result = mysqli_query($conexion,$sqlPendientes) or die(mysql_error()); 



header('Content-type: application/vnd.ms-excel'); 
header("Content-Disposition: attachment; filename=Pendientes_$Hospital.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

echo "<table border=1> "; 
echo "<tr> "; 
echo "<th>Hospital</th> "; 
echo "<th>NHC</th> "; 
echo "<th>EstadoPatologica</th> "; 
echo "<th>Adyuvante</th> ";
echo "<th>Cirugia</th> ";

echo "</tr> "; 
while($row = mysqli_fetch_array($result)){
$IdHospital=$row[0];
$NHC=$row[1];	
$Patologica=$row[2];
$Adyuvante=$row[3];			
$IdCirugia=$row[4];


$sqlSiCirugia="SELECT B_Cirugia FROM cirugia WHERE ID='$IdCirugia'";
						
						$row=mysqli_fetch_array(mysqli_query($conexion,$sqlSiCirugia))
       						or die('Error: ' . mysqli_error());
					
					
						$Cirugia=$row[0];
					
				$FechaAlta=1;
				if ($Cirugia==1){
					$sqlFechaAlta="SELECT Fecha_Alta FROM tabla_cirugia WHERE Id_Cirugia='$IdCirugia'";
					
					$row=mysqli_fetch_array(mysqli_query($conexion,$sqlFechaAlta))
       						or die('Error: ' . mysqli_error());
       						
       				$FechaAlta=$row[0];		
				}
					$FechaAlta=strval($FechaAlta);
					
if($Patologica==3 || $Adyuvante==0 || $FechaAlta=="0000-00-00" || $FechaAlta==null){					
						
echo "<tr> "; 
echo "<td>".$IdHospital."</td> "; 
echo "<td>".$NHC."</td> ";
if ($Patologica==3){
	echo "<td>Pendiente</td> ";
} else{
	echo "<td></td> ";
}

if ($Adyuvante==0){
	echo "<td>Pendiente</td> ";
} else{
	echo "<td></td> ";
}

if ($FechaAlta=="0000-00-00" || $FechaAlta==null){
	echo "<td>Pendiente</td> ";	
}else{
	echo "<td>&nbsp;</td> ";
}

echo "</tr> "; 
}
} 
echo "</table> ";


mysqli_close($conexion);
 

?>