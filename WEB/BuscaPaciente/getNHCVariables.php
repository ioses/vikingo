<?php
//Crea de la tabla con los pacientes (Ver, Modifica y Descargar datos a word)


session_start();
require_once ('../BDD/conexion.php');

$Hospital=$_SESSION["NombreHospital"];

$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

$row = mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
    or die('Error: ' . mysqli_error());

$Hospital=$row[0];



$sql="SELECT AES_DECRYPT(NHC, '$claveNHC') AS NHC FROM identificador_paciente id WHERE Id_Hospital='$Hospital'";


$rowNHC=mysqli_fetch_array(mysqli_query($conexion,$sql))
        or die('Error: ' . mysqli_error());

$NHC=$_SESSION["NHCBusqueda"];

 //Crear la tabla de todos los pacientes


$TablaNHC = "";
     
    
    $TablaNHC = $TablaNHC . "<tr>";
    $TablaNHC = $TablaNHC .  "<td>" . $NHC . "</td>";
    
    $TablaNHC = $TablaNHC .  "<td>
                                                               
                                 <div class=\"navbar\">
                                                            
                                    <form class=\"navbar-form pull-left\" action=\"../GestionPaciente/ver_paciente.php\" method=\"post\" >
                                        <input type=\"hidden\" value=\"$NHC\" id=\"NHC\" name=\"NHC\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn btn-primary\">
                                          <i class=\"icon-eye-open icon-white\"></i>
                                        Ver</button>
                                    </form>
                                    
                                    <form class=\"navbar-form pull-left\" action=\"../GestionPaciente/modifica_paciente.php\" method=\"post\" >
                                        <input type=\"hidden\" value=\"$NHC\" id=\"NHC\" name=\"NHC\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn\">
                                          <i class=\"icon-edit\"></i>
                                        Modificar</button>
                                    </form>
                                    
                                    <form class=\"navbar-form pull-left\" action=\"../GestionPaciente/exportar_datos_word.php\" method=\"post\" >
                                        <input type=\"hidden\" value=\"$NHC\" id=\"NHC\" name=\"NHC\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn btn-primary\">
                                          <i class=\"icon-download-alt icon-white\"></i>
                                          Descargar datos a word</button>
                                    </form>
                                </div>
                            </td>";
                            
    $TablaNHC = $TablaNHC . "</tr>";




mysqli_close($conexion);
 
//output the response

echo $TablaNHC;    
?>