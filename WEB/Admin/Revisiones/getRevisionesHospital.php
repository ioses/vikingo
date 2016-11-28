<?php
session_start();

require_once ("../../BDD/conexion.php");



$IdHospital=$_GET["ID"];
$hoy = date("y.m.d"); 


$sql="SELECT AES_DECRYPT (identificador_paciente.NHC, '$claveNHC') AS NHC, seguimiento.Fecha_Revision FROM identificador_paciente
				INNER JOIN seguimiento ON identificador_paciente.ID= seguimiento.Id_Paciente AND identificador_paciente.Id_Hospital='$IdHospital' AND seguimiento.B_Estado=1 AND seguimiento.B_Imposibilidad=2 
				AND DATEDIFF('$hoy', seguimiento.Fecha_Revision)>365
				INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND cirugia.B_Cirugia=1 
				INNER JOIN tabla_cirugia ON cirugia.ID=tabla_cirugia.Id_Cirugia AND DATEDIFF(seguimiento.Fecha_Revision,tabla_cirugia.Fecha_Intervencion)<1825";
				


/*
$sql="SELECT AES_DECRYPT(id.NHC,'$claveNHC') AS NHC, seg.Fecha_Revision FROM identificador_paciente id, seguimiento seg 
	      		WHERE id.ID=seg.Id_Paciente AND id.Id_Hospital='$IdHospital' AND seg.B_Estado=1 AND seg.B_Imposibilidad=2 
	      		AND DATEDIFF('$hoy',seg.Fecha_Revision)>365 ORDER BY NHC ASC";
*/
$res=mysqli_query($conexion,$sql);



/*
 * Crear la tabla de todos los pacientes
 */

$TablaNHC = "";
while ($row=mysqli_fetch_array($res))
{      
    
    $TablaNHC = $TablaNHC .  "<tr>";
	$TablaNHC = $TablaNHC .  "<form action=\"SeguimientoRevisionAdmin.php\" method=\"post\">";
	$TablaNHC = $TablaNHC .  "<input type=\"hidden\" value=".$IdHospital." id=\"IdHospital\" name=\"IdHospital\">";
	$TablaNHC = $TablaNHC .  "<input type=\"hidden\" value=".$row[0]." id=\"NHCSeguimiento\" name=\"NHCSeguimiento\">";
    $TablaNHC = $TablaNHC .  "<td>" . $row[0] . "</td>";
    $TablaNHC = $TablaNHC .  "<td>" . $row[1] . "</td>";
    $TablaNHC = $TablaNHC .  "<td>
                               <input type=\"submit\" value=\"Ir a seguimiento\" class=\"btn btn-primary\" style=\"height: 100;\" />
                            </td>";
	$TablaNHC = $TablaNHC .	"</form>";                      
    $TablaNHC = $TablaNHC . "</tr>";
}

mysqli_close($conexion);
 

//output the response

echo $TablaNHC; 


?>