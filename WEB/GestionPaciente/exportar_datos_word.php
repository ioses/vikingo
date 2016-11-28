<?php
    session_start();
    require_once ("../BDD/conexion.php");

    //Selección del ID del Hospital para identificar correctamente al paciente

	$sqlIdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='".$_SESSION["NombreHospital"]."'";

	$result=mysqli_query($conexion,$sqlIdHospital);
	$row=mysqli_fetch_array($result);

    $idHospital=$row[0];
    $idHospital=intval($idHospital);

    $NHC = $_POST['NHC'];
    
    $NHC_Inicial = "NHC: " . utf8_encode($_POST['NHC']);
    
    $fecha = date("d-m-Y"); 
    
    header('Content-type: application/vnd.ms-word'); 
    header("Content-Disposition: attachment; filename=datos_$NHC.doc"); 
    header("Pragma: no-cache"); 
    header("Expires: 0");

    echo "<html>";
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
    echo "<body>";
    

    $sqlIdentPaciente="SELECT identificador_paciente.ID, identificador_paciente.NHC, identificador_paciente.Fecha_Nacimiento, tabla_sexo.Sexo 
          FROM identificador_paciente 
          INNER JOIN tabla_sexo
          ON identificador_paciente.Id_Sexo = tabla_sexo.ID 
          WHERE identificador_paciente.NHC = AES_ENCRYPT('$NHC','$claveNHC') AND identificador_paciente.Id_Hospital = '$idHospital'";
    
    $rowIdentPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlIdentPaciente))
       or die('Error: ' . mysqli_error());
       
