<?php
session_start();
require_once ("../../BDD/conexion.php");
require_once("Carga_Datos_Cirugia.php");


if (!isset($_SESSION["NombreHospital"])){

    header("Location: ../../login/Sign_In.php?var=Caduca");	
	
}else{

?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Proyecto Vikingo::Cirugía</title>
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
							<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('<?php if ($_SESSION["B_Tto_Neo"] == 2 && $_SESSION["tipo_no_neo"] == 3){echo("../Cirugia/Salto_Cirugia.php");}else{echo("../Cirugia/Cirugia.php");}?>');" href="#collapseThree">  
                              Cirugía
                              <i class="icon-chevron-right icon-white" style="margin-right: -6px; float: right; margin-top: 7px;"></i>  
                            </a>  
						</div>  <!-- accordion-heading -->
					</div> <!-- accordion-group -->
				</div><!--/.accordion well sidebar-nav -->
			</ul><!--menuFloat-->
		</div><!--/span2-->
		
		<!-- ****************************    Contenido  *******************************************-->
		<div class="span10" name="general" >
		    <form name="Cirugia" id="Cirugia" method="post" action="IntroducirDatosCirugia.php" onsubmit="return CheckObligatorias();">
			
    			<div id="errorAlertPatologica" class="alert alert-block" style="font-size: 14px;">
                    <strong>¡Atención!</strong>
                    <span>La hoja de cirugía no se puede rellenar por haber marcado la siguiente opción:</span>
                    <p>Muerte en tratamiento neoadyuvante.</p>
                </div>
			
				<button id="ButtonEnviarCirugia" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar">
					<i class="icono-forward icono-large-white"></i>
				Siguiente</button>  
			</form><!--fin formulario cirugia-->

		</div><!--span10-->

	</div><!--/container-fluid--> 
	  
	 <input type="hidden" id="Fecha_Alta_Pendiente" name="Fecha_Alta_Pendiente" value="
	 <?php
	 	
	 	if (isset($_SESSION["Fecha_Alta_Pendiente"])){
	 		echo ($_SESSION["Fecha_Alta_Pendiente"]);
	 	}else{
	 		echo "0";
	 	}
	 
	 ?>
	 "/> 


    <!--/Condiciones recidiva--> 
    <input type="hidden" id="B_Tto_Neo" name="B_Tto_Neo" value="
    
   <?php 
            
            	if (isset($_SESSION["B_Tto_Neo"])){
            		echo ($_SESSION["B_Tto_Neo"]);
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
    <input type="hidden"  id="EnviarCirugia" name="EnviarCirugia" value="
    
    
        <?php 
            
                if (isset($_SESSION["ButtonEnviarCirugia"])){
                    echo ($_SESSION["ButtonEnviarCirugia"]);
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
    
         

    <!-- **********************   jQuery   ********************************************************** -->   
    <script src="../../assets/jQuery/jquery.min.js"></script>
    <script src="../../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../../assets/jQuery/jquery-ui.js"></script>
    
    
    <!-- **********************   Llamamos a nuestras funciones de Javascript y jQuery ********************************************************** -->     
    <script src="../../assets/js/vikingo_js.js"></script>
    <script src="cirugia_js.js"></script>
    
  </body>
</html>

<?php
}
?>
