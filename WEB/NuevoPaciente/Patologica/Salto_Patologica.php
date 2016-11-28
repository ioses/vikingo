<?php
session_start();

require_once ('../../BDD/conexion.php');
require ('Carga_Datos_Patologica.php');

if (!isset($_SESSION["NombreHospital"])){
    
    header("Location: ../../login/Sign_In.php?var=Caduca");	
	
}else{

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto Vikingo::Patológica</title>
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
        <!-- ****************************    Barra lateral  *******************************************-->
        <div class="span2">
            <ul class="nav nav-list bs-docs-sidenav affix">
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
							<!--<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('../Cirugia/Cirugia.php');" href="#collapseThree">  
							  Cirugía  
							</a>-->
							<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('<?php if ($_SESSION["B_Tto_Neo"] == 2 && $_SESSION["tipo_no_neo"] == 3){echo("../Cirugia/Salto_Cirugia.php");}else{echo("../Cirugia/Cirugia.php");}?>');" href="#collapseThree">  
                              Cirugía  
                            </a>  
						</div>  <!-- accordion-heading -->
						<div id="collapseThree" class="accordion-body collapse" style="height: 0px; ">  
						 
						</div> <!-- accordion-body collapse -->
					</div> <!-- accordion-group -->
				
					<div class="accordion-group">  
						<div class="accordion-heading">  
							<!--<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('../Patologica/Patologica.php');" href="#collapseFour">  
							  Anatomía patológica  
							</a>-->
							<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('<?php if ($_SESSION["Tecnicas_Cirugia"] == 7 || $_SESSION["Tecnicas_Cirugia"] == 8 || $_SESSION["B_Cirugia"] == 2 || $_SESSION["tipo_no_neo"] == 3 || $_SESSION["Exitus_Post"] == 1 || $_SESSION["Exitus_Intra"] == 1){echo('../Patologica/Salto_Patologica.php');}else{echo('../Patologica/Patologica.php');}?>');" href="#collapseFour">  
                              Anatomía patológica
                              <i class="icon-chevron-right icon-white" style="margin-right: -6px; float: right; margin-top: 7px;"></i>  
                            </a>  
						</div>  <!-- accordion-heading -->
						<!--<div id="collapseFour" class="accordion-body">  
							<div class="accordion-inner">  
								<li><a href="#histologia" target="_top">Histología</a></li>
								<li><a href="#reseccion" target="_top">Resección</a></li>
							</div>--> <!-- accordion-body collapse --> 
						<!--</div>   accordion-body collapse --> 
					</div>  <!-- accordion-group -->
				
				</div><!--/.accordion well sidebar-nav -->
            </ul><!--menuFloat-->
        </div><!--/span2-->
        
        <!-- ****************************    Contenido  *******************************************-->

        <div class="span10" name="general">
			 <form action="IntroducirDatosPatologica.php" method="post" id="Patologica" name="Patologica" >
					<div id="errorAlertPatologica" class="alert alert-block" style="font-size: 14px;">
                        <strong>¡Atención!</strong>
                        <span>La hoja de anatomía patológica no se puede rellenar por haber marcado alguna de las siguientes opciones:</span>
                        <p>Técnicas quirúrgicas: Laparotomía o laparoscopia exploradora o Únicamente estoma de derivación.</p>
                        <p>Muerte en tratamiento neoadyuvante oen motivos de no cirugía.</p>
                    </div>
				<button id="ButtonEnviarPatologica" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar">
				    <i class="icono-forward icono-large-white"></i>
                Siguiente</button>   
         	</form>
		</div> <!-- "span10" name="general" -->
			
       
    </div><!--/container-fluid--> 
      
    
     <!--/Condiciones metástasis--> 
    <input type="hidden" id="MetastInicial" name="MetastInicial" value="
    
    
        <?php 
            
            	if (isset($_SESSION["MetastInicial"])){
            		echo ($_SESSION["MetastInicial"]);
            	}else {
            		echo "-1";
            	}
  
            ?>
    
    
    "/>
    
   <input type="hidden" id="TumorSincro" name="TumorSincro" value="
   <?php echo($_SESSION["Sincro"]); ?>
   
   " />

    
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
    
  </body>
</html>
<?php
}
?>
