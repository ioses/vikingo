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
                </div><!--/.nav-collapse collapse -->
            </div> <!-- container-fluid -->
        </div> <!-- navbar-inner -->
    </div><!--/.navbar navbar-inverse navbar-fixed-top-->



    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	<div class="row-fluid" style="text-align: center">
	      	<div class="span12">
	      	    
	      	    <div class="span12">
                   <form action="BuscaPaciente/Pendientes.php" class="form-search breadcrumb" method="post">
                        <button type="submit" class="btn" value="Buscar paciente" class="navbar-form">
                            Buscar paciente <i class="icon-search"></i>
                        </button>
                        <input type="search" id="BuscaNHC" name="BuscaNHC" />
                        <input type="hidden" id="ValorAdy" name="ValorAdy"  />
                        <input type="hidden" id="ValorEstado" name="ValorEstado"  />
                        <input type="hidden" id="FechaAlta" name="FechaAlta"  />
                    </form> 
                </div>
	      		
	      		 <table class="table table-hover" style="width: 100%; text-align: center">
                    <tbody style="height: 0.8em">
                    	<tr>
                    		<th style="width: 25%; text-align: left; font-size: 1.5em; vertical-align: middle">NHC</th>
                    		<th style="width: 6%; text-align: left; font-size: 1.5em; vertical-align: middle">&nbsp;</th>
                    		<th style="width: 23%;">Adyuvante</th>
                    		<th style="width: 23%;">Patológica</th>
                    		<th style="width: 23%;">Alta</th>
                    	</tr>
	      				<tr>
	      					<td >&nbsp;</td>
	      					<td >&nbsp;</td>
	      					<td >&nbsp;</td>
	      				</tr>

	      		<?php
	      		
	      		if (isset($_SESSION["NHCPendientes"])){
					unset($_SESSION["NHCPendientes"]);
				}
	      		
	      		
	      		$hoy = date("y.m.d"); 
	      		
				$Hospital=$_SESSION["NombreHospital"];

				$IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

 				$row=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
	 				or die('Error: ' . mysqli_error());

				$Hospital=$row[0];
				

	      		$sql="SELECT AES_DECRYPT(identificador_paciente.NHC,'$claveNHC') AS NHC, tabla_patologica.Estado AS ESTADO, 
	      		tratamiento.B_Tto_Ady AS ADY, cirugia.ID AS IDCir FROM identificador_paciente INNER JOIN tabla_patologica 
	      		ON identificador_paciente.ID=tabla_patologica.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' INNER JOIN tratamiento 
	      		ON identificador_paciente.ID=tratamiento.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' 
	      		INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' ORDER BY NHC ASC"; 
				
				$res=mysqli_query($conexion,$sql);
				
				while ($row=mysqli_fetch_array($res)){		
					
					$ValorNHC=$row[0];
					$ValorEstado=intval($row[1]);
					$ValorAdy=intval($row[2]);
					$IDCirugia=intval($row[3]);

					$sqlSiCirugia="SELECT B_Cirugia FROM cirugia WHERE ID='$IDCirugia'";
						
						$row=mysqli_fetch_array(mysqli_query($conexion,$sqlSiCirugia))
       						or die('Error: ' . mysqli_error());
					
					
						$Cirugia=$row[0];
					
				$FechaAlta=1;
				if ($Cirugia==1){
					$sqlFechaAlta="SELECT Fecha_Alta FROM tabla_cirugia WHERE Id_Cirugia='$IDCirugia'";
					
					$row=mysqli_fetch_array(mysqli_query($conexion,$sqlFechaAlta))
       						or die('Error: ' . mysqli_error());
       						
       				$FechaAlta=$row[0];		
				}
					$FechaAlta=strval($FechaAlta);
				
					
				if ($ValorEstado==3 || $ValorAdy==0 || $FechaAlta=="0000-00-00" || $FechaAlta==null){
	      		?>
                        <tr>
                        	
                            <td><?php echo ($ValorNHC);  ?></td>
                            <td>&nbsp;</td>
                            <td><?php
                            	if($ValorAdy==0){?>
                            		<form action="Adyuvante/RellenarAdyuvante.php" method="post" >
                        				<input type="hidden" value="<?php echo ($ValorNHC); ?>" id="NHC" name="NHC" />
                            			<button type="submit" value="Rellena adyuvante" class="btn btn-primary span10" style="height: 100; text-align: center">
                            		      <i class="icon-edit icon-white"></i>
                            		    Rellena adyuvante</button>
                            		    <!--<a href="Adyuvante/RellenarAdyuvante.php?NHC=<?php echo ($ValorNHC); ?>" class="btn btn-primary" style="height: 100; text-align: center">
                                            <i class="icon-edit icon-white"></i>
                                        Rellena adyuvante</a>-->
                            		</form>
                            	<?php
									}else{
                            			?>&nbsp;
                            	<?php
                            	}
                            
                             ?></td>
                            <td><?php
                            	if($ValorEstado==3){?>
                            		<form action="Patologica/RellenarPatologica.php" method="post" >
                        				<input type="hidden" value="<?php echo ($ValorNHC); ?>" id="NHC" name="NHC" />
                            			<button type="submit" value="Rellena patológica" class="btn btn-primary" style="height: 100; text-align: center">
                            			    <i class="icon-edit icon-white"></i>
                                        Rellena patológica</button>
                            			<!--<a href="Patologica/RellenarPatologica.php?NHC=<?php echo ($ValorNHC); ?>" class="btn btn-primary" style="height: 100; text-align: center">
                                            <i class="icon-edit icon-white"></i>
                                        Rellena patológica</a>-->
                            		</form>
                            	<?php
                            	}else{
                            		?>&nbsp;
                            	
                            	<?php
                            	}
                            
                             ?></td>
                            <td><?php
                            	
                            	if($FechaAlta=="0000-00-00" || $FechaAlta==null){?>
                            		<form action="FechaAlta/RellenarFechaAlta.php" method="post" >
                        				<input type="hidden" value="<?php echo ($ValorNHC); ?>" id="NHC" name="NHC" />
                            			<button type="submit" value="Rellena fecha de alta" class="btn btn-primary" style="height: 100; text-align: center">
                            			     <i class="icon-edit icon-white"></i>
                                        Rellena fecha de alta</button>
                            			<!--<a href="FechaAlta/RellenarFechaAlta.php?NHC=<?php echo ($ValorNHC); ?>" class="btn btn-primary" style="height: 100; text-align: center">
                                            <i class="icon-edit icon-white"></i>
                                        Rellena fecha de alta</a>-->
                            		</form>
                            	<?php
                            	}else{
                            		?>&nbsp;
                            	
                            	<?php
                            	}
                            
                             ?>
	
                            </td>
                            
                        </tr>
                        <?php
						}
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
    <script src="pendientes_js.js"></script>
  </body>
</html>

<?php
}
?>