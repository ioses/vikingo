<?php
session_start();
require_once ('../../../BDD/conexion.php');

$i=$_POST["IdHospital"];

echo "Hospital ".$i."";

$sqlID="SELECT ID FROM identificador_paciente WHERE Id_Hospital='$i'" ;


$result = mysqli_query($conexion,$sqlID) or die('Error: ' . mysqli_error());


mysqli_query($conexion,"START TRANSACTION");

while($row = mysqli_fetch_array($result)){
	
$Id_Paciente=intval($row[0]);
	
	
echo "<br/>";
echo($Id_Paciente);

$sqlidentificador_paciente="SELECT Id_Hospital, Id_Sexo, Fecha_Nacimiento FROM identificador_paciente WHERE ID=$Id_Paciente";

$residentificador_paciente=mysqli_query($conexion,$sqlidentificador_paciente) or die (mysql_error());

$rowidentificador_paciente=mysqli_fetch_array($residentificador_paciente);



//Variables a introducir en tabla_estadistica que vienen de indentificador_paciente
$Id_Hospital=intval($rowidentificador_paciente[0]);
$Sexo=intval($rowidentificador_paciente[1]);
$FechaNacimiento=$rowidentificador_paciente[2];		


//Valores de cirugia
$sqlCirugia="SELECT ID, B_Cirugia FROM cirugia WHERE Id_Paciente=$Id_Paciente";

$resCirugia=mysqli_query($conexion,$sqlCirugia) or die (mysql_error());

$rowCirugia=mysqli_fetch_array($resCirugia);

$Id_Cirugia=intval($rowCirugia[0]);
$B_Cirugia=intval($rowCirugia[1]);

if ($B_Cirugia==1){
	$sqltablacirugia="SELECT Fecha_Intervencion, Id_Tecnica, Id_Planificacion FROM tabla_cirugia WHERE Id_Cirugia=$Id_Cirugia";
	
	$restablacirugia=mysqli_query($conexion,$sqltablacirugia) or die (mysql_error());

	$rowTablaCirugia=mysqli_fetch_array($restablacirugia);
	
	$FechaCirugia=$rowTablaCirugia[0];
	
	$TecCirugia=intval($rowTablaCirugia[1]);
	
	$PlanificacionCirugia=intval($rowTablaCirugia[2]);
	
	$sqlCaracCirugia="SELECT Perforacion_Tumoral FROM tabla_caracteristicas_cirugia WHERE Id_Cirugia=$Id_Cirugia";
	
	$resCaraccirugia=mysqli_query($conexion,$sqlCaracCirugia) or die (mysql_error());

	$rowCaracCirugia=mysqli_fetch_array($resCaraccirugia);
	
	$Perforacion=intval($rowCaracCirugia[0]);	
	
}else{
	$FechaCirugia=null;
	$TecCirugia=null;
	$PlanificacionCirugia=null;
	$Perforacion=null;	
}


$sqlExistePatologica="SELECT Estado FROM tabla_patologica WHERE Id_Paciente=$Id_Paciente";

	$resExistePatologica=mysqli_query($conexion,$sqlExistePatologica) or die (mysql_error());

	$rowExistePatologica=mysqli_fetch_array($resExistePatologica);
	
	$ExistePatologica=intval($rowExistePatologica[0]);
	

if($ExistePatologica==1){
	$sqlPatologica="SELECT Id_Estadio_Patologico, Id_Tipo_Res, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Meso_Cal FROM anatomia_patologica WHERE Id_Paciente=$Id_Paciente";
	
	$resPatologica=mysqli_query($conexion,$sqlPatologica) or die (mysql_error());

	$rowPatologica=mysqli_fetch_array($resPatologica);
	
	$CampoEstadio=intval($rowPatologica[0]);
	$TipoRes=intval($rowPatologica[1]);
	$MargenDistal=intval($rowPatologica[2]);
	$MargenCircunferencial=intval($rowPatologica[3]);
	$MesoCal=intval($rowPatologica[4]);
		
}else{
	
	$CampoEstadio=null;
	$TipoRes=null;
	$MargenDistal=null;
	$MargenCircunferencial=null;
	$MesoCal=null;
	
}	

$sqlLocalizacion="SELECT Localizacion FROM inicial WHERE Id_Paciente=$Id_Paciente";

$resLocalizacion=mysqli_query($conexion,$sqlLocalizacion) or die (mysql_error());

	$rowLocalizacion=mysqli_fetch_array($resLocalizacion);
	
	$Localizacion=intval($rowLocalizacion[0]);
	

$sqlTTONeo="SELECT B_Tto_Neo FROM tratamiento WHERE Id_Paciente=$Id_Paciente";

$resTTONeo=mysqli_query($conexion,$sqlTTONeo) or die (mysql_error());

	$rowTTONeo=mysqli_fetch_array($resTTONeo);
	
	$TTONeo=intval($rowTTONeo[0]);	



$sqlSeguimiento="SELECT ID, Fecha_Revision, B_Recidiva, B_Metastasis, B_Estado FROM seguimiento WHERE Id_Paciente=$Id_Paciente";

$resSeguimiento=mysqli_query($conexion,$sqlSeguimiento) or die (mysql_error());

	$rowSeguimiento=mysqli_fetch_array($resSeguimiento);
	
	$Id_Seguimiento=intval($rowSeguimiento[0]);
	$FechaRevision=$rowSeguimiento[1];
	$Recidiva=intval($rowSeguimiento[2]);
	$Metastasis=intval($rowSeguimiento[3]);
	$Vivo=intval($rowSeguimiento[4]);
	

if($Recidiva==1){
	$sqlFechaRecidiva="SELECT Fecha_Recidiva FROM tabla_recidiva WHERE Id_Seguimiento=$Id_Seguimiento";
	
	$resRecidiva=mysqli_query($conexion,$sqlFechaRecidiva) or die (mysql_error());

	$rowRecidiva=mysqli_fetch_array($resRecidiva);
	
	$FechaRecidiva=$rowRecidiva[0];
}else{
	$FechaRecidiva=$FechaRevision;
}


if($Metastasis==1){
	$sqlFechaMetastasis="SELECT Fecha_Metastasis FROM tabla_metastasis WHERE Id_Seguimiento=$Id_Seguimiento";
	
	$resMetastasis=mysqli_query($conexion,$sqlFechaMetastasis) or die (mysql_error());

	$rowMetastasis=mysqli_fetch_array($resMetastasis);
	
	$FechaMetastasis=$rowMetastasis[0];
}else{
	$FechaMetastasis=$FechaRevision;
}	
	

if($Vivo==2){
	$sqlFechaMuerte="SELECT Fecha_Muerte FROM tabla_estado WHERE Id_Seguimiento=$Id_Seguimiento";
	
	$resMuerte=mysqli_query($conexion,$sqlFechaMuerte) or die (mysql_error());

	$rowMuerte=mysqli_fetch_array($resMuerte);
		$FechaMuerte=$rowMuerte[0];
}else{
	$FechaMuerte=null;
}	
/*
echo "<br/>";
echo gettype($Id_Hospital);
echo "<br/>";
echo gettype($Id_Paciente);
echo "<br/>";
echo gettype($FechaNacimiento);
echo "<br/>";
echo gettype($Sexo);
echo "<br/>";
echo gettype($B_Cirugia);
echo "<br/>";
echo gettype($TipoRes);
echo "<br/>";
echo gettype($TecCirugia);
echo "<br/>";
echo gettype($Recidiva);
echo "<br/>";
echo gettype($FechaRecidiva);
echo "<br/>";
echo gettype($Metastasis);
echo "<br/>";
echo gettype($FechaMetastasis);
echo "<br/>";
echo gettype($Vivo);
echo "<br/>";
echo gettype($FechaMuerte);
echo "<br/>";
echo gettype($Localizacion);
echo "<br/>";

echo gettype($Perforacion);
echo "<br/>";
echo gettype($MargenCircunferencial);
echo "<br/>";
echo gettype($TTONeo);
echo "<br/>";
echo gettype($FechaRevision);
echo "<br/>";
echo gettype($MesoCal);
echo "<br/>";
*/

$sqlRellenaTabla="INSERT INTO tabla_estadistica (HOSPITAL, ID, FEC_NAC, SEXO, CIRUGIA, FEC_CIR, CampoEstadio, TIPO_RES, TEC_CIR, 
					C_RECIDIVA, Fecha_Recidiva, METAS, FechaMetastasis, VIVO, Fechafallecimiento, LOCALIZ, PERFORA, M_CIRCUN,
					 M_DISTAL, TTO_NEO, FEC_REV, MESO_CAL, Urg_Cir) VALUES (
					'$Id_Hospital','$Id_Paciente','$FechaNacimiento','$Sexo','$B_Cirugia','$FechaCirugia','$CampoEstadio','$TipoRes'
					,'$TecCirugia','$Recidiva','$FechaRecidiva','$Metastasis','$FechaMetastasis','$Vivo','$FechaMuerte','$Localizacion',
					'$Perforacion','$MargenCircunferencial','$MargenDistal','$TTONeo','$FechaRevision','$MesoCal', '$PlanificacionCirugia')";





mysqli_query($conexion,$sqlRellenaTabla)  or die('Error: ' . mysqli_error());

}
mysqli_query($conexion,"COMMIT");


mysqli_close($conexion);
 

?>