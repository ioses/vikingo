<?php
session_start();

require_once ("../../../BDD/conexion.php");


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
       
      
     <script src="FechaAlta_js.js"></script>
       
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
    
    <script src="../../../assets/js/bootstrap-button.js"></script>
    <script src="../../../assets/js/bootstrap-collapse.js"></script>
    <script src="../../../assets/js/bootstrap-carousel.js"></script>
    <script src="../../../assets/js/bootstrap-typeahead.js"></script>
    
     
    <!-- **********************   jQuery   ********************************************************** -->   
    <script src="../../../assets/jQuery/jquery.min.js"></script>
    <link rel="stylesheet" href="../../../assets/css/jquery-ui.css" />
    <script src="../../../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../../../assets/jQuery/jquery-ui.js"></script>
    
    
    <!-- Ponemos estos dos javascripts aquí para que funcione el popover -->
    <script src="../../../assets/js/bootstrap-tooltip.js"></script>
    <script src="../../../assets/js/bootstrap-popover.js"></script>
    
    <script src="FechaAlta_js.js"></script>
    
    <script type="text/javascript">
    	   $(document).ready(function() {
	
	    	$("#BuscaNHC").autocomplete({
	        source : '../../../BuscaPaciente/get_lista_NHC.php'
	   		 });
   		 });		 
    </script>

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
				<a class="brand" href="../../../Principal_Admin.php">Proyecto Vikingo</a>
				<div class="nav-collapse">
					<p class="pull-right navbar-form" style="color: #FFFFFF; font-size: 18px; ">
						<span style="vertical-align: -20%">
						ADMINISTRADOR
						</span>
						<button onclick="location.href='../../../login/Cerrar_Sesion.php'" class="btn">Cerrar sesión</button>
						
						<!--Función php que dará el nombre del hospital al hacer el login-->
					</p>
					<!--
					<form class="navbar-form" action="../../../BuscaPaciente/BuscaPaciente.php" method="post">
                        <input type="submit" class="btn" value="Buscar paciente" class="navbar-form"  />
                         <input type="search" id="BuscaNHC" name="BuscaNHC" />
                    </form>
 				-->
 				 <p class="navbar-text" style="color: #FFFFFF; font-size: 1.5em; text-align: center  ">
 					<?php
	      			$NHC=$_POST["NHC"];
					echo("NHC: ".$NHC);
					$_SESSION["NHCPendientes"]=$NHC;
	      		?>
	      	</p>
					             
			<!--		<form class="navbar-form" style="vertical-align: bottom">
						<input type="search" style="vertical-align: baseline; height: 1em"/>
						<input type="submit" style="vertical-align: baseline" value="Buscar paciente" />
			</form>-->
 			
				</div><!--/.nav-collapse collapse -->
			</div> <!-- container-fluid -->
		</div> <!-- navbar-inner -->
	</div><!--/.navbar navbar-inverse navbar-fixed-top-->

	<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	<div class="row-fluid" style="text-align: center">
	      	<div class="span12">

	      		<!--onsubmit="CompruebaFechas(document.getElementById('FechaAlta').value);"-->
	      		
	      	<form action="IntroducirFechaAlta.php" method="post" id="FormFechaAlta" name="FormFechaAlta">
	      	<input type="hidden" id="NHC" name="NHC" value="<?php echo($NHC); ?>" />	
	      	<div class="span1"></div>
	      	<div class="span3" style="text-align: center">
	      		Fecha de alta cirugía
	      	</div>
	      	<div class="span5">
	      			<input type="date" id="FechaAlta" name="FechaAlta" placeholder="aaaa-mm-dd" onchange="CompruebaFechas(this.value);"/>
	      			
	      	</div>		
	      		
         	
	       </div><!--span12-->
       	</div>
       </div>
       	
       	<input id="EnviarFecha" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar"/>
	    </form>
    </div> <!-- /container -->
  </body>
</html>

<?php
}
?>