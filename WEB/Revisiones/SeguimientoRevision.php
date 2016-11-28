<?php

 //Viene desde el botón "Ir a seguimiento" de cada paciente
 //Carga los datos anteriores de la BDD de seguimiento
  session_start();
    
    require_once ("../BDD/conexion.php");    
    
    $NHC=$_POST["NHCSeguimiento"];
	
	
	$_SESSION["NHCRevision"]=$NHC;
	
	 $Enviar_Seguimiento="Enviar";
    $_SESSION["ButtonEnviarSeguimiento"]=$Enviar_Seguimiento;
	
	//Selección del ID del Hospital para identificar correctamente al paciente

	$sqlIdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='".$_SESSION["NombreHospital"]."'";

	$result=mysqli_query($conexion,$sqlIdHospital);
	$row=mysqli_fetch_array($result);

    $idHospital=$row[0];
    $idHospital=intval($idHospital);
	
	
	$sqlIdentPaciente="SELECT ID FROM identificador_paciente WHERE NHC = AES_ENCRYPT('$NHC','$claveNHC') AND identificador_paciente.Id_Hospital = '$idHospital'";
    
    $rowIdentPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlIdentPaciente))
       or die('Error: ' . mysqli_error());

   
    //Cargue los datos desde las variables de inicial para mostrarlos en Seguimiento de revision
    
    
    /*** datos iniciales**/
    $IdPaciente = $rowIdentPaciente['ID'];
	
	
	$sqlSegPaciente="SELECT * FROM seguimiento WHERE Id_Paciente='$IdPaciente'";
	
	$rowSegPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlSegPaciente))
       or die('Error: ' . mysqli_error());
	
	
	$IDSeguimiento=$rowSegPaciente["ID"];
	
	$_SESSION["IDSeguimientoRevision"]=$IDSeguimiento;
	
	$_SESSION["Fecha_Revision"]=$rowSegPaciente["Fecha_Revision"];
	
	$_SESSION["Comentarios_Adicionales"]=$rowSegPaciente["Comentarios_Adicionales"];
	
	/*********************RECIDIVA******************************/
	
	$_SESSION["Recidiva"]=intval($rowSegPaciente["B_Recidiva"]);
	
	
	
	$_SESSION["Fecha_Recidiva"]=null;
	$_SESSION["Localizacion_Recidiva"]=null;
	$_SESSION["Intervencion_Recidiva"]=null;
	
	
	
	//Si hay recidiva se rellenan los datos
	
	if($rowSegPaciente["B_Recidiva"]==1){
			
		$sqlRecidiva="SELECT * FROM tabla_recidiva WHERE Id_Seguimiento='$IDSeguimiento'";
		
		$rowRecidiva=mysqli_fetch_array(mysqli_query($conexion,$sqlRecidiva))
      		 or die('Error: ' . mysqli_error());
			 
		 $_SESSION["Fecha_Recidiva"]=$rowRecidiva["Fecha_Recidiva"];
		 $_SESSION["Intervencion_Recidiva"]=intval($rowRecidiva["Intervencion"]);	 
			
		//Hallamos el texto de la localización
		
		$IDLocalizRecidiva=intval($rowRecidiva["Id_tabla_seg_localiz_recidiva"]);	 
		$sqlLocalizacionRecidiva="SELECT Tipo FROM tabla_seg_localiz_recidiva WHERE ID='$IDLocalizRecidiva'";
		
		$rowLocalizRecidiva=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacionRecidiva))
      		 or die('Error: ' . mysqli_error());	 

	   		$Tipo=$rowLocalizRecidiva[0];

	   $_SESSION["Localizacion_Recidiva"]=$Tipo;
 
	}
	
	
