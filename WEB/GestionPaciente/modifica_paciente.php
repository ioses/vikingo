<?php
    session_start();
    
    require_once ("../BDD/conexion.php");
 
    
/********************** Cargamos todas las variables ************/
    
    /*
     *  Inicial
     */
     
    $_SESSION["NHC"] = null;
    $_SESSION["Fecha_Nacimiento"] = null;
    $_SESSION["Sexo"] = null;
    $_SESSION["Localizacion"] = null;
    $_SESSION["Clasificacion_Rullier"] = null;
    $_SESSION["Sincro"] = null;
    $_SESSION["SincroColonDerecho"] = null;
    $_SESSION["SincroColonIzquierdo"] = null;
    $_SESSION["SincroColonTransverso"] = null;
    $_SESSION["SincroColonSigma"] = null;
    $_SESSION["Estadio_Radio"] = null;
    $_SESSION["ECO"] = null;
    $_SESSION["ECO_T"] = null;
    $_SESSION["ECO_N"] = null;
    $_SESSION["TAC"] = null;
    $_SESSION["RMN"] = null;
    $_SESSION["RMN_T"] = null;
    $_SESSION["RMN_N"] = null;
    $_SESSION["Dist_Tumor"] = null;
    $_SESSION["Dist_Adeno"] = null;
    $_SESSION["Integ_Esfinter"] = null;
    $_SESSION["Inv_Vecinos"] = null;
    $_SESSION["MetastInicial"] = null;
    $_SESSION["Metast_Hepaticas"] = null;
    $_SESSION["Metast_Oseas"] = null;
    $_SESSION["Metast_Pulmonares"] = null;
    $_SESSION["Metast_Nervioso"] = null;
    $_SESSION["Inv_Vecinos"] = null;
    $_SESSION["Inv_Utero"] = null;
    $_SESSION["Inv_Prostata"] = null;
    $_SESSION["Inv_Vejiga"] = null;
    $_SESSION["Inv_Ureter"] = null;
    $_SESSION["Inv_Vagina"] = null;
    $_SESSION["Inv_Seminal"] = null;
    $_SESSION["Inv_Sacro"] = null;
    
    
    /* 
     * Tratamiento
     */
     
    $_SESSION["B_Tto_Neo"] = null;
    $_SESSION["Tipo_TTO_Neoadyuvante"] = null;
    $_SESSION["tipo_no_neo"] = null;
    $_SESSION["Adyuvante_Pendiente"] = null;
    $_SESSION["TTO_Adyuvante"] = null;
    $_SESSION["Tipo_TTO_Adyuvante"] = null;
    
    /* 
     * Cirugia
     */
     
     
    $_SESSION["B_Cirugia"] = null;
    $_SESSION["Motivo_No_Cirugia"] = null;
    $_SESSION["Tipo_Cirugia"] = null;
    $_SESSION["Fecha_Cirugia"] = null;
    $_SESSION["Fecha_Alta_Pendiente"] = null;
    $_SESSION["Fecha_Alta"] = null;
    $_SESSION["Cirujano_Principal"] = null;
    $_SESSION["Cirujano_Ayudante"] = null;
    $_SESSION["Tecnicas_Cirugia"] = null;
    $_SESSION["Tipo_Anastomosis_Proyecto"] = null;
    $_SESSION["Tipo_Anastomosis_coloanal"] = null;
    $_SESSION["Reseccion_interesfinteriana"] = null;
    $_SESSION["Tipo_Reseccion_interesfinteriana"] = null;
    $_SESSION["Tipo_Reseccion_organos"] = null;
    $_SESSION["Otra_Tecnica_Cirugia"] = null;
	$_SESSION["Orientacion"] = null;
    $_SESSION["Exeresis_Meso"] = null;
    $_SESSION["Otras_Resecc_Viscerales"] = null;
    $_SESSION["Res_Seminales"] = null;
    $_SESSION["Res_Peritoneo"] = null;
    $_SESSION["Res_Vejiga"] = null;
    $_SESSION["Res_Utero"] = null;
    $_SESSION["Res_Vagina"] = null;
    $_SESSION["Res_Prostata"] = null;
	$_SESSION["Res_Hepatica"] = null;
    $_SESSION["Res_IDelgado"] = null;
    $_SESSION["Res_Coccix"] = null;
    $_SESSION["Res_Sacro"] = null;
    $_SESSION["Res_Ureter"] = null;
    $_SESSION["Res_Ovarios"] = null;
    $_SESSION["Res_Trompas"] = null;
    $_SESSION["ASA"] = null;
    $_SESSION["Hallazgos_Intraoperatorios"] = null;
    $_SESSION["Perforacion_Tumoral"] = null;
    $_SESSION["Tipo_Metast_Hepaticas"] = null;
    $_SESSION["Imp_Ovaricos"] = null;
    $_SESSION["Obstruccion"] = null;
    $_SESSION["Via_Operacion"] = null;
    $_SESSION["Tiempo_Operacion"] = null;
    $_SESSION["Transfusiones"] = null;
    $_SESSION["Intencion_Operatoria"] = null;
    $_SESSION["Anastomosis"] = null;
    $_SESSION["Reservorio"] = null;
    $_SESSION["Estoma_Derivacion"] = null;
    $_SESSION["Tipo_Estoma"] = null;
    $_SESSION["Complicaciones"] = null;
    $_SESSION["Reintervencion"] = null;
    $_SESSION["Tipo_Reintervencion"] = null;
    $_SESSION["Exitus_Intra"] = null;
    $_SESSION["Causa_Exitus_Intra"] = null;
    $_SESSION["Exitus_Post"] = null;
    $_SESSION["Causa_Exitus_Post"] = null;
	$_SESSION["Generales_Sepsis"]=null;
	$_SESSION["Generales_Shock"]=null;
    $_SESSION["Herida_Hemorragia"] = null;
    $_SESSION["Herida_Infeccion"] = null;
    $_SESSION["Herida_Evisceracion"] = null;
	$_SESSION["Herida_Eventracion"] = null;
    $_SESSION["Perine_Infeccion"] = null;
    $_SESSION["Perine_Retraso_Cicatrizacion"] = null;
	$_SESSION["Perine_Hernia"] = null;
    $_SESSION["Abdominales_Hemoperitoneo"] = null;
    $_SESSION["Abdominales_Peri_Difusas"] = null;
    $_SESSION["Abdominales_Abceso_Abdominal"] = null;
	$_SESSION["Abdominales_Hemo_Abdominal"] = null;
	$_SESSION["Abdominales_Abceso_Pelvico"] = null;
	$_SESSION["Abdominales_Hemo_Pelvica"] = null;
    $_SESSION["Abdominales_Isquemia_Intestinal"] = null;
    $_SESSION["Abdominales_Colecistitis"] = null;
    $_SESSION["Abdominales_Iatrog_Vias_Urinarias"] = null;
    $_SESSION["Abdominales_Iatrog_Vias_Huecas"] = null;
    $_SESSION["Abdominales_Ileo_Paralitico_Prolongado"] = null;
    $_SESSION["Abdominales_Ileo_Mecanico"] = null;
	$_SESSION["Abdominales_Estoma"] = null;
    $_SESSION["Anastomosis_Hemorragia"] = null;
    $_SESSION["Anastomosis_Fuga"] = null;
	$_SESSION["Anastomosis_Fistula"]=null;
    $_SESSION["Otras_Hemo_Diges"] = null;
    $_SESSION["Otras_Infeccion_Urinaria"] = null;
    $_SESSION["Comp_Otras_Urologicas"]=null;
    $_SESSION["Otras_Respiratoria"] = null;
	$_SESSION["Otras_Respiratoria_Infecc"] = null;
    $_SESSION["Otras_Hepatica"] = null;
	$_SESSION["Otras_Vascular_Mec"]=null;
	$_SESSION["Otras_Vascular_Infecc"]=null;
    $_SESSION["Otras_FMO"] = null;
    $_SESSION["Otras_TEP"] = null;
    $_SESSION["Otras_Neuroapraxia"] = null;
	$_SESSION["Otras_Renal"]=null;
    $_SESSION["Otras_Cardiovascular"] = null;
    
    
    /* 
     * Patologica
     */
    
    $_SESSION["Tipo_Histologico"] = null;
    $_SESSION["Otros_Histologico"] = null;
    $_SESSION["T_Patologico"] = null;
    $_SESSION["N_Patologico"] = null;
    $_SESSION["M_Patologico"] = null;
    $_SESSION["Ganglios_Aislados"] = null;
    $_SESSION["Ganglios_Afectados"] = null;
    $_SESSION["Estadio_Patologico"] = null;
    
    $_SESSION["Margen_Distal"] = null;
    $_SESSION["Margen_Circunferencial"] = null;
    $_SESSION["Tipo_Res"] = null;
    $_SESSION["Tipo_Regresion"] = null;
    $_SESSION["Estadio_Tumor_Sincronico"] = null;
    $_SESSION["Calidad_Mesorrecto"] = null;
    
    $_SESSION["Patologica_Pendiente"] = null;
    $_SESSION["No_Patologica"] = null;
    
    
    /*
     * Seguimiento
     */ 
     
     
    $_SESSION["Fecha_Revision"] = null;
    $_SESSION["Recidiva"] = 2;
    $_SESSION["Fecha_Recidiva"] = null;
    $_SESSION["Localizacion_Recidiva"] = null;
    $_SESSION["Intervencion_Recidiva"] = null;
    $_SESSION["Metastasis"] = 2;
    $_SESSION["Fecha_Metastasis"] = null;
    $_SESSION["Localizacion_Metastasis"] = null;
    $_SESSION["Intervencion_Metastasis"] = null;
    $_SESSION["Segundo_Tumor"] = 2;
    $_SESSION["Fecha_Segundo_Tumor"] = null;
    $_SESSION["Localizacion_Segundo_Tumor"] = null;
    $_SESSION["Intervencion_Segundo_Tumor"] = null;
    $_SESSION["Estado"] = 2;
    $_SESSION["Fecha_Muerte"] = null;
    $_SESSION["Causa_Muerte"] = null;
    $_SESSION["Imposibilidad"] = 2;
    $_SESSION["Causa_Imposibilidad"] = null;
    $_SESSION["Comentarios_Adicionales"]=null;
    
    
    /**********************  Inicial ********************************/
    
    //Selección del ID del Hospital para identificar correctamente al paciente

	$sqlIdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='".$_SESSION["NombreHospital"]."'";

	$result=mysqli_query($conexion,$sqlIdHospital);
	$row=mysqli_fetch_array($result);

    $idHospital=$row[0];
    $idHospital=intval($idHospital);
    
    $NHC = $_POST['NHC'];

	//SE escoge solo primero el NHC para desencriptarlo correctamente, luego se cogeran lso valores de todo lo demas

   $sqlIdentPaciente="SELECT AES_DECRYPT(NHC,'$claveNHC') FROM identificador_paciente WHERE NHC = AES_ENCRYPT('$NHC','$claveNHC') AND identificador_paciente.Id_Hospital = '$idHospital'";
    
    $rowIdentPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlIdentPaciente))
       or die('Error: ' . mysqli_error());
    
    $_SESSION["NHC"]=$rowIdentPaciente[0];
    
    $sqlIdentPaciente="SELECT * FROM identificador_paciente WHERE NHC = AES_ENCRYPT('$NHC','$claveNHC') AND identificador_paciente.Id_Hospital = '$idHospital'";
    
    $rowIdentPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlIdentPaciente))
       or die('Error: ' . mysqli_error());

   /*
    * Cargue los datos desde las variables de inicial
    */
    $Enviar_Inicial="Enviar";
    $_SESSION["ButtonEnviarInicial"]=$Enviar_Inicial;
    
    /*** datos iniciales**/
    
    $_SESSION["Fecha_Nacimiento"]=$rowIdentPaciente['Fecha_Nacimiento'];
    $_SESSION["Sexo"]=intval($rowIdentPaciente['Id_Sexo']);


    $IdPaciente = $rowIdentPaciente['ID'];

    $sqlInicial="SELECT * FROM inicial WHERE Id_Paciente = '$IdPaciente'";
    
    $rowInicial=mysqli_fetch_array(mysqli_query($conexion,$sqlInicial))
       or die('Error: ' . mysqli_error());
       
    /**** Localización ***/

    $_SESSION["Localizacion"]=$rowInicial['Localizacion'];
    
    $_SESSION["Clasificacion_Rullier"] = intval($rowInicial['Clasificacion_Rullier']);
    
    $_SESSION["Sincro"]=intval($rowInicial['B_Sincro']);
    
    $IdInicial = $rowInicial['ID'];
    
    if ($rowInicial['B_Sincro'] == 1) //Hay tumor sincrónico. miramos cual hay
    {
        
        $sqlSincro="SELECT * FROM tabla_sincro WHERE Id_Inicial = '$IdInicial'";
        $rs=mysqli_query($conexion,$sqlSincro)
          or die('Error: ' . mysqli_error());
            
         while($rowSincro = mysqli_fetch_array($rs))
         {
                if($rowSincro['Id_Colon'] == 1)
                {
                    $_SESSION["SincroColonDerecho"]=1;
                }
                else if($rowSincro['Id_Colon'] == 2)
                {
                    $_SESSION["SincroColonIzquierdo"]=1;    
                }
                else if($rowSincro['Id_Colon'] == 3)
                {
                    $_SESSION["SincroColonTransverso"]=1;
                }
                else if($rowSincro['Id_Colon'] == 4)
                {
                    $_SESSION["SincroColonSigma"]=1;
                }
         }   
    }
    
    
    /*** Radiologica ***/
    
    $_SESSION["Estadio_Radio"] = $rowInicial['Id_Estadio_Radio'];
    
    $_SESSION["ECO"] = intval($rowInicial['B_Tec_ECO']);
        
    if ($rowInicial['B_Tec_ECO'] == 1) //Hay tecnica ECO
    {

        $sqlECO="SELECT * FROM tabla_eco WHERE Id_Inicial = '$IdInicial'";
    
        $rowECO=mysqli_fetch_array(mysqli_query($conexion,$sqlECO))
       or die('Error: ' . mysqli_error());

        $_SESSION["ECO_T"] = intval($rowECO['Id_ECO_T']);
        $_SESSION["ECO_N"] = intval($rowECO['Id_ECO_N']);
    }
    
    
    $_SESSION["TAC"] = intval($rowInicial['Tec_TAC']);
    
    
    $_SESSION["RMN"] = intval($rowInicial['B_Tec_RMN']);
    if ($rowInicial['B_Tec_RMN'] == 1)//Hay tecnica RMN
    {
        
        $sqlRMN="SELECT * FROM tabla_rmn WHERE Id_Inicial = '$IdInicial'";
    
        $rowRMN=mysqli_fetch_array(mysqli_query($conexion,$sqlRMN))
            or die('Error: ' . mysqli_error());
        $_SESSION["RMN_T"] = intval($rowRMN['Id_RMN_T']);
        $_SESSION["RMN_N"] = intval($rowRMN['Id_RMN_N']);
        $_SESSION["Dist_Tumor"] = intval($rowRMN['Dist_Tumor']);
        $_SESSION["Dist_Adeno"] = intval($rowRMN['Dist_Adenopatia']);
    }
    
    
    
    /****** Otras afecciones ****/
    $_SESSION["Integ_Esfinter"] = intval($rowInicial['Id_Integ_Esfint']);

    $_SESSION["MetastInicial"] = intval($rowInicial['B_Metast_Inicial']);
    
    if ($rowInicial['B_Metast_Inicial'] == 1) //Hay metástasis
    {
        $sqlMetast="SELECT * FROM tabla_metast_inicial WHERE Id_Inicial = '$IdInicial'";
    
        $rs=mysqli_query($conexion,$sqlMetast)
          or die('Error: ' . mysqli_error());
            
         while($sqlMetast = mysqli_fetch_array($rs))
         {
                if($sqlMetast['Id_Organo'] == 1)
                {
                    $_SESSION["Metast_Hepaticas"]=1;
                }
                else if($sqlMetast['Id_Organo'] == 2)
                {
                    $_SESSION["Metast_Oseas"]=1;
                }
                else if($sqlMetast['Id_Organo'] == 3)
                {
                    $_SESSION["Metast_Pulmonares"]=1;
                }
                else if($sqlMetast['Id_Organo'] == 4)
                {
                    $_SESSION["Metast_Nervioso"]=1;
                }            
         }
    }
    
    $_SESSION["Inv_Vecinos"] = intval($rowInicial['B_Inv_Vecinos']);

        
    if ($rowInicial['B_Inv_Vecinos'] == 1) //Hay invasión de vecinos
    {
        $sqlSVecinos="SELECT * FROM tabla_vecinos WHERE Id_Inicial = '$IdInicial'";

        $rs=mysqli_query($conexion,$sqlSVecinos)
          or die('Error: ' . mysqli_error());
            
         while($rowVecino = mysqli_fetch_array($rs))
         {
                if($rowVecino['Id_Organos'] == 1)
                {
                    $_SESSION["Inv_Utero"]=1;
                }
                else if($rowVecino['Id_Organos'] == 2)
                {
                    $_SESSION["Inv_Vagina"]=1;
                }
                else if($rowVecino['Id_Organos'] == 3)
                {
                    $_SESSION["Inv_Vejiga"]=1;
                }
                else if($rowVecino['Id_Organos'] == 4)
                {
                    $_SESSION["Inv_Prostata"]=1;
                }
                else if($rowVecino['Id_Organos'] == 5)
                {
                    $_SESSION["Inv_Sacro"]=1;
                }
                else if($rowVecino['Id_Organos'] == 6)
                {
                    $_SESSION["Inv_Ureter"]=1;
                }
                else if($rowVecino['Id_Organos'] == 7)
                {
                    $_SESSION["Inv_Seminal"]=1;
                }
                  
         }
    }
    /*echo("NHC " . $_SESSION['NHC'] . ", Sexo " . $_SESSION['Sexo'] . ", Fe_Nac " . $_SESSION['Fecha_Nacimiento']);   
    echo "<br>";
    echo("Loc " . $_SESSION['Localizacion'] . ", Sinc " . $_SESSION['Sincro']);   
    echo( ", Sincro_De " . $_SESSION['SincroColonDerecho'] . ", Sincro_Izq " . $_SESSION['SincroColonIzquierdo']);  
    echo(", SincroTra " . $_SESSION['SincroColonTransverso'] . ", Sinc_Sig " . $_SESSION['SincroColonSigma']); 
    echo "<br>";
    echo("ECO " . $_SESSION['ECO'] . ", ECO_T " . $_SESSION['ECO_T'] . ", ECO_N " . $_SESSION['ECO_N']);   
    echo( ", TAC " . $_SESSION['TAC'] . ", RMN " . $_SESSION['RMN']);  
    echo(", RMN_T " . $_SESSION['RMN_T'] . ", RMN_N " . $_SESSION['RMN_N']); 
    echo(", Dist_Tumor " . $_SESSION['Dist_Tumor'] . ", Dist_Adeno " . $_SESSION['Dist_Adeno']); 
    echo "<br>";
    echo("Inv_Vecinos " . $_SESSION['Inv_Vecinos'] . ", Inv_Utero " . $_SESSION['Inv_Utero']); 
    echo(", Inv_Prostata " . $_SESSION['Inv_Prostata'] . ", Inv_Vejiga " . $_SESSION['Inv_Vejiga']); 
    echo(", Inv_Ureter " . $_SESSION['Inv_Ureter'] . ", Inv_Vagina " . $_SESSION['Inv_Vagina']); 
    echo(", Inv_Seminal " . $_SESSION['Inv_Seminal'] . ", Inv_Vagina " . $_SESSION['Inv_Sacro']); 
    echo "<br>";
    echo("MetastInicial " . $_SESSION['MetastInicial'] . ", Metast_Hepaticas " . $_SESSION['Metast_Hepaticas']); 
    echo(", Metast_Oseas " . $_SESSION['Metast_Oseas'] . ", Metast_Pulmonares " . $_SESSION['Metast_Pulmonares']); 
    echo(", Metast_Nervioso " . $_SESSION['Metast_Nervioso']);*/ 
   

    /**********************  Tratamiento ********************************/
    
    $Enviar_Tratamiento="Enviar";
    $_SESSION["ButtonEnviarTratamiento"]=$Enviar_Tratamiento;
    
    $sqlTratamiento="SELECT * FROM tratamiento WHERE Id_Paciente = '$IdPaciente'";
    
    $rowTratamiento=mysqli_fetch_array(mysqli_query($conexion,$sqlTratamiento))
       or die('Error: ' . mysqli_error());
    
    $IdTratamiento = $rowTratamiento['ID'];
    
    /*
     * Tratamiendo neoadyuvante
     */
    $_SESSION["B_Tto_Neo"] = intval($rowTratamiento['B_Tto_Neo']);
    
   
    
    if($rowTratamiento['B_Tto_Neo'] == 1) //Ha recibido tratamiento neoadyuvante
    {
        $sqlNeo="SELECT * FROM tabla_neo WHERE Id_Tratamiento = '$IdTratamiento'";
    
        $rowNeo=mysqli_fetch_array(mysqli_query($conexion,$sqlNeo))
       or die('Error: ' . mysqli_error());
       
        $_SESSION["Tipo_TTO_Neoadyuvante"] = intval($rowNeo['Id_Tipo_Neo']);
    }
    else if ($rowTratamiento['B_Tto_Neo'] == 2) //Ha recibido tratamiento neoadyuvante
    {
        $sqlNoNeo="SELECT * FROM tabla_no_neo WHERE Id_Tratamiento = '$IdTratamiento'";
    
        $rowNoNeo=mysqli_fetch_array(mysqli_query($conexion,$sqlNoNeo))
       or die('Error: ' . mysqli_error());
       
        $_SESSION["tipo_no_neo"] = intval($rowNoNeo['Id_Tipo_No_Neo']);
    }

    /*
     * Tratamiendo adyuvante
     */
    $_SESSION["TTO_Adyuvante"] = intval($rowTratamiento['B_Tto_Ady']);

    
    if($rowTratamiento['B_Tto_Ady'] == 0) //No se ha rellenado el tratamiento Adyuvante
    {
        $_SESSION["Adyuvante_Pendiente"] = 1;
    }
    else if ($rowTratamiento['B_Tto_Ady'] == 1) //Hay tratamiento adyuvante
    {
        $sqlAdy="SELECT * FROM tabla_ady WHERE Id_Tratamiento = '$IdTratamiento'";
    
        $rowAdy=mysqli_fetch_array(mysqli_query($conexion,$sqlAdy))
       or die('Error: ' . mysqli_error());
       
        $_SESSION["Tipo_TTO_Adyuvante"] = intval($rowAdy['Id_Tipo_Ady']);
    }
    
    /*echo("B_Tto_Neo " . $_SESSION['B_Tto_Neo'] . ", Tipo_TTO_Neoadyuvante " . $_SESSION['Tipo_TTO_Neoadyuvante'] . ", tipo_no_neo " . $_SESSION['tipo_no_neo']);   
    echo "<br>";
    echo("Adyuvante_Pendiente " . $_SESSION['Adyuvante_Pendiente'] . ", TTO_Adyuvante " . $_SESSION['TTO_Adyuvante'] . " Tipo_TTO_Adyuvante " . $_SESSION['Tipo_TTO_Adyuvante']);*/
    
    /**********************  Cirugia ********************************/
    
    $Enviar_Cirugia="Enviar";
    $_SESSION["ButtonEnviarCirugia"]=$Enviar_Cirugia;
    
    $sqlCirugia="SELECT * FROM cirugia WHERE Id_Paciente = '$IdPaciente'";
    
    $rowCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlCirugia))
       or die('Error: ' . mysqli_error());
    
    $IdCirugia = $rowCirugia['ID'];
    
    /*
     * Cirugia
     */
     
    $_SESSION["B_Cirugia"] = intval($rowCirugia['B_Cirugia']);
 
    if($rowCirugia['B_Cirugia'] == 2) //No se ha realizado cirugía
    {
        $sqlNoCirugia="SELECT * FROM tabla_no_cirugia WHERE Id_Cirugia = '$IdCirugia'";
    
        $rowNoCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlNoCirugia))
       or die('Error: ' . mysqli_error());
       
        $_SESSION["Motivo_No_Cirugia"] = intval($rowNoCirugia['Id_Motivo']);
        
    }
    else if ($rowCirugia['B_Cirugia'] == 0)
    {
        
    }
    
    else //Se ha realizado cirugia
    {
        $sqlSiCirugia="SELECT * FROM tabla_cirugia WHERE Id_Cirugia = '$IdCirugia'";
    
        $rowSiCirugia=mysqli_fetch_array(mysqli_query($conexion,$sqlSiCirugia))
       or die('Error: ' . mysqli_error());
       
        $_SESSION["Tipo_Cirugia"] = intval($rowSiCirugia['Id_Planificacion']);
        $_SESSION["Fecha_Cirugia"] = $rowSiCirugia['Fecha_Intervencion'];
        $_SESSION["Fecha_Alta"] = $rowSiCirugia['Fecha_Alta'];
        $_SESSION["Fecha_Alta_Pendiente"] = null;
        
        if($rowSiCirugia['Fecha_Alta'] == '0000-00-00' || $_SESSION["Fecha_Alta"]==null ) //No se ha rellenado la fecha 
        {
            echo "entra \n";
            $_SESSION["Fecha_Alta_Pendiente"] = 1;
            $_SESSION["Fecha_Alta"] = null;
        }
        
        echo "Pendiente: " .  $_SESSION["Fecha_Alta_Pendiente"] . "\n";
        echo " Fecha alta: : " .  $_SESSION["Fecha_Alta"] . "\n";
        
        
        $_SESSION["Cirujano_Principal"] = utf8_encode($rowSiCirugia['Cirujano']);
        $_SESSION["Cirujano_Ayudante"] = utf8_encode($rowSiCirugia['Ayudante']);
        
        $_SESSION["Tecnicas_Cirugia"] = intval($rowSiCirugia['Id_Tecnica']);
        $_SESSION["Tipo_Anastomosis_Proyecto"] = intval($rowSiCirugia['Tipo_Anastomosis_Proyecto']);
        $_SESSION["Tipo_Anastomosis_coloanal"] = intval($rowSiCirugia['Tipo_Anastomosis_coloanal']);
        $_SESSION["Reseccion_interesfinteriana"] = intval($rowSiCirugia['Reseccion_interesfinteriana']);
        $_SESSION["Tipo_Reseccion_interesfinteriana"] = intval($rowSiCirugia['Tipo_Reseccion_interesfinteriana']);
         $_SESSION["Tipo_Reseccion_organos"] = intval($rowSiCirugia['Tipo_Reseccion_organos']);
        $_SESSION["Otra_Tecnica_Cirugia"] = null;
        
        /*if ($rowSiCirugia['Id_Otra_Tecnica'] != null)
        {
            $Otra_Tecnica_Cirugia = intval($rowSiCirugia['Id_Otra_Tecnica']);
    
            $sqlOtraTecnica = "SELECT *
                       FROM tabla_otras_tecnicas
                       WHERE ID = '$Otra_Tecnica_Cirugia'";
                       
            $rowOtraTecnica=mysqli_fetch_array(mysqli_query($conexion,$sqlOtraTecnica))
                    or die('Error: ' . mysqli_error());
   
            $_SESSION["Otra_Tecnica_Cirugia"] = utf8_encode($rowOtraTecnica['Tipo']);
            
        }*/
        
        if ($rowSiCirugia['B_Otra_Tecnica'] == 1)
        {
            $sqlOtraTecnica="SELECT * FROM tabla_otras_tecnicas WHERE Id_Cirugia = '$IdCirugia'";
            $rs=mysqli_query($conexion,$sqlOtraTecnica)
              or die('Error: ' . mysqli_error());
                
             while($rowOtrasTecnicas = mysqli_fetch_array($rs))
             {
                 $_SESSION["Otra_Tecnica_Cirugia"][] = intval($rowOtrasTecnicas['Id_Tipo_Otras_Tecnicas']);
             }
        }
        $_SESSION["Orientacion"] = intval($rowSiCirugia['Orientacion']);
        $_SESSION["Exeresis_Meso"] = intval($rowSiCirugia['Id_Exeresis_Meso']);
        $_SESSION["Otras_Resecc_Viscerales"] = intval($rowSiCirugia['B_Otras_Resecciones']);

        
        if ($rowSiCirugia['B_Otras_Resecciones'] == 1)
        {
            $sqlOtrasResecciones="SELECT * FROM tabla_otras_resecciones WHERE Id_Cirugia = '$IdCirugia'";

            $rs=mysqli_query($conexion,$sqlOtrasResecciones)
              or die('Error: ' . mysqli_error());
                
             while($rowOtrasResecciones = mysqli_fetch_array($rs))
             {
                    if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 1)
                    {
                        $_SESSION["Res_Seminales"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 2)
                    {
                        $_SESSION["Res_Peritoneo"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 3)
                    {
                        $_SESSION["Res_Vejiga"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 4)
                    {
                        $_SESSION["Res_Utero"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 5)
                    {
                        $_SESSION["Res_Vagina"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 6)
                    {
                        $_SESSION["Res_Prostata"]=1;
                    }
					else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 13)
                    {
                        $_SESSION["Res_Hepatica"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 7)
                    {
                        $_SESSION["Res_IDelgado"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 8)
                    {
                        $_SESSION["Res_Coccix"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 9)
                    {
                        $_SESSION["Res_Sacro"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 10)
                    {
                        $_SESSION["Res_Ureter"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 11)
                    {
                        $_SESSION["Res_Ovarios"]=1;
                    }
                    else if($rowOtrasResecciones['Id_Tipo_Otras_Resecciones'] == 12)
                    {
                        $_SESSION["Res_Trompas"]=1;
                    }   
             
            }
        }//end $rowSiCirugia['B_Otras_Resecciones']
            
            /*
             * Resultados
             */
             
             $sqlCaracteristicas="SELECT * FROM tabla_caracteristicas_cirugia WHERE Id_Cirugia = '$IdCirugia'";
    
             $rowCaracteristicas=mysqli_fetch_array(mysqli_query($conexion,$sqlCaracteristicas))
               or die('Error: ' . mysqli_error());
               
             $_SESSION["ASA"] = intval($rowCaracteristicas['Id_Asa']);
             $_SESSION["Hallazgos_Intraoperatorios"] = intval($rowCaracteristicas['Id_Hallazgos_Intra']);
             $_SESSION["Perforacion_Tumoral"] = intval($rowCaracteristicas['Perforacion_Tumoral']);
             $_SESSION["Tipo_Metast_Hepaticas"] = intval($rowCaracteristicas['Id_Metast_Hepaticas']);
             $_SESSION["Imp_Ovaricos"] = intval($rowCaracteristicas['Implantes_Ovaricos']);
             $_SESSION["Obstruccion"] = intval($rowCaracteristicas['Obstruccion']);
             
             /*
             * Caracteristicas
             */
             $_SESSION["Via_Operacion"] = intval($rowCaracteristicas['Id_Via_Operacion']);
             $_SESSION["Tiempo_Operacion"] = intval($rowCaracteristicas['Tiempo_operatorio']);
             $_SESSION["Transfusiones"] = intval($rowCaracteristicas['Transfusion']);
             $_SESSION["Intencion_Operatoria"] = intval($rowCaracteristicas['Id_Intencion']);
             $_SESSION["Anastomosis"] = intval($rowCaracteristicas['Id_Anastomosis']);
             $_SESSION["Reservorio"] = intval($rowCaracteristicas['Id_Reservorio']);
             $_SESSION["Estoma_Derivacion"] = intval($rowCaracteristicas['B_Estoma_Derivacion']);
             $_SESSION["Tipo_Estoma"] = null;
             
             if ($_SESSION["Estoma_Derivacion"] == 1) //Hay estoma de derivación
             {
                 $sqlEstoma="SELECT * FROM tabla_estoma WHERE Id_Cirugia = '$IdCirugia'";
    
                 $rowEstoma=mysqli_fetch_array(mysqli_query($conexion,$sqlEstoma))
                   or die('Error: ' . mysqli_error());
       
                 $_SESSION["Tipo_Estoma"] = intval($rowEstoma['Id_Tipo_Estoma']);
             }
             
            /*
             * Complicaciones
             */
             
             $sqlIsComplicaciones="SELECT * FROM tabla_complicaciones WHERE Id_Cirugia = '$IdCirugia'";
    
             $rowIsComplicaciones=mysqli_fetch_array(mysqli_query($conexion,$sqlIsComplicaciones))
               or die('Error: ' . mysqli_error());
             
             $_SESSION["Complicaciones"] = intval($rowIsComplicaciones['B_Complicaciones']);
             
                 
             if ($rowIsComplicaciones['B_Complicaciones'] == 1) //Hay complicaciones
             {
                 $sqlComplicaciones="SELECT * FROM tabla_tipo_complicaciones WHERE Id_Cirugia = '$IdCirugia'";
    
                 $rowComplicaciones=mysqli_fetch_array(mysqli_query($conexion,$sqlComplicaciones))
                    or die('Error: ' . mysqli_error());
                 
                 $_SESSION["Reintervencion"] = intval($rowComplicaciones['B_Reintervencion']);
                 $_SESSION["Tipo_Reintervencion"] = null;
                 if ($rowComplicaciones['B_Reintervencion'] == 1) //Hay estoma de derivación
                 {
                     $sqlReintervencion="SELECT tabla_tipo_reintervencion.Tipo 
                                         FROM tabla_reintervencion 
                                         INNER JOIN tabla_tipo_reintervencion
                                         ON tabla_reintervencion.Id_Tipo_Reintervencion = tabla_tipo_reintervencion.ID
                                         WHERE Id_Cirugia = '$IdCirugia'";
    
                     $rowReintervencion=mysqli_fetch_array(mysqli_query($conexion,$sqlReintervencion))
                      or die('Error: ' . mysqli_error());
                      
                     $_SESSION["Tipo_Reintervencion"] = utf8_encode($rowReintervencion['Tipo']);
                     //$_SESSION["Tipo_Reintervencion"] =($rowReintervencion['Tipo']);
                 }
                 
                 $_SESSION["Exitus_Intra"] = intval($rowComplicaciones['B_Exitus_Intraop']);
                 $_SESSION["Causa_Exitus_Intra"] = null;
                 if ($rowComplicaciones['B_Exitus_Intraop'] == 1) //Hay estoma de derivación
                 {
                     $sqlIntra="SELECT tabla_tipo_exitus_intraop.Tipo 
                                FROM tabla_exitus_intraop
                                INNER JOIN tabla_tipo_exitus_intraop 
                                ON tabla_exitus_intraop.Id_Tipo_Exitus_Intraop = tabla_tipo_exitus_intraop.ID
                                WHERE Id_Cirugia = '$IdCirugia'";
    
                     $rowIntra=mysqli_fetch_array(mysqli_query($conexion,$sqlIntra))
                      or die('Error: ' . mysqli_error());
                      
                     $_SESSION["Causa_Exitus_Intra"] = utf8_encode($rowIntra['Tipo']);
                     //$_SESSION["Causa_Exitus_Intra"] = ($rowIntra['Tipo']);
                 }
                 
                 $_SESSION["Exitus_Post"] = intval($rowComplicaciones['B_Exitus_Postop']);
                 $_SESSION["Causa_Exitus_Post"] = null;
                 if ($rowComplicaciones['B_Exitus_Postop'] == 1) //Hay estoma de derivación
                 {
                     $sqlPost="SELECT tabla_tipo_exitus_postop.Tipo 
                               FROM tabla_exitus_postop 
                               INNER JOIN tabla_tipo_exitus_postop
                               ON tabla_exitus_postop.Id_Tipo_Exitus_Postop = tabla_tipo_exitus_postop.ID
                               WHERE Id_Cirugia = '$IdCirugia'";
    
                     $rowPost=mysqli_fetch_array(mysqli_query($conexion,$sqlPost))
                      or die('Error: ' . mysqli_error());
                      
                     $_SESSION["Causa_Exitus_Post"] = utf8_encode($rowPost['Tipo']);
                     //$_SESSION["Causa_Exitus_Post"] =($rowPost['Tipo']);
                 }
					
				//$_SESSION["Generales_Sepsis"]=intval($rowComplicaciones['Sepsis']);
  				//$_SESSION["Generales_Shock"]=intval($rowComplicaciones['Shock']);
                 if ($rowComplicaciones['B_Herida'] == 1) //Hay herida
                 {
                     $sqlHerida="SELECT * FROM tabla_herida WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlHerida)
                        or die('Error: ' . mysqli_error());
                
                     while($rowHerida = mysqli_fetch_array($rs))
                     {
                            if($rowHerida['Id_Tipo_Herida'] == 1)
                            {
                                $_SESSION["Herida_Hemorragia"] = 1;
                            }
                            else if($rowHerida['Id_Tipo_Herida'] == 2)
                            {
                                $_SESSION["Herida_Infeccion"] = 1;
                            }
                            else if($rowHerida['Id_Tipo_Herida'] == 3)
                            {
                                $_SESSION["Herida_Evisceracion"] = 1;
                            }
							else if($rowHerida['Id_Tipo_Herida'] == 4)
                            {
                                $_SESSION["Herida_Eventracion"] = 1;
                            }
                     }
                     
                 }
                
                     
                 if ($rowComplicaciones['B_Perine'] == 1) //Hay periné
                 {
                     $sqlPerine="SELECT * FROM tabla_perine WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlPerine)
                        or die('Error: ' . mysqli_error());
                
                     while($rowPerine = mysqli_fetch_array($rs))
                     {
                            if($rowPerine['Id_Tipo_Perine'] == 1)
                            {
                                $_SESSION["Perine_Infeccion"] = 1;
                            }
                            else if($rowPerine['Id_Tipo_Perine'] == 2)
                            {
                                $_SESSION["Perine_Retraso_Cicatrizacion"] = 1;
                            }
							else if($rowPerine['Id_Tipo_Perine'] == 3)
                            {
                                $_SESSION["Perine_Hernia"] = 1;
                            }
                     }
                     
                 }

                
                if ($rowComplicaciones['B_Abdominales'] == 1) //Hay abdominales
                 {
                     $sqlAbdominales="SELECT * FROM tabla_abdominales WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlAbdominales)
                        or die('Error: ' . mysqli_error());
                
                     while($rowAbdominales = mysqli_fetch_array($rs))
                     {
                            if($rowAbdominales['Id_Tipo_Abdominales'] == 1)
                            {
                                $_SESSION["Abdominales_Hemoperitoneo"] = 1;
                            }
                            else if($rowAbdominales['Id_Tipo_Abdominales'] == 2)
                            {
                                $_SESSION["Abdominales_Peri_Difusas"] = 1;
                            }
                            else if($rowAbdominales['Id_Tipo_Abdominales'] == 3)
                            {
                                $_SESSION["Abdominales_Abceso_Abdominal"] = 1;
                            }
							 else if($rowAbdominales['Id_Tipo_Abdominales'] == 9)
                            {
                                $_SESSION["Abdominales_Abceso_Pelvico"] = 1;
                            }
                            else if($rowAbdominales['Id_Tipo_Abdominales'] == 4)
                            {
                                $_SESSION["Abdominales_Isquemia_Intestinal"] = 1;
                            }
                            else if($rowAbdominales['Id_Tipo_Abdominales'] == 5)
                            {
                                $_SESSION["Abdominales_Colecistitis"] = 1;
                            }
                            else if($rowAbdominales['Id_Tipo_Abdominales'] == 6)
                            {
                                $_SESSION["Abdominales_Iatrog_Vias_Urinarias"] = 1;
                            }
                            else if($rowAbdominales['Id_Tipo_Abdominales'] == 7)
                            {
                                $_SESSION["Abdominales_Ileo_Paralitico_Prolongado"] = 1;
                            }
                            else if($rowAbdominales['Id_Tipo_Abdominales'] == 8)
                            {
                                $_SESSION["Abdominales_Ileo_Mecanico"] = 1;
                            }
							else if($rowAbdominales['Id_Tipo_Abdominales'] == 10)
                            {
                                $_SESSION["Abdominales_Hemo_Abdominal"] = 1;
                            }
                            else if($rowAbdominales['Id_Tipo_Abdominales'] == 11)
                            {
                                $_SESSION["Abdominales_Hemo_Pelvica"] = 1;
                            }
							else if($rowAbdominales['Id_Tipo_Abdominales'] == 12)
                            {
                                $_SESSION["Abdominales_Iatrog_Vias_Huecas"] = 1;
                            }
							else if($rowAbdominales['Id_Tipo_Abdominales'] == 13)
                            {
                                $_SESSION["Abdominales_Estoma"] = 1;
                            }
							else if($rowAbdominales['Id_Tipo_Abdominales'] == 14)
                            {
                                $_SESSION["Generales_Sepsis"] = 1;
                            }
							else if($rowAbdominales['Id_Tipo_Abdominales'] == 15)
                            {
                                $_SESSION["Generales_Shock"] = 1;
                            }
                            
                     }
                     
                 }

                 if ($rowComplicaciones['B_Anastomosis'] == 1) //Hay anastomosis
                 {
                     $sqlAnastomosis="SELECT * FROM tabla_anastomosis_complicaciones WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlAnastomosis)
                        or die('Error: ' . mysqli_error());
                
                     while($rowAnastomosis = mysqli_fetch_array($rs))
                     {
                            if($rowAnastomosis['Id_Tipo_Anastomosis_Complicaciones'] == 1)
                            {
                                $_SESSION["Anastomosis_Hemorragia"] = 1;
                            }
                            else if($rowAnastomosis['Id_Tipo_Anastomosis_Complicaciones'] == 2)
                            {
                                $_SESSION["Anastomosis_Fuga"] = 1;
                            }
							else if($rowAnastomosis['Id_Tipo_Anastomosis_Complicaciones'] == 3)
                            {
                                $_SESSION["Anastomosis_Fistula"] = 1;
                            }
                     }
                     
                 }
                 
                
                if ($rowComplicaciones['B_Otras'] == 1) //Hay otras complicaciones
                 {
                     $sqlOtrasC="SELECT * FROM tabla_otras_complicaciones WHERE Id_Cirugia = '$IdCirugia'";

                     $rs=mysqli_query($conexion,$sqlOtrasC)
                        or die('Error: ' . mysqli_error());
                
                     while($rowOtrasC = mysqli_fetch_array($rs))
                     {
                            if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 1)
                            {
                                $_SESSION["Otras_Hemo_Diges"] = 1;
                            }
                            else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 2)
                            {
                                $_SESSION["Otras_Infeccion_Urinaria"] = 1;
                            }
                            else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 3)
                            {
                                $_SESSION["Otras_Cardiovascular"] = 1;
                            }
                            else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 4)
                            {
                                $_SESSION["Otras_Hepatica"] = 1;
                            }
                            else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 5)
                            {
                                $_SESSION["Otras_Respiratoria"] = 1;
                            }
                            else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 6)
                            {
                                $_SESSION["Otras_FMO"] = 1;
                            }
                            else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 7)
                            {
                                $_SESSION["Otras_TEP"] = 1;
                            }
                            else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 8)
                            {
                                $_SESSION["Otras_Neuroapraxia"] = 1;
                            }
							else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 10)
                            {
                                $_SESSION["Comp_Otras_Urologicas"] = 1;
                            }
							else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 11)
                            {
                                $_SESSION["Otras_Respiratoria_Infecc"] = 1;
                            }
							else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 13)
                            {
                                $_SESSION["Otras_Vascular_Infecc"] = 1;
                            }
							else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 14)
                            {
                                $_SESSION["Otras_Vascular_Mec"] = 1;
                            }
							else if($rowOtrasC['Id_Tipo_Otras_Complicaciones'] == 15)
                            {
                                $_SESSION["Otras_Renal"] = 1;
                            }
                     
                     }
                     
                 }
                 
         } //End $rowComplicaciones['B_Complicaciones']
             
}//end $rowCirugia['B_Cirugia']
     
    
    /*echo("B_Cirugia " . $_SESSION['B_Cirugia'] . ", Motivo_No_Cirugia " . $_SESSION['Motivo_No_Cirugia']);   
    echo "<br>";
    echo("Tipo_Cirugia " . $_SESSION['Tipo_Cirugia'] . ", Fecha_Cirugia " . $_SESSION['Fecha_Cirugia'] . " Fecha_Alta " . $_SESSION['Fecha_Alta']);
    echo "<br>";
    echo("Cirujano_Principal " . $_SESSION['Cirujano_Principal'] . ", Cirujano_Ayudante " . $_SESSION['Cirujano_Ayudante']);
    echo("Tecnicas_Cirugia " . $_SESSION['Tecnicas_Cirugia'] . ", Otras_Tecnicas " . $_SESSION['Otras_Tecnicas']);
    echo("Exeresis_Meso " . $_SESSION['Exeresis_Meso']);
    echo "<br>";
    echo("Otras_Resecc_Viscerales " . $_SESSION['Otras_Resecc_Viscerales'] . ", Res_Seminales " . $_SESSION['Res_Seminales']);
    echo("Res_Peritoneo " . $_SESSION['Res_Peritoneo'] . ", Res_Vejiga " . $_SESSION['Res_Vejiga']);
    echo("Res_Utero " . $_SESSION['Res_Utero'] . ", Res_Vagina " . $_SESSION['Res_Vagina']);
    echo("Res_Prostata " . $_SESSION['Res_Prostata'] . ", Res_IDelgado " . $_SESSION['Res_IDelgado']);
    echo("Res_Coccix " . $_SESSION['Res_Coccix'] . ", Res_Sacro " . $_SESSION['Res_Sacro']);
    echo("Res_Ureter " . $_SESSION['Res_Ureter'] . "Res_Ovarios " . $_SESSION['Res_Ovarios'] . ", Res_Trompas " . $_SESSION['Res_Trompas']);*/
    
    /*echo("ASA " . $_SESSION['ASA'] . ", Hallazgos_Intraoperatorios " . $_SESSION['Hallazgos_Intraoperatorios']);   
    echo "<br>";
    echo("Perforacion_Tumoral " . $_SESSION['Perforacion_Tumoral'] . " Tipo_Metast_Hepaticas " . $_SESSION['Tipo_Metast_Hepaticas']);
    echo "<br>";
    echo("Imp_Ovaricos " . $_SESSION['Imp_Ovaricos'] . ", Obstruccion " . $_SESSION['Obstruccion']);*/
    /*echo("Via_Operacion " . $_SESSION['Via_Operacion'] . ", Tiempo_Operacion " . $_SESSION['Tiempo_Operacion']);   
    echo "<br>";
    echo("Transfusiones " . $_SESSION['Transfusiones'] . ", Intencion_Operatoria " . $_SESSION['Intencion_Operatoria'] . " Anastomosis " . $_SESSION['Anastomosis']);
    echo "<br>";
    echo("Reservorio " . $_SESSION['Reservorio'] . ", Estoma_Derivacion " . $_SESSION['Estoma_Derivacion'] . ", Tipo_Estoma " . $_SESSION['Tipo_Estoma']);*/
    /*echo("Complicaciones " . $_SESSION['Complicaciones'] . ", Reintervencion " . $_SESSION['Reintervencion']);   
    echo("Tipo_Reintervencion " . $_SESSION['Tipo_Reintervencion']);   
    echo "<br>";    
    echo("Exitus_Intra " . $_SESSION['Exitus_Intra'] . ", Causa_Exitus_Intra " . $_SESSION['Causa_Exitus_Intra']);   
    echo "<br>";
    echo("Exitus_Post " . $_SESSION['Exitus_Post'] . ", Causa_Exitus_Post " . $_SESSION['Causa_Exitus_Post']);   
    echo "<br>";
    
    echo("Herida_Hemorragia " . $_SESSION['Herida_Hemorragia'] . ", Herida_Infeccion " . $_SESSION['Herida_Infeccion']. ", Herida_Evisceracion " . $_SESSION['Herida_Evisceracion']);   
    echo "<br>";
    
    echo("Perine_Infeccion " . $_SESSION['Perine_Infeccion'] . ", Perine_Retraso_Cicatrizacion " . $_SESSION['Perine_Retraso_Cicatrizacion']);   
    echo "<br>";
    echo("Abdominales_Hemoperitoneo " . $_SESSION['Abdominales_Hemoperitoneo'] . ", Abdominales_Peri_Difusas " . $_SESSION['Abdominales_Peri_Difusas']);   
    echo("Abdominales_Abceso_Abdominal " . $_SESSION['Abdominales_Abceso_Abdominal'] . ", Abdominales_Isquemia_Intestinal " . $_SESSION['Abdominales_Isquemia_Intestinal']);   
    echo("Abdominales_Colecistitis " . $_SESSION['Abdominales_Colecistitis'] . ", Abdominales_Iatrog_Vias_Urinarias " . $_SESSION['Abdominales_Iatrog_Vias_Urinarias']);   
    echo("Abdominales_Ileo_Paralitico_Prolongado " . $_SESSION['Abdominales_Ileo_Paralitico_Prolongado'] . ", Abdominales_Ileo_Mecanico " . $_SESSION['Abdominales_Ileo_Mecanico']);   
    
    echo "<br>";
    echo("Anastomosis_Hemorragia " . $_SESSION['Anastomosis_Hemorragia'] . ", Anastomosis_Fuga " . $_SESSION['Anastomosis_Fuga']);   
    
    echo "<br>";
    echo("Otras_Hemo_Diges " . $_SESSION['Otras_Hemo_Diges'] . ", Otras_Infeccion_Urinaria " . $_SESSION['Otras_Infeccion_Urinaria']);   
    echo("Otras_Cardiovascular " . $_SESSION['Otras_Cardiovascular'] . ", Otras_Hepatica " . $_SESSION['Otras_Hepatica']);   
    echo("Otras_Respiratoria " . $_SESSION['Otras_Respiratoria'] . ", Otras_FMO " . $_SESSION['Otras_FMO']);   
    echo("Otras_TEP " . $_SESSION['Otras_TEP'] . ", Otras_Neuroapraxia " . $_SESSION['Otras_Neuroapraxia']);   
    */   
        
    /**********************  Patologica ********************************/
    
    
    $Enviar_Patologica="Enviar";
    $_SESSION["ButtonEnviarPatologica"]=$Enviar_Patologica;
    
    $sqlTabla_Patologica="SELECT * FROM tabla_patologica WHERE Id_Paciente = '$IdPaciente'";
    
    $rs = (mysqli_query($conexion,$sqlTabla_Patologica))
       or die('Error: ' . mysqli_error());
    
    $rowTabla_Patologica=mysqli_fetch_array($rs);
    

    if (intval($rowTabla_Patologica["Estado"]) == 2) //No está rellena
    {
        $_SESSION["No_Patologica"] = 1;
        $_SESSION["Patologica_Pendiente"] = null;
    }
    else if(intval($rowTabla_Patologica["Estado"]) == 3) //Pendiente
    {
        $_SESSION["No_Patologica"] = null;
        $_SESSION["Patologica_Pendiente"] = 1;
    }
    else //Se ha rellenado la patología
    {
        $_SESSION["No_Patologica"] = null;
        $_SESSION["Patologica_Pendiente"] = null;
        
        $sqlPatologica="SELECT * FROM anatomia_patologica WHERE Id_Paciente = '$IdPaciente'";
    
        $rs = (mysqli_query($conexion,$sqlPatologica))
           or die('Error: ' . mysqli_error());
        
        $rowPatologica=mysqli_fetch_array($rs);
        
        $IdPatologica = $rowPatologica['ID'];
        
        /*
         * Histologia
         */

        $_SESSION["Tipo_Histologico"] = intval($rowPatologica['Id_Histologico']);
        
        if (intval($_SESSION["Tipo_Histologico"]) == 7)
        {
            $Otros_Histologico = intval($rowPatologica['Id_Otros_Histologico']);
            $sqlOtros_Histologico = "SELECT Tipo
                                     FROM tabla_tipo_otros_histologico
                                     WHERE ID = '$Otros_Histologico'";
            
            
            $rs = (mysqli_query($conexion,$sqlOtros_Histologico))
           or die('Error: ' . mysqli_error());
        
            $rowOtros_Histologico=mysqli_fetch_array($rs);
            
            //$_SESSION["Otros_Histologico"] =  utf8_encode($rowOtros_Histologico['Tipo']);
            $_SESSION["Otros_Histologico"] = utf8_encode($rowOtros_Histologico['Tipo']);
        }
        
        $_SESSION["T_Patologico"] = intval($rowPatologica['Id_T']);
        $_SESSION["N_Patologico"] = intval($rowPatologica['Id_N']); 
        $_SESSION["M_Patologico"] = intval($rowPatologica['Id_M']);
        $_SESSION["Ganglios_Aislados"] = intval($rowPatologica['Glangios_Ais']);
        $_SESSION["Ganglios_Afectados"] = intval($rowPatologica['Glangios_Afec']);
        $_SESSION["Estadio_Patologico"] = intval($rowPatologica['Id_Estadio_Patologico']);
    
         /*
         * Resección
         */
  
        $_SESSION["Margen_Distal"] = intval($rowPatologica['Id_Margen_Distal']);
        $_SESSION["Margen_Circunferencial"] = intval($rowPatologica['Id_Margen_Circunferencial']);
        $_SESSION["Tipo_Res"] = intval($rowPatologica['Id_Tipo_Res']);
        $_SESSION["Tipo_Regresion"] = intval($rowPatologica['Id_Regresion']);
        $_SESSION["Estadio_Tumor_Sincronico"] = intval($rowPatologica['Id_Estadio_Sincronico']);
        $_SESSION["Calidad_Mesorrecto"] = intval($rowPatologica['Id_Meso_Cal']);
       

    }

   /*echo("Patologica_Pendiente " . $_SESSION['Patologica_Pendiente']);   
   echo "<br>"; 
   echo("No_Patologica " . $_SESSION['No_Patologica']);   
   echo "<br>"; 
   echo("Tipo_Histologico " . $_SESSION['Tipo_Histologico'] . ", Otros_Histologico " . $_SESSION['Otros_Histologico']);   
   echo("T_Patologico " . $_SESSION['T_Patologico'] . ", N_Patologico " . $_SESSION['N_Patologico']);   
   echo("M_Patologico " . $_SESSION['M_Patologico']);   
   echo "<br>";
   echo("Ganglios_Aislados " . $_SESSION['Ganglios_Aislados'] . ", Ganglios_Afectados " . $_SESSION['Ganglios_Afectados']);   
   echo("Estadio_Patologico " . $_SESSION['Estadio_Patologico']);   
   echo "<br>";
   
   
   echo("Margen_Distal " . $_SESSION['Margen_Distal'] . ", Margen_Circunferencial " . $_SESSION['Margen_Circunferencial']);   
   echo("Tipo_Reseccion " . $_SESSION['Tipo_Reseccion'] . ", Tipo_Regresion " . $_SESSION['Tipo_Regresion']);   
   echo "<br>";
   echo("Estadio_Tumor_Sincronico " . $_SESSION['Estadio_Tumor_Sincronico'] . ", Calidad_Mesorrecto " . $_SESSION['Calidad_Mesorrecto']); */  
   

   /**********************  Seguimiento ********************************/
     
    $Enviar_Seguimiento="Enviar";
    $_SESSION["ButtonEnviarSeguimiento"]=$Enviar_Seguimiento;
    

    $sqlSegPaciente="SELECT * FROM seguimiento WHERE Id_Paciente = '$IdPaciente'";
    
    $rowSegPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlSegPaciente))
       or die('Error: ' . mysqli_error());
    
    
    $IDSeguimiento=$rowSegPaciente["ID"];
    
    $_SESSION["IDSeguimientoRevision"]=$IDSeguimiento;
    $_SESSION["Fecha_Revision"]=$rowSegPaciente['Fecha_Revision'];
	
	$_SESSION["Comentarios_Adicionales"]=utf8_encode($rowSegPaciente["Comentarios_Adicionales"]);
    
    /*********************RECIDIVA******************************/
    
    $_SESSION["Recidiva"]=intval($rowSegPaciente["B_Recidiva"]);
   
    
    
    //Si hay recidiva se rellenan los datos
    
    if($rowSegPaciente["B_Recidiva"]==1){
            
        $sqlRecidiva="SELECT * FROM tabla_recidiva WHERE Id_Seguimiento='$IDSeguimiento'";
        
        $rowRecidiva=mysqli_fetch_array(mysqli_query($conexion,$sqlRecidiva))
             or die('Error: ' . mysqli_error());
       
       $_SESSION["Fecha_Recidiva"]=$rowRecidiva["Fecha_Recidiva"];
       
       $Localizacion_Recidiva = intval($rowRecidiva["Id_tabla_seg_localiz_recidiva"]);
       $sqlRecidivaLoc="SELECT Tipo 
                      FROM tabla_seg_localiz_recidiva
                      WHERE ID = '$Localizacion_Recidiva'";
        
       $rowRecidivaLoc=mysqli_fetch_array(mysqli_query($conexion,$sqlRecidivaLoc))
             or die('Error: ' . mysqli_error());
             
             
       $_SESSION["Localizacion_Recidiva"] = utf8_encode($rowRecidivaLoc["Tipo"]);
       $_SESSION["Intervencion_Recidiva"]=intval($rowRecidiva["Intervencion"]);
       
    }
    
   /* echo("B_Recidiva " . $_SESSION['Recidiva']);   
    echo "<br>";
    echo("Fecha_Recidiva " . $_SESSION['Fecha_Recidiva']);   
    echo "<br>";
    echo("Localizacion_Recidiva " . $_SESSION['Localizacion_Recidiva']);   
    echo "<br>";
    echo("Intervencion_Recidiva " . $_SESSION['Intervencion_Recidiva']);   
    echo "<br>";*/
    
    
