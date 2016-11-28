<?php
session_start();
require_once ("../../../BDD/conexion.php");


require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

//Borrar los datos de la tabla

$sqlDeleteMetastasis="DELETE FROM metastasis_kaplan_meier";

	mysqli_query($conexion,$sqlDeleteMetastasis) or die('Error: ' . mysqli_error());




//Meses seguimiento

$RecortaMeses=$_SESSION["RecortaMeses"];

$MesesMinimos=intval($_SESSION["MesesMinimos"]);


//Altura del tumor 

$altura_tumor_05=$_SESSION["altura_tumor_05"];  //Value==1

$altura_tumor_610=$_SESSION["altura_tumor_610"];  //Value==2

$altura_tumor_1115=$_SESSION["altura_tumor_1115"];  //Value==3



//Técnica de cirugia

$reseccion_abd=$_SESSION["reseccion_abd"];  //Value==1

$reseccion_anterior=$_SESSION["reseccion_anterior"];  //Value==2

$hartmann=$_SESSION["hartmann"];  //Value==3


//Fechas de margen en cirugias

$inicio=($_SESSION["inicio"]); //required

$fin=($_SESSION["fin"]);  //required


//Insertar los datos según los parámetros

 $sqlTablaEstadistica="SELECT * FROM tabla_estadistica";
 
 $res=mysqli_query($conexion, $sqlTablaEstadistica) or die('Error: ' . mysqli_error());
 
 
 //Introduce todos los datos de cada paciente en una variable desde tabla_estadistica
 
 
 while($row=mysqli_fetch_array($res)){
 	 $Hospital=$row[0];
 	 $Id_Paciente=$row[1];
	 $Fec_Nacimiento=$row[2];
	 $Sexo=$row[3];
	 $B_Cirugia=$row[4];
	 $Fecha_Cirugia=$row[5];
	 $CampoEstadio=$row[6];
	 $TipoRes=$row[7];
	 $Tec_Cir=$row[8];
	 $B_Recidiva=$row[9];
	 $Fecha_Recidiva=$row[10];
	 $B_Metastasis=$row[11];
	 $Fecha_Metastasis=$row[12];
	 $Vivo=$row[13];
	 $FechaMuerte=$row[14];
	 $Localizacion=$row[15];
	 $Perfora=$row[16];
	 $M_Circun=$row[17];
	 $M_Distal=$row[18];
	 $Tto_Neo=$row[19];
	 $Fecha_Revision=$row[20];
	 $MesoCal=$row[21];
	 
	 
	 //Adecuacion  datos para tecnica cirugia
	 
	 if ($Tec_Cir==1 || $Tec_Cir==5 || $Tec_Cir==7 || $Tec_Cir==8 || $Tec_Cir==9){
	 	$Tec_Cir=null;
	 }else if ($Tec_Cir==2 || $Tec_Cir==3) {
	 	$Tec_Cir=2;
	 }else if ($Tec_Cir==4 || $Tec_Cir==10){
	 	$Tec_Cir=1;
	 }else if ($Tec_Cir==6){
	 	$Tec_Cir=3;
	 }
	 
	 
	 //Adecuacion datos de localizacion
	 if ($Localizacion==0 || $Localizacion==1 || $Localizacion==2 || $Localizacion==3 || $Localizacion==4 || $Localizacion==5){
	 	$Localizacion=1;
	 }else if ($Localizacion==6 || $Localizacion==7 || $Localizacion==8 || $Localizacion==9 || $Localizacion==10){
	 	$Localizacion=2;
	 }else if($Localizacion==11 || $Localizacion==12 || $Localizacion==13 || $Localizacion==14 || $Localizacion==15){
	 	$Localizacion=3;
	 }
	 
	 //Parametrizacion Fecha Cirugia
	 
	 $fechacorrecta=0;
	 
	 
	if ($RecortaMeses==1){
		$MesesMinimos=0;
	}
	 
	 
	 //Comprobación de fechas correctas
	 
	 $DifInicioCirugia=(strtotime($Fecha_Cirugia)-strtotime($inicio));
	 
	 $DifFinCirugia=(strtotime($fin)-strtotime($Fecha_Cirugia));
				
		if($DifInicioCirugia>=0 && $DifFinCirugia>=0){
				$fechacorrecta=1;		
		}		
			
	//Cálculo de la edad	
			
	$Edad=((strtotime($Fecha_Cirugia)-strtotime($Fec_Nacimiento))/31536000);
	
	//Cálculo del tiempo de seguimiento
	
	$DifSeguimientoCirugia=((strtotime($Fecha_Revision)-strtotime($Fecha_Cirugia))/2592000);
	
	
	
	//Se hace un if para que solo entre si los meses de seguimiento son mayores o iguales
	// que los que se han indicado en el menú en caso contrario no se cuenta ese paciente
	
	//EL PARÉNTESIS SE CIERRA AL FINAL DEL ARCHIVO
	
	if ($DifSeguimientoCirugia>=$MesesMinimos){
				
		//Todos los if principales a partir de aqui se utilizan para filtrar las diferentes opciones
		//elegidas en la hoja principal de estadísticas, y sólo se introducen en la base de datos los 
		//pacientes que cumplen las funciones requeridas
		
		//Ejemplo 
		/*
		 * Se elige $altura_tumor=3 -- $hartmann=1
		 * Sólo entran los pacientes con localizacion 11-15 y operados hartmann
		 * 
		 * El primer if situa según los datos elegidos
		 * El segundo if hace comprobaciones de los datos a elegir (estadios 4-5 fuera)
		 * El tercer if filtra los pacientes que se han elegido en el menú
		 * El cuarto if filtra si hay metástasis o no
		 * 		Si hay metástasis, la diferencia de fechas es entre cirugia y aparición metástasis
		 * 		Si no hay metástasis, la diferencia es entre cirugia y fecha de ultima revisión
		 * 
		 */
			

	 if($altura_tumor_05==null && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==null && $hartmann==3){
				
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==3&& $Tec_Cir==3 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}		
			
		
	 }else if($altura_tumor_05==null && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==3&& $Tec_Cir==2 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}		

	 }else if($altura_tumor_05==null && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==3&& ($Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}		

	 	
	 }else if($altura_tumor_05==null && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==null){
	 	
		
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==3&& $Tec_Cir==1 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	 	
	
	 }else if($altura_tumor_05==null && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==3){
	 	
				if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==3&& ($Tec_Cir==1 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	 	
	
	 }else if($altura_tumor_05==null && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==null){
	 	
				if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==3 && ($Tec_Cir==1 || $Tec_Cir==2) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	 	
	 	
	 }else if($altura_tumor_05==null && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==3){
	 	
				if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==3&& ($Tec_Cir==1 || $Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	
	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==null && $reseccion_anterior==null && $hartmann==3){
		
				if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==2 && $Tec_Cir==3 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}	 	
		
		
		
	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==2 && $Tec_Cir==2 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	 	

	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==2 && ($Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	 	
			 	
	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==2 && $Tec_Cir==1  && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		
	
	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==3){
	 	if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==2 && ($Tec_Cir==1 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}

	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==2 && ($Tec_Cir==1 || $Tec_Cir==2) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==2 && ($Tec_Cir==1 || $Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
			 	

	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==null && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==2 || $Localizacion==3) && $Tec_Cir==3 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		 			
		
	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==2 || $Localizacion==3) && $Tec_Cir==2 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}

	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==2 || $Localizacion==3) && ($Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==2 || $Localizacion==3) && $Tec_Cir==1  && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==2 || $Localizacion==3) && ($Tec_Cir==1 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		
	
	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==2 || $Localizacion==3) && ($Tec_Cir==1 || $Tec_Cir==2) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		
	 	
	 }else if($altura_tumor_05==null && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==2 || $Localizacion==3) && ($Tec_Cir==1 || $Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}

	 } else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==null && $reseccion_abd==null && $reseccion_anterior==null && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==1 && $Tec_Cir==3 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
				
	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==null && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==null){
	 	if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==1 && $Tec_Cir==2 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==null && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==1 && ($Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
			 	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==null){
	 	if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==1 && $Tec_Cir==1 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==1 && ($Tec_Cir==1 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==1 && ($Tec_Cir==1 || $Tec_Cir==2) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		
	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if($Localizacion==1 && ($Tec_Cir==1 || $Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	
	 } else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==null && $hartmann==3){
	 	
	 	if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==3) && $Tec_Cir==3 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
				
	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==null){
	 	if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==3) && $Tec_Cir==2 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==3) && ($Tec_Cir==2 ||$Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
			 	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==null){
	 	
	 	if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==3) && $Tec_Cir==1 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==3) && ($Tec_Cir==1 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==3) && ($Tec_Cir==1 ||$Tec_Cir==2) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	
	 	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==null && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==3) && ($Tec_Cir==1 || $Tec_Cir==2 ||$Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
	
	 }  else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==null && $reseccion_anterior==null && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2) && $Tec_Cir==3 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
				
	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==null){
	 	
	 	if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2) && $Tec_Cir==2 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2) && ($Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
 	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2) && $Tec_Cir==1 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		
	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2) && ($Tec_Cir==1 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2) && ($Tec_Cir==1 || $Tec_Cir==2) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}

	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==null && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2) && ($Tec_Cir==1 || $Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }  else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==null && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2 || $Localizacion==3) && $Tec_Cir==3 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
				
	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2 || $Localizacion==3) && $Tec_Cir==2 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==null && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2 || $Localizacion==3) && ($Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2 || $Localizacion==3) && $Tec_Cir==1 && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		
	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==null && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2 || $Localizacion==3) && ($Tec_Cir==1 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
			 	
	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==null){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2 || $Localizacion==3) && ($Tec_Cir==1 || $Tec_Cir==2) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());

				}
	
			}		
	
		}
		

	 }else if($altura_tumor_05==1 && $altura_tumor_610==2 && $altura_tumor_1115==3 && $reseccion_abd==1 && $reseccion_anterior==2 && $hartmann==3){
	 	
		if ($B_Cirugia==1 && ($CampoEstadio==0 || $CampoEstadio==1 || $CampoEstadio==2 || $CampoEstadio==3) && ($TipoRes==1 || $TipoRes==2)){
				
			if(($Localizacion==1 || $Localizacion==2 || $Localizacion==3) && ($Tec_Cir==1 || $Tec_Cir==2 || $Tec_Cir==3) && $fechacorrecta==1){
				
				if($B_Metastasis==1){
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Metastasis','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					
					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Fecha_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital','$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$Fecha_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				
				
				
					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error());
				
				
				
				}else if($B_Metastasis==2){
					
					
					$sqlDifMeses="SELECT DATEDIFF('$Fecha_Revision','$Fecha_Cirugia')";
					
					$resDifMeses=mysqli_query($conexion,$sqlDifMeses) or die('Error: ' . mysqli_error());
					
					$rowDifMeses=mysqli_fetch_array($resDifMeses);
						
					$DifMeses=intval($rowDifMeses[0]/30);
					
					

					$sqlInsertMetastasis="INSERT INTO metastasis_kaplan_meier (Hospital, ID, Tec_Cir, Localizacion, Fecha_Cir, Fecha_Seguimiento, B_Metastasis, Meses_Dif, Edad, Meso_Cal, Tto_Neo, Sexo, EstadioPato, Perforacion, Circun_Margen, Meses_Seguimiento) VALUES 
										('$Hospital', '$Id_Paciente','$Tec_Cir', '$Localizacion', '$Fecha_Cirugia', '$Fecha_Revision', '$B_Metastasis', '$DifMeses', '$Edad', '$MesoCal', '$Tto_Neo', '$Sexo', '$CampoEstadio', '$Perfora', '$M_Circun', '$DifSeguimientoCirugia') ";
				

					mysqli_query($conexion,$sqlInsertMetastasis) or die('Error: ' . mysqli_error().'Paciente'.$Id_Paciente);

				}
	
			}		
	
		}
	
	 	
	 } 
	 
	 }
 }
 

mysqli_close($conexion);

if ($_SESSION["Total"]==1){
	header("Location: ../Recidiva/CalculaRecidiva.php");
}else{
header("Location: ./Metastasis.php");
}		
?>