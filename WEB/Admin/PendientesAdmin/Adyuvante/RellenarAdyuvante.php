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
    <link rel="stylesheet" href="../../../assets/css/jquery-ui.css" />
    <script src="../../../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../../../assets/jQuery/jquery-ui.js"></script>
			   
	<!-- **********************   Llamamos a nuestras funciones de Javascript y jQuery ********************************************************** -->    
    <script src="../../../assets/js/vikingo_js.js"></script>
   
   	<script src="tratamiento_js.js"></script>
    
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
 			 <p class="navbar-text" style="color: #FFFFFF; font-size: 1.5em; text-align: center  ">
                        <?php
            		
            		echo ("NHC: ".$_POST["NHC"]);
					?>

                     
                    </p>
				</div><!--/.nav-collapse collapse -->
			</div> <!-- container-fluid -->
		</div> <!-- navbar-inner -->
	</div><!--/.navbar navbar-inverse navbar-fixed-top-->

	<div class="container">
	<h3>Tratamiento adyuvante</h3>
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	<div class="row-fluid" style="text-align: center">
      		
	      	<div class="span10">
	      	
	      		
	      		<!-- ************   Tratamiento adyuvante  ************* -->
						<form action="IntroducirAdyuvante.php" method="post" id="FormAdyuvante" name="FormAdyuvante">
							<div class="span1">
								<input type="hidden" id="NHC" name="NHC" value="<?php echo ($_POST["NHC"]); ?>" />
								<label for="B_Tto_Ady_Si">
								<input type="radio" name="B_Tto_Ady" id="B_Tto_Ady_Si" required value="1" onclick="habilitaAdyuvante();" />
								Si</label>
								<br />
								<br />
								<label for="B_Tto_Ady_No">
								<input type="radio" name="B_Tto_Ady" id="B_Tto_Ady_No" required value="2" onclick="habilitaAdyuvante();" />
								No</label>
								
							</div> <!-- span1 -->
							<div class="span10">
								<br />
								<div class="span5">
									<label  class="labelGrado2 labelRadio">Tratamiento postoperatorio</label>
								</div> <!-- span5 LABELS-->
							
								<div class="span5">
								<?php
										$query="SELECT * FROM tabla_tipo_ady";
										$res=mysqli_query($conexion,$query);   
									?>  
								<select id="tipo_ady" name="tipo_ady" required onchange="putRadioButton('B_Tto_Ady_Si'); enabledElement('tipo_ady');">
									<?php
										while ($row=mysqli_fetch_array($res)) {
									?>
										<!--<option value="<?php echo "$row[0]"; ?>"><?php echo "$row[1]";  ?></option>-->
										
										<option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
										
									<?php
									}
								?>
								</select>
							
							</div> <!-- span5 SELECT -->
							</div> <!-- span10 -->
					   
					</div> <!-- row-fluid -->
				</div><!--/hero-unit-->
	      		
         
	       </div><!--span12-->
      <input id="EnviarAdyuvante" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar" />
       	</div>
       	
      </div>
      
    </div> <!-- /container -->
	
	<input type="hidden" value="<?php echo($_POST['idHospital']); ?>" id="idHospital" name="idHospital" />
   
</form>
  </body>
</html>

<?php
}
?>