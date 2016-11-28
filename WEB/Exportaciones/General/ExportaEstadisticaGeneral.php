<?php 
session_start();
require_once ('../../BDD/conexion.php');


$hoy=date("y-m-d");

$nombre_hospital = $_SESSION["NombreHospital"];


$sqlHospital = "SELECT Codigo FROM tabla_hospital
                WHERE  Nombre = '$nombre_hospital'";
                       
$rsHospital = mysqli_query($conexion,$sqlHospital)
or die('Error: ' . mysqli_error());
    
$exite = mysqli_num_rows($rsHospital);

$hospital = 0;
    
if ($exite > 0) //Hay datos, miramos si tiene las variables de los informes
{
    while($rowHospital=mysqli_fetch_array($rsHospital))
    {
        $hospital = $rowHospital["Codigo"];
    }
}


header("Cache-Control: no-cache, must-revalidate"); 
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-type: application/x-msexcel");  
header("Content-Disposition: attachment; filename=EstadisticaGeneral_$hoy.xls"); 
header("Content-Description: PHP/INTERBASE Generated Data" ); 
header("Expires: 0"); 
        
echo "<table border=1> "; 


echo "<tr> "; 
if ($_POST["Hospital"] == 1)
{
    echo "<th>Hospital</th> ";  
}
if ($_POST["NHC"] == 1)
{
    echo "<th style=\"mso-number-format:'@';\" >NHC</th> ";   
}
if ($_POST["Recidiva"] == 1)
{
    echo "<th>Recidiva</th> "; 
}
if ($_POST["FechaRecidiva"] == 1)
{
    echo "<th>FechaRecidiva</th> ";
}
if ($_POST["Localizacion_Recidiva"] == 1)
{
    echo "<th>Localizacion_Recidiva</th> ";
}
if ($_POST["Intervencion_Recidiva"] == 1)
{
    echo "<th>Intervencion_Recidiva</th> ";
}
if ($_POST["Metastasis"] == 1)
{
    echo "<th>Metastasis</th> ";
}
if ($_POST["FechaMetastasis"] == 1)
{
    echo "<th>FechaMetastasis</th> ";
}
if ($_POST["Localizacion_Metastasis"] == 1)
{
    echo "<th>Localizacion_Metastasis</th> ";
}
if ($_POST["Intervencion_Metastasis"] == 1)
{
    echo "<th>Intervencion_Metastasis</th> ";
}
if ($_POST["SegundoTumor"] == 1)
{
    echo "<th>SegundoTumor</th> ";
}
if ($_POST["FechaSegundoTumor"] == 1)
{
    echo "<th>FechaSegundoTumor</th> ";
}
if ($_POST["Localizacion_Segundo_Tumor"] == 1)
{
    echo "<th>Localizacion_Segundo_Tumor</th> ";
}
if ($_POST["Intervencion_Segundo_Tumor"] == 1)
{
    echo "<th>Intervencion_Segundo_Tumor</th> ";
}
if ($_POST["EstadoPaciente"] == 1)
{
    echo "<th>EstadoPaciente</th> ";
}
if ($_POST["CausaMuerte"] == 1)
{
    echo "<th>CausaMuerte</th> ";
}
if ($_POST["FechaMuerte"] == 1)
{
    echo "<th>FechaMuerte</th> ";
}
if ($_POST["FechaUltimaVisita"] == 1)
{
    echo "<th>FechaUltimaVisita</th> ";
}
if ($_POST["ImposibilidadSeguimiento"] == 1)
{
    echo "<th>ImposibilidadSeguimiento</th> ";
}
if ($_POST["Causa_Imposibilidad"] == 1)
{
    echo "<th>Causa_Imposibilidad</th> ";
}
if ($_POST["MesesSeguimiento"] == 1)
{
    echo "<th>MesesSeguimiento</th> ";
}
if ($_POST["FechaNacimiento"] == 1)
{
    echo "<th>FechaNacimiento</th> ";
}
if ($_POST["Sexo"] == 1)
{
    echo "<th>Sexo</th> ";
}
if ($_POST["Localizacion"] == 1)
{
    echo "<th>Localizacion</th> ";
}
if ($_POST["TumorSincronico"] == 1)
{
    echo "<th>TumorSincronico</th> ";
}
if ($_POST["ECO"] == 1)
{
    echo "<th>ECO</th> ";
}
if ($_POST["EcoT"] == 1)
{
    echo "<th>EcoT</th> ";
}
if ($_POST["EcoN"] == 1)
{
    echo "<th>EcoN</th> ";
}
if ($_POST["TAC"] == 1)
{
    echo "<th>TAC</th> ";
}
if ($_POST["RMN"] == 1)
{
    echo "<th>RMN</th> ";
}
if ($_POST["RmnT"] == 1)
{
    echo "<th>RmnT</th> ";
}
if ($_POST["RmnN"] == 1)
{
    echo "<th>RmnN</th> ";
}
if ($_POST["Dist_Tumor"] == 1)
{
    echo "<th>Distancia_Tumor</th> ";
}
if ($_POST["Dist_Adeno"] == 1)
{
    echo "<th>Distancia_Adenopatia</th> ";
}
if ($_POST["EstadioRadiologico"] == 1)
{
    echo "<th>EstadioRadiologico</th>";
}
if ($_POST["Integ_Esfinter"] == 1)
{
    echo "<th>Integridad_Esfinter</th> ";
}
if ($_POST["Invasion"] == 1)
{
    echo "<th>Invasion</th>";
}
if ($_POST["MetastasisInicial"] == 1)
{
    echo "<th>MetastasisInicial</th>";
}
if ($_POST["FechaAltaSistema"] == 1)
{
    echo "<th>FechaAltaSistema</th>";
}
if ($_POST["Cirugia"] == 1)
{
    echo "<th>Cirugia</th>";
}
if ($_POST["MotivoNoCirugia"] == 1)
{
    echo "<th>MotivoNoCirugia</th>";
}
if ($_POST["Planificacion"] == 1)
{
    echo "<th>Planificacion</th>";
}
if ($_POST["FechaCirugia"] == 1)
{
    echo "<th>FechaCirugia</th>";
}
if ($_POST["FechaAlta"] == 1)
{
    echo "<th>FechaAlta</th>";
}
if ($_POST["Cirujano_Principal"] == 1)
{
    echo "<th>Cirujano_Principal</th>";
}
if ($_POST["Cirujano_Ayudante"] == 1)
{
    echo "<th>Cirujano_Ayudante</th>";
}
if ($_POST["Tecnica"] == 1)
{
    echo "<th>Tecnica</th>";
}
if ($_POST["OtraTecnica"] == 1)
{
    echo "<th>OtraTecnica</th>";
}
if ($_POST["Orientacion"] == 1)
{
    echo "<th>Orientacion</th>";
}
if ($_POST["ExeresisMesorrecto"] == 1)
{
    echo "<th>Exeresis_Mesorrecto</th>";
}
if ($_POST["OtrasResecciones"] == 1)
{
    echo "<th>Otras_Resecciones</th>";
}
if ($_POST["ASA"] == 1)
{
    echo "<th>ASA</th>";
}
if ($_POST["Hallazgos"] == 1)
{
    echo "<th>Hallazgos</th>";
}
if ($_POST["Perforacion"] == 1)
{
    echo "<th>Perforacion</th>";
}
if ($_POST["MetastasisHepaticas"] == 1)
{
    echo "<th>Metastasis_Hepaticas</th>";
}
if ($_POST["ImpOvaricos"] == 1)
{
    echo "<th>Implantes_Ovaricos</th>";
}
if ($_POST["Obstruccion"] == 1)
{
    echo "<th>Obstruccion</th>";
}
if ($_POST["ViaOperacion"] == 1)
{
    echo "<th>Via_Operacion</th>";
}
if ($_POST["TiempoOperacion"] == 1)
{
    echo "<th>Tiempo_Operacion</th>";
}
if ($_POST["Transfusiones"] == 1)
{
    echo "<th>Transfusiones</th>";
}
if ($_POST["Intencion"] == 1)
{
    echo "<th>Intencion</th>";
}
if ($_POST["Anastomosis"] == 1)
{
    echo "<th>Anastomosis</th>";
}
if ($_POST["Reservorio"] == 1)
{
    echo "<th>Reservorio</th>";
}
if ($_POST["Estoma"] == 1)
{
    echo "<th>Estoma</th>";
}
if ($_POST["TipoEstoma"] == 1)
{
    echo "<th>Tipo_Estoma</th>";
}
if ($_POST["Complicaciones"] == 1)
{
    echo "<th>Complicaciones</th>";
}
if ($_POST["Reintervencion"] == 1)
{
    echo "<th>Reintervencion</th>";
}
if ($_POST["ReintTexto"] == 1)
{
    echo "<th>Texto_Reintervencion</th>";
}
/*
if ($_POST["ExitusIntra"] == 1)
{
    echo "<th>ExitusIntra</th>";
}
if ($_POST["ExitusIntraTexto"] == 1)
{
    echo "<th>ExitusIntraTexto</th>";
}
 * */
