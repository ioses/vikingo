<?php

//Se visualizan todos los datos de un paciente en la web
//Referenciado desde Ver datos
    session_start();
    
    require ("../BDD/conexion.php");


    $NHC = $_GET['NHC'];
	
	//Selección del ID del Hospital para identificar correctamente al paciente

	$sqlIdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='".$_SESSION["NombreHospital"]."'";

	$result=mysqli_query($conexion,$sqlIdHospital);
	$row=mysqli_fetch_array($result);

    $idHospital=$row[0];
    $idHospital=intval($idHospital);

    
    $NHC_Inicial = "<dt>NHC: </dt> <dd>" . utf8_encode($_GET['NHC']) . "</dd>";
    

    $sqlIdentPaciente="SELECT identificador_paciente.ID, identificador_paciente.NHC, identificador_paciente.Fecha_Nacimiento, tabla_sexo.Sexo 
          FROM identificador_paciente 
          INNER JOIN tabla_sexo
          ON identificador_paciente.Id_Sexo = tabla_sexo.ID 
          WHERE identificador_paciente.NHC = AES_ENCRYPT('$NHC','$claveNHC') AND identificador_paciente.Id_Hospital = '$idHospital'";
    
    $rowIdentPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlIdentPaciente))
       or die('Error: ' . mysqli_error() . ' 33');
       
/************************ inicial **********************/  
    
     //datos iniciales
     
    $Inicial = "<dl class=\"dl-horizontal-verPaciente well  well-small\"> <p class=\"lead\">INICIAL</p> ";
     
    $Fecha_Nacimiento = "<dt>Fecha de nacimiento: </dt> <dd>" . $rowIdentPaciente['Fecha_Nacimiento'] . "</dd>";
    $Sexo = "<dt>Sexo: </dt> <dd>" . utf8_encode($rowIdentPaciente['Sexo']) . ".</dd>"; 
    
    $IdPaciente = $rowIdentPaciente['ID'];

    $sqlInicial="SELECT inicial.ID AS ID, inicial.Localizacion, inicial.B_Sincro, inicial.B_Tec_ECO, inicial.Tec_TAC, inicial.B_Tec_RMN, tabla_integ_esfint.Tipo AS integ_esfint, inicial.B_Inv_Vecinos, inicial.B_Metast_Inicial, tabla_estadio_tumor.Estadio AS EstadioRadiologico
                 FROM inicial
                 INNER JOIN tabla_integ_esfint
                 ON  inicial.Id_Integ_Esfint = tabla_integ_esfint.ID
                 INNER JOIN tabla_estadio_tumor
                 ON  inicial.Id_Estadio_Radio = tabla_estadio_tumor.ID
                 WHERE Id_Paciente = '$IdPaciente'";
    $rowInicial=mysqli_fetch_array(mysqli_query($conexion,$sqlInicial))
       or die('Error: ' . mysqli_error()  . ' 54');

     /**** Localización ***/

    $Localizacion = "<dt>Localización: </dt> <dd>" . $rowInicial['Localizacion'] . " cm.</dd>";
    $Sincro = "<dt>Tumor sincrónico de colon: </dt> <dd>";

    $IdInicial = $rowInicial['ID'];
    
    if ($rowInicial['B_Sincro'] == 0)
    {
        $Sincro = $Sincro . "No hay tumor sincrónico de colon.</dd>";
    }
    else //Hay tumor sincrónico. miramos cual hay
    {
       $Sincro = $Sincro . "<em>Tipo: </em>";
        

        $sqlSincro="SELECT tabla_colon.Colon 
                    FROM tabla_sincro 
                    INNER JOIN tabla_colon
                    ON tabla_sincro.Id_Colon = tabla_colon.ID
                    WHERE Id_Inicial = '$IdInicial'";
                            

        $rs=mysqli_query($conexion,$sqlSincro)
          or die('Error: ' . mysqli_error() . ' 80');
          
        $numResults = mysqli_num_rows($rs);
        $counter = 0;
            
         while($rowSincro = mysqli_fetch_array($rs))
         {
             if (++$counter == $numResults) // last row
             {
               $Sincro = $Sincro . $rowSincro['Colon'] . ".</dd>";
             } 
             else // not last row
             {
               $Sincro = $Sincro . $rowSincro['Colon'] . ", ";
             }  
         }   
    }
    
    
     /*** Radiologica ***/ 
     
    $EstadioRadiologico = "<dt>Estadío radiológico: </dt> <dd>" . $rowInicial['EstadioRadiologico'] . "</dd>";    
    
    $ECO = "<dt>Ecografía: </dt> <dd>";
    if ($rowInicial['B_Tec_ECO'] == 1) //Hay tecnica ECO
    {
        $sqlECO="SELECT tabla_eco_t.Tipo AS Tipo_T, tabla_eco_n.Tipo AS Tipo_N 
                 FROM tabla_eco 
                 INNER JOIN tabla_eco_t
                 ON tabla_eco.Id_ECO_T = tabla_eco_t.ID
                 INNER JOIN tabla_eco_n
                 ON tabla_eco.Id_ECO_N = tabla_eco_n.ID
                 WHERE tabla_eco.Id_Inicial = '$IdInicial'";
                 

        $rowECO=mysqli_fetch_array(mysqli_query($conexion,$sqlECO))
       or die('Error: ' . mysqli_error()  . ' 116');
       
        $ECO = $ECO . "<em>T: </em>" . utf8_encode($rowECO['Tipo_T']);
        $ECO = $ECO . "<br/>";
        $ECO = $ECO . "<em>N: </em>" . utf8_encode($rowECO['Tipo_N']) . "</dd>";
    }
    else //No hay técnica ECO
    {
        $ECO = $ECO . "No se ha realizado la técnica de ECO.</dd>";
    }
    
    $TAC = "<dt>TAC: </dt> <dd>";
     if ($rowInicial['Tec_TAC'] == 1) //Hay tecnica TAC
    {
        $TAC = $TAC . "Se ha realizado la técnica de TAC.</dd>";
    }
     else
     {
         $TAC = $TAC . "No se ha realizado la técnica de TAC.</dd>";
     }
    
    
    $RMN = "<dt>Resonancia magnética:  </dt> <dd>";
    if ($rowInicial['B_Tec_RMN'] == 1)//Hay tecnica RMN
    {
        
        $sqlRMN="SELECT tabla_rmn_t.Tipo AS Tipo_T, tabla_rmn_n.Tipo AS Tipo_N,  tabla_rmn.Dist_Tumor, tabla_rmn.Dist_Adenopatia
                 FROM tabla_rmn 
                 INNER JOIN tabla_rmn_t
                 ON tabla_rmn.Id_RMN_T = tabla_rmn_t.ID
                 INNER JOIN tabla_rmn_n
                 ON tabla_rmn.Id_RMN_N = tabla_rmn_n.ID
                 WHERE tabla_rmn.Id_Inicial = '$IdInicial'";
                 

    
        $rowRMN=mysqli_fetch_array(mysqli_query($conexion,$sqlRMN))
            or die('Error: ' . mysqli_error() . ' 153');

        $RMN = $RMN . "<em>T: </em>" . utf8_encode($rowRMN['Tipo_T']);
        $RMN = $RMN . "<br/>";
        $RMN = $RMN . "<em>N: </em>" . utf8_encode($rowRMN['Tipo_N']);
        $RMN = $RMN . "<br/>";
        $RMN = $RMN . "<em>Distancias al tumor: </em>" . utf8_encode($rowRMN['Dist_Tumor']);
        $RMN = $RMN . "<br/>";
        $RMN = $RMN . "<em>Distancia a adenopatía: </em>" . utf8_encode($rowRMN['Dist_Adenopatia']) . "</dd>";
    }
    else 
    {
        $RMN = $RMN . "No se ha realizado la técnica de RMN.</dd>";
    }
    
    
    /****** Otras afecciones ****/ 
    $Integ_Esfinter = "<dt>Integridad del aparato esfinteriano: </dt> <dd>" . utf8_encode($rowInicial['integ_esfint']). ".</dd>";
    
    $MetastasisInicial = "<dt>Metástasis inicial: </dt> <dd>";
    if ($rowInicial['B_Metast_Inicial'] == 1) //Hay metástasis
    {
        $sqlMetast="SELECT tabla_organos_metastasis.Organo 
                    FROM tabla_metast_inicial
                    INNER JOIN tabla_organos_metastasis
                    ON tabla_metast_inicial.Id_Organo = tabla_organos_metastasis.ID
                    WHERE Id_Inicial = '$IdInicial'";
    
        $rs=mysqli_query($conexion,$sqlMetast)
          or die('Error: ' . mysqli_error() . ' 182');
        
        $numResults = mysqli_num_rows($rs);
        $counter = 0;

         $MetastasisInicial = $MetastasisInicial . "<em>Localización: </em>&nbsp"; 
         while($rowVecino = mysqli_fetch_array($rs))
         {
             if (++$counter == $numResults) // last row
             {
               $MetastasisInicial = $MetastasisInicial . utf8_encode($rowVecino['Organo']) . ".</dd>";
             } 
             else // not last row
             {
                $MetastasisInicial = $MetastasisInicial . utf8_encode($rowVecino['Organo']) . ", &nbsp";        
             }  
         } 
    }
    else
    {
        $MetastasisInicial = $MetastasisInicial . "No hay metástasis inicial.</dd>";
    }
    
    
    $Vecinos = "<dt>Invasión de órganos vecinos: </dt> <dd>";
    if ($rowInicial['B_Inv_Vecinos'] == 1) //Hay metástasis
    {
        $sqlSVecinos="SELECT tabla_organos_vecinos.Organos 
                    FROM tabla_vecinos
                    INNER JOIN tabla_organos_vecinos
                    ON tabla_vecinos.Id_Organos = tabla_organos_vecinos.ID
                    WHERE Id_Inicial = '$IdInicial'";
    
        $rs=mysqli_query($conexion,$sqlSVecinos)
          or die('Error: ' . mysqli_error() . ' 216');
          
        $numResults = mysqli_num_rows($rs);
        $counter = 0;
         
         $Vecinos = $Vecinos . "<em>Localización: </em>&nbsp"; 
          
         while($rowVecino = mysqli_fetch_array($rs))
         {
             if (++$counter == $numResults) // last row
             {
               $Vecinos = $Vecinos . utf8_encode($rowVecino['Organos']) . ".</dd>";
             } 
             else // not last row
             {
                $Vecinos = $Vecinos . utf8_encode($rowVecino['Organos']) . ", &nbsp";        
             }          
         }
    }
    else
    {
        $Vecinos = $Vecinos . "No hay invasión de óganos vecinos.</dd>";
    }
    
    /*echo("NHC " . $NHC . ", Sexo " . $Sexo . ", Fe_Nac " . $Fecha_Nacimiento);   
    echo "<br>";
    echo("Loc " . $Localizacion . ", Sinc " . $Sincro);   
    echo "<br>";
    echo("Estadio radiologico " . $EstadioRadiologico);   
    echo "<br>";
    echo("ECO " . $ECO);   
    echo( ", TAC " . $TAC . ", RMN " . $RMN); 
    echo "<br>";
    echo("Integ_Esfinter " . $Integ_Esfinter); 
    echo "<br>";
    echo("MetastInicial " . $MetastasisInicial); 
    echo "<br>";
    echo("Vecinos " . $Vecinos); 
    echo "<br>";
    echo "<br>";*/
    
    /*** Datos iniciales ***/
    $Inicial = $Inicial . "<br/>" . $NHC_Inicial;
    $Inicial = $Inicial . "<br/>" . $Fecha_Nacimiento;
    $Inicial = $Inicial . "<br/>" . $Sexo;
    
    /**** Localización ***/
    $Inicial = $Inicial . "<br/>" . $Localizacion;
    $Inicial = $Inicial . "<br/>" . $Sincro;
    
     /*** Radiologica ***/ 
    $Inicial = $Inicial . "<br/>" . $EstadioRadiologico;
    $Inicial = $Inicial . "<br/>" . $ECO;
    $Inicial = $Inicial . "<br/>" . $TAC;
    $Inicial = $Inicial . "<br/>" . $RMN;
    
    /****** Otras afecciones ****/ 
    $Inicial = $Inicial . "<br/>" . $Integ_Esfinter;
    $Inicial = $Inicial . "<br/>" . $MetastasisInicial;
    $Inicial = $Inicial . "<br/>" . $Vecinos;
    $Inicial = $Inicial . "</dl>" . "<br/>";
    
    
   /* echo(utf8_decode($Inicial));   
    echo "<br>";*/
    
    $datos = utf8_decode($Inicial);
    $datos = $datos . "<br/>";