/************************ inicial **********************/  
    
     //datos iniciales
    
     
    $Inicial = "INICIAL: ";
     
    $Fecha_Nacimiento = "Fecha de nacimiento: " . $rowIdentPaciente['Fecha_Nacimiento'];
    $Sexo = "Sexo: " . utf8_encode($rowIdentPaciente['Sexo']);
    
    $IdPaciente = $rowIdentPaciente['ID'];

    $sqlInicial="SELECT inicial.ID AS ID, inicial.Localizacion, inicial.B_Sincro, inicial.B_Tec_ECO, inicial.Tec_TAC, inicial.B_Tec_RMN, tabla_integ_esfint.Tipo AS integ_esfint, inicial.B_Inv_Vecinos, inicial.B_Metast_Inicial, tabla_estadio_tumor.Estadio AS EstadioRadiologico
                 FROM inicial
                 INNER JOIN tabla_integ_esfint
                 ON  inicial.Id_Integ_Esfint = tabla_integ_esfint.ID
                 INNER JOIN tabla_estadio_tumor
                 ON  inicial.Id_Estadio_Radio = tabla_estadio_tumor.ID
                 WHERE Id_Paciente = '$IdPaciente'";
    $rowInicial=mysqli_fetch_array(mysqli_query($conexion,$sqlInicial))
       or die('Error: ' . mysqli_error());

     /**** Localización ***/

    $Localizacion = "Localización: " . $rowInicial['Localizacion'] . " cm.";
    $Sincro = "Tumor sincrónico de colon: ";

    $IdInicial = $rowInicial['ID'];
    
    if ($rowInicial['B_Sincro'] == 0)
    {
        $Sincro = $Sincro . "No hay tumor sincrónico de colon.";
    }
    else //Hay tumor sincrónico. miramos cual hay
    {
       $Sincro = $Sincro . "Tipo: ";
        

        $sqlSincro="SELECT tabla_colon.Colon 
                    FROM tabla_Sincro 
                    INNER JOIN tabla_colon
                    ON tabla_Sincro.Id_Colon = tabla_colon.ID
                    WHERE Id_Inicial = '$IdInicial'";
                            

        $rs=mysqli_query($conexion,$sqlSincro)
          or die('Error: ' . mysqli_error());
          
        $numResults = mysqli_num_rows($rs);
        $counter = 0;
            
         while($rowSincro = mysqli_fetch_array($rs))
         {
             if (++$counter == $numResults) // last row
             {
               $Sincro = $Sincro . $rowSincro['Colon'] . ".";
             } 
             else // not last row
             {
               $Sincro = $Sincro . $rowSincro['Colon'] . ", ";
             }  
         }   
    }
    
    
     /*** Radiologica ***/ 
     
    $EstadioRadiologico = "Estadío radiológico: " . $rowInicial['EstadioRadiologico'];    
    
    $ECO = "Ecografía: ";
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
       or die('Error: ' . mysqli_error());
       
        $ECO = $ECO . "<br>";
        $ECO = $ECO . "&nbsp T: " . utf8_encode($rowECO['Tipo_T']);
        $ECO = $ECO . "<br>";
        $ECO = $ECO . "&nbsp N: " . utf8_encode($rowECO['Tipo_N']);
    }
    else //No hay técnica ECO
    {
        $ECO = $ECO . "No se ha realizado la técnica de ECO.";
    }
    
    $TAC = "TAC: ";
     if ($rowInicial['Tec_TAC'] == 1) //Hay tecnica TAC
    {
        $TAC = $TAC . "Se ha realizado la técnica de TAC";
    }
     else
     {
         $TAC = $TAC . "No se ha realizado la técnica de TAC";
     }
    
    
    $RMN = "Resonancia magnética: ";
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
            or die('Error: ' . mysqli_error());

        $RMN = $RMN . "<br>";
        $RMN = $RMN . "&nbsp T: " . utf8_encode($rowRMN['Tipo_T']);
        $RMN = $RMN . "<br>";
        $RMN = $RMN . "&nbsp N: " . utf8_encode($rowRMN['Tipo_N']);
        $RMN = $RMN . "<br>";
        $RMN = $RMN . "&nbsp Distancias al tumor: " . utf8_encode($rowRMN['Dist_Tumor']);
        $RMN = $RMN . "<br>";
        $RMN = $RMN . "&nbsp Distancia a adenopatía: " . utf8_encode($rowRMN['Dist_Adenopatia']);
    }
    else 
    {
        $RMN = $RMN . "No se ha realizado la técnica de RMN.";
    }
    
    
    /****** Otras afecciones ****/ 
    $Integ_Esfinter = "Integridad del aparato esfinteriano: " . utf8_encode($rowInicial['integ_esfint']);
    
    $MetastasisInicial = "Metástasis inicial: ";
    if ($rowInicial['B_Metast_Inicial'] == 1) //Hay metástasis
    {
        $sqlMetast="SELECT tabla_organos_metastasis.Organo 
                    FROM tabla_metast_inicial
                    INNER JOIN tabla_organos_metastasis
                    ON tabla_metast_inicial.Id_Organo = tabla_organos_metastasis.ID
                    WHERE Id_Inicial = '$IdInicial'";
    
        $rs=mysqli_query($conexion,$sqlMetast)
          or die('Error: ' . mysqli_error());
        
        $numResults = mysqli_num_rows($rs);
        $counter = 0;
         
         $MetastasisInicial = $MetastasisInicial . "Localización: "; 
         while($rowVecino = mysqli_fetch_array($rs))
         {
             if (++$counter == $numResults) // last row
             {
               $MetastasisInicial = $MetastasisInicial . utf8_encode($rowVecino['Organo']) . ".";
             } 
             else // not last row
             {
                $MetastasisInicial = $MetastasisInicial . utf8_encode($rowVecino['Organo']) . ", ";        
             }  
         } 
    }
    else
    {
        $MetastasisInicial = $MetastasisInicial . "No hay metástasis inicial.";
    }
    
    
    $Vecinos = "Invasión de órganos vecinos: ";
    if ($rowInicial['B_Inv_Vecinos'] == 1) //Hay metástasis
    {
        $sqlSVecinos="SELECT tabla_organos_vecinos.Organos 
                    FROM tabla_vecinos
                    INNER JOIN tabla_organos_vecinos
                    ON tabla_vecinos.Id_Organos = tabla_organos_vecinos.ID
                    WHERE Id_Inicial = '$IdInicial'";
    
        $rs=mysqli_query($conexion,$sqlSVecinos)
          or die('Error: ' . mysqli_error());
          
        $numResults = mysqli_num_rows($rs);
        $counter = 0;
         
         $Vecinos = $Vecinos . "Localización: "; 
          
         while($rowVecino = mysqli_fetch_array($rs))
         {
             if (++$counter == $numResults) // last row
             {
               $Vecinos = $Vecinos . utf8_encode($rowVecino['Organos']) . ".";
             } 
             else // not last row
             {
                $Vecinos = $Vecinos . utf8_encode($rowVecino['Organos']) . ", ";        
             }          
         }
    }
    else
    {
        $Vecinos = $Vecinos . "No hay invasión de óganos vecinos.";
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
    $Inicial = $Inicial . "<br>" . $NHC_Inicial;
    $Inicial = $Inicial . "<br>" . $Fecha_Nacimiento;
    $Inicial = $Inicial . "<br>" . $Sexo;
    
    /**** Localización ***/
    $Inicial = $Inicial . "<br>" . $Localizacion;
    $Inicial = $Inicial . "<br>" . $Sincro;
    
     /*** Radiologica ***/ 
    $Inicial = $Inicial . "<br>" . $EstadioRadiologico;
    $Inicial = $Inicial . "<br>" . $ECO;
    $Inicial = $Inicial . "<br>" . $TAC;
    $Inicial = $Inicial . "<br>" . $RMN;
    
    /****** Otras afecciones ****/ 
    $Inicial = $Inicial . "<br>" . $Integ_Esfinter;
    $Inicial = $Inicial . "<br>" . $MetastasisInicial;
    $Inicial = $Inicial . "<br>" . $Vecinos;
    $Inicial = $Inicial . "<br>";
    
    
    echo(utf8_decode($Inicial));   
    echo "<br>";
     
/**********************  Tratamiento ********************************/
    
    $Tratamiento = "TRATAMIENTO: ";
    
    $sqlTratamiento="SELECT * FROM tratamiento WHERE Id_Paciente = '$IdPaciente'";
    
    $rowTratamiento=mysqli_fetch_array(mysqli_query($conexion,$sqlTratamiento))
       or die('Error: ' . mysqli_error());
    
    $IdTratamiento = $rowTratamiento['ID'];
    
    
     //Tratamiendo neoadyuvante
    $B_Tto_Neo = "Tratamiento neoadyuvante: ";

    
    if(intval($rowTratamiento['B_Tto_Neo']) == 1) //Ha recibido tratamiento neoadyuvante
    {
        $sqlNeo="SELECT tabla_tipo_neo.Tipo AS Tipo  
                 FROM tabla_neo
                 INNER JOIN tabla_tipo_neo
                 ON tabla_neo.Id_Tipo_Neo = tabla_tipo_neo.ID
                 WHERE Id_Tratamiento = '$IdTratamiento'";
    
        $rowNeo=mysqli_fetch_array(mysqli_query($conexion,$sqlNeo))
       or die('Error: ' . mysqli_error());
       
        $B_Tto_Neo = $B_Tto_Neo . "Tratamiento neoadyuvante recibido.";
        $Tipo_TTO_Neoadyuvante = "Tipo de tratamiento: " . utf8_encode($rowNeo['Tipo']);
        $B_Tto_Neo = $B_Tto_Neo . "<br>" . $Tipo_TTO_Neoadyuvante . "<br>";
    }
    else if ($rowTratamiento['B_Tto_Neo'] == 2) //Ha recibido tratamiento neoadyuvante
    {
        $sqlNoNeo="SELECT tabla_tipo_no_neo.Tipo AS Tipo 
                   FROM tabla_no_neo
                   INNER JOIN tabla_tipo_no_neo
                   ON tabla_no_neo.Id_Tipo_No_Neo = tabla_tipo_no_neo.ID
                   WHERE Id_Tratamiento = '$IdTratamiento'";
    
        $rowNoNeo=mysqli_fetch_array(mysqli_query($conexion,$sqlNoNeo))
       or die('Error: ' . mysqli_error());
       
       $B_Tto_Neo = $B_Tto_Neo . "No se ha recibido tratamiento neoadyuvante." . "<br>";
        
        $Tipo_TTO_Neoadyuvante = "Causa: " . utf8_encode($rowNoNeo['Tipo']);
        
        $B_Tto_Neo = $B_Tto_Neo . $Tipo_TTO_Neoadyuvante . "<br>";
    
    }

    
    //Tratamiendo adyuvante
      
    $TTO_Adyuvante = "Tratamiento adyuvante: ";
    if(intval($rowTratamiento['B_Tto_Ady']) == 0) //No se ha rellenado el tratamiento Adyuvante
    {
        $TTO_Adyuvante = $TTO_Adyuvante . "Está pendiente por rellenar.";
    }
    else if (intval($rowTratamiento['B_Tto_Ady']) == 1) //Hay tratamiento adyuvante
    {
        $sqlAdy="SELECT tabla_tipo_ady.Tipo AS Tipo 
                 FROM tabla_ady 
                 INNER JOIN tabla_tipo_ady
                 ON tabla_ady.Id_Tipo_Ady = tabla_tipo_ady.ID
                 WHERE Id_Tratamiento = '$IdTratamiento'";
    
        $rowAdy=mysqli_fetch_array(mysqli_query($conexion,$sqlAdy))
       or die('Error: ' . mysqli_error());
       
       $TTO_Adyuvante = $TTO_Adyuvante . "Tratamiento adyuvante recibido.";
       $Tipo_Adyuvante = "Tipo de tratamiento: " . utf8_encode($rowAdy['Tipo']);
       $TTO_Adyuvante = $TTO_Adyuvante . "<br>" . $Tipo_Adyuvante . "<br>";
   
    }
    else
    {
        $TTO_Adyuvante = $TTO_Adyuvante . "No ha recibido tratamiento adyuvante.";
    }
    
    
    $Tratamiento = $Tratamiento . "<br>";
    $Tratamiento = $Tratamiento . $B_Tto_Neo . "<br>";
    $Tratamiento = $Tratamiento . $TTO_Adyuvante . "<br>";
    
   /* echo("B_Tto_Neo " . $B_Tto_Neo . ", Tipo_TTO_Neoadyuvante " . $Tipo_TTO_Neoadyuvante);   
    echo "<br>";
    echo("TTO_Adyuvante " . $TTO_Adyuvante);
    echo "<br>";
    echo "<br>";*/
    
    echo(utf8_decode($Tratamiento));   
    echo "<br>";
    
/**********************  Cirugia ********************************/
    
   
     //Cirugia
        
    $sqlCirugia="SELECT * 
                 FROM cirugia 
                 WHERE Id_Paciente = '$IdPaciente'";
    
    $rowCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlCirugia))
       or die('Error: ' . mysqli_error());
    
    $IdCirugia = $rowCirugia['ID'];
      
    $B_Cirugia = "CIRUGIA: ";
    
    if(intval($rowCirugia['B_Cirugia']) == 2) //No se ha realizado cirugía
    {
        $sqlNoCirugia="SELECT tabla_motivos_no_cirugia.Motivo AS Motivo 
                       FROM tabla_no_cirugia 
                       INNER JOIN tabla_motivos_no_cirugia
                       ON tabla_no_cirugia.Id_Motivo = tabla_motivos_no_cirugia.ID
                       WHERE Id_Cirugia = '$IdCirugia'";
    
        $rowNoCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlNoCirugia))
       or die('Error: ' . mysqli_error());
       
        $B_Cirugia = $B_Cirugia . "No se ha realizado la cirugía por el motivo: ";
        $B_Cirugia = $B_Cirugia . utf8_encode($rowNoCirugia['Motivo']);
        
    }
    else if (intval($rowCirugia['B_Cirugia']) == 0)
    {
        $B_Cirugia = $B_Cirugia . "No se ha realizado cirugía.";
    }
    
    else //Se ha realizado cirugia
    {
          
         $sqlSiCirugia="SELECT tabla_cirugia.Fecha_Intervencion, tabla_cirugia.Fecha_Alta, tabla_cirugia.Cirujano, tabla_cirugia.Ayudante, tabla_planificacion.Tipo AS Planificacion, tabla_tecnicas.Tipo AS Tecnicas, tabla_cirugia.B_Otra_Tecnica, tabla_exeresis_meso.Tipo AS Exeresis_Meso, tabla_cirugia.B_Otras_Resecciones,
		 tabla_cirugia.Orientacion AS Orientacion
                       FROM tabla_cirugia
                       INNER JOIN tabla_planificacion
                       ON tabla_cirugia.Id_Planificacion = tabla_planificacion.ID
                       INNER JOIN tabla_tecnicas
                       ON tabla_cirugia.Id_Tecnica = tabla_tecnicas.ID
                       INNER Join tabla_exeresis_meso
                       ON tabla_cirugia.Id_Exeresis_Meso = tabla_exeresis_meso.ID
                       WHERE Id_Cirugia = '$IdCirugia'";
    
        $rowSiCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlSiCirugia))
       or die('Error: ' . mysqli_error());
       
        $Tipo_Cirugia = "Tipo de cirugía: " . utf8_encode($rowSiCirugia['Planificacion']);
        $Fecha_Cirugia = "Fecha de la cirugía: " . $rowSiCirugia['Fecha_Intervencion'];
        $Fecha_Alta = "";
        
        if($rowSiCirugia['Fecha_Alta'] == '0000-00-00' || $FechaAlta==null) //No se ha rellenado la fecha
        {
            $Fecha_Alta = "Fecha de Alta: Pendiente de rellenar."; 
        }
        else 
        {
            $Fecha_Alta = "Fecha de Alta: " . $rowSiCirugia['Fecha_Alta'];
        }
        
        $Cirujano_Principal = "Cirujano: " . utf8_encode($rowSiCirugia['Cirujano']);
        $Cirujano_Ayudante = "Ayudante: " . utf8_encode($rowSiCirugia['Ayudante']);
        
        $Tecnicas_Cirugia = "Técnica quirúrgica: " . utf8_encode($rowSiCirugia['Tecnicas']);
        
        
        $B_Otras_Cirugia = "Otra técnicas cirugía";
        if ($rowSiCirugia['B_Otra_Tecnica'] == 1)
        {
            $sqlOtraTecnica="SELECT tabla_tipo_otras_tecnicas.Tipo AS Tipo 
                             FROM tabla_otras_tecnicas 
                             INNER JOIN tabla_tipo_otras_tecnicas
                             ON  tabla_otras_tecnicas.Id_Tipo_Otras_Tecnicas = tabla_tipo_otras_tecnicas.ID 
                             WHERE Id_Cirugia = '$IdCirugia'";
            $rs=mysqli_query($conexion,$sqlOtraTecnica)
              or die('Error: ' . mysqli_error());
              
            $numResults = mysqli_num_rows($rs);
            $counter = 0;
              

            while($rowOtrasCirugia = mysqli_fetch_array($rs))
            {
                 if (++$counter == $numResults) // last row
                 {
                   $B_Otras_Cirugia = $B_Otras_Cirugia . $rowOtrasCirugia['Tipo'] . ".";
                 } 
                 else // not last row
                 {
                    $B_Otras_Cirugia = $B_Otras_Cirugia . $rowOtrasCirugia['Tipo'] . ", ";
                 }          
           }
        }
        else 
        {
             $B_Otras_Cirugia = $B_Otras_Cirugia . "No se han realizado otras técnicas de cirugía.";
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
		
        $Exeresis_Meso = "Exéresis del mesorrecto: " . $rowSiCirugia['Exeresis_Meso'];
        
        $B_Otras_Resecciones = "Resecciones: ";
        if ($rowSiCirugia['B_Otras_Resecciones'] == 1)
        {
            $sqlOtrasResecciones="SELECT tabla_tipo_otras_resecciones.Tipo AS Tipo 
                                 FROM tabla_otras_resecciones 
                                 INNER JOIN tabla_tipo_otras_resecciones
                                 ON  tabla_otras_resecciones.Id_Tipo_Otras_Resecciones = tabla_tipo_otras_resecciones.ID 
                                 WHERE Id_Cirugia = '$IdCirugia'";

            $rs=mysqli_query($conexion,$sqlOtrasResecciones)
              or die('Error: ' . mysqli_error());
              
            $numResults = mysqli_num_rows($rs);
            $counter = 0;
              
            $B_Otras_Resecciones = "Otras resecciones: ";

            while($rowOtrasResecciones = mysqli_fetch_array($rs))
            {
                 if (++$counter == $numResults) // last row
                 {
                   $B_Otras_Resecciones = $B_Otras_Resecciones . $rowOtrasResecciones['Tipo'] . ".";
                 } 
                 else // not last row
                 {
                    $B_Otras_Resecciones = $B_Otras_Resecciones . $rowOtrasResecciones['Tipo'] . ", ";
                 }          
           }
        }
        else 
        {
             $B_Otras_Resecciones = $B_Otras_Resecciones . "No ha habido otras resecciones.";
        }
        
        
        
        //Resultados
        
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
           or die('Error: ' . mysqli_error());
          
          $ASA = "ASA: " . $rowCaracteristicas['Asa'];
          $Hallazgos_Intraoperatorios = "Hallazgos Intraoperatorios: " . $rowCaracteristicas['Hallazgos_Intra'];        
          $Perforacion_Tumoral = "Perforacion tumoral: ";
          if(intval($rowCaracteristicas['Perforacion_Tumoral']) == 0)
          {
              $Perforacion_Tumoral = $Perforacion_Tumoral . "No ha habido.";
          }
          else
          {
              $Perforacion_Tumoral = $Perforacion_Tumoral . "Ha habido.";
          }
          
          $Tipo_Metast_Hepaticas = "Metástasis hepáticas: " . utf8_encode($rowCaracteristicas['Metast_Hepaticas']);
 
          $Imp_Ovaricos = "Implantes ováricos: ";
          if(intval($rowCaracteristicas['Implantes_Ovaricos']) == 0)
          {
              $Imp_Ovaricos = $Imp_Ovaricos . "No ha habido.";
          }
          else
          {
              $Imp_Ovaricos = $Imp_Ovaricos . "Ha habido.";
          }
          
          
          $Obstruccion = "Obstrucción: ";
          if(intval($rowCaracteristicas['Obstruccion']) == 0)
          {
              $Obstruccion = $Obstruccion . "No ha habido.";
          }
          else
          {
              $Obstruccion = $Obstruccion . "Ha habido.";
          }
          
          
         
          //Caracteristicas
         
         $Via_Operacion = "Vía operación: " . utf8_encode($rowCaracteristicas['Via_Operacion']);
         $Tiempo_Operacion = "Tiempo operación: " . intval($rowCaracteristicas['Tiempo_operatorio']) . " min.";
         $Transfusiones = "Transfusiones: " . intval($rowCaracteristicas['Transfusion']);
         $Intencion_Operatoria = "Intención operatoria: " . $rowCaracteristicas['Intencion'];
         $Anastomosis = "Anastomosis: " . utf8_encode($rowCaracteristicas['Anastomosis']);
         $Reservorio = "Reservorio: " . utf8_encode($rowCaracteristicas['Reservorio']);
         
         $Estoma_Derivacion = "Estoma derivación: ";
       
         if ($rowCaracteristicas['B_Estoma_Derivacion'] == 1) //Hay estoma de derivación
         {
             $sqlEstoma="SELECT tabla_tipo_estoma_derivacion.Tipo AS Tipo 
                         FROM tabla_estoma
                         INNER JOIN tabla_tipo_estoma_derivacion
                         ON  tabla_estoma.Id_Tipo_Estoma = tabla_tipo_estoma_derivacion.ID
                         WHERE Id_Cirugia = '$IdCirugia'";

             $rowEstoma=mysqli_fetch_array(mysqli_query($conexion,$sqlEstoma))
               or die('Error: ' . mysqli_error());
   
             $Estoma_Derivacion = $Estoma_Derivacion . utf8_encode($rowEstoma['Tipo']);
         }
         else
         {
             $Estoma_Derivacion = $Estoma_Derivacion . "No ha habido.";
         }
         
         
          //Complicaciones
          
          $sqlIsComplicaciones="SELECT *
                                FROM tabla_complicaciones 
                                WHERE Id_Cirugia = '$IdCirugia'";

          $rowIsComplicaciones=mysqli_fetch_array(mysqli_query($conexion,$sqlIsComplicaciones))
           or die('Error: ' . mysqli_error());
         
          $Complicaciones = "";
          if ($rowIsComplicaciones['B_Complicaciones'] == 1) //Hay complicaciones
          {
              $sqlComplicaciones="SELECT * 
                                  FROM tabla_tipo_complicaciones 
                                  WHERE Id_Cirugia = '$IdCirugia'";
    
              $rowComplicaciones=mysqli_fetch_array(mysqli_query($conexion,$sqlComplicaciones))
                 or die('Error: ' . mysqli_error());
                 
              
              $Reintervencion = "Reintervencion: ";
              if ($rowComplicaciones['B_Reintervencion'] == 1) //Hay estoma de derivación
              {
                     $sqlReintervencion="SELECT tabla_tipo_reintervencion.Tipo AS Tipo 
                                         FROM tabla_reintervencion
                                         INNER JOIN tabla_tipo_reintervencion
                                         ON tabla_reintervencion.Id_Tipo_Reintervencion = tabla_tipo_reintervencion.ID
                                         WHERE Id_Cirugia = '$IdCirugia'";
    
                     $rowReintervencion=mysqli_fetch_array(mysqli_query($conexion,$sqlReintervencion))
                      or die('Error: ' . mysqli_error());
                      
                     $Reintervencion = $Reintervencion . utf8_encode($rowReintervencion['Tipo']);
              }
              else
              {
                  $Reintervencion = $Reintervencion . "No ha habido.";
              }
              
              $Exitus_Intra = "Exitus intraoperatorio: ";
              if ($rowComplicaciones['B_Exitus_Intraop'] == 1) //Hay estoma de derivación
              {
                     $sqlIntra="SELECT tabla_tipo_exitus_intraop.Tipo AS Tipo
                                FROM tabla_exitus_intraop
                                INNER JOIN  tabla_tipo_exitus_intraop
                                ON tabla_exitus_intraop.Id_Tipo_Exitus_Intraop = tabla_tipo_exitus_intraop.ID
                                WHERE Id_Cirugia = '$IdCirugia'";
    
                     $rowIntra=mysqli_fetch_array(mysqli_query($conexion,$sqlIntra))
                      or die('Error: ' . mysqli_error());
                      
                     $Exitus_Intra = "Causa del " . $Exitus_Intra . utf8_encode($rowIntra['Tipo']);
              }
              else
              {
                  $Exitus_Intra = $Exitus_Intra . "No ha habido.";
              }
              
              
              $Exitus_Post = "Exitus postoperatorio: ";
              if ($rowComplicaciones['B_Exitus_Postop'] == 1) //Hay estoma de derivación
              {
                     $sqlPost="SELECT tabla_tipo_exitus_postop.Tipo AS Tipo 
                               FROM tabla_exitus_postop
                               INNER JOIN tabla_tipo_exitus_postop
                               ON  tabla_exitus_postop.Id_Tipo_Exitus_Postop = tabla_tipo_exitus_postop.ID
                               WHERE Id_Cirugia = '$IdCirugia'";
    
                     $rowPost=mysqli_fetch_array(mysqli_query($conexion,$sqlPost))
                      or die('Error: ' . mysqli_error());
                      
                     $Exitus_Post = "Causa del " . $Exitus_Post . utf8_encode($rowPost['Tipo']);
              }
              else
              {
                  $Exitus_Post = $Exitus_Post . "No ha habido.";
                  
                  
              }
              
              $B_Herida = "Herida: ";
              if ($rowComplicaciones['B_Herida'] == 1) //Hay herida
                 {
                     $sqlHerida="SELECT tabla_tipo_herida.Tipo AS Tipo 
                                 FROM tabla_herida 
                                 INNER JOIN tabla_tipo_herida
                                 ON tabla_herida.Id_Tipo_Herida = tabla_tipo_herida.ID
                                 WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlHerida)
                        or die('Error: ' . mysqli_error());
                    
                    $numResults = mysqli_num_rows($rs);
                    $counter = 0;
              
                    while($rowHerida = mysqli_fetch_array($rs))
                    {
                         if (++$counter == $numResults) // last row
                         {
                           $B_Herida = $B_Herida . utf8_encode($rowHerida['Tipo']) . ".";
                         } 
                         else // not last row
                         {
                            $B_Herida = $B_Herida . utf8_encode($rowHerida['Tipo']) . ", ";
                         }          
                    }               
                     
                 }
                else 
                {
                    $B_Herida = $B_Herida . "No ha habido herida.";
                }
                
              $B_Perine= "Periné: ";
              if ($rowComplicaciones['B_Perine'] == 1) //Hay periné
                 {
                     $sqlPerine="SELECT tabla_tipo_perine.Tipo AS Tipo
                                 FROM tabla_perine
                                 INNER JOIN  tabla_tipo_perine
                                 ON tabla_perine.Id_Tipo_Perine = tabla_tipo_perine.ID
                                 WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlPerine)
                        or die('Error: ' . mysqli_error());
                     
                     $numResults = mysqli_num_rows($rs);
                     $counter = 0;
              
                     while($rowPerine = mysqli_fetch_array($rs))
                     {
                         if (++$counter == $numResults) // last row
                         {
                           $B_Perine = $B_Perine . utf8_encode($rowPerine['Tipo']) . ".";
                         } 
                         else // not last row
                         {
                            $B_Perine = $B_Perine . utf8_encode($rowPerine['Tipo']) . ", ";
                         }          
                     }               
                     
                 }
                else 
                {
                    $B_Perine = $B_Perine . "No ha habido complicación en el periné.";
                }
                
              $B_Abdominales= "Abdominales: ";
              if ($rowComplicaciones['B_Abdominales'] == 1) //Hay abdominales
                 {
                      $sqlAbdominales="SELECT tabla_tipo_abdominales.Tipo AS Tipo 
                                      FROM tabla_abdominales 
                                      INNER JOIN tabla_tipo_abdominales
                                      ON tabla_abdominales.Id_Tipo_Abdominales = tabla_tipo_abdominales.ID
                                      WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlAbdominales)
                        or die('Error: ' . mysqli_error());
                        
                        
                     $numResults = mysqli_num_rows($rs);
                     $counter = 0;
              
                     while($rowAbdominales = mysqli_fetch_array($rs))
                     {
                         if (++$counter == $numResults) // last row
                         {
                           $B_Abdominales = $B_Abdominales . utf8_encode($rowAbdominales['Tipo']) . ".";
                         } 
                         else // not last row
                         {
                            $B_Abdominales = $B_Abdominales . utf8_encode($rowAbdominales['Tipo']) . ", ";
                         }          
                     }
                 }
                else 
                {
                    $B_Abdominales = $B_Abdominales . "No ha habido complicación en los abdominales.";
                }
                
              $B_Anastomosis= "Anastomosis: ";
              if ($rowComplicaciones['B_Anastomosis'] == 1) //Hay anastomosis
                 {
                     $sqlAnastomosis="SELECT tabla_tipo_anastomosis_complicaciones.Tipo AS Tipo 
                                      FROM tabla_anastomosis_complicaciones 
                                      INNER JOIN tabla_tipo_anastomosis_complicaciones
                                      ON tabla_anastomosis_complicaciones.Id_Tipo_Anastomosis_Complicaciones = tabla_tipo_anastomosis_complicaciones.ID 
                                      WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlAnastomosis)
                        or die('Error: ' . mysqli_error());
                
                     $numResults = mysqli_num_rows($rs);
                     $counter = 0;
              
                     while($rowAnastomosis = mysqli_fetch_array($rs))
                     {
                         if (++$counter == $numResults) // last row
                         {
                           $B_Anastomosis = $B_Anastomosis . utf8_encode($rowAnastomosis['Tipo']) . ".";
                         } 
                         else // not last row
                         {
                            $B_Anastomosis = $B_Anastomosis . utf8_encode($rowAnastomosis['Tipo']) . ", ";
                         }          
                     }                     
                 }
                else 
                {
                    $B_Anastomosis = $B_Anastomosis . "No ha habido anastomosis.";
                }
                
                
                $B_Otras= "Otras: ";
              if ($rowComplicaciones['B_Otras'] == 1) //Hay anastomosis
                 {
                     $sqlOtrasC="SELECT tabla_otras_complicaciones.Id_Tipo_Otras_Complicaciones,tabla_tipo_otras_complicaciones.Tipo AS Tipo  
                                 FROM tabla_otras_complicaciones 
                                 INNER JOIN tabla_tipo_otras_complicaciones
                                 ON tabla_otras_complicaciones.Id_Tipo_Otras_Complicaciones = tabla_tipo_otras_complicaciones.ID
                                 WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlOtrasC)
                        or die('Error: ' . mysqli_error());
                        
                     $numResults = mysqli_num_rows($rs);
                     $counter = 0;
              
                     while($rowOtrasC = mysqli_fetch_array($rs))
                     {
                         if (++$counter == $numResults) // last row
                         {
                             $B_Otras = $B_Otras . utf8_encode($rowOtrasC['Tipo']) . ".";

                         } 
                         else // not last row
                         {
                            $B_Otras = $B_Otras . utf8_encode($rowOtrasC['Tipo']) . ", ";
                         }          
                     } 
                 }
                else 
                {
                    $B_Otras = $B_Otras . "No ha habido otras complicaciones.";
                } 
                
                
                $Complicaciones = $Reintervencion;
                $Complicaciones = $Complicaciones . "<br>" . $Exitus_Intra;
                $Complicaciones = $Complicaciones . "<br>" . $Exitus_Post;
                $Complicaciones = $Complicaciones . "<br>" . $B_Herida;
                $Complicaciones = $Complicaciones . "<br>" . $B_Perine;
                $Complicaciones = $Complicaciones . "<br>" . $B_Abdominales;
                $Complicaciones = $Complicaciones . "<br>" . $B_Anastomosis;
                $Complicaciones = $Complicaciones . "<br>" . $B_Otras;
    
          } //End $rowComplicaciones['B_Complicaciones'] 
          else
          {
              $Complicaciones = $Complicaciones . "No ha habido complicaciones.";
          } 
          
            $B_Cirugia = "CIRUGIA";
            $B_Cirugia = $B_Cirugia . "<br>" . $Tipo_Cirugia . "<br>" . $Fecha_Cirugia . "<br>" . $Fecha_Alta;
            $B_Cirugia = $B_Cirugia . "<br>" . $Cirujano_Principal . "<br>" . $Cirujano_Ayudante;
            $B_Cirugia = $B_Cirugia . "<br>" . $Tecnicas_Cirugia . "<br>" . "<br>" . $B_Otras_Cirugia . "<br>" .$Exeresis_Meso;
            $B_Cirugia = $B_Cirugia . "<br>" . $B_Otras_Resecciones;
             
            $B_Cirugia = $B_Cirugia . "<br>" . "<br>" ."RESULTADOS"; 
            $B_Cirugia = $B_Cirugia . "<br>" . $ASA . "<br>" . $Hallazgos_Intraoperatorios;
            $B_Cirugia = $B_Cirugia . "<br>" . $Tipo_Metast_Hepaticas . "<br>" . $Imp_Ovaricos;
            $B_Cirugia = $B_Cirugia . "<br>" . $Obstruccion;
            
            $B_Cirugia = $B_Cirugia . "<br>" . "<br>". "CARACTERISTICAS";
            $B_Cirugia = $B_Cirugia . "<br>" . $Via_Operacion;
            $B_Cirugia = $B_Cirugia . "<br>" . $Tiempo_Operacion;
            $B_Cirugia = $B_Cirugia . "<br>" . $Transfusiones;
            $B_Cirugia = $B_Cirugia . "<br>" . $Intencion_Operatoria;
            $B_Cirugia = $B_Cirugia . "<br>" . $Anastomosis;
            $B_Cirugia = $B_Cirugia . "<br>" . $Reservorio;
            $B_Cirugia = $B_Cirugia . "<br>" . $Estoma_Derivacion;
            
            $B_Cirugia = $B_Cirugia . "<br>" . "<br>". "COMPLICACIONES";
            
            
            $B_Cirugia = $B_Cirugia . "<br>" . $Complicaciones;
       
     
         
        
    }//end $rowCirugia['B_Cirugia']

   $B_Cirugia = $B_Cirugia . "<br>";

    echo(utf8_decode($B_Cirugia));   
    echo "<br>";
    
