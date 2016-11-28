<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("Carga_Datos_Inicial.php");


if (!isset($_SESSION["EntraAdmin"])){

    header("Location: ../../../login/Sign_In.php?var=Caduca");    
    
}else{

?>
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
    
    <link href="../../../assets/css/bootstrap.icon-large.min.css" rel="stylesheet"> 
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../../assets/js/jquery.js"></script>
    <script src="../../../assets/js/bootstrap-transition.js"></script>
 
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
    <script src="inicial_js.js"></script>

    
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
     <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    
                                             
  </head>

  <body>

 <div id="dialog-message" title="Basic modal dialog" style="display: none;">
 	 <p id="textoalert" class="">
        
    </p>
 </div>
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
            		if (isset($_SESSION["NHC"])){
            		echo ("NHC: ".$_SESSION["NHC"]);
					}
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
						<div id="collapseOne" class="accordion-body">  
							<div class="accordion-inner">
								<li><a href="#Iniciales" target="_top">Datos iniciales</a></li>  
								<li><a href="#Localiz" target="_top">Localización</a></li>
								<li><a href="#Radiologia" target="_top">Radiología</a></li>
								<li><a href="#Otras_Afecciones" target="_top">Otras afecciones</a></li>   
							</div>  <!-- accordion-inner  -->
						</div>  <!-- collapseOne  -->
					</div>  <!-- accordion-group  -->
				</div><!--/.accordion well sidebar-nav -->
			</div><!--/menuFloat-->
		</div><!--/span2-->
		
		<!-- ****************************    Contenido  *******************************************-->
		<div class="span10" name="general">
			<form name="Inicial" id="Inicial" action="IntroducirDatosInicial.php" method="post" onsubmit="return CheckObligatorios();">
			
				<!-- ****************************    Datos iniciales  *******************************************-->
				<a name="Iniciales">&nbsp;</a>
				<br />
				<br />
				<h3>Datos iniciales</h3>
				<div class="hero-unit">
					<div class="row-fluid">
						<div class="span4">
							<label class="labelGrado1" style="margin-top: 5px;">Nº de identificación</label>
							<label class="labelGrado1" style="margin-top: 20px;">Fecha de nacimiento</label>
							<label class="labelGrado1" style="margin-top: 18px;">Sexo</label>
						</div><!--/span4 LABELS-->
						<div class="span1">
						</div>
						<div class="span6">
							<input type="text" id="NHC" name="NHC" required autocomplete="off" onfocusout="CompruebaNHC(this.value);"/>
							<input type="date" name="Nacimiento" id="Nacimiento" placeholder="aaaa-mm-dd" required />
							<label for="Radio_Sexo_H">
								<input type="radio" name="Radio_Sexo" id="Radio_Sexo_H" value="1" required  onclick="DeshabilitaOrganos();" />
							Hombre</label>
							<label for="Radio_Sexo_M">
								<input type="radio" name="Radio_Sexo" id="Radio_Sexo_M" value="2" required onclick="DeshabilitaOrganos();" />	
							Mujer</label>
						</div><!--/span6 DATOS-->
					</div><!--/row-fluid-->
				</div><!--/hero-unit-->
				
				
				<!-- ****************************   Localización  *******************************************-->
				<a name="Localiz">&nbsp;</a>
				<br />
				<br />
				<h3>Localización</h3>
				<div class="hero-unit">	
					<div class="row-fluid">
						<div class="span4">
							<label class="labelGrado1" style=" margin-top: 5px;">Localización del tumor</label>
							<label class="labelGrado1" style=" margin-top: 25px;">Tumor sincrónico de colon</label>
						</div><!--span4 LABELS-->
						<div class="span1">
						</div>
						<div class="span6">
							<label for="Localizacion">
									<select id="Localizacion" name="Localizacion" style="width: 25%" required>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
									</select>
							(cm.)</label>
							
							
							<label for="B_Sincro_NO">
								<input type="radio" id="B_Sincro_NO" name="B_Sincro" value="0" checked="checked" required onclick="HabilitaColon();"/>	
							No</label>

							<label for="B_Sincro_SI">
								<input type="radio" id="B_Sincro_SI" name="B_Sincro" value="1" required onclick="HabilitaColon();"/>
							Si</label>
							
							
							
							<label class="labelCheck" for="Colon_Derecho">
								<input type="checkbox" id="Colon_Derecho" name="Colon_Derecho" value="1" disabled  />
							Colon derecho</label>

							<label class="labelCheck" for="Colon_transverso">
								<input type="checkbox" id="Colon_transverso" name="Colon_transverso" value="3" disabled  />
							Colon transverso</label>

							<label class="labelCheck" for="Colon_Izquierdo">
								<input type="checkbox" id="Colon_Izquierdo" name="Colon_Izquierdo" value="2" disabled />
							Colon izquierdo</label>

							<label class="labelCheck" for="Colon_Sigma">
								<input type="checkbox" id="Colon_Sigma" name="Colon_Sigma" value="4" disabled />
							Sigma</label>						
						</div><!--/span6 DATOS-->
					</div> <!--/row-fluid-->
				</div><!--/hero-unit-->
				
				<!-- ****************************  Radiología  *******************************************-->
				<a name="Radiologia">&nbsp;</a>
				<br/>
				<br/>
				<h3>Radiología</h3>
				<div class="hero-unit">
					<div class="row-fluid">
						<div class="span4"> <!--LABELS-->
							<label class="labelGrado1" style=" margin-top: 5px;">Estadío radiológico</label>
							<label class="labelGrado1" style=" margin-top: 25px;">Ecografía</label>
							<br />
							<br />
							<br />
							<label class="labelGrado1" style=" margin-top: 25px;">TAC</label>
							<br />
							<label class="labelGrado1" style=" margin-top: 25px;">Resonancia magnética</label>
							<br />
							<br />
							<br />
							<label class="labelGrado1" style=" margin-top: 35px;">Distancia al margen circunferencial (mm.)</label>
						</div><!--span4 LABELS-->
						<div class="span1">
						</div>
						<div class="span6"> <!--DATOS-->	
							 <input type="text" id="Id_Estadio_Radio" name="Id_Estadio_Radio" readonly="readonly"/>
							
							<!--*********** ECO ***************-->
							<label for="B_Tec_ECO_NO" style="margin-top: 5px;"> 
								<input type="radio" id="B_Tec_ECO_NO" name="B_Tec_ECO" value="0" checked="checked" required onclick="HabilitarECO();"/>	
							No</label>

							<label for="B_Tec_ECO_SI">
								<input type="radio" id="B_Tec_ECO_SI" name="B_Tec_ECO" value="1" required onclick="HabilitarECO();"/>
							Si</label>
													
							<div class="span2" style="margin-top: 5px;"><!--LABELS-->
								 <label class="labelGrado2 labelRadio">T</label>
								 <label class="labelGrado2 labelRadio" style="margin-top: 16px;">N</label>
						</div><!--/span2 LABELS-->
							<div class="span8"><!--SELECTS-->
									<?php
									$result=mysqli_query($conexion,$Tipo_ECO_T);
								?>
								<select name="ECO_Tipo_T" id="ECO_Tipo_T" disabled required onchange="EstadioRadiologico();"><!--Comprobar el nombre-->
										
									<?php
										while ($row=mysqli_fetch_array($result)) {
									?>
									<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
									<?php
										}
									?>
								</select>
								<?php
										
									$result=mysqli_query($conexion,$Tipo_ECO_N);
								?>
								<select name="ECO_Tipo_N" id="ECO_Tipo_N" disabled required onchange="EstadioRadiologico();">
										
									<?php
										while ($row=mysqli_fetch_array($result)) {
									?>
									<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
									<?php
										}
									?>
								</select>
							</div><!--/span8 SELECTS-->
							<br />
							<br />
							<br />
							<!--*********** TAC ***************-->
							<label for="B_TAC_NO">
								<input type="radio" id="B_TAC_NO" name="B_TAC" checked="checked" value="0" required/>	
							No</label>

							<label for="B_TAC_SI">
								<input type="radio" id="B_TAC_SI" name="B_TAC" value="1" required/>
							Si</label>
							
							<br />
							<!--*********** RMN ***************-->
							<label for="B_Tec_RNM_NO">
								<input type="radio" id="B_Tec_RNM_NO" name="B_Tec_RNM" value="0" checked="checked" required onclick="HabilitarRNM();" onchange="EstadioRadiologico();"/>	
							No</label>

							<label for="B_Tec_RNM_SI">
								<input type="radio" id="B_Tec_RNM_SI" name="B_Tec_RNM" value="1" required onclick="HabilitarRNM();" onchange="EstadioRadiologico();"/>
							Si</label>
						

							<div class="span2"><!--LABELS-->
								 <label class="labelGrado2 labelRadio">T</label>
								 <label class="labelGrado2 labelRadio" style="margin-top: 16px;">N</label>
							</div><!--/span2 LABELS-->
							<div class="span8"><!--SELECTS-->
								<?php
											
									$result=mysqli_query($conexion,$Tipo_RMN_T);
								?>
								<select name="RNM_Tipo_T" id="RNM_Tipo_T" disabled required onchange="EstadioRadiologico();"><!--Comprobar el nombre-->
											
									<?php
										while ($row=mysqli_fetch_array($result)) {
									?>
									<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
									<?php
										}
									?>
								</select>
								<?php			
									$result=mysqli_query($conexion,$Tipo_RMN_N);
								?>
								<select name="RNM_Tipo_N" id="RNM_Tipo_N" disabled required onchange="EstadioRadiologico();">
											
									<?php
										while ($row=mysqli_fetch_array($result)) {
									?>
									<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
									<?php
										}
									?>
								</select>
							</div><!--/span8 SELECTS-->
							<br />
							<br />
							<br />
							<label class="labelCheck" for="Distancias_Margen">
								<input type="checkbox" id="Distancias_Margen" name="Distancias_Margen" value="1" disabled />
							No se disponen de estos datos</label>
							<div class="span4" style="margin-top: 10px;"> <!--LABELS-->
								<label class="labelGrado2" style="margin-top: 5px;">Al tumor</label>
								<label class="labelGrado2" style="margin-top: 20px;">A adenopatías</label>
							</div><!--/span4 LABELS-->
							<div class="span6" style="margin-top: 10px; margin-left: 20px;"><!--INPUT-->
								<input type="text" pattern="[0-9]+" name="Dist_Tumor" id="Dist_Tumor" placeholder="Introduzca un número entero" disabled required />
								<input type="text" pattern="[0-9]+" name="Dist_Adeno" id="Dist_Adeno" placeholder="Introduzca un número entero" disabled required />
							</div><!--/span6 INPUT-->
						</div><!--/span6 DATOS-->
					</div> <!--/row-fluid-->
				</div><!--/hero-unit-->
				
				
				<!-- ****************************  Otras afecciones  *******************************************-->
				
				<a name="Otras_Afecciones">&nbsp;</a>
				<br/>
				<br/>
				<h3>Otras afecciones</h3>
				<div class="hero-unit">
					<div class="row-fluid">
						<div class="span4">
							<label class="labelGrado1" style="margin-top: 5px;">Integridad del aparato esfinteriano</label>
							<br />
							<label class="labelGrado1" style="margin-top: 30px;">Metástasis</label>
							<br />
							<br />
							<br />
							<br />
							<br />
							<label class="labelGrado1">Invasión de órganos vecinos</label>
						</div><!--/span4 LABELS-->
						<div class="span1">
						</div>
						<div class="span6">
							<label for="Integ_Libre"><input type="radio" name="Id_Integ_Esfint" id="Integ_Libre" value="1" required/>&nbsp;Libre</label><!--Comprobar los valores-->
							<label for="Integ_Afecto"><input type="radio" name="Id_Integ_Esfint" id="Integ_Afecto" value="2" required />&nbsp;Afecto</label>
							<label for="Integ_No_Datos"><input type="radio" name="Id_Integ_Esfint" id="Integ_No_Datos" value="3" required />&nbsp;No datos</label>
							<label for="Metast_No" style="margin-top: 20px;">
								<input type="radio" name="Metast" id="Metast_No" value="0" checked="checked" required onclick="HabilitaMetastasis();"  />&nbsp;No
							</label>
								<label for="Metast_SI">
									<input type="radio" name="Metast" id="Metast_SI" value="1" required onclick="HabilitaMetastasis();" onchange="EstadioRadiologico();"  />&nbsp;Si
								</label>
								<label class="labelCheck" for="Metast_Hepaticas">
									<input type="checkbox" id="Metast_Hepaticas" name="Metast_Hepaticas" value="1" disabled />&nbsp;Hepáticas
								</label>
								<label class="labelCheck"for="Metast_Oseas">
									<input type="checkbox" id="Metast_Oseas" name="Metast_Oseas" value="3" disabled />&nbsp;Óseas
								</label>
								<label class="labelCheck" for="Metast_Pulmonares">
									<input type="checkbox" id="Metast_Pulmonares" name="Metast_Pulmonares" value="2" disabled />&nbsp;Pulmonares
								</label>
								<label class="labelCheck" for="Metast_Nervioso">
									<input type="checkbox" id="Metast_Nervioso" name="Metast_Nervioso" value="4" disabled />&nbsp;Sist. nervioso
								</label>
							<label for="B_Inv_Vecinos_No" style="margin-top: 30px;">
								<input type="radio" name="B_Inv_Vecinos" id="B_Inv_Vecinos_No" value="0" checked="checked" onclick="DeshabilitaOrganos();"  />&nbsp;No
							</label>
							<label for="B_Inv_Vecinos_SI">
								<input type="radio" name="B_Inv_Vecinos" id="B_Inv_Vecinos_SI" value="1" required onclick="DeshabilitaOrganos();"  />&nbsp;Si
							</label>
							<label class="labelCheck" for="Inv_Utero">
								<input type="checkbox" name="Inv_Utero" id="Inv_Utero" value="1" disabled />&nbsp;Útero
							</label>
							<label class="labelCheck" for="Inv_Prostata">
								<input type="checkbox" name="Inv_Prostata" id="Inv_Prostata" value="4" disabled />&nbsp;Próstata
							</label>
							<label class="labelCheck" for="Inv_Vejiga">
								<input type="checkbox" name="Inv_Vejiga" id="Inv_Vejiga" value="3" disabled/>&nbsp;Vejiga
							</label>
							<label class="labelCheck" for="Inv_Ureteres">
								<input type="checkbox" name="Inv_Ureteres" id="Inv_Ureteres" value="6" disabled/>&nbsp;Uréteres
							</label>
							<label class="labelCheck" for="Inv_Vagina">
								<input type="checkbox" name="Inv_Vagina" id="Inv_Vagina" value="2" disabled/>&nbsp;Vagina
							</label>
							<label class="labelCheck" for="Inv_Seminales">
								<input type="checkbox" name="Inv_Seminales" id="Inv_Seminales" value="7" disabled />&nbsp;Ves. seminales
							</label>
							<label class="labelCheck" for="Inv_Sacro">
								<input type="checkbox" name="Inv_Sacro" id="Inv_Sacro" value="5" disabled />&nbsp;Sacro
							</label>
						</div><!--/span6 DATOS-->
					</div> <!--/row-fluid-->
				</div><!--/hero-unit-->
				<button id="ButtonEnviarInicial" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar">
				    <i class="icono-forward icono-large-white"></i>
				Siguiente</button>
				
			</form>
		</div><!--span10-->

	</div><!--/container-fluid--> 
	  
	<hr />
	
	 <!-- Condición para la carga de datos (Si han entrado antes o no)-->
    <input type="hidden"  id="EnviarInicial" name="EnviarInicial" value="
    
    
        <?php 
            
                if (isset($_SESSION["ButtonEnviarInicial"])){
                    echo ($_SESSION["ButtonEnviarInicial"]);
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
