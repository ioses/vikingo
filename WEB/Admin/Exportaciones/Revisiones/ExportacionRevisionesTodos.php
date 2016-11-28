<?php 
session_start();
require_once ('../../../BDD/conexion.php');

$fecha = date("y.m.d");

/*

$sqlTablaRevisiones="SELECT id.Id_Hospital, AES_DECRYPT(id.NHC,'$claveNHC'), seg.Fecha_Revision FROM identificador_paciente id, seguimiento seg 
	      		WHERE id.ID=seg.Id_Paciente AND seg.B_Estado=1 AND seg.B_Imposibilidad=2 
	      		AND DATEDIFF('$fecha',seg.Fecha_Revision)>365 ORDER BY id.Id_Hospital ASC";
				

	*/			

	$sqlTablaRevisiones="SELECT identificador_paciente.Id_Hospital, AES_DECRYPT (identificador_paciente.NHC, '$claveNHC'), seguimiento.Fecha_Revision FROM identificador_paciente
				INNER JOIN seguimiento ON identificador_paciente.ID= seguimiento.Id_Paciente AND seguimiento.B_Estado=1 AND seguimiento.B_Imposibilidad=2 
				AND DATEDIFF('$fecha', seguimiento.Fecha_Revision)>365
				INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND cirugia.B_Cirugia=1 
				INNER JOIN tabla_cirugia ON cirugia.ID=tabla_cirugia.Id_Cirugia AND DATEDIFF(seguimiento.Fecha_Revision,tabla_cirugia.Fecha_Intervencion)<1825 
				ORDER BY identificador_paciente.Id_Hospital ASC";
				
		/*		
		$sqlTablaRevisiones="SELECT identificador_paciente.Id_Hospital, AES_DECRYPT (identificador_paciente.NHC, '$claveNHC'), seguimiento.Fecha_Revision FROM identificador_paciente
				INNER JOIN seguimiento ON identificador_paciente.ID= seguimiento.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' AND seguimiento.B_Estado=1 AND seguimiento.B_Imposibilidad=2 
				AND DATEDIFF('$hoy', seguimiento.Fecha_Revision)>365
				INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND cirugia.B_Cirugia=1 
				INNER JOIN tabla_cirugia ON cirugia.ID=tabla_cirugia.Id_Cirugia AND DATEDIFF(seguimiento.Fecha_Revision,tabla_cirugia.Fecha_Intervencion)<1825 
				ORDER BY identificador_paciente.Id_Hospital ASC";			
				
			*/	
				
  
$result = mysqli_query($conexion,$sqlTablaRevisiones) or die(mysql_error()); 



header('Content-type: application/vnd.ms-excel'); 
header("Content-Disposition: attachment; filename=Revisiones_Completo.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

echo "<table border=1> "; 
echo "<tr> "; 
echo "<th>Hospital</th> "; 
echo "<th>NHC</th> "; 
echo "<th>Fecha</th> "; 

echo "</tr> "; 
while($row = mysqli_fetch_array($result)){ 
echo "<tr> "; 
echo "<td>".$row[0]."</td> "; 
echo "<td>".$row[1]."</td> "; 
echo "<td>".$row[2]."</td> "; 

echo "</tr> "; 
} 
echo "</table> ";


mysqli_close($conexion);
 

?>