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
    
    
    <link rel="stylesheet" href="informes_css.css" />
        
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




   <div class="container-fluid">
        <div class="span2 bs-docs-sidebar">
            <ul class="nav nav-list bs-docs-sidenav affix">
                <li>
                    <a href="#General">
                        <i class="icon-chevron-right"></i>
                    General</a>
                </li>
                <li>
                    <a href="#Radiologia">
                        <i class="icon-chevron-right"></i>
                    Radiología</a>
                </li>
                <li>
                    <a href="#Oncologia">
                        <i class="icon-chevron-right"></i>
                    Oncología</a>
                </li>
                <li>
                    <a href="#Cirugia">
                       <i class="icon-chevron-right"></i>
                    Cirugía</a>
                </li>
                <li>
                    <a href="#AnatPatol">
                        <i class="icon-chevron-right"></i>
                    Anatomía patológica</a>
                </li>
               <!-- <li>
                    <a href="#Seguimiento">
                        <i class="icon-chevron-right"></i>
                    Seguimiento</a>
                </li> -->
            </ul><!--/menuFloat-->
        </div><!--/span2-->
        
        <form action="plantilla_word/rellena_plantilla.php" method="post">
            
         <!--<form action="<?=$_SERVER['PHP_SELF']?>" method="post">-->
             
         <!--<form method="post">-->
            <div class="span10">
                <div id="alertCargando" class="alert alert-block">
                    <strong id="cargarndoDatos" style="margin-bottom: 5px;">Cargando datos...</strong>
                    <div class="progress progress-striped active">
                        <div id="barra" class="bar" style="width: 0%;" data-percentage="100"></div>
                    </div>
                    
                    <button id="buttonDescargar" name="buttonDescargar" disabled="disabled" class="btn" type="submit">
                        <i class=" icon-download-alt"></i>Descargar archivo
                    </button>
              </div>
     
            
        
            


            <!-- ****************************    Generales  *******************************************-->
       
                
                     <a name="GeneralTodos">&nbsp;</a>
                <br />
                <br />
                <h3>DATOS GENERALES</h3>
                <div class="hero-unit">
                    <div class="row-fluid" id="graphics">             
                    </div><!--/row-fluid-->
                    <!--<h1 id="title"></h1>
                    <p id="description"></p>
                    <a id="source" href="">(source)</a>-->
                    
                    
                </div><!--/hero-unit-->
                <br />
                <br />
                <h3>DATOS HOSPITAL</h3>
                 <div class="hero-unit">
                            
                   <!--/row-fluid-->
                    <!--<h1 id="title"></h1>
                    <p id="description"></p>
                    <a id="source" href="">(source)</a>-->
                    
                    <div class="row-fluid" id="graphicsTodos">             
                    </div>
                </div><!--/hero-unit-->
                
                
                
                
                
                
          <!-- ****************************    Radiología  *******************************************-->  
                <a name="Radiologia">&nbsp;</a>
                <br />
                <br />
                <h3>RADIOLOGÍA</h3>
                <div class="hero-unit">
                    <div class="row-fluid">             
                        <dl class="dl-horizontal-principal">
                            <dt>
                                <p>&nbsp;</p>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <label>HOSP.</label>
                                    </dt>
                                    <dd>
                                        <label>TOTAL</label>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em class="lead">Estadiaje preoperatorio</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">RM si / Eco si</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <!--<label id="R_H_rm_eco" style="font-size: 14px; font-weight: normal;"></label>-->
                                        <div class="input-append">
                                          <input id="R_H_rm_eco" name="R_H_rm_eco" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <!--<label id="R_T_rm_eco"></label>-->
                                        <div class="input-append">
                                          <input id="R_T_rm_eco" name="R_T_rm_eco" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">RM si / Eco no</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <!--<label id="R_H_rm" style="font-size: 14px; font-weight: normal;"></label>-->
                                        <div class="input-append">
                                          <input id="R_H_rm" name="R_H_rm" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <!--<label id="R_T_rm"></label>-->
                                        <div class="input-append">
                                          <input id="R_T_rm" name="R_T_rm" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">RM no / Eco si</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <!--<label id="R_H_eco" style="font-size: 14px; font-weight: normal;"></label>-->
                                        <div class="input-append">
                                          <input id="R_H_eco" name="R_H_eco" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <!--<label id="R_T_eco"></label>-->
                                        <div class="input-append">
                                          <input id="R_T_eco" name="R_T_eco" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">RM no / Eco no</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <!--<label id="R_H_no" style="font-size: 14px; font-weight: normal;"></label>-->
                                         <div class="input-append">
                                          <input id="R_H_no" name="R_H_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <!--<label id="R_T_no"></label>-->
                                        <div class="input-append">
                                          <input id="R_T_no" name="R_T_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <em class="lead">Estudio de extensión</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <p>&nbsp;</p>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">TAC</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <!--<label id="R_H_tac" style="font-size: 14px; font-weight: normal;"></label>-->
                                        <div class="input-append">
                                          <input id="R_H_tac" name="R_H_tac" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <!--<label id="R_T_tac" ></label>-->
                                        <div class="input-append">
                                          <input id="R_T_tac" name="R_T_tac" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
							  <!--
                            <dt>
                                <em class="lead">Medición de distancia margen radial (RMN)</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </dl>
                            </dd> 
                          
                            <dt>
                                <label class="margen">Integridad  del aparato esfinteraneo</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>Libre</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <!--<label id="R_H_dist_integ_libre" style="font-size: 14px; font-weight: normal;"></label>--
                                        <div class="input-append">
                                          <input id="R_H_dist_integ_libre" name="R_H_dist_integ_libre" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <!--<label id="R_T_dist_integ_libre"></label>
                                        <div class="input-append">
                                          <input id="R_T_dist_integ_libre" name="R_T_dist_integ_libre" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>Afecto</em>
                                </dt>
									
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <!--<label id="R_H_dist_integ_afecto" style="font-size: 14px; font-weight: normal;"></label>--
                                        <div class="input-append">
                                          <input id="R_H_dist_integ_afecto" name="R_H_dist_integ_afecto" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <!--<label id="R_T_dist_integ_afecto"></label>--
                                        <div class="input-append">
                                          <input id="R_T_dist_integ_afecto" name="R_T_dist_integ_afecto" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>No datos</em>
                                </dt>
								
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <!--<label id="R_H_dist_integ_nodatos" style="font-size: 14px;"></label>--
                                        <div class="input-append">
                                          <input id="R_H_dist_integ_nodatos" name="R_H_dist_integ_nodatos" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <!--<label id="R_T_dist_integ_nodatos"></label>--
                                        <div class="input-append">
                                          <input id="R_T_dist_integ_nodatos" name="R_T_dist_integ_nodatos" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>    
							-->
                        </dl>
                    </div><!--/row-fluid-->
                </div><!--/hero-unit-->
                
                <!-- ****************************    Oncología  *******************************************-->  
                <a name="Oncologia">&nbsp;</a>
                <br />
                <br />
                <h3>ONCOLOGÍA</h3>
                <div class="hero-unit">
                    <div class="row-fluid">             
                        <dl class="dl-horizontal-principal">
                            <dt>
                                <p>&nbsp;</p>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <label>HOSP.</label>
                                    </dt>
                                    <dd>
                                        <label>TOTAL</label>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Neoadyuvancia</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="O_H_neo" name="O_H_neo" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="O_T_neo" name="O_T_neo" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em>Estadio III</em>

                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="O_H_neo_III" name="O_H_neo_III" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="O_T_neo_III" name="O_T_neo_III" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em>T4</em>

                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="O_H_neo_T4" name="O_H_neo_T4" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="O_T_neo_T4" name="O_T_neo_T4" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            

                            <dt>
                                <label class="margen">Adyuvancia</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="O_H_ady" name="O_H_ady" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="O_T_ady" name="O_T_ady" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            <dt>
                                <em>Estadio I</em>

                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="O_H_ady_I" name="O_H_ady_I" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="O_T_ady_I" name="O_T_ady_I" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em>Estadio II</em>

                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="O_H_ady_II" name="O_H_ady_II" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="O_T_ady_II" name="O_T_ady_II" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em>Estadio III</em>

                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="O_H_ady_III" name="O_H_ady_III" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="O_T_ady_III" name="O_T_ady_III" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em>Estadio IV</em>

                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="O_H_ady_IV" name="O_H_ady_IV" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="O_T_ady_IV" name="O_T_ady_IV" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                    </div><!--/row-fluid-->
                </div><!--/hero-unit-->
                
                
                <!-- ****************************    Cirugía  *******************************************-->  
                <a name="Cirugia">&nbsp;</a>
                <br />
                <br />
                <h3>CIRUGÍA</h3>
                <div class="hero-unit">
                    <div class="row-fluid">             
                        <dl class="dl-horizontal-principal">
                            <dt>
                                <p>&nbsp;</p>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <label>HOSP.</label>
                                    </dt>
                                    <dd>
                                        <label>TOTAL</label>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Resección local</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <dt class="puntos">
                                            <div class="input-append">
                                              <input id="C_H_tec_1" name="C_H_tec_1" type="text" readonly="readonly" align="right">
                                              <span class="add-on">%</span>
                                            </div>
                                        </dt>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_1" name="C_T_tec_1" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Resección anterior del recto </label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_tec_23" name="C_H_tec_23" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_23" name="C_T_tec_23" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <dt>
                                    <em>Alta</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_tec_2" name="C_H_tec_2" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_2" name="C_T_tec_2" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>Baja</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_tec_3" name="C_H_tec_3" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_3" name="C_T_tec_3" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Amputación abdominoperineal</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_tec_410" name="C_H_tec_410" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_410" name="C_T_tec_410" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <dt>
                                    <em>Supino</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_tec_4" name="C_H_tec_4" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_4" name="C_T_tec_4" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>Prono</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_tec_10" name="C_H_tec_10" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_10" name="C_T_tec_10" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Proctocolectomía</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_tec_5" name="C_H_tec_5" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_5" name="C_T_tec_5" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Intervención de Hartmann</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_tec_6" name="C_H_tec_6" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_6" name="C_T_tec_6" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Únicamente esta de derivación</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_tec_7" name="C_H_tec_7" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_7" name="C_T_tec_7" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Exenteración</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_tec_9" name="C_H_tec_9" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_9" name="C_T_tec_9" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Laparotomía o laparoscopia exploradora</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_tec_8" name="C_H_tec_8" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tec_8" name="C_T_tec_8" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <em class="lead">Exéresis del mesorrecto (ETM)</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Parcial</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_meso_parcial" name="C_H_meso_parcial" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_meso_parcial" name="C_T_meso_parcial" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">Total</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_meso_total" name="C_H_meso_total" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_meso_total" name="C_T_meso_total" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">No realizada</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_meso_no" name="C_H_meso_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_meso_no" name="C_T_meso_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <em class="lead">ETM en tumores de tercio medio/inferior</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Parcial</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_tumor_inf_parcial" name="C_H_tumor_inf_parcial" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tumor_inf_parcial" name="C_T_tumor_inf_parcial" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">Total</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_tumor_inf_total" name="C_H_tumor_inf_total" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tumor_inf_total" name="C_T_tumor_inf_total" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">No realizada</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_tumor_inf_no" name="C_H_tumor_inf_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_tumor_inf_no" name="C_T_tumor_inf_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <em class="lead">Vía de abordaje</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Laparoscópica</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_via_lapar" name="C_H_via_lapar" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_via_lapar" name="C_T_via_lapar" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">Laparoscópica convertida</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_via_lapar_conv" name="C_H_via_lapar_conv" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_via_lapar_conv" name="C_T_via_lapar_conv" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">Abierta</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_via_abierta" name="C_H_via_abierta" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_via_abierta" name="C_T_via_abierta" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <em class="lead">Perforación del tumor</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Ressección anterior de recto alta</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_perf_tumor_alta" name="C_H_perf_tumor_alta" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_perf_tumor_alta" name="C_T_perf_tumor_alta" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">Resección anterior de recto baja</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_perf_tumor_baja" name="C_H_perf_tumor_baja" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_perf_tumor_baja" name="C_T_perf_tumor_baja" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">Amputación abdominoperineal</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_perf_tumor_amp_abd" name="C_H_perf_tumor_amp_abd" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_perf_tumor_amp_abd" name="C_T_perf_tumor_amp_abd" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Proctocolectomía</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_perf_tumor_proc" name="C_H_perf_tumor_proc" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_perf_tumor_proc" name="C_T_perf_tumor_proc" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Intervención de Hartmann</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_perf_tumor_hart" name="C_H_perf_tumor_hart" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_perf_tumor_hart" name="C_T_perf_tumor_hart" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            
                            <dt>
                                <label class="margen">Total</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="C_H_perf_tumor_total" name="C_H_perf_tumor_total" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_perf_tumor_total" name="C_T_perf_tumor_total" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <em class="lead">Intención</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Curativa</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_int_curativa" name="C_H_int_curativa" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_int_curativa" name="C_T_int_curativa" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd> 
                            
                            <dt>
                                <label class="margen">Paliativa</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_int_paliativa" name="C_H_int_paliativa" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_int_paliativa" name="C_T_int_paliativa" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">No cumplimentado</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_int_no" name="C_H_int_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_int_no" name="C_T_int_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <em class="lead">Estoma de derivación (en resec. anterior)</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_estoma_deriva" name="C_H_estoma_deriva" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_estoma_deriva" name="C_T_estoma_deriva" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em class="lead">Mortalidad</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_mortalidad" name="C_H_mortalidad" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_mortalidad" name="C_T_mortalidad" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em class="lead">Complicaciones</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Infección herida operatoria</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_comp_herida" name="C_H_comp_herida" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_comp_herida" name="C_T_comp_herida" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Infección en periné (en amputación)</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                         <div class="input-append">
                                          <input id="C_H_comp_perine" name="C_H_comp_perine" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_comp_perine" name="C_T_comp_perine" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Dehiscencia anastomótica</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_comp_anast" name="C_H_comp_anast" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_comp_anast" name="C_T_comp_anast" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Absceso abdominal</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_comp_abd" name="C_H_comp_abd" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_comp_abd" name="C_T_comp_abd" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Reintervenciones</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="C_H_comp_reint" name="C_H_comp_reint" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="C_T_comp_reint" name="C_T_comp_reint" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
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
                        <dl class="dl-horizontal-principal">
                            <dt>
                                <p>&nbsp;</p>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <label>HOSP.</label>
                                    </dt>
                                    <dd>
                                        <label>TOTAL</label>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em class="lead">Estadio</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Estadio 0</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_estadio_0" name="AP_H_estadio_0" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_estadio_0" name="AP_T_estadio_0" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Estadio 1</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_estadio_I" name="AP_H_estadio_I" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_estadio_I" name="AP_T_estadio_I" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Estadio 2</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_estadio_II" name="AP_H_estadio_II" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_estadio_II" name="AP_T_estadio_II" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Estadio 3</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_estadio_III" name="AP_H_estadio_III" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_estadio_III" name="AP_T_estadio_III" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Estadio 4</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_estadio_IV" name="AP_H_estadio_IV" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_estadio_IV" name="AP_T_estadio_IV" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em class="lead">Ganglios</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Aislados</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
							
                                <dt>
                                    <em>Mínimo</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_gang_aisl_min" name="AP_H_gang_aisl_min" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_gang_aisl_min" name="AP_T_gang_aisl_min" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <dt>
                                    <em>Media</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_gang_aisl_med" name="AP_H_gang_aisl_med" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_gang_aisl_med" name="AP_T_gang_aisl_med" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>Máximo</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_gang_aisl_max" name="AP_H_gang_aisl_max" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_gang_aisl_max" name="AP_T_gang_aisl_max" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            
                            
                            
                            <dt>
                                <label class="margen">Afectados</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <dt>
                                    <em>Mínimo</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_gang_afec_min" name="AP_H_gang_afec_min" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_gang_afec_min" name="AP_T_gang_afec_min" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <dt>
                                    <em>Media</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_gang_afec_med" name="AP_H_gang_afec_med" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_gang_afec_med" name="AP_T_gang_afec_med" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <dt>
                                    <em>Máximo</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_gang_afec_max" name="AP_H_gang_afec_max" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_gang_afec_max" name="AP_T_gang_afec_max" type="text" readonly="readonly" align="right">
                                          <span class="add-on">#</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <em class="lead">Margen</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <!--<dt>
                                <label class="margen">Medición de ambos márgenes</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <label style="font-size: 14px; font-weight: normal;">HOSP.</label>
                                    </dt>
                                    <dd>
                                        <label>TOTAL</label>
                                    </dd>
                                </dl>
                            </dd>-->
                            <dt>
                                <label class="margen">Circunferencial</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <dt>
                                    <em>Afecto</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_circun_afecto" name="AP_H_circun_afecto" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_circun_afecto" name="AP_T_circun_afecto" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>Libre</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_circun_libre" name="AP_H_circun_libre" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_circun_libre" name="AP_T_circun_libre" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Distal</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <dt>
                                    <em>Afecto</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_distal_afecto" name="AP_H_distal_afecto" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_distal_afecto" name="AP_T_distal_afecto" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>Libre</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_distal_libre" name="AP_H_distal_libre" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_distal_libre" name="AP_T_distal_libre" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Tipo resección</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <dt>
                                    <em>R0</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_resec_R0" name="AP_H_resec_R0" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_resec_R0" name="AP_T_resec_R0" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>R1</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_resec_R1" name="AP_H_resec_R1" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_resec_R1" name="AP_T_resec_R1" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <dt>
                                    <em>R2</em>
                                </dt>
    
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt class="puntos">
                                        <div class="input-append">
                                          <input id="AP_H_resec_R2" name="AP_H_resec_R2" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_resec_R2" name="AP_T_resec_R2" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <em class="lead">Regresión tumoral</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">GR0 - Remisión Completa</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_regre_GR0" name="AP_H_regre_GR0" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_regre_GR0" name="AP_T_regre_GR0" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">GR1 - Células tumorales aisladas</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_regre_GR1" name="AP_H_regre_GR1" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_regre_GR1" name="AP_T_regre_GR1" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">GR2 - Predominio fibrosis</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_regre_GR2" name="AP_H_regre_GR2" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_regre_GR2" name="AP_T_regre_GR2" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">GR3 - Predominio nidos tumorales</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_regre_GR3" name="AP_H_regre_GR3" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_regre_GR3" name="AP_T_regre_GR3" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">GR4 - Ausencia de regresión</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_regre_GR4" name="AP_H_regre_GR4" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_regre_GR4" name="AP_T_regre_GR4" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            
                            <dt>
                                <em class="lead">Calidad de mesorrecto</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Satisfactoria</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_cal_mesorre_satisf" name="AP_H_cal_mesorre_satisf" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_cal_mesorre_satisf" name="AP_T_cal_mesorre_satisf" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Parcialmente satisfactoria</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_cal_mesorre_parc_satisf" name="AP_H_cal_mesorre_parc_satisf" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_cal_mesorre_parc_satisf" name="AP_T_cal_mesorre_parc_satisf" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Insatisfactoria</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="AP_H_cal_mesorre_insatisf" name="AP_H_cal_mesorre_insatisf" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="AP_T_cal_mesorre_insatisf" name="AP_T_cal_mesorre_insatisf" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                     </div><!--/row-fluid-->
                </div><!--/hero-unit-->
                
                
                 <!-- ****************************  Seguimiento  *******************************************-->  
               
			   <!--
                <a name="Seguimiento">&nbsp;</a>
                <br />
                <br />
                <h3>SEGUIMIENTO</h3>
                <div class="hero-unit">
                    <div class="row-fluid">             
                        <dl class="dl-horizontal-principal">
                            <dt>
                                <p>&nbsp;</p>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <label>HOSP.</label>
                                    </dt>
                                    <dd>
                                        <label>TOTAL</label>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <em class="lead">Recidiva</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Local</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="S_H_rec_local" name="S_H_rec_local" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="S_T_rec_local" name="S_T_rec_local" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Sistémica</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="S_H_rec_sistematica" name="S_H_rec_sistematica" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="S_T_rec_sistematica" name="S_T_rec_sistematica" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Local + Sistémica</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="S_H_rec_local_sistematica" name="S_H_rec_local_sistematica" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="S_T_rec_local_sistematica" name="S_T_rec_local_sistematica" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <!--<dt>
                                <label class="margen">No cumplimentado</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="S_H_rec_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="S_T_rec_no" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>--
                            
                            <dt>
                                <em class="lead">Estado del paciente</em>
                            </dt>
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">                              
                                    <p>&nbsp;</p>
                                </dl>
                            </dd>
                            
                            <dt>
                                <label class="margen">Vivo</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="S_H_estado_vivo" name="S_H_estado_vivo" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="S_T_estado_vivo" name="S_T_estado_vivo" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                            <dt>
                                <label class="margen">Muerto</label>
                            </dt> 
                            <dd>
                                <dl class="dl-horizontal-secundario-mediano puntos">
                                    <dt>
                                        <div class="input-append">
                                          <input id="S_H_estado_muerto" name="S_H_estado_muerto" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dt>
                                    <dd>
                                        <div class="input-append">
                                          <input id="S_T_estado_muerto" name="S_T_estado_muerto" type="text" readonly="readonly" align="right">
                                          <span class="add-on">%</span>
                                        </div>
                                    </dd>
                                </dl>
                            </dd>
                     </div><!--/row-fluid--
                </div><!--/hero-unit--
				-->
				
        </div><!-- span10 -->
        
     
    </div> <!-- /container -->
    
    
     <input type="hidden" id="Hospital" name="Hospital" value="<?php echo $_POST["Hospital"];?>"/>  
     <input type="hidden" id="inicio" name="inicio" value="<?php echo $_POST["inicio"];?>"/>
     <input type="hidden" id="fin" name="fin" value="<?php echo $_POST["fin"];?>"/>
     
    
     <input type="hidden" id="numero_pacientes" name="numero_pacientes"/>
     
     <input type="hidden" id="reseccion_local_pos2_n" name="reseccion_local_pos2_n"/>
     <input type="hidden" id="reseccion_local_pos2_p" name="reseccion_local_pos2_p"/>
     
     <input type="hidden" id="reseccion_recto_pos2_n" name="reseccion_recto_pos2_n"/>
     <input type="hidden" id="reseccion_recto_pos2_p" name="reseccion_recto_pos2_p"/>
     
     <input type="hidden" id="no_resectivos_pos2_n" name="no_resectivos_pos2_n"/>
     <input type="hidden" id="no_resectivos_pos2_p" name="no_resectivos_pos2_p"/>
     
     <input type="hidden" id="proctocolectomia_pos3_n" name="proctocolectomia_pos3_n"/>
     <input type="hidden" id="proctocolectomia_pos3_p" name="proctocolectomia_pos3_p"/>
     <input type="hidden" id="exent_pelvica_pos3_n" name="exent_pelvica_pos3_n"/>
     <input type="hidden" id="exent_pelvica_pos3_p" name="exent_pelvica_pos3_p"/>
     
     <input type="hidden" id="res_curativa_pos3_n" name="res_curativa_pos3_n"/>
     <input type="hidden" id="res_curativa_pos3_p" name="res_curativa_pos3_p"/>
     
     <input type="hidden" id="res_paliativa_pos3_n" name="res_paliativa_pos3_n"/>
     <input type="hidden" id="res_paliativa_pos3_p" name="res_paliativa_pos3_p"/>
     
     <input type="hidden" id="res_paliativa_pos3_M1" name="res_paliativa_pos3_M1"/>
     <input type="hidden" id="res_paliativa_pos3_M0_R2" name="res_paliativa_pos3_M0_R2"/>
     
     