if ($_POST["ExitusPost"] == 1)
{
    echo "<th>Exitus_Post</th>";
}
if ($_POST["ExitusPostTexto"] == 1)
{
    echo "<th>Texto_Exitus_Post</th>";
}
if ($_POST["GSepsis"] == 1)
{
    echo "<th>Sepsis</th>";
}
if ($_POST["GShock"] == 1)
{
    echo "<th>Shock</th>";
}
if ($_POST["HHemo"] == 1)
{
    echo "<th>Herida_Hemorragia</th>";
}
if ($_POST["HInfec"] == 1)
{
    echo "<th>Herida_Infeccion</th>";
}
if ($_POST["HEvis"] == 1)
{
    echo "<th>Herida_Evisceracion</th>";
}
if ($_POST["HEvent"] == 1)
{
    echo "<th>Herida_Eveventracion</th>";
}
if ($_POST["PInfec"] == 1)
{
    echo "<th>Perine_Infec</th>";
}
if ($_POST["PCicat"] == 1)
{
    echo "<th>Perine_Cicatriz</th>";
}
if ($_POST["PHernia"] == 1)
{
    echo "<th>Perine_Hernia</th>";
}
if ($_POST["AHemop"] == 1)
{
    echo "<th>Hemorragia_abdominal</th>";
}
if ($_POST["APerit"] == 1)
{
    echo "<th>Peritonitis_difusas</th>";
}
if ($_POST["AAbsce"] == 1)
{
    echo "<th>Absceso_Abdominal</th>";
}/*
if ($_POST["AHemoAbdo"] == 1)
{
    echo "<th>AHemoAbdo</th>";
}*/
if ($_POST["AAbscePel"] == 1)
{
    echo "<th>Absceso_Pelvico</th>";
}
if ($_POST["AHemoPel"] == 1)
{
    echo "<th>Hemorragia_Pelvico</th>";
}
if ($_POST["AIsque"] == 1)
{
    echo "<th>Isquemia</th>";
}
if ($_POST["AColec"] == 1)
{
    echo "<th>Colecistitis</th>";
}
if ($_POST["AIatro"] == 1)
{
    echo "<th>Iatrogenia_Vias_Macizas</th>";
}
if ($_POST["AIatroHuecas"] == 1)
{
    echo "<th>Iatrogenia_Vias_Huecas</th>";
}
if ($_POST["AIleopa"] == 1)
{
    echo "<th>Ileo_Paralitico</th>";
}
if ($_POST["IleoMec"] == 1)
{
    echo "<th>Ileo_Mecanico</th>";
}
if ($_POST["AEstoma"] == 1)
{
    echo "<th>Estoma</th>";
}
if ($_POST["AnHemo"] == 1)
{
    echo "<th>Anastomosis_Hemorragia</th>";
}
if ($_POST["AnFuga"] == 1)
{
    echo "<th>Anastomosis_Fuga</th>";
}
if ($_POST["AnFistula"] == 1)
{
    echo "<th>Anastomosis_Fistula</th>";
}
if ($_POST["OHemo"] == 1)
{
    echo "<th>Hemorragia_Digestiva</th>";
}
if ($_POST["OUrologicas"] == 1)
{
	//Está cambiado con infecciosas
    echo "<th>Urologicas_Mecanicas</th>";
}
if ($_POST["OInfur"] == 1)
{
    echo "<th>Urologicas_Infecciosas</th>";
}
if ($_POST["ORespi"] == 1)
{
	//Mirar si esta bien
    echo "<th>Respiratoria_Mecanica</th>";
}
if ($_POST["ORespiInfecc"] == 1)
{
    echo "<th>Respiratoria_Infecciosa</th>";
}
if ($_POST["OHepat"] == 1)
{
    echo "<th>Hepatica</th>";
}
if ($_POST["OVascuMec"] == 1)
{
    echo "<th>Vascular_Mecanica</th>";
}
if ($_POST["OVascuInfecc"] == 1)
{
    echo "<th>Vascular_Infecciosa</th>";
}
if ($_POST["OFMO"] == 1)
{
    echo "<th>FMO</th>";
}
if ($_POST["OTEP"] == 1)
{
    echo "<th>TEP</th>";
}
if ($_POST["ONeuro"] == 1)
{
    echo "<th>Neurologicas</th>";
}
if ($_POST["ORenal"] == 1)
{
    echo "<th>Insuficiencia_Renal</th>";
}
if ($_POST["OCardio"] == 1)
{
    echo "<th>Cardiologicas</th>";
}