/**********************  Tratamiento ********************************/
    

    $Tratamiento = "<dl class=\"dl-horizontal-verPaciente well  well-small\"> <p class=\"lead\">TRATAMIENTO</p> ";
    
    $sqlTratamiento="SELECT * FROM tratamiento WHERE Id_Paciente = '$IdPaciente'";
    
    $rowTratamiento=mysqli_fetch_array(mysqli_query($conexion,$sqlTratamiento))
       or die('Error: ' . mysqli_error() . ' 292');
    
    $IdTratamiento = $rowTratamiento['ID'];
    
    
     //Tratamiendo neoadyuvante
    $B_Tto_Neo = "<dt>Tratamiento neoadyuvante: </dt> <dd>";

    
    if(intval($rowTratamiento['B_Tto_Neo']) == 1) //Ha recibido tratamiento neoadyuvante
    {
        $sqlNeo="SELECT tabla_tipo_neo.Tipo AS Tipo  
                 FROM tabla_neo
                 INNER JOIN tabla_tipo_neo
                 ON tabla_neo.Id_Tipo_Neo = tabla_tipo_neo.ID
                 WHERE Id_Tratamiento = '$IdTratamiento'";
    
        $rowNeo=mysqli_fetch_array(mysqli_query($conexion,$sqlNeo))
       or die('Error: ' . mysqli_error() . ' 310');
       
        $B_Tto_Neo = $B_Tto_Neo . "Tratamiento neoadyuvante recibido.</dd>";
        $Tipo_TTO_Neoadyuvante = "<dt>Tipo de tratamiento:  </dt> <dd>" . utf8_encode($rowNeo['Tipo']) . ".</dd>";
        $B_Tto_Neo = $B_Tto_Neo . "<br/>" . $Tipo_TTO_Neoadyuvante . "<br/>";
    }
    else if ($rowTratamiento['B_Tto_Neo'] == 2) //Ha recibido tratamiento neoadyuvante
    {
        $sqlNoNeo="SELECT tabla_tipo_no_neo.Tipo AS Tipo 
                   FROM tabla_no_neo
                   INNER JOIN tabla_tipo_no_neo
                   ON tabla_no_neo.Id_Tipo_No_Neo = tabla_tipo_no_neo.ID
                   WHERE Id_Tratamiento = '$IdTratamiento'";
    
        $rowNoNeo=mysqli_fetch_array(mysqli_query($conexion,$sqlNoNeo))
       or die('Error: ' . mysqli_error() . ' 325');
       
       $B_Tto_Neo = $B_Tto_Neo . "No ha recibido tratamiento neoadyuvante." . "<br>";
        
        $Tipo_TTO_Neoadyuvante = "Causa: " . utf8_encode($rowNoNeo['Tipo']);
        
        $B_Tto_Neo = $B_Tto_Neo . $Tipo_TTO_Neoadyuvante . "<br/>";
    
    }

    
     //Tratamiendo adyuvante    
    $TTO_Adyuvante = "<dt>Tratamiento adyuvante: </dt> <dd>";
    if(intval($rowTratamiento['B_Tto_Ady']) == 0) //No se ha rellenado el tratamiento Adyuvante
    {
        $TTO_Adyuvante = $TTO_Adyuvante . "Está pendiente por rellenar.</dd>";
    }
    else if (intval($rowTratamiento['B_Tto_Ady']) == 1) //Hay tratamiento adyuvante
    {
        $sqlAdy="SELECT tabla_tipo_ady.Tipo AS Tipo 
                 FROM tabla_ady 
                 INNER JOIN tabla_tipo_ady
                 ON tabla_ady.Id_Tipo_Ady = tabla_tipo_ady.ID
                 WHERE Id_Tratamiento = '$IdTratamiento'";
    
        $rowAdy=mysqli_fetch_array(mysqli_query($conexion,$sqlAdy))
       or die('Error: ' . mysqli_error() . ' 351');
       
       $TTO_Adyuvante = $TTO_Adyuvante . "Tratamiento adyuvante recibido.</dd>";
       $Tipo_Adyuvante = "<dt>Tipo de tratamiento: </dt> <dd>" . utf8_encode($rowAdy['Tipo']) . ".</dd>";
       $TTO_Adyuvante = $TTO_Adyuvante . "<br/>" . $Tipo_Adyuvante . "<br/>";
   
    }
    else
    {
        $TTO_Adyuvante = $TTO_Adyuvante . "No ha recibido tratamiento adyuvante.";
    }
    
    
    $Tratamiento = $Tratamiento . "<br/>";
    $Tratamiento = $Tratamiento . $B_Tto_Neo . "<br/>";
    $Tratamiento = $Tratamiento . $TTO_Adyuvante . "<br/>";
    $Tratamiento = $Tratamiento . "</dl>" . "<br/>";
    
   /* echo("B_Tto_Neo " . $B_Tto_Neo . ", Tipo_TTO_Neoadyuvante " . $Tipo_TTO_Neoadyuvante);   
    echo "<br>";
    echo("TTO_Adyuvante " . $TTO_Adyuvante);
    echo "<br>";
    echo "<br>";*/
    
   /* echo(utf8_decode($Tratamiento));   
    echo "<br>";*/
    
    $datos = $datos . utf8_decode($Tratamiento);
    $datos = $datos . "<br>";
    
