<?php
session_start();
require('../../PHPComun/encode.php');
require_once ('../../BDD/conexion.php');
require ('Carga_Datos_Seguimiento.php');

if (!isset($_SESSION["NombreHospital"])){
     
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
	
          
    <!-- **********************   jQuery   ********************************************************** -->   
    <link rel="stylesheet" href="../../assets/css/jquery-ui.css" />

                                                        
  </head>

  <body onload="HabilitarMuerte();">
  	
  	
  	<!--*******************************    Texto de alerta      *****************************************************-->
  	 <div id="dialog-message" title="Basic modal dialog" style="display: none;">
 	 <p id="textoalert" class="">
        
    </p>
 	</div>

     <!-- ****************************    Barra de arriba  *******************************************-->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid" style="width: 90%">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="../../Principal.php">Proyecto Vikingo</a>
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
    
	<div class="container-fluid">
	     <!-- ****************************    Barra lateral  *******************************************-->
		<div class="span2">
			<div id="menuFloat">
			<div class="accordion well sidebar-nav">
			
				<div class="accordion-group">  
					<div class="accordion-heading">  
						<a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('../Seguimiento/Seguimiento.php');" href="#collapseFive">  
						  Seguimiento  
						</a>  
					</div> <!-- accordion-heading -->  
					<div id="collapseFive" class="accordion-body">  
						<div class="accordion-inner">  
							<li><a href="#recidiva">Recidiva</a></li>
							<li><a href="#metastasis">Metástasis</a></li>
							<li><a href="#segundoTumor">Segundo tumor</a></li>
							<li><a href="#estado">Estado</a></li>      
						</div>  <!-- accordion-inner -->  
					</div>  <!-- accordion-body collapse --> 
				</div> <!-- accordion-group --> 
			</div><!--/.accordion well sidebar-nav -->
			</div><!--menuFloat-->
			
			<label style="position: fixed; margin-top: 360px; left:10px;">Última revisión:</label>
			<input type="date" name="Fecha_Revision_Menu" id="Fecha_Revision_Menu" style="position: fixed; margin-top: 390px; left:10px; width: 150px;" required onchange/>
			
		</div><!--/span2-->
		 
		 <!-- ****************************    Contenido  *******************************************-->
		<div class="span10" name="general">
			<form name="Seguimiento" id="Seguimiento" action="IntroducirDatosSeguimiento.php" method="post" onsubmit="return FechasOK();">
			<label>Última revisión:</label>
			<input type="date" name="Fecha_Revision" id="Fecha_Revision" required/>
			
			<!-- ************   Recidiva  ************* -->
            <a name="recidiva"> &nbsp;</a>
            <br/>
            <br/>        
            <h3 >Recidiva</h3>
			<div class="hero-unit">
				<div class="row-fluid">
					<div class="2"> <!--RADIO-->
						<label for="B_Recidiva_No">
							<input type="radio" name="B_Recidiva" id="B_Recidiva_No" value="2" checked="checked" onclick="HabilitaRecidiva();" />   
						No</label>
						<label for="B_Recidiva_Si">
							<input type="radio" name="B_Recidiva" id="B_Recidiva_Si" value="1" onclick="HabilitaRecidiva();" />
						Si</label>
					</div> <!--/span2 RADIO-->
					<div class="span10">
						<div class="span12">
							<div class="span12" style="margin-top: -25px;">&nbsp;</div>
							<div class="span4"><!--LABELS-->
								<label class="labelGrado1 labelRadio">Fecha</label>
							</div> <!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!--INPUTS-->
								<input type="date" name="Fecha_Recidiva" id="Fecha_Recidiva" disabled required/>
							</div><!--/span6 INPUTS-->
						</div><!--/span12-->
						
						<div class="span12">
		
							<div class="span4"><!--LABELS-->
								<label class="labelGrado1 labelRadio">Localización</label>
							</div><!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!--INPUTS-->
								<input type="text" id="tabla_seg_localiz_recidiva" name="tabla_seg_localiz_recidiva" disabled required />
							</div><!--/span6 INPUTS-->
						</div><!--/span12-->
						
						<div class="span12" style="margin-top: 10px;">
							<div class="span4" style="margin-top: -6px;"> <!--LABELS-->
								<label class="labelGrado1 labelRadio">Intervención</label>
							</div><!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!--RADIOS-->
								<label for="B_Recidiva_Intervencion_Si">
                                    <input type="radio" name="B_Recidiva_Intervencion" id="B_Recidiva_Intervencion_Si" value="1" disabled required />
                                Si</label>
                                <label for="B_Recidiva_Intervencion_No">
                                    <input type="radio" name="B_Recidiva_Intervencion" id="B_Recidiva_Intervencion_No"  value="2" disabled required />   
                                No</label>
							</div><!--/span6 RADIOS-->
						</div><!--/span12-->
					</div><!--/span10-->
				</div> <!--/row-fluid-->
			</div><!--/hero-unit-->
			
			<!-- ************   Separación  ************* -->
            <hr />
			
            <!-- ************   Metástasis  ************* -->
            <a name="metastasis"> &nbsp;</a>
            <br/>
			<br/>		
            <h3 >Metástasis</h3>
            <div class="hero-unit">
				<div class="row-fluid">
					<div class="2"> <!--RADIO-->
						<label for="B_Metastasis_No">
							<input type="radio" name="B_Metastasis" id="B_Metastasis_No" value="2" checked="checked" onclick="HabilitaMetastasis();" />   
						No</label>
						<label for="B_Metastasis_Si">
							<input type="radio" name="B_Metastasis" id="B_Metastasis_Si" value="1" onclick="HabilitaMetastasis();"/>
						Si</label>
					</div> <!--/span2 RADIO-->
					<div class="span10">
						<div class="span12">
							<div class="span12" style="margin-top: -25px;">&nbsp;</div>
							<div class="span4"><!--LABELS-->
								<label class="labelGrado1 labelRadio">Fecha</label>
							</div> <!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!--INPUTS-->
								<input type="date" name="Fecha_Metastasis" id="Fecha_Metastasis" style="margin-bottom: 20px;" disabled required/>
							</div><!--/span6 INPUTS-->
						</div><!--/span12-->
						
						<div class="span12">
		
							<div class="span4"><!--LABELS-->
								<label class="labelGrado1 labelRadio">Localización</label>
							</div><!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!--INPUTS-->
								<input type="text" id="tabla_seg_localiz_metastasis" name="tabla_seg_localiz_metastasis" disabled required />
							</div><!--/span6 INPUTS-->
						</div><!--/span12-->
						
						<div class="span12" style="margin-top: 10px;">
							<div class="span4" style="margin-top: -6px;"> <!--LABELS-->
								<label class="labelGrado1 labelRadio">Intervención</label>
							</div><!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!--RADIOS-->
								<label for="B_Metastasis_Intervencion_Si">
                                    <input type="radio" name="B_Metastasis_Intervencion" id="B_Metastasis_Intervencion_Si" value="1" disabled required/>
                                Si</label>
                                <label for="B_Metastasis_Intervencion_No">
                                    <input type="radio" name="B_Metastasis_Intervencion" id="B_Metastasis_Intervencion_No" value="2" disabled required/>   
                                No</label>
							</div><!--/span6 RADIOS-->
						</div><!--/span12-->
					</div><!--/span10-->
				</div> <!--/row-fluid-->
			</div><!--/hero-unit-->

			
			<!-- ************   Separación  ************* -->
            <hr />
			
            <!-- ************   Segundo tumor  ************* -->
            <a name="segundoTumor"> &nbsp;</a>
            <br/>  
			<br/>
            <h3 >Segundo tumor</h3>
            <div class="hero-unit">
				<div class="row-fluid">
					<div class="2"> <!--RADIO-->
						<label for="B_Segundo_Tumor_No">
							<input type="radio" name="B_Segundo_Tumor" id="B_Segundo_Tumor_No" value="2" checked="checked" onclick="HabilitaSegundoTumor();" />   
						No</label>
						<label for="B_Segundo_Tumor_Si">
							<input type="radio" name="B_Segundo_Tumor" id="B_Segundo_Tumor_Si" value="1" onclick="HabilitaSegundoTumor();" />
						Si</label>
					</div> <!--/span2 RADIO-->
					<div class="span10">
						<div class="span12">
							<div class="span12" style="margin-top: -25px;">&nbsp;</div>
							<div class="span4"><!--LABELS-->
								<label class="labelGrado1 labelRadio">Fecha</label>
							</div> <!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!--INPUTS-->
								<input type="date" name="Fecha_Segundo_Tumor" id="Fecha_Segundo_Tumor" style="margin-bottom: 20px;" disabled required/>
							</div><!--/span6 INPUTS-->
						</div><!--/span12-->
						
						<div class="span12">
		
							<div class="span4"><!--LABELS-->
								<label class="labelGrado1 labelRadio">Localización</label>
							</div><!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!--INPUTS-->
								<input type="text" id="tabla_seg_localiz_segundo_tumor" name="tabla_seg_localiz_segundo_tumor" disabled required />
							</div><!--/span6 INPUTS-->
						</div><!--/span12-->
						
						<div class="span12" style="margin-top: 10px;">
							<div class="span4" style="margin-top: -6px;"> <!--LABELS-->
								<label class="labelGrado1 labelRadio">Intervención</label>
							</div><!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6"><!--RADIOS-->
								<label for="B_Segundo_Tumor_Intervencion_Si">
                                    <input type="radio" name="B_Segundo_Tumor_Intervencion" id="B_Segundo_Tumor_Intervencion_Si" value="1" disabled required />
                                Si</label>
                                <label for="B_Segundo_Tumor_Intervencion_No">
                                    <input type="radio" name="B_Segundo_Tumor_Intervencion" id="B_Segundo_Tumor_Intervencion_No" value="2" disabled required />   
                                No</label>
							</div><!--/span6 RADIOS-->
						</div><!--/span12-->
					</div><!--/span10-->
				</div> <!--/row-fluid-->
			</div><!--/hero-unit-->
			
			<!-- ************   Separación  ************* -->
            <hr />
			
            <!-- ************   Estado  ************* -->
            
            <!--Variables de sesión para Muerte-->
            <input type="hidden" id="Causa_No_Adyuvante" name="Causa_No_Adyuvante" value="<?php 
            
            	if (isset($_SESSION["tipo_no_neo"])){
            		echo ($_SESSION["tipo_no_neo"]);
            	}else {
            		echo "0";
            	}
  
            ?>" />
            
               <input type="hidden" id="Causa_No_Cirugia" name="Causa_No_Cirugia" value="<?php 
            
            	if (isset($_SESSION["Motivo_No_Cirugia"])){
            		echo ($_SESSION["Motivo_No_Cirugia"]);
            	}else {
            		echo "0";
            	}
  
            ?>" />
            
                <input type="hidden" id="Exitus_Intra" name="Exitus_Intra" value="<?php 
            
            	if (isset($_SESSION["Exitus_Intra"])){
            		echo ($_SESSION["Exitus_Intra"]);
            	}else {
            		echo "0";
            	}
  
            ?>" />
            
                 <input type="hidden" id="Exitus_Post" name="Exitus_Post" value="<?php 
            
            	if (isset($_SESSION["Exitus_Post"])){
            		echo ($_SESSION["Exitus_Post"]);
            	}else {
            		echo "0";
            	}
  
            ?>" />
            
              <input type="hidden" id="Fecha_Cirugia" name="Fecha_Cirugia" value="<?php 
            
            	if (isset($_SESSION["Fecha_Cirugia"])){
            		echo ($_SESSION["Fecha_Cirugia"]);
            	}else {
            		echo "0";
            	}
  
            ?>" />
            
            <a name="estado"> &nbsp;</a>
            <br/>
			<br/>		
            <h3 >Estado</h3>
            <div class="hero-unit">
				<div class="row-fluid">
				    <div class="row-fluid">
						<div class="span12">
							<div class="span4">
								<label class="labelGrado1" style="margin-top: 5px;">Estado del paciente</label>
							</div><!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6">
								<div class="2"> <!--RADIO-->
									<label for="B_Estado_Vivo">
										<input type="radio" name="B_Estado" id="B_Estado_Vivo" value="1" checked="checked" onclick="HabilitaEstadoPaciente();" />
									Vivo</label>
									<label for="B_Estado_Muerto">
										<input type="radio" name="B_Estado" id="B_Estado_Muerto" value="2" onclick="HabilitaEstadoPaciente();" />   
									Muerto</label>
								</div> <!--/span2 RADIO-->
								<div class="span10">
									<div class="span12">
										<div class="span12" style="margin-top: -15px;">&nbsp;</div>
										<div class="span4"><!--LABELS-->
											<label class="labelGrado2 labelRadio">Fecha</label>
										</div> <!--/span4 LABELS-->
										<div class="span1">
										</div>
										<div class="span6"><!--INPUTS-->
											<input type="date" name="Fecha_Muerte" id="Fecha_Muerte" style="margin-bottom: 20px;" disabled required/>
										</div><!--/span6 INPUTS-->
									</div><!--/span12-->
									
									<div class="span12">
										<div class="span4"><!--LABELS-->
											<label class="labelGrado2 labelRadio">Existus relacionado con el cáncer</label>
										</div><!--/span4 LABELS-->
										<div class="span1">
										</div>
										<div class="span6" style="margin-top: 8px;"><!--INPUTS-->
											<label for="Relacion_Muerte_Si">
												<input type="radio" name="Relacion_Muerte" id="Relacion_Muerte_Si" value="1" disabled required />
											Si</label>
											<label for="Relacion_Muerte_No">
												<input type="radio" name="Relacion_Muerte" id="Relacion_Muerte_No" value="2" disabled required />   
											No</label>
										</div><!--/span6 INPUTS-->
									</div><!--/span12-->						
								</div><!--/span10-->
							</div><!--/span6 DATOS-->
						</div><!--/span12-->
					
						<div class="span12" style="margin-top: 35px;">
							<div class="span4">
								<label class="labelGrado1" style="margin-top: 5px;">Imposibilidad del seguimiento</label>
							</div><!--/span4 LABELS-->
							<div class="span1">
							</div>
							<div class="span6">
								<div class="2"> <!--RADIO-->
								    <label for="B_Imposibilidad_No">
                                        <input type="radio" name="B_Imposibilidad" id="B_Imposibilidad_No" value="2" checked="checked" onclick="HabilitaImposibilidad();" />   
                                    No</label>
									<label for="B_Imposibilidad_Si">
										<input type="radio" name="B_Imposibilidad" id="B_Imposibilidad_Si" value="1" onclick="HabilitaImposibilidad();" />
									Si</label>
								</div> <!--/span2 RADIO-->
								<div class="span10">
									<div class="span12">
										<div class="span12" style="margin-top: -25px;">&nbsp;</div>
										<div class="span4"><!--LABELS-->
											<label class="labelGrado2 labelRadio">Causa</label>
										</div> <!--/span4 LABELS-->
										<div class="span1">
										</div>
										<div class="span6"><!--INPUTS-->
											<input type="text" id="tabla_seg_imposibilidad" name="tabla_seg_imposibilidad" disabled required />
										</div><!--/span6 INPUTS-->
									</div><!--/span12-->
								</div><!--/span10-->
							</div><!--/span6 DATOS-->
						</div><!--/span12-->
					</div> <!--/row-fluid-->
				</div><!--/hero-unit-->
			
		</div> <!-- span10 -->
		
		<input id="ButtonEnviarSeguimiento" type="submit" class="btn btn-primary btn-large pull-right" style="margin-top: 10px;" value="Enviar" />
		</form>
	</div><!--/container-fluid--> 
	  
	<hr />
	
	<!--/Condiciones recidiva--> 
	<input type="hidden" id="Tecnicas_Cirugia" name="Tecnicas_Cirugia" value="<?php $c = $_SESSION["Tecnicas_Cirugia"]; echo $c; ?>"/>
    <input type="hidden" id="Tipo_Reseccion" name="Tipo_Reseccion" value="<?php $r = $_SESSION["Tipo_Res"]; echo $r;?>"/>
    
    
    <!--/Condiciones metástasis--> 
    <input type="hidden" id="MetastInicial" name="MetastInicial" value="<?php $m = $_SESSION["MetastInicial"]; echo $m; ?>"/>
    <input type="hidden" id="Tipo_Metast_Hepaticas" name="Tipo_Metast_Hepaticas" value="<?php $mh = $_SESSION["Tipo_Metast_Hepaticas"]; echo $mh; ?>"/>
    <input type="hidden" id="Imp_Ovaricos" name="Imp_Ovaricos" value="<?php $io = $_SESSION["Imp_Ovaricos"]; echo $io; ?>"/>
    
    
        <!-- Condición para la carga de datos (Si han entrado antes o no)-->
    <input type="hidden" id="EnviarSeguimiento" name="EnviarSeguimiento" value="
    
    
        <?php 
            
                if (isset($_SESSION["ButtonEnviarSeguimiento"])){
                    echo ($_SESSION["ButtonEnviarSeguimiento"]);
                }else {
                    echo "-1";
                }
  
            ?>
    
    
    "/>
    
    
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
    
    <!-- **********************   Para hacer flotante/fijo el menu vertical ********************************************************** -->    
    <script src="../../assets/jQuery/jquery-scrolltofixed.js" type="text/javascript"></script>
   
      
  <!-- **********************   Llamamos a nuestras funciones de Javascript y jQuery ********************************************************** -->    
    <script src="../../assets/js/vikingo_js.js"></script>
    <script src="seguimiento_js.js"></script>
    
 
    
    <!-- Ponemos estos dos javascripts aquí para que funcione el popover -->
    <script src="../../assets/js/bootstrap-tooltip.js"></script>
    <script src="../../assets/js/bootstrap-popover.js"></script>
    


  </body>
</html>
<?php
}
?>