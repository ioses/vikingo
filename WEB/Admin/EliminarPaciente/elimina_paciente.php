<?php

//Se elimina al paciente de la BDD
session_start();
require_once ("../../BDD/conexion.php");

$NHC = $_POST['NHC'];
$idHospital = $_POST['idHospi'];
$Hospital = $_POST['Hospital'];


//Miramos si el paciente está en la base de datos

$sqlIsPaciente = "SELECT *
                  FROM identificador_paciente
                  WHERE NHC = AES_ENCRYPT('$NHC','$claveNHC')
                  AND Id_Hospital = '$idHospital'";
                  
$rs = mysqli_query($conexion,$sqlIsPaciente)
  or die('Error: ' . mysqli_error());
  
$rowIsPaciente=mysqli_fetch_array($rs);

if ( count($rowIsPaciente) > 0 ) // Si el paciente está en la base de datos, nos quedamos con el ID
{
    $Id_Paciente=$rowIsPaciente['ID'];

    //Se pasa el Id_Paciente por SESSION
    $_SESSION["Id_Paciente"]=$Id_Paciente;
    

   // echo "Paciente existe: " . $Id_Paciente . "<br>";

       /******************************************************************************
     * 
     * TABLA GENERAL Y ESTADISTICA
     * 
     * *****************************************************************************/
   
   		$sqlBorraGeneral="DELETE FROM tabla_general WHERE NHC='$NHC'";
		
		mysqli_query($conexion, $sqlBorraGeneral) or die ('Error: '."Elimina de tabla general (48)");
		
		$sqlBorraEstadistica="DELETE FROM tabla_estadistica WHERE ID='$Id_Paciente'";
		
		mysqli_query($conexion, $sqlBorraEstadistica) or die ('Error: '."Elimina de tabla estadistica (52)");
   
   
   
           
    /******************************************************************************
     * 
     * HOJA INICIAL
     * identificador_paciente: Se hace update, ya que necesitamos el ID del paciente
     * inicial: Borramos al final por si acaso, ya que necesitamos el ID de inicial para hacer los deletes
     *
     * tabla_sincro, tabla_eco, tabla_rmn, tabla_vecinos y tabla_metast_inicial
     * 
     * *****************************************************************************/
    
   
    $sqlIdInicial="SELECT ID
                   FROM inicial
                   WHERE Id_Paciente = '$Id_Paciente'";
    
    
    $rs = mysqli_query($conexion,$sqlIdInicial)
    or die('Error: ' . mysqli_error());
    
    $rowInicial = mysqli_fetch_array($rs);
    
    if ( count($rowInicial) > 0 ) // Si exite, borramos la tabla
    {
        $Id_Inicial=intval($rowInicial['ID']);
        
        $sqlIsSincro = "SELECT *
                    FROM tabla_sincro
                    WHERE Id_Inicial = '$Id_Inicial'";
    
        $rs = mysqli_query($conexion,$sqlIsSincro)
        or die('Error: ' . mysqli_error());
          
        $rowIsSincro = mysqli_fetch_array($rs);
        
        if ( count($rowIsSincro) > 0 ) // Si exite, borramos la tabla
        {
            $sqlSincroDelete = "DELETE
                                FROM tabla_sincro
                                WHERE Id_Inicial = '$Id_Inicial'";
        
            mysqli_query($conexion,$sqlSincroDelete)
            or die('Error: ' . mysqli_error());
        } 
         
         
           
        $sqlIsECO = "SELECT *
                     FROM tabla_eco
                     WHERE Id_Inicial = '$Id_Inicial'";
        
        $rs = mysqli_query($conexion,$sqlIsECO)
        or die('Error: ' . mysqli_error());
          
        $rowIsECO = mysqli_fetch_array($rs);
        
        if ( count($rowIsECO) > 0 ) // Si exite, borramos la tabla
        {
            $sqlECODelete = "DELETE
                             FROM tabla_eco
                             WHERE Id_Inicial = '$Id_Inicial'";
        
            mysqli_query($conexion,$sqlECODelete)
            or die('Error: ' . mysqli_error());
        } 
           
         
            
        $sqlIsRMN = "SELECT *
                     FROM tabla_rmn
                     WHERE Id_Inicial = '$Id_Inicial'";
        
        $rs = mysqli_query($conexion,$sqlIsRMN)
        or die('Error: ' . mysqli_error());
          
        $rowIsRMN = mysqli_fetch_array($rs);
        
        if ( count($rowIsRMN) > 0 ) // Si exite, borramos la tabla
        {
            $sqlRMNDelete = "DELETE
                             FROM tabla_rmn
                             WHERE Id_Inicial = '$Id_Inicial'";
        
            mysqli_query($conexion,$sqlRMNDelete)
            or die('Error: ' . mysqli_error());
        } 
        
         
            
        $sqlIsVecinos = "SELECT *
                     FROM tabla_vecinos
                     WHERE Id_Inicial = '$Id_Inicial'";
        
        $rs = mysqli_query($conexion,$sqlIsVecinos)
        or die('Error: ' . mysqli_error());
          
        $rowIsVecinos = mysqli_fetch_array($rs);
        
        if ( count($rowIsVecinos) > 0 ) // Si exite, borramos la tabla
        {
            $sqlVecinosDelete = "DELETE
                             FROM tabla_vecinos
                             WHERE Id_Inicial = '$Id_Inicial'";
        
            mysqli_query($conexion,$sqlVecinosDelete)
            or die('Error: ' . mysqli_error());
        }    
        
        
         
        $sqlIsMetastInicial = "SELECT *
                               FROM tabla_metast_inicial
                               WHERE Id_Inicial = '$Id_Inicial'";
        
        $rs = mysqli_query($conexion,$sqlIsMetastInicial)
        or die('Error: ' . mysqli_error());
          
        $rowIsMetastInicial = mysqli_fetch_array($rs);
        
        if ( count($rowIsMetastInicial) > 0 ) // Si exite, borramos la tabla
        {
            $sqlMetastInicialDelete = "DELETE
                                       FROM tabla_metast_inicial
                                       WHERE Id_Inicial = '$Id_Inicial'";
        
            mysqli_query($conexion,$sqlMetastInicialDelete)
            or die('Error: ' . mysqli_error());
        } 
        
        
        
        
        //Borramos la tabla inicial
        $sqlInicial="DELETE FROM inicial
                     WHERE Id_Paciente = '$Id_Paciente'";
        
        mysqli_query($conexion,$sqlInicial)
        or die('Error: ' . mysqli_error());
    
    }
    
    
    
    
    /******************************************************************************
     * 
     * HOJA TRATAMIENTO
     * tratamiento: Borramos al final por si acaso, ya que necesitamos el ID de tratamiento para hacer los deletes
     * 
     * tabla_neo, tabla_no_neo y tabla_ady
     * 
     * *****************************************************************************/
    
        
    $sqlIdTratamiento="SELECT ID
                       FROM tratamiento
                       WHERE Id_Paciente = '$Id_Paciente'";
       
    $rs = mysqli_query($conexion,$sqlIdTratamiento)
    or die('Error: ' . mysqli_error());
    
    $rowIdTratamiento = mysqli_fetch_array($rs);
    
    if ( count($rowIdTratamiento) > 0 ) // Si exite, borramos la tabla
    {
        
        $Id_Tratamiento=intval($rowIdTratamiento['ID']);
        
        
        //Tratamiento neoadyuvante = Si
        $sqlIsNeo = "SELECT *
                     FROM tabla_neo
                     WHERE Id_Tratamiento = '$Id_Tratamiento'";
        
        $rs = mysqli_query($conexion,$sqlIsNeo)
        or die('Error: ' . mysqli_error());
          
        $rowIsNeo = mysqli_fetch_array($rs);
        
        if ( count($rowIsNeo) > 0 ) // Si exite, borramos la tabla
        {
            $sqlNeoDelete = "DELETE
                             FROM tabla_neo
                             WHERE Id_Tratamiento = '$Id_Tratamiento'";
        
            mysqli_query($conexion,$sqlNeoDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //Tratamiento neoadyuvante = No
        $sqlIsNeoNo = "SELECT *
                     FROM tabla_no_neo
                     WHERE Id_Tratamiento = '$Id_Tratamiento'";
        
        $rs = mysqli_query($conexion,$sqlIsNeoNo)
        or die('Error: ' . mysqli_error());
          
        $rowIsNeoNo = mysqli_fetch_array($rs);
        
        if ( count($rowIsNeoNo) > 0 ) // Si exite, borramos la tabla
        {
            $sqlNeoNoDelete = "DELETE
                               FROM tabla_no_neo
                               WHERE Id_Tratamiento = '$Id_Tratamiento'";
        
            mysqli_query($conexion,$sqlNeoNoDelete)
            or die('Error: ' . mysqli_error());
        }
         
        
        //Tratamiento adyuvante = Si
        $sqlIsAdy = "SELECT *
                     FROM tabla_ady
                     WHERE Id_Tratamiento = '$Id_Tratamiento'";
        
        $rs = mysqli_query($conexion,$sqlIsAdy)
        or die('Error: ' . mysqli_error());
          
        $rowIsAdy = mysqli_fetch_array($rs);
        
        if ( count($rowIsAdy) > 0 ) // Si exite, borramos la tabla
        {
            $sqlAdyDelete = "DELETE
                             FROM tabla_ady
                             WHERE Id_Tratamiento = '$Id_Tratamiento'";
        
            mysqli_query($conexion,$sqlAdyDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //Borramos la tabla tratamiento
        $sqlTratamiento="DELETE FROM tratamiento
                         WHERE Id_Paciente = '$Id_Paciente'";
        
        mysqli_query($conexion,$sqlTratamiento)
        or die('Error: ' . mysqli_error());
    
    }
    
    /******************************************************************************
     * 
     * HOJA CIRUGIA
     * Cirugia: Borramos al final por si acaso, ya que necesitamos el ID de cirugia para hacer los deletes
     * 
     * Cirugia: tabla_cirugia, tabla_no_cirugia, tabla_otras_tecnicas y tabla_otras_resecciones
     * Caracteristicas cirugia: tabla_caracteristicas_cirugia y tabla_estoma
     * Complicaciones:tabla_complicaciones, tabla_tipo_complicaciones, tabla_reintervencion
     *                tabla_exitus_intraop, tabla_exitus_postop, tabla_herida
     *                tabla_perine, tabla_abdominales, tabla_anastomosis_complicaciones,
     *                tabla_otras_complicaciones
     * 
     * *****************************************************************************/
    
    
    $sqlIdCirugia="SELECT ID
                   FROM cirugia
                   WHERE Id_Paciente = '$Id_Paciente'";
    
    
    $rs = mysqli_query($conexion,$sqlIdCirugia)
    or die('Error: ' . mysqli_error());
    
    $rowIdCirugia = mysqli_fetch_array($rs);
    
    if ( count($rowIdCirugia) > 0 ) // Si exite, borramos la tabla
    {
        
        $Id_Cirugia=intval($rowIdCirugia['ID']);
        
        //Tabla_Cirugia
        $sqlIsTabla_Cirugia = "SELECT *
                               FROM tabla_cirugia
                               WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsTabla_Cirugia)
        or die('Error: ' . mysqli_error());
          
        $rowIsTabla_Cirugia = mysqli_fetch_array($rs);
        
        if ( count($rowIsTabla_Cirugia) > 0 ) // Si exite, borramos la tabla
        {
            $sqlTabla_CirugiaDelete = "DELETE
                                       FROM tabla_cirugia
                                       WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlTabla_CirugiaDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //Tabla_No_Cirugia
        $sqlIsTabla_No_Cirugia = "SELECT *
                                  FROM tabla_no_cirugia
                                  WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsTabla_No_Cirugia)
        or die('Error: ' . mysqli_error());
          
        $rowIsTabla_No_Cirugia  = mysqli_fetch_array($rs);
        
        if ( count($rowIsTabla_No_Cirugia) > 0 ) // Si exite, borramos la tabla
        {
            $sqlTabla_No_CirugiaDelete = "DELETE
                                          FROM tabla_no_cirugia
                                          WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlTabla_No_CirugiaDelete)
            or die('Error: ' . mysqli_error());
        }
        
        //tabla_otras_tecnicas
        $sqlIsOtrasTecnicas = "SELECT *
                               FROM tabla_otras_tecnicas
                               WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsOtrasTecnicas)
        or die('Error: ' . mysqli_error());
          
        $rowIsOtrasTecnicas  = mysqli_fetch_array($rs);
        
        if ( count($rowIsOtrasTecnicas) > 0 ) // Si exite, borramos la tabla
        {
            $sqlOtrasTecnicasDelete = "DELETE
                                       FROM tabla_otras_tecnicas
                                       WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlOtrasTecnicasDelete)
            or die('Error: ' . mysqli_error());
        }
        
        //Tabla_Otras_Resecciones
        $sqlIsResecciones = "SELECT *
                             FROM tabla_otras_resecciones
                             WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsResecciones)
        or die('Error: ' . mysqli_error());
          
        $rowIsResecciones  = mysqli_fetch_array($rs);
        
        if ( count($rowIsResecciones) > 0 ) // Si exite, borramos la tabla
        {
            $sqlReseccionesDelete = "DELETE
                                     FROM tabla_otras_resecciones
                                     WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlReseccionesDelete)
            or die('Error: ' . mysqli_error());
        }
        
        /********************************************************************
         * 
         * CARACTERÍSTICAS CIRUGIA
         * 
         * tabla_caracteristicas_cirugia y tabla_estoma
         * 
         * ******************************************************************/  
        
        //tabla_caracteristicas_cirugia
        $sqlIsCaracteristicas = "SELECT *
                                 FROM tabla_caracteristicas_cirugia
                                 WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsCaracteristicas)
        or die('Error: ' . mysqli_error());
          
        $rowIsCaracteristicas = mysqli_fetch_array($rs);
        
        if ( count($rowIsCaracteristicas) > 0 ) // Si exite, borramos la tabla
        {
            $sqlCaracteristicasDelete = "DELETE
                                         FROM tabla_caracteristicas_cirugia
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlCaracteristicasDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //tabla_estoma
        $sqlIsEstoma = "SELECT *
                                 FROM tabla_estoma
                                 WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsEstoma)
        or die('Error: ' . mysqli_error());
          
        $rowIsEstoma = mysqli_fetch_array($rs);
        
        if ( count($rowIsEstoma) > 0 ) // Si exite, borramos la tabla
        {
            $sqlEstomaDelete = "DELETE
                                FROM tabla_estoma
                                WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlEstomaDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        /********************************************************************
         * 
         * COMPLICACIONES
         * 
         * tabla_complicaciones, tabla_tipo_complicaciones, tabla_reintervencion
         * tabla_exitus_intraop, tabla_exitus_postop, tabla_herida
         * tabla_perine, tabla_abdominales, tabla_anastomosis_complicaciones,
         * tabla_otras_complicaciones
         * 
         * ******************************************************************/  
        
        //tabla_complicaciones
        $sqlIsTablaComplicaciones = "SELECT *
                                     FROM tabla_complicaciones
                                     WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsTablaComplicaciones)
        or die('Error: ' . mysqli_error());
          
        $rowIsTablaComplicaciones = mysqli_fetch_array($rs);
        
        if ( count($rowIsTablaComplicaciones) > 0 ) // Si exite, borramos la tabla
        {
            $sqlTablaComplicacionesDelete = "DELETE
                                             FROM tabla_complicaciones
                                             WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlTablaComplicacionesDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        
        
        //tabla_tipo_complicaciones
        $sqlIsTablaTipoComplicaciones = "SELECT *
                                         FROM tabla_tipo_complicaciones
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsTablaTipoComplicaciones)
        or die('Error: ' . mysqli_error());
          
        $rowIsTablaTipoComplicaciones = mysqli_fetch_array($rs);
        
        if ( count($rowIsTablaTipoComplicaciones) > 0 ) // Si exite, borramos la tabla
        {
            $sqlTablaTipoComplicacionesDelete = "DELETE
                                             FROM tabla_tipo_complicaciones
                                             WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlTablaTipoComplicacionesDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        
        
        //tabla_reintervencion
        $sqlIsReintervencion = "SELECT *
                                 FROM tabla_reintervencion
                                 WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsReintervencion)
        or die('Error: ' . mysqli_error());
          
        $rowIsReintervencion = mysqli_fetch_array($rs);
        
        if ( count($rowIsReintervencion) > 0 ) // Si exite, borramos la tabla
        {
            $sqlReintervencionDelete = "DELETE
                                        FROM tabla_reintervencion
                                        WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlReintervencionDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        
        //tabla_exitus_intraop
        $sqlIsIntraop = "SELECT *
                         FROM tabla_exitus_intraop
                         WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsIntraop)
        or die('Error: ' . mysqli_error());
          
        $rowIsIntraop = mysqli_fetch_array($rs);
        
        if ( count($rowIsIntraop) > 0 ) // Si exite, borramos la tabla
        {
            $sqlIntraopDelete = "DELETE
                                 FROM tabla_exitus_intraop
                                 WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlIntraopDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //tabla_exitus_postop
        $sqlIsPostop = "SELECT *
                        FROM tabla_exitus_postop
                        WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsPostop)
        or die('Error: ' . mysqli_error());
          
        $rowIsPostop = mysqli_fetch_array($rs);
        
        if ( count($rowIsPostop) > 0 ) // Si exite, borramos la tabla
        {
            $sqlPostopDelete = "DELETE
                                FROM tabla_exitus_postop
                                WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlPostopDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //tabla_herida
        $sqlIsHerida = "SELECT *
                        FROM tabla_herida
                        WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsHerida)
        or die('Error: ' . mysqli_error());
          
        $rowIsHerida = mysqli_fetch_array($rs);
        
        if ( count($rowIsHerida) > 0 ) // Si exite, borramos la tabla
        {
            $sqlHeridaDelete = "DELETE
                                FROM tabla_herida
                                WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlHeridaDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //tabla_perine
        $sqlIsPerine = "SELECT *
                        FROM tabla_perine
                        WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsPerine)
        or die('Error: ' . mysqli_error());
          
        $rowIsPerine = mysqli_fetch_array($rs);
        
        if ( count($rowIsPerine) > 0 ) // Si exite, borramos la tabla
        {
            $sqlPerineDelete = "DELETE
                                FROM tabla_perine
                                WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlPerineDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //tabla_abdominales
        $sqlIsAbdominales = "SELECT *
                             FROM tabla_abdominales
                             WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsAbdominales)
        or die('Error: ' . mysqli_error());
          
        $rowIsAbdominales = mysqli_fetch_array($rs);
        
        if ( count($rowIsAbdominales) > 0 ) // Si exite, borramos la tabla
        {
            $sqlAbdominalesDelete = "DELETE
                                     FROM tabla_abdominales
                                     WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlAbdominalesDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //tabla_anastomosis_complicaciones
        $sqlIsAnastomosisC = "SELECT *
                              FROM tabla_anastomosis_complicaciones
                              WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsAnastomosisC)
        or die('Error: ' . mysqli_error());
          
        $rowIsAnastomosisC = mysqli_fetch_array($rs);
        
        if ( count($rowIsAnastomosisC) > 0 ) // Si exite, borramos la tabla
        {
            $sqlAnastomosisCDelete = "DELETE
                                      FROM tabla_anastomosis_complicaciones
                                      WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlAnastomosisCDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //tabla_otras_complicaciones
        $sqlIsOtrasC = "SELECT *
                              FROM tabla_otras_complicaciones
                              WHERE Id_Cirugia = '$Id_Cirugia'";
        
        $rs = mysqli_query($conexion,$sqlIsOtrasC)
        or die('Error: ' . mysqli_error());
          
        $rowIsOtrasC = mysqli_fetch_array($rs);
        
        if ( count($rowIsOtrasC) > 0 ) // Si exite, borramos la tabla
        {
            $sqlOtrasCDelete = "DELETE
                                      FROM tabla_otras_complicaciones
                                      WHERE Id_Cirugia = '$Id_Cirugia'";
        
            mysqli_query($conexion,$sqlOtrasCDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        
        
        //Borramos la tabla cirugia
        $sqlCirugia="DELETE FROM cirugia
                     WHERE Id_Paciente = '$Id_Paciente'";
        
        mysqli_query($conexion,$sqlCirugia)
        or die('Error: ' . mysqli_error());
        
    }    
    
    
    /******************************************************************************
     * 
     * HOJA ANATOMIA PATOLOGICA
     *  
     * tabla_patologica y anatomia_patologica
     * 
     * *****************************************************************************/
    
    //tabla_patologica eliminamos la fila a la que corresponde el estado de anatomia patológica
    $sqlTabla_PatologicaDelete = "DELETE
                                  FROM tabla_patologica
                                  WHERE Id_Paciente = '$Id_Paciente'";
    
    mysqli_query($conexion,$sqlTabla_PatologicaDelete)
    or die('Error: ' . mysqli_error());
    
    
    
     
    //anatomia_patologica
    $sqlIsPatologica = "SELECT *
                        FROM anatomia_patologica
                        WHERE Id_Paciente = '$Id_Paciente'";
    
    $rs = mysqli_query($conexion,$sqlIsPatologica)
    or die('Error: ' . mysqli_error());
      
    $rowIsPatologica  = mysqli_fetch_array($rs);
    
    if ( count($rowIsPatologica) > 0 ) // Si exite, borramos la tabla
    {
        $sqlPatologicaDelete = "DELETE
                                FROM anatomia_patologica
                                WHERE Id_Paciente = '$Id_Paciente'";
    
        mysqli_query($conexion,$sqlPatologicaDelete)
        or die('Error: ' . mysqli_error());
    }
    
    
    
    /******************************************************************************
     * 
     * HOJA SEGUIMIENTO
     * seguimiento: Borramos al final por si acaso, ya que necesitamos el ID de seguimiento para hacer los deletes
     * 
     * tabla_recidiva, tabla_metastasis, tabla_segundo_tumor, tabla_estado y tabla_imposibilidad 
     * 
     * *****************************************************************************/
    
    
    $sqlIdSeguimiento = "SELECT ID
                         FROM seguimiento
                         WHERE Id_Paciente = '$Id_Paciente'";
    
    $rs = mysqli_query($conexion,$sqlIdSeguimiento)
    or die('Error: ' . mysqli_error());
    
    $rowIdSeguimiento = mysqli_fetch_array($rs);
    
    if ( count($rowIdSeguimiento) > 0 ) // Si exite, borramos la tabla
    {
            
            
        $IdSeguimiento=intval($rowIdSeguimiento['ID']);
         
         
        //tabla_recidiva
        $sqlIsRecidiva = "SELECT *
                          FROM tabla_recidiva
                          WHERE Id_Seguimiento = '$IdSeguimiento'";
        
        $rs = mysqli_query($conexion,$sqlIsRecidiva)
        or die('Error: ' . mysqli_error());
          
        $rowIsRecidiva  = mysqli_fetch_array($rs);
        
        if ( count($rowIsRecidiva) > 0 ) // Si exite, borramos la tabla
        {
            $sqlRecidivaDelete = "DELETE
                                  FROM tabla_recidiva
                                  WHERE Id_Seguimiento = '$IdSeguimiento'";
        
            mysqli_query($conexion,$sqlRecidivaDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        
        //tabla_metastasis
        $sqlIsMetastasis = "SELECT *
                            FROM tabla_metastasis
                            WHERE Id_Seguimiento = '$IdSeguimiento'";
        
        $rs = mysqli_query($conexion,$sqlIsMetastasis)
        or die('Error: ' . mysqli_error());
          
        $rowIsMetastasis  = mysqli_fetch_array($rs);
        
        if ( count($rowIsMetastasis) > 0 ) // Si exite, borramos la tabla
        {
            $sqlMetastasisDelete = "DELETE
                                  FROM tabla_metastasis
                                  WHERE Id_Seguimiento = '$IdSeguimiento'";
        
            mysqli_query($conexion,$sqlMetastasisDelete)
            or die('Error: ' . mysqli_error());
        }
        
        //tabla_segundo_tumor
        $sqlIsSegundo_Tumor = "SELECT *
                               FROM tabla_segundo_tumor
                               WHERE Id_Seguimiento = '$IdSeguimiento'";
        
        $rs = mysqli_query($conexion,$sqlIsSegundo_Tumor)
        or die('Error: ' . mysqli_error());
          
        $rowIsSegundo_Tumor  = mysqli_fetch_array($rs);
        
        if ( count($rowIsSegundo_Tumor) > 0 ) // Si exite, borramos la tabla
        {
            $sqlSegundo_TumorDelete = "DELETE
                                       FROM tabla_segundo_tumor
                                       WHERE Id_Seguimiento = '$IdSeguimiento'";
        
            mysqli_query($conexion,$sqlSegundo_TumorDelete)
            or die('Error: ' . mysqli_error());
        }
        
        //tabla_estado
        $sqlIsEstado = "SELECT *
                        FROM tabla_estado
                        WHERE Id_Seguimiento = '$IdSeguimiento'";
        
        $rs = mysqli_query($conexion,$sqlIsEstado)
        or die('Error: ' . mysqli_error());
          
        $rowIsEstado = mysqli_fetch_array($rs);
        
        if ( count($rowIsEstado) > 0 ) // Si exite, borramos la tabla
        {
            $sqlEstadoDelete = "DELETE
                                FROM tabla_estado
                                WHERE Id_Seguimiento = '$IdSeguimiento'";
        
            mysqli_query($conexion,$sqlEstadoDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //tabla_imposibilidad
        $sqlIsImposibilidad = "SELECT *
                               FROM tabla_imposibilidad
                               WHERE Id_Seguimiento = '$IdSeguimiento'";
        
        $rs = mysqli_query($conexion,$sqlIsImposibilidad)
        or die('Error: ' . mysqli_error());
          
        $rowIsImposibilidad = mysqli_fetch_array($rs);
        
        if ( count($rowIsImposibilidad) > 0 ) // Si exite, borramos la tabla
        {
            $sqlImposibilidadDelete = "DELETE
                                       FROM tabla_imposibilidad
                                       WHERE Id_Seguimiento = '$IdSeguimiento'";
        
            mysqli_query($conexion,$sqlImposibilidadDelete)
            or die('Error: ' . mysqli_error());
        }
        
        
        //Borramos la tabla seguimiento
        $sqlSeguimiento="DELETE FROM seguimiento
                     WHERE Id_Paciente = '$Id_Paciente'";
        
        mysqli_query($conexion,$sqlSeguimiento)
        or die('Error: ' . mysqli_error());
        
    
    
    }
    
    $sqlIsPaciente = "DELETE FROM identificador_paciente
                      WHERE NHC = AES_ENCRYPT('$NHC','$claveNHC') 
                      AND Id_Hospital = '$idHospital'"; 
    
    mysqli_query($conexion,$sqlIsPaciente)
        or die('Error: ' . mysqli_error());   
}


	mysqli_close($conexion);
	
  header("Location: paciente_eliminado.php?idHospi=" . $idHospital . "&Hospital=" . $Hospital . "&NHC=" . $NHC);
    
?>