<?php
session_start();
require_once ("../BDD/conexion.php");


//Esta variable de sesion se usa para distinguir entre TOTAL y los análisis individuales
$_SESSION["Total"]=0;

if (!isset($_SESSION["NombreHospital"])){

    header("Location: ../login/Sign_In.php?var=Caduca"); 
    
}else{

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto Vikingo::Estadísticas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/docs.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    
    <!-- **********************   jQuery   ********************************************************** -->   
    <link rel="stylesheet" href="../assets/css/jquery-ui.css" />
    <link href="../assets/css/bootstrap.icon-large.min.css" rel="stylesheet">
	
	    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-40810646-1']);
        _gaq.push(['_trackPageview']);
    
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

        </script>

  </head>
<!---->
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid" style="width: 90%">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" style="float: left;" href="../Principal.php">Proyecto Vikingo</a>
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
                        <button onclick="location.href='../login/Cerrar_Sesion.php'" class="btn">
                            <i class="icon-off"></i>
                        Cerrar sesión</button>
                        
                        <!--Función php que dará el nombre del hospital al hacer el login-->
                    </p>
                     <!--<form class="navbar-form" method="post">
                        <a type="submit" class="btn" value="Buscar paciente" class="navbar-form" href="../BuscaPaciente/BuscaPaciente.php">
                            Buscar paciente <i class="icon-search"></i>
                        </a>
                        <input type="search" id="BuscaNHC" name="BuscaNHC" />
                    </form>-->
            
                                 
            <!--        <form class="navbar-form" style="vertical-align: bottom">
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
	      		<div class="span5">

	      			
	      		</div>
	      		
	      		<div class="span5">
	      			
	      		</div>
	      		
		      	
		       		<a href="./Recidiva/CalculaRecidiva.php" class="btn btn-primary btn-large" style="width: 25%">Recidiva</a>&nbsp;
		       		<a href="./Metastasis/CalculaMetastasis.php" class="btn btn-primary btn-large" style="width: 25%">Metástasis</a>&nbsp;
		       		<a href="./Seguimiento/CalculaSeguimiento.php" class="btn btn-primary btn-large" style="width: 25%">Seguimiento</a>
		       		<p>&nbsp;</p>
		       		<p>&nbsp;</p>
		       		<a href="./Total/CalculaTablas.php" class="btn btn-primary btn-large" style="width: 50%">Total</a>
		      

	       </div><!--span12-->
       </div><!--row fluid-->
      </div><!--hero unit-->

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
    
    
       
 <!-- **********************   jQuery   ********************************************************** -->   
    <script src="../assets/jQuery/jquery.min.js"></script>
    <script src="../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../assets/jQuery/jquery-ui.js"></script>

  </body>
</html>

<?php
}
?>