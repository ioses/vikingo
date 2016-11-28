<?php
session_start();
require_once ("BDD/conexion.php");

require_once("NuevoPaciente/unset_session_variables.php");

 if (!isset($_SESSION["NombreHospital"])){
     
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
    <link href="assets/css/docs.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">


    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
       
    <link href="assets/css/bootstrap.icon-large.min.css" rel="stylesheet">     
       
      
       
 <!-- **********************   jQuery   ********************************************************** -->   
    <link rel="stylesheet" href="assets/css/jquery-ui.css" />
    
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

  <body >   <!--onload="HabilitaAviso();"-->

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid" style="width: 90%">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" style="float: left;" href="Principal.php">Proyecto Vikingo</a>
                <div class="nav-collapse">
                    <p class="pull-right navbar-form" style="color: #FFFFFF; font-size: 18px; ">
                        <!--<span style="vertical-align: -20%; -moz-transform: scale(0.5); -webkit-transform: scale(0.5); -o-transform: scale(0.5); -ms-transform: scale(0.5); transform: scale(0.5);" >-->
                        <span style="vertical-align: -20%">
                           <i class="icono-large-white icono-building"></i>
                           <?php 
                               $Nombre=$_SESSION["NombreHospital"];
                                if (is_numeric($Nombre))
                                {
                                    $query = "SELECT Nombre FROM tabla_hospital WHERE Codigo = '$Nombre'";
                                    $result = mysqli_query($conexion, $query);
									echo "numero";

                                 while ($row = mysqli_fetch_array($result))
                                    {
                                            $Nombre = ($row['Nombre']); 
                                            $_SESSION["Hospital"] = $Nombre;
                                    }
                                }
                                echo utf8_encode($Nombre);
                                
                            ?>
                        </span>
                        <button onclick="location.href='login/Cerrar_Sesion.php'" class="btn">
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
      	<div class="row-fluid" style="text-align: center;">   	    
      	    
	      	<div class="span12">
		      	<div class="span6">
		       		<a href="./NuevoPaciente/Inicial/Inicial.php" class="btn btn-primary btn-large" style="width: 75%">
		       		 <i class="icon-user-add icon-white" style="width: 15px; height: 21px;"></i>
		       		Introducir nuevo paciente</a>
		       		<p>&nbsp;</p>
		       		<p>&nbsp;</p>
		       		<a href="./Revisiones/Revisiones.php" class="
		       		
		       		<?php
		       		
		       		    $hoy = date("y.m.d"); 
                
                        $Hospital=$_SESSION["NombreHospital"];
                    
                        $IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";
                    
                        $row=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
                            or die('Error: ' . mysqli_error());
                    
                        $Hospital=$row[0];
                        
                        
                        
                        $sql="SELECT seguimiento.Fecha_Revision FROM identificador_paciente
                        INNER JOIN seguimiento ON identificador_paciente.ID= seguimiento.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' AND seguimiento.B_Estado=1 AND seguimiento.B_Imposibilidad=2 
                        AND DATEDIFF('$hoy', seguimiento.Fecha_Revision)>365
                        INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND cirugia.B_Cirugia=1 
                        INNER JOIN tabla_cirugia ON cirugia.ID=tabla_cirugia.Id_Cirugia AND DATEDIFF(seguimiento.Fecha_Revision,tabla_cirugia.Fecha_Intervencion)<1825";
                        
                        $res=mysqli_query($conexion,$sql);
                        
                        $row=mysqli_num_rows($res);
                        
                        if ($row > 0)
                        {
                            echo "btn btn-warning btn-large";
                        }
                        else {
                            echo "btn btn-primary btn-large";
                        }
                        
                        mysqli_free_result($res);
		       		
		       		?>

                    " style="width: 75%">
		       		 <i class="icon-calendar icon-white"></i>
		       		Revisiones</a>
		       		
		       	
		       		<p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <a href="./Exportaciones/Exportaciones.php" class="btn btn-primary btn-large" style="width: 75%">
                     <i class="icon-download icon-white"></i>
                    Exportaciones</a>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <a href="./Contacto/Formulario_Contacto.php" class="btn btn-primary btn-large" style="width: 75%">
                     <i class="icon-envelope icon-white"></i>
                    Contacto</a>
					
					<p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <a href="./Credenciales/Credenciales.php" class="btn btn-primary btn-large" style="width: 75%">
                     <i class="icono-keys"></i>
                    Gestión de credenciales</a>
		       	</div>
		
		       	<div class="span6">
		       		<a href="./GestionPaciente/listado_pacientes.php" class="btn btn-primary btn-large" style="width: 75%">
		       		 <i class="icon-sort icon-white"></i>
		       		Gestionar pacientes</a>
		       		<p>&nbsp;</p>
		       		<p>&nbsp;</p>
		       		<a href="./Pendientes/Pendientes.php" class="
                        <?php
                        $sql2="SELECT AES_DECRYPT(identificador_paciente.NHC,'$claveNHC') AS NHC, tabla_patologica.Estado AS ESTADO, 
                        tratamiento.B_Tto_Ady AS ADY, cirugia.ID AS IDCir FROM identificador_paciente INNER JOIN tabla_patologica 
                        ON identificador_paciente.ID=tabla_patologica.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' INNER JOIN tratamiento 
                        ON identificador_paciente.ID=tratamiento.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' 
                        INNER JOIN cirugia ON identificador_paciente.ID=cirugia.Id_Paciente AND identificador_paciente.Id_Hospital='$Hospital' ORDER BY NHC ASC"; 
                        
                        $res2=mysqli_query($conexion,$sql2);
                        
                        $a = 0;
                        while ($row2=mysqli_fetch_array($res2)){
                            $ValorNHC=$row2[0];
                            $ValorEstado=intval($row2[1]);
                            $ValorAdy=intval($row2[2]);
                            $IDCirugia=intval($row2[3]);
        
                            $sqlSiCirugia="SELECT B_Cirugia FROM cirugia WHERE ID='$IDCirugia'";
                                
                            $row3=mysqli_fetch_array(mysqli_query($conexion,$sqlSiCirugia))
                                or die('Error: ' . mysqli_error());
                        
                        
                            $Cirugia=$row3[0];
                            
                            $FechaAlta=1;
                            if ($Cirugia==1){
                                $sqlFechaAlta="SELECT Fecha_Alta FROM tabla_cirugia WHERE Id_Cirugia='$IDCirugia'";
                                
                                $row4=mysqli_fetch_array(mysqli_query($conexion,$sqlFechaAlta))
                                        or die('Error: ' . mysqli_error());
                                        
                                $FechaAlta=$row4[0];     
                            }
                            $FechaAlta=strval($FechaAlta);
                        
                            
                            if ($ValorEstado==3 || $ValorAdy==0 || $FechaAlta=="0000-00-00" || $FechaAlta==null)
                            {
                                $a++;
                            }
                         }

                        if ($a > 0)
                        {
                            echo "btn btn-warning btn-large";
                        }
                        else {
                            echo "btn btn-primary btn-large";
                        }
                        mysqli_free_result($res2);

                        ?>
                    " style="width: 75%">
		       		  <i class="icon-inbox icon-white"></i>
		       		Datos pendientes</a>
		       		
		       		<p>&nbsp;</p>
		       		<p>&nbsp;</p>
                    <!--<a href="#" class="btn btn-primary btn-large" style="width: 75%" disabled="disabled">-->
                      
                    <a href="./Estadisticas/EligeEstadistica.php" class="btn btn-primary btn-large" style="width: 75%">
		       		 <i class="icon-stats icon-white"></i>
		       		Estadísticas</a>
					
					<p>&nbsp;</p>
		       		<p>&nbsp;</p>

		       		<a href="./Documentos/Documentos.php" class="btn btn-primary btn-large" style="width: 75%">
		       		  <i class="icon-book icon-white"></i>
		       		Documentos</a>

		       	</div>
		       	
	       </div><!--span12-->
       </div><!--row-fluid-->
      </div><!--hero-unit-->

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