/****************************METASTASIS**************************************/  
    
    
    $_SESSION["Metastasis"]=intval($rowSegPaciente["B_Metastasis"]);    
    
    //Si hay metástasis
    if($rowSegPaciente["B_Metastasis"]==1){
        
        $sqlMetastasis="SELECT * FROM tabla_metastasis WHERE Id_Seguimiento='$IDSeguimiento'";
        
        $rowMetastasis=mysqli_fetch_array(mysqli_query($conexion,$sqlMetastasis))
             or die('Error: ' . mysqli_error());
        $_SESSION["Fecha_Metastasis"]=$rowMetastasis["Fecha_Metastasis"];
        
        $Localizacion_Metastasis = intval($rowMetastasis["Id_tabla_seg_localiz_metastasis"]);
        $sqlMetastasisLoc="SELECT Tipo 
                      FROM tabla_seg_localiz_metastasis
                      WHERE ID = '$Localizacion_Metastasis'";
        
        $rowMetastasisLoc=mysqli_fetch_array(mysqli_query($conexion,$sqlMetastasisLoc))
             or die('Error: ' . mysqli_error());
             
             
        $_SESSION["Localizacion_Metastasis"] = utf8_encode($rowMetastasisLoc["Tipo"]);
        $_SESSION["Intervencion_Metastasis"]=intval($rowMetastasis["Intervencion"]); 
        

    }
        

