<?php
session_start();
require_once ("../../../BDD/conexion.php");


require_once("../../NuevoPacienteAdmin/unset_session_variablesAdmin.php");

if (!isset($_SESSION["EntraAdmin"])){

    header("Location: ../../../login/Sign_In.php?var=Caduca");    
    
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
    <link href="../../../assets/css/docs.css" rel="stylesheet" />
    <link href="../../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../../../assets/ico/favicon.png">
       
    <link href="../../../assets/css/bootstrap.icon-large.min.css" rel="stylesheet">     
       
      
       
 <!-- **********************   jQuery   ********************************************************** -->   
    <link rel="stylesheet" href="../../../assets/css/jquery-ui.css" />
        
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
                <a class="brand" style="float: left;" href="../../../Principal_Admin.php">Proyecto Vikingo</a>
                <div class="nav-collapse">
                    <p class="pull-right navbar-form" style="color: #FFFFFF; font-size: 18px; ">
                        <span style="vertical-align: -20%">
                            ADMINISTRADOR
                        </span>
                        <button onclick="location.href='../../../login/Cerrar_Sesion.php'" class="btn">Cerrar sesión</button>
                        
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
                <form action="VerInforme.php" method="post">
                    <dl class="dl-horizontal-verPaciente">
                        <dt>
                            <p>Hospital:</p>
                        </dt>
                        <dd>
                            <?php
                                $sqlHospital="SELECT Codigo, Nombre FROM tabla_hospital";
                                $result=mysqli_query($conexion,$sqlHospital);
                            ?>
                            <select name="Hospital" id="Hospital" style="width: 60%;">
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
    <script src="../../../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../../../assets/jQuery/jquery-ui.js"></script>
  </body>
</html>

<?php
}
?>