<!--Variables por hospital-->
     
     <input type="hidden" id="numero_pacientes_h" name="numero_pacientes_h"/>
     
     <input type="hidden" id="reseccion_local_pos2_n_h" name="reseccion_local_pos2_n_h"/>
     <input type="hidden" id="reseccion_local_pos2_p_h" name="reseccion_local_pos2_p_h"/>
     
     <input type="hidden" id="reseccion_recto_pos2_n_h" name="reseccion_recto_pos2_n_h"/>
     <input type="hidden" id="reseccion_recto_pos2_p_h" name="reseccion_recto_pos2_p_h"/>
     
     <input type="hidden" id="no_resectivos_pos2_n_h" name="no_resectivos_pos2_n_h"/>
     <input type="hidden" id="no_resectivos_pos2_p_h" name="no_resectivos_pos2_p_h"/>
     
     <input type="hidden" id="proctocolectomia_pos3_n_h" name="proctocolectomia_pos3_n_h"/>
     <input type="hidden" id="proctocolectomia_pos3_p_h" name="proctocolectomia_pos3_p_h"/>
     <input type="hidden" id="exent_pelvica_pos3_n_h" name="exent_pelvica_pos3_n_h"/>
     <input type="hidden" id="exent_pelvica_pos3_p_h" name="exent_pelvica_pos3_p_h"/>
     
     <input type="hidden" id="res_curativa_pos3_n_h" name="res_curativa_pos3_n_h"/>
     <input type="hidden" id="res_curativa_pos3_p_h" name="res_curativa_pos3_p_h"/>
     
     <input type="hidden" id="res_paliativa_pos3_n_h" name="res_paliativa_pos3_n_h"/>
     <input type="hidden" id="res_paliativa_pos3_p_h" name="res_paliativa_pos3_p_h"/>
     
     <input type="hidden" id="res_paliativa_pos3_M1_h" name="res_paliativa_pos3_M1_h"/>
     <input type="hidden" id="res_paliativa_pos3_M0_R2_h" name="res_paliativa_pos3_M0_R2_h"/>
     
    
   </form>
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
    
 <!-- **********************   cargar los datos de los informes  ********************************************************** -->   
    
    
    <script src="graficos/raphael.js" type="text/javascript"></script>
    <script src="graficos/joint.js" type="text/javascript"></script>
    <script src="graficos/joint.dia.js" type="text/javascript"></script>
    <script src="graficos/joint.dia.org.js" type="text/javascript"></script>
    
    
    
    <script src="informes_js.js"></script> 
    <!--<script src="../../../assets/jQuery/raphael-min.js"></script>-->
    
    
    

    
    
  </body>
</html>

<?php
}
?>