/******************************SEGUNDO TUMOR*****************************************/

        $_SESSION["Segundo_Tumor"]=intval($rowSegPaciente["B_Segundo_Tumor"]);
        
        //Si hay segundo tumor 
        if($rowSegPaciente["B_Segundo_Tumor"]==1){
                    
            $sqlSegundoTumor="SELECT * FROM tabla_segundo_tumor WHERE Id_Seguimiento='$IDSeguimiento'";
            
            $rowSegundoTumor=mysqli_fetch_array(mysqli_query($conexion,$sqlSegundoTumor))
                 or die('Error: ' . mysqli_error());    
             
            $_SESSION["Fecha_Segundo_Tumor"]=$rowSegundoTumor["Fecha_Segundo_Tumor"];
            
            $Localizacion_Segundo_Tumor = intval($rowSegundoTumor["Id_tabla_seg_localiz_segundo_tumor"]);
            $sqlSegundoTumorLoc="SELECT Tipo 
                      FROM tabla_seg_localiz_segundo_tumor
                      WHERE ID = '$Localizacion_Segundo_Tumor'";
        
            $rowSegundoTumorLoc=mysqli_fetch_array(mysqli_query($conexion,$sqlSegundoTumorLoc))
             or die('Error: ' . mysqli_error());
             
             
            $_SESSION["Localizacion_Segundo_Tumor"] = utf8_encode($rowSegundoTumorLoc["Tipo"]);
            $_SESSION["Intervencion_Segundo_Tumor"]=intval($rowSegundoTumor["Intervencion"]);
            
        }
        

