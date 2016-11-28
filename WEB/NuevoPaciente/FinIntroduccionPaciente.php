<?php
session_start();
require_once ("../BDD/conexion.php");

if (!isset($_SESSION["NombreHospital"])){
    
    header("Location: ../login/Sign_In.php?var=Caduca");
            
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
    <link href="../assets/css/docs.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" style="float: left;" href="#">Proyecto Vikingo</a>
				<div class="nav-collapse">
					<p class="pull-right navbar-form" style="color: #FFFFFF; font-size: 18px; ">
						<span style="vertical-align: -20%">
						<?php
						
							$Nombre=$_SESSION["NombreHospital"];
							echo utf8_encode($Nombre);
						?>
						</span>
						<button onclick="location.href='../login/Cerrar_Sesion.php'" class="btn">Cerrar sesión</button>
						
						<!--Función php que dará el nombre del hospital al hacer el login-->
					</p>
				</div><!--/.nav-collapse collapse -->
			</div> <!-- container-fluid -->
		</div> <!-- navbar-inner -->
	</div><!--/.navbar navbar-inverse navbar-fixed-top-->




    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit" style="text-align: center">
      	El paciente con NHC <?php $NHC=strval($_SESSION["NHC"]); echo($NHC); ?> ha sido introducido satisfactoriamente
      	<p>&nbsp;<p/>
       <a href="../Principal.php" class="btn btn-primary btn-large">Aceptar</a></p>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
       <?php 
       	 //SE LANZA UN AVISO INDICANDO QUE EL TRATAMIENTO ADYUVANTE NO HA SIDO RELLENADO Y ESTÁ PENDIENTE
            
            	if (isset($_SESSION["Adyuvante_Pendiente"]) && $_SESSION["B_Cirugia"]==1){
            		echo "Recuerde que debe rellenar el tratamiendo adyuvante más adelante";
            	}
         ?>
         <p>&nbsp;</p>
         <?php   	
         //SE LANZA UN AVISO INDICANDO QUE LA HOJA DE PATOLOGICA NO HA SIDO RELLENADA Y ESTÁ PENDIENTE   	
				if (isset($_SESSION["Patologica_Pendiente"])){
            		echo "Recuerde que debe rellenar la patología más adelante";
            	}
       ?>
       <p>&nbsp;</p>
         <?php   	
           //SE LANZA UN AVISO INDICANDO QUE LA FECHA DE ALTA NO HA SIDO RELLENADA Y ESTÁ PENDIENTE 	
				if (isset($_SESSION["Fecha_Alta_Pendiente"])){
            		echo "Recuerde que debe rellenar la fecha de alta";
            	}
       ?>
      </div>
        

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>

<?php
}
?>