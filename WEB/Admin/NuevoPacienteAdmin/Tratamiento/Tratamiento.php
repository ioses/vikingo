<?php
session_start();
require_once ('../../../BDD/conexion.php');
require ('Carga_Datos_Tratamiento.php');

if (!isset($_SESSION["EntraAdmin"])){

    header("Location: ../../../login/Sign_In.php?var=Caduca");    
    
}else{
?>

<html lang="es">
    
  <head>
    <meta charset="UTF-8">
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
    <script src="tratamiento_js.js"></script>
    
  
  </head>

  <body>

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
						<div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">  
						   
						</div>  <!-- collapseOne  -->
					</div>  <!-- accordion-group  -->
            
					<div class="accordion-group">  
						<div class="accordion-heading">  
							<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('../Tratamiento/Tratamiento.php');" href="#collapseTwo">  
							Tratamiento  
							</a>  
						</div>  <!-- accordion-heading  -->
						<div id="collapseTwo" class="accordion-body">  
							<div class="accordion-inner">  
								<li><a href="#neoadyuvante" target="_top">Neoadyuvante</a></li>
								<li><a href="#adyuvante" target="_top">Adyuvante</a></li>   
							</div>  <!-- accordion-inner  -->
						</div>  <!-- accordion-body collapse  -->
					</div> <!-- accordion-group  -->
				</div><!--/.accordion well sidebar-nav -->
            </div><!--menuFloat-->
        </div><!--/span2-->
    
        <!-- ****************************    Contenido  *******************************************-->
		<form action="IntroducirDatosTratamiento.php" method="post" id="Tratamiento" name="Tratamiento">    
			<div class="span10">
			  
			
				<!-- ************   Tratamiento neoadyuvante  ************* -->
				<a name="neoadyuvante"> &nbsp;</a>
				<br/>
				<br/>            
				<h3 >Tratamiento neoadyuvante</h3>
				<div class="hero-unit">
					<div class="row-fluid">
					   <!--*******  Radiobutton ********-->
						<div class="span1">
							<label for="B_Tto_Neo_Si">
							<input type="radio" name="B_Tto_Neo" id="B_Tto_Neo_Si" value="1" required onclick="habilitaNeoadyuvante();" /> Si</label>
							<br />
							<br />
							<br />
							<label for="B_Tto_Neo_No">
							<input type="radio" name="B_Tto_Neo" id="B_Tto_Neo_No" value="2" required onclick="habilitaNeoadyuvante();"/> No</label>
							
						</div> <!-- span1 -->
						<!--*******  Listas ********-->
						<div class="span10">
							<br />
							<div class="span5">
								<label  class="labelGrado2 labelRadio">Tratamiento preoperatorio</label>
								<br />
								<br />
								<label  class="labelGrado2 labelRadio" style="margin-top: 15px;">Motivo</label> 
							</div><!--/span5"> labels-->
							
							<div class="span5">
								<?php
									//$query="SELECT * FROM tabla_tipo_neo";
									$res=mysqli_query($conexion,$Tipo_Tratamiento_Neoadyuvante);    
								?>
								<select id="tipo_neo" name="tipo_neo" required onchange="putRadioButton('B_Tto_Neo_Si'); enabledElement('tipo_neo'); disabledElement('tipo_no_neo');">
									<?php
										while ($row=mysqli_fetch_array($res)) {
									?>
										<!--<option value="<?php echo "$row[0]"; ?>"><?php echo "$row[1]";  ?></option>-->
										
										<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
										
									<?php
									}
								?>
								</select>
								<br />
								<br />
								<br />
								
								<?php
									//$query="SELECT * FROM tabla_tipo_no_neo";
									$res=mysqli_query($conexion,$Tipo_No_Tratamiento_Neoadyuvante);    
								?>
								<select id="tipo_no_neo" name="tipo_no_neo" required onchange="putRadioButton('B_Tto_Neo_No'); disabledElement('tipo_neo'); enabledElement('tipo_no_neo');">
									<?php
										while ($row=mysqli_fetch_array($res)) {
									?>
										<!--<option value="<?php echo "$row[0]"; ?>"><?php echo "$row[1]";  ?></option>-->
										
										<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
									 
									<?php
									}
								?>
								</select>
								
							</div> <!-- class="span5"> Select-->
						</div> <!-- span10 -->
					
					</div> <!-- row-fluid -->
				</div><!--/hero-unit-->
				
				<!-- ************  Separación   ************ -->
				<hr />
			
				<!-- ************   Tratamiento adyuvante  ************* -->
				<a name="adyuvante"> &nbsp;</a>
				<br/>
				<br/>
				<h3>Tratamiento adyuvante</h3>
				<h4 class="checkbox">
					<input type="checkbox" name="rellenar" id="rellenar" value="1" style="margin-top: 10px;">
				No rellenar en este momento</h4>
				    <div class="hero-unit">
					<div class="row-fluid">
					   
							<div class="span1">
								<label for="B_Tto_Ady_Si">
								<input type="radio" name="B_Tto_Ady" id="B_Tto_Ady_Si" required value="1" onclick="habilitaAdyuvante();" />
								Si</label>
								<br />
								<br />
								<label for="B_Tto_Ady_No">
								<input type="radio" name="B_Tto_Ady" id="B_Tto_Ady_No" required value="2" onclick="habilitaAdyuvante();" />
								No</label>
								
							</div> <!-- span1 -->
							<div class="span10">
								<br />
								<div class="span5">
									<label  class="labelGrado2 labelRadio">Tratamiento postoperatorio</label>
								</div> <!-- span5 LABELS-->
							
								<div class="span5">
								<?php
										//$query="SELECT * FROM tabla_tipo_ady";
										$res=mysqli_query($conexion,$Tipo_Tratamiento_Adyuvante);   
									?>  
								<select id="tipo_ady" name="tipo_ady" required onchange="putRadioButton('B_Tto_Ady_Si'); enabledElement('tipo_ady');">
									<?php
										while ($row=mysqli_fetch_array($res)) {
									?>
										<!--<option value="<?php echo "$row[0]"; ?>"><?php echo "$row[1]";  ?></option>-->
										
										<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
										
									<?php
									}
								?>
								</select>
							
							</div> <!-- span5 SELECT -->
							</div> <!-- span10 -->
					   
					</div> <!-- row-fluid -->
				</div><!--/hero-unit-->
			<button id="ButtonEnviarTratamiento" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar">
		        <i class="icono-forward icono-large-white"></i>
            Siguiente</button>  
        </form>
			</div><!--/span10-->
			
    </div><!--/.fluid-container-->

    <hr />
    
     <!-- Condición para la carga de datos (Si han entrado antes o no)-->
    <input type="hidden"  id="EnviarTratamiento" name="EnviarTratamiento" value="
    
    
        <?php 
            
                if (isset($_SESSION["ButtonEnviarTratamiento"])){
                    echo ($_SESSION["ButtonEnviarTratamiento"]);
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
