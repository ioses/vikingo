<?php 
session_start();
require_once ('../../../BDD/conexion.php');

/*
$sqlEstadistica="SELECT identificador_paciente.Id_Hospital, AES_DECRYPT (identificador_paciente.NHC,'$claveNHC') AS NHC, identificador_paciente.Fecha_Nacimiento,
				identificador_paciente.Id_Sexo, cirugia.B_Cirugia, tabla_cirugia.Fecha_Intervencion, anatomia_patologica.Id_Estadio_Patologico, anatomia_patologica.Id_Tipo_Res,
				tabla_cirugia.Id_Tecnica, seguimiento.B_Recidiva, tabla_recidiva.Fecha_Recidiva, seguimiento.B_Metastasis, tabla_metastasis.Fecha_Metastasis, seguimiento.B_Estado,
				tabla_estado.Fecha_Muerte, inicial.Localizacion, tabla_caracteristicas_cirugia.Perforacion_Tumoral, anatomia_patologica.Id_Margen_Circunferencial,
				anatomia_patologica.Id_Margen_Distal, tabla_neo.Id_Tipo_Neo, seguimiento.Fecha_Revision, anatomia_patologica.Id_Meso_Cal FROM identificador_paciente
				INNER JOIN cirugia ON cirugia.Id_Paciente=identificador_paciente.ID INNER JOIN tabla_cirugia ON tabla_cirugia.Id_Cirugia=cirugia.ID INNER JOIN anatomia_patologica ON
				anatomia_patologica.Id_Paciente=identificador_paciente.ID INNER JOIN seguimiento ON seguimiento.Id_Paciente=identificador_paciente.ID INNER JOIN tabla_recidiva ON 
				tabla_recidiva.Id_Seguimiento=seguimiento.ID INNER JOIN tabla_metastasis ON tabla_metastasis.Id_Seguimiento=seguimiento.ID INNER JOIN tabla_estado ON 
				tabla_estado.Id_Seguimiento=seguimiento.ID INNER JOIN inicial ON inicial.Id_Paciente=identificador_paciente.ID INNER JOIN tabla_caracteristicas_cirugia ON
				tabla_caracteristicas_cirugia.Id_Cirugia=cirugia.ID INNER JOIN tratamiento ON tratamiento.Id_Paciente=identificador_paciente.ID INNER JOIN tabla_neo ON
				tabla_neo.Id_Tratamiento=tratamiento.ID";
*/				

$hoy=date("y-m-d");

//header("Content-Type: application/force-download");
//header('Content-type: application/vnd.ms-excel; charset=utf8'); 

//header("Content-Transfer-Encoding: binary");
//header ("Pragma: no-cache");
//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");   
//header("Expires: 0");

        header("Cache-Control: no-cache, must-revalidate"); 
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Content-type: application/x-msexcel");  
		header("Content-Disposition: attachment; filename=Estadistica_$hoy.csv"); 
        header("Content-Description: PHP/INTERBASE Generated Data" ); 
        header("Expires: 0"); 
        
echo "<table border=1> "; 
echo "<tr> "; 
echo "<th>HOSPITAL</th> "; 
echo "<th>NHC</th> "; 
echo "<th>FEC_NAC</th> "; 
echo "<th>SEXO</th> ";
echo "<th>CIRUGIA</th> ";
echo "<th>FEC_CIR</th> ";
echo "<th>Campo.Estadio</th> ";
echo "<th>TIPO_RES</th> ";
echo "<th>TEC_CIR</th> ";
echo "<th>C_RECIDIVA</th> ";
echo "<th>Fecha_Recidiva</th> ";
echo "<th>METAS</th> ";
echo "<th>Fecha.Metastasis</th> ";
echo "<th>VIVO</th> ";
echo "<th>Fecha.fallecimiento</th> ";
echo "<th>LOCALIZ</th> ";
echo "<th>PERFORA</th> ";
echo "<th>M_CIRCUN</th> ";
echo "<th>M_DISTAL</th> ";
echo "<th>TTO_NEO</th> ";
echo "<th>FEC_REV</th> ";
echo "<th>MESO_CAL</th> ";
echo "<th>URG_CIR</th> ";

