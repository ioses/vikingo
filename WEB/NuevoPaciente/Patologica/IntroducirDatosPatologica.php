<?php
//Introducimos los datos en las variables de sesión
session_start();
require_once ("../../BDD/conexion.php");

/*
 * Variable para ver si es la primera vez que se carga la página
 */

$Enviar_Patologica="Enviar";
$_SESSION["ButtonEnviarPatologica"]=$Enviar_Patologica;



if (isset($_POST["tabla_tipo_histologico"])){
	$Tipo_Histologico=$_POST["tabla_tipo_histologico"];
	$Tipo_Histologico=strip_tags($Tipo_Histologico);
    $Tipo_Histologico=intval($Tipo_Histologico);
}else{
    $Tipo_Histologico=null;
}

$_SESSION["Tipo_Histologico"]=$Tipo_Histologico;


if (isset($_POST["tabla_tipo_otros_histologico"])){
	$Otros_Histologico=$_POST["tabla_tipo_otros_histologico"];
	$Otros_Histologico=strip_tags($Otros_Histologico);
    $Otros_Histologico=utf8_decode($Otros_Histologico);
    
}else{
    $Otros_Histologico=null;
}

$_SESSION["Otros_Histologico"]=$Otros_Histologico;



if (isset($_POST["tabla_tipo_t"])){
	$T_Patologico=$_POST["tabla_tipo_t"];
	$T_Patologico=strip_tags($T_Patologico);
    if($T_Patologico == 0)
    {
        $T_Patologico=null;
    }
    $T_Patologico=intval($T_Patologico);
}else{
    $T_Patologico=null;
}

$_SESSION["T_Patologico"]=$T_Patologico;



if (isset($_POST["tabla_tipo_n"])){
	$N_Patologico=$_POST["tabla_tipo_n"];
	$N_Patologico=strip_tags($N_Patologico);
    //$N_Patologico=intval($N_Patologico);
}else{
    $N_Patologico=null;
}

$_SESSION["N_Patologico"]=$N_Patologico;



if (isset($_POST["tabla_tipo_m"])){
	$M_Patologico=$_POST["tabla_tipo_m"];
    //$M_Patologico=intval($M_Patologico);
}else{
    $M_Patologico=null;
}

$_SESSION["M_Patologico"]=$M_Patologico;



if (isset($_POST["Ganglios_Ais"])){
	$Ganglios_Aislados=$_POST["Ganglios_Ais"];
	$Ganglios_Aislados=strip_tags($Ganglios_Aislados);
    $Ganglios_Aislados=intval($Ganglios_Aislados);
}else{
    $Ganglios_Aislados=null;
}

$_SESSION["Ganglios_Aislados"]=$Ganglios_Aislados;



if (isset($_POST["Ganglios_Afec"])){
	$Ganglios_Afectados=$_POST["Ganglios_Afec"];
	$Ganglios_Afectados=strip_tags($Ganglios_Afectados);
    $Ganglios_Afectados=intval($Ganglios_Afectados);
}else{
    $Ganglios_Afectados=null;
}

$_SESSION["Ganglios_Afectados"]=$Ganglios_Afectados;



if (isset($_POST["tabla_estadio_tumor"])){
	$Estadio_Patologico=$_POST["tabla_estadio_tumor"];
	$Estadio_Patologico=strip_tags($Estadio_Patologico);
	$Estadio_Patologico=intval($Estadio_Patologico);
	if ($Estadio_Patologico==0){
		$Estadio_Patologico=6;
	}
}else{
    $Estadio_Patologico=5;
}

$_SESSION["Estadio_Patologico"]=$Estadio_Patologico;



if (isset($_POST["Id_Margen_Distal"])){
	$Margen_Distal=$_POST["Id_Margen_Distal"];
	$Margen_Distal=strip_tags($Margen_Distal);
	$Margen_Distal=intval($Margen_Distal);
}else{
    $Margen_Distal=null;
}

$_SESSION["Margen_Distal"]=$Margen_Distal;



if (isset($_POST["Id_Margen_Circunferencial"])){
	$Margen_Circunferencial=$_POST["Id_Margen_Circunferencial"];
	$Margen_Circunferencial=strip_tags($Margen_Circunferencial);
    $Margen_Circunferencial=intval($Margen_Circunferencial);
}else{
    $Margen_Circunferencial=null;
}

$_SESSION["Margen_Circunferencial"]=$Margen_Circunferencial;



if (isset($_POST["tabla_tipo_reseccion"])){
	$Tipo_Reseccion=$_POST["tabla_tipo_reseccion"];
	$Tipo_Reseccion=strip_tags($Tipo_Reseccion);
    $Tipo_Reseccion=intval($Tipo_Reseccion);
}else{
    $Tipo_Reseccion=null;
}



/*if (isset($_POST["Radio_Reseccion_R0"])){
    $Tipo_Reseccion=$_POST["Radio_Reseccion_R0"];
}
else if (isset($_POST["Radio_Reseccion_R1"])){
    $Tipo_Reseccion=$_POST["Radio_Reseccion_R1"];
}

else if (isset($_POST["Radio_Reseccion_R2"])){
    $Tipo_Reseccion=$_POST["Radio_Reseccion_R2"];
}*/

