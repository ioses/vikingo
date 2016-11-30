<?php
session_start();
require_once ("../../BDD/conexion.php");
require_once("Carga_Datos_Cirugia.php");


if (!isset($_SESSION["NombreHospital"])){

    header("Location: ../../login/Sign_In.php?var=Caduca"); 
    
}else{

?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Proyecto Vikingo::Cirugía</title>
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
    
    <div class="container-fluid">
         <!-- ****************************    Barra lateral  *******************************************-->
        <div class="span2">
            <ul class="nav nav-list bs-docs-sidenav affix">
                <div class="accordion well sidebar-nav">
                    <div class="accordion-group">  
                        <div class="accordion-heading">  
                            <a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2"  onclick="abrir('../Inicial/Inicial.php');" href="#collapseOne">  
                              Inicial  
                            </a>  
                        </div>  <!-- accordion-heading  -->
                        <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">  
                        
                        </div>  <!-- collapseOne  -->
                    </div>  <!-- accordion-group  -->
                
                    <div class="accordion-group">  
                        <div class="accordion-heading">  
                            <a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('../Tratamiento/Tratamiento.php');" href="#collapseTwo">  
                            Tratamiento  
                            </a>  
                        </div>  <!-- accordion-heading  -->
                        <div id="collapseTwo" class="accordion-body collapse" style="height: 0px; ">  
                            
                        </div>  <!-- accordion-body collapse  -->
                    </div> <!-- accordion-group  -->
                
                    <div class="accordion-group">  
                        <div class="accordion-heading">  
                            <a class="accordion-toggle nav-header" data-toggle="collapse" data-parent="#accordion2" onclick="abrir('<?php if ($_SESSION["B_Tto_Neo"] == 2 && $_SESSION["tipo_no_neo"] == 3){echo("../Cirugia/Salto_Cirugia.php");}else{echo("../Cirugia/Cirugia.php");}?>');" href="#collapseThree">  
                              Cirugía
                              <i class="icon-chevron-right icon-white" style="margin-right: -6px; float: right; margin-top: 7px;"></i> 
                            </a>  
                        </div>  <!-- accordion-heading -->
                        <div id="collapseThree" class="accordion-body">  
                            <div class="accordion-inner">  
                                <li><a href="#Cirugia">Cirugía</a></li>
                                <li><a href="#Resultados">Resultados</a></li>
                                <li><a href="#Caracteristicas">Características</a></li>
                                <li><a href="#Complicaciones">Complicaciones</a></li>   
                            </div>  <!-- accordion-inner -->
                        </div> <!-- accordion-body collapse -->
                    </div> <!-- accordion-group -->
                </div><!--/.accordion well sidebar-nav -->
            </ul><!--menuFloat-->
        </div><!--/span2-->
        
        <!-- ****************************    Contenido  *******************************************-->
        <div class="span10" name="general" >
            <form name="Cirugia" id="Cirugia" method="post" action="IntroducirDatosCirugia.php" onsubmit="return CheckObligatorias();">
            
                <!-- ****************************    Cirugía  *******************************************-->
                <a name="Cirugia">&nbsp;</a>
                <br />
                <br />
                <h3>Cirugía</h3>
                <div class="hero-unit">
                    <div class="row-fluid">
                        <dl class="dl-horizontal-principal-pequeno">
                            
                            <!--********* Cirugia No***********-->
                            <dt>
                                <label for="B_Cirugia_No">
                                    <input type="radio" name="B_Cirugia" id="B_Cirugia_No" value="2" required onclick="HabilitaCirugia();" />
                               <span style="font-size: 1.5em">No</span></label>
                            </dt>
                            
                            <dd>
                                <dl class="dl-horizontal-principal-mediano" style="margin-top: 50px;">
                                    <dt>
                                        <label>Motivo</label>
                                    </dt>
                                    <dd>
                                        <?php
                                            $res=mysqli_query($conexion,$Motivos_No_Cirugia);    
                                        ?>
                                        <select id="Motivos_No_Cirugia" name="Motivos_No_Cirugia" required disabled>
                                            <?php
                                                while ($row=mysqli_fetch_array($res)) {
                                            ?>
                                                    
                                                    <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                                    
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </dd>
                                    
                                </dl>
                            </dd>
                            
                            
                            <!--********* Cirugia Si***********-->
                            <dt>
                                <label for="B_Cirugia_Si">
                                    <input type="radio" name="B_Cirugia" id="B_Cirugia_Si" value="1" required onclick="HabilitaCirugia();" />
                              <span style="font-size: 1.5em">Si</span></label>
                            </dt>
                            <dd>
                               

                                <dl class="dl-horizontal-principal-mediano" style="margin-top: 50px;">
                            
                                    <dt>
                                        <label class="negrita">Tipo</label>
                                    </dt>
                                    <dd>
                                        <label for="Tipo_Cirugia_Electiva">
                                            <input type="radio" name="Tipo_Cirugia" id="Tipo_Cirugia_Electiva" value="1" required disabled />
                                        Electiva</label>
                                        
                                        <label for="Tipo_Cirugia_Urgente">
                                            <input type="radio" name="Tipo_Cirugia" id="Tipo_Cirugia_Urgente" value="2" required disabled />
                                        Urgente</label>
                                    </dd>
                                    <dt>
                                        <label class="negrita">Fecha</label>
                                    </dt>
                                    <dd>
                                        <dl class="dl-horizontal-secundario-mediano margen-bottom margen-top">
                                            <dt>
                                               <label>Intervención</label>
                                            </dt>
                                            <dd>
                                                <input type="date" id="Fecha_Intervencion" name="Fecha_Intervencion" placeholder="aaaa-mm-dd" required disabled />                
                                            </dd>
                                            <dt>
                                                <label>Alta</label>
                                            </dt>
                                            <dd>
                                                <input type="date" id="Fecha_Alta" name="Fecha_Alta" placeholder="aaaa-mm-dd" required  disabled/>
                                                <label for="rellenarAlta">
                                                    <input type="checkbox" id="rellenarAlta" name="rellenarAlta" disabled />
                                                &nbsp;Introducir alta más adelante</label>                    
                                            </dd>
                                        </dl>
                                    </dd>
                                
                                    <dt>
                                        <label class="negrita">Cirujanos</label>
                                    </dt>
                                    <dd>
                                        <dl class="dl-horizontal-secundario-mediano margen-bottom margen-top">
                                            <dt>
                                                <label>Principal</label>
                                            </dt>
                                            <dd>
                                                <input type="text" id="Cirujano_Principal" name="Cirujano_Principal" required disabled autocomplete="off" />               
                                            </dd>
                                            
                                            <dt>
                                                <label>Ayudante</label>
                                            </dt>
                                            <dd>
                                                <input type="text" id="Cirujano_Ayudante" name="Cirujano_Ayudante" required disabled autocomplete="off" />
                                            </dd>
                                        </dl>
                                    </dd>
                                                              
                                    <dt>
                                        <label class="negrita">Técnica</label>                        
                                    </dt>
                                    <dd>
                                        <?php
                                            $loc = $_SESSION["Localizacion"];
                                            
                                            if ($loc < 12)
                                            {
                                                $res=mysqli_query($conexion,$Tecnicas_Cirugia_Menor);
                                            }
                                            else
                                            {
                                                $res=mysqli_query($conexion,$Tecnicas_Cirugia_Mayor);
                                            }
                                                
                                        ?>
                                        <select id="Tecnicas_Cirugia" name="Tecnicas_Cirugia" required disabled  onchange="tecnicaMesorrecto();">
                                            <?php
                                                while ($row=mysqli_fetch_array($res)) {
                                            ?>
                                            <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </dd>
                                    
                           
                            
                            
                            
                            
                            

                                    <dt>
                                        <label class="negrita">Otra técnica</label>
                                    </dt>
                                    <dd>
                                        <div class="alert alert-info">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <p style="font-size: 12px; font-weight: normal; margin: 0;">Para seleccionar varias técnicas mantenga pulsada la tecla "Control"</p>
                                        </div>
                                        <?php
                                            $res=mysqli_query($conexion,$Otras_Tecnicas);    
                                        ?>
                                        <select id="Otras_Tecnicas" name="Otras_Tecnicas[]" multiple="multiple" size="6" disabled>
                                            <?php
                                                while ($row=mysqli_fetch_array($res)) {
                                            ?>
                                            <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                                    
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        
                                    </dd>
                                    
                                    
                                    <dt>
                                        <label>Orientación</label>
                                    </dt>
                                    <dd>
                                        <label for="Orient_Prono">
                                            <input type="radio" name="Orientacion" id="Orient_Prono" value="1" required disabled />
                                        Prono</label>

                                        <label for="Orient_Supino">
                                            <input type="radio" name="Orientacion" id="Orient_Supino" value="2" required disabled />
                                        Supino</label>
                                    </dd>
                                    
                                    <dt>
                                        <label class="negrita">Exéresis del mesorrecto</label>
                                    </dt>
                                    <dd>
                                        <?php
                                            $res=mysqli_query($conexion,$Tipo_Exeresis_Mesorrecto);    
                                        ?>
                                        <select id="Exeresis_Mesorrecto" name="Exeresis_Mesorrecto" required disabled>
                                            <?php
                                                while ($row=mysqli_fetch_array($res)) {
                                            ?>
                                            <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                                    
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </dd>
                                    
                                    
                            
                            
                            
                            
                     
                                    
                                    <dt>
                                        <label class="negrita">Otras resecciones viscerales</label>
                                    </dt>
                                    <dd>
                                        <label for="Otras_Resecciones_NO">
                                            <input type="radio" name="Otras_Resecciones" id="Otras_Resecciones_NO" value="2" required disabled onclick="HabilitaReseVisc();" />
                                        No</label>
                                        <label for="Otras_Resecciones_SI">
                                            <input type="radio" name="Otras_Resecciones" id="Otras_Resecciones_SI" value="1" required disabled onclick="HabilitaReseVisc();" />
                                        Si</label>
                                        
                           
                            
                                        
                                        <dl class="dl-horizontal-secundario-mediano-checkbox">
                                            <dt>
                                                <label class="labelCheck" for="Res_Seminales">
                                                    <input type="checkbox" name="Res_Seminales" id="Res_Seminales" value="1" disabled />
                                                Seminales</label>
                                                
                                                <label class="labelCheck" for="Res_Peritoneo">
                                                    <input type="checkbox" name="Res_Peritoneo" id="Res_Peritoneo" value="2" disabled />
                                                Peritoneo</label>
                                                
                                                <label class="labelCheck" for="Res_Vejiga">
                                                    <input type="checkbox" name="Res_Vejiga" id="Res_Vejiga" value="3" disabled />
                                                Vejiga</label>
                                                
                                                <label class="labelCheck" for="Res_Utero">
                                                    <input type="checkbox" name="Res_Utero" id="Res_Utero" value="4" disabled />
                                                Útero</label>
                                                
                                                <label class="labelCheck" for="Res_Vagina">
                                                    <input type="checkbox" name="Res_Vagina" id="Res_Vagina" value="5" disabled />
                                                Vagina</label>
                                                
                                                <label class="labelCheck" for="Res_Prostata">
                                                    <input type="checkbox" name="Res_Prostata" id="Res_Prostata" value="6" disabled />
                                                Próstata</label>
                                                
                                                <label class="labelCheck" for="Res_Hepatica">
                                                    <input type="checkbox" name="Res_Hepatica" id="Res_Hepatica" value="13" disabled />
                                                Hepática</label>
                                            </dt>
                                            <dd>
                                                <label class="labelCheck" for="Res_IDelgado">
                                                    <input type="checkbox" name="Res_IDelgado" id="Res_IDelgado" value="7" disabled />
                                                I. delgado</label>
                                                
                                                <label class="labelCheck" for="Res_Coccix">
                                                    <input type="checkbox" name="Res_Coccix" id="Res_Coccix" value="8" disabled />
                                                Coccix</label>
                                                
                                                <label class="labelCheck" for="Res_Sacro">
                                                    <input type="checkbox" name="Res_Sacro" id="Res_Sacro" value="9" disabled />
                                                Sacro</label>
                                                
                                                <label class="labelCheck" for="Res_Ureter">
                                                    <input type="checkbox" name="Res_Ureter" id="Res_Ureter" value="10" disabled />
                                                Uréter</label>
                                                
                                                <label class="labelCheck" for="Res_Ovarios">
                                                    <input type="checkbox" name="Res_Ovarios" id="Res_Ovarios" value="11" disabled />
                                                Ovarios</label>
                                                
                                                <label class="labelCheck" for="Res_Trompas">
                                                    <input type="checkbox" name="Res_Trompas" id="Res_Trompas" value="12" disabled />
                                                Trompas</label>
                                            </dd>
                                        </dl>                               
                                    </dd>    
                                    <input type="hidden" id="SexoInicial" name="SexoInicial" value="<?php echo($_SESSION["Sexo"]); ?>" />
                                </dl>
                            </dd>
                        </dl>
                    </div> <!--/row-fluid-->
                </div><!--/hero-unit-->
            
            
            
                <!-- ****************************    Resultados  *******************************************-->
                <a name="Resultados">&nbsp;</a>
                <br />
                <br />
                <h3>Resultados</h3>
                <div class="hero-unit">
                    <div class="row-fluid">
                      
                        <dl class="dl-horizontal-principal">
                            <dt>
                                <label>ASA</label>
                            </dt>
                            <dd>
                                <?php
                                    $res=mysqli_query($conexion,$Tipo_ASA);    
                                ?>
                                <select id="Tipo_ASA" name="Tipo_ASA" required disabled>
                                    <?php
                                        while ($row=mysqli_fetch_array($res)) {
                                    ?>
                                        <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </dd>
                            
                            <dt>
                                <label>Hallazgos intraoperatorios</label>
                            </dt>
                            <dd>
                                <?php
                                    $res=mysqli_query($conexion,$Tipo_Hallazgos);    
                                ?>
                                <select id="Tipo_Hallazgos" name="Tipo_Hallazgos" required disabled>
                                    <?php
                                        while ($row=mysqli_fetch_array($res)) {
                                    ?>
                                        <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                        
                                    <?php
                                        }
                                    ?>  
                                </select>
                            </dd>
                            <dt>
                                <label>Perforación tumoral</label>
                            </dt>
                            <dd>
                                <label for="Perforacion_Tumoral_Si">
                                    <input type="radio" name="Perforacion_Tumoral" id="Perforacion_Tumoral_Si" value="1" required disabled />
                                Si</label>

                                <label for="Perforacion_Tumoral_NO">
                                    <input type="radio" name="Perforacion_Tumoral" id="Perforacion_Tumoral_NO" value="0" required disabled />
                                No</label>
                            </dd>
                            
                            <dt>
                                <label>Metástasis hepáticas</label>
                            </dt>
                            <dd>
                                <?php
                                    $res=mysqli_query($conexion,$Tipo_Metastasis_Hepaticas);    
                                ?>
                                <select id="Tipo_Metast_Hepaticas" name="Tipo_Metast_Hepaticas" required disabled>
                                    <?php
                                        while ($row=mysqli_fetch_array($res)) {
                                    ?>
                                    <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                        
                                    <?php
                                        }
                                    ?>  
                                </select>
                            </dd>
                            
                            <dt>
                                <label>Implantes ováricos o peritoneales</label>
                            </dt>
                            <dd>
                                <input type="checkbox" name="Imp_Ovaricos" id="Imp_Ovaricos" value="1" disabled />
                            </dd>
                            
                            <dt>
                                <label>Obstrucción</label>
                            </dt>
                            <dd>
                                <input type="checkbox" name="Obstruccion" id="Obstruccion" value="1" disabled />
                            </dd>
                            
                        </dl>
                    </div> <!--/row-fluid-->
                </div><!--/hero-unit-->
                
                <!-- ****************************    Caracteristicas  *******************************************-->
                <a name="Caracteristicas">&nbsp;</a>
                <br />
                <br />
                <h3>Características</h3>
                <div class="hero-unit">
                    <div class="row-fluid">
                        <dl class="dl-horizontal-principal">
                            <dt>
                                <label>Vía Operación</label>
                            </dt>
                            <dd>
                                <?php
                                       
                                    $res=mysqli_query($conexion,$Tipo_Via);    
                                ?>
                                <select id="Tipo_Via" name="Tipo_Via" required disabled>
                                    <?php
                                        while ($row=mysqli_fetch_array($res)) {
                                    ?>
                                        <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                        
                                    <?php
                                        }
                                    ?>
                                </select>
                            </dd>
                            
                            <dt>
                                <label>Tiempo Operación (min.)</label>
                            </dt>
                            <dd>
                                <input type="text" name="Tiempo_Operacion" id="Tiempo_Operacion" disabled pattern="[0-9]+" autocomplete="off" placeholder="Introduzca un número entero" />
                            </dd>
                            
                            <dt>
                                <label>Transfusiones (Uds.)</label>
                            </dt>
                            <dd>
                                <input type="text" name="Transfusion" id="Transfusion" required disabled pattern="[0-9]+" autocomplete="off" placeholder="Introduzca un número entero" />
                            </dd>
                            
                            <dt>
                                <label>Intención operatoria</label>
                            </dt>
                            <dd>
                                <?php
                                    $res=mysqli_query($conexion,$Tipo_Intencion);    
                                ?>
                                <select id="Tipo_Intencion" name="Tipo_Intencion" required disabled>
                                    <?php
                                        while ($row=mysqli_fetch_array($res)) {
                                    ?>
                                        
                                        <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                        
                                    <?php
                                        }
                                    ?>
                                </select>
                            </dd>
                            
                            <dt>
                                <label>Anastomosis</label>
                            </dt>
                            <dd>
                                <?php
                                    $res=mysqli_query($conexion,$Tipo_Anastomosis);    
                                ?>
                                <select id="Tipo_Anastomosis" name="Tipo_Anastomosis" required disabled">
                                    <?php
                                        while ($row=mysqli_fetch_array($res)) {
                                    ?>
                                        <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                        
                                    <?php
                                        }
                                    ?>
                                </select>
                            </dd>
                            
                            <dt>
                                <label>Reservorio</label>
                            </dt>
                            <dd>
                                <?php
                                       
                                        $res=mysqli_query($conexion,$Tipo_Reservorio);    
                                    ?>
                                <select id="Tipo_Reservorio" name="Tipo_Reservorio" required disabled>
                                    <?php
                                        while ($row=mysqli_fetch_array($res)) {
                                    ?>
                                        
                                        <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                        
                                    <?php
                                        }
                                    ?>
                                    
                                </select>
                            </dd>
                            
                            <dt>
                                <label>Estoma derivación</label>
                            </dt>
                            <dd>
                                <label for="Radio_Tipo_Estoma_NO">
                                    <input type="radio" id="Radio_Tipo_Estoma_NO" name="Radio_Tipo_Estoma" value="2" required disabled onclick="HabilitaEstoma();" />
                                No</label>
                                <label for="Radio_Tipo_Estoma_SI">
                                    <input type="radio" id="Radio_Tipo_Estoma_SI" name="Radio_Tipo_Estoma" value="1" required disabled onclick="HabilitaEstoma();" />
                                Si</label>
                                <?php
                                    $res=mysqli_query($conexion,$Tipo_Estoma_1);    
                                ?>
                                <select id="Tipo_Estoma" name="Tipo_Estoma" required disabled class="labelCheck">
                                    <?php
                                        while ($row=mysqli_fetch_array($res)) {
                                    ?>
                                        
                                        <option value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></option>
                                        
                                    <?php
                                        }
                                    ?>
                                </select>
                            </dd>
                        </dl>       
                    </div> <!--/row-fluid-->
                </div><!--/hero-unit-->
            
        
    <!-------------------COMPLICACIONES----------------------------------------------------------------------->     
            
            
            
                <a name="Complicaciones">&nbsp;</a>
                <br />
                <br />
                <h3>Complicaciones</h3>
                <div class="hero-unit">
                    <div class="row-fluid">
                        
                        <dl class="dl-horizontal-principal-pequeno">
                            
                            <!--********** Complicaciones No**********-->
                            <dt>
                                <label for="B_Complicaciones_No">
                                    <input type="radio" name="B_Complicaciones" id="B_Complicaciones_No" value="2" required disabled onclick="HabilitaComplicaciones();" />
                                No</label>
                            </dt>
                            <dd>
                                <a>&nbsp;</a>
                            </dd>
                            
                            <!--********** Complicaciones Si**********-->
                            <dt>
                                <label for="B_Complicaciones_Si">
                                    <input type="radio" name="B_Complicaciones" id="B_Complicaciones_Si" value="1" required disabled onclick="HabilitaComplicaciones();" />
                                Si</label>
                            </dt>
                            
                            <dd>
                                <dl class="dl-horizontal-principal-mediano" style="margin-top: 50px;">
                                    <dt style="text-align: left;">
                                        <label for="Reintervencion">
                                            <input type="checkbox" name="Reintervencion" id="Reintervencion" value="1" disabled onclick="HabilitaTexto_Reintervencion();" />
                                        Reintervención</label>
                                    </dt>
                                    <dd>
                                        <input type="text" name="Texto_Reintervencion" id="Texto_Reintervencion" disabled required/>
                                    </dd>
                                    
                                    <dt style="text-align: left;">
                                        <label for="Exitus_Intra">
                                            <input type="checkbox" name="Exitus_Intra" id="Exitus_Intra" value="1" disabled onclick="HabilitaTexto_Exitus_Intra();"  />
                                        Exitus intraoperatorio causa</label>
                                    </dt>
                                    <dd>
                                        <input type="text" name="Texto_Exitus_Intra" id="Texto_Exitus_Intra" disabled required />
                                    </dd>
                                    
                                    <dt style="text-align: left;">
                                        <label for="Exitus_Post">
                                            <input type="checkbox" name="Exitus_Post" id="Exitus_Post" value="1" disabled onclick="HabilitaTexto_Exitus_Post();" />
                                        Exitus postoperatorio causa</label>
                                    </dt>
                                    <dd>
                                        <input type="text" name="Texto_Exitus_Post" id="Texto_Exitus_Post"  disabled required />
                                    </dd>
                                    
                                    <dt>
                                        <label class="negrita">Generales</label>
                                    </dt>
                                    <dd>
                                        <label for="Comp_Generales_Sepsis">
                                            <input type="checkbox" name="Comp_Generales_Sepsis" value="14" id="Comp_Generales_Sepsis"  disabled/>
                                        Sepsis</label>
                                        
                                        <label for="Comp_Generales_Shock">
                                            <input type="checkbox" name="Comp_Generales_Shock" value="15" id="Comp_Generales_Shock"  disabled/>
                                        Shock</label>
                                    </dd>
                                    
                                    <dt>
                                        <label class="negrita">Herida</label>
                                    </dt>
                                        <dd>
                                            <dl class="dl-horizontal-secundario-mediano-checkbox">
                                                 <dt>
                            
                                                <label for="Comp_Herida_Hemorragia">
                                                    <input type="checkbox" name="Comp_Herida_Hemorragia" value="1" id="Comp_Herida_Hemorragia"  disabled/>
                                                Hemorragia</label>
                                            
                                                <label for="Comp_Herida_Infeccion">
                                                    <input type="checkbox" name="Comp_Herida_Infeccion" value="2" id="Comp_Herida_Infeccion"  disabled/>
                                                Infección</label>
                                            
                                            </dt>
                                            <dd>
                                            
                                            
                                            <label for="Comp_Herida_Evisceracion">
                                                <input type="checkbox" name="Comp_Herida_Evisceracion" value="3" id="Comp_Herida_Evisceracion"  disabled/>
                                            Evisceración</label>
                                            
                                            <label for="Comp_Herida_Eventracion">
                                                <input type="checkbox" name="Comp_Herida_Eventracion" value="4" id="Comp_Herida_Eventracion"  disabled/>
                                            Eventración</label>
                                                    
                                            </dd>
                                        </dl>
                                    </dd>
                                    
                                    <dt>
                                        <label class="negrita">Periné</label>
                                    </dt>
                                    <dd>
                                        <label for="Comp_Perine_Infeccion">
                                            <input type="checkbox" name="Comp_Perine_Infeccion" value="1" id="Comp_Perine_Infeccion"  disabled/>
                                        Infección</label>
                                        
                                        <label for="Comp_Perine_Retraso">
                                            <input type="checkbox" name="Comp_Perine_Retraso" value="2" id="Comp_Perine_Retraso"  disabled/>
                                        Retraso cicatrización</label>
                                        
                                        <label for="Comp_Perine_Hernia">
                                                <input type="checkbox" name="Comp_Perine_Hernia" value="3" id="Comp_Perine_Hernia"  disabled/>
                                        Hernia</label>
                                            
                                    </dd>
                                    
                                    <dt>
                                        <label class="negrita">Abdominales</label>
                                    </dt>
                                    <dd>
                                        <dl class="dl-horizontal-secundario-mediano-checkbox">
                                            <dt>
                                                <label for="Comp_Abdominales_Hemoperitoneo">
                                                    <input type="checkbox" name="Comp_Abdominales_Hemoperitoneo" id="Comp_Abdominales_Hemoperitoneo" value="1" disabled/>
                                                Hemo. abdominal</label>
                                                
                                                <label for="Comp_Abdominales_Difusas">
                                                    <input type="checkbox" name="Comp_Abdominales_Difusas" id="Comp_Abdominales_Difusas" value="2" disabled/>
                                                Perit. difusas</label>
                                                
                                                
                                                <label for="Comp_Abdominales_Abcs">
                                                    <input type="checkbox" name="Comp_Abdominales_Abcs" id="Comp_Abdominales_Abcs" value="3" disabled/>
                                                Absceso abdominal</label>

                                                 <label for="Comp_Pelvico_Abcs">
                                                    <input type="checkbox" name="Comp_Pelvico_Abcs" id="Comp_Pelvico_Abcs" value="9" disabled/>
                                                Absceso pélvico</label>
                                                                                               
                                                
                                                 <label for="Comp_Pelvico_Hemo">
                                                    <input type="checkbox" name="Comp_Pelvico_Hemo" id="Comp_Pelvico_Hemo" value="11" disabled/>
                                                Hemo. pélvico</label>
                                            
                                                                                            
                                                <label for="Comp_Abdominales_Isquemia">
                                                    <input type="checkbox" name="Comp_Abdominales_Isquemia" id="Comp_Abdominales_Isquemia" value="4" disabled/>
                                                Isquemia intestinal</label>
                                            </dt>
                                            <dd>
                                                <label for="Comp_Abdominales_Colecistitis">
                                                    <input type="checkbox" name="Comp_Abdominales_Colecistitis" id="Comp_Abdominales_Colecistitis" value="5" disabled/>
                                                Colecistitis</label>
                                                
                                                <label for="Comp_Abdominales_Iatrog">
                                                    <input type="checkbox" name="Comp_Abdominales_Iatrog" id="Comp_Abdominales_Iatrog" value="6" disabled/>
                                                Iatrog. vías macizas</label>
                                                
                                                <label for="Comp_Abdominales_Iatrog_Vias_Huecas">
                                                    <input type="checkbox" name="Comp_Abdominales_Iatrog_Vias_Huecas" id="Comp_Abdominales_Iatrog_Vias_Huecas" value="12" disabled/>
                                                Iatrog. vías huecas</label>
                                                
                                                <label for="Comp_Abdominales_Ileo">
                                                    <input type="checkbox" name="Comp_Abdominales_Ileo" id="Comp_Abdominales_Ileo" value="7" disabled/>
                                                Ileo paralítico prolongado</label>
                                                
                                                <label for="Comp_Abdominales_Ileo_Mecanico">
                                                    <input type="checkbox" name="Comp_Abdominales_Ileo_Mecanico" id="Comp_Abdominales_Ileo_Mecanico" value="8" disabled/>
                                                Ileo mecánico</label>
                                                
                                                <label for="Comp_Abdominales_Estoma">
                                                    <input type="checkbox" name="Comp_Abdominales_Estoma" id="Comp_Abdominales_Estoma" value="13" disabled/>
                                                Estoma</label>
                                                
                                            </dd>
                                        </dl>
                                    </dd>
                                    
                                    <dt>
                                        <label class="negrita">Anastomosis</label>
                                    </dt>
                                    <dd>
                                        <label for="Comp_Anastomosis_Hemorragia">
                                            <input type="checkbox" name="Comp_Anastomosis_Hemorragia" id="Comp_Anastomosis_Hemorragia" value="1" disabled/>
                                        Hemorragia</label>
                                        
                                        <label for="Comp_Anastomosis_Fuga">
                                            <input type="checkbox" name="Comp_Anastomosis_Fuga" id="Comp_Anastomosis_Fuga" value="2" disabled/>
                                        Fuga anastomótica</label>
                                        
                                        <label for="Comp_Anastomosis_Fistula">
                                            <input type="checkbox" name="Comp_Anastomosis_Fistula" id="Comp_Anastomosis_Fistula" value="3" disabled/>
                                        Fístula rectovaginal</label>
                                    </dd>
                                    
                                    <dt>
                                        <label class="negrita">Otras</label>
                                    </dt>
                                    
                                    <dd>
                                        <dl class="dl-horizontal-secundario-mediano-checkbox">
                                            <dt>
                                                <label for="Comp_Otras_Hemo_Diges">
                                                    <input type="checkbox" name="Comp_Otras_Hemo_Diges" id="Comp_Otras_Hemo_Diges" value="1" disabled/>
                                                Hemo. digestivo</label>
                                                
                                                <label for="Comp_Otras_Urologicas">
                                                    <input type="checkbox" name="Comp_Otras_Urologicas" id="Comp_Otras_Urologicas" value="10" disabled/>
                                                Urológicas mec.</label>                                             
                                                                                              
                                                <label for="Comp_Otras_Inf_Urinaria">
                                                    <input type="checkbox" name="Comp_Otras_Inf_Urinaria" id="Comp_Otras_Inf_Urinaria" value="2" disabled/>
                                                Urológicas infecc.</label>
                                                                                                                                              
                                                <label for="Comp_Otras_Vascular_Mec">
                                                    <input type="checkbox" name="Comp_Otras_Vascular_Mec" id="Comp_Otras_Vascular_Mec" value="14" disabled/>
                                                Vascular mecánica</label>
                                                
                                                <label for="Comp_Otras_Vascular_Infecc">
                                                    <input type="checkbox" name="Comp_Otras_Vascular_Infecc" id="Comp_Otras_Vascular_Infecc" value="13" disabled/>
                                                Vascular infecc.</label>
                                                
                                                <label for="Comp_Otras_Hepatica">
                                                    <input type="checkbox" name="Comp_Otras_Hepatica" id="Comp_Otras_Hepatica" value="4" disabled/>
                                                Hepática</label>
                                                
                                                <label for="Comp_Otras_Renal">
                                                    <input type="checkbox" name="Comp_Otras_Renal" id="Comp_Otras_Renal" value="15" disabled/>
                                                Insuf. renal</label>
                                                
                                            </dt>
                                            <dd>
                                                <label for="Comp_Otras_Respiratoria">
                                                    <input type="checkbox" name="Comp_Otras_Respiratoria" id="Comp_Otras_Respiratoria" value="5" disabled/>
                                                Respiratoria mecánica</label>
                                                
                                                 <label for="Comp_Otras_Respiratoria_Infecc">
                                                    <input type="checkbox" name="Comp_Otras_Respiratoria_Infecc" id="Comp_Otras_Respiratoria_Infecc" value="11" disabled/>
                                                Respiratoria infecciosa</label>
                                                
                                                <label for="Comp_Otras_FMO">
                                                    <input type="checkbox" name="Comp_Otras_FMO" id="Comp_Otras_FMO" value="6" disabled/>
                                                F.M.O.</label>
                                                
                                                <label for="Comp_Otras_TEP">
                                                    <input type="checkbox" name="Comp_Otras_TEP" id="Comp_Otras_TEP" value="7" disabled/>
                                                T.E.P.</label>
                                                
                                                <label for="Comp_Otras_Neuroapraxia">
                                                    <input type="checkbox" name="Comp_Otras_Neuroapraxia" id="Comp_Otras_Neuroapraxia" value="8" disabled/>
                                                Neurológicas</label>
                                                
                                                <label for="Comp_Otras_Cardiovascular">
                                                    <input type="checkbox" name="Comp_Otras_Cardiovascular" id="Comp_Otras_Cardiovascular" value="3" disabled/>
                                                Cardiológicas</label>
                                                
                                                
                                            </dd>
                                        </dl>                               
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                            
                    </div> <!--/row-fluid-->
                </div><!--/hero-unit-->
                
      <!-------------------NUEVO PROYECTO SOLO APARECEN ALGUNOS HOSPITALES ----------------------->
       <?php
        //2016Diciembre introduccion nuevas variables para estudio 5 hospitales
        if ($Nombre=="HOSPITALPRUEBA" && $loc<7){
       ?>
        <h3>NUEVAS VARIABLES PROYECTO</h3>
        <div class="hero-unit">
            <div class="row-fluid">
                <dl class="dl-horizontal-principal">
                    <dt>
                        <label class="negrita">Tipo Anastomosis</label>
                    </dt>
                    <dd>
                        <label for="Tipo_Anastomosis_Proyecto">
                          <select id="Tipo_Anastomosis_Proyecto" name="Tipo_Anastomosis_Proyecto" style="width: 25%">
                            <option value="0"></option>
                            <option value="1">Coloanal</option>
                            <option value="2">Colorrectal ultrabaja</option>
                            <option value="3">Hartmann</option>
                          </select>
                        </label>
                    </dd>
                    <dt>
                        <label class="negrita" color="red">Anastomosis coloanal</label>
                     </dt>
                     <dd>
                      <label for="Tipo_Anastomosis_coloanal">
                         <select id="Tipo_Anastomosis_coloanal" name="Tipo_Anastomosis_coloanal" style="width: 25%">
                            <option value="0"></option>
                            <option value="1">Manual</option>
                            <option value="2">Mecánica</option>
                          </select>
                       </label>
                      </dd>
                      
                      <dt>
                        <label class="negrita" color="red">Resección interesfinteriana</label>
                       </dt>
                       <dd>
                        <label for="Reseccion_interesfinteriana">
                          <select id="Reseccion_interesfinteriana" name="Reseccion_interesfinteriana" style="width: 25%">
                              <option value="0"></option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                           </select>
                         </label>
                        </dd>                
                        <dt>
                         <label class="negrita" color="red">Tipo Resección interesfinteriana</label>
                        </dt>
                        <dd>
                          <label for="Tipo_Reseccion_interesfinteriana">
                             <select id="Tipo_Reseccion_interesfinteriana" name="Tipo_Reseccion_interesfinteriana" style="width: 25%">
                                <option value="0"></option>
                                <option value="1">Completa</option>
                                <option value="2">Parcial</option>
                              </select>
                           </label>
                         </dd>
                         <dt>
                             <label class="negrita" color="red">Resección órganos vecinos</label>
                         </dt>
                         <dd>
                             <label for="Reseccion_organos_vecinos_proyecto">
                              <select id="Reseccion_organos_vecinos_proyecto" name="Reseccion_organos_vecinos_proyecto" style="width: 25%">
                                 <option value="0"></option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                               </select>
                             </label>
                         </dd>
                         <dt>
                           <label class="negrita" color="red">Tipo Resección órganos</label>
                         </dt>
                         <dd>
                            <label for="Tipo_Reseccion_organos">
                              <select id="Tipo_Reseccion_organos" name="Tipo_Reseccion_organos" style="width: 25%">
                                 <option value="0"></option>
                                  <option value="1">Parcial</option>
                                  <option value="2">Total</option>
                               </select>
                             </label>
                          </dd>          
                    
                </dl>
            </div> 
        </div>
      
        <?php
        }else{
        ?>
          <input type="hidden" id="Tipo_Anastomosis_Proyecto" value="0"/>
          <input type="hidden" id="Tipo_Anastomosis_coloanal" value="0"/>
          <input type="hidden" id="Reseccion_interesfinteriana" value="0"/>
          <input type="hidden" id="Tipo_Reseccion_interesfinteriana" value="0"/>
          <input type="hidden" id="Tipo_Reseccion_organos" value="0"/>
        <?php
         }
         ?>   

          
          
          
            
                <button id="ButtonEnviarCirugia" type="submit" class="btn btn-primary btn-large pull-right" value="Enviar">
                    <i class="icono-forward icono-large-white"></i>
                Siguiente</button>  
            </form><!--fin formulario cirugia-->

        </div><!--span10-->

    </div><!--/container-fluid--> 
    
      
     <input type="hidden"  id="Fecha_Alta_Pendiente" name="Fecha_Alta_Pendiente" value="
     <?php
        
        if (isset($_SESSION["Fecha_Alta_Pendiente"])){
            echo ($_SESSION["Fecha_Alta_Pendiente"]);
        }else{
            echo "0";
        }
     
     ?>
     "/> 


    <!--/Condiciones recidiva--> 
    <input type="hidden" id="B_Tto_Neo" name="B_Tto_Neo" value="
    
   <?php 
            
                if (isset($_SESSION["B_Tto_Neo"])){
                    echo ($_SESSION["B_Tto_Neo"]);
                }else {
                    echo "-1";
                }
  
            ?>
   
   "/>
    
  
    <input type="hidden" id="tipo_no_neo" name="tipo_no_neo" value="
    
    
    <?php 
            
                if (isset($_SESSION["tipo_no_neo"])){
                    echo ($_SESSION["tipo_no_neo"]);
                }else {
                    echo "-1";
                }
  
            ?>

    
    "/>
    
     <input type="hidden" id="localiz" name="localiz" value="
    
    
    <?php 
            
                if (isset($_SESSION["Localizacion"])){
                    echo ($_SESSION["Localizacion"]);
                }else {
                    echo "-1";
                }
  
            ?>

    
    "/>
    
    
     <!-- Condición para la carga de datos (Si han entrado antes o no)-->
    <input type="hidden"  id="EnviarCirugia" name="EnviarCirugia" value="
    
    
        <?php 
            
                if (isset($_SESSION["ButtonEnviarCirugia"])){
                    echo ($_SESSION["ButtonEnviarCirugia"]);
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
    <script src="cirugia_js.js"></script>
    
  </body>
</html>

<?php
}
?>