if ($_POST["TtoNeo"] == 1)
{
    echo "<th>TtoNeo</th>";
}
if ($_POST["TipoNeo"] == 1)
{
    echo "<th>TipoNeo</th>";
}
if ($_POST["TipoNoNeo"] == 1)
{
    echo "<th>TipoNoNeo</th>";
}
if ($_POST["TtoAdy"] == 1)
{
    echo "<th>TtoAdy</th>";
}
if ($_POST["TipoAdy"] == 1)
{
    echo "<th>TipoAdy</th>";
}
if ($_POST["ApT"] == 1)
{
    echo "<th>ApT</th>";
}
if ($_POST["ApN"] == 1)
{
    echo "<th>ApN</th>";
}
if ($_POST["ApM"] == 1)
{
    echo "<th>ApM</th>";
}
if ($_POST["GangliosAis"] == 1)
{
    echo "<th>GangliosAis</th>";
}
if ($_POST["GangliosAfec"] == 1)
{
    echo "<th>GangliosAfec</th>";
}
if ($_POST["Tipo_Histologico"] == 1)
{
    echo "<th>Tipo_Histologico</th>";
}
if ($_POST["Otros_Histologico"] == 1)
{
    echo "<th>Otros_Tipos_Histologico</th>";
}
if ($_POST["Estadio_Tumor_Sincronico"] == 1)
{
    echo "<th>Estadio_Tumor_Sincronico</th>";
}
if ($_POST["MargenDistal"] == 1)
{
    echo "<th>MargenDistal</th>";
}
if ($_POST["MargenCircun"] == 1)
{
    echo "<th>MargenCircun</th>";
}
if ($_POST["TipoRes"] == 1)
{
    echo "<th>TipoRes</th>";
}
if ($_POST["Regresion"] == 1)
{
    echo "<th>Regresion</th>";
}
if ($_POST["MesoCal"] == 1)
{
    echo "<th>MesoCal</th>";
}
if ($_POST["EstadioPatologico"] == 1)
{
    echo "<th>EstadioPatologico</th>";
}
if ($_POST["Comentarios_Adicionales"] == 1)
{
    echo "<th>ComentariosAdicionales</th>";
}

echo "</tr> ";


$sqlTablaGeneral="SELECT * FROM tabla_general WHERE Hospital = '$hospital'";