/****************************METASTASIS**************************************/	
	
	
	$_SESSION["Metastasis"]=intval($rowSegPaciente["B_Metastasis"]);	
	
	$_SESSION["Fecha_Metastasis"]=null;
	$_SESSION["Localizacion_Metastasis"]=null;
	$_SESSION["Intervencion_Metastasis"]=null;
	
	//Si hay metástasis
	
	
	if($rowSegPaciente["B_Metastasis"]==1){
		
		$sqlMetastasis="SELECT * FROM tabla_metastasis WHERE Id_Seguimiento='$IDSeguimiento'";
		
		$rowMetastasis=mysqli_fetch_array(mysqli_query($conexion,$sqlMetastasis))
      		 or die('Error: ' . mysqli_error());
			 
		
		$_SESSION["Fecha_Metastasis"]=$rowMetastasis["Fecha_Metastasis"];
		$_SESSION["Intervencion_Metastasis"]=intval($rowMetastasis["Intervencion"]);	
		
		//Hallamos el texto de la localización de metástasis
		$IDLocalizMetastasis=intval($rowMetastasis["Id_tabla_seg_localiz_metastasis"]);	 
		$sqlLocalizacionMetastasis="SELECT Tipo FROM tabla_seg_localiz_metastasis WHERE ID='$IDLocalizMetastasis'";
		
		$rowLocalizMetastasis=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacionMetastasis))
      		 or die('Error: ' . mysqli_error());	 

	   		$Tipo=$rowLocalizMetastasis[0];

	   $_SESSION["Localizacion_Metastasis"]=$Tipo;
				
	}
		

/******************************SEGUNDO TUMOR*****************************************/

		$_SESSION["Segundo_Tumor"]=intval($rowSegPaciente["B_Segundo_Tumor"]);
		
		
		$_SESSION["Fecha_Segundo_Tumor"]=null;
		$_SESSION["Localizacion_Segundo_Tumor"]=null;
		$_SESSION["Intervencion_Segundo_Tumor"]=null;
		
		
		//Si hay segundo tumor
		
		if($rowSegPaciente["B_Segundo_Tumor"]==1){
					
			$sqlSegundoTumor="SELECT * FROM tabla_segundo_tumor WHERE Id_Seguimiento='$IDSeguimiento'";
			
			$rowSegundoTumor=mysqli_fetch_array(mysqli_query($conexion,$sqlSegundoTumor))
      			 or die('Error: ' . mysqli_error());	
			 
			$_SESSION["Fecha_Segundo_Tumor"]=$rowSegundoTumor["Fecha_Segundo_Tumor"];
			$_SESSION["Intervencion_Segundo_Tumor"]=intval($rowSegundoTumor["Intervencion"]);
			
			
			
			//Hallamos el texto de la localización de metástasis
		$IDLocalizSegundoTumor=$rowSegundoTumor["Id_tabla_seg_localiz_segundo_tumor"];	 
		$sqlLocalizacionSegundoTumor="SELECT Tipo FROM tabla_seg_localiz_segundo_tumor WHERE ID='$IDLocalizSegundoTumor'";
		
		$rowLocalizSegundoTumor=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacionSegundoTumor))
      		 or die('Error: ' . mysqli_error());	 

	   		$TipoLocaliz=$rowLocalizSegundoTumor[0];

	   $_SESSION["Localizacion_Segundo_Tumor"]=$TipoLocaliz;
			
			
		}
		

/*************************************ESTADO DEL PACIENTE****************************************/

		
		$_SESSION["Estado"]=intval($rowSegPaciente["B_Estado"]);
		
		$_SESSION["Fecha_Muerte"]=null;
		$_SESSION["Causa_Muerte"]=null;
	
	
	//Si el paciente está muerto
	
		if($rowSegPaciente["B_Estado"]==2){
				
			$sqlEstadoPaciente="SELECT * FROM tabla_estado WHERE Id_Seguimiento='$IdSeguimiento'";
			
			$rowEstadoPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlEstadoPaciente))
      			 or die('Error: ' . mysqli_error());
      			 
      		$_SESSION["Fecha_Muerte"]=$rowEstadoPaciente["Fecha_Muerte"];
			$_SESSION["Causa_Muerte"]=intval($rowEstadoPaciente["Relacion_Muerte"]);
		}
	

