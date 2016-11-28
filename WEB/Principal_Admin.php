<?php
session_start();
require_once ("BDD/conexion.php");


require_once("Admin/NuevoPacienteAdmin/unset_session_variablesAdmin.php");

if (!isset($_SESSION["EntraAdmin"])){

    header("Location: login/Sign_In.php?var=Caduca");    
    
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
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">


    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
       

       
 <!-- **********************   jQuery   ********************************************************** -->   
    <link rel="stylesheet" href="assets/css/jquery-ui.css" />

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
				<a class="brand" style="float: left;" href="#">Proyecto Vikingo</a>
				<div class="nav-collapse">
					<p class="pull-right navbar-form" style="color: #FFFFFF; font-size: 18px; ">
						<span style="vertical-align: -20%">
							ADMINISTRADOR
						</span>
						<button onclick="location.href='./login/Cerrar_Sesion.php'" class="btn">Cerrar sesión</button>
						
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
		      	<div class="span6">
		       		<a href="./Admin/NuevoPacienteAdmin/EligeHospital.php" class="btn btn-primary btn-large" style="width: 65%">Introducir nuevo paciente</a>
		       		<p>&nbsp;</p>
		       		<p>&nbsp;</p>
		       		<a href="./Admin/Revisiones/Revisiones.php" class="btn btn-primary btn-large" style="width: 65%">Revisiones</a>
		       	    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <a href="./Admin/EliminarPaciente/listado_pacientes.php" class="btn btn-success btn-large" style="width: 65%">Eliminar paciente</a>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <a href="./Admin/Password/FormPassword.php" class="btn btn-danger btn-large" style="width: 65%">Gestión contraseñas usuarios</a>
		       	</div>
		       	<!--<div class="span1">&nbsp;</div>-->
		       	<div class="span6">
		       		<a href="./Admin/GestionPacienteAdmin/listado_pacientes.php" class="btn btn-primary btn-large" style="width: 65%">Gestionar pacientes</a>
		       		<p>&nbsp;</p>
		       		<p>&nbsp;</p>
		       		<a href="./Admin/PendientesAdmin/Pendientes.php" class="btn btn-primary btn-large" style="width: 65%">Datos pendientes</a>
		       		<p>&nbsp;</p>
		       		<p>&nbsp;</p>
		       		<a href="./Admin/Exportaciones/Exportaciones.php" class="btn btn-warning btn-large" style="width: 65%">Exportaciones</a>
		       		<p>&nbsp;</p>
		       		<p>&nbsp;</p>
		       		<a href="./Admin/Estadisticas/EligeEstadistica.php" class="btn btn-large btn-inverse" style="width: 65%;">Estadisticas</a>
		       	</div>
		       	
	       </div><!--span12-->
       </div><!--row fluid-->
      </div><!--hero unit-->
      	<form action="Admin/Avisos/IntroducirText.php" method="post">
			<input type="textarea" name="Avisos" id="Avisos" rows="10" style="width: 100%" value="
				<?php
     		
     		$sqlAvisos="SELECT Aviso FROM avisos ORDER BY Fecha DESC";
			
				$res=mysqli_query($conexion,$sqlAvisos)
          				 or die('Error: ' . mysqli_error());
     		
			$row=mysqli_fetch_array($res);
			
			if($row[0]==null){
				echo"";
			}else{
			echo ($row[0]);
			}
			
     		?>
				
				
			"/>
			<div class="span2">
				<br/>
			<input type="submit" value="Enviar" class="btn btn-primary" />
			</div>
		</form>
		<div class="span3">
		<a href="Admin/Avisos/EliminarAvisos.php" class="btn btn-primary">Eliminar avisos</a>
		</div>
    </div> <!-- /container -->

              <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    
    
       
 <!-- **********************   jQuery   ********************************************************** -->   
    <script src="assets/jQuery/jquery.min.js"></script>
    <script src="assets/jQuery/jquery-1.9.1.js"></script>
    <script src="assets/jQuery/jquery-ui.js"></script>
  </body>
</html>
<?php
}
?>
