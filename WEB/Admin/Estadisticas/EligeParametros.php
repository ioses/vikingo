<?php
session_start();
require_once ("../../BDD/conexion.php");
require_once("../NuevoPacienteAdmin/unset_session_variablesAdmin.php");


if (!isset($_SESSION["EntraAdmin"])){

    header("Location: ../../login/Sign_In.php?var=Caduca");    
    
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
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">


    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
       
       
       
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
    <link rel="stylesheet" href="assets/css/jquery-ui.css" />
    <script src="../../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../../assets/jQuery/jquery-ui.js"></script>
    
    <script type="text/javascript">
    		$(document).ready(function() {
	
	    	 $("#BuscaNHC").autocomplete({
       			 source : '../../BuscaPaciente/get_lista_NHC.php'//, minLength:2
    			});
   		 });
    	
    </script>
    
	<script src="EligeParametros_js.js"></script>

  </head>
<!---->
  <body onload="HabilitaHospital();">

    <div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid" style="width: 90%">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="../../Principal_Admin.php">Proyecto Vikingo</a>
				<div class="nav-collapse">
					<p class="pull-right navbar-form" style="color: #FFFFFF; font-size: 18px; ">
						<span style="vertical-align: -20%">
							ADMINISTRADOR
						</span>
						<button onclick="location.href='../../login/Cerrar_Sesion.php'" class="btn">Cerrar sesión</button>
						
						<!--Función php que dará el nombre del hospital al hacer el login-->
					</p>
				</div><!--/.nav-collapse collapse -->
			</div> <!-- container-fluid -->
		</div> <!-- navbar-inner -->
	</div><!--/.navbar navbar-inverse navbar-fixed-top-->




    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	<div class="row-fluid">
	      	<div class="span12">
	      	    <form name="EligeParametros" action="IntroducirDatosEstadisticas.php" method="post">
	      	    	<dl class="dl-horizontal-verPaciente">
	      	    	<dt>
	      	    		<p>Tipo de informe:</p>
	      	    	</dt>	
	      	    	<dd>
	      	    		<label class="labelRadio" for="IdTodosHospitales">
	      	    		<input type="radio" name="TipoInformeHospitales" id="IdTodosHospitales" value="1" onclick="HabilitaHospital();" required checked="checked" />
	      	    		Todos los hospitales</label>
	      	    		
	      	    		<label class="labelRadio" for="IdSeleccionHospital">
	      	    		<input type="radio" name="TipoInformeHospitales" id="IdSeleccionHospital" value="2" onclick="HabilitaHospital();" required />
	      	    		Selecciona hospital</label>
	      	    	

	      	    			
	      	    				<?php
	      							$sqlHospital="SELECT Codigo, Nombre FROM tabla_hospital";
	      				
	      							$result=mysqli_query($conexion,$sqlHospital);
	      						?>
	      					<select name="HospitalKaplanMeier" id="HospitalKaplanMeier" style="width: 40%; margin-left: 10% " required disabled>
	      						<?php
	      					while($row=mysqli_fetch_array($result)){
	      						$ID=$row[0];
								$Nombre=utf8_encode($row[1]);
	      						?>
	      				<option value="<?php echo($ID); ?>" ><?php echo ($ID." -- ".$Nombre); ?></option>
	      				<?php
							}
	      				?>
	      	    			</select>
	      	    	
	      	    		</dd>
	      	    	</dl>
	      	        <dl class="dl-horizontal-verPaciente">	
                    <dt>
                        <p>Altura tumor:</p>
                    </dt>
                    <dd>
                        <label class="labelCheck" for="altura_tumor_05">
                            <input type="checkbox" id="altura_tumor_05" name="altura_tumor_05" value="1" />
                        0-5cm</label>
                        <label class="labelCheck" for="altura_tumor_610">
                            <input type="checkbox" id="altura_tumor_610" name="altura_tumor_610" value="2" />
                        6-10cm</label>
                        <label class="labelCheck" for="altura_tumor_1115">
                            <input type="checkbox" id="altura_tumor_1115" name="altura_tumor_1115" value="3" />
                        11-15cm</label>
                    </dd>
                </dl>
                <dl class="dl-horizontal-verPaciente">
                    <dt>
                        <p>Técnicas de cirugía:</p>
                    </dt>
                    <dd>
                        <label class="labelCheck" for="reseccion_abd">
                            <input type="checkbox" id="reseccion_abd" name="reseccion_abd" value="1" />
                        Resección abdominoperineal</label>
                        <label class="labelCheck" for="reseccion_anterior">
                            <input type="checkbox" id="reseccion_anterior" name="reseccion_anterior" value="2" />
                        Resección anterior</label>
                        <label class="labelCheck" for="hartmann">
                            <input type="checkbox" id="hartmann" name="hartmann" value="3" />
                        Hartmann</label>
                    </dd>
                </dl>
                <dl class="dl-horizontal-verPaciente">
                    <dt>
                        <p>Margen de tiempo:</p>
                    </dt>
                    <dd>
                        <dl class="dl-horizontal-secundario-mediano" style="font-size: 14px; font-weight: normal;">
                            <dt>
                                <p>Inicio:</p>
                            </dt>
                            <dd>
                                <input type="date" id="inicio" name="inicio" required />
                            </dd>
                            <dt>Fin:</dt>
                            <dd>
                                <input type="date" id="fin" name="fin" required />
                            </dd>
                        </dl>
                        
                        
                    </dd>
                </dl>
                
                <dl class="dl-horizontal-verPaciente">
	      	    	<dt>
	      	    		<p>Tipo de informe:</p>
	      	    	</dt>	
	      	    	<dd>
	      	    		<label class="labelRadio" for="IdSinLimite">
	      	    		<input type="radio" name="RecortaMeses" id="IdSinLimite" value="1" onclick="HabilitaSeguimiento();" required checked="checked" />
	      	    		Sin límite de seguimiento inferior</label>
	      	    		
	      	    		<label class="labelRadio" for="IdConLimite">
	      	    		<input type="radio" name="RecortaMeses" id="IdConLimite" value="2" onclick="HabilitaSeguimiento();" required />
	      	    		Límite de seguimiento inferior
	      	    	
	      					<input type="text" name="MesesMinimos" id="MesesMinimos" style="width: 10%; margin-left: 5% " required disabled>
	      						&nbsp;&nbsp;Meses </label>
	      	    	
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
    <input type="hidden" id="HospitalAnalisis" name="HospitalAnalisis" value="<?php echo ($_SESSION["HospitalKaplanMeier"]); ?>" />

  </body>
</html>

<?php
}
?>