echo "</tr> "; 

$sqlEstadistica="SELECT * FROM tabla_estadistica";

$result = mysqli_query($conexion,$sqlEstadistica) or die(mysql_error()); 



while($row = mysqli_fetch_array($result)){
echo "<td>".$row[0]."</td> "; //Hospital
echo "<td>".$row[1]."</td> "; //NHC
echo "<td>".$row[2]."</td> "; //Fecha nacimiento
echo "<td>".$row[3]."</td> ";//Sexo

$Cirugia=$row[4];
echo "<td>".$Cirugia."</td> ";//Cirugia

if ($Cirugia==1){
	echo "<td>".$row[5]."</td> "; //Fecha cirugia	
}else{
	echo "<td></td> "; //Fecha cirugia
}

$EstadioPato=$row[6];
if ($EstadioPato==6){
	echo "<td>0</td> "; //Estadio patologico
}else{
	echo "<td>".$EstadioPato."</td> "; //Estadio patologico
}


//Adecuacion valores tipo reseccion
$TipoRes=$row[7];

if ($TipoRes==0 || $TipoRes==4){
	echo "<td></td>"; 
}else if($TipoRes==1|| $TipoRes==2||$TipoRes==3){
	$TipoRes=$TipoRes-1;
	echo "<td>".$TipoRes."</td> ";
}


//Eliminación de 0 en técnica quirúrgica

$Tec_Cir=$row[8];

if($Tec_Cir==0){
	echo "<td></td>";
}else{
	echo "<td>".$Tec_Cir."</td> ";//Tecnica quirurgica	
}


echo "<td>".$row[9]."</td> ";//Recidiva	
echo "<td>".$row[10]."</td> "; //Fecha de recidiva
echo "<td>".$row[11]."</td> "; //Metastasis
echo "<td>".$row[12]."</td> "; //Fecha de metastasis

$Estado=$row[13];

echo "<td>".$Estado."</td> ";//Estado (Vivo o muerto)

//Fecha de fallecimiento
if($Estado==1){
	echo "<td></td>";
}else{
	echo "<td>".$row[14]."</td> ";//Fecha de fallecimiento
}


echo "<td>".$row[15]."</td> "; //Localizacion
echo "<td>".$row[16]."</td> "; //Perforacion


//Cálculo de margen circunferencial

$M_Circun=$row[17];

if ($M_Circun==0 || $M_Circun==3){
	echo "<td></td>";
}else{
	echo "<td>".$M_Circun."</td> ";//Margen circunferencial
}


//Cálculo de margen distal


$M_Distal=$row[18];

if ($M_Distal==0 || $M_Distal==3){
	echo "<td></td>";
}else{
	echo "<td>".$M_Distal."</td> ";//Margen dsital
}



echo "<td>".$row[19]."</td> ";//Tratamiento neoadyuvante
echo "<td>".$row[20]."</td> ";//Fecha de revision


$Meso_Cal=$row[21];

if ($Meso_Cal==0 || $Meso_Cal==4){
	echo "<td></td>";
}else{
	echo "<td>".$Meso_Cal."</td> ";//Calidad de mesorrecto
}

echo "<td>".$row[22]."</td> ";//Urgencia cirugia		
			
echo "</tr>";

}

echo "</table>";