/**********************  Cirugia ********************************/
    
     //Cirugia
     
    $sqlCirugia="SELECT * 
                 FROM cirugia 
                 WHERE Id_Paciente = '$IdPaciente'";
    
    $rowCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlCirugia))
       or die('Error: ' . mysqli_error() . ' 390');
    
    $IdCirugia = $rowCirugia['ID'];
      
    $B_Cirugia = "<dl class=\"dl-horizontal-verPaciente well  well-small\"> <p class=\"lead\">CIRUGIA</p> ";
 
    if(intval($rowCirugia['B_Cirugia']) == 2) //No se ha realizado cirugía
    {
        $sqlNoCirugia="SELECT tabla_motivos_no_cirugia.Motivo AS Motivo 
                       FROM tabla_no_cirugia 
                       INNER JOIN tabla_motivos_no_cirugia
                       ON tabla_no_cirugia.Id_Motivo = tabla_motivos_no_cirugia.ID
                       WHERE Id_Cirugia = '$IdCirugia'";
    
        $rowNoCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlNoCirugia))
       or die('Error: ' . mysqli_error() . ' 405');
       
        $B_Cirugia = $B_Cirugia . "No se ha realizado la cirugía por el motivo: ";
        $B_Cirugia = $B_Cirugia . utf8_encode($rowNoCirugia['Motivo']) . ".";
        
    }
    else if (intval($rowCirugia['B_Cirugia']) == 0)
    {
        $B_Cirugia = $B_Cirugia . "No se ha realizado cirugía.";
    }
    
    else //Se ha realizado cirugia
    {
                   
        $sqlSiCirugia="SELECT tabla_cirugia.Fecha_Intervencion, tabla_cirugia.Fecha_Alta, tabla_cirugia.Cirujano, tabla_cirugia.Ayudante, tabla_planificacion.Tipo AS Planificacion, tabla_tecnicas.Tipo AS Tecnicas, tabla_cirugia.B_Otra_Tecnica, tabla_exeresis_meso.Tipo AS Exeresis_Meso, tabla_cirugia.B_Otras_Resecciones,
		tabla_cirugia.Orientacion AS Orientacion, tabla_cirugia.Tipo_Anastomosis_Proyecto AS Tipo_Anastomosis_Proyecto, tabla_cirugia.Tipo_Anastomosis_coloanal AS Tipo_Anastomosis_coloanal, tabla_cirugia.Reseccion_interesfinteriana AS Reseccion_interesfinteriana, tabla_cirugia.Tipo_Reseccion_interesfinteriana AS Tipo_Reseccion_interesfinteriana,
        tabla_cirugia.Tipo_Reseccion_organos AS Tipo_Reseccion_organos, tabla_cirugia.Reseccion_organos_vecinos_proyecto AS Reseccion_organos_vecinos_proyecto, tabla_cirugia.Dehiscencia_sutura_proyecto AS Dehiscencia_sutura_proyecto, tabla_cirugia.Absceso_pelvico_proyecto AS Absceso_pelvico_proyecto, 
        tabla_cirugia.Reseccion_organo_vagina AS Reseccion_organo_vagina, tabla_cirugia.Reseccion_organo_prostata AS Reseccion_organo_prostata, tabla_cirugia.Reseccion_organo_vejiga AS Reseccion_organo_vejiga, tabla_cirugia.Reseccion_organo_seminales AS Reseccion_organo_seminales, tabla_cirugia.Reseccion_organo_utero AS Reseccion_organo_utero
                       FROM tabla_cirugia
                       INNER JOIN tabla_planificacion
                       ON tabla_cirugia.Id_Planificacion = tabla_planificacion.ID
                       INNER JOIN tabla_tecnicas
                       ON tabla_cirugia.Id_Tecnica = tabla_tecnicas.ID
                       INNER Join tabla_exeresis_meso
                       ON tabla_cirugia.Id_Exeresis_Meso = tabla_exeresis_meso.ID
                       WHERE Id_Cirugia = '$IdCirugia'";
    
        $rowSiCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlSiCirugia))
       or die('Error: ' . mysqli_error() . ' 430');

        $Tipo_Cirugia = "<dt>Tipo de cirugía: </dt> <dd>" . utf8_encode($rowSiCirugia['Planificacion']) . ".</dd>";
        $Fecha_Cirugia = "<dt>Fecha de la cirugía: </dt> <dd>" . $rowSiCirugia['Fecha_Intervencion'] . "</dd>";
        $Fecha_Alta = "";
        
        if($rowSiCirugia['Fecha_Alta'] == '0000-00-00' || $rowSiCirugia['Fecha_Alta']==null) //No se ha rellenado la fecha
        {
            $Fecha_Alta = "<dt>Fecha de Alta:</dt> <dd>Pendiente de rellenar.</dd>"; 
        }
        else 
        {
            $Fecha_Alta = "<dt>Fecha de Alta: </dt> <dd>" . $rowSiCirugia['Fecha_Alta'] . "</dd>";
        }
        
        $Cirujano_Principal = "<dt>Cirujano: </dt> <dd>" . utf8_encode($rowSiCirugia['Cirujano']) . ".</dd>";
        $Cirujano_Ayudante = "<dt>Ayudante: </dt> <dd>" . utf8_encode($rowSiCirugia['Ayudante']) . ".</dd>";
        
        $Tecnicas_Cirugia = "<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Tecnicas']) . ".</dd>";
       
        $Tipo_Anastomosis_Proyecto="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Tipo_Anastomosis_Proyecto']) . ".</dd>";
        
        $Tipo_Anastomosis_coloanal="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Tipo_Anastomosis_coloanal']) . ".</dd>";
        
        $Reseccion_interesfinteriana="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Reseccion_interesfinteriana']) . ".</dd>";
        
        $Tipo_Reseccion_interesfinteriana="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Tipo_Reseccion_interesfinteriana']) . ".</dd>";
        
        $Reseccion_organos_vecinos_proyecto="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Reseccion_organos_vecinos_proyecto']) . ".</dd>";
        
        $Tipo_Reseccion_organos="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Tipo_Reseccion_organos']) . ".</dd>";
        
        $Dehiscencia_sutura_proyecto="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Dehiscencia_sutura_proyecto']) . ".</dd>";
        
         $Absceso_pelvico_proyecto="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Absceso_pelvico_proyecto']) . ".</dd>";
         
         
          $Reseccion_organo_vagina="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Reseccion_organo_vagina']) . ".</dd>";
          
           $Reseccion_organo_prostata="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Reseccion_organo_prostata']) . ".</dd>";
           
            $Reseccion_organo_vejiga="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Reseccion_organo_vejiga']) . ".</dd>";
            
             $Reseccion_organo_seminales="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Reseccion_organo_seminales']) . ".</dd>";
             
              $Reseccion_organo_utero="<dt>Técnica quirúrgica: </dt> <dd>" . utf8_encode($rowSiCirugia['Reseccion_organo_utero']) . ".</dd>";
              
              
        
        $B_Otras_Cirugia = "<dt>Otra técnicas cirugía: </dt> <dd>";
        
        if ($rowSiCirugia['B_Otra_Tecnica'] == 1)
        {
            $sqlOtraTecnica="SELECT tabla_tipo_otras_tecnicas.Tipo AS Tipo 
                             FROM tabla_otras_tecnicas 
                             INNER JOIN tabla_tipo_otras_tecnicas
                             ON  tabla_otras_tecnicas.Id_Tipo_Otras_Tecnicas = tabla_tipo_otras_tecnicas.ID 
                             WHERE Id_Cirugia = '$IdCirugia'";
            $rs=mysqli_query($conexion,$sqlOtraTecnica)
              or die('Error: ' . mysqli_error() . ' 460');
              
            $numResults = mysqli_num_rows($rs);
            $counter = 0;  
            
            while($rowOtrasCirugia = mysqli_fetch_array($rs))
            {
                 if (++$counter == $numResults) // last row
                 {
                   $B_Otras_Cirugia = $B_Otras_Cirugia . utf8_encode($rowOtrasCirugia['Tipo']) . ".</dd>";
                 } 
                 else // not last row
                 {
                    $B_Otras_Cirugia = $B_Otras_Cirugia . utf8_encode($rowOtrasCirugia['Tipo']) . ", ";
                 }          
           }
        }
        else 
        {
             $B_Otras_Cirugia = $B_Otras_Cirugia . "No se han realizado otras técnicas de cirugía.</dd>";
        }

		$Orientacion = intval($rowSiCirugia['Orientacion']);
		if ($Orientacion == 1)
		{
			$Orientacion = "<dt>Orientación: </dt> <dd> Prono.</dd>";
		}
		else if ($Orientacion == 2)
		{
			$Orientacion = "<dt>Orientación: </dt> <dd> Supino.</dd>";
		}
		
        $Exeresis_Meso = "<dt>Exéresis del mesorrecto: </dt> <dd>" . $rowSiCirugia['Exeresis_Meso'] . ".</dd>";
        
        $B_Otras_Resecciones = "<dt>Resecciones: </dt> <dd>";
        if ($rowSiCirugia['B_Otras_Resecciones'] == 1)
        {
            $sqlOtrasResecciones="SELECT tabla_tipo_otras_resecciones.Tipo AS Tipo 
                                 FROM tabla_otras_resecciones 
                                 INNER JOIN tabla_tipo_otras_resecciones
                                 ON  tabla_otras_resecciones.Id_Tipo_Otras_Resecciones = tabla_tipo_otras_resecciones.ID 
                                 WHERE Id_Cirugia = '$IdCirugia'";

            $rs=mysqli_query($conexion,$sqlOtrasResecciones)
              or die('Error: ' . mysqli_error() . ' 494');
              
            $numResults = mysqli_num_rows($rs);
            $counter = 0;
              
            $B_Otras_Resecciones = "<dt>Otras resecciones viscerales: </dt> <dd>";

            while($rowOtrasResecciones = mysqli_fetch_array($rs))
            {
                 if (++$counter == $numResults) // last row
                 {
                   $B_Otras_Resecciones = $B_Otras_Resecciones . $rowOtrasResecciones['Tipo'] . ".</dd>";
                 } 
                 else // not last row
                 {
                    $B_Otras_Resecciones = $B_Otras_Resecciones . $rowOtrasResecciones['Tipo'] . ", ";
                 }          
           }
        }
        else 
        {
             $B_Otras_Resecciones = $B_Otras_Resecciones . "No ha habido otras resecciones.</dd>";
        }
        
        
         $sqlCaracteristicas="SELECT tabla_tipo_asa.Tipo AS Asa, tabla_tipo_hallazgos_intra.Tipo AS Hallazgos_Intra, tabla_caracteristicas_cirugia.Perforacion_Tumoral, tabla_tipo_metast_hepaticas.Tipo AS Metast_Hepaticas, tabla_caracteristicas_cirugia.Implantes_Ovaricos, tabla_caracteristicas_cirugia.Obstruccion,
                              tabla_tipo_via_operacion.Tipo AS Via_Operacion, tabla_caracteristicas_cirugia.Tiempo_operatorio, tabla_caracteristicas_cirugia.Transfusion, tabla_tipo_intencion.Tipo AS Intencion, tabla_tipo_anastomosis.Tipo AS Anastomosis, tabla_tipo_reservorio.Tipo AS Reservorio, tabla_caracteristicas_cirugia.B_Estoma_Derivacion
                              FROM tabla_caracteristicas_cirugia
                              INNER JOIN tabla_tipo_asa
                              ON tabla_caracteristicas_cirugia.Id_Asa = tabla_tipo_asa.ID
                              INNER JOIN tabla_tipo_hallazgos_intra
                              ON tabla_caracteristicas_cirugia.Id_Hallazgos_Intra = tabla_tipo_hallazgos_intra.ID
                              INNER JOIN tabla_tipo_metast_hepaticas
                              ON tabla_caracteristicas_cirugia.Id_Metast_Hepaticas = tabla_tipo_metast_hepaticas.ID
                              INNER JOIN tabla_tipo_via_operacion
                              ON tabla_caracteristicas_cirugia.Id_Via_Operacion = tabla_tipo_via_operacion.ID
                              INNER JOIN tabla_tipo_intencion
                              ON tabla_caracteristicas_cirugia.Id_Intencion = tabla_tipo_intencion.ID
                              INNER JOIN tabla_tipo_anastomosis
                              ON tabla_caracteristicas_cirugia.Id_Anastomosis = tabla_tipo_anastomosis.ID
                              INNER JOIN tabla_tipo_reservorio
                              ON tabla_caracteristicas_cirugia.Id_Reservorio = tabla_tipo_reservorio.ID
                              WHERE Id_Cirugia = '$IdCirugia'";
                                         
             

         $rowCaracteristicas=mysqli_fetch_array(mysqli_query($conexion,$sqlCaracteristicas))
           or die('Error: ' . mysqli_error() . ' 541');
          
          $ASA = "<dt>ASA: </dt> <dd>" . $rowCaracteristicas['Asa'] . ".</dd>";
          $Hallazgos_Intraoperatorios = "<dt>Hallazgos Intraoperatorios: </dt> <dd>" . $rowCaracteristicas['Hallazgos_Intra'] . ".</dd>";
          
          $Perforacion_Tumoral = "<dt>Perforacion tumoral: </dt> <dd>";
          if(intval($rowCaracteristicas['Perforacion_Tumoral']) == 0)
          {
              $Perforacion_Tumoral = $Perforacion_Tumoral . "No ha habido.</dd>";
          }
          else
          {
              $Perforacion_Tumoral = $Perforacion_Tumoral . "Ha habido.</dd>";
          }
          
          $Tipo_Metast_Hepaticas = "<dt>Metástasis hepáticas: </dt> <dd>" . utf8_encode($rowCaracteristicas['Metast_Hepaticas']) . ".</dd>";
 
          $Imp_Ovaricos = "<dt>Implantes ováricos: </dt> <dd>";
          if(intval($rowCaracteristicas['Implantes_Ovaricos']) == 0)
          {
              $Imp_Ovaricos = $Imp_Ovaricos . "No ha habido.</dd>";
          }
          else
          {
              $Imp_Ovaricos = $Imp_Ovaricos . "Ha habido.</dd>";
          }
          
          
          $Obstruccion = "<dt>Obstrucción: </dt> <dd>";
          if(intval($rowCaracteristicas['Obstruccion']) == 0)
          {
              $Obstruccion = $Obstruccion . "No ha habido.</dd>";
          }
          else
          {
              $Obstruccion = $Obstruccion . "Ha habido.</dd>";
          }
          
         $Via_Operacion = "<dt>Vía operación: </dt> <dd>" . utf8_encode($rowCaracteristicas['Via_Operacion']) . ".</dd>";
         $Tiempo_Operacion = "<dt>Tiempo operación: </dt> <dd>" . intval($rowCaracteristicas['Tiempo_operatorio']) . " min.</dd>";
         $Transfusiones = "<dt>Transfusiones: </dt> <dd>" . intval($rowCaracteristicas['Transfusion']) . ".</dd>";
         $Intencion_Operatoria = "<dt>Intención operatoria: </dt> <dd>" . $rowCaracteristicas['Intencion'] . ".</dd>";
         $Anastomosis = "<dt>Anastomosis: </dt> <dd>" . utf8_encode($rowCaracteristicas['Anastomosis']) . ".</dd>";
         $Reservorio = "<dt>Reservorio: </dt> <dd>" . utf8_encode($rowCaracteristicas['Reservorio']) . ".</dd>";
         
         $Estoma_Derivacion = "<dt>Estoma derivación: </dt> <dd>";
       
         if ($rowCaracteristicas['B_Estoma_Derivacion'] == 1) //Hay estoma de derivación
         {
             $sqlEstoma="SELECT tabla_tipo_estoma_derivacion.Tipo AS Tipo 
                         FROM tabla_estoma
                         INNER JOIN tabla_tipo_estoma_derivacion
                         ON  tabla_estoma.Id_Tipo_Estoma = tabla_tipo_estoma_derivacion.ID
                         WHERE Id_Cirugia = '$IdCirugia'";

             $rowEstoma=mysqli_fetch_array(mysqli_query($conexion,$sqlEstoma))
               or die('Error: ' . mysqli_error() . ' 597');
   
             $Estoma_Derivacion = $Estoma_Derivacion . utf8_encode($rowEstoma['Tipo']) . ".</dd>";
         }
         else
         {
             $Estoma_Derivacion = $Estoma_Derivacion . "No ha habido.</dd>";
         }
         
         
          //Complicaciones
          $sqlIsComplicaciones="SELECT *
                                FROM tabla_complicaciones 
                                WHERE Id_Cirugia = '$IdCirugia'";

          $rowIsComplicaciones=mysqli_fetch_array(mysqli_query($conexion,$sqlIsComplicaciones))
           or die('Error: ' . mysqli_error() . ' 613');
         
          $Complicaciones = "";
          if ($rowIsComplicaciones['B_Complicaciones'] == 1) //Hay complicaciones
          {
              $sqlComplicaciones="SELECT * 
                                  FROM tabla_tipo_complicaciones 
                                  WHERE Id_Cirugia = '$IdCirugia'";
    
              $rowComplicaciones=mysqli_fetch_array(mysqli_query($conexion,$sqlComplicaciones))
                 or die('Error: ' . mysqli_error() . ' 623');
                 
              
              $Reintervencion = "<dt>Reintervencion: </dt> <dd>";
              if ($rowComplicaciones['B_Reintervencion'] == 1) //Hay estoma de derivación
              {
                     $sqlReintervencion="SELECT tabla_tipo_reintervencion.Tipo AS Tipo 
                                         FROM tabla_reintervencion
                                         INNER JOIN tabla_tipo_reintervencion
                                         ON tabla_reintervencion.Id_Tipo_Reintervencion = tabla_tipo_reintervencion.ID
                                         WHERE Id_Cirugia = '$IdCirugia'";
    
                     $rowReintervencion=mysqli_fetch_array(mysqli_query($conexion,$sqlReintervencion))
                      or die('Error: ' . mysqli_error() . ' 636');
                      
                     $Reintervencion = $Reintervencion . utf8_encode($rowReintervencion['Tipo']) . ".</dd>";
              }
              else
              {
                  $Reintervencion = $Reintervencion . "No ha habido.</dd>";
              }
              
              $Exitus_Intra = "<dt>Exitus intraoperatorio: </dt> <dd>";
              if ($rowComplicaciones['B_Exitus_Intraop'] == 1) //Hay estoma de derivación
              {
                     $sqlIntra="SELECT tabla_tipo_exitus_intraop.Tipo AS Tipo
                                FROM tabla_exitus_intraop
                                INNER JOIN  tabla_tipo_exitus_intraop
                                ON tabla_exitus_intraop.Id_Tipo_Exitus_Intraop = tabla_tipo_exitus_intraop.ID
                                WHERE Id_Cirugia = '$IdCirugia'";
    
                     $rowIntra=mysqli_fetch_array(mysqli_query($conexion,$sqlIntra))
                      or die('Error: ' . mysqli_error() . ' 655');
                      
                     $Exitus_Intra = $Exitus_Intra . "<em>Causa: </em>" . utf8_encode($rowIntra['Tipo']) . ".</dd>";
              }
              else
              {
                  $Exitus_Intra = $Exitus_Intra . "No ha habido.</dd>";
              }
              
              
              $Exitus_Post = "<dt>Exitus postoperatorio: </dt> <dd>";
              if ($rowComplicaciones['B_Exitus_Postop'] == 1) //Hay estoma de derivación
              {
                     $sqlPost="SELECT tabla_tipo_exitus_postop.Tipo AS Tipo 
                               FROM tabla_exitus_postop
                               INNER JOIN tabla_tipo_exitus_postop
                               ON  tabla_exitus_postop.Id_Tipo_Exitus_Postop = tabla_tipo_exitus_postop.ID
                               WHERE Id_Cirugia = '$IdCirugia'";
    
                     $rowPost=mysqli_fetch_array(mysqli_query($conexion,$sqlPost))
                      or die('Error: ' . mysqli_error() . ' 675');
                      
                     $Exitus_Post = $Exitus_Post . "<em>Causa: </em>" . utf8_encode($rowPost['Tipo']) . ".</dd>";
              }
              else
              {
                  $Exitus_Post = $Exitus_Post . "No ha habido.</dd>";
                  
                  
              }
              
              $B_Herida = "<dt>Herida: </dt> <dd>";
              if ($rowComplicaciones['B_Herida'] == 1) //Hay herida
                 {
                     $sqlHerida="SELECT tabla_tipo_herida.Tipo AS Tipo 
                                 FROM tabla_herida 
                                 INNER JOIN tabla_tipo_herida
                                 ON tabla_herida.Id_Tipo_Herida = tabla_tipo_herida.ID
                                 WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlHerida)
                        or die('Error: ' . mysqli_error() . ' 696');
                    
                    $numResults = mysqli_num_rows($rs);
                    $counter = 0;
              
                    while($rowHerida = mysqli_fetch_array($rs))
                    {
                         if (++$counter == $numResults) // last row
                         {
                           $B_Herida = $B_Herida . utf8_encode($rowHerida['Tipo']) . ".</dd>";
                         } 
                         else // not last row
                         {
                            $B_Herida = $B_Herida . utf8_encode($rowHerida['Tipo']) . ", ";
                         }          
                    }               
                     
                 }
                else 
                {
                    $B_Herida = $B_Herida . "No ha habido herida.</dd>";
                }
                
              $B_Perine= "<dt>Periné: </dt> <dd>";
              if ($rowComplicaciones['B_Perine'] == 1) //Hay periné
                 {
                     $sqlPerine="SELECT tabla_tipo_perine.Tipo AS Tipo
                                 FROM tabla_perine
                                 INNER JOIN  tabla_tipo_perine
                                 ON tabla_perine.Id_Tipo_Perine = tabla_tipo_perine.ID
                                 WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlPerine)
                        or die('Error: ' . mysqli_error() . ' 729');
                     
                     $numResults = mysqli_num_rows($rs);
                     $counter = 0;
              
                     while($rowPerine = mysqli_fetch_array($rs))
                     {
                         if (++$counter == $numResults) // last row
                         {
                           $B_Perine = $B_Perine . utf8_encode($rowPerine['Tipo']) . ".</dd>";
                         } 
                         else // not last row
                         {
                            $B_Perine = $B_Perine . utf8_encode($rowPerine['Tipo']) . ", ";
                         }          
                     }               
                     
                 }
                else 
                {
                    $B_Perine = $B_Perine . "No ha habido complicación en el periné.</dd>";
                }
                
              $B_Abdominales= "<dt>Abdominales: </dt> <dd>";
              if ($rowComplicaciones['B_Abdominales'] == 1) //Hay abdominales
                 {
                      $sqlAbdominales="SELECT tabla_tipo_abdominales.Tipo AS Tipo 
                                      FROM tabla_abdominales 
                                      INNER JOIN tabla_tipo_abdominales
                                      ON tabla_abdominales.Id_Tipo_Abdominales = tabla_tipo_abdominales.ID
                                      WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlAbdominales)
                        or die('Error: ' . mysqli_error() . ' 762');
                        
                        
                     $numResults = mysqli_num_rows($rs);
                     $counter = 0;
              
                     while($rowAbdominales = mysqli_fetch_array($rs))
                     {
                         if (++$counter == $numResults) // last row
                         {
                           $B_Abdominales = $B_Abdominales . utf8_encode($rowAbdominales['Tipo']) . ".</dd>";
                         } 
                         else // not last row
                         {
                            $B_Abdominales = $B_Abdominales . utf8_encode($rowAbdominales['Tipo']) . ", ";
                         }          
                     }
                 }
                else 
                {
                    $B_Abdominales = $B_Abdominales . "No ha habido complicación en los abdominales.</dd>";
                }
                
              $B_Anastomosis= "<dt>Anastomosis: </dt> <dd>";
              if ($rowComplicaciones['B_Anastomosis'] == 1) //Hay anastomosis
                 {                                                                           
                     $sqlAnastomosis="SELECT tabla_tipo_anastomosis_complicaciones.Tipo AS Tipo 
                                      FROM tabla_anastomosis_complicaciones 
                                      INNER JOIN tabla_tipo_anastomosis_complicaciones
                                      ON tabla_anastomosis_complicaciones.Id_Tipo_Anastomosis_Complicaciones = tabla_tipo_anastomosis_complicaciones.ID 
                                      WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlAnastomosis)
                        or die('Error: ' . mysqli_error() . ' 795');
                
                     $numResults = mysqli_num_rows($rs);
                     $counter = 0;
                     
                     while($rowAnastomosis = mysqli_fetch_array($rs))
                     {
                         if (++$counter == $numResults) // last row
                         {
                           $B_Anastomosis = $B_Anastomosis . utf8_encode($rowAnastomosis['Tipo']) . ".</dd>";
                         } 
                         else // not last row
                         {
                            $B_Anastomosis = $B_Anastomosis . utf8_encode($rowAnastomosis['Tipo']) . ", ";
                         }          
                     }                     
                 }
                else 
                {
                    $B_Anastomosis = $B_Anastomosis . "No ha habido anastomosis.</dd>";
                }
                
                
                $B_Otras= "<dt>Otras: </dt> <dd>";
              if ($rowComplicaciones['B_Otras'] == 1) //Hay anastomosis
                 {
                     $sqlOtrasC="SELECT tabla_otras_complicaciones.Id_Tipo_Otras_Complicaciones,tabla_tipo_otras_complicaciones.Tipo AS Tipo  
                                 FROM tabla_otras_complicaciones 
                                 INNER JOIN tabla_tipo_otras_complicaciones
                                 ON tabla_otras_complicaciones.Id_Tipo_Otras_Complicaciones = tabla_tipo_otras_complicaciones.ID
                                 WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlOtrasC)
                        or die('Error: ' . mysqli_error() . ' 828');
                        
                     $numResults = mysqli_num_rows($rs);
                     $counter = 0;
              
                     while($rowOtrasC = mysqli_fetch_array($rs))
                     {
                         if (++$counter == $numResults) // last row
                         {
                             
                             $B_Otras = $B_Otras . utf8_encode($rowOtrasC['Tipo']) . ".";
                           
                             $B_Otras = $B_Otras . "</dd>";
                           
                         } 
                         else // not last row
                         {
                            $B_Otras = $B_Otras . utf8_encode($rowOtrasC['Tipo']) . ", ";
                         }          
                     } 
                 }
                else 
                {
                    $B_Otras = $B_Otras . "No ha habido otras complicaciones.</dd>";
                } 
                
                
                $Complicaciones = $Reintervencion;
                $Complicaciones = $Complicaciones . "<br/>" . $Exitus_Intra;
                $Complicaciones = $Complicaciones . "<br/>" . $Exitus_Post;
                $Complicaciones = $Complicaciones . "<br/>" . $B_Herida;
                $Complicaciones = $Complicaciones . "<br/>" . $B_Perine;
                $Complicaciones = $Complicaciones . "<br/>" . $B_Abdominales;
                $Complicaciones = $Complicaciones . "<br/>" . $B_Anastomosis;
                $Complicaciones = $Complicaciones . "<br/>" . $B_Otras;
    
          } //End $rowComplicaciones['B_Complicaciones'] 
          else
          {
              $Complicaciones = $Complicaciones . "No ha habido complicaciones.</dd>";
          } 
          
            $B_Cirugia = $B_Cirugia . "<br/>" . "<p class=\"text-center\">CIRUGIA</p>";
            $B_Cirugia = $B_Cirugia . "<br/>" . $Tipo_Cirugia;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Fecha_Cirugia; 
            $B_Cirugia = $B_Cirugia . "<br/>" . $Fecha_Alta;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Cirujano_Principal;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Cirujano_Ayudante;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Tecnicas_Cirugia;
            $B_Cirugia = $B_Cirugia . "<br/>" . $B_Otras_Cirugia;
			$B_Cirugia = $B_Cirugia . "<br/>" . $Orientacion;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Exeresis_Meso;
            $B_Cirugia = $B_Cirugia . "<br/>" . $B_Otras_Resecciones;
             
            $B_Cirugia = $B_Cirugia . "<br/><br/>" . "<p class=\"text-center\">RESULTADOS</p>"; 
            $B_Cirugia = $B_Cirugia . "<br/>" . $ASA;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Hallazgos_Intraoperatorios;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Perforacion_Tumoral;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Tipo_Metast_Hepaticas;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Imp_Ovaricos;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Obstruccion;
            
            $B_Cirugia = $B_Cirugia . "<br/><br/>" . "<p class=\"text-center\">CARACTERISTICAS</p>";
            $B_Cirugia = $B_Cirugia . "<br/>" . $Via_Operacion;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Tiempo_Operacion;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Transfusiones;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Intencion_Operatoria;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Anastomosis;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Reservorio;
            $B_Cirugia = $B_Cirugia . "<br/>" . $Estoma_Derivacion;
            
            $B_Cirugia = $B_Cirugia . "<br/><br/>" . "<p class=\"text-center\">COMPLICACIONES</p>";
            
            
            $B_Cirugia = $B_Cirugia . $Complicaciones;
            
       
     
         
        
    }//end $rowCirugia['B_Cirugia']

   $B_Cirugia = $B_Cirugia . "</dl>" . "<br/>";

   /*echo(utf8_decode($B_Cirugia));   
   echo "<br>";*/
    
   $datos = $datos . utf8_decode($B_Cirugia);
   $datos = $datos . "<br/>";
    
