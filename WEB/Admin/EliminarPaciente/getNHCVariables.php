<?php
//Carga los NHC-s de los pacientes (Busca Paciente)
session_start();
require_once ('../../BDD/conexion.php');

$idHospital = $_GET["idHospi"];


$TablaNHC = "";

	$NombreHospi="SELECT Nombre FROM tabla_hospital WHERE Codigo='$idHospital'";
	$Hospi=mysqli_query($conexion,$NombreHospi);
	$row=mysqli_fetch_array($Hospi);
	$Hospital=$row[0];


    $sql="SELECT AES_DECRYPT(NHC,'$claveNHC') AS NHC FROM identificador_paciente id WHERE Id_Hospital='$idHospital' ORDER BY NHC ASC";
    $res=mysqli_query($conexion,$sql);
    

    while ($row=mysqli_fetch_array($res))
    {
        $TablaNHC = $TablaNHC . "<tr>";
        $TablaNHC = $TablaNHC .  "<td>" . $row[0] ."</td>";
        
    $TablaNHC = $TablaNHC .  "<td>
                                <div class=\"navbar\">
                            
                                    <form class=\"navbar-form pull-left\" action=\"../GestionPacienteAdmin/ver_paciente.php\" method=\"post\" >
                                        <input type=\"hidden\" value=\"$row[0]\" id=\"NHC\" name=\"NHC\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn btn-primary\">
                                          <i class=\"icon-eye-open icon-white\"></i>
                                        Ver</button>
                                    </form>
                                    
                                    <form class=\"navbar-form pull-left\" action=\"elimina_paciente.php\" method=\"post\" >
                                        <input type=\"hidden\" value=\"$row[0]\" id=\"NHC\" name=\"NHC\" />
                                        <input type=\"hidden\" value=\"$Hospital\" id=\"Hospital\" name=\"Hospital\" />
                                        <input type=\"hidden\" value=\"$idHospital\" id=\"idHospi\" name=\"idHospi\" />
                                        <button type=\"submit\" value=\"Ver paciente\" class=\"btn btn-warning\">
                                          <i class=\"icon-edit\"></i>
                                        Eliminar</button>
                                    </form>

                                </div>
                            </td>";
                                
        $TablaNHC = $TablaNHC . "</tr>";

    }


//output the response

echo $TablaNHC;    
?>