/**********************  Patologica ********************************/
    
    $sqlTabla_Patologica = "SELECT * 
                            FROM tabla_patologica
                            WHERE Id_Paciente = '$IdPaciente'";
                            
    $rs = (mysqli_query($conexion,$sqlTabla_Patologica))
       or die('Error: ' . mysqli_error());
    
    $rowTabla_Patologica=mysqli_fetch_array($rs);
    
    
    $Patologica = "ANATOMÍA PATOLÓGICA: ";
    
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
           or die('Error: ' . mysqli_error());
        
        $rowPatologica=mysqli_fetch_array($rs);
    
        
        $IdPatologica = $rowPatologica['ID'];
        
        
      
        //Histologia

        $Tipo_Histologico = "Tipo histológico: " . utf8_encode($rowPatologica['Histologico']);
        
        if ($rowPatologica['Id_Otros_Histologico'] != null)
        {
            $sqlOtros_Histologico = "SELECT tabla_tipo_otros_histologico.Tipo
                                            FROM anatomia_patologica
                                            INNER JOIN tabla_tipo_otros_histologico
                                            ON anatomia_patologica.Id_Otros_Histologico = tabla_tipo_otros_histologico.ID
                                            WHERE Id_Paciente = '$IdPaciente'";
            
            
            $rs = (mysqli_query($conexion,$sqlOtros_Histologico))
           or die('Error: ' . mysqli_error());
        
            $rowOtros_Histologico=mysqli_fetch_array($rs);
            
            $Otros_Histologico = "Otros histológico: ";
            $Otros_Histologico = $Otros_Histologico . utf8_encode($rowOtros_Histologico['Tipo']);
            $Tipo_Histologico = $Tipo_Histologico . "<br>" . $Otros_Histologico;
        }
        
        
        $Clasificación_TNM = "Clasificación TNM: "; 
        $T_Patologico = "&nbsp T: " . utf8_encode($rowPatologica['T']);
        $N_Patologico = "&nbsp N: " . utf8_encode($rowPatologica['N']); 
        $M_Patologico = "&nbsp M: " . utf8_encode($rowPatologica['M']);
        
        $Clasificación_TNM = $Clasificación_TNM . "<br>";
        $Clasificación_TNM = $Clasificación_TNM . $T_Patologico . "<br>";
        $Clasificación_TNM = $Clasificación_TNM . $N_Patologico . "<br>"; 
        $Clasificación_TNM = $Clasificación_TNM . $M_Patologico;
        
        $Ganglios_Aislados = "Nº de ganglios aislados: " . utf8_encode($rowPatologica['Glangios_Ais']);
        $Ganglios_Afectados = "Nº de ganglios afectados: " . utf8_encode($rowPatologica['Glangios_Afec']);
        $Estadio_Patologico = "Estadio patologico: " . utf8_encode($rowPatologica['Estadio_Patologico']);
    
         
         //Resección

        $Margen_Distal = "Margen distal: " . utf8_encode($rowPatologica['Margen_Distal']);
        $Margen_Circunferencial = "Margen circunferencial: ". utf8_encode($rowPatologica['Margen_Circunferencial']);
        $Tipo_Reseccion = "Tipo resección: " . utf8_encode($rowPatologica['Tipo_Res']);
        $Tipo_Regresion = "Tipo regresión: " . utf8_encode($rowPatologica['Regresion']);
        
        $Estadio_Tumor_Sincronico = "Estadio Tumor Sincronico: ";
        
        if ($rowPatologica['Id_Estadio_Sincronico'] != null)
        {
            $sqlEstadio_Tumor_Sincronico = "SELECT tabla_estadio_tumor.Estadio
                                            FROM anatomia_patologica
                                            INNER JOIN tabla_estadio_tumor
                                            ON anatomia_patologica.Id_Estadio_Sincronico = tabla_estadio_tumor.ID
                                            WHERE Id_Paciente = '$IdPaciente'";
            
            
            $rs = (mysqli_query($conexion,$sqlEstadio_Tumor_Sincronico))
           or die('Error: ' . mysqli_error());
        
            $rowEstadio_Tumor_Sincronico=mysqli_fetch_array($rs);
            
            $Estadio_Tumor_Sincronico = $Estadio_Tumor_Sincronico . utf8_encode($rowEstadio_Tumor_Sincronico['Estadio']);
        }
        else 
        {
            $Estadio_Tumor_Sincronico = $Estadio_Tumor_Sincronico . "No existe tumor sincrónico.";
        }
        
        $Calidad_Mesorrecto = "Calidad mesorrecto: " . utf8_encode($rowPatologica['Meso_Cal']);
       
        $Patologica = $Patologica . "<br>" . $Tipo_Histologico;
        $Patologica = $Patologica . "<br>" . $Clasificación_TNM;
        $Patologica = $Patologica . "<br>" . $Ganglios_Aislados;
        $Patologica = $Patologica . "<br>" . $Ganglios_Afectados;
        $Patologica = $Patologica . "<br>" . $Estadio_Patologico;
        $Patologica = $Patologica . "<br>" . $Margen_Distal;
        $Patologica = $Patologica . "<br>" . $Margen_Circunferencial;
        $Patologica = $Patologica . "<br>" . $Tipo_Reseccion;
        $Patologica = $Patologica . "<br>" . $Tipo_Regresion;
        $Patologica = $Patologica . "<br>" . $Estadio_Tumor_Sincronico;
        $Patologica = $Patologica . "<br>" . $Calidad_Mesorrecto;
        
    }

    echo(utf8_decode($Patologica));   
    echo "<br>";
    

   /**********************  Seguimiento ********************************/
     
      

    $sqlSegPaciente="SELECT * 
                     FROM seguimiento 
                     WHERE Id_Paciente = '$IdPaciente'";
    
    $rowSegPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlSegPaciente))
       or die('Error: ' . mysqli_error());
    
    
    $IDSeguimiento=$rowSegPaciente["ID"];

    $Fecha_Revision = "Fecha de revisión: " . $rowSegPaciente["Fecha_Revision"];
    
    
    $Seguimiento = "<br>" . "SEGUIMIENTO:";
    
    /*********************RECIDIVA******************************/
    
    
    //Si hay recidiva se rellenan los datos
    
    $Recidiva = "Recidiva: ";
    if($rowSegPaciente["B_Recidiva"]==1){
            
        $sqlRecidiva="SELECT * 
                      FROM tabla_recidiva
                      INNER JOIN tabla_seg_localiz_recidiva
                      ON tabla_recidiva.Id_tabla_seg_localiz_recidiva = tabla_seg_localiz_recidiva.ID
                      WHERE Id_Seguimiento='$IDSeguimiento'";
        
        $rowRecidiva=mysqli_fetch_array(mysqli_query($conexion,$sqlRecidiva))
             or die('Error: ' . mysqli_error());
       
       $Fecha_Recidiva = "Fecha recidiva: " . $rowRecidiva["Fecha_Recidiva"];
       $Localizacion_Recidiva = "Localización: " . utf8_encode($rowRecidiva["Tipo"]);
       
       if (intval($rowRecidiva["Intervencion"]) == 1)
       {
           $Intervencion_Recidiva = "Se ha intervenido.";
       }
       else 
       {
           $Intervencion_Recidiva = "No se ha intervenido.";
       }
       
       $Recidiva = $Recidiva . "<br>";
       $Recidiva = $Recidiva . "&nbsp " . $Fecha_Recidiva . "<br>";
       $Recidiva = $Recidiva . "&nbsp " . $Localizacion_Recidiva . "<br>";
       $Recidiva = $Recidiva . "&nbsp " . $Intervencion_Recidiva;
   
       
    }
    else
    {
        $Recidiva = $Recidiva . "No ha sufrido recidiva.";
    }
    
    //echo(utf8_decode($Recidiva));   

    $Seguimiento = $Seguimiento . "<br>" . $Recidiva . "<br>";
    