/**********************  Patologica ********************************/
    
    $sqlTabla_Patologica = "SELECT * 
                            FROM tabla_patologica
                            WHERE Id_Paciente = '$IdPaciente'";
                            
    $rs = (mysqli_query($conexion,$sqlTabla_Patologica))
       or die('Error: ' . mysqli_error() . ' 958');
    
    $rowTabla_Patologica=mysqli_fetch_array($rs);
    
    
    $Patologica = "<dl class=\"dl-horizontal-verPaciente well  well-small\"> <p class=\"lead\">ANATOMÍA PATOLÓGICA</p> ";
    
    if(intval($rowTabla_Patologica['Estado']) == 2) //No se ha rellenado
    {
        $Patologica = $Patologica . "No se ha realizado.";
    }
    else if(intval($rowTabla_Patologica['Estado']) == 3)
    {
        $Patologica = $Patologica . "Pendiente de rellenar.";
    }
    else 
    {

          $sqlPatologica="SELECT anatomia_patologica.ID,  tabla_tipo_histologico.Tipo AS Histologico, anatomia_patologica.Id_Otros_Histologico,  tabla_tipo_t.Tipo AS T, tabla_tipo_n.Tipo AS N,tabla_tipo_m.Tipo AS M, anatomia_patologica.Glangios_Ais, anatomia_patologica.Glangios_Afec, tabla_estadio_tumor.Estadio AS Estadio_Patologico, anatomia_patologica.Id_Estadio_Sincronico,                    
                    tabla_margen.Tipo AS Margen_Distal, tabla_margen.Tipo AS Margen_Circunferencial, tabla_tipo_reseccion.Tipo AS Tipo_Res, tabla_tipo_regresion.Tipo AS Regresion,  tabla_tipo_calidad_meso.Tipo AS Meso_Cal             
                    FROM anatomia_patologica
                    INNER JOIN tabla_tipo_histologico 
                    ON  anatomia_patologica.Id_Histologico = tabla_tipo_histologico.ID
                    INNER JOIN tabla_tipo_t
                    ON anatomia_patologica.Id_T = tabla_tipo_t.ID
                    INNER JOIN tabla_tipo_n
                    ON anatomia_patologica.Id_N = tabla_tipo_n.ID
                    INNER JOIN tabla_tipo_m
                    ON anatomia_patologica.Id_M = tabla_tipo_m.ID
                    INNER JOIN tabla_estadio_tumor
                    ON anatomia_patologica.Id_Estadio_Patologico = tabla_estadio_tumor.ID
                    INNER JOIN tabla_margen
                    ON anatomia_patologica.Id_Margen_Distal = tabla_margen.ID
                    AND anatomia_patologica.Id_Margen_Circunferencial = tabla_margen.ID
                    INNER JOIN tabla_tipo_reseccion
                    ON anatomia_patologica.Id_Tipo_Res = tabla_tipo_reseccion.ID
                    INNER JOIN tabla_tipo_regresion
                    ON anatomia_patologica.Id_Regresion = tabla_tipo_regresion.ID
                    INNER JOIN tabla_tipo_calidad_meso
                    ON anatomia_patologica.Id_Meso_Cal = tabla_tipo_calidad_meso.ID                   
                    WHERE Id_Paciente = '$IdPaciente'";

                                              
        $rs = (mysqli_query($conexion,$sqlPatologica))
           or die('Error: ' . mysqli_error() . ' 1002');
        
        $rowPatologica=mysqli_fetch_array($rs);
    
        
        $IdPatologica = $rowPatologica['ID'];
        
        
        
         //Histologia
        $Tipo_Histologico = "<dt>Tipo histológico: </dt> <dd>" . utf8_encode($rowPatologica['Histologico']) . ".</dd>";
        
        if ($rowPatologica['Id_Otros_Histologico'] != null)
        {
            $sqlOtros_Histologico = "SELECT tabla_tipo_otros_histologico.Tipo
                                            FROM anatomia_patologica
                                            INNER JOIN tabla_tipo_otros_histologico
                                            ON anatomia_patologica.Id_Otros_Histologico = tabla_tipo_otros_histologico.ID
                                            WHERE Id_Paciente = '$IdPaciente'";
            
            
            $rs = (mysqli_query($conexion,$sqlOtros_Histologico))
           or die('Error: ' . mysqli_error() . ' 1024');
        
            $rowOtros_Histologico=mysqli_fetch_array($rs);
            
            $Otros_Histologico = "<dt>Otros histológico: </dt> <dd>";
            $Otros_Histologico = $Otros_Histologico . utf8_encode($rowOtros_Histologico['Tipo']) . ".</dd>";
            $Tipo_Histologico = $Tipo_Histologico . "<br/>" . $Otros_Histologico;
        }
        
        
        $Clasificación_TNM = "<dt>Clasificación TNM: </dt> <dd>"; 
        $T_Patologico = "<em>T: </em>" . utf8_encode($rowPatologica['T']);
        $N_Patologico = "<em> N: </em>" . utf8_encode($rowPatologica['N']); 
        $M_Patologico = "<em> M: </em>" . utf8_encode($rowPatologica['M']) . ".</dd>";
        
        $Clasificación_TNM = $Clasificación_TNM . "<br/>";
        $Clasificación_TNM = $Clasificación_TNM . $T_Patologico . "<br/>";
        $Clasificación_TNM = $Clasificación_TNM . $N_Patologico . "<br/>"; 
        $Clasificación_TNM = $Clasificación_TNM . $M_Patologico;
        
        $Ganglios_Aislados = "<dt>Nº de ganglios aislados: </dt> <dd>" . utf8_encode($rowPatologica['Glangios_Ais']) . ".</dd>";
        $Ganglios_Afectados = "<dt>Nº de ganglios afectados: </dt> <dd>" . utf8_encode($rowPatologica['Glangios_Afec']) . ".</dd>";
        $Estadio_Patologico = "<dt>Estadio patologico: </dt> <dd>" . utf8_encode($rowPatologica['Estadio_Patologico']) . ".</dd>";
    
 
          //Resección
        $Margen_Distal = "<dt>Margen distal: </dt> <dd>" . utf8_encode($rowPatologica['Margen_Distal']) . ".</dd>";
        $Margen_Circunferencial = "<dt>Margen circunferencial: </dt> <dd>". utf8_encode($rowPatologica['Margen_Circunferencial']) . ".</dd>";
        $Tipo_Reseccion = "<dt>Tipo resección: </dt> <dd>" . utf8_encode($rowPatologica['Tipo_Res']) . ".</dd>";
        $Tipo_Regresion = "<dt>Tipo regresión: </dt> <dd>" . utf8_encode($rowPatologica['Regresion']) . ".</dd>";
        
        $Estadio_Tumor_Sincronico = "<dt>Estadio Tumor Sincronico: </dt> <dd>";
        
        if ($rowPatologica['Id_Estadio_Sincronico'] != null)
        {
            $sqlEstadio_Tumor_Sincronico = "SELECT tabla_estadio_tumor.Estadio
                                            FROM anatomia_patologica
                                            INNER JOIN tabla_estadio_tumor
                                            ON anatomia_patologica.Id_Estadio_Sincronico = tabla_estadio_tumor.ID
                                            WHERE Id_Paciente = '$IdPaciente'";
            
            
            $rs = (mysqli_query($conexion,$sqlEstadio_Tumor_Sincronico))
           or die('Error: ' . mysqli_error() . ' 1067');
        
            $rowEstadio_Tumor_Sincronico=mysqli_fetch_array($rs);
            
            $Estadio_Tumor_Sincronico = $Estadio_Tumor_Sincronico . utf8_encode($rowEstadio_Tumor_Sincronico['Estadio']) . ".</dd>";
        }
        else 
        {
            $Estadio_Tumor_Sincronico = $Estadio_Tumor_Sincronico . "No existe tumor sincrónico.</dd>";
        }
        
        $Calidad_Mesorrecto = "<dt>Calidad mesorrecto: </dt> <dd>" . utf8_encode($rowPatologica['Meso_Cal']) . ".</dd>";
       
        $Patologica = $Patologica . "<br/>" . $Tipo_Histologico;
        $Patologica = $Patologica . "<br/>" . $Clasificación_TNM;
        $Patologica = $Patologica . "<br/>" . $Ganglios_Aislados;
        $Patologica = $Patologica . "<br/>" . $Ganglios_Afectados;
        $Patologica = $Patologica . "<br/>" . $Estadio_Patologico;
        $Patologica = $Patologica . "<br/>" . $Margen_Distal;
        $Patologica = $Patologica . "<br/>" . $Margen_Circunferencial;
        $Patologica = $Patologica . "<br/>" . $Tipo_Reseccion;
        $Patologica = $Patologica . "<br/>" . $Tipo_Regresion;
        $Patologica = $Patologica . "<br/>" . $Estadio_Tumor_Sincronico;
        $Patologica = $Patologica . "<br/>" . $Calidad_Mesorrecto;
        
        
    }

    $Patologica = $Patologica . "</dl>" . "<br/>";
    /*echo(utf8_decode($Patologica));   
    echo "<br>";*/
    
    $datos = $datos . utf8_decode($Patologica);
    $datos = $datos . "<br>";
    

   /**********************  Seguimiento ********************************/
     
      

    $sqlSegPaciente="SELECT * 
                     FROM seguimiento 
                     WHERE Id_Paciente = '$IdPaciente'";
    
    $rowSegPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlSegPaciente))
       or die('Error: ' . mysqli_error() . ' 1112');
    
    
    $IDSeguimiento=$rowSegPaciente["ID"];

    $Fecha_Revision = "<dt>Fecha de revisión: </dt> <dd>" . $rowSegPaciente["Fecha_Revision"] . "</dd>";
    
    
    $Seguimiento = "<dl class=\"dl-horizontal-verPaciente well  well-small\"> <p class=\"lead\">SEGUIMIENTO</p> ";
        
    /*********************RECIDIVA******************************/
    
    
    //Si hay recidiva se rellenan los datos
    
    $Recidiva = "<dt>Recidiva: </dt> <dd>";
    if($rowSegPaciente["B_Recidiva"]==1){
            
        $sqlRecidiva="SELECT * 
                      FROM tabla_recidiva
                      INNER JOIN tabla_seg_localiz_recidiva
                      ON tabla_recidiva.Id_tabla_seg_localiz_recidiva = tabla_seg_localiz_recidiva.ID
                      WHERE Id_Seguimiento='$IDSeguimiento'";
        
        $rowRecidiva=mysqli_fetch_array(mysqli_query($conexion,$sqlRecidiva))
             or die('Error: ' . mysqli_error() . ' 1137');
       
       $Fecha_Recidiva = "<em>Fecha recidiva: </em>" . $rowRecidiva["Fecha_Recidiva"];
       $Localizacion_Recidiva = "<em>Localización: </em>" . utf8_encode($rowRecidiva["Tipo"]) . ".";
       
       $Tratamiento_recidiva_local=["Tratamiento_recidiva_local"];
       $Cirugia_recidiva_curativa=$rowRecidiva["Cirugia_recidiva_curativa"];
       $tipo_cirugia_recidiva_local=$rowRecidiva["tipo_cirugia_recidiva_local"];
       
       if (intval($rowRecidiva["Intervencion"]) == 1)
       {
           $Intervencion_Recidiva = "<em>Intervención: </em>Se ha intervenido.";
       }
       else 
       {
           $Intervencion_Recidiva = "<em>Intervención: </em>No se ha intervenido.";
       }
       
       //$Recidiva = $Recidiva . "<br/>";
       $Recidiva = $Recidiva . $Fecha_Recidiva;
       $Recidiva = $Recidiva . "<br/> " . $Localizacion_Recidiva;
       $Recidiva = $Recidiva . "<br/> " . $Intervencion_Recidiva . "</dd>";
       
       $Recidiva = $Recidiva . "<br/> " . $Tratamiento_recidiva_local . "</dd>";
       $Recidiva = $Recidiva . "<br/> " . $Cirugia_recidiva_curativa . "</dd>";
       $Recidiva = $Recidiva . "<br/> " . $tipo_cirugia_recidiva_local . "</dd>";
   
       
    }
    else
    {
        $Recidiva = $Recidiva . "No ha sufrido recidiva.</dd>";
    }
    
    //echo(utf8_decode($Recidiva));   

    $Seguimiento = $Seguimiento . "<br/>" . $Recidiva . "<br/>";
    
