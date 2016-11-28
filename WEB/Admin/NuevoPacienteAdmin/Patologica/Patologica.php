<?php
session_start();
require_once ('../../../BDD/conexion.php');
require ('Carga_Datos_Patologica.php');

if (!isset($_SESSION["EntraAdmin"])){

    header("Location: ../../../login/Sign_In.php?var=Caduca");    
    
}else{
   
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto Vikingo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../../assets/css/bootstrap-responsive.css" rel="stylesheet">


    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../../../assets/ico/favicon.png">
    
    <link href="../../assets/css/bootstrap.icon-large.min.css" rel="stylesheet">
    
     <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../../assets/js/jquery.js"></script>
    <script src="../../../assets/js/bootstrap-transition.js"></script>
    <script src="../../../assets/js/bootstrap-alert.js"></script>
    <script src="../../../assets/js/bootstrap-modal.js"></script>
    <script src="../../../assets/js/bootstrap-dropdown.js"></script>
    <script src="../../../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../../../assets/js/bootstrap-tab.js"></script>
    <script src="../../../assets/js/bootstrap-tooltip.js"></script>
    <script src="../../../assets/js/bootstrap-popover.js"></script>
    <script src="../../../assets/js/bootstrap-button.js"></script>
    <script src="../../../assets/js/bootstrap-collapse.js"></script>
    <script src="../../../assets/js/bootstrap-carousel.js"></script>
    <script src="../../../assets/js/bootstrap-typeahead.js"></script>
    
    
     
    <!-- **********************   jQuery   ********************************************************** -->   
    <script src="../../../assets/jQuery/jquery.min.js"></script>
    <link rel="stylesheet" href="../../../assets/css/jquery-ui.css" />
    <script src="../../../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../../../assets/jQuery/jquery-ui.js"></script>
    
   
    <!-- **********************   Llamamos a nuestras funciones de Javascript y jQuery ********************************************************** -->    
    <script src="../../../assets/js/vikingo_js.js"></script>
    <script src="patologica_js.js"></script>
    
    
                                                     
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
                <a class="brand" href="../../../Principal_Admin.php">Proyecto Vikingo</a>
                <div class="nav-collapse">
                    <p class="pull-right navbar-form" style="color: #FFFFFF; font-size: 18px; ">
                      <span class="navbar-text" style="color: #FFFFFF">
                      ADMINISTRADOR
                      </span>
                        <button onclick="location.href='../../../login/Cerrar_Sesion.php'" style="vertical-align: 15%" class="btn">
                            <i class="icon-off"></i>
                        Cerrar sesión</button>
                        
                        <!--Función php que dará el nombre del hospital al hacer el login-->
                    </p>
            	   <p class="navbar-text" style="color: #FFFFFF; font-size: 1.5em; text-align: center  ">
                        <?php
            		
            		echo ("NHC: ".$_SESSION["NHC"]);
					?>

                     
                    </p>
                </div><!--/.nav-collapse collapse -->
            </div> <!-- container-fluid -->
        </div> <!-- navbar-inner -->
    </div><!--/.navbar navbar-inverse navbar-fixed-top-->
    
    <div class="container-fluid">
        <!-- ****************************    Barra lateral  *******************************************-->
        <div class="span2">
            <div id="menuFloat">
				<div class="accordion well sidebar-nav">
					<div class="accordion-group">  
						<div class="accordion-heading">  
							<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2"  onclick="abrir('../Inicial/Inicial.php');" href="#collapseOne">  
							  Inicial  
							</a>  
						</div>  <!-- accordion-heading  -->
						<div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">  
						  
						</div>  <!-- collapseOne  -->
					</div>  <!-- accordion-group  -->
				
					<div class="accordion-group">  
						<div class="accordion-heading">  
							<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('../Tratamiento/Tratamiento.php');" href="#collapseTwo">  
							Tratamiento  
							</a>  
						</div>  <!-- accordion-heading  -->
						<div id="collapseTwo" class="accordion-body collapse" style="height: 0px; ">  
						  
						</div>  <!-- accordion-body collapse  -->
					</div> <!-- accordion-group  -->
				
					<div class="accordion-group">  
						<div class="accordion-heading">  
							<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('../Cirugia/Cirugia.php');" href="#collapseThree">  
							  Cirugía  
							</a>  
						</div>  <!-- accordion-heading -->
						<div id="collapseThree" class="accordion-body collapse" style="height: 0px; ">  
						 
						</div> <!-- accordion-body collapse -->
					</div> <!-- accordion-group -->
				
					<div class="accordion-group">  
						<div class="accordion-heading">  
							<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('../Patologica/Patologica.php');" href="#collapseFour">  
							  Anatomía patológica  
							</a>  
						</div>  <!-- accordion-heading -->
						<div id="collapseFour" class="accordion-body">  
							<div class="accordion-inner">  
								<li><a href="#histologia" target="_top">Histología</a></li>
								<li><a href="#reseccion" target="_top">Resección</a></li>
							</div> <!-- accordion-body collapse --> 
						</div>  <!-- accordion-body collapse --> 
					</div>  <!-- accordion-group -->
				
				</div><!--/.accordion well sidebar-nav -->
            </div><!--menuFloat-->
        </div><!--/span2-->
        
        <!-- ****************************    Contenido  *******************************************-->

        <div class="span10" name="general">
			 <form action="IntroducirDatosPatologica.php" method="post" id="Patologica" name="Patologica" >
				<!-- ************   Histológico  ************* -->
		     <h4 class="checkbox">
                <input type="checkbox" name="rellenar" id="rellenar" value="1" style="margin-top: 10px;">
            No rellenar en este momento</h4>
				
				<a name="histologia"> &nbsp;</a>
				<br/>
				<br/>   
		 
				<h3 >Histología</h3>
				
				<div class="hero-unit">
					<div class="row-fluid">
						<div class="span12">&nbsp;</div>
							<div class="span12">
								<div class="span4"> <!-- Solo los labels-->
									<label class="labelGrado1" style="margin-top: 8px;">Tipo histológico</label>
								</div><!-- /span4 Solo los labels-->
								<div class="span1">
								</div>
								<div class="span6"><!-- Solo las opciones (selects)-->
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
								</div><!-- /span6 Solo las opciones (selects)-->
							</div><!--/span12-->
						
							<div class="span12" style="margin-top: 5px;">
								<div class="span4" style="margin-top: 5px;"> <!-- LABELS-->
									<label class="labelGrado1" >Otro tipo histológico</label>
								</div><!-- /span4 LABELS-->
								<div class="span1">
								</div>
								<div class="span6"><!-- INPUTS-->
									 <input type="text" id="tabla_tipo_otros_histologico" name="tabla_tipo_otros_histologico" />
								</div><!-- /span6 INPUTS-->
							</div><!--/span12-->
							
							<div class="span12" style="margin-top: 20px;">
								<div class="span4"> <!-- LABELS-->
									<label class="labelGrado1" >Clasificación TNM</label>
								</div><!-- /span4 LABELS-->
								<div class="span1">
								</div>
								<div class="span6"><!-- DATOS-->
									<div class="span2"><!--LABELS-->
										 <label class="labelGrado2 labelRadio">T</label>
										 <label class="labelGrado2 labelRadio" style="margin-top: 17px;">N</label>
										 <label class="labelGrado2 labelRadio" style="margin-top: 17px;">M</label>
									</div><!--/span2 LABELS-->
									<div class="span1">
									</div>
									<div class="span8"><!--SELECTS-->
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
										<br />
										<input type="text" id="tabla_tipo_n" name="tabla_tipo_n" style="font-weight: normal; font-size: 14px; margin-bottom: 5px; width: 100px;" readonly="readonly"/> 
										<br/>
										<input type="text" id="tabla_tipo_m" name="tabla_tipo_m" style="font-weight: normal; font-size: 14px; width: 100px;" readonly="readonly" /> <!--value="<?php echo($_SESSION["MetastInicial"]); ?>"/>-->
									</div><!-- /span6 SELECTS-->
								</div><!-- /span6 DATOS-->
							</div><!--/span12-->
							
							<div class="span12" style="margin-top: 5px;">
								<div class="span4"> <!-- LABELS-->
									<label class="labelGrado1" >Estadío tumoral</label>
								</div><!-- /span4 LABELS-->
								<div class="span1">
								</div>
								<div class="span6"><!-- INPUTS-->
									<input type="hidden" id="MetastInicial" name="MetastInicial" value="<?php echo($_SESSION["MetastInicial"]); ?>" />
									 <input type="text" id="tabla_estadio_tumor" name="tabla_estadio_tumor" class="alignRight" style="font-weight: normal; font-size: 14px; margin-top: -5px;" readonly="readonly" />
								</div><!-- /span6 INPUTS-->
							</div><!--/span12-->
							
							<div class="span12" style="margin-top: 5px;">
								<div class="span4"> <!-- LABELS-->
									<label class="labelGrado1" style="margin-top: 6px;">Nº de ganglios aislados</label>
								</div><!-- /span4 LABELS-->
								<div class="span1">
								</div>
								<div class="span6"><!-- INPUTS-->
									 <input id="Ganglios_Ais" name="Ganglios_Ais" class="alignRight" type="text" pattern="[0-9]+" placeholder="Introduzca un número entero" autocomplete="off" required onchange="EstadioPatologico();"> </input>
								</div><!-- /span6 INPUTS-->
							</div><!--/span12-->
								
							<div class="span12" style="margin-top: 5px;">
								<div class="span4"> <!-- LABELS-->
									<label class="labelGrado1" style="margin-top: 5px;">Nº de ganglios afectados</label>
								</div><!-- /span4 LABELS-->
								<div class="span1">
								</div>
								<div class="span6"><!-- INPUTS-->
									  <input id="Ganglios_Afec" name="Ganglios_Afec" class="alignRight" type="text" pattern="[0-9]+" placeholder="Introduzca un número entero" autocomplete="off" required onchange="EstadioPatologico();" > </input>
								</div><!-- /span6 INPUTS-->
							</div><!--/span12-->
					
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
						<div class="span12">&nbsp;</div>
						<div class="span12">
							<div class="span4" style="margin-top: 3px;"> <!-- LABELS-->
								<label class="labelGrado1" >Margen distal</label>
							</div><!-- /span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!-- RADIO-->
								<label for="Radio_Margen_D_Libre">
									<input type="radio" name="Id_Margen_Distal" id="Radio_Margen_D_Libre" value="1" required/>
								Libre</label>
								<label for="Radio_Margen_A_Afecto">
									<input type="radio" name="Id_Margen_Distal" id="Radio_Margen_A_Afecto" value="2" required/>
								Afecto</label>
							</div><!-- /span6 RADIO-->
						</div><!--/span12-->
							
						<div class="span12" style="margin-top: 10px;">
							<div class="span4" style="margin-top: 3px;"> <!-- LABELS-->
								<label class="labelGrado1" >Margen circunferencial</label>
							</div><!-- /span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!-- RADIO-->
								 <label for="Radio_Margen_C_Libre">
									<input type="radio" name="Id_Margen_Circunferencial" id="Radio_Margen_C_Libre" value="1" required/>
								Libre</label>
								<label for="Radio_Margen_C_Afecto">
									<input type="radio" name="Id_Margen_Circunferencial" id="Radio_Margen_C_Afecto" value="2" required/> 
								Afecto</label>
							</div><!-- /span6 RADIO-->
						</div><!--/span12-->
						
						<div class="span12" style="margin-top: 10px;">
							<div class="span4" style="margin-top: 3px;"> <!-- LABELS-->
								<label class="labelGrado1" >Tipo resección</label>
							</div><!-- /span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!-- RADIO-->
								<label for="Radio_Reseccion_R0">
									<input type="radio" name="tabla_tipo_reseccion" id="Radio_Reseccion_R0" value="1" required/> 
								R0</label>
								<label for="Radio_Reseccion_R1">
									<input type="radio" name="tabla_tipo_reseccion" id="Radio_Reseccion_R1" value="2" required/>
								R1</label>
								<label for="Radio_Reseccion_R2">
									<input type="radio" name="tabla_tipo_reseccion" id="Radio_Reseccion_R2" value="3" required/>
								R2</label>
							</div><!-- /span6 RADIO-->
						</div><!--/span12-->
						
						<div class="span12" style="margin-top: 20px;">
							<div class="span4" style="margin-top: 8px;"> <!-- LABELS-->
								<label class="labelGrado1" >Grado de regresión</label>
							</div><!-- /span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!-- RADIO-->
								<?php
									$res=mysqli_query($conexion,$Tipo_Regresion_Consulta);   
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
							</div><!-- /span6 RADIO-->
						</div><!--/span12-->
						
						<div class="span12" style="margin-top: 10px;">
							<div class="span4" style="margin-top: 8px;"> <!-- LABELS-->
								<label class="labelGrado1" >Estadio tumor sincrónico</label>
							</div><!-- /span4 LABELS-->
							
							<input type="hidden" id="TumorSincro" value="<?php echo($_SESSION["Sincro"]); ?>" />
							
							<div class="span1">
							</div>
							<div class="span6"><!-- RADIO-->
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
							</div><!-- /span6 RADIO-->
						</div><!--/span12-->
						
						<div class="span12" style="margin-top: 15px;">
							<div class="span4" > <!-- LABELS-->
								<label class="labelGrado1" style="margin-top: 3px;">Calidad mesorrecto</label>
							</div><!-- /span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!-- RADIO-->
								<label for="Radio_Calidad_Mesorre_S">
									<input type="radio" name="tabla_tipo_calidad_meso" id="Radio_Calidad_Mesorre_S" value="1" required/>
								Satisfactoria</label>
								<label for="Radio_Calidad_Mesorre_P">
									<input type="radio" name="tabla_tipo_calidad_meso" id="Radio_Calidad_Mesorre_P" value="2" required/>
								Parcial</label>
								<label for="Radio_Calidad_Mesorre_I">
									<input type="radio" name="tabla_tipo_calidad_meso" id="Radio_Calidad_Mesorre_I" value="3" required/>
								Insatisfactoria</label>
							</div><!-- /span6 RADIO-->
						</div><!--/span12-->
						
				  
					</div> <!-- row-fluid -->
				</div><!--/hero-unit-->
				<button id="ButtonEnviarPatologica" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar">
				    <i class="icono-forward icono-large-white"></i>
                Siguiente</button>   
         	</form>
			
		</div> <!-- "span10" name="general" -->
			
       
    </div><!--/container-fluid--> 
      
    <hr />
    
     <!--/Condiciones metástasis--> 
     
         <input type="hidden" id="TipoRes" name="TipoRes" value="
    
    
        <?php 
            
            	if (isset($_SESSION["Tipo_Res"])){
            		echo ($_SESSION["Tipo_Res"]);
            	}else {
            		echo "No hay tipo de reseccion";
            	}
  
            ?>
    
    
    "/>
     
     
     
    <input type="hidden" id="MetastInicial" name="MetastInicial" value="
    
    
        <?php 
            
            	if (isset($_SESSION["MetastInicial"])){
            		echo ($_SESSION["MetastInicial"]);
            	}else {
            		echo "-1";
            	}
  
            ?>
    
    
    "/>
    
        
   <!--/Tipos metástasis inicial--> 
    <input type="hidden" id="MetastInicialHepaticas" name="MetastInicialHepaticas" value="
    
    
        <?php 
            
                if (isset($_SESSION["Metast_Hepaticas"])){
                    echo ($_SESSION["Metast_Hepaticas"]);
                }else {
                    echo "-1";
                }
  
            ?>
    
    
    "/>
    
       <input type="hidden" id="MetastInicialOseas" name="MetastInicialOseas" value="
    
    
        <?php 
            
                if (isset($_SESSION["Metast_Oseas"])){
                    echo ($_SESSION["Metast_Oseas"]);
                }else {
                    echo "-1";
                }
  
            ?>
    
    
    "/>
    
    
        <input type="hidden" id="MetastInicialPulmonares" name="MetastInicialPulmonares" value="
    
    
        <?php 
            
                if (isset($_SESSION["Metast_Pulmonares"])){
                    echo ($_SESSION["Metast_Pulmonares"]);
                }else {
                    echo "-1";
                }
  
            ?>
    
    
    "/>
    
        <input type="hidden" id="MetastInicialNervioso" name="MetastInicialNervioso" value="
    
    
        <?php 
            
                if (isset($_SESSION["Metast_Nervioso"])){
                    echo ($_SESSION["Metast_Nervioso"]);
                }else {
                    echo "-1";
                }
  
            ?>
    
    
    "/>
    
   
    
    <input type="hidden" id="Tipo_Metast_Hepaticas" name="Tipo_Metast_Hepaticas" value="

        <?php 
            
            	if (isset($_SESSION["Tipo_Metast_Hepaticas"])){
            		echo ($_SESSION["Tipo_Metast_Hepaticas"]);
            	}else {
            		echo "-1";
            	}
  
            ?>

"/>
    

    <input type="hidden" id="Imp_Ovaricos" name="Imp_Ovaricos" value="
    
  
       <?php 
            
            	if (isset($_SESSION["Imp_Ovaricos"])){
            		echo ($_SESSION["Imp_Ovaricos"]);
            	}else {
            		echo "-1";
            	}
  
            ?>
    
    
    "/>
    
    <!-- Condiciones cirugía-->
    
    
    <input type="hidden" id="Tecnicas_Cirugia" name="Tecnicas_Cirugia" value="
   
    
        <?php 
            
            	if (isset($_SESSION["Tecnicas_Cirugia"])){
            		echo ($_SESSION["Tecnicas_Cirugia"]);
            	}else {
            		echo "-1";
            	}
  
            ?>

    "/>
    <input type="hidden" id="ExeresisMeso" name="ExeresisMeso" value="<?php 
    
            	if (isset($_SESSION["Exeresis_Meso"])){
            		echo ($_SESSION["Exeresis_Meso"]);
            	}else {
            		echo "-1";
            	}
    ?>" />
    
    <input type="hidden" id="B_Cirugia" name="B_Cirugia" value="
    
    
          <?php 
            
            	if (isset($_SESSION["B_Cirugia"])){
            		echo ($_SESSION["B_Cirugia"]);
            	}else {
            		echo "-1";
            	}
  
            ?>

    
    "/>
    
        <input type="hidden" id="tipo_no_neo" name="tipo_no_neo" value="
    
    
    <?php 
            
            	if (isset($_SESSION["tipo_no_neo"])){
            		echo ($_SESSION["tipo_no_neo"]);
            	}else {
            		echo "-1";
            	}
  
            ?>

    
    "/>
    
    <!-- Condición para la carga de datos (Si han entrado antes o no)-->
    <input type="hidden" id="EnviarPatologica" name="EnviarPatologica" value="
    
    
        <?php 
            
                if (isset($_SESSION["ButtonEnviarPatologica"])){
                    echo ($_SESSION["ButtonEnviarPatologica"]);
                }else {
                    echo "-1";
                }
  
            ?>
    
    
    "/>
    
    
  </body>
</html>

<?php
}
?>