/*
$sqlEstadistica="SELECT identificador_paciente.Id_Hospital, identificador_paciente.ID, identificador_paciente.Fecha_Nacimiento,
				identificador_paciente.Id_Sexo, cirugia.B_Cirugia FROM identificador_paciente
				INNER JOIN cirugia ON cirugia.Id_Paciente=identificador_paciente.ID";




$result = mysqli_query($conexion,$sqlEstadistica) or die(mysql_error()); 



while($row = mysqli_fetch_array($result)){
	
$NHC=$row[1];
$sqlIdPaciente="SELECT ID FROM identificador_paciente WHERE ID=$NHC";
	
	$resultIdPaciente = mysqli_query($conexion,$sqlIdPaciente) or die(mysql_error()); 	
	$rowID=mysqli_fetch_array($resultIdPaciente);
	$IdPaciente=$rowID[0];
	
echo "<tr>";
	
echo "<td>".$row[0]."</td> "; 
echo "<td>".$NHC."</td> "; 
echo "<td>".$row[2]."</td> "; 
echo "<td>".$row[3]."</td> ";
echo "<td>".$row[4]."</td> ";

if ($row[4]==2 || $row[4]==0){
	echo "<td>".null."</td> ";
	
}else{
	$sqlCirugia= "SELECT ID FROM cirugia WHERE Id_Paciente='$IdPaciente'";
	$resultCir = mysqli_query($conexion,$sqlCirugia) or die(mysql_error()); 	
	$rowCir=mysqli_fetch_array($resultCir);
	$IdCirugia=$rowCir[0];
	//echo "<td>".$IdCirugia."</td> ";
	
	$sqlFechaCirugia="SELECT Fecha_Intervencion, Id_Tecnica FROM tabla_cirugia WHERE Id_Cirugia='$IdCirugia'";
	$resultFecCir = mysqli_query($conexion,$sqlFechaCirugia) or die(mysql_error()); 	
	$rowCirugia=mysqli_fetch_array($resultFecCir);
	echo "<td>".$rowCirugia[0]."</td> ";

}
 
 //Se obtienen todos los datos de anatomia patologica

$SQLAnatomiaPatologica="SELECT Id_Estadio_Patologico, Id_Tipo_Res, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Meso_Cal FROM anatomia_patologica WHERE Id_Paciente='$IdPaciente'";
$resultAnatomia = mysqli_query($conexion,$SQLAnatomiaPatologica) or die(mysql_error()); 	
	if(mysqli_num_rows($resultAnatomia)==0){//Estadio patologico
		 echo "<td>5</td> ";
	}else{
	
	$rowAnatomiaPat=mysqli_fetch_array($resultAnatomia);
 	echo "<td>".$rowAnatomiaPat[0]."</td> ";
	}

	
	if(mysqli_num_rows($resultAnatomia)==0){ //Tipo de reseccion
		 echo "<td>".null."</td> ";
	}else{
	
	$TipoRes=intval($rowAnatomiaPat[1])-1; //Se resta para obtener el valor real porque se almacena R0=1, R1=2 y R2=3
 	echo "<td>".$TipoRes."</td> ";
	}

if ($row[4]==2 || $row[4]==0){
	echo "<td>".null."</td> ";
	
}else{
	echo "<td>".$rowCirugia[1]."</td> ";  //Tecnica cirugia

}


//Campos de la tabla de seguimiento

$SQLSeguimiento="SELECT ID, B_Recidiva, B_Metastasis, B_Estado, Fecha_Revision FROM seguimiento WHERE Id_Paciente='$IdPaciente'";
$resultSeguimiento = mysqli_query($conexion,$SQLSeguimiento) or die(mysql_error()); 

$rowSeguimiento=mysqli_fetch_array($resultSeguimiento);


//Recidiva
echo "<td>".$rowSeguimiento[1]."</td> ";



//Fecha de recidiva
if ($rowSeguimiento[1]==1){
	$SQLFechaRecidiva="SELECT Fecha_Recidiva FROM tabla_recidiva WHERE Id_Seguimiento='$rowSeguimiento[0]'";
	$resultFechaRecidiva = mysqli_query($conexion,$SQLFechaRecidiva) or die(mysql_error()); 

	$rowFechaRecidiva=mysqli_fetch_array($resultFechaRecidiva);
	echo "<td>".$rowFechaRecidiva[0]."</td> ";	
	
}else{
echo "<td>".$rowSeguimiento[4]."</td> ";	
}

//Metastasis
echo "<td>".$rowSeguimiento[2]."</td> ";


//Fecha de metastasis

//Fecha de recidiva
if ($rowSeguimiento[2]==1){
	$SQLFechaMetastasis="SELECT Fecha_Metastasis FROM tabla_metastasis WHERE Id_Seguimiento='$rowSeguimiento[0]'";
	$resultFechaMetastasis = mysqli_query($conexion,$SQLFechaMetastasis) or die(mysql_error()); 

	$rowFechaMetastasis=mysqli_fetch_array($resultFechaMetastasis);
	echo "<td>".$rowFechaMetastasis[0]."</td> ";	
	
}else{
echo "<td>".$rowSeguimiento[4]."</td> ";	
}

//VIVO
echo "<td>".$rowSeguimiento[3]."</td> ";

//Fecha de muerte
if ($rowSeguimiento[3]==2){
	$SQLFechaMuerte="SELECT Fecha_Muerte FROM tabla_estado WHERE Id_Seguimiento='$rowSeguimiento[0]'";
	$resultFechaMuerte = mysqli_query($conexion,$SQLFechaMuerte) or die(mysql_error()); 

	$rowFechaMuerte=mysqli_fetch_array($resultFechaMuerte);
	echo "<td>".$rowFechaMuerte[0]."</td> ";	
	
}else{
echo "<td>".$rowSeguimiento[4]."</td> ";	
}

//LOCALIZACION TUMOR
$SQLLocalizacion="SELECT Localizacion FROM inicial WHERE Id_Paciente='$IdPaciente'";
$resultLocalizacion = mysqli_query($conexion,$SQLLocalizacion) or die(mysql_error()); 

	$rowLocalizacion=mysqli_fetch_array($resultLocalizacion);
	echo "<td>".$rowLocalizacion[0]."</td> ";	

//Perforacion del tumor en cirugia

if ($row[4]==2 || $row[4]==0){
	echo "<td>".null."</td> ";
	
}else{
$SQLPerforacion="SELECT Perforacion_Tumoral FROM tabla_caracteristicas_cirugia WHERE Id_Cirugia='$IdCirugia'";
$resultPerforacion = mysqli_query($conexion,$SQLPerforacion) or die(mysql_error()); 

	$rowPerforacion=mysqli_fetch_array($resultPerforacion);
	if ($rowPerforacion[0]==null){
		echo "<td>0</td> ";
	}else{
	echo "<td>".$rowPerforacion[0]."</td> ";
	}	

}

//Margen circunferencial

if(mysqli_num_rows($resultAnatomia)==0){ 
		 echo "<td>".null."</td> ";
	}else{
 	echo "<td>".$rowAnatomiaPat[2]."</td> ";
	}
	

//Margen distal
if(mysqli_num_rows($resultAnatomia)==0){ 
		 echo "<td>".null."</td> ";
	}else{
 	echo "<td>".$rowAnatomiaPat[3]."</td> ";
	}	

//Tratamiento neoadyuvante

$SQLTtoNeo="SELECT B_Tto_Neo FROM tratamiento WHERE Id_Paciente='$IdPaciente'";
$resulttratamiento = mysqli_query($conexion,$SQLTtoNeo) or die(mysql_error()); 

	$rowTtoNeo=mysqli_fetch_array($resulttratamiento);
	echo "<td>".$rowTtoNeo[0]."</td> ";





//Fecha de revision

echo "<td>".$rowSeguimiento[4]."</td> ";


//Calidad mesorrecto

if(mysqli_num_rows($resultAnatomia)==0){ 
		 echo "<td>".null."</td> ";
	}else{
 	echo "<td>".$rowAnatomiaPat[4]."</td> ";
	}




echo "</tr>";

}
*/
echo "</table>";



mysqli_close($conexion);
 
?>
 
 