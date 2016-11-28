<?php


//session_start();


//Hacemos la conexión
$conexion = mysqli_connect("www.proyectovikingo.org","proyectovikingo","vgfD2efdf4xD","proyectovikingo") or die (mysql_error());
//$conexion = mysqli_connect("d438.dinaserver.com","proyvikingo","123123vikingo","dbbvikingo") or die (mysql_error());

//$fp = fopen(__DIR__ . "/reports/report.csv" , "w+");
$this_directory = dirname( __FILE__ );
echo "Archivo guardado en: " . $this_directory . "\n";
echo "Fecha: " . date("d/m/y H:i:s") . "\n";
//$fp = fopen($this_directory . "/reports/report.csv" , "w+");
$f = fopen($this_directory ."/datos2.csv","w+");
$sep = ";"; //separador



$Titulos="HOSPITAL".$sep."NHC".$sep."FEC_NAC".$sep."SEXO".$sep."CIRUGIA".$sep."FEC_CIR".$sep."Campo.Estadio".$sep."TIPO_RES".$sep
			."TEC_CIR".$sep."C_RECIDIVA".$sep."Fecha_Recidiva".$sep."METAS".$sep."Fecha.Metastasis".$sep."VIVO".$sep
			."Fecha-fallecimiento".$sep."LOCALIZ".$sep."PERFORA".$sep."M_CIRCUN".$sep."M_DISTAL".$sep."TTO_NEO".$sep
			."FEC_REV".$sep."MESO_CAL".$sep."URG_CIR". "\n";

fwrite($f,$Titulos);


$sqlEst="SELECT * FROM tabla_estadistica";



$res = mysqli_query($conexion,$sqlEst) or die(mysqli_error());


while($row = mysqli_fetch_array($res)) {


$Hospital=$row[0]; //Hospital

$NHC=$row[1]; //NHC
$FechaNac=$row[2]; //Fecha nacimiento
$Sexo=$row[3];//Sexo

$Cirugia=$row[4];//Cirugia

$FechaCir="";
if ($Cirugia==1){
	$FechaCir=$row[5]; //Fecha cirugia
	$FechaCir = date("d/m/Y", strtotime($FechaCir));	
}

$EstadioPato=$row[6];
if ($EstadioPato==6){
	$EstadioPato=0;
}


//Adecuacion valores tipo reseccion
$TipoRes=$row[7];

if ($TipoRes==0 || $TipoRes==4){
	$TipoRes=""; 
}else if($TipoRes==1|| $TipoRes==2||$TipoRes==3){
	$TipoRes=$TipoRes-1;
}

//Eliminación de 0 en técnica quirúrgica

$Tec_Cir=$row[8];

if($Tec_Cir==0){
	$Tec_Cir="";
}

$Recidiva=$row[9];//Recidiva	
$FechaRec=$row[10]; //Fecha de recidiva
$Metas=$row[11]; //Metastasis
$FechaMetas=$row[12]; //Fecha de metastasis

$Estado=$row[13];
$FechaMuerte="";
//Fecha de fallecimiento
if($Estado==1){
	$FechaMuerte="";
}else{
	$FechaMuerte=$row[14];//Fecha de fallecimiento
	$FechaMuerte = date("d/m/Y", strtotime($FechaMuerte));
}


$Localizacion=$row[15]; //Localizacion
$Perforacion=$row[16]; //Perforacion


//Cálculo de margen circunferencial

$M_Circun=$row[17];

if ($M_Circun==0 || $M_Circun==3){
	$M_Circun="";
}


//Cálculo de margen distal


$M_Distal=$row[18];

if ($M_Distal==0 || $M_Distal==3){
	$M_Distal="";
}



$Tto_Neo=$row[19];//Tratamiento neoadyuvante
$FechaRev=$row[20];//Fecha de revision


$Meso_Cal=$row[21];

if ($Meso_Cal==0 || $Meso_Cal==4){
	$Meso_Cal="";
}

$Urgencia=$row[22];//Urgencia cirugia		
	

$FechaNac = date("d/m/Y", strtotime($FechaNac));

$FechaRec = date("d/m/Y", strtotime($FechaRec));
$FechaMetas = date("d/m/Y", strtotime($FechaMetas));

$FechaRev = date("d/m/Y", strtotime($FechaRev));


$linea=$Hospital.$sep.$NHC.$sep.$FechaNac.$sep.$Sexo.$sep.$Cirugia.$sep.$FechaCir.$sep.$EstadioPato.$sep.
		$TipoRes.$sep.$Tec_Cir.$sep.$Recidiva.$sep.$FechaRec.$sep.$Metas.$sep.$FechaMetas.$sep.$Estado.$sep.
		$FechaMuerte.$sep.$Localizacion.$sep.$Perforacion.$sep.$M_Circun.$sep.$M_Distal.$sep.$Tto_Neo.$sep.
		$FechaRev.$sep.$Meso_Cal.$sep.$Urgencia."\n";
	

	
	
	
	
	
fwrite($f,$linea);
}
fclose($f);


mysqli_close($conexion);

echo "Archivo correctamente realizado \n\n";


//header("Location: http://proyectovikingo.shinyapps.io/pvikingo");





?> 