/****************************METASTASIS**************************************/  
    
    
    $Metastasis = "<dt>Metástasis: </dt> <dd>";    
    
    //Si hay metástasis
    if($rowSegPaciente["B_Metastasis"]==1){
        
        $sqlMetastasis="SELECT * 
                        FROM tabla_metastasis 
                        INNER JOIN tabla_seg_localiz_metastasis
                        ON tabla_metastasis.Id_tabla_seg_localiz_metastasis = tabla_seg_localiz_metastasis.ID
                        WHERE Id_Seguimiento='$IDSeguimiento'";
        
        $rowMetastasis=mysqli_fetch_array(mysqli_query($conexion,$sqlMetastasis))
             or die('Error: ' . mysqli_error() . ' 1182');
             
        $Fecha_Metastasis = "<em>Fecha metástasis: </em>" . $rowMetastasis["Fecha_Metastasis"];
        $Localizacion_Metastasis = "<em>Localización: </em>" . utf8_encode($rowMetastasis["Tipo"]);
        
        if (intval($rowMetastasis["Intervencion"]) == 1)
       {
           $Intervencion_Metastasis = "<em>Intervención: </em>Se ha intervenido.";
       }
       else 
       {
           $Intervencion_Metastasis = "<em>Intervención: </em>No se ha intervenido.";
       }
       
       //$Metastasis = $Metastasis . "<br/>";
       $Metastasis = $Metastasis . $Fecha_Metastasis;
       $Metastasis = $Metastasis . "<br/> " . $Localizacion_Metastasis ;
       $Metastasis = $Metastasis . "<br/> " . $Intervencion_Metastasis . "</dd>";
   
       
    }
    else
    {
        $Metastasis = $Metastasis . "No ha sufrido metástasis.</dd>";
    }
    
    //echo(utf8_decode($Metastasis));   

    $Seguimiento = $Seguimiento . "<br/>" . $Metastasis . "<br/>";
        