/****************************METASTASIS**************************************/  
    
    
    $Metastasis = "Metástasis: ";    
    
    //Si hay metástasis
    if($rowSegPaciente["B_Metastasis"]==1){
        
        $sqlMetastasis="SELECT * 
                        FROM tabla_metastasis 
                        INNER JOIN tabla_seg_localiz_metastasis
                        ON tabla_metastasis.Id_tabla_seg_localiz_metastasis = tabla_seg_localiz_metastasis.ID
                        WHERE Id_Seguimiento='$IDSeguimiento'";
        
        $rowMetastasis=mysqli_fetch_array(mysqli_query($conexion,$sqlMetastasis))
             or die('Error: ' . mysqli_error());
             
        $Fecha_Metastasis = "Fecha metástasis: " . $rowMetastasis["Fecha_Metastasis"];
        $Localizacion_Metastasis = "Localización: " . utf8_encode($rowMetastasis["Tipo"]);
        
        if (intval($rowMetastasis["Intervencion"]) == 1)
       {
           $Intervencion_Metastasis = "Se ha intervenido.";
       }
       else 
       {
           $Intervencion_Metastasis = "No se ha intervenido.";
       }
       
       $Metastasis = $Metastasis . "<br>";
       $Metastasis = $Metastasis . "&nbsp " . $Fecha_Metastasis . "<br>";
       $Metastasis = $Metastasis . "&nbsp " . $Localizacion_Metastasis . "<br>";
       $Metastasis = $Metastasis . "&nbsp " . $Intervencion_Metastasis;
   
       
    }
    else
    {
        $Metastasis = $Metastasis . "No ha sufrido metástasis.";
    }
 

    $Seguimiento = $Seguimiento . "<br>" . $Metastasis . "<br>";
        