/*************************************ESTADO DEL PACIENTE****************************************/

        
        $_SESSION["Estado"]=intval($rowSegPaciente["B_Estado"]);

    
    //Si el paciente está muerto
        if($rowSegPaciente["B_Estado"]==2){
                
            $sqlEstadoPaciente="SELECT * FROM tabla_estado WHERE Id_Seguimiento='$IDSeguimiento'";
            
            $rowEstadoPaciente=mysqli_fetch_array(mysqli_query($conexion,$sqlEstadoPaciente))
                 or die('Error: ' . mysqli_error());
                 
            $_SESSION["Fecha_Muerte"]=$rowEstadoPaciente["Fecha_Muerte"];
            $_SESSION["Causa_Muerte"]=intval($rowEstadoPaciente["Relacion_Muerte"]);
        }
    

/*******************************IMPOSIBILIDAD DE SEGUIMIENTO************************************/


        $_SESSION["Imposibilidad"]=intval($rowSegPaciente["B_Imposibilidad"]);

    
    //Si hay imposibilidad, se carga la causa
        if($rowSegPaciente["B_Imposibilidad"]==1){
            
            $sqlImposibilidad="SELECT * FROM tabla_imposibilidad WHERE Id_Seguimiento='$IDSeguimiento'";
            
            $rowImposibilidad=mysqli_fetch_array(mysqli_query($conexion,$sqlImposibilidad))
                 or die('Error: ' . mysqli_error());
        
            $Causa_Imposibilidad = $rowImposibilidad["Id_tabla_seg_imposibilidad"];
            $sqlImposibilidadCausa="SELECT Causa 
                      FROM tabla_seg_imposibilidad
                      WHERE ID = '$Causa_Imposibilidad'";
        
            $rowImposibilidadCausa=mysqli_fetch_array(mysqli_query($conexion,$sqlImposibilidadCausa))
             or die('Error: ' . mysqli_error());
             
             
            $_SESSION["Causa_Imposibilidad"] = utf8_encode($rowImposibilidadCausa["Causa"]);
    
        }

   
    
         
   //header("Location: ../NuevoPaciente/Seguimiento/Seguimiento.php");
    
    mysqli_close($conexion);
   header("Location: ../NuevoPaciente/Inicial/Inicial.php");
    
?>