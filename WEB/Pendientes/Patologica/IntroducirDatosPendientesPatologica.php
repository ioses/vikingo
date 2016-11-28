<?php
//Introduce los datos de anatomía patológica en la BDD
session_start();
require_once ("../../BDD/conexion.php");


if (isset($_POST["tabla_tipo_histologico"])){
	$Tipo_Histologico=$_POST["tabla_tipo_histologico"];
    $Tipo_Histologico=intval($Tipo_Histologico);
}else{
    $Tipo_Histologico=null;
}


if (isset($_POST["tabla_tipo_otros_histologico"])){
	$Otros_Histologico=$_POST["tabla_tipo_otros_histologico"];
    $Otros_Histologico=utf8_decode($Otros_Histologico);
    
}else{
    $Otros_Histologico=null;
}


if (isset($_POST["tabla_tipo_t"])){
	$T_Patologico=$_POST["tabla_tipo_t"];
    if($T_Patologico == 0)
    {
        $T_Patologico=null;
    }
    $T_Patologico=intval($T_Patologico);
}else{
    $T_Patologico=null;
}



if (isset($_POST["tabla_tipo_n"])){
	$N_Patologico=$_POST["tabla_tipo_n"];
}else{
    $N_Patologico=null;
}



if (isset($_POST["tabla_tipo_m"])){
	$M_Patologico=$_POST["tabla_tipo_m"];
}else{
    $M_Patologico=null;
}



if (isset($_POST["Ganglios_Ais"])){
	$Ganglios_Aislados=$_POST["Ganglios_Ais"];
    $Ganglios_Aislados=intval($Ganglios_Aislados);
}else{
    $Ganglios_Aislados=null;
}


if (isset($_POST["Ganglios_Afec"])){
	$Ganglios_Afectados=$_POST["Ganglios_Afec"];
    $Ganglios_Afectados=intval($Ganglios_Afectados);
}else{
    $Ganglios_Afectados=null;
}


if (isset($_POST["tabla_estadio_tumor"])){
	$Estadio_Patologico=$_POST["tabla_estadio_tumor"];
	$Estadio_Patologico=intval($Estadio_Patologico);
}else{
    $Estadio_Patologico=null;
}


if (isset($_POST["Id_Margen_Distal"])){
	$Margen_Distal=$_POST["Id_Margen_Distal"];
	$Margen_Distal=intval($Margen_Distal);
}else{
    $Margen_Distal=null;
}



if (isset($_POST["Id_Margen_Circunferencial"])){
	$Margen_Circunferencial=$_POST["Id_Margen_Circunferencial"];
    $Margen_Circunferencial=intval($Margen_Circunferencial);
}else{
    $Margen_Circunferencial=null;
}


if (isset($_POST["tabla_tipo_reseccion"])){
	$Tipo_Reseccion=$_POST["tabla_tipo_reseccion"];
    $Tipo_Reseccion=intval($Tipo_Reseccion);
}else{
    $Tipo_Reseccion=null;
}


if (isset($_POST["tabla_tipo_regresion"])){
	$Tipo_Regresion=$_POST["tabla_tipo_regresion"];
	$Tipo_Regresion=intval($Tipo_Regresion);
}else{
    $Tipo_Regresion=null;
}



if (isset($_POST["Id_Estadio_Sincronico"])){
	$Estadio_Tumor_Sincronico=$_POST["Id_Estadio_Sincronico"];
	$Estadio_Tumor_Sincronico=intval($Estadio_Tumor_Sincronico);
}else{
    $Estadio_Tumor_Sincronico=null;
}


if (isset($_POST["tabla_tipo_calidad_meso"])){
	$Calidad_Mesorrecto=$_POST["tabla_tipo_calidad_meso"];
	$Calidad_Mesorrecto=intval($Calidad_Mesorrecto);
}else{
    $Calidad_Mesorrecto=null;
}



$NHC=$_POST["NHC"];
$_SESSION["NHCPendientes"]=$NHC;