/******************************SEGUNDO TUMOR*****************************************/

        $Segundo_Tumor = "Segundo tumor: ";
        
        //Si hay segundo tumor 
        if($rowSegPaciente["B_Segundo_Tumor"]==1){
                    
            $sqlSegundoTumor="SELECT * 
                              FROM tabla_segundo_tumor 
                              INNER JOIN tabla_seg_localiz_segundo_tumor
                              ON tabla_segundo_tumor.Id_tabla_seg_localiz_segundo_tumor = tabla_seg_localiz_segundo_tumor.ID
                              WHERE Id_Seguimiento='$IDSeguimiento'";
            
            $rowSegundoTumor=mysqli_fetch_array(mysqli_query($conexion,$sqlSegundoTumor))
                 or die('Error: ' . mysqli_error());    
             
            $Fecha_Segundo_Tumor = "Fecha segundo tumor: " . $rowSegundoTumor["Fecha_Segundo_Tumor"];
            $Localizacion_Segundo_Tumor = "Localización: " . utf8_encode($rowSegundoTumor["Tipo"]);
             
           if (intval($rowSegundoTumor["Intervencion"]) == 1)
           {
               $Intervencion_Segundo_Tumor = "Se ha intervenido.";
           }
           else 
           {
               $Intervencion_Segundo_Tumor = "No se ha intervenido.";
           }
           
           $Segundo_Tumor = $Segundo_Tumor . "<br>";
           $Segundo_Tumor = $Segundo_Tumor . "&nbsp " . $Fecha_Segundo_Tumor . "<br>";
           $Segundo_Tumor = $Segundo_Tumor . "&nbsp " . $Localizacion_Segundo_Tumor . "<br>";
           $Segundo_Tumor = $Segundo_Tumor . "&nbsp " . $Intervencion_Segundo_Tumor;
       
       
    }
    else
    {
        $Segundo_Tumor = $Segundo_Tumor . "No ha sufrido segundo tumor.";
    }


    $Seguimiento = $Seguimiento . "<br>" . $Segundo_Tumor . "<br>";

