<?php
session_start();

require_once ("../BDD/conexion.php");
require_once("../NuevoPaciente/unset_session_variables.php");

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
       
    <link href="../assets/css/bootstrap.icon-large.min.css" rel="stylesheet">     
       
   
 <!-- **********************   jQuery   ********************************************************** -->   
    <link rel="stylesheet" href="../assets/css/jquery-ui.css" />

	
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

  <body >
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
                </div><!--/.nav-collapse collapse -->
            </div> <!-- container-fluid -->
        </div> <!-- navbar-inner -->
    </div><!--/.navbar navbar-inverse navbar-fixed-top-->


    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	<div class="row-fluid" style="text-align: center">
	      	
	      	<div class="span12">
               <form action="BuscaPaciente/Revisiones.php" class="form-search breadcrumb" method="post">
                    <button type="submit" class="btn" value="Buscar paciente" class="navbar-form">
                        Buscar paciente <i class="icon-search"></i>
                    </button>
                    <input type="search" id="BuscaNHC" name="BuscaNHC" />
                    <input type="hidden" id="FechaRevision" name="FechaRevision"  />
                </form> 
            </div>
            
            <br />
            <br />
	      	
	      	<div class="span12">
	      		
	      		 <table class="table table-hover" style="width: 100%; text-align: center">
                    <tbody style="height: 0.8em">
                    	<tr>
                    		<th style="width: 35%; text-align: left; font-size: 1.5em; vertical-align: middle">NHC</th>
                    		<th style="width: 35%; text-align: left; font-size: 1.5em; vertical-align: middle">Última revisión</th>
                    		<th style="width: 30%; text-align: center">&nbsp;</th>
                    	</tr>
	      				<tr>
	      					<td >&nbsp;</td>
	      					<td >&nbsp;</td>
	      					<td >&nbsp;</td>
	      				</tr>

	      		<?php
	      		$hoy = date("y.m.d"); 
	      		
				$Hospital=$_SESSION["NombreHospital"];

				$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

 				$row=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
	 				or die('Error: ' . mysqli_error());

				$Hospital=$row[0];
				
				
				$sql="SELECT AES_DECRYPT (identificador_paciente.NHC, '$claveNHC') AS NHC, seguimiento.Fecha_Revision FROM identificador_paciente
				INNER JOIN seguimiento ON identificador_paciente.ID= seguimiento.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' AND seguimiento.B_Estado=1 AND seguimiento.B_Imposibilidad=2 
				AND DATEDIFF('$hoy', seguimiento.Fecha_Revision)>365
				INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND cirugia.B_Cirugia=1 
				INNER JOIN tabla_cirugia ON cirugia.ID=tabla_cirugia.Id_Cirugia AND DATEDIFF(seguimiento.Fecha_Revision,tabla_cirugia.Fecha_Intervencion)<1825";
				
				
	      		/*
	      		$sql="SELECT AES_DECRYPT(id.NHC,'$claveNHC') AS NHC, seg.Fecha_Revision FROM identificador_paciente id, seguimiento seg
	      		WHERE id.ID=seg.Id_Paciente AND id.Id_Hospital='$Hospital' AND seg.B_Estado=1 AND seg.B_Imposibilidad=2 
	      		AND DATEDIFF('$hoy',seg.Fecha_Revision)>365 ORDER BY NHC ASC ";
				*/
				$res=mysqli_query($conexion,$sql);
				
				while ($row=mysqli_fetch_array($res)){		
					
					$ValorNHC=$row[0];
					
	      		?>
               
                        <tr>
                        	<form action="SeguimientoRevision.php" method="post" >
                        		<input type="hidden" value="<?php echo ($ValorNHC); ?>" id="NHCSeguimiento" name="NHCSeguimiento" />
                            <td><?php echo ($ValorNHC);  ?></td>
                            <td><?php echo ($row[1]); ?></td>
                            <td>
                                <!--<a  class="btn btn-primary" style="height: 100;" href="SeguimientoRevision.php?NHCSeguimiento=<?php echo ($ValorNHC); ?>">
                                    <i class="icon-share icon-white"></i>
                                Ir a seguimiento</a>-->
                              	<button type="submit" value="Ir a seguimiento" class="btn btn-primary" style="height: 100;">
                              	     <i class="icon-share icon-white"></i>
                              	Ir a seguimiento</button>
                            </td>
                            </form> 
                        </tr>
                        <?php
						}
						?>
                    </tbody>
                </table>
         
	       </div><!--span12-->
       	</div>
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
                                   
 <!-- **********************   jQuery   ********************************************************** -->   
    <script src="../assets/jQuery/jquery.min.js"></script>
    <script src="../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../assets/jQuery/jquery-ui.js"></script>
               
    <!-- **********************   Llamamos a nuestras funciones de Javascript y jQuery ********************************************************** -->    
    <script src="../assets/js/vikingo_js.js"></script>
    <script src="revisiones_js.js"></script>
  </body>
</html>

<?php

mysqli_close($conexion);
}
?>