//Selección del ID del Hospital para identificar correctamente al paciente

$sqlIdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='".$_SESSION["NombreHospital"]."'";

$result=mysqli_query($conexion,$sqlIdHospital);
$row=mysqli_fetch_array($result);

$idHospital=$row[0];
$idHospital=intval($idHospital);

$sqlId="SELECT ID FROM identificador_paciente WHERE NHC=AES_ENCRYPT('$NHC','$claveNHC') AND Id_Hospital = '$idHospital'";

	$res=mysqli_query($conexion,$sqlId)
            or die('Error: ' . mysqli_error());
            
			
	$row=mysqli_fetch_array($res);
	
	$Id_Paciente=$row[0];

	$Id_Paciente=intval($Id_Paciente);
	 
  $sqlPatologicaSi="UPDATE tabla_patologica SET Estado= '1' WHERE Id_Paciente='$Id_Paciente'";
 	mysqli_query($conexion,$sqlPatologicaSi)
            or die('Error: ' . mysqli_error());
   
   
   
   /*
    * Tanto para N como para M, hacemos un switch para coger los valores de ID de sus respectivas tablas
    * No coindice lo que hay en el textBox con la base de datos
    */
    switch ($N_Patologico) {
        case 'X':
            $N_Patologico = 1;
            break;
        case '0':
            $N_Patologico = 2;
            break;
        case '1':
            $N_Patologico = 3;
            break;
        case '2':
            $N_Patologico = 4;
            break;
        default:
            $N_Patologico = null;
            break;
    }
	
    

    switch ($M_Patologico) {
        case 'X':
            $M_Patologico = 1;
            break;
        case '1':
            $M_Patologico = 2;
            break;
        case '0':
            $M_Patologico = 3;
            break;
        default:
            $M_Patologico = null;
            break;
    }
    
	
    //INTRODUCCION DE DATOS EN LA BASE
	
    if ($Tipo_Histologico == 7) //Si en tipo histologico han elegido el campo otros
    {
        /*
         * Miramos si han elegido del autocomplete alguna opción
         */
         echo ($Otros_Histologico);
        $sqlOtrosTipoHistologico="SELECT COUNT(*) FROM tabla_tipo_otros_histologico WHERE Tipo='$Otros_Histologico'";
        
        $row=mysqli_fetch_array(mysqli_query($conexion,$sqlOtrosTipoHistologico))
       	 or die('Error: ' . mysqli_error());
		
		if($row[0]==0){
			
			$sqlNuevoTipoHistologico="INSERT INTO tabla_tipo_otros_histologico (Tipo) VALUES('$Otros_Histologico')";
	
				mysqli_query($conexion,$sqlNuevoTipoHistologico)
		 		or die('Error: ' . mysqli_error());
				
			$sqlIDTipoHistologico="SELECT LAST_INSERT_ID()";

				$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoHistologico))
	 				or die('Error: ' . mysqli_error());

				$Otros_Histologico=$row[0];
		}else{
			
			$sqlOtrosHistologico="SELECT ID FROM tabla_tipo_otros_histologico WHERE Tipo='$Otros_Histologico'";
				
					$row=mysqli_fetch_array(mysqli_query($conexion,$sqlOtrosHistologico))
			 		or die	('Error: ' . mysqli_error());
				
				$Otros_Histologico=$row[0];

			
		}

        $Otros_Histologico=intval($Otros_Histologico);

    }
    else {
         /*
          * Si han elegido un tipo histologico distinto a otros, Otros_Histologico lo dejaremos a null
          * ya que han podido dejar algun nombre escrito en el TextBox
          */
        $Otros_Histologico = null;
    }
    
  /*echo (" - " . $M_Patologico . " POST " . $_POST["tabla_estadio_tumor"]);
    echo (" - " . $Estadio_Patologico . " Sincronico " . $Estadio_Tumor_Sincronico);
    
    echo ($Id_Paciente. " " . $Tipo_Histologico. " " .  $Otros_Histologico. " " . $T_Patologico. " " .$N_Patologico. " " .$M_Patologico. " " .$Ganglios_Aislados. " " .$Ganglios_Afectados. " " .$Estadio_Patologico. " " .$Margen_Distal. " " .$Margen_Circunferencial. " " .$Tipo_Reseccion. " " .$Tipo_Regresion. " MESORRE: " .$Calidad_Mesorrecto. " ESTADIO: " . $Estadio_Tumor_Sincronico);*/


        /*
         * Se introducen los datos en la tabla anatomia_patologica
         * 
         * Se hacen los if porque el valor null de una variable no deja meterla directamente en la base de datos.
		 * 
		 */
  
    if ($Estadio_Tumor_Sincronico != null)
    {
        if ($Otros_Histologico != null)
        {
            $sqlPatologica = "INSERT INTO anatomia_patologica (Id_Paciente, Id_Histologico, Id_Otros_Histologico, Id_T, Id_N, Id_M, Glangios_Ais, Glangios_Afec, Id_Estadio_Patologico, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal, Id_Estadio_Sincronico)
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  '$Otros_Histologico', '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion','$Calidad_Mesorrecto', '$Estadio_Tumor_Sincronico')";
            mysqli_query($conexion,$sqlPatologica)
            or die('Error: ' . mysqli_error());
        }
        else {
        	
				echo ($Id_Paciente);
			echo (gettype($Id_Paciente));
        	echo "<br/>";
			echo ($Tipo_Histologico);
			echo "<br/>";
			echo ($Otros_Histologico);
			echo "<br/>";
			echo ($T_Patologico);
			echo "<br/>";
			echo ($N_Patologico);
						echo "<br/>";
			echo ($M_Patologico);
						echo "<br/>";
			echo ($Ganglios_Aislados);
						echo "<br/>";
			echo ($Ganglios_Afectados);
						echo "<br/>";
			echo ($Estadio_Patologico);
						echo "<br/>";
			echo ($Margen_Distal);
				echo "<br/>";
			echo ($Margen_Circunferencial);
				echo "<br/>";
			echo ($Tipo_Reseccion);
				echo "<br/>";
			echo ($Tipo_Regresion);
			echo "<br/>";
			echo ($Calidad_Mesorrecto);
			echo "<br/>";
			echo ($Estadio_Tumor_Sincronico);
			
            $sqlPatologica = "INSERT INTO anatomia_patologica (Id_Paciente, Id_Histologico, Id_Otros_Histologico, Id_T, Id_N, Id_M, Glangios_Ais, Glangios_Afec, Id_Estadio_Patologico, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal, Id_Estadio_Sincronico)
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  null, '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion', '$Calidad_Mesorrecto', '$Estadio_Tumor_Sincronico')";
        
            mysqli_query($conexion,$sqlPatologica)
            or die('Error: ' . mysqli_error());
        }
        
    }else{
        if ($Otros_Histologico != null)
        {
        
            $sqlPatologica = "INSERT INTO anatomia_patologica (Id_Paciente, Id_Histologico, Id_Otros_Histologico, Id_T, Id_N, Id_M, Glangios_Ais, Glangios_Afec, Id_Estadio_Patologico, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal, Id_Estadio_Sincronico)
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  '$Otros_Histologico', '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion','$Calidad_Mesorrecto', null)";
        
            mysqli_query($conexion,$sqlPatologica)
            or die('Error: ' . mysqli_error());
        }
        else{
        	
			
            $sqlPatologica = "INSERT INTO anatomia_patologica (Id_Paciente, Id_Histologico, Id_Otros_Histologico, Id_T, Id_N, Id_M, Glangios_Ais, Glangios_Afec, Id_Estadio_Patologico, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal, Id_Estadio_Sincronico)
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  null, '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion', '$Calidad_Mesorrecto', null)";
        
        
            mysqli_query($conexion,$sqlPatologica)
            or die('Error: ' . mysqli_error());
        }
        
    }

mysqli_close($conexion);
 
 header("Location: ../FinPendientes.php");
?>