/******************************SEGUNDO TUMOR*****************************************/

        $Segundo_Tumor = "<dt>Segundo tumor: </dt> <dd>";
        
        //Si hay segundo tumor 
        if($rowSegPaciente["B_Segundo_Tumor"]==1){
                    
            $sqlSegundoTumor="SELECT * 
                              FROM tabla_segundo_tumor 
                              INNER JOIN tabla_seg_localiz_segundo_tumor
                              ON tabla_segundo_tumor.Id_tabla_seg_localiz_segundo_tumor = tabla_seg_localiz_segundo_tumor.ID
                              WHERE Id_Seguimiento='$IDSeguimiento'";
            
            $rowSegundoTumor=mysqli_fetch_array(mysqli_query($conexion,$sqlSegundoTumor))
                 or die('Error: ' . mysqli_error() . ' 1227');    
             
            $Fecha_Segundo_Tumor = "<em>Fecha segundo tumor: </em>" . $rowSegundoTumor["Fecha_Segundo_Tumor"];
            $Localizacion_Segundo_Tumor = "<em>Localización: </em>" . utf8_encode($rowSegundoTumor["Tipo"]);
             
           if (intval($rowSegundoTumor["Intervencion"]) == 1)
           {
               $Intervencion_Segundo_Tumor = "<em>Intervención: </em>Se ha intervenido.";
           }
           else 
           {
               $Intervencion_Segundo_Tumor = "<em>Intervención: </em>No se ha intervenido.";
           }
           
           //$Segundo_Tumor = $Segundo_Tumor . "<br/>";
           $Segundo_Tumor = $Segundo_Tumor . $Fecha_Segundo_Tumor . "<br/>";
           $Segundo_Tumor = $Segundo_Tumor . "<br/> " . $Localizacion_Segundo_Tumor;
           $Segundo_Tumor = $Segundo_Tumor . "<br/> " . $Intervencion_Segundo_Tumor . "</dd>";
       
       
    }
    else
    {
        $Segundo_Tumor = $Segundo_Tumor . "No ha sufrido segundo tumor.</dd>";
    }
    
    //echo(utf8_decode($Segundo_Tumor));   

    $Seguimiento = $Seguimiento . "<br/>" . $Segundo_Tumor . "<br/>";