/*************************************ESTADO DEL PACIENTE****************************************/

        
        $Estado = "Estado: ";

    
    //Si el paciente está muerto
        if($rowSegPaciente["B_Estado"]==2){
            
            $Estado = $Estado . "Muerto.";
            
            $sqlEstadoPaciente="SELECT * 
                                FROM tabla_estado 
                                WHERE Id_Seguimiento='$IDSeguimiento'";
            
            $rowEstadoPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlEstadoPaciente))
                 or die('Error: ' . mysqli_error());
                 
            $Fecha_Muerte = "Fecha de muerte: " . $rowEstadoPaciente["Fecha_Muerte"];
            
            if(intval($rowEstadoPaciente["Relacion_Muerte"]) == 1)
            {
                $Causa_Muerte = "La muerte del paciente está relacionada con el cáncer";
            }
            else 
            {
                $Causa_Muerte = "La muerte del paciente no está relacionada con el cáncer";

            }
            
            $Estado = $Estado . "<br>";
            $Estado = $Estado . "&nbsp " . $Fecha_Muerte . "<br>";
            $Estado = $Estado . "&nbsp " . $Causa_Muerte;
       
         }
        else 
        {
            $Estado = $Estado . "Vivo.";
        }
    
        //echo(utf8_decode($Estado));   

        $Seguimiento = $Seguimiento . "<br>" . $Estado . "<br>";
