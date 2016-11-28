<?php
session_start();

require_once ("../../BDD/conexion.php");

$Hospital=$_GET["ID"];
$hoy = date("y.m.d"); 

$TablaNHC = "";

$sql="SELECT AES_DECRYPT (identificador_paciente.NHC,'$claveNHC') AS NHC, tabla_patologica.Estado AS ESTADO, 
	      		tratamiento.B_Tto_Ady AS ADY, cirugia.ID AS IDCir FROM identificador_paciente INNER JOIN tabla_patologica 
	      		ON identificador_paciente.ID=tabla_patologica.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' INNER JOIN tratamiento 
	      		ON identificador_paciente.ID=tratamiento.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' 
	      		INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' ORDER BY NHC ASC "; 
				
				$res=mysqli_query($conexion,$sql);
				
				while ($row=mysqli_fetch_array($res)){		
					
					$ValorNHC=$row[0];
					$ValorEstado=intval($row[1]);
					$ValorAdy=intval($row[2]);
					$IDCirugia=intval($row[3]);

					$sqlSiCirugia="SELECT B_Cirugia FROM cirugia WHERE ID='$IDCirugia'";
						
						$row=mysqli_fetch_array(mysqli_query($conexion,$sqlSiCirugia))
       						or die('Error: ' . mysqli_error());
					
					
						$Cirugia=$row[0];
					
				$FechaAlta=1;
				if ($Cirugia==1){
					$sqlFechaAlta="SELECT Fecha_Alta FROM tabla_cirugia WHERE Id_Cirugia='$IDCirugia'";
					
					$row=mysqli_fetch_array(mysqli_query($conexion,$sqlFechaAlta))
       						or die('Error: ' . mysqli_error());
       						
       				$FechaAlta=$row[0];		
				}
					$FechaAlta=strval($FechaAlta);
				
					
				if ($ValorEstado==3 || $ValorAdy==0 || $FechaAlta=="0000-00-00" || $FechaAlta==null){
	      		
              $TablaNHC = $TablaNHC .  "<tr>";       
                        	
              $TablaNHC = $TablaNHC .  "<td>" .$ValorNHC . "</td>";
              $TablaNHC = $TablaNHC .  "<td></td>";
              
                            if($ValorAdy==0){
              $TablaNHC = $TablaNHC .  "<td>              	
                            		<form action=\"Adyuvante/RellenarAdyuvante.php\" method=\"post\" >
										<input type=\"hidden\" value=".$Hospital." id=\"idHospital\" name=\"idHospital\" />
                        				<input type=\"hidden\" value=".$ValorNHC." id=\"NHC\" name=\"NHC\" />
                            			<input type=\"submit\" value=\"Rellena adyuvante\" class=\"btn btn-primary\" style=\"height: 100; text-align: center\" />
                            		</form>
                            		</td>";
									}
									else{
			$TablaNHC = $TablaNHC .  "<td></td>";							
									}
								
							if($ValorEstado==3){	
									
             $TablaNHC = $TablaNHC .  "<td>
                            	
                            		<form action=\"Patologica/RellenarPatologica.php\" method=\"post\" >
										<input type=\"hidden\" value=".$Hospital." id=\"idHospital\" name=\"idHospital\" />
                        				<input type=\"hidden\" value=".$ValorNHC." id=\"NHC\" name=\"NHC\" />
                            			<input type=\"submit\" value=\"Rellena patológica\" class=\"btn btn-primary\" style=\"height: 100; text-align: center\" />
                            		</form>
                            		</td>";
                            		}
                            		else{
             $TablaNHC = $TablaNHC .  "<td></td>";	
                            	}
                     
					 if($FechaAlta=="0000-00-00" || $FechaAlta==null){       
                            
               $TablaNHC = $TablaNHC .  "<td>                   
                            		<form action=\"FechaAlta/RellenarFechaAlta.php\" method=\"post\" >
										<input type=\"hidden\" value=".$Hospital." id=\"idHospital\" name=\"idHospital\" />
                        				<input type=\"hidden\" value=".$ValorNHC." id=\"NHC\" name=\"NHC\" />
                            			<input type=\"submit\" value=\"Rellena fecha de alta\" class=\"btn btn-primary\" style=\"height: 100; text-align: center\" />
                            		</form>
									</td>";
                            	}else{
              $TablaNHC = $TablaNHC .  "<td></td>";
                            	}
              $TablaNHC = $TablaNHC .  "</tr>";
                        
	}//If de las 3 opciones
}//while


mysqli_close($conexion);
 
echo $TablaNHC;

?>