/*************************************ESTADO DEL PACIENTE****************************************/

        
        $Estado = "<dt>Estado: </dt> <dd>";

    
    //Si el paciente está muerto
        if($rowSegPaciente["B_Estado"]==2){
            
            $Estado = $Estado . "Muerto.";
            
            $sqlEstadoPaciente="SELECT * 
                                FROM tabla_estado 
                                WHERE Id_Seguimiento='$IDSeguimiento'";
            
            $rowEstadoPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlEstadoPaciente))
                 or die('Error: ' . mysqli_error() . ' 1273');
                 
            $Fecha_Muerte = "<em>Fecha de muerte: </em>" . $rowEstadoPaciente["Fecha_Muerte"];
            
            if(intval($rowEstadoPaciente["Relacion_Muerte"]) == 1)
            {
                $Causa_Muerte = "<em>Causa: </em>La muerte del paciente está relacionada con el cáncer.";
            }
            else 
            {
                $Causa_Muerte = "<em>Causa: </em>La muerte del paciente no está relacionada con el cáncer.";

            }
            
            //$Estado = $Estado . "<br/>";
            $Estado = $Estado . "<br/>" . $Fecha_Muerte;
            $Estado = $Estado . "<br/>" . $Causa_Muerte . "</dd>";
       
         }
        else 
        {
            $Estado = $Estado . "Vivo.</dd>";
        }
    
        //echo(utf8_decode($Estado));   

        $Seguimiento = $Seguimiento . "<br/>" . $Estado . "<br/>";
