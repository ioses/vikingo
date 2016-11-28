<?php

session_start();
    require ("../../BDD/conexion.php");

$Hospital=$_GET["ID"];

$sql="SELECT AES_DECRYPT(NHC,'$claveNHC') AS NHC FROM identificador_paciente id WHERE Id_Hospital='$Hospital' ORDER BY NHC ASC";

$res=mysqli_query($conexion,$sql);


/*
 * Crear la tabla de todos los pacientes
 */

$TablaNHC = "";
while ($row=mysqli_fetch_array($res))
{      
    $NHC=$row[0];
	
    $TablaNHC = $TablaNHC . "<tr>";
    $TablaNHC = $TablaNHC .  "<td>" . $NHC . "</td>";
    
    $TablaNHC = $TablaNHC .  "<td>
                                <div class=\"navbar\">
                            
                                    <form class=\"navbar-form pull-left\" action=\"ver_paciente.php\" method=\"post\" >
										<input type=\"hidden\" value=\"$Hospital\" id=\"IdHospital\" name=\"IdHospital\" />
                                        <input type=\"hidden\" value=\"$row[0]\" id=\"NHC\" name=\"NHC\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn btn-primary\">
                                          <i class=\"icon-eye-open icon-white\"></i>
                                        Ver</button>
                                    </form>
                                    
                                    <form class=\"navbar-form pull-left\" action=\"modifica_paciente.php\" method=\"post\" >
										<input type=\"hidden\" value=\"$Hospital\" id=\"IdHospital\" name=\"IdHospital\" />
                                        <input type=\"hidden\" value=\"$row[0]\" id=\"NHC\" name=\"NHC\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn\">
                                          <i class=\"icon-edit\"></i>
                                        Modificar</button>
                                    </form>

                                </div>
                            </td>";
                            
    $TablaNHC = $TablaNHC . "</tr>";
}


mysqli_close($conexion);
 

//output the response

echo $TablaNHC;    
?>