<?php
session_start();
require_once ('../../BDD/conexion.php');
require ('Carga_Datos_Patologica.php');

$NHC=$_POST["NHC"];
//$NHC=$_GET["NHC"];

if (!isset($_SESSION["NombreHospital"])){
     
     header("Location: ../../login/Sign_In.php?var=Caduca");

}else{
    
    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto Vikingo::Patológica<</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../assets/css/docs.css" rel="stylesheet" />
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">


    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
    <link href="../../assets/css/bootstrap.icon-large.min.css" rel="stylesheet">  
   
     
    <!-- **********************   jQuery   ********************************************************** -->   
    <link rel="stylesheet" href="../../assets/css/jquery-ui.css" />   
    
                                                     
  </head>

  <body onload="Habilita();">

     <!-- ****************************    Barra de arriba  *******************************************-->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid" style="width: 90%">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" style="float: left;" href="../../Principal.php">Proyecto Vikingo</a>
                <div class="nav-collapse">
                    <p class="pull-right navbar-form" style="color: #FFFFFF; font-size: 18px; ">
                        <span style="vertical-align: -20%">
                           <i class="icono-large-white icono-building"></i>
                           <?php 
                                $Nombre=$_SESSION["NombreHospital"];
                                if (is_numeric($Nombre))
                                {
                                    $query = "SELECT Nombre FROM tabla_hospital WHERE Codigo = '$Nombre'";
                                    $result = mysqli_query($conexion, $query);

                while ($row = mysqli_fetch_array($result))
                                    {
                                            $Nombre = $row['Nombre']; 
                                            $_SESSION["Hospital"] = $Nombre;
                                    }
                                }
                            echo utf8_encode($Nombre);
                                
                            ?>
                        </span>
                        <button onclick="location.href='../../login/Cerrar_Sesion.php'" class="btn">
                            <i class="icon-off"></i>
                        Cerrar sesión</button>
                        
                        <!--Función php que dará el nombre del hospital al hacer el login-->
                    </p>
            
                </div><!--/.nav-collapse collapse -->
            </div> <!-- container-fluid -->
        </div> <!-- navbar-inner -->
    </div><!--/.navbar navbar-inverse navbar-fixed-top-->
    
    <div class="container-fluid">
		<div class="span1"></div>
        <!-- ****************************    Contenido  *******************************************-->
		
        <div class="span10" name="general">
			 <form action="IntroducirDatosPendientesPatologica.php" method="post" id="Patologica" name="Patologica" >
				<!-- ************   Histológico  ************* -->
				<input type="hidden" value="<?php echo ($NHC); ?>" id="NHC" name="NHC" />
				<a name="histologia"> &nbsp;</a>
				<br/>
				<br/>   
		 
				<h3 >Histología</h3>
				
				<div class="hero-unit">
					<div class="row-fluid">
						<dl class="dl-horizontal-principal">
	                       <dt>
	                           <label>Tipo histológico</label>
	                       </dt>
	                       <dd>
	                            <?php
									$res=mysqli_query($conexion,$Tipo_Histologico);    
								?>
								<select id="tabla_tipo_histologico" name="tabla_tipo_histologico" required onchange="isOtrosSelected();">
									<?php
										while ($row=mysqli_fetch_array($res)) {
									?>                                        
									<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
										
									<?php
										}   
									?>
								</select>
	                       </dd>
	                       
	                       <dt>
	                           <label>Otro tipo histológico</label>
	                       </dt>
	                       <dd>
	                           <input type="text" id="tabla_tipo_otros_histologico" name="tabla_tipo_otros_histologico" />
	                       </dd>
	                       
	                       <dt>
	                           <label>Clasificación TNM</label>
	                       </dt>
	                       <dd>
	                           <dl class="dl-horizontal-secundario-pequeno">
	                               <dt>
	                                   <label class="margen">T</label>
	                               </dt>
	                               <dd>
	                                   <?php
											$res=mysqli_query($conexion,$Tipo_T);    
										?>
										<select id="tabla_tipo_t" name="tabla_tipo_t" style="width: 100px;" required onchange="EstadioPatologico();">
											<?php
												while ($row=mysqli_fetch_array($res)) {
													?>                                        
													<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
													
													<?php
												}   
											?>
										</select>
	                               </dd>
	                               
	                               <dt>
	                                   <label>N</label>
	                               </dt>
	                               <dd>
	                                   <input type="text" id="tabla_tipo_n" name="tabla_tipo_n" readonly="readonly"/> 
	                               </dd>
	                               
	                               <dt>
	                                   <label>M</label>
	                               </dt>
	                               <dd>
									   <input type="text" id="tabla_tipo_m" name="tabla_tipo_m" style="font-weight: normal; font-size: 14px; width: 100px;" readonly="readonly" />
	                               </dd>
	                               
	                           </dl>
	                       </dd>
	                       
	                       <dt>
	                           <label>Estadío tumoral</label>
	                       </dt>
	                       <dd>
	                           <input type="text" id="tabla_estadio_tumor" name="tabla_estadio_tumor" class="alignRight" readonly="readonly" />
	                       </dd>
	                       
	                       <dt>
	                           <label>Nº de ganglios aislados</label>
	                       </dt>
	                       <dd>
	                           <input id="Ganglios_Ais" name="Ganglios_Ais" class="alignRight" type="text" pattern="[0-9]+" placeholder="Introduzca un número entero" autocomplete="off" required onchange="EstadioPatologico();"> </input>
	                       </dd>
	                       
	                       <dt>
	                           <label>Nº de ganglios afectados</label>
	                       </dt>
	                       <dd>
	                           <input id="Ganglios_Afec" name="Ganglios_Afec" class="alignRight" type="text" pattern="[0-9]+" placeholder="Introduzca un número entero" autocomplete="off" required onchange="EstadioPatologico();" > </input>
	                       </dd>
                            
                        </dl>	
					</div> <!-- row-fluid -->
				</div><!--/hero-unit-->
				
				<!-- ************   Separación  ************* -->
				<hr />
				<!-- ************   Resección  ************* -->
				<a name="reseccion"> &nbsp;</a>
				<br/>   
				<br/>          
				<h3 >Resección</h3>
				<div class="hero-unit">
					<div class="row-fluid">
						<dl class="dl-horizontal-principal">
					        <dt>
					            <label>Margen distal</label>
					        </dt>
					        <dd>
					            <label for="Radio_Margen_D_Libre">
									<input type="radio" name="Id_Margen_Distal" id="Radio_Margen_D_Libre" value="1" required/>
								Libre</label>
								<label for="Radio_Margen_A_Afecto">
									<input type="radio" name="Id_Margen_Distal" id="Radio_Margen_A_Afecto" value="2" required/>
								Afecto</label>
					        </dd>
					        
					        <dt>
					            <label>Margen circunferencial</label>
					        </dt>
					        <dd>
					            <label for="Radio_Margen_C_Libre">
									<input type="radio" name="Id_Margen_Circunferencial" id="Radio_Margen_C_Libre" value="1" required/>
								Libre</label>
								<label for="Radio_Margen_C_Afecto">
									<input type="radio" name="Id_Margen_Circunferencial" id="Radio_Margen_C_Afecto" value="2" required/> 
								Afecto</label>
					        </dd>
					        
					        <dt>
					            <label>Tipo resección</label>
					        </dt>
					        <dd>
					            <label for="Radio_Reseccion_R0">
									<input type="radio" name="tabla_tipo_reseccion" id="Radio_Reseccion_R0" value="1" required/> 
								R0</label>
								<label for="Radio_Reseccion_R1">
									<input type="radio" name="tabla_tipo_reseccion" id="Radio_Reseccion_R1" value="2" required/>
								R1</label>
								<label for="Radio_Reseccion_R2">
									<input type="radio" name="tabla_tipo_reseccion" id="Radio_Reseccion_R2" value="3" required/>
								R2</label>
					        </dd>
					        
					        <dt>
					            <label>Grado de regresión</label>
					        </dt>
					        <dd>
					            <?php
									$res=mysqli_query($conexion,$Tipo_Regresion);   
								?>
								<select id="tabla_tipo_regresion" name="tabla_tipo_regresion" required>
									<?php
										while ($row=mysqli_fetch_array($res)) {
									?>                                   
										<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
										
									<?php
										}
									?>
								</select>
					        </dd>
					        
					        <dt>
					            <label>Estadio tumor sincrónico</label>
					        </dt>
					        <dd>
					            <?php
									$res=mysqli_query($conexion,$Estadio_sincronico);   
								?>
								<select id="Id_Estadio_Sincronico" name="Id_Estadio_Sincronico" required>
									<?php
										while ($row=mysqli_fetch_array($res)) {
									?>                                   
										<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
										
									<?php
										}
									?>
								</select>
					        </dd>
					        
					        <dt>
					            <label>Calidad mesorrecto</label>
					        </dt>
					        <dd>
					            <label for="Radio_Calidad_Mesorre_S">
									<input type="radio" name="tabla_tipo_calidad_meso" id="Radio_Calidad_Mesorre_S" value="1" required/>
								Satisfactoria</label>
								<label for="Radio_Calidad_Mesorre_P">
									<input type="radio" name="tabla_tipo_calidad_meso" id="Radio_Calidad_Mesorre_P" value="2" required/>
								Parcial</label>
								<label for="Radio_Calidad_Mesorre_I">
									<input type="radio" name="tabla_tipo_calidad_meso" id="Radio_Calidad_Mesorre_I" value="3" required/>
								Insatisfactoria</label>
					        </dd>
					    </dl>
					</div> <!-- row-fluid -->
				</div><!--/hero-unit-->
				<input id="ButtonEnviarPatologica" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar" />
         	</form>
			
		</div> <!-- "span10" name="general" -->

    </div><!--/container-fluid--> 
      

      <?php 
    
    	$sqlIdPaciente="SELECT ID FROM identificador_paciente WHERE NHC='$NHC'";
		
			$res=mysqli_query($conexion,$sqlIdPaciente)
				 or die('Error: ' . mysqli_error());
				 
				 
    		$row=mysqli_fetch_array($res);
			$IdPaciente=$row[0];
			
    
    
    	
			
		$sqlIdCirugia="SELECT ID FROM cirugia WHERE Id_Paciente='$IdPaciente'";
		
		$res=mysqli_query($conexion,$sqlIdCirugia)
				 or die('Error: ' . mysqli_error());
				 
				 
    		$row=mysqli_fetch_array($res);
			$IdCirugia=$row[0];
		
			
    ?>  
    
     
     <input type="hidden" id="TumorSincro" name="TumorSincro" value="

        <?php 
            
           //Tenemos $IdPaciente
            
            $sqlSincro="SELECT B_Sincro FROM inicial WHERE Id_Paciente='$IdPaciente'";
			
			$res=mysqli_query($conexion,$sqlSincro)
				 or die('Error: ' . mysqli_error());
				  
    		$row=mysqli_fetch_array($res);
			$Sincro=$row[0];
			echo ($Sincro);

        ?>

    "/>
    

        <!--/Condiciones metástasis--> 
    <input type="hidden" id="MetastInicial" name="MetastInicial" value="

        <?php 
            
           //Tenemos $IdPaciente
            
            $sqlMetast="SELECT B_Metast_Inicial FROM inicial WHERE Id_Paciente='$IdPaciente'";
			
			$res=mysqli_query($conexion,$sqlMetast)
				 or die('Error: ' . mysqli_error());
				  
    		$row=mysqli_fetch_array($res);
			$Metast=$row[0];
			echo ($Metast);

        ?>

    "/>

    <input type="hidden" id="Tipo_Metast_Hepaticas" name="Tipo_Metast_Hepaticas" value="

        <?php 
            
             $sqlMetast="SELECT Id_Metast_Hepaticas FROM tabla_caracteristicas_cirugia WHERE Id_Cirugia='$IdCirugia'";
			
			$res=mysqli_query($conexion,$sqlMetast)
				 or die('Error: ' . mysqli_error());
				  
    		$row=mysqli_fetch_array($res);
			$MetastHepa=$row[0];
			echo ($MetastHepa);
        ?>

"/>
    

    <input type="hidden" id="Imp_Ovaricos" name="Imp_Ovaricos" value="
    
  
        <?php 
           $sqlImplantes="SELECT Implantes_Ovaricos FROM tabla_caracteristicas_cirugia WHERE Id_Cirugia='$IdCirugia'";
			
			$res=mysqli_query($conexion,$sqlImplantes)
				 or die('Error: ' . mysqli_error());
				  
    		$row=mysqli_fetch_array($res);
			$MetastOvar=$row[0];
			echo ($MetastOvar);
            ?>
    "/>
    
    
    <!-- Condiciones cirugía-->
    
    
    <input type="hidden" id="Tecnicas_Cirugia" name="Tecnicas_Cirugia" value="
   
    	<?php
    		$sqlTecnicas="SELECT Id_Tecnica FROM tabla_cirugia WHERE Id_Cirugia='$IdCirugia'";
    		
			$res=mysqli_query($conexion,$sqlTecnicas)
				 or die('Error: ' . mysqli_error());
				  
    		$row=mysqli_fetch_array($res);
			$Tecnica=$row[0];
			echo ($Tecnica);
    	
    	?>
    
    "/>
    
    
     <input type="hidden" id="ExeresisMeso" name="ExeresisMeso" value="
   
    	<?php
   			$sqlExeresis="SELECT Id_Exeresis_Meso FROM tabla_cirugia WHERE Id_Cirugia='$IdCirugia'";
		
			$res=mysqli_query($conexion,$sqlExeresis)
				 or die('Error: ' . mysqli_error());
				 
				 
    		$row=mysqli_fetch_array($res);
			$Exeresis=$row[0];
			echo($Exeresis);
    	
    	?>
    
    "/>

 
  <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap-transition.js"></script>
    <script src="../../assets/js/bootstrap-alert.js"></script>
    <script src="../../assets/js/bootstrap-modal.js"></script>
    <script src="../../assets/js/bootstrap-dropdown.js"></script>
    <script src="../../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../../assets/js/bootstrap-tab.js"></script>
    <script src="../../assets/js/bootstrap-tooltip.js"></script>
    <script src="../../assets/js/bootstrap-popover.js"></script>
    <script src="../../assets/js/bootstrap-button.js"></script>
    <script src="../../assets/js/bootstrap-collapse.js"></script>
    <script src="../../assets/js/bootstrap-carousel.js"></script>
    <script src="../../assets/js/bootstrap-typeahead.js"></script>
    
    
     
    <!-- **********************   jQuery   ********************************************************** -->   
    <script src="../../assets/jQuery/jquery.min.js"></script>
    <script src="../../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../../assets/jQuery/jquery-ui.js"></script>
    
    
    <!-- **********************   Llamamos a nuestras funciones de Javascript y jQuery ********************************************************** -->    
    <script src="../../assets/js/vikingo_js.js"></script>
    <script src="patologica_js.js"></script>
    
    
  </body>
</html>

<?php
}
?>