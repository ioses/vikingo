<?php
session_start();
require_once ("../../../BDD/conexion.php");
require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

if (!isset($_SESSION["EntraAdmin"])){

    header("Location: ../../../login/Sign_In.php?var=Caduca");    
    
}else{
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  	
 <meta charset="utf-8">
    <title>Proyecto Vikingo::Kaplan_Meier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../../assets/css/docs.css" rel="stylesheet" />
    <link href="../../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../../assets/css/bootstrap-responsive.css" rel="stylesheet">


    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../../../assets/ico/favicon.png">
    
    <!-- **********************   jQuery   ********************************************************** -->   
    <link rel="stylesheet" href="../../../assets/css/jquery-ui.css" />
    <link href="../../../assets/css/bootstrap.icon-large.min.css" rel="stylesheet"> 
    
  </head>
  
  <body>
 <div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid" style="width: 90%">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" style="float: left;" href="../../../Principal_Admin.php">Proyecto Vikingo</a>
				<div class="nav-collapse">
					<p class="pull-right navbar-form" style="color: #FFFFFF; font-size: 18px; ">
						<span style="vertical-align: -20%">
							ADMINISTRADOR
						</span>
						<button onclick="location.href='../../../login/Cerrar_Sesion.php'" class="btn">Cerrar sesión</button>
					</p> 			
				</div><!--/.nav-collapse collapse -->
			</div> <!-- container-fluid -->
		</div> <!-- navbar-inner -->
	</div><!--/.navbar navbar-inverse navbar-fixed-top-->




    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	<div class="row-fluid" style="text-align: center">
	      	<div class="span12">
                <div id="alertCargando" class="alert alert-block">
                    <strong id="cargarndoDatos" style="margin-bottom: 5px;">Cargando datos...</strong>
                    <div class="progress progress-striped active">
                        <div id="barra" class="bar" style="width: 0%;" data-percentage="100"></div>
                    </div>
                </div>
              </div>
              
              
            <div class="span12" style="text-align: center ">
                <div id="visualizationMetastasis"></div> 

           </div><!--span12-->
           
            <div class="span12" style="text-align: center ">
                <table class="table table-hover" style="width: 100%; text-align: center">
                    <tbody id="TablaMetastasisTecnicas">
                    </tbody>
                </table>

           </div><!--span12-->
           
           
           <p>&nbsp;</p>
            <div class="span12" style="text-align: center">
                <div id="MetastasisConjunta"></div>
                
            </div>
            <p>&nbsp;</p>
            <div class="span12" style="text-align: center ">
        
                <table class="table table-hover" style="width: 100%; text-align: center; position: relative">
                    <tbody id="TablaMetastasisConjunta">
                    </tbody>
               </table > 
            
            </div><!--span12-->
            
            <div class="span12" style="text-align: center">
               
               <div class="alert alert-info">
                   <div class="btn-group">
                      <a href="ExportaTablaMetastasis.php"><button class="btn, btn-primary">Exportar tablas</button></a>
                       <button class="btn, btn-primary" onclick="saveAsImg(document.getElementById('visualizationMetastasis'), 'técnicas_metast_kaplan_meier');">Descargar imagen técnicas</button>
                       <button class="btn, btn-primary" onclick="saveAsImg(document.getElementById('MetastasisConjunta'), 'totales_metast_kaplan_meier');">Descargar imagen totales</button>
                   </div>            
               </div>
           </div><!--span12-->
	       	
	       
	       <input type="hidden" id="APER" value="
	       
	       <?php
	       
	       echo ($_SESSION["reseccion_abd"]);

	       ?>
	       
	       "  />
	       
	      <input type="hidden" id="AR" value="
	       
	       <?php
	       
	       echo ($_SESSION["reseccion_anterior"]);

	       ?>
	       
	       "  />
	       
	      <input type="hidden" id="Hartmann" value="
	       
	       <?php

	        echo ($_SESSION["hartmann"]);

	       ?>
	       
	       "  />
	       
	         <input type="hidden" id="TipoInforme" value="
	       
	       <?php

	        echo ($_SESSION["TipoInformeHospitales"]);

	       ?>
	       
	       "  />
	       
	       <input type="hidden" id="HospitalKaplanMeier" value="
	       
	       <?php

	        echo ($_SESSION["HospitalKaplanMeier"]);

	       ?>
	       
	       "  />
	        
	        
	
       </div><!--row fluid-->
      </div><!--hero unit-->

    </div> <!-- /container -->
    
    
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
    
    
       
 <!-- **********************   jQuery   ********************************************************** -->   
    <script src="../../../assets/jQuery/jquery.min.js"></script>
    <script src="../../../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../../../assets/jQuery/jquery-ui.js"></script>
    
    <!--Librerias para transformar las gráficas en imagenes-->
    <script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/rgbcolor.js"></script> 
    <script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/StackBlur.js"></script>
    <script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/canvg.js"></script> 
    

    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    
    
    <script type="text/javascript" src="Metastasis_js.js"></script>
    <script type="text/javascript" src="../imagenes_descarga/descarga_js.js"></script>
    

  </body>
</html>

<?php
}
?>