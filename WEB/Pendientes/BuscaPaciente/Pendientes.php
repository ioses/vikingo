<?php

//Comprueba si exite el paciente o no
session_start();

require_once ("../../BDD/conexion.php");
require_once("../../NuevoPaciente/unset_session_variables.php");

if (!isset($_SESSION["NombreHospital"])){
     
     header("Location: ../../login/Sign_In.php?var=Caduca");

}else{
    
    $Hospital=$_SESSION["NombreHospital"];
    
    $IdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='$Hospital'";

    $row=mysqli_fetch_array(mysqli_query($conexion,$IdHospital))
        or die('Error: ' . mysqli_error());

    $Hospital=$row[0];


$BuscaNHC=$_POST["BuscaNHC"];
$ValorAdy=$_POST["ValorAdy"];
$ValorEstado=$_POST["ValorEstado"];
$FechaAlta=$_POST["FechaAlta"];


$BuscaNHC=mysqli_real_escape_string($conexion, $BuscaNHC);

    $sqlBuscaNHC="SELECT AES_DECRYPT(NHC, '$claveNHC') FROM identificador_paciente WHERE Id_Hospital='$Hospital'";
    $rs= mysqli_query($conexion,$sqlBuscaNHC)
        or die('Error: ' . mysqli_error());
    
    $num = mysqli_num_rows($rs);
    
    if ($num > 0) //Hay datos
    {
        $encontrado = 0;
        while($rowNHC=mysqli_fetch_array($rs))
        {
            $a = $rowNHC[0];

            if ($a == $BuscaNHC)
            {
                $encontrado = 1;
                $_SESSION["NHCBusqueda"]=$a; 
                break;
            }
        }
        
        if ($encontrado == 1) //Lo ha encontrado
        {

            mysqli_close($conexion);
        }
        else //No lo ha encontrado
        {
           
            mysqli_close($conexion);
 
            header("Location: PacienteInexistente.php");
        }
    }
    else 
    {
           
        mysqli_close($conexion);
 
         header("Location: PacienteInexistente.php");
    }
       
    
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
	      	<div class="span12">
	      		
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
                        <tr>
                        	
                            <td><?php echo ($_POST['BuscaNHC']);  ?></td>
                            <td>&nbsp;</td>
                            <td><?php
                            	if($_POST['ValorAdy']==1){?>
                            		<form action="../Adyuvante/RellenarAdyuvante.php" method="post" >
                        				<input type="hidden" value="<?php echo ($_POST['BuscaNHC']); ?>" id="NHC" name="NHC" />
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
                            	if($_POST['ValorEstado']==1){?>
                            		<form action="../Patologica/RellenarPatologica.php" method="post" >
                        				<input type="hidden" value="<?php echo ($_POST['BuscaNHC']); ?>" id="NHC" name="NHC" />
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
                            	
                            	if($_POST['FechaAlta']==1){?>
                            		<form action="../FechaAlta/RellenarFechaAlta.php" method="post" >
                        				<input type="hidden" value="<?php echo ($_POST['BuscaNHC']); ?>" id="NHC" name="NHC" />
                            			<button type="submit" value="Rellena fecha de alta" class="btn btn-primary" style="height: 100; text-align: center">
                            			     <i class="icon-edit icon-white"></i>
                                        Rellena fecha de alta</button>
                            		</form>
                            	<?php
                            	}else{
                            		?>&nbsp;
                            	
                            	<?php
                            	}
                            
                             ?>
	
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
         
	       </div><!--span12-->
       	</div>
      </div>
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
               
    <!-- **********************   Llamamos a nuestras funciones de Javascript y jQuery ********************************************************** -->    
    <script src="../../assets/js/vikingo_js.js"></script>
    
  </body>
</html>

<?php
}
?>