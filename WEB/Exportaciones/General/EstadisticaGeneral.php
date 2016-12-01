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
    <title>Proyecto Vikingo::Tabla general</title>
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




   <div class="container-fluid">
        <div class="span2 bs-docs-sidebar">
            <ul class="nav nav-list bs-docs-sidenav affix">
                <li>
                    <a href="#Inicial">
                        <i class="icon-chevron-right"></i>
                    Inicial</a>
                </li>
                <li>
                    <a href="#Tratamiento">
                        <i class="icon-chevron-right"></i>
                    Tratamiento</a>
                </li>
                <li>
                    <a href="#CirugiaM">
                       <i class="icon-chevron-right"></i>
                    Cirugía</a>
                </li>
                <li>
                    <a href="#AnatPatol">
                        <i class="icon-chevron-right"></i>
                    Anatomía patológica</a>
                </li>
                <li>
                    <a href="#Seguimiento">
                        <i class="icon-chevron-right"></i>
                    Seguimiento</a>
                </li>
            </ul><!--/menuFloat-->
        </div><!--/span2-->
        
        <form action="ExportaEstadisticaGeneral.php" method="post">
            
          <div class="span10">
                <div class="alert alert-block">
                    <button id="buttonDescargar" name="buttonDescargar" class="btn" type="submit">
                        <i class=" icon-download-alt"></i>Descargar archivo
                    </button>
                    
                    
                    <div class="btn-group" style="float: right;">
                      <button type="button" id="seleccionarTodo" class="btn btn-inverse">Seleccionar todo</button>
                      <button type="button" id="deshabilitarTodo" class="btn">Deshabilitar todo</button>
                    </div>
                </div>
     
           
          <!-- ****************************    Inicial  *******************************************-->  
                <a name="Inicial">&nbsp;</a>
                <br />
                <br />
                <h3>INICIAL</h3>
                <div class="hero-unit">
                    <div class="row-fluid">
                        <div class="btn-group" style="float: right;">
                          <button type="button" id="seleccionarTodoInicial" class="btn btn-inverse">Seleccionar todo</button>
                          <button type="button" id="deshabilitarTodoInicial" class="btn">Deshabilitar todo</button>
                        </div>
                        <br />
 
                        <dl class="dl-horizontal-principal-checkbox">
                            <dt>
                                <label class="labelCheck" for="Hospital">
                                    <input type="checkbox" id="Hospital" name="Hospital" value="1"/>
                                Hospital</label>
                                
                                <label class="labelCheck" for="NHC">
                                    <input type="checkbox" id="NHC" name="NHC" value="1"/>
                                NHC</label>
                                
                                <label class="labelCheck" for="FechaAltaSistema">
                                    <input type="checkbox" id="FechaAltaSistema" name="FechaAltaSistema" value="1"/>
                                Fecha alta sistema</label>
                                
                                <label class="labelCheck" for="FechaNacimiento">
                                    <input type="checkbox" id="FechaNacimiento" name="FechaNacimiento" value="1"/>
                                Fecha nacimiento</label>
                                
                                <label class="labelCheck" for="Sexo">
                                    <input type="checkbox" id="Sexo" name="Sexo" value="1"/>
                                Sexo</label>
                                
                                <label class="labelCheck" for="Localizacion">
                                    <input type="checkbox" id="Localizacion" name="Localizacion" value="1"/>
                                Localización</label>
                                
                                <label class="labelCheck" for="Clasificacion_Rullier">
                                    <input type="checkbox" id="Clasificacion_Rullier" name="Clasificacion_Rullier" value="1"/>
                                Clasificación Rullier</label>
                                
                                <label class="labelCheck" for="TumorSincronico">
                                    <input type="checkbox" id="TumorSincronico" name="TumorSincronico" value="1"/>
                                Tumor sincronico</label>
                                
                                <label class="labelCheck" for="EstadioRadiologico">
                                    <input type="checkbox" id="EstadioRadiologico" name="EstadioRadiologico" value="1"/>
                                Estadio radiológico</label>
                            </dt>
                            <dd>
                            	<label class="labelCheck" for="ECO">
                                    <input type="checkbox" id="ECO" name="ECO" value="1"/>
                                ECO</label>
                            	
                                <label class="labelCheck" for="EcoT">
                                    <input type="checkbox" id="EcoT" name="EcoT" value="1"/>
                                Eco T</label>
                                
                                <label class="labelCheck" for="EcoN">
                                    <input type="checkbox" id="EcoN" name="EcoN" value="1"/>
                                Eco N</label>
                                
                                <label class="labelCheck" for="TAC">
                                    <input type="checkbox" id="TAC" name="TAC" value="1"/>
                                TAC</label>
                                
                                <label class="labelCheck" for="RMN">
                                    <input type="checkbox" id="RMN" name="RMN" value="1"/>
                                RMN</label>
                                
                                <label class="labelCheck" for="RmnT">
                                    <input type="checkbox" id="RmnT" name="RmnT" value="1"/>
                                Rmn T</label>
                                
                                <label class="labelCheck" for="RmnN">
                                    <input type="checkbox" id="RmnN" name="RmnN" value="1"/>
                                Rmn N</label>
                                
                                <label class="labelCheck" for="Dist_Tumor">
                                    <input type="checkbox" id="Dist_Tumor" name="Dist_Tumor" value="1"/>
                                Distancia tumor</label>
                                
                                <label class="labelCheck" for="Dist_Adeno">
                                    <input type="checkbox" id="Dist_Adeno" name="Dist_Adeno" value="1"/>
                                Distancia adenopatía</label>
                                
                                <label class="labelCheck" for="Integ_Esfinter">
                                    <input type="checkbox" id="Integ_Esfinter" name="Integ_Esfinter" value="1"/>
                                Integridad esfinteriana</label>
                                                                
                                <label class="labelCheck" for="Invasion">
                                    <input type="checkbox" id="Invasion" name="Invasion" value="1"/>
                                Invasión</label>
                                
                                <label class="labelCheck" for="MetastasisInicial">
                                    <input type="checkbox" id="MetastasisInicial" name="MetastasisInicial" value="1"/>
                                Metástasis inicial</label>
                                
                            </dd>
                        </dl>
                        
                    </div><!--/row-fluid-->
                </div><!--/hero-unit-->
                
                <!-- ****************************    Tratamiento  *******************************************-->  
                <a name="Tratamiento">&nbsp;</a>
                <br />
                <br />
                <h3>TRATAMIENTO</h3>
                <div class="hero-unit">
                    <div class="row-fluid">    
                        <div class="btn-group" style="float: right;">
                          <button type="button" id="seleccionarTodoTratamiento" class="btn btn-inverse">Seleccionar todo</button>
                          <button type="button" id="deshabilitarTodoTratamiento" class="btn">Deshabilitar todo</button>
                        </div>
                        <br />       
                        <dl class="dl-horizontal-principal-checkbox">
                            <dt>
                                <label class="labelCheck" for="TtoNeo">
                                    <input type="checkbox" id="TtoNeo" name="TtoNeo" value="1"/>
                                Tratamiento neoadyuvante</label>
                                
                                <label class="labelCheck" for="TipoNeo">
                                    <input type="checkbox" id="TipoNeo" name="TipoNeo" value="1"/>
                                Tipo de tratamiento neoadyuvante</label>
                                
                                <label class="labelCheck" for="TipoNoNeo">
                                    <input type="checkbox" id="TipoNoNeo" name="TipoNoNeo" value="1"/>
                                Tipo de tratamiento no neoadyuvante</label>
                                
                            </dt>
                            <dd>
                                <label class="labelCheck" for="TtoAdy">
                                    <input type="checkbox" id="TtoAdy" name="TtoAdy" value="1"/>
                                Tratamiento adyuvante</label>
                                
                                <label class="labelCheck" for="TipoAdy">
                                    <input type="checkbox" id="TipoAdy" name="TipoAdy" value="1"/>
                                Tipo de tratamiento adyuvante</label>
                            </dd>
                        </dl>

                    </div><!--/row-fluid-->
                </div><!--/hero-unit-->
                
                
                <!-- ****************************    Cirugía  *******************************************-->  
                <a name="CirugiaM">&nbsp;</a>
                <br />
                <br />
                <h3>CIRUGÍA</h3>
                <div class="hero-unit">
                    <div class="row-fluid">
   
                        <strong>Cirugía</strong> 
                         <div class="btn-group" style="float: right;">
                          <button type="button" id="seleccionarTodoCirugia" class="btn btn-inverse">Seleccionar todo</button>
                          <button type="button" id="deshabilitarTodoCirugia" class="btn">Deshabilitar todo</button>
                        </div>        
                        <dl class="dl-horizontal-principal-checkbox">
                            <dt>
                                <label class="labelCheck" for="Cirugia">
                                    <input type="checkbox" id="Cirugia" name="Cirugia" value="1"/>
                                Cirugía</label>
                                
                                <label class="labelCheck" for="MotivoNoCirugia">
                                    <input type="checkbox" id="MotivoNoCirugia" name="MotivoNoCirugia" value="1"/>
                                Motivo no cirugía</label>
                                
                                <label class="labelCheck" for="Planificacion">
                                    <input type="checkbox" id="Planificacion" name="Planificacion" value="1"/>
                                Planificación</label>
                                
                                <label class="labelCheck" for="FechaCirugia">
                                    <input type="checkbox" id="FechaCirugia" name="FechaCirugia" value="1"/>
                                Fecha cirugía</label>
                                
                                <label class="labelCheck" for="FechaAlta">
                                    <input type="checkbox" id="FechaAlta" name="FechaAlta" value="1"/>
                                Fecha alta</label>
                                
                                <label class="labelCheck" for="Cirujano_Principal">
                                    <input type="checkbox" id="Cirujano_Principal" name="Cirujano_Principal" value="1"/>
                                Cirujano principal</label>
                                
                                <label class="labelCheck" for="Cirujano_Ayudante">
                                    <input type="checkbox" id="Cirujano_Ayudante" name="Cirujano_Ayudante" value="1"/>
                                Cirujano ayudante</label>
                                
                                <label class="labelCheck" for="Tecnica">
                                    <input type="checkbox" id="Tecnica" name="Tecnica" value="1"/>
                                Técnica</label>
                            
                                <label class="labelCheck" for="Tipo_Anastomosis_Proyecto">
                                    <input type="checkbox" id="Tipo_Anastomosis_Proyecto" name="Tipo_Anastomosis_Proyecto" value="1"/>
                                Tipo Anastomosis Proyecto</label>
                            
                                <label class="labelCheck" for="Tipo_Anastomosis_coloanal">
                                    <input type="checkbox" id="Tipo_Anastomosis_coloanal" name="Tipo_Anastomosis_coloanal" value="1"/>
                                Anastomosis coloanal</label>
                                
                                <label class="labelCheck" for="OtraTecnica">
                                    <input type="checkbox" id="OtraTecnica" name="OtraTecnica" value="1"/>
                                Otras técnicas</label>
                                
                                <label class="labelCheck" for="Orientacion">
                                    <input type="checkbox" id="Orientacion" name="Orientacion" value="1"/>
                                Orientación</label>
                                
                                <label class="labelCheck" for="ExeresisMesorrecto">
                                    <input type="checkbox" id="ExeresisMesorrecto" name="ExeresisMesorrecto" value="1"/>
                                Exéresis mesorrecto</label>
                            
                                <label class="labelCheck" for="Reseccion_interesfinteriana">
                                    <input type="checkbox" id="Reseccion_interesfinteriana" name="Reseccion_interesfinteriana" value="1"/>
                                Resección interesfinteriana</label>
                            
                                <label class="labelCheck" for="Tipo_Reseccion_interesfinteriana">
                                    <input type="checkbox" id="Tipo_Reseccion_interesfinteriana" name="Tipo_Reseccion_interesfinteriana" value="1"/>
                                Tipo Resección interesfinteriana</label>
                            
                                <label class="labelCheck" for="Reseccion_organos_vecinos_proyecto">
                                    <input type="checkbox" id="Reseccion_organos_vecinos_proyecto" name="Reseccion_organos_vecinos_proyecto" value="1"/>
                                Resección órganos vecinos proyecto</label>
                            
                                <label class="labelCheck" for="Tipo_Reseccion_organos">
                                    <input type="checkbox" id="Tipo_Reseccion_organos" name="Tipo_Reseccion_organos" value="1"/>
                                Tipo Resección órganos</label> 
                            
                                <label class="labelCheck" for="Reseccion_organo_vagina">
                                    <input type="checkbox" id="Reseccion_organo_vagina" name="Reseccion_organo_vagina" value="1"/>
                                Resección vagina</label>    
                            
                            <label class="labelCheck" for="Reseccion_organo_prostata">
                                    <input type="checkbox" id="Reseccion_organo_prostata" name="Reseccion_organo_prostata" value="1"/>
                                Resección próstata</label>    
                            
                            <label class="labelCheck" for="Reseccion_organo_seminales">
                                    <input type="checkbox" id="Reseccion_organo_seminales" name="Reseccion_organo_seminales" value="1"/>
                                 Resección seminales </label>    
                            
                            <label class="labelCheck" for="Reseccion_organo_vejiga">
                                    <input type="checkbox" id="Reseccion_organo_vejiga" name="Reseccion_organo_vejiga" value="1"/>
                                Resección vejiga</label>    
                            
                            <label class="labelCheck" for="Reseccion_organo_utero">
                                    <input type="checkbox" id="Reseccion_organo_utero" name="Reseccion_organo_utero" value="1"/>
                                Resección útero</label>    
                            
                            
                            
                            
                            <label class="labelCheck" for="Dehiscencia_sutura_proyecto">
                                    <input type="checkbox" id="Dehiscencia_sutura_proyecto" name="Dehiscencia_sutura_proyecto" value="1"/>
                                Dehiscencia sutura proyecto</label> 
                            
                            <label class="labelCheck" for="Absceso_pelvico_proyecto">
                                    <input type="checkbox" id="Absceso_pelvico_proyecto" name="Absceso_pelvico_proyecto" value="1"/>
                                Absceso pelvico proyecto</label> 
                                
                                <label class="labelCheck" for="OtrasResecciones">
                                    <input type="checkbox" id="OtrasResecciones" name="OtrasResecciones" value="1"/>
                                Otras resecciones</label>
                                
                                <label class="labelCheck" for="ASA">
                                    <input type="checkbox" id="ASA" name="ASA" value="1"/>
                                ASA</label>
                                
                                <label class="labelCheck" for="Hallazgos">
                                    <input type="checkbox" id="Hallazgos" name="Hallazgos" value="1"/>
                                Hallazgos</label>
                                
                                <label class="labelCheck" for="Perforacion">
                                    <input type="checkbox" id="Perforacion" name="Perforacion" value="1"/>
                                Perforacion</label>
                                
                                <label class="labelCheck" for="MetastasisHepaticas">
                                    <input type="checkbox" id="MetastasisHepaticas" name="MetastasisHepaticas" value="1"/>
                                MetastasisHepaticas</label>
                                
                                <label class="labelCheck" for="ImpOvaricos">
                                    <input type="checkbox" id="ImpOvaricos" name="ImpOvaricos" value="1"/>
                                Implantes ováricos</label>
                                
                                <label class="labelCheck" for="Obstruccion">
                                    <input type="checkbox" id="Obstruccion" name="Obstruccion" value="1"/>
                                Obstrucción</label>


                            </dt>
                            <dd>
                                <label class="labelCheck" for="ViaOperacion">
                                    <input type="checkbox" id="ViaOperacion" name="ViaOperacion" value="1"/>
                                Vía operación</label>
                                
                                <label class="labelCheck" for="TiempoOperacion">
                                    <input type="checkbox" id="TiempoOperacion" name="TiempoOperacion" value="1"/>
                                Tiempo operación</label>
                                
                                <label class="labelCheck" for="Transfusiones">
                                    <input type="checkbox" id="Transfusiones" name="Transfusiones" value="1"/>
                                Transfusiones</label>

                                <label class="labelCheck" for="Intencion">
                                    <input type="checkbox" id="Intencion" name="Intencion" value="1"/>
                                Intención</label>
                                
                                <label class="labelCheck" for="Anastomosis">
                                    <input type="checkbox" id="Anastomosis" name="Anastomosis" value="1"/>
                                Anastomosis</label>
                                
                                <label class="labelCheck" for="Reservorio">
                                    <input type="checkbox" id="Reservorio" name="Reservorio" value="1"/>
                                Reservorio</label>
                                
                                <label class="labelCheck" for="Estoma">
                                    <input type="checkbox" id="Estoma" name="Estoma" value="1"/>
                                Estoma de derivación</label>
                                
                                <label class="labelCheck" for="TipoEstoma">
                                    <input type="checkbox" id="TipoEstoma" name="TipoEstoma" value="1"/>
                                Tipo estoma de derivación</label>
                                
                                                 
                            </dd>
                        </dl>
                       
                          
                        <strong>Complicaciones</strong>
                        <div class="btn-group" style="float: right;">
                          <button type="button" id="seleccionarTodoComplicaciones" class="btn btn-inverse">Seleccionar todo</button>
                          <button type="button" id="deshabilitarTodoComplicaciones" class="btn">Deshabilitar todo</button>
                        </div>
                        <dl class="dl-horizontal-principal-checkbox">
                            <dt>
                                <label class="labelCheck" for="Complicaciones">
                                    <input type="checkbox" id="Complicaciones" name="Complicaciones" value="1"/>
                                Complicaciones</label>
                                
                                <label class="labelCheck" for="Reintervencion">
                                    <input type="checkbox" id="Reintervencion" name="Reintervencion" value="1"/>
                                Reintervención</label>
                                
                                <label class="labelCheck" for="ReintTexto">
                                    <input type="checkbox" id="ReintTexto" name="ReintTexto" value="1"/>
                                Reintervención texto</label>
                                
                              
                                    <input type="hidden" id="ExitusIntra" name="ExitusIntra" value="1"/>
                             
                                
                          
                                    <input type="hidden" id="ExitusIntraTexto" name="ExitusIntraTexto" value="1"/>
                           
                                
                                <label class="labelCheck" for="ExitusPost">
                                    <input type="checkbox" id="ExitusPost" name="ExitusPost" value="1"/>
                                Éxitus postoperatorio</label>
                                
                                <label class="labelCheck" for="ExitusPostTexto">
                                    <input type="checkbox" id="ExitusPostTexto" name="ExitusPostTexto" value="1"/>
                                Éxitus postoperatorio texto</label>
                                
                                <label class="labelCheck" for="GSepsis">
                                    <input type="checkbox" id="GSepsis" name="GSepsis" value="1"/>
                                Sepsis</label>
                                
                                <label class="labelCheck" for="GShock">
                                    <input type="checkbox" id="GShock" name="GShock" value="1"/>
                                Shock</label>
                                
                                <label class="labelCheck" for="HHemo">
                                    <input type="checkbox" id="HHemo" name="HHemo" value="1"/>
                                Herida hemorragia</label>
                                
                                <label class="labelCheck" for="HInfec">
                                    <input type="checkbox" id="HInfec" name="HInfec" value="1"/>
                                Herida infección</label>
                                
                                <label class="labelCheck" for="HEvis">
                                    <input type="checkbox" id="HEvis" name="HEvis" value="1"/>
                                Herida evisceración</label>
                                
                                <label class="labelCheck" for="HEvent">
                                    <input type="checkbox" id="HEvent" name="HEvent" value="1"/>
                                Herida eventración</label>
                                
                                <label class="labelCheck" for="PInfec">
                                    <input type="checkbox" id="PInfec" name="PInfec" value="1"/>
                                Periné infección</label>
                                
                                <label class="labelCheck" for="PCicat">
                                    <input type="checkbox" id="PCicat" name="PCicat" value="1"/>
                                Periné retraso cicatrización</label>
                                
                                <label class="labelCheck" for="PHernia">
                                    <input type="checkbox" id="PHernia" name="PHernia" value="1"/>
                                Periné hernia</label>
                                
                                <label class="labelCheck" for="AHemop">
                                    <input type="checkbox" id="AHemop" name="AHemop" value="1"/>
                                Abdominales hemoperitoneo</label>
                                
                                <label class="labelCheck" for="APerit">
                                    <input type="checkbox" id="APerit" name="APerit" value="1"/>
                                Abdominales perit. difusas</label>
                                
                                <label class="labelCheck" for="AAbsce">
                                    <input type="checkbox" id="AAbsce" name="AAbsce" value="1"/>
                                Abdominales abceso abdominal</label>
                              <!--  
                                <label class="labelCheck" for="AHemoAbdo">
                                    <input type="checkbox" id="AHemoAbdo" name="AHemoAbdo" value="1"/>
                                Abdominales hemorragia abdominal</label>
                                -->
                                <label class="labelCheck" for="AAbscePel">
                                    <input type="checkbox" id="AAbscePel" name="AAbscePel" value="1"/>
                                Abdominales abceso pélvico</label>
                                
                                <label class="labelCheck" for="AHemoPel">
                                    <input type="checkbox" id="AHemoPel" name="AHemoPel" value="1"/>
                                Abdominales hemorragia pélvica</label>
                                
                                <label class="labelCheck" for="AIsque">
                                    <input type="checkbox" id="AIsque" name="AIsque" value="1"/>
                                Abdominales isquemia intestinal</label>
                                
                                <label class="labelCheck" for="AColec">
                                    <input type="checkbox" id="AColec" name="AColec" value="1"/>
                                Abdominales colecistitis</label>
                                
                                <label class="labelCheck" for="AIatro">
                                    <input type="checkbox" id="AIatro" name="AIatro" value="1"/>
                                Abdominales iatrog. vías macizas</label>
                                
                                <label class="labelCheck" for="AIatroHuecas">
                                    <input type="checkbox" id="AIatroHuecas" name="AIatroHuecas" value="1"/>
                                Abdominales iatrog. vías huecas</label>
                                
                                
                                <label class="labelCheck" for="AIleopa">
                                    <input type="checkbox" id="AIleopa" name="AIleopa" value="1"/>
                                Abdominales ileo paralítico prolongado</label>
                                
                                <label class="labelCheck" for="IleoMec">
                                    <input type="checkbox" id="IleoMec" name="IleoMec" value="1"/>
                                Abdominales ileo mecánico</label>
                                
                                <label class="labelCheck" for="AEstoma">
                                    <input type="checkbox" id="AEstoma" name="AEstoma" value="1"/>
                                Abdominales estoma</label>
																

                            </dt>
                            <dd>
                            	
                                <label class="labelCheck" for="AnHemo">
                                    <input type="checkbox" id="AnHemo" name="AnHemo" value="1"/>
                                Anastomosis hemorragia</label>
                                
                                <label class="labelCheck" for="AnFuga">
                                    <input type="checkbox" id="AnFuga" name="AnFuga" value="1"/>
                                Anastomosis fuga anastomótica</label>
                                
                                <label class="labelCheck" for="AnFistula">
                                    <input type="checkbox" id="AnFistula" name="AnFistula" value="1"/>
                                Anastomosis fístula rectovaginal</label>
                                
                                <label class="labelCheck" for="OHemo">
                                    <input type="checkbox" id="OHemo" name="OHemo" value="1"/>
                                Otras hemo. diges</label>
                                
                                <label class="labelCheck" for="OUrologicas">
                                    <input type="checkbox" id="OUrologicas" name="OUrologicas" value="1"/>
                                Otras urológicas mecánicas</label>
                                
                                <label class="labelCheck" for="OInfur">
                                    <input type="checkbox" id="OInfur" name="OInfur" value="1"/>
                                Otras urológicas infección</label>
                                
                                <label class="labelCheck" for="ORespi">
                                    <input type="checkbox" id="ORespi" name="ORespi" value="1"/>
                                Otras respiratorias mecánicas</label>
                                
                                <label class="labelCheck" for="ORespiInfecc">
                                    <input type="checkbox" id="ORespiInfecc" name="ORespiInfecc" value="1"/>
                                Otras respiratorias infecciosas</label>
                                  
                                <label class="labelCheck" for="OHepat">
                                    <input type="checkbox" id="OHepat" name="OHepat" value="1"/>
                                Otras hepática</label>
                                
                                <label class="labelCheck" for="OVascuMec">
                                    <input type="checkbox" id="OVascuMec" name="OVascuMec" value="1"/>
                                Otras vascular mecánicas</label>
                                
                                <label class="labelCheck" for="OVascuInfecc">
                                    <input type="checkbox" id="OVascuInfecc" name="OVascuInfecc" value="1"/>
                                Otras vascular infecciosas</label>                                
                                
                                
                                <label class="labelCheck" for="OFMO">
                                    <input type="checkbox" id="OFMO" name="OFMO" value="1"/>
                                Otras F.M.O.</label>
                                
                                <label class="labelCheck" for="OTEP">
                                    <input type="checkbox" id="OTEP" name="OTEP" value="1"/>
                                Otras T.E.P.</label>
                                
                                <label class="labelCheck" for="ONeuro">
                                    <input type="checkbox" id="ONeuro" name="ONeuro" value="1"/>
                                Otras neurológicas</label>
                                
                                <label class="labelCheck" for="ORenal">
                                    <input type="checkbox" id="ORenal" name="ORenal" value="1"/>
                                Otras renal</label>

								<label class="labelCheck" for="OCardio">
                                    <input type="checkbox" id="OCardio" name="OCardio" value="1"/>
                                Otras cardiovascular</label>
								
                                
                               
                            </dd>
                        </dl>
                    </div><!--/row-fluid-->
                </div><!--/hero-unit-->
                
                <!-- ****************************    Anatomía patológica  *******************************************-->  
               
                <a name="AnatPatol">&nbsp;</a>
                <br />
                <br />
                <h3>ANATOMÍA PATOLÓGIA</h3>
                <div class="hero-unit">
                    <div class="row-fluid">  
                        <div class="btn-group" style="float: right;">
                          <button type="button" id="seleccionarTodoAnatPatol" class="btn btn-inverse">Seleccionar todo</button>
                          <button type="button" id="deshabilitarTodoAnatPatol" class="btn">Deshabilitar todo</button>
                        </div>
                        <br />
                        <dl class="dl-horizontal-principal-checkbox">
                            <dt>
                            	<label class="labelCheck" for="Tipo_Histologico">
                                    <input type="checkbox" id="Tipo_Histologico" name="Tipo_Histologico" value="1"/>
                                Tipo histológico</label>
                                
                                <label class="labelCheck" for="Otros_Histologico">
                                    <input type="checkbox" id="Otros_Histologico" name="Otros_Histologico" value="1"/>
                                Otros tipos histológico</label>
                            	
                                <label class="labelCheck" for="ApT">
                                    <input type="checkbox" id="ApT" name="ApT" value="1"/>
                                ApT</label>
                                
                                <label class="labelCheck" for="ApN">
                                    <input type="checkbox" id="ApN" name="ApN" value="1"/>
                                ApN</label>
                                
                                <label class="labelCheck" for="ApM">
                                    <input type="checkbox" id="ApM" name="ApM" value="1"/>
                                ApM</label>
                                
                                <label class="labelCheck" for="GangliosAis">
                                    <input type="checkbox" id="GangliosAis" name="GangliosAis" value="1"/>
                                Ganglios aislados</label>
                                
                                <label class="labelCheck" for="GangliosAfec">
                                    <input type="checkbox" id="GangliosAfec" name="GangliosAfec" value="1"/>
                                Ganglios afectados</label>
                                
                                <label class="labelCheck" for="EstadioPatologico">
                                    <input type="checkbox" id="EstadioPatologico" name="EstadioPatologico" value="1"/>
                                Estadio patológico</label>

                            </dt>
                            <dd>
                                <label class="labelCheck" for="MargenDistal">
                                    <input type="checkbox" id="MargenDistal" name="MargenDistal" value="1"/>
                                Margen distal</label>
                                
                                <label class="labelCheck" for="MargenCircun">
                                    <input type="checkbox" id="MargenCircun" name="MargenCircun" value="1"/>
                                Margen circunferencial</label>
                                
                                <label class="labelCheck" for="TipoRes">
                                    <input type="checkbox" id="TipoRes" name="TipoRes" value="1"/>
                                Tipo resección</label>
                                
                                <label class="labelCheck" for="Regresion">
                                    <input type="checkbox" id="Regresion" name="Regresion" value="1"/>
                                Regresión</label>
                                
                                <label class="labelCheck" for="MesoCal">
                                    <input type="checkbox" id="MesoCal" name="MesoCal" value="1"/>
                                Calidad mesorrecto</label>
                                
                                <label class="labelCheck" for="Estadio_Tumor_Sincronico">
                                    <input type="checkbox" id="Estadio_Tumor_Sincronico" name="Estadio_Tumor_Sincronico" value="1"/>
                                Estadío tumor sincrónico</label>
                                
                                                 
                            </dd>
                        </dl>

                     </div><!--/row-fluid-->
                </div><!--/hero-unit-->
                
                
                 <!-- ****************************  Seguimiento  *******************************************-->  
               
                <a name="Seguimiento">&nbsp;</a>
                <br />
                <br />
                <h3>SEGUIMIENTO</h3>
                <div class="hero-unit">
                    <div class="row-fluid">
                        
                        <div class="btn-group" style="float: right;">
                          <button type="button" id="seleccionarTodoSeguimiento" class="btn btn-inverse">Seleccionar todo</button>
                          <button type="button" id="deshabilitarTodoSeguimiento" class="btn">Deshabilitar todo</button>
                        </div>
                        
                        <br />
                       
                        <dl class="dl-horizontal-principal-checkbox">
                            <dt>
                                <label class="labelCheck" for="Recidiva">
                                    <input type="checkbox" id="Recidiva" name="Recidiva" value="1"/>
                                Recidiva</label>
                                
                                <label class="labelCheck" for="FechaRecidiva">
                                    <input type="checkbox" id="FechaRecidiva" name="FechaRecidiva" value="1"/>
                                Fecha recidiva</label>
                                
                                <label class="labelCheck" for="Localizacion_Recidiva">
                                    <input type="checkbox" id="Localizacion_Recidiva" name="Localizacion_Recidiva" value="1"/>
                                Localización recidiva</label>
                                
                                <label class="labelCheck" for="Intervencion_Recidiva">
                                    <input type="checkbox" id="Intervencion_Recidiva" name="Intervencion_Recidiva" value="1"/>
                                Intervención recidiva</label>
                            
                                
                            
                                <label class="labelCheck" for="Tratamiento_recidiva_local">
                                    <input type="checkbox" id="Tratamiento_recidiva_local" name="Tratamiento_recidiva_local" value="1"/>
                                Tratamiento recidiva local</label>
                            
                                 <label class="labelCheck" for="Cirugia_recidiva_curativa">
                                    <input type="checkbox" id="Cirugia_recidiva_curativa" name="Cirugia_recidiva_curativa" value="1"/>
                                Cirugía recidiva curativa</label>                           
                            
                                <label class="labelCheck" for="tipo_cirugia_recidiva_local">
                                    <input type="checkbox" id="tipo_cirugia_recidiva_local" name="tipo_cirugia_recidiva_local" value="1"/>
                                Tipo cirugía recidiva local</label>
                                
                            
                            
                                
                                <label class="labelCheck" for="Metastasis">
                                    <input type="checkbox" id="Metastasis" name="Metastasis" value="1"/>
                                Metastasis</label>
                                
                                <label class="labelCheck" for="FechaMetastasis">
                                    <input type="checkbox" id="FechaMetastasis" name="FechaMetastasis" value="1"/>
                                Fecha metastasis</label>
                                
                                <label class="labelCheck" for="Localizacion_Metastasis">
                                    <input type="checkbox" id="Localizacion_Metastasis" name="Localizacion_Metastasis" value="1"/>
                                Localización metástasis</label>
                                
                                <label class="labelCheck" for="Intervencion_Metastasis">
                                    <input type="checkbox" id="Intervencion_Metastasis" name="Intervencion_Metastasis" value="1"/>
                                Intervención metástasis</label>

                            </dt>
                            <dd>
                            	<label class="labelCheck" for="SegundoTumor">
                                    <input type="checkbox" id="SegundoTumor" name="SegundoTumor" value="1"/>
                                Segundo tumor</label>
                                
                            	<label class="labelCheck" for="FechaSegundoTumor">
                                    <input type="checkbox" id="FechaSegundoTumor" name="FechaSegundoTumor" value="1"/>
                                Fecha segundo tumor</label>
                                
                                <label class="labelCheck" for="Localizacion_Segundo_Tumor">
                                    <input type="checkbox" id="Localizacion_Segundo_Tumor" name="Localizacion_Segundo_Tumor" value="1"/>
                                Localización segundo tumor</label>
                                
                                <label class="labelCheck" for="Intervencion_Segundo_Tumor">
                                    <input type="checkbox" id="Intervencion_Segundo_Tumor" name="Intervencion_Segundo_Tumor" value="1"/>
                                Intervención segundo tumor</label>
                                
                                <label class="labelCheck" for="EstadoPaciente">
                                    <input type="checkbox" id="EstadoPaciente" name="EstadoPaciente" value="1"/>
                                Estado paciente</label>
                                
                               <label class="labelCheck" for="CausaMuerte">
                                    <input type="checkbox" id="CausaMuerte" name="CausaMuerte" value="1"/>
                                Causa muerte</label>
                                
                                <label class="labelCheck" for="FechaMuerte">
                                    <input type="checkbox" id="FechaMuerte" name="FechaMuerte" value="1"/>
                                Fecha muerte</label>
                                
                                <label class="labelCheck" for="FechaUltimaVisita">
                                    <input type="checkbox" id="FechaUltimaVisita" name="FechaUltimaVisita" value="1"/>
                                Fecha última visita</label>
                                
                                <label class="labelCheck" for="ImposibilidadSeguimiento">
                                    <input type="checkbox" id="ImposibilidadSeguimiento" name="ImposibilidadSeguimiento" value="1"/>
                                Imposibilidad seguimiento</label>
                                
                                <label class="labelCheck" for="Causa_Imposibilidad">
                                    <input type="checkbox" id="Causa_Imposibilidad" name="Causa_Imposibilidad" value="1"/>
                                Causa imposibilidad</label>
                                                                
                                <label class="labelCheck" for="MesesSeguimiento">
                                    <input type="checkbox" id="MesesSeguimiento" name="MesesSeguimiento" value="1"/>
                                Meses seguimiento</label>
                                
                                <label class="labelCheck" for="Comentarios_Adicionales">
                                    <input type="checkbox" id="Comentarios_Adicionales" name="Comentarios_Adicionales" value="1"/>
                                Comentarios adicionales</label>                 
                            </dd>
                        </dl>

                     </div><!--/row-fluid-->
                </div><!--/hero-unit-->
        </div><!-- span10 -->
        
     
    </div> <!-- /container -->

   </form>
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
    
    
 <!--**************************   Propias    ******************** -->
    <script src="estadisticaGeneral_js.js"></script>
    

    
  </body>
</html>

<?php
}
?>