/*******************************IMPOSIBILIDAD DE SEGUIMIENTO************************************/


        $Imposibilidad = "Imposibilidad del seguimiento: ";

    
    //Si hay imposibilidad, se carga la causa
        if($rowSegPaciente["B_Imposibilidad"]==1){
            
           $Imposibilidad = $Imposibilidad . "Existe imposibilidad de seguimiento.";
            $sqlImposibilidad="SELECT * 
                               FROM tabla_imposibilidad 
                               INNER JOIN tabla_seg_imposibilidad 
                               ON tabla_imposibilidad.Id_tabla_seg_imposibilidad = tabla_seg_imposibilidad.ID
                               WHERE Id_Seguimiento='$IDSeguimiento'";
            
            $rowImposibilidad=mysqli_fetch_array(mysqli_query($conexion,$sqlImposibilidad))
                 or die('Error: ' . mysqli_error());
        
            $Causa_Imposibilidad = "Causa: " . utf8_encode($rowImposibilidad["Causa"]);  
            
            $Imposibilidad = $Imposibilidad . "<br>";
            $Imposibilidad = $Imposibilidad . "&nbsp " . $Causa_Imposibilidad . "<br>";
        
        }
        else 
        {
            $Imposibilidad = $Imposibilidad . "No hay imposibilidad de seguimiento.";
        }

    
    $Seguimiento = $Seguimiento . "<br>" . $Imposibilidad;
     /*******************************COMENTARIOS ADICIONALES************************************/
    
    $Comentarios_Adicionales = "<dt>Comentarios_Adicionales: </dt> <dd>" . $rowSegPaciente["Comentarios_Adicionales"] . "</dd>";
    $Seguimiento = $Seguimiento . "<br/>" . $Comentarios_Adicionales;
    
    $Seguimiento = $Seguimiento . "</dl>" . "<br/>";
    
    mysqli_close($conexion);
    
    echo(utf8_decode($Seguimiento));   
    echo "<br>";

    echo "</body>";
    echo "</html>";



?>