$result=mysqli_query($conexion, $sqlTablaGeneral) or die (mysql_error());


while($row = mysqli_fetch_array($result)){
	echo"<tr>";
	
if ($_POST["Hospital"] == 1)
{
    echo "<td>".$row["Hospital"]."</td> ";
}
if ($_POST["NHC"] == 1)
{
    echo "<td style=\"mso-number-format:'@';\" >".$row["NHC"]."</td> ";  
}
if ($_POST["Recidiva"] == 1)
{
    echo "<td>".$row["Recidiva"]."</td> "; 
}
if ($_POST["FechaRecidiva"] == 1)
{
   echo "<td>".$row["FechaRecidiva"]."</td> ";
}
if ($_POST["Localizacion_Recidiva"] == 1)
{
    $Localizacion_Recidiva=$row["Localizacion_Recidiva"];
	
	if($Localizacion_Recidiva==0){
    	echo "<td>".null."</td> ";
	}else{
		$sqlLocRec="SELECT Tipo FROM tabla_seg_localiz_recidiva WHERE ID=$Localizacion_Recidiva";			
		
		$resultLocRec=mysqli_query($conexion, $sqlLocRec) or die (mysql_error());		
			
		$rowLocRec = mysqli_fetch_array($resultLocRec);
		
		echo "<td>".$rowLocRec[0]."</td> ";
	}
}
if ($_POST["Intervencion_Recidiva"] == 1)
{
   echo "<td>".$row["Intervencion_Recidiva"]."</td> ";
}
if ($_POST["Metastasis"] == 1)
{
    echo "<td>".$row["Metastasis"]."</td> ";
}
if ($_POST["FechaMetastasis"] == 1)
{
    echo "<td>".$row["FechaMetastasis"]."</td> ";
}
if ($_POST["Localizacion_Metastasis"] == 1)
{
    $Localizacion_Metastasis=$row["Localizacion_Metastasis"];
	
	if($Localizacion_Metastasis==0){
    	echo "<td>".null."</td> ";
	}else{
		$sqlLocMet="SELECT Tipo FROM tabla_seg_localiz_metastasis WHERE ID=$Localizacion_Metastasis";			
		
		$resultLocMet=mysqli_query($conexion, $sqlLocMet) or die (mysql_error());		
			
		$rowLocMet = mysqli_fetch_array($resultLocMet);
		
		echo "<td>".$rowLocMet[0]."</td> ";
	}
}
if ($_POST["Intervencion_Metastasis"] == 1)
{
   echo "<td>".$row["Intervencion_Metastasis"]."</td> ";
}
if ($_POST["SegundoTumor"] == 1)
{
    echo "<td>".$row["SegundoTumor"]."</td> ";
}
if ($_POST["FechaSegundoTumor"] == 1)
{
   echo "<td>".$row["FechaSegundoTumor"]."</td> ";
}
if ($_POST["Localizacion_Segundo_Tumor"] == 1)
{
    $Localizacion_Segundo_Tumor=$row["Localizacion_Segundo_Tumor"];
	
	if($Localizacion_Segundo_Tumor==0){
    	echo "<td>".null."</td> ";
	}else{
		$sqlLocSegTumor="SELECT Tipo FROM tabla_seg_localiz_segundo_tumor WHERE ID=$Localizacion_Segundo_Tumor";			
		
		$resultLocSegTumor=mysqli_query($conexion, $sqlLocSegTumor) or die (mysql_error());		
			
		$rowLocSegTumor = mysqli_fetch_array($resultLocSegTumor);
		
		echo "<td>".$rowLocSegTumor[0]."</td> ";
	}
}
if ($_POST["Intervencion_Segundo_Tumor"] == 1)
{
   echo "<td>".$row["Intervencion_Segundo_Tumor"]."</td> ";
}
if ($_POST["EstadoPaciente"] == 1)
{
   echo "<td>".$row["EstadoPaciente"]."</td> ";
}
if ($_POST["CausaMuerte"] == 1)
{
	$CausaMuerte=$row["CausaMuerte"];
	
	if ($CausaMuerte==0){
   	 	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$CausaMuerte."</td> ";
	}
}
if ($_POST["FechaMuerte"] == 1)
{
	$FechaMuerte=$row["FechaMuerte"];
	if($FechaMuerte=="0000-00-00"){
    echo "<td>".null."</td> ";
	}else{
		echo "<td>".$FechaMuerte."</td> ";
	}
}
if ($_POST["FechaUltimaVisita"] == 1)
{
    echo "<td>".$row["FechaUltimaVisita"]."</td> ";
}
if ($_POST["ImposibilidadSeguimiento"] == 1)
{
    echo "<td>".$row["ImposibilidadSeguimiento"]."</td> ";
}
if ($_POST["Causa_Imposibilidad"] == 1)
{
    echo "<td>".$row["Causa_Imposibilidad"]."</td> ";
}
if ($_POST["MesesSeguimiento"] == 1)
{
    echo "<td>".$row["MesesSeguimiento"]."</td> ";
}
if ($_POST["FechaNacimiento"] == 1)
{
    echo "<td>".$row["FechaNacimiento"]."</td> ";
}
if ($_POST["Sexo"] == 1)
{
    echo "<td>".$row["Sexo"]."</td> ";
}
if ($_POST["Localizacion"] == 1)
{
    echo "<td>".$row["Localizacion"]."</td> ";
}
if ($_POST["TumorSincronico"] == 1)
{
    echo "<td>".$row["TumorSincronico"]."</td> ";
}
if ($_POST["ECO"] == 1)
{
	$ECO=$row["ECO"];
	if($ECO==0){
		echo "<td>".null."</td> ";
	}else{
    echo "<td>".$ECO."</td> ";
    }
}
if ($_POST["EcoT"] == 1)
{
	$EcoT=$row["EcoT"];
	if($EcoT==0){
		echo "<td>".null."</td> ";
	}else{
    echo "<td>".$EcoT."</td> ";
    }
}
if ($_POST["EcoN"] == 1)
{
	$EcoN=$row["EcoN"];
	if($EcoN==0){
    echo "<td>".null."</td> ";
	}else{
		echo "<td>".$EcoN."</td> ";
	}
}
if ($_POST["TAC"] == 1)
{
    echo "<td>".$row["TAC"]."</td> ";
}


if ($_POST["RMN"] == 1)
{
	$RMN=$row["RMN"];
	if ($RMN==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$RMN."</td> ";
	}
}

if ($_POST["RmnT"] == 1)
{
	$RmnT=$row["RmnT"];
	if ($RmnT==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$RmnT."</td> ";
	}
	
}

if ($_POST["RmnN"] == 1)
{
	$RmnN=$row["RmnN"];
	if ($RmnN==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$RmnN."</td> ";
	}
}
if ($_POST["Dist_Tumor"] == 1)
{
	$Dist_Tumor=$row["Dist_Tumor"];
	if ($Dist_Tumor==-1){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Dist_Tumor."</td> ";
	}
}
if ($_POST["Dist_Adeno"] == 1)
{
	$Dist_Adeno=$row["Dist_Adeno"];
	if ($Dist_Adeno==-1){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Dist_Adeno."</td> ";
	}
}
if ($_POST["EstadioRadiologico"] == 1)
{
    echo "<td>".$row["EstadioRadiologico"]."</td> ";
}
if ($_POST["Integ_Esfinter"] == 1)
{
    echo "<td>".$row["Integ_Esfinter"]."</td> ";
}
if ($_POST["Invasion"] == 1)
{
   echo "<td>".$row["Invasion"]."</td> ";
}
if ($_POST["MetastasisInicial"] == 1)
{
    echo "<td>".$row["MetastasisInicial"]."</td> ";
}
if ($_POST["FechaAltaSistema"] == 1)
{
    echo "<td>".$row["FechaAltaSistema"]."</td> ";
}
if ($_POST["Cirugia"] == 1)
{
   echo "<td>".$row["Cirugia"]."</td> ";
}
if ($_POST["MotivoNoCirugia"] == 1)
{
	$MotivoNoCirugia=$row["MotivoNoCirugia"];
	
	if($MotivoNoCirugia==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$MotivoNoCirugia."</td> ";
	}
}
if ($_POST["Planificacion"] == 1)
{
	$Planificacion=$row["Planificacion"];
	
	if($Planificacion==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Planificacion."</td> ";
	}
}
if ($_POST["FechaCirugia"] == 1)
{
	$FechaCirugia=$row["FechaCirugia"];
	
	if($FechaCirugia=="0000-00-00"){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$FechaCirugia."</td> ";
	}
}
if ($_POST["FechaAlta"] == 1)
{
    $FechaAlta=$row["FechaAlta"];
	
	if($FechaAlta=="0000-00-00"){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$FechaAlta."</td> ";
	}
}
if ($_POST["Cirujano_Principal"] == 1)
{
    $Cirujano_Principal=$row["Cirujano_Principal"];
	
	if($Cirujano_Principal==""){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Cirujano_Principal."</td> ";
	}
}
if ($_POST["Cirujano_Ayudante"] == 1)
{
    $Cirujano_Ayudante=$row["Cirujano_Ayudante"];
	
	if($Cirujano_Ayudante==""){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Cirujano_Ayudante."</td> ";
	}
}
if ($_POST["Tecnica"] == 1)
{
      $Tecnica=$row["Tecnica"];
	
	if($Tecnica==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Tecnica."</td> ";
	}
}
if ($_POST["OtraTecnica"] == 1)
{
     $OtraTecnica=$row["OtraTecnica"];
	
	if($OtraTecnica==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OtraTecnica."</td> ";
	}
}

if ($_POST["Orientacion"] == 1)
{
     $Orientacion=$row["Orientacion"];
	
	if($Orientacion==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Orientacion."</td> ";
	}
}


if ($_POST["ExeresisMesorrecto"] == 1)
{
       $ExeresisMeso=$row["ExeresisMesorrecto"];
	
	if($ExeresisMeso==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ExeresisMeso."</td> ";
	}
}

if ($_POST["OtrasResecciones"] == 1)
{
       $OtrasResecciones=$row["OtrasResecciones"];
	
	if($OtrasResecciones==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OtrasResecciones."</td> ";
	}
}

if ($_POST["ASA"] == 1)
{
    $ASA=$row["ASA"];
	
	if($ASA==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ASA."</td> ";
	}
}
if ($_POST["Hallazgos"] == 1)
{
 $Hallazgos=$row["Hallazgos"];
	
	if($Hallazgos==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Hallazgos."</td> ";
	}
}
if ($_POST["Perforacion"] == 1)
{
 $Perforacion=$row["Perforacion"];
	
	if($Perforacion==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Perforacion."</td> ";
	}
}
if ($_POST["MetastasisHepaticas"] == 1)
{
 $MetastasisHepaticas=$row["MetastasisHepaticas"];
	
	if($MetastasisHepaticas==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$MetastasisHepaticas."</td> ";
	}
}
if ($_POST["ImpOvaricos"] == 1)
{
    $ImplantesOvaricos=$row["ImpOvaricos"];
	
	if($ImplantesOvaricos==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ImplantesOvaricos."</td> ";
	}
}
if ($_POST["Obstruccion"] == 1)
{
    $Obstruccion=$row["Obstruccion"];
	
	if($Obstruccion==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Obstruccion."</td> ";
	}
}

if ($_POST["ViaOperacion"] == 1)
{
   $ViaOperacion=$row["ViaOperacion"];
	
	if($ViaOperacion==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ViaOperacion."</td> ";
	}
}
if ($_POST["TiempoOperacion"] == 1)
{
  $TiempoOperacion=$row["TiempoOperacion"];
	
	if($TiempoOperacion==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$TiempoOperacion."</td> ";
	}
}
if ($_POST["Transfusiones"] == 1)
{
  $Transfusiones=$row["Transfusiones"];
	
	if($Transfusiones==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Transfusiones."</td> ";
	}
}
if ($_POST["Intencion"] == 1)
{
  $Intencion=$row["Intencion"];
	
	if($Intencion==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Intencion."</td> ";
	}
}
if ($_POST["Anastomosis"] == 1)
{
  $Anastomosis=$row["Anastomosis"];
	
	if($Anastomosis==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Anastomosis."</td> ";
	}
}
if ($_POST["Reservorio"] == 1)
{
  $Reservorio=$row["Reservorio"];
	
	if($Reservorio==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Reservorio."</td> ";
	}
}
if ($_POST["Estoma"] == 1)
{
  $Estoma=$row["Estoma"];
	
	if($Estoma==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Estoma."</td> ";
	}
}
if ($_POST["TipoEstoma"] == 1)
{
  $TipoEstoma=$row["TipoEstoma"];
	
	if($TipoEstoma==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$TipoEstoma."</td> ";
	}
}
if ($_POST["Complicaciones"] == 1)
{
  $Complicaciones=$row["Complicaciones"];
	
	if($Complicaciones==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Complicaciones."</td> ";
	}
}
if ($_POST["Reintervencion"] == 1)
{
  $Reintervencion=$row["Reintervencion"];
	
	if($Reintervencion==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Reintervencion."</td> ";
	}
}
if ($_POST["ReintTexto"] == 1)
{
  $ReintervencionTexto=$row["ReintTexto"];
	
	if($ReintervencionTexto==0){
    	echo "<td>".null."</td> ";
	}else{
		$sqlReintTexto="SELECT Tipo FROM tabla_tipo_reintervencion WHERE ID=$ReintervencionTexto";			
		
		$resultReint=mysqli_query($conexion, $sqlReintTexto) or die (mysql_error());		
			
		$rowReint = mysqli_fetch_array($resultReint);
		
		echo "<td>".$rowReint[0]."</td> ";
	}
}
/*
if ($_POST["ExitusIntra"] == 1)
{
  $ExitusIntra=$row[51];
	
	if($ExitusIntra==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ExitusIntra."</td> ";
	}
}
if ($_POST["ExitusIntraTexto"] == 1)
{
  $ExitusIntraTexto=$row[52];
	
	if($ExitusIntraTexto==0){
    	echo "<td>".null."</td> ";
	}else{
		$sqlIntraOpTexto="SELECT Tipo FROM tabla_tipo_exitus_intraop WHERE ID=$ExitusIntraTexto";			
		
		$resultIntra=mysqli_query($conexion, $sqlIntraOpTexto) or die (mysql_error());		
			
		$rowIntra = mysqli_fetch_array($resultIntra);
		
		echo "<td>".$rowIntra[0]."</td> ";
	}
}
 * */
if ($_POST["ExitusPost"] == 1)
{
  $ExitusPost=$row["ExitusPost"];
	
	if($ExitusPost==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ExitusPost."</td> ";
	}
}
if ($_POST["ExitusPostTexto"] == 1)
{
  $ExitusPostTexto=$row["ExitusPostTexto"];
	
	if($ExitusPostTexto==0){
    	echo "<td>".null."</td> ";
	}else{
		$sqlPostOpTexto="SELECT Tipo FROM tabla_tipo_exitus_postop WHERE ID=$ExitusPostTexto";			
		
		$resultPost=mysqli_query($conexion, $sqlPostOpTexto) or die (mysql_error());		
			
		$rowPost = mysqli_fetch_array($resultPost);
		
		echo "<td>".$rowPost[0]."</td> ";
	}
}
if ($_POST["GSepsis"] == 1)
{
  $GSepsis=$row["GeneralSepsis"];
	
	if($GSepsis==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$GSepsis."</td> ";
	}
}
if ($_POST["GShock"] == 1)
{
  $GShock=$row["GeneralShock"];
	
	if($GShock==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$GShock."</td> ";
	}
}
if ($_POST["HHemo"] == 1)
{
  $HHemo=$row["HHemo"];
	
	if($HHemo==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$HHemo."</td> ";
	}
}
if ($_POST["HInfec"] == 1)
{
  $HInfec=$row["HInfec"];
	
	if($HInfec==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$HInfec."</td> ";
	}
}
if ($_POST["HEvis"] == 1)
{
  $HEvis=$row["HEvis"];
	
	if($HEvis==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$HEvis."</td> ";
	}
}
if ($_POST["HEvent"] == 1)
{
  $HEvent=$row["HEventracion"];
	
	if($HEvent==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$HEvent."</td> ";
	}
}
if ($_POST["PInfec"] == 1)
{
    $PInfec=$row["PInfec"];
	
	if($PInfec==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$PInfec."</td> ";
	}
}
if ($_POST["PCicat"] == 1)
{
    $PCicat=$row["PCicat"];
	
	if($PCicat==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$PCicat."</td> ";
	}
}
if ($_POST["PHernia"] == 1)
{
    $PHernia=$row["PHernia"];
	
	if($PHernia==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$PHernia."</td> ";
	}
}
if ($_POST["AHemop"] == 1)
{
    $AHemop=$row["AHemop"];
	
	if($AHemop==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AHemop."</td> ";
	}
}
if ($_POST["APerit"] == 1)
{
    $APerit=$row["APerit"];
	
	if($APerit==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$APerit."</td> ";
	}
}
if ($_POST["AAbsce"] == 1)
{
    $AAbsce=$row["AAbsceAbdo"];
	
	if($AAbsce==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AAbsce."</td> ";
	}
}/*
if ($_POST["AHemoAbdo"] == 1)
{
    $AHemoAbdo=$row[67];
	
	if($AHemoAbdo==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AHemoAbdo."</td> ";
	}
}*/
if ($_POST["AAbscePel"] == 1)
{
    $AAbscePel=$row["AAbscePelvico"];
    
    if($AAbscePel==0){
        echo "<td>".null."</td> ";
    }else{
        echo "<td>".$AAbscePel."</td> ";
    }
}
if ($_POST["AHemoPel"] == 1)
{
    $AHemoPel=$row["AHemoPelvico"];
    
    if($AHemoPel==0){
        echo "<td>".null."</td> ";
    }else{
        echo "<td>".$AHemoPel."</td> ";
    }
}
if ($_POST["AIsque"] == 1)
{
    $AIsque=$row["AIsque"];
	
	if($AIsque==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AIsque."</td> ";
	}
}
if ($_POST["AColec"] == 1)
{
    $AColec=$row["AColec"];
	
	if($AColec==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AColec."</td> ";
	}
}
if ($_POST["AIatro"] == 1)
{
    $AIatro=$row["AIatroMacizas"];
	
	if($AIatro==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AIatro."</td> ";
	}
}
if ($_POST["AIatroHuecas"] == 1)
{
    $AIatroHuecas=$row["AIatroHuecas"];
	
	if($AIatroHuecas==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AIatroHuecas."</td> ";
	}
}
if ($_POST["AIleopa"] == 1)
{
    $AIleopa=$row["AIleopa"];
	
	if($AIleopa==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AIleopa."</td> ";
	}
}

if ($_POST["IleoMec"] == 1)
{
    $IleoMec=$row["IleoMec"];
	
	if($IleoMec==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$IleoMec."</td> ";
	}
}
if ($_POST["AEstoma"] == 1)
{
    $AEstoma=$row["AEstoma"];
	
	if($AEstoma==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AEstoma."</td> ";
	}
}
if ($_POST["AnHemo"] == 1)
{
    $AnHemo=$row["AnHemo"];
	
	if($AnHemo==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AnHemo."</td> ";
	}
}
if ($_POST["AnFuga"] == 1)
{
    $AnFuga=$row["AnFuga"];
	
	if($AnFuga==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AnFuga."</td> ";
	}
}
if ($_POST["AnFistula"] == 1)
{
    $AnFistula=$row["AnFistula"];
	
	if($AnFistula==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$AnFistula."</td> ";
	}
}
if ($_POST["OHemo"] == 1)
{
    $OHemo=$row["OHemo"];
	
	if($OHemo==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OHemo."</td> ";
	}
}
if ($_POST["OUrologicas"] == 1)
{
	
    $OUrologicas=$row["OUroMec"];
	
	if($OUrologicas==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OUrologicas."</td> ";
	}
}
if ($_POST["OInfur"] == 1)
{
	$OInfur=$row["OUroInfecc"];
 
	
	if($OInfur==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OInfur."</td> ";
	}
}
if ($_POST["ORespi"] == 1)
{
    $ORespi=$row["ORespi"];
	
	if($ORespi==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ORespi."</td> ";
	}
}
if ($_POST["ORespiInfecc"] == 1)
{
    $ORespiInfecc=$row["ORespiInfecc"];
	
	if($ORespiInfecc==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ORespiInfecc."</td> ";
	}
}
if ($_POST["OHepat"] == 1)
{
    $OHepat=$row["OHepat"];
	
	if($OHepat==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OHepat."</td> ";
	}
}
if ($_POST["OVascuMec"] == 1)
{
    $OVascuMec=$row["OVascMec"];
	
	if($OVascuMec==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OVascuMec."</td> ";
	}
}
if ($_POST["OVascuInfecc"] == 1)
{
    $OVascuInfecc=$row["OVascInfecc"];
	
	if($OVascuInfecc==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OVascuInfecc."</td> ";
	}
}

if ($_POST["OFMO"] == 1)
{
    $OFMO=$row["OFMO"];
	
	if($OFMO==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OFMO."</td> ";
	}
}
if ($_POST["OTEP"] == 1)
{
    $OTEP=$row["OTEP"];
	
	if($OTEP==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OTEP."</td> ";
	}
}
if ($_POST["ONeuro"] == 1)
{
    $ONeuro=$row["ONeuro"];
	
	if($ONeuro==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ONeuro."</td> ";
	}
}
if ($_POST["ORenal"] == 1)
{
    $ORenal=$row["ORenal"];
	
	if($ORenal==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ORenal."</td> ";
	}
}
if ($_POST["OCardio"] == 1)
{
    $OCardio=$row["OCardiovasc"];
	
	if($OCardio==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$OCardio."</td> ";
	}
}

if ($_POST["TtoNeo"] == 1)
{
    echo "<td>".$row["TtoNeo"]."</td> ";
}
if ($_POST["TipoNeo"] == 1)
{
    $TipoNeo=$row["TipoNeo"];
	
	if($TipoNeo==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$TipoNeo."</td> ";
	}
}
if ($_POST["TipoNoNeo"] == 1)
{
    $TipoNoNeo=$row["TipoNoNeo"];
	
	if($TipoNoNeo==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$TipoNoNeo."</td> ";
	}
}
if ($_POST["TtoAdy"] == 1)
{
    $TtoAdy=$row["TtoAdy"];
	
	if($TtoAdy==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$TtoAdy."</td> ";
	}
}
if ($_POST["TipoAdy"] == 1)
{
    $TipoAdy=$row["TipoAdy"];
	
	if($TipoAdy==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$TipoAdy."</td> ";
	}
}
if ($_POST["ApT"] == 1)
{
    $ApT=$row["ApT"];
	
	if($ApT==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ApT."</td> ";
	}
}
if ($_POST["ApN"] == 1)
{
    $ApN=$row["ApN"];
	
	if($ApN==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ApN."</td> ";
	}
}
if ($_POST["ApM"] == 1)
{
    $ApM=$row["ApM"];
	
	if($ApM==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$ApM."</td> ";
	}
}
if ($_POST["GangliosAis"] == 1)
{
	
	echo "<td>".$row["GangliosAis"]."</td> ";
}
if ($_POST["GangliosAfec"] == 1)
{
	
	echo "<td>".$row["GangliosAfec"]."</td> ";
}
if ($_POST["Tipo_Histologico"] == 1)
{
    $Tipo_Histologico=$row["Tipo_Histologico"];
	
	if($Tipo_Histologico==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Tipo_Histologico."</td> ";
	}
}

if ($_POST["Otros_Histologico"] == 1)
{
    $Otros_Histologico=$row["Otros_Histologico"];
	
	if($Otros_Histologico==0){
    	echo "<td>".null."</td> ";
	}else{
		$sqlOtrosHistologico="SELECT Tipo FROM tabla_tipo_otros_histologico WHERE ID=$Otros_Histologico";			
		
		$resultOtrosHisto=mysqli_query($conexion, $sqlOtrosHistologico) or die (mysql_error());		
			
		$rowOtrosHisto = mysqli_fetch_array($resultOtrosHisto);
		
		echo "<td>".$rowOtrosHisto[0]."</td> ";
	}
}

if ($_POST["Estadio_Tumor_Sincronico"] == 1)
{
    $Estadio_Tumor_Sincronico=$row["Estadio_Tumor_Sincronico"];
	
	if($Estadio_Tumor_Sincronico==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Estadio_Tumor_Sincronico."</td> ";
	}
}



if ($_POST["MargenDistal"] == 1)
{
    $MargenDistal=$row["MargenDistal"];
	
	if($MargenDistal==0 || $MargenDistal==3){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$MargenDistal."</td> ";
	}
}
if ($_POST["MargenCircun"] == 1)
{
    $MargenCircun=$row["MargenCircun"];
	
	if($MargenCircun==0 || $MargenCircun==3){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$MargenCircun."</td> ";
	}
}
if ($_POST["TipoRes"] == 1)
{
    $TipoRes=$row["TipoRes"];
	
	if($TipoRes==0 || $TipoRes==4){
    	echo "<td>".null."</td> ";
	}else{
		$TipoRes=$TipoRes-1;
		echo "<td>".$TipoRes."</td> ";
	}
}
if ($_POST["Regresion"] == 1)
{
    $Regresion=$row["Regresion"];
	
	if($Regresion==0){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$Regresion."</td> ";
	}
}
if ($_POST["MesoCal"] == 1)
{
    $MesoCal=$row["MesoCal"];
	
	if($MesoCal==0 || $MesoCal==4){
    	echo "<td>".null."</td> ";
	}else{
		echo "<td>".$MesoCal."</td> ";
	}
}
if ($_POST["EstadioPatologico"] == 1)
{
    echo "<td>".$row["EstadioPatologico"]."</td> ";
}
if ($_POST["Comentarios_Adicionales"] == 1)
{
    echo "<td>".$row["Comentarios_Adicionales"]."</td> ";
}       
	
	
    
    
		
echo "</tr>";
	
	 
}



echo "</table>";

mysqli_close($conexion);
?>
 
 