/*******************************IMPOSIBILIDAD DE SEGUIMIENTO************************************/


        $Imposibilidad = "<dt>Imposibilidad del seguimiento: </dt> <dd>";

    
    //Si hay imposibilidad, se carga la causa
        if($rowSegPaciente["B_Imposibilidad"]==1){
            
           $Imposibilidad = $Imposibilidad . "Existe imposibilidad de seguimiento.";
            $sqlImposibilidad="SELECT * 
                               FROM tabla_imposibilidad 
                               INNER JOIN tabla_seg_imposibilidad 
                               ON tabla_imposibilidad.Id_tabla_seg_imposibilidad = tabla_seg_imposibilidad.ID
                               WHERE Id_Seguimiento='$IDSeguimiento'";
            
            $rowImposibilidad=mysqli_fetch_array(mysqli_query($conexion,$sqlImposibilidad))
                 or die('Error: ' . mysqli_error() . ' 1317');
        
            $Causa_Imposibilidad = "<em>Causa: </em>" . utf8_encode($rowImposibilidad["Causa"]) . ".</dd>";  
            
            //$Imposibilidad = $Imposibilidad . "<br/>";
            $Imposibilidad = $Imposibilidad . "<br/>" . $Causa_Imposibilidad ;
        
        }
        else 
        {
            $Imposibilidad = $Imposibilidad . "No hay imposibilidad de seguimiento.</dd>";
        }

    //echo(utf8_decode($Imposibilidad));   

    $Seguimiento = $Seguimiento . "<br/>" . $Imposibilidad;
 
 /*******************************COMENTARIOS ADICIONALES************************************/
    
    $Comentarios_Adicionales = "<dt>Comentarios_Adicionales: </dt> <dd>" . $rowSegPaciente["Comentarios_Adicionales"] . "</dd>";
    $Seguimiento = $Seguimiento . "<br/>" . $Comentarios_Adicionales;
    
    $Seguimiento = $Seguimiento . "</dl>" . "<br/>";
    
    /*echo(utf8_decode($Seguimiento));   
    echo "<br>";*/

    $datos = $datos . utf8_decode($Seguimiento);
    $datos = $datos . "<br>";
    
    mysqli_close($conexion);
        
    echo utf8_encode($datos);  

?>