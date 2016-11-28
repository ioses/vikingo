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
    <title>Proyecto Vikingo::Informe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../assets/css/docs.css" rel="stylesheet" />
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
       
    <link href="../../assets/css/bootstrap.icon-large.min.css" rel="stylesheet">     
    
    <script language="JavaScript" type="text/javascript">
    
    	function fechaInicio(){
    		if(document.getElementById("inicioEstudio").checked==true){
    			document.getElementById("inicio").disabled=true;
    			document.getElementById("inicio").value="2006-01-01";
    		}else{
    			document.getElementById("inicio").value=null;
    			document.getElementById("inicio").disabled=false;
    		}
    	}
    </script>
       
      
       
 <!-- **********************   jQuery   ********************************************************** -->   
    <link rel="stylesheet" href="../../assets/css/jquery-ui.css" />
        
  </head>
<!---->
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
                    <!--<form class="navbar-form" method="post">
                        <a type="submit" class="btn" value="Buscar paciente" class="navbar-form" href="../../BuscaPaciente/BuscaPaciente.php">
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
        <div class="row-fluid">
            <div class="span12">
                <form action="VerInforme.php" method="post">
                    <dl class="dl-horizontal-verPaciente">
                        <dt>
                            <p>Margen de tiempo:</p>
                        </dt>
                        <dd>
                            <dl class="dl-horizontal-verPaciente-secundario-mediano" style="font-size: 14px; font-weight: normal;">
                                <dt>
                                    <p>Inicio:</p>
                                </dt>
                                <dd>
                                    <input type="date" id="inicio" name="inicio" required />
                                    
                                </dd>
                                <dd>
                                	<p><label for="inicioEstudio">
                                	<input type="checkbox" id="inicioEstudio" onclick="fechaInicio();"/> Desde inicio de estudio </label></p>
                                </dd>
                                <dt>
                                    <p>Fin:</p>
                                </dt>
                                <dd>
                                    <input type="date" id="fin" name="fin" required />
                                </dd>
                            </dl>
                        </dd>
                    </dl>
                    <button id="Enviar" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar">
                        <i class="icono-forward icono-large-white"></i>
                    Siguiente</button>
                        
                </form>
           </div><!--span12-->
       </div><!--row fluid-->
      </div><!--hero unit-->

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
    <script src="../../assets/js/bootstrap-tooltip.js"></script>
    <script src="../../assets/js/bootstrap-popover.js"></script>
    <script src="../../assets/js/bootstrap-button.js"></script>
    <script src="../../assets/js/bootstrap-collapse.js"></script>
    <script src="../../assets/js/bootstrap-carousel.js"></script>
    
    
       
 <!-- **********************   jQuery   ********************************************************** -->   
    <script src="../../assets/jQuery/jquery.min.js"></script>
    <script src="../../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../../assets/jQuery/jquery-ui.js"></script>
    
    <script src="compara_fechas.js"></script>
  </body>
</html>
<?php
}
?>