//Variable global SE INTRODUCE EN SESSION

$_SESSION["Tipo_Res"]=$Tipo_Reseccion;//$_REQUEST["tabla_tipo_reseccion"];


if (isset($_POST["tabla_tipo_regresion"])){
	$Tipo_Regresion=$_POST["tabla_tipo_regresion"];
	$Tipo_Regresion=strip_tags($Tipo_Regresion);
	$Tipo_Regresion=intval($Tipo_Regresion);
	if($Tipo_Regresion==0)
	{
		$Tipo_Regresion=6;
		$Tipo_Regresion=intval($Tipo_Regresion);
		$_SESSION["Tipo_Regresion"]=$Tipo_Regresion;
	}	
}else{
    $Tipo_Regresion=6;
}

$_SESSION["Tipo_Regresion"]=$Tipo_Regresion;



if (isset($_POST["Id_Estadio_Sincronico"])){
	$Estadio_Tumor_Sincronico=$_POST["Id_Estadio_Sincronico"];
	$Estadio_Tumor_Sincronico=strip_tags($Estadio_Tumor_Sincronico);
	$Estadio_Tumor_Sincronico=intval($Estadio_Tumor_Sincronico);
}else{
    $Estadio_Tumor_Sincronico=null;
}

$_SESSION["Estadio_Tumor_Sincronico"]=$Estadio_Tumor_Sincronico;



if (isset($_POST["tabla_tipo_calidad_meso"])){
	$Calidad_Mesorrecto=$_POST["tabla_tipo_calidad_meso"];
	$Calidad_Mesorrecto=strip_tags($Calidad_Mesorrecto);
	$Calidad_Mesorrecto=intval($Calidad_Mesorrecto);
}else{
    $Calidad_Mesorrecto=null;
}

$_SESSION["Calidad_Mesorrecto"]=$Calidad_Mesorrecto;



if (isset($_POST["rellenar"])){
	$Rellenar=$_POST["rellenar"];
    $Rellenar=intval($Rellenar);
}else{
    $Rellenar=null;
}

$_SESSION["Patologica_Pendiente"]=$Rellenar;


/*
if($Rellenar != 1) //Se ha rellenado la hoja de anatomia patológica
{

    /*
     * Cogemos el ID del Paciente por SESSION 
     *
   $Id_Paciente=$_SESSION["Id_Paciente"];
   $Id_Paciente=intval($Id_Paciente);
   
   
   /*
    * Tanto para N como para M, hacemos un switch para coger los valores de ID de sus respectivas tablas
    * No coindice lo que hay en el textBox con la base de datos
    *
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
	
	$_SESSION["N_Patologico"]=$N_Patologico;
    
    //echo ("Empieza M: " . $M_Patologico);
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
    
	$_SESSION["M_Patologico"]=$M_Patologico;
	
    //INTRODUCCION DE DATOS EN LA BASE
	
    if ($Tipo_Histologico == 7) //Si en tipo histologico han elegido el campo otros
    {
        /*
         * Miramos si han elegido del autocomplete alguna opción
         *
        $sqlOtrosHistologico="SELECT ID FROM tabla_tipo_otros_histologico WHERE Tipo='$Otros_Histologico'";
        $row=mysqli_fetch_array(mysqli_query($conexion,$sqlOtrosHistologico))
        or die('Error: ' . mysqli_error());

        $Otros_Histologico=$row[0];
    
         /*
          * Si han metido un nuevo tipo histologico lo metemos en la base de datos
          *
        if ($Otros_Histologico == null) 
        {
            $sqlInsertOtrosHistologico="INSERT INTO tabla_tipo_otros_histologico ('Tipo') VALUES ('$Otros_Histologico')";
            
            mysqli_query($conexion,$sqlInsertOtrosHistologico)
            or die('Error: ' . mysqli_error());
            
            $ID_Otros_Histologico="SELECT LAST_INSERT_ID()";
            $row=mysqli_fetch_array(mysqli_query($conexion,$ID_Otros_Histologico))
            or die('Error: ' . mysqli_error());
           $Otros_Histologico=$row[0];
           $Otros_Histologico=intval($Otros_Histologico);
        }
    
        //echo($row[0]);// . " " . $row[1]);
    }
    else {
         /*
          * Si han elegido un tipo histologico distinto a otros, Otros_Histologico lo dejaremos a null
          * ya que han podido dejar algun nombre escrito en el TextBox
          *
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
            $sqlPatologica = "INSERT INTO anatomia_patologica (Id_Paciente, Id_Histologico, Id_Otros_Histologico, Id_T, Id_N, Id_M, Glangios_Ais, Glangios_Afec, Id_Estadio_Patologico, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal, Id_Estadio_Sincronico)
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  null, '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion','$Calidad_Mesorrecto', '$Estadio_Tumor_Sincronico')";
        
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
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  null, '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion','$Calidad_Mesorrecto', null)";
        
        
            mysqli_query($conexion,$sqlPatologica)
            or die('Error: ' . mysqli_error());
        }
        
    }
   
    /*mysqli_query($conexion,$sqlPatologica)
        or die('Error: ' . mysqli_error());*
    
}
*/
 mysqli_close($conexion);
 

 header("Location: ../Seguimiento/Seguimiento.php");
	

?>