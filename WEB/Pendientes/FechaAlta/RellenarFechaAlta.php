<?php
session_start();

require_once ("../../BDD/conexion.php");


if (!isset($_SESSION["NombreHospital"])){
     
     header("Location: ../../login/Sign_In.php?var=Caduca");

}else{
    

?>


<!DOCTYPE html>
<html lang="en">
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

	<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	<div class="row-fluid" style="text-align: center">
			<?php
				$NHC=$_POST["NHC"];
				//$NHC=$_GET["NHC"];
				echo($NHC);
				$_SESSION["NHCPendientes"]=$NHC;
			?>
			<p>&nbsp;</p>
				
	      	<form action="IntroducirFechaAlta.php" method="post" id="FormFechaAlta" name="FormFechaAlta">
				<input type="hidden" id="NHC" name="NHC" value="<?php echo($NHC); ?>" />	
				<dl class="dl-horizontal-principal">
					<dt>
						<label>Fecha de alta cirugía</label>
					</dt>
					<dd>
						<input type="date" id="FechaAlta" name="FechaAlta" placeholder="aaaa-mm-dd" onchange="CompruebaFechas(this.value);"/>
					</dd>
				</dl>      	
				<input id="EnviarFecha" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar"/>
			</form>
		</div> <!-- row-fluid -->
	  </div><!--/hero-unit--> 
    </div> <!-- /container -->
    
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

    
    <!-- Ponemos estos dos javascripts aquí para que funcione el popover -->
    <script src="../../assets/js/bootstrap-tooltip.js"></script>
    <script src="../../assets/js/bootstrap-popover.js"></script>
    
    <script src="FechaAlta_js.js"></script>
    
  </body>
</html>

<?php
}
?>