/*******************************IMPOSIBILIDAD DE SEGUIMIENTO************************************/


		$_SESSION["Imposibilidad"]=intval($rowSegPaciente["B_Imposibilidad"]);
	
		
		$_SESSION["Causa_Imposibilidad"]=null;
	
	//Si hay imposibilidad, se carga la causa
	
		if($rowSegPaciente["B_Imposibilidad"]==1){
			
			$sqlImposibilidad="SELECT * FROM tabla_imposibilidad WHERE Id_Seguimiento='$IDSeguimiento'";
			
			$rowImposibilidad=mysqli_fetch_array(mysqli_query($conexion,$sqlImposibilidad))
      			 or die('Error: ' . mysqli_error());
		
			$_SESSION["Causa_Imposibilidad"]=$rowImposibilidad["Id_tabla_seg_imposibilidad"];
			
		}
		
/********************************DATOS PARA DESHABILITAR RECIDIVA****************************/

	$sqlCirugia="SELECT * FROM cirugia WHERE Id_Paciente='$IdPaciente'";
	
		$rowCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlCirugia))
      			 or die('Error: ' . mysqli_error());
      			 
	$Cirugia=$rowCirugia["B_Cirugia"];
	$IdCirugia=$rowCirugia["ID"];
	
	$_SESSION["Cirugia"]=$Cirugia;
	
	
	
	if ($Cirugia==1){
	$sqlTecnicaCirugia="SELECT Id_Tecnica FROM tabla_cirugia WHERE Id_CIrugia='$IdCirugia'";
	$rowTecnicaCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlTecnicaCirugia))
      			 or die('Error: ' . mysqli_error());
				 
				$_SESSION["TecCirugia"]=intval($rowTecnicaCirugia["Id_Tecnica"]); 
	}else{
		$_SESSION["TecCirugia"]=null;
	}		

	
	
	$sqlPatologica="SELECT Estado FROM tabla_patologica WHERE Id_Paciente='$IdPaciente'";
	
	$rowPatologicaSiNo=mysqli_fetch_array(mysqli_query($conexion,$sqlPatologica))
      			 or die('Error: ' . mysqli_error());
      			 
	$Patologica=$rowPatologicaSiNo["Estado"];			 
		
	if ($Patologica==1){	
	
	$sqlResPatologica="SELECT Id_Tipo_Res FROM anatomia_patologica WHERE Id_Paciente='$IdPaciente'";
	
	$rowResPatologica=mysqli_fetch_array(mysqli_query($conexion,$sqlResPatologica))
      			 or die('Error: ' . mysqli_error());		
		
	$_SESSION["Reseccion"]=intval($rowResPatologica["Id_Tipo_Res"]);
	}else{
		$_SESSION["Reseccion"]=null;
	}
	
	
/***********************************DATOS PARA DESHABILITAR LA METASTASIS****************/

$sqlMetastInicial="SELECT B_Metast_Inicial FROM inicial WHERE Id_Paciente='$IdPaciente'";

$rowMetastInicial=mysqli_fetch_array(mysqli_query($conexion,$sqlMetastInicial))
      			 or die('Error: ' . mysqli_error());
				 
$_SESSION["MetastInicial"]=intval($rowMetastInicial["B_Metast_Inicial"]);
	

if($Cirugia==1){
	$sqlMetastCirugia="SELECT Id_Metast_Hepaticas, Implantes_Ovaricos 
	FROM tabla_caracteristicas_cirugia WHERE Id_Cirugia='$IdCirugia'";
	
	$rowMetastCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlMetastCirugia))
      			 or die('Error: ' . mysqli_error());
	
	$_SESSION["MetastHepaticas"]=intval($rowMetastCirugia["Id_Metast_Hepaticas"]);
	$_SESSION["ImplanOvaricos"]=intval($rowMetastCirugia["Implantes_Ovaricos"]);
	
}else{
	$_SESSION["MetastHepaticas"]=null;
	$_SESSION["ImplanOvaricos"]=null;
}
	
mysqli_close($conexion);
header("Location: ./Seguimiento/Seguimiento.php");

?>