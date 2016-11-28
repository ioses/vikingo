<?php

//Primera ´pagina de los formularios donde está "Buscar paciente",
// mira si el paciente existe o no
session_start();

require_once ("../BDD/conexion.php");


$Hospital=$_SESSION["NombreHospital"];

$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

 	$row=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
	 	or die('Error: ' . mysqli_error());

	$Hospital=$row[0];


$BuscaNHC=$_POST["BuscaNHC"];

$BuscaNHC=mysqli_real_escape_string($conexion, $BuscaNHC);

    $sqlBuscaNHC="SELECT AES_DECRYPT(NHC, '$claveNHC') FROM identificador_paciente WHERE Id_Hospital='$Hospital'";
	$rs= mysqli_query($conexion,$sqlBuscaNHC)
        or die('Error: ' . mysqli_error());
    
    $num = mysqli_num_rows($rs);
    
    if ($num > 0) //Hay datos
    {
        $encontrado = 0;
        while($rowNHC=mysqli_fetch_array($rs))
        {
            $a = $rowNHC[0];
            

            if ($a == $BuscaNHC)
            {
                $encontrado = 1;
                $_SESSION["NHCBusqueda"]=$a; 
                break;
            }
        }
        
        if ($encontrado == 1) //Lo ha encontrado
        {

            mysqli_close($conexion);
 
            header("Location: listado_pacientes.php");
        }
        else //No lo ha encontrado
        {
            
            mysqli_close($conexion);
 
            header("Location: PacienteInexistente.php");
        }
    }
    else 
    {
           
        mysqli_close($conexion);
 
         header("Location: PacienteInexistente.php");
    }
       
?>