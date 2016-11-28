<?php

//Carga los NHC-s de los pacientes (Busca Paciente)
session_start();
    
    require ("../BDD/conexion.php");


$Hospital=$_SESSION["NombreHospital"];

$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

$row = mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
    or die('Error: ' . mysqli_error());

$Hospital=$row[0];



$sql="SELECT AES_DECRYPT(NHC,'$claveNHC') AS NHC FROM identificador_paciente id WHERE Id_Hospital='$Hospital' ORDER BY NHC ASC";

$res=mysqli_query($conexion,$sql);



 //Crear la tabla de todos los pacientes

$TablaNHC = "";
while ($row=mysqli_fetch_array($res))
{      
    
    $TablaNHC = $TablaNHC . "<tr>";
    $TablaNHC = $TablaNHC .  "<td>" . $row[0] . "</td>";
    
    $TablaNHC = $TablaNHC .  "<td>
                                <div class=\"navbar\">
                            
                                    <form class=\"navbar-form pull-left\" action=\"ver_paciente.php\" method=\"post\" >
                                        <input type=\"hidden\" value=\"$row[0]\" id=\"NHC\" name=\"NHC\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn btn-primary\">
                                          <i class=\"icon-eye-open icon-white\"></i>
                                        Ver</button>
                                    </form>
                                    
                                    <form class=\"navbar-form pull-left\" action=\"modifica_paciente.php\" method=\"post\" >
                                        <input type=\"hidden\" value=\"$row[0]\" id=\"NHC\" name=\"NHC\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn\">
                                          <i class=\"icon-edit\"></i>
                                        Modificar</button>
                                    </form>
                                    
                                    <form class=\"navbar-form pull-left\" action=\"exportar_datos_word.php\" method=\"post\" >
                                        <input type=\"hidden\" value=\"$row[0]\" id=\"NHC\" name=\"NHC\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn btn-primary\">
                                          <i class=\"icon-download-alt icon-white\"></i>
                                          Descargar datos a word</button>
                                    </form>
                                  
                                </div>
                            </td>";
                            
    $TablaNHC = $TablaNHC . "</tr>";
}



//output the response
mysqli_close($conexion);
echo $TablaNHC;    
?>