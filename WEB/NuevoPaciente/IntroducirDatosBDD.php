<?php
    session_start();
    require_once ("../BDD/conexion.php");
    
   
/********************************************************************************************
 * 
 * A partir de aquí se realiza toda la conexion para introducir 
 * los datos recogidos en las hojas anteriores en la base 
 * de datos. 
 * 
 * Se realiza aquí para asegurarnos de que llega hasta el final.
 * Si no llega hasta aquí, no se introducirá nada en la base
 * 
 * Se divide en INICIAL-TRATAMIENTO-CIRUGIA-ANATOMIA PATOLOGICA-SEGUIMIENTO
 * 
 * 
 * *****************************************************************************************/    
       
/*************************************************************************
 * 
 * INICIAL
 * 
 * En primer lugar se recogen todas las variables de la hoja
 * de inicial pasadas por sesión, y después se realizan las funciones 
 * de introducción en la BDD
 * 
 * **********************************************************************/  
 $ExistePaciente=0;
 
 echo(session_name());
 echo"<br>";


 //RECOGIDA DE DATOS PASADOS POR SESIÓN  
        
        $NHC=strval($_SESSION["NHC"]);
		
		
		echo "NHC sesion: ".$_SESSION["NHC"];
		echo"</br>";
		echo "NHC: ".$NHC;
		echo"</br>";
		echo "Hospital sesion: ".$_SESSION["NombreHospital"];
		echo"</br>";
		
		
		
        $Fecha_Nacimiento=$_SESSION["Fecha_Nacimiento"];
        $Sexo=$_SESSION["Sexo"];
        $Localizacion=$_SESSION["Localizacion"];
        $Clasificacion_Rullier=$_SESSION["Clasificacion_Rullier"];
        
        $Sincro=$_SESSION["Sincro"];
        $SincroColonDerecho=$_SESSION["SincroColonDerecho"];
        $SincroColonIzquierdo=$_SESSION["SincroColonIzquierdo"];
        $SincroColonTransverso=$_SESSION["SincroColonTransverso"];
        $SincroColonSigma=$_SESSION["SincroColonSigma"];
        
        $ECO=$_SESSION["ECO"];
        $ECO_T=$_SESSION["ECO_T"];
        $ECO_N=$_SESSION["ECO_N"];
        
        $TAC=$_SESSION["TAC"];
        
        $RMN=$_SESSION["RMN"];
        $RMN_T=$_SESSION["RMN_T"];
        $RMN_N=$_SESSION["RMN_N"];
        $Dist_Tumor=$_SESSION["Dist_Tumor"];
        $Dist_Adeno=$_SESSION["Dist_Adeno"];
        
        $Estadio_Radio=$_SESSION["Estadio_Radio"];
        
        $Integ_Esfinter=$_SESSION["Integ_Esfinter"];
        
        $Metast_Inicial=$_SESSION["MetastInicial"];
        $Metast_Hepaticas=$_SESSION["Metast_Hepaticas"];
        $Metast_Oseas=$_SESSION["Metast_Oseas"];
        $Metast_Pulmonares=$_SESSION["Metast_Pulmonares"];
        $Metast_Nervioso=$_SESSION["Metast_Nervioso"];
        
        $Inv_Vecinos=$_SESSION["Inv_Vecinos"];
        $Inv_Utero=$_SESSION["Inv_Utero"];
        $Inv_Prostata=$_SESSION["Inv_Prostata"];
        $Inv_Vejiga=$_SESSION["Inv_Vejiga"];
        $Inv_Ureter=$_SESSION["Inv_Ureter"];
        $Inv_Vagina=$_SESSION["Inv_Vagina"];
        $Inv_Seminal=$_SESSION["Inv_Seminal"];
        $Inv_Sacro=$_SESSION["Inv_Sacro"];
        
/***********************************************************************************
 * 
 * TRATAMIENTO
 * 
 * Se introducen los datos de la hoja de tratamiento.
 * 
 * En primer lugar se recogen las variables de tratamiento pasadas por sesión.
 * 
 * Después se introducen los datos pasados por la base de datos
 * 
 * 
 * Esta hoja tiene la particularidad de que el tratamiento adyuvante, puede ser introducido
 * más adelante
 * 
 * *********************************************************************************/

//INTRODUCCION DE LOS DATOS DE TRATAMIENTO

    $TTO_Neoadyuvante=$_SESSION["B_Tto_Neo"];
    $Tipo_TTO_Neoadyuvante=$_SESSION["Tipo_TTO_Neoadyuvante"];
    $Motivo_No_Neoadyuvante=$_SESSION["tipo_no_neo"];
    
  if ($_SESSION["B_Cirugia"]==2){
    	$TTO_Adyuvante=2;
    	$Tipo_TTO_Adyuvante=null;
    }else{
    
    $TTO_Adyuvante=$_SESSION["TTO_Adyuvante"];

    $Tipo_TTO_Adyuvante=$_SESSION["Tipo_TTO_Adyuvante"];
    }
         
            
/***********************************************************************************
 * 
 * CIRUGIA
 * 
 * Se introducen los datos de la hoja de cirugia.
 * 
 * En primer lugar se recogen las variables de cirugia pasadas por sesión.
 * 
 * Después se introducen los datos pasados por la base de datos
 * 
 * *********************************************************************************/

//INTRODUCCION DE DATOS DE LA HOJA DE CIRUGIA
        
        $B_Cirugia=$_SESSION["B_Cirugia"];
        
        $Motivo_No_Cirugia=$_SESSION["Motivo_No_Cirugia"];
        
        $Tipo_Cirugia=$_SESSION["Tipo_Cirugia"];
        $Fecha_Intervencion=$_SESSION["Fecha_Cirugia"];
        $Fecha_Alta=$_SESSION["Fecha_Alta"];
        $Cirujano_Principal=$_SESSION["Cirujano_Principal"];
        $Cirujano_Ayudante=$_SESSION["Cirujano_Ayudante"];
        $Tecnica_Cirugia=$_SESSION["Tecnicas_Cirugia"];
        $Anastomosis_coloanal=$_SESSION["Anastomosis_coloanal"];
        
        if ($_SESSION["Otra_Tecnica_Cirugia"]!=null){
        $Otra_Tecnica_Cirugia[] = null;
        for ($i=0; $i < count($_SESSION["Otra_Tecnica_Cirugia"]); $i++) { 
            $Otra_Tecnica_Cirugia[$i] = $_SESSION["Otra_Tecnica_Cirugia"][$i];
        }
		}else{
			$Otras_Cirugia=0;
		}

		$Orientacion=$_SESSION["Orientacion"];
        
        $Exeresis_Meso=$_SESSION["Exeresis_Meso"];
        
        $Otras_Resecc_Viscerales=$_SESSION["Otras_Resecc_Viscerales"];
        $Res_Seminales=$_SESSION["Res_Seminales"];
        $Res_Peritoneo=$_SESSION["Res_Peritoneo"];
        $Res_Vejiga=$_SESSION["Res_Vejiga"];
        $Res_Utero=$_SESSION["Res_Utero"];
        $Res_Vagina=$_SESSION["Res_Vagina"];
        $Res_Prostata=$_SESSION["Res_Prostata"];
		$Res_Hepatica=$_SESSION["Res_Hepatica"];
        $Res_IDelgado=$_SESSION["Res_IDelgado"];
        $Res_Coccix=$_SESSION["Res_Coccix"];
        $Res_Sacro=$_SESSION["Res_Sacro"];
        $Res_Ureter=$_SESSION["Res_Ureter"];
        $Res_Ovarios=$_SESSION["Res_Ovarios"]; 
        $Res_Trompas=$_SESSION["Res_Trompas"];
        
        
        
        $ASA=$_SESSION["ASA"];
        $Hallazgos_Intraoperatorios=$_SESSION["Hallazgos_Intraoperatorios"];
        $Perforacion_Tumoral=$_SESSION["Perforacion_Tumoral"];
        $Met_Hepaticas=$_SESSION["Tipo_Metast_Hepaticas"];
        $Imp_Ovaricos=$_SESSION["Imp_Ovaricos"];
        $Obstruccion=$_SESSION["Obstruccion"];
        
        
        $Via_Operacion=$_SESSION["Via_Operacion"];
        $Tiempo_Operacion=$_SESSION["Tiempo_Operacion"];
        $Transfusiones=$_SESSION["Transfusiones"];
        $Intencion_Operatoria=$_SESSION["Intencion_Operatoria"];
        $Anastomosis=$_SESSION["Anastomosis"];
        $Reservorio=$_SESSION["Reservorio"];
        $Estoma_Derivacion=$_SESSION["Estoma_Derivacion"];
        $Tipo_Estoma=$_SESSION["Tipo_Estoma"];
        
        
        
        $Complicaciones=$_SESSION["Complicaciones"];
        $Reintervencion=$_SESSION["Reintervencion"];
        $Tipo_Reintervencion=$_SESSION["Tipo_Reintervencion"];
        $Exitus_Intra=$_SESSION["Exitus_Intra"];
        $Causa_Exitus_Intra=$_SESSION["Causa_Exitus_Intra"];
        $Exitus_Post=$_SESSION["Exitus_Post"];
        $Causa_Exitus_Post=$_SESSION["Causa_Exitus_Post"];
        
		$Generales_Sepsis=$_SESSION["Generales_Sepsis"];
		$Generales_Shock=$_SESSION["Generales_Shock"];
		
        $Herida_Hemorragia=$_SESSION["Herida_Hemorragia"];
        $Herida_Infeccion=$_SESSION["Herida_Infeccion"];
        $Herida_Evisceracion=$_SESSION["Herida_Evisceracion"];
		$Herida_Eventracion=$_SESSION["Herida_Eventracion"];
		
        $Perine_Infeccion=$_SESSION["Perine_Infeccion"];    
        $Perine_Retraso_Cicatrizacion=$_SESSION["Perine_Retraso_Cicatrizacion"];
		$Perine_Hernia=$_SESSION["Perine_Hernia"];
		
        $Abdominales_Hemoperitoneo=$_SESSION["Abdominales_Hemoperitoneo"];
        $Abdominales_Peri_Difusas=$_SESSION["Abdominales_Peri_Difusas"];
        $Abdominales_Abceso_Abdominal=$_SESSION["Abdominales_Abceso_Abdominal"];
		$Abdominales_Abceso_Pelvico=$_SESSION["Abdominales_Abceso_Pelvico"];
		$Abdominales_Hemo_Pelvica=$_SESSION["Abdominales_Hemo_Pelvica"];
        $Abdominales_Isquemia_Intestinal=$_SESSION["Abdominales_Isquemia_Intestinal"];
        $Abdominales_Colecistitis=$_SESSION["Abdominales_Colecistitis"];
        $Abdominales_Iatrog_Vias_Urinarias=$_SESSION["Abdominales_Iatrog_Vias_Urinarias"];
		$Abdominales_Iatrog_Vias_Huecas=$_SESSION["Abdominales_Iatrog_Vias_Huecas"];
        $Abdominales_Ileo_Paralitico_Prolongado=$_SESSION["Abdominales_Ileo_Paralitico_Prolongado"];
        $Abdominales_Ileo_Mecanico=$_SESSION["Abdominales_Ileo_Mecanico"];
		$Abdominales_Estoma=$_SESSION["Abdominales_Estoma"];
        
        $Anastomosis_Hemorragia=$_SESSION["Anastomosis_Hemorragia"];
        $Anastomosis_Fuga=$_SESSION["Anastomosis_Fuga"];
		$Anastomosis_Fistula=$_SESSION["Anastomosis_Fistula"];
		
        $Otras_Hemo_Diges=$_SESSION["Otras_Hemo_Diges"];
        $Otras_Infeccion_Urinaria=$_SESSION["Otras_Infeccion_Urinaria"];
        $Otras_Urologicas=$_SESSION["Comp_Otras_Urologicas"];
        $Otras_Respiratoria=$_SESSION["Otras_Respiratoria"];
		$Otras_Respiratoria_Infecc=$_SESSION["Otras_Respiratoria_Infecc"];
        $Otras_Hepatica=$_SESSION["Otras_Hepatica"];
        $Otras_Vascular_Mec=$_SESSION["Otras_Vascular_Mec"];
        $Otras_Vascular_Infecc=$_SESSION["Otras_Vascular_Infecc"];
        $Otras_FMO=$_SESSION["Otras_FMO"];
        $Otras_TEP=$_SESSION["Otras_TEP"];
        $Otras_Neuroapraxia=$_SESSION["Otras_Neuroapraxia"];
		$Otras_Renal=$_SESSION["Otras_Renal"];
        $Otras_Cardiovascular=$_SESSION["Otras_Cardiovascular"];
 		
 

/***********************************************************************************
 * 
 * ANATOMIA PATOLOGICA
 * 
 * Se introducen los datos de la hoja de patologica.
 * 
 * En primer lugar se recogen las variables de patologica pasadas por sesión.
 * 
 * Después se introducen los datos pasados por la base de datos
 * 
 * *********************************************************************************/

//VARIABLES DE SESION DE LA HOJA DE PATOLOGICA

    $Tipo_Histologico=$_SESSION["Tipo_Histologico"];
    $Otros_Histologico=$_SESSION["Otros_Histologico"];
    $T_Patologico=$_SESSION["T_Patologico"];
    $N_Patologico=$_SESSION["N_Patologico"];
    $M_Patologico=$_SESSION["M_Patologico"];
    $Ganglios_Aislados=$_SESSION["Ganglios_Aislados"];
    $Ganglios_Afectados=$_SESSION["Ganglios_Afectados"];
    $Estadio_Patologico=$_SESSION["Estadio_Patologico"];
    $Margen_Distal=$_SESSION["Margen_Distal"];
    $Margen_Circunferencial=$_SESSION["Margen_Circunferencial"];
    $Tipo_Reseccion=$_SESSION["Tipo_Res"];
    $Tipo_Regresion=$_SESSION["Tipo_Regresion"];
    $Estadio_Tumor_Sincronico=$_SESSION["Estadio_Tumor_Sincronico"];
    $Calidad_Mesorrecto=$_SESSION["Calidad_Mesorrecto"];
    $RellenarPatologica=$_SESSION["Patologica_Pendiente"];
    $NoPatologica=$_SESSION["No_Patologica"];   
    
    
//PASO POR SESION DE LOS DATOS DE LA PÁGINA DE SEGUIMIENTO

    $Fecha_Revision=$_SESSION["Fecha_Revision"];
    
    $Recidiva=$_SESSION["Recidiva"];
    $Fecha_Recidiva=$_SESSION["Fecha_Recidiva"];
    $Localizacion_Recidiva=$_SESSION["Localizacion_Recidiva"];
    $Intervencion_Recidiva=$_SESSION["Intervencion_Recidiva"];
    
    $Metastasis=$_SESSION["Metastasis"];
    $Fecha_Metastasis=$_SESSION["Fecha_Metastasis"];
    $Localizacion_Metastasis=$_SESSION["Localizacion_Metastasis"];
    $Intervencion_Metastasis=$_SESSION["Intervencion_Metastasis"];
    
    $Segundo_Tumor=$_SESSION["Segundo_Tumor"];
    $Fecha_Segundo_Tumor=$_SESSION["Fecha_Segundo_Tumor"];
    $Localizacion_Segundo_Tumor=$_SESSION["Localizacion_Segundo_Tumor"];
    $Intervencion_Segundo_Tumor=$_SESSION["Intervencion_Segundo_Tumor"];
    
    $Estado=$_SESSION["Estado"];
    
    $Fecha_Muerte=$_SESSION["Fecha_Muerte"];    
    $Causa_Muerte=$_SESSION["Causa_Muerte"];

    $Imposibilidad=$_SESSION["Imposibilidad"];
    $Causa_Imposibilidad=$_SESSION["Causa_Imposibilidad"]; 
    $Comentarios_Adicionales=$_SESSION["Comentarios_Adicionales"];  
     
     echo "Introduccion de valores correcta";                         
//FUNCIONES DE INTRODUCCIÓN DE LOS DATOS            

//Selección del ID del Hospital para identificar correctamente al paciente

$sqlIdHospital="SELECT Codigo FROM tabla_hospital WHERE Nombre='".$_SESSION["NombreHospital"]."'";


$result=mysqli_query($conexion,$sqlIdHospital);

    $row=mysqli_fetch_array($result);
    
//La variable $idHospital, guarda el ID del hospital que está introduciendo el paciente

        $idHospital=$row[0];
        $idHospital=intval($idHospital); //Se pasa el ID a entero, ya que en la base se define como entero

       
//Función que recoge la fecha del día actual 
//(La usamos más adelante para llevar registro de cuando se han introducido los pacientes)
$hoy = date("y.m.d"); 


//Miramos si el paciente está en la base de datos

$sqlIsPaciente = "SELECT *
                  FROM identificador_paciente
                  WHERE NHC = AES_ENCRYPT('$NHC','$claveNHC')
                  AND Id_Hospital = '$idHospital'";
                  
                  

                  
$rs = mysqli_query($conexion,$sqlIsPaciente)
  or die(header("Location: EliminaPaciente/elimina_paciente.php"));
  
$rowIsPaciente=mysqli_fetch_array($rs);

if ( count($rowIsPaciente) > 0 ) // Si el paciente está en la base de datos, nos quedamos con el ID
{
    $Id_Paciente=$rowIsPaciente['ID'];
    $ExistePaciente=1;

    //Se pasa el Id_Paciente por SESSION
    //
    $_SESSION["Id_Paciente"]=$Id_Paciente;
    
    echo "Paciente existe: " . $Id_Paciente . "<br>";
    
/******************************************************************************
 * 
 * HOJA INICIAL
 * identificador_paciente: Se hace update, ya que necesitamos el ID del paciente
 * inicial: Borramos al final por si acaso, ya que necesitamos el ID de inicial para hacer los deletes
 *
 * tabla_sincro, tabla_eco, tabla_rmn, tabla_vecinos y tabla_metast_inicial
 * 
 * *****************************************************************************/


//Se actualizan los datos generales en la tabla identificador_paciente
$sqlPaciente="UPDATE identificador_paciente 
              SET NHC = AES_ENCRYPT('$NHC','$claveNHC'), Id_Sexo = '$Sexo', Fecha_Nacimiento = '$Fecha_Nacimiento'
              WHERE ID = '$Id_Paciente'";
        
		$_SESSION["Error"]="Error en identificador paciente";
    mysqli_query($conexion,$sqlPaciente)
    or die(
    header("Location: EliminaPaciente/elimina_paciente.php"));
 
$sqlIdInicial="SELECT ID
               FROM inicial
               WHERE Id_Paciente = '$Id_Paciente'";


$rs = mysqli_query($conexion,$sqlIdInicial)
or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$rowInicial = mysqli_fetch_array($rs);

if ( count($rowInicial) > 0 ) // Si exite, borramos la tabla
{
    $Id_Inicial=intval($rowInicial['ID']);
    
    $sqlIsSincro = "SELECT *
                FROM tabla_sincro
                WHERE Id_Inicial = '$Id_Inicial'";

    $rs = mysqli_query($conexion,$sqlIsSincro)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsSincro = mysqli_fetch_array($rs);
    
    if ( count($rowIsSincro) > 0 ) // Si exite, borramos la tabla
    {
        $sqlSincroDelete = "DELETE
                            FROM tabla_sincro
                            WHERE Id_Inicial = '$Id_Inicial'";
    
        mysqli_query($conexion,$sqlSincroDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    } 
     
     
       
    $sqlIsECO = "SELECT *
                 FROM tabla_eco
                 WHERE Id_Inicial = '$Id_Inicial'";
    
    $rs = mysqli_query($conexion,$sqlIsECO)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsECO = mysqli_fetch_array($rs);
    
    if ( count($rowIsECO) > 0 ) // Si exite, borramos la tabla
    {
        $sqlECODelete = "DELETE
                         FROM tabla_eco
                         WHERE Id_Inicial = '$Id_Inicial'";
    
        mysqli_query($conexion,$sqlECODelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    } 
       
     
        
    $sqlIsRMN = "SELECT *
                 FROM tabla_rmn
                 WHERE Id_Inicial = '$Id_Inicial'";
    
    $rs = mysqli_query($conexion,$sqlIsRMN)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsRMN = mysqli_fetch_array($rs);
    
    if ( count($rowIsRMN) > 0 ) // Si exite, borramos la tabla
    {
        $sqlRMNDelete = "DELETE
                         FROM tabla_rmn
                         WHERE Id_Inicial = '$Id_Inicial'";
    
        mysqli_query($conexion,$sqlRMNDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    } 
    
     
        
    $sqlIsVecinos = "SELECT *
                 FROM tabla_vecinos
                 WHERE Id_Inicial = '$Id_Inicial'";
    
    $rs = mysqli_query($conexion,$sqlIsVecinos)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsVecinos = mysqli_fetch_array($rs);
    
    if ( count($rowIsVecinos) > 0 ) // Si exite, borramos la tabla
    {
        $sqlVecinosDelete = "DELETE
                         FROM tabla_vecinos
                         WHERE Id_Inicial = '$Id_Inicial'";
    
        mysqli_query($conexion,$sqlVecinosDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }    
    
    
     
    $sqlIsMetastInicial = "SELECT *
                           FROM tabla_metast_inicial
                           WHERE Id_Inicial = '$Id_Inicial'";
    
    $rs = mysqli_query($conexion,$sqlIsMetastInicial)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsMetastInicial = mysqli_fetch_array($rs);
    
    if ( count($rowIsMetastInicial) > 0 ) // Si exite, borramos la tabla
    {
        $sqlMetastInicialDelete = "DELETE
                                   FROM tabla_metast_inicial
                                   WHERE Id_Inicial = '$Id_Inicial'";
    
        mysqli_query($conexion,$sqlMetastInicialDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    } 
    
    
    
    
    //Borramos la tabla inicial
    $sqlInicial="DELETE FROM inicial
                 WHERE Id_Paciente = '$Id_Paciente'";
    
    mysqli_query($conexion,$sqlInicial)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

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
or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$rowIdTratamiento = mysqli_fetch_array($rs);

if ( count($rowIdTratamiento) > 0 ) // Si exite, borramos la tabla
{
    
    $Id_Tratamiento=intval($rowIdTratamiento['ID']);
    
    
    //Tratamiento neoadyuvante = Si
    $sqlIsNeo = "SELECT *
                 FROM tabla_neo
                 WHERE Id_Tratamiento = '$Id_Tratamiento'";
    
    $rs = mysqli_query($conexion,$sqlIsNeo)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsNeo = mysqli_fetch_array($rs);
    
    if ( count($rowIsNeo) > 0 ) // Si exite, borramos la tabla
    {
        $sqlNeoDelete = "DELETE
                         FROM tabla_neo
                         WHERE Id_Tratamiento = '$Id_Tratamiento'";
    
        mysqli_query($conexion,$sqlNeoDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //Tratamiento neoadyuvante = No
    $sqlIsNeoNo = "SELECT *
                 FROM tabla_no_neo
                 WHERE Id_Tratamiento = '$Id_Tratamiento'";
    
    $rs = mysqli_query($conexion,$sqlIsNeoNo)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsNeoNo = mysqli_fetch_array($rs);
    
    if ( count($rowIsNeoNo) > 0 ) // Si exite, borramos la tabla
    {
        $sqlNeoNoDelete = "DELETE
                           FROM tabla_no_neo
                           WHERE Id_Tratamiento = '$Id_Tratamiento'";
    
        mysqli_query($conexion,$sqlNeoNoDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
     
    
    //Tratamiento adyuvante = Si
    $sqlIsAdy = "SELECT *
                 FROM tabla_ady
                 WHERE Id_Tratamiento = '$Id_Tratamiento'";
    
    $rs = mysqli_query($conexion,$sqlIsAdy)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsAdy = mysqli_fetch_array($rs);
    
    if ( count($rowIsAdy) > 0 ) // Si exite, borramos la tabla
    {
        $sqlAdyDelete = "DELETE
                         FROM tabla_ady
                         WHERE Id_Tratamiento = '$Id_Tratamiento'";
    
        mysqli_query($conexion,$sqlAdyDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //Borramos la tabla tratamiento
    $sqlTratamiento="DELETE FROM tratamiento
                     WHERE Id_Paciente = '$Id_Paciente'";
    
    mysqli_query($conexion,$sqlTratamiento)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

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
or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$rowIdCirugia = mysqli_fetch_array($rs);

if ( count($rowIdCirugia) > 0 ) // Si exite, borramos la tabla
{
    
    $Id_Cirugia=intval($rowIdCirugia['ID']);
    
    //Tabla_Cirugia
    $sqlIsTabla_Cirugia = "SELECT *
                           FROM tabla_cirugia
                           WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsTabla_Cirugia)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsTabla_Cirugia = mysqli_fetch_array($rs);
    
    if ( count($rowIsTabla_Cirugia) > 0 ) // Si exite, borramos la tabla
    {
        $sqlTabla_CirugiaDelete = "DELETE
                                   FROM tabla_cirugia
                                   WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlTabla_CirugiaDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //Tabla_No_Cirugia
    $sqlIsTabla_No_Cirugia = "SELECT *
                              FROM tabla_no_cirugia
                              WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsTabla_No_Cirugia)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsTabla_No_Cirugia  = mysqli_fetch_array($rs);
    
    if ( count($rowIsTabla_No_Cirugia) > 0 ) // Si exite, borramos la tabla
    {
        $sqlTabla_No_CirugiaDelete = "DELETE
                                      FROM tabla_no_cirugia
                                      WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlTabla_No_CirugiaDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    //tabla_otras_tecnicas
    $sqlIsOtrasTecnicas = "SELECT *
                           FROM tabla_otras_tecnicas
                           WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsOtrasTecnicas)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsOtrasTecnicas  = mysqli_fetch_array($rs);
    
    if ( count($rowIsOtrasTecnicas) > 0 ) // Si exite, borramos la tabla
    {
        $sqlOtrasTecnicasDelete = "DELETE
                                   FROM tabla_otras_tecnicas
                                   WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlOtrasTecnicasDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //Tabla_Otras_Resecciones
    $sqlIsResecciones = "SELECT *
                         FROM tabla_otras_resecciones
                         WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsResecciones)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsResecciones  = mysqli_fetch_array($rs);
    
    if ( count($rowIsResecciones) > 0 ) // Si exite, borramos la tabla
    {
        $sqlReseccionesDelete = "DELETE
                                 FROM tabla_otras_resecciones
                                 WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlReseccionesDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
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
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsCaracteristicas = mysqli_fetch_array($rs);
    
    if ( count($rowIsCaracteristicas) > 0 ) // Si exite, borramos la tabla
    {
        $sqlCaracteristicasDelete = "DELETE
                                     FROM tabla_caracteristicas_cirugia
                                     WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlCaracteristicasDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //tabla_estoma
    $sqlIsEstoma = "SELECT *
                             FROM tabla_estoma
                             WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsEstoma)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsEstoma = mysqli_fetch_array($rs);
    
    if ( count($rowIsEstoma) > 0 ) // Si exite, borramos la tabla
    {
        $sqlEstomaDelete = "DELETE
                            FROM tabla_estoma
                            WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlEstomaDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
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
    echo "Entra en complicaciones";
	echo "<br>";
    //tabla_complicaciones
    $sqlIsTablaComplicaciones = "SELECT *
                                 FROM tabla_complicaciones
                                 WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsTablaComplicaciones)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsTablaComplicaciones = mysqli_fetch_array($rs);
    
    if ( count($rowIsTablaComplicaciones) > 0 ) // Si exite, borramos la tabla
    {
        $sqlTablaComplicacionesDelete = "DELETE
                                         FROM tabla_complicaciones
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlTablaComplicacionesDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    
    
    //tabla_tipo_complicaciones
    $sqlIsTablaTipoComplicaciones = "SELECT *
                                     FROM tabla_tipo_complicaciones
                                     WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsTablaTipoComplicaciones)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsTablaTipoComplicaciones = mysqli_fetch_array($rs);
    
    if ( count($rowIsTablaTipoComplicaciones) > 0 ) // Si exite, borramos la tabla
    {
        $sqlTablaTipoComplicacionesDelete = "DELETE
                                         FROM tabla_tipo_complicaciones
                                         WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlTablaTipoComplicacionesDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    
    
    //tabla_reintervencion
    $sqlIsReintervencion = "SELECT *
                             FROM tabla_reintervencion
                             WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsReintervencion)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsReintervencion = mysqli_fetch_array($rs);
    
    if ( count($rowIsReintervencion) > 0 ) // Si exite, borramos la tabla
    {
        $sqlReintervencionDelete = "DELETE
                                    FROM tabla_reintervencion
                                    WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlReintervencionDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    
    //tabla_exitus_intraop
    $sqlIsIntraop = "SELECT *
                     FROM tabla_exitus_intraop
                     WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsIntraop)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsIntraop = mysqli_fetch_array($rs);
    
    if ( count($rowIsIntraop) > 0 ) // Si exite, borramos la tabla
    {
        $sqlIntraopDelete = "DELETE
                             FROM tabla_exitus_intraop
                             WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlIntraopDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //tabla_exitus_postop
    $sqlIsPostop = "SELECT *
                    FROM tabla_exitus_postop
                    WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsPostop)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsPostop = mysqli_fetch_array($rs);
    
    if ( count($rowIsPostop) > 0 ) // Si exite, borramos la tabla
    {
        $sqlPostopDelete = "DELETE
                            FROM tabla_exitus_postop
                            WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlPostopDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //tabla_herida
    $sqlIsHerida = "SELECT *
                    FROM tabla_herida
                    WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsHerida)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsHerida = mysqli_fetch_array($rs);
    
    if ( count($rowIsHerida) > 0 ) // Si exite, borramos la tabla
    {
        $sqlHeridaDelete = "DELETE
                            FROM tabla_herida
                            WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlHeridaDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //tabla_perine
    $sqlIsPerine = "SELECT *
                    FROM tabla_perine
                    WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsPerine)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsPerine = mysqli_fetch_array($rs);
    
    if ( count($rowIsPerine) > 0 ) // Si exite, borramos la tabla
    {
        $sqlPerineDelete = "DELETE
                            FROM tabla_perine
                            WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlPerineDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //tabla_abdominales
    $sqlIsAbdominales = "SELECT *
                         FROM tabla_abdominales
                         WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsAbdominales)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsAbdominales = mysqli_fetch_array($rs);
    
    if ( count($rowIsAbdominales) > 0 ) // Si exite, borramos la tabla
    {
        $sqlAbdominalesDelete = "DELETE
                                 FROM tabla_abdominales
                                 WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlAbdominalesDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //tabla_anastomosis_complicaciones
    $sqlIsAnastomosisC = "SELECT *
                          FROM tabla_anastomosis_complicaciones
                          WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsAnastomosisC)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsAnastomosisC = mysqli_fetch_array($rs);
    
    if ( count($rowIsAnastomosisC) > 0 ) // Si exite, borramos la tabla
    {
        $sqlAnastomosisCDelete = "DELETE
                                  FROM tabla_anastomosis_complicaciones
                                  WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlAnastomosisCDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //tabla_otras_complicaciones
    $sqlIsOtrasC = "SELECT *
                          FROM tabla_otras_complicaciones
                          WHERE Id_Cirugia = '$Id_Cirugia'";
    
    $rs = mysqli_query($conexion,$sqlIsOtrasC)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsOtrasC = mysqli_fetch_array($rs);
    
    if ( count($rowIsOtrasC) > 0 ) // Si exite, borramos la tabla
    {
        $sqlOtrasCDelete = "DELETE
                                  FROM tabla_otras_complicaciones
                                  WHERE Id_Cirugia = '$Id_Cirugia'";
    
        mysqli_query($conexion,$sqlOtrasCDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //Borramos la tabla cirugia
    $sqlCirugia="DELETE FROM cirugia
                 WHERE Id_Paciente = '$Id_Paciente'";
    
    mysqli_query($conexion,$sqlCirugia)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
}    


/******************************************************************************
 * 
 * HOJA ANATOMIA PATOLOGICA
 *  
 * tabla_patologica y anatomia_patologica
 * 
 * *****************************************************************************/
	echo "Entra en anatomia patologica";
	echo "<br>";
//tabla_patologica eliminamos la fila a la que corresponde el estado de anatomia patológica
$sqlTabla_PatologicaDelete = "DELETE
                              FROM tabla_patologica
                              WHERE Id_Paciente = '$Id_Paciente'";

mysqli_query($conexion,$sqlTabla_PatologicaDelete)
or die(header("Location: EliminaPaciente/elimina_paciente.php"));



 
//anatomia_patologica
$sqlIsPatologica = "SELECT *
                    FROM anatomia_patologica
                    WHERE Id_Paciente = '$Id_Paciente'";

$rs = mysqli_query($conexion,$sqlIsPatologica)
or die(header("Location: EliminaPaciente/elimina_paciente.php"));
  
$rowIsPatologica  = mysqli_fetch_array($rs);

if ( count($rowIsPatologica) > 0 ) // Si exite, borramos la tabla
{
    $sqlPatologicaDelete = "DELETE
                            FROM anatomia_patologica
                            WHERE Id_Paciente = '$Id_Paciente'";

    mysqli_query($conexion,$sqlPatologicaDelete)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
}



/******************************************************************************
 * 
 * HOJA SEGUIMIENTO
 * seguimiento: Borramos al final por si acaso, ya que necesitamos el ID de seguimiento para hacer los deletes
 * 
 * tabla_recidiva, tabla_metastasis, tabla_segundo_tumor, tabla_estado y tabla_imposibilidad 
 * 
 * *****************************************************************************/
echo "Llega a seguimiento";
echo "<br>";

$sqlIdSeguimiento = "SELECT ID
                     FROM seguimiento
                     WHERE Id_Paciente = '$Id_Paciente'";

$rs = mysqli_query($conexion,$sqlIdSeguimiento)
or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$rowIdSeguimiento = mysqli_fetch_array($rs);

if ( count($rowIdSeguimiento) > 0 ) // Si exite, borramos la tabla
{
        
        
    $IdSeguimiento=intval($rowIdSeguimiento['ID']);
     
     
    //tabla_recidiva
    $sqlIsRecidiva = "SELECT *
                      FROM tabla_recidiva
                      WHERE Id_Seguimiento = '$IdSeguimiento'";
    
    $rs = mysqli_query($conexion,$sqlIsRecidiva)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsRecidiva  = mysqli_fetch_array($rs);
    
    if ( count($rowIsRecidiva) > 0 ) // Si exite, borramos la tabla
    {
        $sqlRecidivaDelete = "DELETE
                              FROM tabla_recidiva
                              WHERE Id_Seguimiento = '$IdSeguimiento'";
    
        mysqli_query($conexion,$sqlRecidivaDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    
    //tabla_metastasis
    $sqlIsMetastasis = "SELECT *
                        FROM tabla_metastasis
                        WHERE Id_Seguimiento = '$IdSeguimiento'";
    
    $rs = mysqli_query($conexion,$sqlIsMetastasis)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsMetastasis  = mysqli_fetch_array($rs);
    
    if ( count($rowIsMetastasis) > 0 ) // Si exite, borramos la tabla
    {
        $sqlMetastasisDelete = "DELETE
                              FROM tabla_metastasis
                              WHERE Id_Seguimiento = '$IdSeguimiento'";
    
        mysqli_query($conexion,$sqlMetastasisDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    //tabla_segundo_tumor
    $sqlIsSegundo_Tumor = "SELECT *
                           FROM tabla_segundo_tumor
                           WHERE Id_Seguimiento = '$IdSeguimiento'";
    
    $rs = mysqli_query($conexion,$sqlIsSegundo_Tumor)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsSegundo_Tumor  = mysqli_fetch_array($rs);
    
    if ( count($rowIsSegundo_Tumor) > 0 ) // Si exite, borramos la tabla
    {
        $sqlSegundo_TumorDelete = "DELETE
                                   FROM tabla_segundo_tumor
                                   WHERE Id_Seguimiento = '$IdSeguimiento'";
    
        mysqli_query($conexion,$sqlSegundo_TumorDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    //tabla_estado
    $sqlIsEstado = "SELECT *
                    FROM tabla_estado
                    WHERE Id_Seguimiento = '$IdSeguimiento'";
    
    $rs = mysqli_query($conexion,$sqlIsEstado)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsEstado = mysqli_fetch_array($rs);
    
    if ( count($rowIsEstado) > 0 ) // Si exite, borramos la tabla
    {
        $sqlEstadoDelete = "DELETE
                            FROM tabla_estado
                            WHERE Id_Seguimiento = '$IdSeguimiento'";
    
        mysqli_query($conexion,$sqlEstadoDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //tabla_imposibilidad
    $sqlIsImposibilidad = "SELECT *
                           FROM tabla_imposibilidad
                           WHERE Id_Seguimiento = '$IdSeguimiento'";
    
    $rs = mysqli_query($conexion,$sqlIsImposibilidad)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $rowIsImposibilidad = mysqli_fetch_array($rs);
    
    if ( count($rowIsImposibilidad) > 0 ) // Si exite, borramos la tabla
    {
        $sqlImposibilidadDelete = "DELETE
                                   FROM tabla_imposibilidad
                                   WHERE Id_Seguimiento = '$IdSeguimiento'";
    
        mysqli_query($conexion,$sqlImposibilidadDelete)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    //Borramos la tabla seguimiento
    $sqlSeguimiento="DELETE FROM seguimiento
                 WHERE Id_Paciente = '$Id_Paciente'";
    
    mysqli_query($conexion,$sqlSeguimiento)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
	
	echo "Llega a tabla general";
	echo "<br>";
//Se borra la tabla_general

	$sqlNHC="SELECT AES_DECRYPT(NHC, '$claveNHC') FROM identificador_paciente WHERE ID='$Id_Paciente'";

	 $rs = mysqli_query($conexion,$sqlNHC)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $row = mysqli_fetch_array($rs);
	
	$NHCgeneral=$row[0];
	
	$sqlTablaGeneralDelete="DELETE FROM tabla_general WHERE NHC='$NHCgeneral'";
	
	mysqli_query($conexion,$sqlTablaGeneralDelete)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));



//Se borra de tabla_estadistica

	$sqlTablaEstadisticaDelete="DELETE FROM tabla_estadistica WHERE ID='$Id_Paciente'";


	mysqli_query($conexion,$sqlTablaEstadisticaDelete)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

}    
}
else //Introducimos el nuevo paciente en la base de datos
{
    //Introducción en la BDD de los datos generales del paciente en la tabla  identificador_paciente
    $sqlPaciente="INSERT INTO identificador_paciente (Id_Hospital, NHC, Id_Sexo, Fecha_Nacimiento, Fecha_Alta_Sistema) VALUES ('$idHospital',AES_ENCRYPT('$NHC','$claveNHC'),'$Sexo','$Fecha_Nacimiento','$hoy')";
	
	
	$_SESSION["Error"]="Error en identificador paciente";        
    mysqli_query($conexion,$sqlPaciente)
    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
    $sqlIDUltimoPaciente="SELECT LAST_INSERT_ID()";

    $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDUltimoPaciente))
     or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $Id_Paciente=$row[0];

    //Se pasa el Id_Paciente por SESSION
    $_SESSION["Id_Paciente"]=$Id_Paciente;
	
	echo "IdPaciente ".$_SESSION["Id_Paciente"];
    
} //Fin BuscarPaciente en la BDD









/**********************************************************************************
 *
 * SE INTRODUCEN LOS DATOS EN LA BASE DE DATOS
 * 
 ***************************************************************************************/    








    
//Se insertan los datos generales en la tabla inicial

$sqlInicial="INSERT INTO inicial (Id_Paciente, Localizacion, B_Sincro, B_Tec_ECO, Tec_TAC, B_Tec_RMN, Id_Integ_Esfint, B_Inv_Vecinos, B_Metast_Inicial, Id_Estadio_Radio, Clasificacion_Rullier)
            VALUES ('$Id_Paciente','$Localizacion','$Sincro','$ECO','$TAC','$RMN','$Integ_Esfinter', '$Inv_Vecinos', '$Metast_Inicial', '$Estadio_Radio','$Clasificacion_Rullier')";
            
    mysqli_query($conexion,$sqlInicial)
     or die(header("Location: EliminaPaciente/elimina_paciente.php"));
     

/**********************************************************************************
 *
 * Se selecciona el ID autogenerado por la tabla inicial del paciente que se acaba de introducir
 * Este ID será el que identificador común de todas las tablas asociadas a inicial.
 * 
 * La variable que lo contiene es $Id_Inicial   
 * 
 ***************************************************************************************/    

$sqlIdInicial="SELECT LAST_INSERT_ID()";

$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdInicial))
     or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$Id_Inicial=$row[0];
$Id_Inicial=intval($Id_Inicial);



/*************************************************************************
 * 
 *Introducción de datos de tumor sincrónico
 * 
 * En caso de que se haya marcado que exista tumor sincrónico, se realizan 
 * las consultas que introducen el tipo de tumor sincrónico marcado en los checkbox
 * 
 * Se hace individualmente, ya que puede haber varios tipos de tumor sincrónico.
 * 
 * 
 *************************************************************************/

if($Sincro==1){
    if($SincroColonDerecho!=null){
        $sqlSincroDerecho="INSERT INTO tabla_sincro (Id_Inicial, Id_Colon) VALUES ('$Id_Inicial', '$SincroColonDerecho')";
        
        mysqli_query($conexion,$sqlSincroDerecho)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    if($SincroColonIzquierdo!=null){
        $sqlSincroIzquierdo="INSERT INTO tabla_sincro (Id_Inicial, Id_Colon) VALUES ('$Id_Inicial', '$SincroColonIzquierdo')";
        
        mysqli_query($conexion,$sqlSincroIzquierdo)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
    if($SincroColonTransverso!=null){
        $SincroColonTransverso="INSERT INTO tabla_sincro (Id_Inicial, Id_Colon) VALUES ('$Id_Inicial', '$SincroColonTransverso')";
        
        mysqli_query($conexion,$SincroColonTransverso)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
        
    if($SincroColonSigma!=null){
        $SincroColonSigma="INSERT INTO tabla_sincro (Id_Inicial, Id_Colon) VALUES ('$Id_Inicial', '$SincroColonSigma')";
        
        mysqli_query($conexion,$SincroColonSigma)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
}

/******************************************************************************
 * 
 * RADIOLOGIA-HOJA INICIAL
 * 
 * Si hay alguno de los 3 tratamientos radiológicos, se marcan primero en la tabla inicial
 * 
 * Aquí se introducen los datos propios de cada tratamiento (ECO-RMN)
 * 
 * 
 * *****************************************************************************/

if($ECO==1){
    if($ECO_T!=null && $ECO_N!=null){
        $sqlEco="INSERT INTO tabla_eco (Id_Inicial, Id_ECO_T, Id_ECO_N) VALUES ('$Id_Inicial', '$ECO_T', '$ECO_N')";
        
        mysqli_query($conexion,$sqlEco)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
}

if($RMN==1){
    if($RMN_T!=null && $RMN_N!=null){
        $sqlRmn="INSERT INTO tabla_rmn (Id_Inicial, Id_RMN_T, Id_RMN_N, Dist_Tumor, Dist_Adenopatia) VALUES ('$Id_Inicial', '$RMN_T', '$RMN_N', '$Dist_Tumor', '$Dist_Adeno')";
        
        mysqli_query($conexion,$sqlRmn)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
}


/*************************************************************
 * 
 * INVASIÓN DE ÓRGANOS VECINOS
 * 
 * Se introducen en tabla_vecinos, los órganos invadidos que 
 * se han seleccionado en los checkbox de INICIAL
 * 
 * 
 * **********************************************************/

if($Inv_Vecinos==1){
    
    if($Inv_Utero!=null){
        $sqlUtero="INSERT INTO tabla_vecinos (Id_Inicial, Id_Organos) VALUES ('$Id_Inicial', '$Inv_Utero')";
        
        mysqli_query($conexion,$sqlUtero)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    if($Inv_Prostata!=null){
        $sqlProstata="INSERT INTO tabla_vecinos (Id_Inicial, Id_Organos) VALUES ('$Id_Inicial', '$Inv_Prostata')";
        
        mysqli_query($conexion,$sqlProstata)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    if($Inv_Vejiga!=null){
        $sqlVejiga="INSERT INTO tabla_vecinos (Id_Inicial, Id_Organos) VALUES ('$Id_Inicial', '$Inv_Vejiga')";
        
        mysqli_query($conexion,$sqlVejiga)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    if($Inv_Ureter!=null){
        $sqlUreter="INSERT INTO tabla_vecinos (Id_Inicial, Id_Organos) VALUES ('$Id_Inicial', '$Inv_Ureter')";
        mysqli_query($conexion,$sqlUreter)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    if($Inv_Vagina!=null){
        $sqlVagina="INSERT INTO tabla_vecinos (Id_Inicial, Id_Organos) VALUES ('$Id_Inicial', '$Inv_Vagina')";
        
        mysqli_query($conexion,$sqlVagina)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    if($Inv_Seminal!=null){
        $sqlSeminal="INSERT INTO tabla_vecinos (Id_Inicial, Id_Organos) VALUES ('$Id_Inicial', '$Inv_Seminal')";
        
        mysqli_query($conexion,$sqlSeminal)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    if($Inv_Sacro!=null){
        $sqlSacro="INSERT INTO tabla_vecinos (Id_Inicial, Id_Organos) VALUES ('$Id_Inicial', '$Inv_Sacro')";
        
        mysqli_query($conexion,$sqlSacro)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
}


/*************************************************************
 * 
 * METÁSTASIS INICIAL
 * 
 * Se introducen en tabla_metast_inicial, los órganos que sufren 
 * metástasis que se han seleccionado en los checkbox de INICIAL
 * 
 * 
 * **********************************************************/


if($Metast_Inicial==1){
    
    if($Metast_Hepaticas!=null){
        $sqlMetastHepaticas="INSERT INTO tabla_metast_inicial (Id_Inicial, Id_Organo) VALUES ('$Id_Inicial', '$Metast_Hepaticas')";
        mysqli_query($conexion,$sqlMetastHepaticas)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }

    if($Metast_Oseas!=null){
        $sqlMetastOseas="INSERT INTO tabla_metast_inicial (Id_Inicial, Id_Organo) VALUES ('$Id_Inicial', '$Metast_Oseas')";
        mysqli_query($conexion,$sqlMetastOseas)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
        if($Metast_Pulmonares!=null){
        $sqlMetastPulmonares="INSERT INTO tabla_metast_inicial (Id_Inicial, Id_Organo) VALUES ('$Id_Inicial', '$Metast_Pulmonares')";
        mysqli_query($conexion,$sqlMetastPulmonares)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
    
        if($Metast_Nervioso!=null){
        $sqlMetastNervioso="INSERT INTO tabla_metast_inicial (Id_Inicial, Id_Organo) VALUES ('$Id_Inicial', '$Metast_Nervioso')";
        mysqli_query($conexion,$sqlMetastNervioso)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }       
}



/***********************************************************************************
 * 
 * TRATAMIENTO
 * 
 * Se introducen los datos de la hoja de tratamiento.
 * 
 * En primer lugar se recogen las variables de tratamiento pasadas por sesión.
 * 
 * Después se introducen los datos pasados por la base de datos
 * 
 * 
 * Esta hoja tiene la particularidad de que el tratamiento adyuvante, puede ser introducido
 * más adelante
 * 
 * *********************************************************************************/


//INTRODUCCION DE LOS DATOS DE TRATAMIENTO

   
/***************************************************************************
 * 
 * Se realiza la introducción de los datos en la tabla de tratamiento
 * 
 * Como se ha comentado anteriormente, el $Id_Paciente es el ID autogenerado en la
 * tabla identificador_paciente y será el que nos sirva para reconocer al paciente en
 * las diferentes tablas generales de cada página.
 * 
 * 
 * **************************************************************************/

    
$sqlTratamiento="INSERT INTO tratamiento (Id_Paciente, B_Tto_Neo, B_Tto_Ady) VALUES ('$Id_Paciente', '$TTO_Neoadyuvante','$TTO_Adyuvante')";

mysqli_query($conexion,$sqlTratamiento)
     or die(header("Location: EliminaPaciente/elimina_paciente.php"));


/**********************************************************************************
 *
 * Se selecciona el ID autogenerado por la tabla tratamiento del paciente que se acaba 
 * de introducir
 * 
 * Este ID será el que identificador común de todas las tablas asociadas a tratamiento.
 * 
 * La variable que lo contiene es $Id_Tratamiento   
 * 
 ***************************************************************************************/   


$sqlIdTratamiento="SELECT LAST_INSERT_ID()";

$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdTratamiento))
     or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $Id_Tratamiento=$row[0];
    $Id_Tratamiento=intval($Id_Tratamiento);



/**********************************************************************************
 *
 * TRATAMIENTO NEOADYUVANTE
 * 
 * Se realiza la introducción de los datos del tratamiento neoadyuvante.
 * 
 * Si se ha recibido tratamiento neoadyuvante, se introducen los datos en tabla_neo
 * 
 * Por el contrario, si no se ha recibido, los datos se introducen en tabla_no_neo
 *    
 * 
 ***************************************************************************************/   


if($TTO_Neoadyuvante==1){
    
    if($Tipo_TTO_Neoadyuvante!=null){
        $sqlTipoTTONeo="INSERT INTO tabla_neo (Id_Tratamiento, Id_Tipo_Neo) VALUES ('$Id_Tratamiento', '$Tipo_TTO_Neoadyuvante')";
        
        mysqli_query($conexion,$sqlTipoTTONeo)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
    
}else if($TTO_Neoadyuvante==2){
            
        if($Motivo_No_Neoadyuvante!=null){
        $sqlMotivoNoNeo="INSERT INTO tabla_no_neo (Id_Tratamiento, Id_Tipo_No_Neo) VALUES ('$Id_Tratamiento', '$Motivo_No_Neoadyuvante')";
        
        mysqli_query($conexion,$sqlMotivoNoNeo)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }   
}

/**********************************************************************************
 *
 * TRATAMIENTO ADYUVANTE
 * 
 * Se realiza la introducción de los datos del tratamiento adyuvante en caso de que se haya
 * recibido.
 * 
 * Si se ha recibido tratamiento adyuvante, se introducen los datos en tabla_ady
 * 
 * Si no se ha recibido o todavía no se ha completado, no se hace nada
 * 
 ***************************************************************************************/   


if($TTO_Adyuvante==1){
    if($Tipo_TTO_Adyuvante!=null){
        $sqlTipoTTOAdy="INSERT INTO tabla_ady (Id_Tratamiento, Id_Tipo_Ady) VALUES ('$Id_Tratamiento', '$Tipo_TTO_Adyuvante')";
        
        mysqli_query($conexion,$sqlTipoTTOAdy)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }
}   
    


/***********************************************************************************
 * 
 * CIRUGIA
 * 
 * Se introducen los datos de la hoja de cirugia.
 * 
 * En primer lugar se recogen las variables de cirugia pasadas por sesión.
 * 
 * Después se introducen los datos pasados por la base de datos
 * 
 * *********************************************************************************/

//INTRODUCCION DE DATOS DE LA HOJA DE CIRUGIA

/*************************************************************************************
 * 
 * EXTRACCIÓN DEL IDENTIFICADOR DE OTRAS TÉCNICAS
 * 
 * Se selecciona el ID del valor escrito en otras técnicas para almacenarlo
 * 
 * ************************************************************************************/
 


/*************************************************************************************
 * 
 * CIRUGIA
 * 
 * Se inserta el Id_Paciente obtenido de la tabla identificador_paciente y también si ha 
 * tenido cirugia o no
 * 
 * *************************************************************************************/



$sqlCirugia="INSERT INTO cirugia (Id_Paciente, B_Cirugia) VALUES ('$Id_Paciente', '$B_Cirugia')";

mysqli_query($conexion,$sqlCirugia)
     or die(header("Location: EliminaPaciente/elimina_paciente.php"));


/*************************************************************************************
 * 
 * EXTRACCIÓN DEL Id_Cirugia
 * 
 * De la fila que se acaba de introducir, se extrae el id para usarlo como identificador común 
 * en las tablas asociadas a cirugia
 * 
 * *************************************************************************************/

$sqlIdCirugia="SELECT LAST_INSERT_ID()";

$row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdCirugia))
     or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $Id_Cirugia=$row[0];
    $Id_Cirugia=intval($Id_Cirugia);

/*************************************************************************************
 * 
 * NO CIRUGIA
 * 
 * Si no ha habido cirugia, se introduce en la tabla_no_cirugia el motivo
 * 
 * *************************************************************************************/


if($B_Cirugia==2){
    if($Motivo_No_Cirugia!=null){
        $sqlMotivoNoCirugia="INSERT INTO tabla_no_cirugia (Id_Cirugia, Id_Motivo) VALUES ('$Id_Cirugia', '$Motivo_No_Cirugia')";
        
        mysqli_query($conexion,$sqlMotivoNoCirugia)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        
    if($Motivo_No_Cirugia==3){
        $sqlNoAdyuvante="UPDATE tratamiento SET B_Tto_Ady=3 WHERE ID='$Id_Tratamiento'";
        
         mysqli_query($conexion,$sqlNoAdyuvante)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }   
            
}
    
    

/*************************************************************************************
 * 
 * SI CIRUGIA
 * 
 * Si ha habido cirugia, se introducen los datos en tabla_cirugia y dentro del IF se hacen las consultas
 * a las tablas asociadas para ir introduciendo todos los datos
 * 
 * *************************************************************************************/   
    
    
}else if($B_Cirugia==1){
//INICIO DEL IF DE OPERADO==SI  

/****************************************************************************************
 * 
 * TABLA_CIRUGIA
 * 
 * Se introducen los datos en la tabla_cirugia
 * 
 * Se hace un IF para asegurarse de que se introduce correctamente otras tecnicas de cirugia
 * en caso de que las haya
 * 
 * *************************************************************************************/

	echo "Otra tecnica ".count($Otra_Tecnica_Cirugia);
	echo "<br>";
	echo "<br>";
    if ( count($Otra_Tecnica_Cirugia) != 0)
    {
    	echo ( "Otras " .count($Otra_Tecnica_Cirugia));
        $Otras_Cirugia = 1;
    }
 
 	
 	echo "Id_Cirugia ".gettype($Id_Cirugia)."    ". $Id_Cirugia;
	echo "<br>";
	echo "Id_Planificacion ".gettype($Tipo_Cirugia)."    ". $Tipo_Cirugia;
	echo "<br>";
	echo "Fecha Cir ".gettype($Fecha_Intervencion)."    ". $Fecha_Intervencion;
	echo "<br>";
	echo "Fecha alta ".gettype($Fecha_Alta)."    ". $Fecha_Alta;
	echo "<br>";
	echo "Principal ".gettype($Cirujano_Principal)."    ". $Cirujano_Principal;
	echo "<br>";
	echo "Ayudante ".gettype($Cirujano_Ayudante)."    ". $Cirujano_Ayudante;
	echo "<br>";
	echo "Tecnica ".gettype($Tecnica_Cirugia)."    ". $Tecnica_Cirugia;
	echo "<br>";
	echo "OTras Cirugia ".gettype($Otras_Cirugia)."    ". $Otras_Cirugia;
	echo "<br>";
	echo "Orientación ".gettype($Orientacion)."    ". $Orientacion;
	echo "<br>";
	echo "Exeresis ".gettype($Exeresis_Meso)."    ". $Exeresis_Meso;
	echo "<br>";
	echo "Visc ".gettype($Otras_Resecc_Viscerales)."    ". $Otras_Resecc_Viscerales;
	echo "<br>";
 
 
 if ($Exeresis_Meso==null){
 	$Exeresis_Meso=3;
 }
 
 	
 
    $sqlTablaCirugia="INSERT INTO tabla_cirugia (Id_Cirugia, Id_Planificacion, Fecha_Intervencion, Fecha_Alta, Cirujano, Ayudante, Id_Tecnica, B_Otra_Tecnica, Orientacion, Id_Exeresis_Meso, B_Otras_Resecciones, Anastomosis_coloanal) 
                        VALUES ('$Id_Cirugia', '$Tipo_Cirugia', '$Fecha_Intervencion', '$Fecha_Alta', '$Cirujano_Principal', '$Cirujano_Ayudante', '$Tecnica_Cirugia', $Otras_Cirugia, 
						'$Orientacion', '$Exeresis_Meso', '$Otras_Resecc_Viscerales', '$Anastomosis_coloanal')";
                                       
                mysqli_query($conexion,$sqlTablaCirugia)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));

 /****************************************************************************************
 * 
 * OTRAS TÉCNICAS
 * 
 *En el caso de que se hayan seleccionado varias ténicas de cirugía, se hace un for con 
 * el array introducido anteriormente, y se van metiendo en la base de datos individualmente
 * 
 * 
 * *************************************************************************************/

    

    if($Otras_Cirugia == 1){
        for ($i=0; $i < count($Otra_Tecnica_Cirugia); $i++) {
            
            $value =  intval($Otra_Tecnica_Cirugia[$i]);
            echo "Longitud ".count($Otra_Tecnica_Cirugia);;
			echo "<br>";
            echo $value . " ";
			
			if ($value!=0){
            $sqlNuevaTecnica="INSERT INTO tabla_otras_tecnicas (Id_Cirugia, Id_Tipo_Otras_Tecnicas) VALUES('$Id_Cirugia', '$value')";
    
            mysqli_query($conexion,$sqlNuevaTecnica)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
			}
        }
    }
    
/****************************************************************************************
 * 
 * RESECCIONES VISCERALES
 * 
 *En el caso de que se haya marcado que hay resecciones viscerales, se hacen diferents if 
 * para introducir las resecciones individualemnte
 * 
 * *************************************************************************************/

    if ($Otras_Resecc_Viscerales==1){
        
        if($Res_Seminales!=null){
                $sqlSeminales="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Seminales')";
            
                mysqli_query($conexion,$sqlSeminales)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        }

        if($Res_Peritoneo!=null){
                $sqlPeritoneo="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Peritoneo')";
            
                mysqli_query($conexion,$sqlPeritoneo)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        }
    
        if($Res_Vejiga!=null){
                $sqlVejiga="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Vejiga')";
            
                mysqli_query($conexion,$sqlVejiga)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        }

        if($Res_Utero!=null){
                $sqlUtero="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Utero')";
            
                mysqli_query($conexion,$sqlUtero)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        
        }
    
        if($Res_Vagina!=null){
                $sqlVagina="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Vagina')";
            
                mysqli_query($conexion,$sqlVagina)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
        }
    
        if($Res_Prostata!=null){
                $sqlProstata="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Prostata')";
            
                mysqli_query($conexion,$sqlProstata)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
        }
		
	if($Res_Hepatica!=null){
                $sqlHepatica="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Hepatica')";
            
                mysqli_query($conexion,$sqlHepatica)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
        }
		
    
        if($Res_IDelgado!=null){
                $sqlIDelgado="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_IDelgado')";
            
                mysqli_query($conexion,$sqlIDelgado)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
        }
    
        if($Res_Coccix!=null){
                $sqlCoccix="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Coccix')";
            
                mysqli_query($conexion,$sqlCoccix)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        
        }
        
        if($Res_Sacro!=null){
                $sqlSacro="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Sacro')";
            
                mysqli_query($conexion,$sqlSacro)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
        }
        
        if($Res_Ureter!=null){
                $sqlUreter="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Ureter')";
            
                mysqli_query($conexion,$sqlUreter)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
        }
        
        if($Res_Ovarios!=null){
                $sqlOvarios="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Ovarios')";
            
                mysqli_query($conexion,$sqlOvarios)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
        }
        
        if($Res_Trompas!=null){
                $sqlTrompas="INSERT INTO tabla_otras_resecciones (Id_Cirugia, Id_Tipo_Otras_Resecciones) 
                        VALUES ('$Id_Cirugia', '$Res_Trompas')";
            
                mysqli_query($conexion,$sqlTrompas)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
        }
    
    
    }//CIERRE IF DE OTRAS RESECCIONES
    
/********************************************************************
 * 
 * CARACTERÍSTICAS CIRUGIA
 * 
 * Se sigue dentro del IF de cirugia=si, y en esta tabla se meten las características
 * de la operación que se ha recogido en la hoja de cirugia
 * 
 * ******************************************************************/  
        
$sqlCaracteristicasCirugia="INSERT INTO tabla_caracteristicas_cirugia (Id_Cirugia, Id_Asa, Id_Hallazgos_Intra, Perforacion_Tumoral, 
                            Id_Metast_Hepaticas, Implantes_Ovaricos, Obstruccion, Id_Via_Operacion, Tiempo_Operatorio, Transfusion, Id_Intencion, Id_Anastomosis, 
                            Id_Reservorio, B_Estoma_Derivacion)
                            VALUES ('$Id_Cirugia', '$ASA','$Hallazgos_Intraoperatorios', '$Perforacion_Tumoral',
                            '$Met_Hepaticas', '$Imp_Ovaricos', '$Obstruccion', '$Via_Operacion', '$Tiempo_Operacion','$Transfusiones', '$Intencion_Operatoria', '$Anastomosis',
                            '$Reservorio', '$Estoma_Derivacion')";
            
                            mysqli_query($conexion,$sqlCaracteristicasCirugia)
                            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
/********************************************************************
 * 
 * ESTOMA DERIVACIÓN
 * 
 * Si se ha seleccionado estoma de derivación, se introduce el tipo de 
 * estoma en tabla_estoma
 * 
 * ******************************************************************/  
    
        if($Estoma_Derivacion==1){
            if($Tipo_Estoma!=null){
                    
                $sqlEstoma="INSERT INTO tabla_estoma (Id_Cirugia, Id_Tipo_Estoma) 
                            VALUES ('$Id_Cirugia', '$Tipo_Estoma')";
                    
                mysqli_query($conexion,$sqlEstoma)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            }   
        }
        
/********************************************************************
 * 
 * COMPLICACIONES
 * 
 *En primer lugar, en tabla_complicaciones, se indica si el paciente ha
 * tenido complicaciones o no.  
 * 
 * Conforme a ese valor, se actuará más adelante 
 * 
 * ******************************************************************/  
        
        $sqlComplicaciones="INSERT INTO tabla_complicaciones (Id_Cirugia, B_Complicaciones) 
                            VALUES ('$Id_Cirugia', '$Complicaciones')";
                    
                        mysqli_query($conexion,$sqlComplicaciones)
                        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                    
/******************************************************
 * 
 * COMPLICACIONES HERIDA-PERINE-ABDOMINALES-ANASTOMOSIS-OTRAS
 * 
 * Se comprueban que tipo de complicaciones hay y se asignan dentro
 * de los grupos para introducir en la base de datos
 * 
 * 
 * ****************************************************/                
    
    //HERIDA
    
    if($Herida_Hemorragia!=null || $Herida_Infeccion!=null || $Herida_Evisceracion!=null || $Herida_Eventracion!=null){
        $Complic_Herida=1;
    }else{
        $Complic_Herida=null;
    }
    
    //PERINE
    
    if($Perine_Infeccion!=null || $Perine_Retraso_Cicatrizacion!=null || $Perine_Hernia!=null){
        $Complic_Perine=1;
    }else{
        $Complic_Perine=null;
    }
    
    //ABDOMINALES
    
    if($Abdominales_Hemoperitoneo!=null || $Abdominales_Peri_Difusas!=null || $Abdominales_Abceso_Abdominal!=null || 
    $Abdominales_Abceso_Pelvico!=null || $Abdominales_Hemo_Pelvica!=null || $Abdominales_Isquemia_Intestinal!=null || $Abdominales_Colecistitis!=null || 
    $Abdominales_Iatrog_Vias_Urinarias!=null || $Abdominales_Iatrog_Vias_Huecas!=null || $Abdominales_Ileo_Paralitico_Prolongado!=null || 
    $Abdominales_Ileo_Mecanico!=null || $Abdominales_Estoma!=null || $Generales_Sepsis!=null || $Generales_Shock!=null){
            
        $Complic_Abdominales=1;
    }else{
        $Complic_Abdominales=null;
    }
    
    //ANASTOMOSIS
    
    if($Anastomosis_Hemorragia!=null || $Anastomosis_Fuga!=null || $Anastomosis_Fistula!=null){
        $Complic_Anastomosis=1;
    }else{
        $Complic_Anastomosis=1;
    }
    
    //OTRAS
    
    if($Otras_Hemo_Diges!=null || $Otras_Infeccion_Urinaria!=null || $Otras_Urologicas!=null || 
    $Otras_Respiratoria!=null || $Otras_Respiratoria_Infecc!=null || $Otras_Hepatica!=null ||
     $Otras_Vascular_Mec!=null || $Otras_Vascular_Infecc!=null ||$Otras_FMO!=null || $Otras_TEP!=null || 
     $Otras_Neuroapraxia!=null || $Otras_Renal|| $Otras_Cardiovascular!=null){
        
        $Complic_Otras=1;
    }else{
        $Complic_Otras=null;
    }
    
/******************************************************
 * 
 * TIPO DE COMPLICACIONES
 * 
 * Se introducen el tipo de complicaciones en la 
 * tabla_tipo_complicaciones obtenidos en los grupos anteriores
 * 
 * ****************************************************/        
        
    if($Complicaciones==1){
            $sqlTipoComplicaciones="INSERT INTO tabla_tipo_complicaciones (Id_Cirugia, B_Reintervencion, B_Exitus_Intraop, B_Exitus_Postop, 
                                    B_Herida, B_Perine, B_Abdominales, B_Anastomosis, B_Otras) 
                                    VALUES ('$Id_Cirugia', '$Reintervencion', '$Exitus_Intra', '$Exitus_Post', 
                                    '$Complic_Herida', '$Complic_Perine', '$Complic_Abdominales', '$Complic_Anastomosis', '$Complic_Otras')";
                    
                mysqli_query($conexion,$sqlTipoComplicaciones)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }   //CIERRE DE LA TABLA tabla_tipo_complicaciones
    

/*********************************************************
 * 
 * COMPLICACIONES-REINTERVENCION
 * 
 * En el caso de que haya sido necesaria una reintervención,
 * 
 * en primer lugar se selecciona el ID del tipo de reitervención
 * recogido en el campo de texto y almacenado en tabla_tipo_reintervencion
 * 
 * Después se introduce el ID en tabla_reintervencion, junto con el ID de cirugia
 * 
 * *******************************************************/ 
                    
    if($Reintervencion==1){
        if($Tipo_Reintervencion!=null){
  	
                
            $sqlReintervencionIntroducida="SELECT COUNT(*) FROM tabla_tipo_reintervencion WHERE Tipo='$Tipo_Reintervencion'";
            
            $row=mysqli_fetch_array(mysqli_query($conexion,$sqlReintervencionIntroducida))
             or die(header("Location: EliminaPaciente/elimina_paciente.php"));
             
             
             if($row[0]==0){
                    
                $sqlNuevaTecnica="INSERT INTO tabla_tipo_reintervencion (Tipo) VALUES('$Tipo_Reintervencion')";
    
                mysqli_query($conexion,$sqlNuevaTecnica)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
                    $sqlIdTipoReintervencion="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdTipoReintervencion))
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

                $IDTipoReintervencion=$row[0];
                
                
             }else{
                
                $sqlIDReintervencion="SELECT ID FROM tabla_tipo_reintervencion WHERE Tipo='$Tipo_Reintervencion'";
                
                    $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDReintervencion))
                    or die  (header("Location: EliminaPaciente/elimina_paciente.php"));
                
                $IDTipoReintervencion=$row[0];
                
             }
                    
                $sqlTipoReintervencion="INSERT INTO tabla_reintervencion (Id_Cirugia, Id_Tipo_Reintervencion) VALUES ('$Id_Cirugia', '$IDTipoReintervencion')";
                    
                    mysqli_query($conexion,$sqlTipoReintervencion)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            }
        }
    

/*********************************************************
 * 
 * COMPLICACIONES-EXITUS INTRAOPERATORIO
 * 
 * En el caso de que haya sido exitus intraoperatorio,
 * 
 * en primer lugar se selecciona el ID del tipo de exitus
 * recogido en el campo de texto y almacenado en tabla_tipo_exitus_intraop
 * 
 * Después se introduce el ID en tabla_exitus_intraop, junto con el ID de cirugia
 * 
 * *******************************************************/     
 
 if($Exitus_Intra==1){
        if($Causa_Exitus_Intra!=null){

                
            $sqlExitusIntraIntroducido="SELECT COUNT(*) FROM tabla_tipo_exitus_intraop WHERE Tipo='$Causa_Exitus_Intra'";
            
            $row=mysqli_fetch_array(mysqli_query($conexion,$sqlExitusIntraIntroducido))
             or die(header("Location: EliminaPaciente/elimina_paciente.php"));
             
             
             if($row[0]==0){
                    
                $sqlNuevoExitus="INSERT INTO tabla_tipo_exitus_intraop (Tipo) VALUES('$Causa_Exitus_Intra')";
    
                mysqli_query($conexion,$sqlNuevoExitus)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
                    $sqlIdTipoExitusIntra="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIdTipoExitusIntra))
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

                $IDTipoExitusIntra=$row[0];
                
                
             }else{
                
                $sqlTipoExitusIntra="SELECT ID FROM tabla_tipo_exitus_intraop WHERE Tipo='$Causa_Exitus_Intra'";
                
                    $row=mysqli_fetch_array(mysqli_query($conexion,$sqlTipoExitusIntra))
                    or die  (header("Location: EliminaPaciente/elimina_paciente.php"));
                
                $IDTipoExitusIntra=$row[0];
                
             }
                    
                $sqlExitusIntra="INSERT INTO tabla_exitus_intraop (Id_Cirugia, Id_Tipo_Exitus_Intraop) VALUES ('$Id_Cirugia', '$IDTipoExitusIntra')";
                    
                    mysqli_query($conexion,$sqlExitusIntra)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            }
        }
    

/*********************************************************
 * 
 * COMPLICACIONES-EXITUS POSTOPERATORIO
 * 
 * En el caso de que haya sido exitus postoperatorio,
 * 
 * en primer lugar se selecciona el ID del tipo de exitus
 * recogido en el campo de texto y almacenado en tabla_tipo_exitus_postop
 * 
 * Después se introduce el ID en tabla_exitus_postop, junto con el ID de cirugia
 * 
 * *******************************************************/ 
     if($Exitus_Post==1){
        if($Causa_Exitus_Post!=null){
			
            $sqlExitusPostIntroducido="SELECT COUNT(*) FROM tabla_tipo_exitus_postop WHERE Tipo='$Causa_Exitus_Post'";
            
            $row=mysqli_fetch_array(mysqli_query($conexion,$sqlExitusPostIntroducido))
             or die(header("Location: EliminaPaciente/elimina_paciente.php"));
             
             
             if($row[0]==0){
                    
				
                $sqlNuevoExitus="INSERT INTO tabla_tipo_exitus_postop (Tipo) VALUES('$Causa_Exitus_Post')";
    
                mysqli_query($conexion,$sqlNuevoExitus)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
                    $sqlIDExitusPost="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDExitusPost))
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

                $IDTipoExitusPost=$row[0];
                
                
             }else{
                
                $sqlIDExitusPost="SELECT ID FROM tabla_tipo_exitus_postop WHERE Tipo='$Causa_Exitus_Post'";
                
                    $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDExitusPost))
                    or die  (header("Location: EliminaPaciente/elimina_paciente.php"));
                
                $IDTipoExitusPost=$row[0];
                
             }
                    
                $sqlExitusPost="INSERT INTO tabla_exitus_postop (Id_Cirugia, Id_Tipo_Exitus_postop) VALUES ('$Id_Cirugia', '$IDTipoExitusPost')";
                    
                    mysqli_query($conexion,$sqlExitusPost)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            }
        }
            
        
/***************************************************
 * 
 * COMPLICACIONES-CHECKBOX
 * 
 * Se introducen los items de las complicaciones en las tablas correspondientes 
 * 
 * Cada item tiene un value diferente para poder reconocerlo
 * 
 * **************************************************/  
    
        if($Complic_Herida!=null){
            if($Herida_Hemorragia!=null){
                    
                $sqlComplicHemorragia="INSERT INTO tabla_herida (Id_Cirugia, Id_Tipo_Herida) VALUES ('$Id_Cirugia', '$Herida_Hemorragia')";
                
                mysqli_query($conexion,$sqlComplicHemorragia)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
            }
            if($Herida_Infeccion!=null){
                
                $sqlComplicInfeccion="INSERT INTO tabla_herida (Id_Cirugia, Id_Tipo_Herida) VALUES ('$Id_Cirugia', '$Herida_Infeccion')";
                
                mysqli_query($conexion,$sqlComplicInfeccion)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            }
            if($Herida_Evisceracion!=null){
                
                $sqlComplicEvisceracion="INSERT INTO tabla_herida (Id_Cirugia, Id_Tipo_Herida) VALUES ('$Id_Cirugia', '$Herida_Evisceracion')";
                
                mysqli_query($conexion,$sqlComplicEvisceracion)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            }
            if($Herida_Eventracion!=null){
                
                $sqlComplicEventracion="INSERT INTO tabla_herida (Id_Cirugia, Id_Tipo_Herida) VALUES ('$Id_Cirugia', '$Herida_Eventracion')";
                
                mysqli_query($conexion,$sqlComplicEventracion)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
       		 }
        }
        if($Complic_Perine==1){
            if($Perine_Infeccion!=null){
                
                    $sqlComplicPerine="INSERT INTO tabla_perine (Id_Cirugia, Id_Tipo_Perine) VALUES ('$Id_Cirugia', '$Perine_Infeccion')";
                
                mysqli_query($conexion,$sqlComplicPerine)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            }
            if($Perine_Retraso_Cicatrizacion!=null){
                
                
                    $sqlComplicRetrasoCicat="INSERT INTO tabla_perine (Id_Cirugia, Id_Tipo_Perine) VALUES ('$Id_Cirugia', '$Perine_Retraso_Cicatrizacion')";
                
                mysqli_query($conexion,$sqlComplicRetrasoCicat)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            }
			if($Perine_Hernia!=null){
                
				echo "<br>";
                echo "Hernia: ".$Perine_Hernia;
                    $sqlComplicHernia="INSERT INTO tabla_perine (Id_Cirugia, Id_Tipo_Perine) VALUES ('$Id_Cirugia', '$Perine_Hernia')";
                
                mysqli_query($conexion,$sqlComplicHernia)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            }	
        }


    if($Complic_Abdominales==1){
        if($Abdominales_Hemoperitoneo!=null){
            
            $sqlComplicHemoperitoneo="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Hemoperitoneo')";
                
                mysqli_query($conexion,$sqlComplicHemoperitoneo)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
        }
        if($Abdominales_Peri_Difusas!=null){
            
                $sqlComplicPeriDifusas="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Peri_Difusas')";
                
                mysqli_query($conexion,$sqlComplicPeriDifusas)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
        }
        if($Abdominales_Abceso_Abdominal!=null){
            
            $sqlComplicAbceso="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Abceso_Abdominal')";
                
                mysqli_query($conexion,$sqlComplicAbceso)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
            
        }
/*
		if($Abdominales_Hemo_Abdominal!=null){
            
            $sqlComplicAbdoHemo="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Hemo_Abdominal')";
                
                mysqli_query($conexion,$sqlComplicAbdoHemo)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php").'2370');
            
            
        }
*/
		//$Abdominales_Abceso_Pelvico
		    if($Abdominales_Abceso_Pelvico!=null){
            
			echo "Entra en Abdominales pelvico";
				echo "<br>";
				echo $Abdominales_Abceso_Pelvico;
            $sqlComplicAbceso="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Abceso_Pelvico')";
                
                mysqli_query($conexion,$sqlComplicAbceso)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
               
        }
			
		 if($Abdominales_Hemo_Pelvica!=null){
         
            $sqlComplicHemoPelvica="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Hemo_Pelvica')";
                
                mysqli_query($conexion,$sqlComplicHemoPelvica)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
               
        }	


        if($Abdominales_Isquemia_Intestinal!=null){
            
            $sqlComplicIsquemia="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Isquemia_Intestinal')";
                
                mysqli_query($conexion,$sqlComplicIsquemia)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
        }
        if($Abdominales_Colecistitis!=null){
            
            $sqlComplicColecistitis="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Colecistitis')";
                
                mysqli_query($conexion,$sqlComplicColecistitis)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
        }
        if($Abdominales_Iatrog_Vias_Urinarias!=null){
            
            $sqlComplicIatrog="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Iatrog_Vias_Urinarias')";
                
                mysqli_query($conexion,$sqlComplicIatrog)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));         
        }
        
         if($Abdominales_Iatrog_Vias_Huecas!=null){
            
            $sqlComplicIatrogHuecas="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Iatrog_Vias_Huecas')";
                
                mysqli_query($conexion,$sqlComplicIatrogHuecas)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));         
        }

        if($Abdominales_Ileo_Paralitico_Prolongado!=null){
            
            $sqlComplicIleo="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Ileo_Paralitico_Prolongado')";
                
                mysqli_query($conexion,$sqlComplicIleo)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php")); 
            
        }
        if($Abdominales_Ileo_Mecanico!=null){
            
            $sqlComplicIleoMec="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Ileo_Mecanico')";
                
                mysqli_query($conexion,$sqlComplicIleoMec)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php")); 
            
        }

  		if($Abdominales_Estoma!=null){
            
            $sqlComplicEstoma="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Abdominales_Estoma')";
                
                mysqli_query($conexion,$sqlComplicEstoma)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php")); 
            
        }
        if ($Generales_Sepsis!=null){
        	
			$sqlComplicSepsis="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Generales_Sepsis')";
                
                mysqli_query($conexion,$sqlComplicSepsis)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        }
		if ($Generales_Shock!=null){
        	
			$sqlComplicShock="INSERT INTO tabla_abdominales (Id_Cirugia, Id_Tipo_Abdominales) VALUES ('$Id_Cirugia', '$Generales_Shock')";
                
                mysqli_query($conexion,$sqlComplicShock)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        }
        
    }
        
    
    if($Complic_Anastomosis==1){
        if($Anastomosis_Hemorragia!=null){
            
            $sqlComplicAnastoHemorragia="INSERT INTO tabla_anastomosis_complicaciones (Id_Cirugia, Id_Tipo_Anastomosis_Complicaciones) VALUES ('$Id_Cirugia', '$Anastomosis_Hemorragia')";
                
                mysqli_query($conexion,$sqlComplicAnastoHemorragia)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
        }
        if($Anastomosis_Fuga!=null){
            
            $sqlComplicAnastoFuga="INSERT INTO tabla_anastomosis_complicaciones (Id_Cirugia, Id_Tipo_Anastomosis_Complicaciones) VALUES ('$Id_Cirugia', '$Anastomosis_Fuga')";
                
                mysqli_query($conexion,$sqlComplicAnastoFuga)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
        }
		
		if($Anastomosis_Fistula!=null){
            
            $sqlComplicAnastoFistula="INSERT INTO tabla_anastomosis_complicaciones (Id_Cirugia, Id_Tipo_Anastomosis_Complicaciones) VALUES ('$Id_Cirugia', '$Anastomosis_Fistula')";
                
                mysqli_query($conexion,$sqlComplicAnastoFistula)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
        }
    }   
        
        
        
            if($Complic_Otras==1){
                if($Otras_Hemo_Diges!=null){
                    
                    $sqlComplicOtrasHemo="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Hemo_Diges')";
                
                mysqli_query($conexion,$sqlComplicOtrasHemo)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
                if($Otras_Infeccion_Urinaria!=null){
                    
                    $sqlComplicInfeccUrinaria="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Infeccion_Urinaria')";
                
                mysqli_query($conexion,$sqlComplicInfeccUrinaria)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
				 if($Otras_Urologicas!=null){
                    
                    $sqlComplicUrologicas="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Urologicas')";
                
                mysqli_query($conexion,$sqlComplicUrologicas)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
				if($Otras_Respiratoria!=null){
                    
                        $sqlComplicRespiratoria="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Respiratoria')";
                
                mysqli_query($conexion,$sqlComplicRespiratoria)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
				if($Otras_Respiratoria_Infecc!=null){
                    
                        $sqlComplicRespiratoriaInfecc="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Respiratoria_Infecc')";
                
                mysqli_query($conexion,$sqlComplicRespiratoriaInfecc)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
				if($Otras_Hepatica!=null ){
                    
                    $sqlComplicHepatica="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Hepatica')";
                
                mysqli_query($conexion,$sqlComplicHepatica)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
				if($Otras_Vascular_Mec!=null ){
                    
                    $sqlComplicVascularMec="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Vascular_Mec')";
                
                mysqli_query($conexion,$sqlComplicVascularMec)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
				if($Otras_Vascular_Infecc!=null ){
                    
                    $sqlComplicVascularInfecc="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Vascular_Infecc')";
                
                mysqli_query($conexion,$sqlComplicVascularInfecc)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }

                if($Otras_FMO!=null ){
                    
                    $sqlComplicFMO="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_FMO')";
                
                mysqli_query($conexion,$sqlComplicFMO)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
                if($Otras_TEP!=null){
                    
                    $sqlComplicTEP="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_TEP')";
                
                mysqli_query($conexion,$sqlComplicTEP)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                    
                }
                if($Otras_Neuroapraxia!=null){
                    
                    $sqlComplicNeuroApraxia="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Neuroapraxia')";
                
                mysqli_query($conexion,$sqlComplicNeuroApraxia)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
				if($Otras_Renal!=null){
                    
                    $sqlComplicRenal="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Renal')";
                
                mysqli_query($conexion,$sqlComplicRenal)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }												
				  if($Otras_Cardiovascular!=null){
                    
                        $sqlComplicCardiovascular="INSERT INTO tabla_otras_complicaciones (Id_Cirugia, Id_Tipo_Otras_Complicaciones) VALUES ('$Id_Cirugia', '$Otras_Cardiovascular')";
                
                mysqli_query($conexion,$sqlComplicCardiovascular)
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                    
                }
            } //CIERRE OTRAS COMPLICACIONES       
}//CIERRE DEL IF DE OPERADO == SI


/***********************************************************************************
 * 
 * ANATOMIA PATOLOGICA
 * 
 * Se introducen los datos de la hoja de patologica.
 * 
 * En primer lugar se recogen las variables de patologica pasadas por sesión.
 * 
 * Después se introducen los datos pasados por la base de datos
 * 
 * *********************************************************************************/

//VARIABLES DE SESION DE LA HOJA DE PATOLOGICA

  
 /***********************************************************************************
 * 
 * POSIBILIDAD DE RELLENAR PATOLOGICA MÁS ADELANTE
 * 
 * Si se ha pulsado el checkbox de rellenar más adelante, no entra en patológica y no
  * rellena nada
 * 
 * *********************************************************************************/

if($NoPatologica!=1){ //No hay patologica por las características del paciente
if($RellenarPatologica!=1) //Se ha rellenado la hoja de anatomia patológica
{    
  $sqlPatologicaSi="INSERT INTO tabla_patologica (Id_Paciente, Estado) VALUES ('$Id_Paciente', 1)";
    mysqli_query($conexion,$sqlPatologicaSi)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
   
   
   //Se asignan valores para cuando la exeresis de mesorrecto no se ha realizado
   if ($Exeresis_Meso==3){
    $Margen_Circunferencial=3;
    $Margen_Distal=3;
    $Calidad_Mesorrecto=4;
   }
   
   
   
   /*
    * Tanto para N como para M, hacemos un switch para coger los valores de ID de sus respectivas tablas
    * No coindice lo que hay en el textBox con la base de datos
    */
    switch ($N_Patologico) {
        case 'X':
            $N_Patologico = 1;
            break;
        case '0':
            $N_Patologico = 2;
            break;
        case '1':
            $N_Patologico = 3;
            break;
        case '2':
            $N_Patologico = 4;
            break;
        default:
            $N_Patologico = null;
            break;
    }
    
    $_SESSION["N_Patologico"]=$N_Patologico;
    
    switch ($M_Patologico) {
        case 'X':
            $M_Patologico = 1;
            break;
        case '1':
            $M_Patologico = 2;
            break;
        case '0':
            $M_Patologico = 3;
            break;
        default:
            $M_Patologico = null;
            break;
    }
    
    $_SESSION["M_Patologico"]=$M_Patologico;
    
    //INTRODUCCION DE DATOS EN LA BASE
    
    if ($Tipo_Histologico == 7) //Si en tipo histologico han elegido el campo otros
    {
        
         //Miramos si han elegido del autocomplete alguna opción
        $sqlOtrosTipoHistologico="SELECT COUNT(*) FROM tabla_tipo_otros_histologico WHERE Tipo='$Otros_Histologico'";
        
        $row=mysqli_fetch_array(mysqli_query($conexion,$sqlOtrosTipoHistologico))
         or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        
        if($row[0]==0){
            
            $sqlNuevoTipoHistologico="INSERT INTO tabla_tipo_otros_histologico (Tipo) VALUES('$Otros_Histologico')";
    
                mysqli_query($conexion,$sqlNuevoTipoHistologico)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            $sqlIDTipoHistologico="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoHistologico))
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

                $Otros_Histologico=$row[0];
        }else{
            
            $sqlOtrosHistologico="SELECT ID FROM tabla_tipo_otros_histologico WHERE Tipo='$Otros_Histologico'";
                
                    $row=mysqli_fetch_array(mysqli_query($conexion,$sqlOtrosHistologico))
                    or die  (header("Location: EliminaPaciente/elimina_paciente.php"));
                
                $Otros_Histologico=$row[0];

            
        }

        $Otros_Histologico=intval($Otros_Histologico);

    }
    else {
         /*
          * Si han elegido un tipo histologico distinto a otros, Otros_Histologico lo dejaremos a null
          * ya que han podido dejar algun nombre escrito en el TextBox
          */
        $Otros_Histologico = null;
    }
 

        /*
         * Se introducen los datos en la tabla anatomia_patologica
         * 
         * Se hacen los if porque el valor null de una variable no deja meterla directamente en la base de datos.
         * 
         */
  
    if ($Estadio_Tumor_Sincronico != null)
    {
        if ($Otros_Histologico != null)
        {
            $sqlPatologica = "INSERT INTO anatomia_patologica (Id_Paciente, Id_Histologico, Id_Otros_Histologico, Id_T, Id_N, Id_M, Glangios_Ais, Glangios_Afec, Id_Estadio_Patologico, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal, Id_Estadio_Sincronico)
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  '$Otros_Histologico', '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion','$Calidad_Mesorrecto', '$Estadio_Tumor_Sincronico')";
            mysqli_query($conexion,$sqlPatologica)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        }
        else {
            $sqlPatologica = "INSERT INTO anatomia_patologica (Id_Paciente, Id_Histologico, Id_Otros_Histologico, Id_T, Id_N, Id_M, Glangios_Ais, Glangios_Afec, Id_Estadio_Patologico, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal, Id_Estadio_Sincronico)
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  null, '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion','$Calidad_Mesorrecto', '$Estadio_Tumor_Sincronico')";
        
            mysqli_query($conexion,$sqlPatologica)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        }
        
    }else{
        if ($Otros_Histologico != null)
        {
        	echo "<br>";
        	echo ("Id_Paciente".$Id_Paciente);
			echo "<br>";
        	echo ("Tipo_Histologico".$Tipo_Histologico);
			echo "<br>";
        	echo ("Otros_Histologico".$Otros_Histologico);
        	echo "<br>";
        	echo ("T_Patologico".$T_Patologico);
        	echo "<br>";
        	echo ("N_Patologico".$N_Patologico);
        	echo "<br>";
        	echo ("M_Patologico".$M_Patologico);
        	echo "<br>";
        	echo ("Ganglios_Aislados".$Ganglios_Aislados);
			echo "<br>";
        	echo ("Ganglios_Afectados".$Ganglios_Afectados);
			echo "<br>";
        	echo ("Estadio_Patologico".$Estadio_Patologico);
        	echo "<br>";
        	echo ("Margen_Distal".$Margen_Distal);
			echo "<br>";
        	echo ("Margen_Circunferencial".$Margen_Circunferencial);
			echo "<br>";
        	echo ("Tipo_Reseccion".$Tipo_Reseccion);
			echo "<br>";
        	echo ("Tipo_Regresion".$Tipo_Regresion);
			echo "<br>";
        	echo ("Calidad_Mesorrecto".$Calidad_Mesorrecto);
			echo "<br>";
            $sqlPatologica = "INSERT INTO anatomia_patologica (Id_Paciente, Id_Histologico, Id_Otros_Histologico, Id_T, Id_N, Id_M, Glangios_Ais, Glangios_Afec, Id_Estadio_Patologico, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal, Id_Estadio_Sincronico)
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  '$Otros_Histologico', '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion','$Calidad_Mesorrecto', null)";
        
            mysqli_query($conexion,$sqlPatologica)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        }
        else{
            $sqlPatologica = "INSERT INTO anatomia_patologica (Id_Paciente, Id_Histologico, Id_Otros_Histologico, Id_T, Id_N, Id_M, Glangios_Ais, Glangios_Afec, Id_Estadio_Patologico, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Tipo_Res, Id_Regresion, Id_Meso_Cal, Id_Estadio_Sincronico)
                      VALUES ('$Id_Paciente', '$Tipo_Histologico',  null, '$T_Patologico', '$N_Patologico', '$M_Patologico', '$Ganglios_Aislados', '$Ganglios_Afectados', '$Estadio_Patologico', '$Margen_Distal', '$Margen_Circunferencial', '$Tipo_Reseccion',  '$Tipo_Regresion','$Calidad_Mesorrecto', null)";
        
        
            mysqli_query($conexion,$sqlPatologica)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
        }
        
    }
    }else {
        $sqlPatologicaPendiente="INSERT INTO tabla_patologica (Id_Paciente, Estado) VALUES ('$Id_Paciente', 3)";

    mysqli_query($conexion,$sqlPatologicaPendiente)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    }

 }else{
    $sqlNoPatologica="INSERT INTO tabla_patologica (Id_Paciente, Estado) VALUES ('$Id_Paciente', 2)";

    mysqli_query($conexion,$sqlNoPatologica)
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
 } 


//PASO POR SESION DE LOS DATOS DE LA PÁGINA DE SEGUIMIENTO

 
    

 // Se introducen los datos en la tabla seguimiento
 $sqlSeguimiento= "INSERT INTO seguimiento (Id_Paciente, Fecha_Revision, B_Recidiva, B_Metastasis, B_Segundo_Tumor, B_Estado, B_Imposibilidad, Comentarios_Adicionales)
                      VALUES ('$Id_Paciente', '$Fecha_Revision',  '$Recidiva', '$Metastasis', '$Segundo_Tumor', '$Estado', '$Imposibilidad', '$Comentarios_Adicionales')";
        
 mysqli_query($conexion,$sqlSeguimiento)
        or die(header("Location: EliminaPaciente/elimina_paciente.php"));
  
  $Seguimiento="SELECT LAST_INSERT_ID()";
  $row=mysqli_fetch_array(mysqli_query($conexion,$Seguimiento))
            or die(header("Location: EliminaPaciente/elimina_paciente.php"));
   $IdSeguimiento=$row[0];
   $IdSeguimiento=intval($IdSeguimiento);
  
  if ($Recidiva == 1)
  {
      
       //En localización miramos si han elegido del autocomplete alguna opción
       $sqlLocalizacion="SELECT COUNT(*) FROM tabla_seg_localiz_recidiva WHERE Tipo='$Localizacion_Recidiva'";
      
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die(header("Location: EliminaPaciente/elimina_paciente.php").'2835');
       
       if($row[0]==0){
            
            $sqlNuevaLocalizRecidiva="INSERT INTO tabla_seg_localiz_recidiva (Tipo) VALUES('$Localizacion_Recidiva')";
    
                mysqli_query($conexion,$sqlNuevaLocalizRecidiva)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            $sqlIDTipoRecidiva="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoRecidiva))
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

                $LocalizacionRecidiva=$row[0];

       }else{
               $sqlIDTipoRecidiva="SELECT ID FROM tabla_seg_localiz_recidiva WHERE Tipo='$Localizacion_Recidiva'";
      
             $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoRecidiva))
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
            $LocalizacionRecidiva=$row[0];  
       }
   
      $sqlRecidiva= "INSERT INTO tabla_recidiva (Id_Seguimiento, Fecha_Recidiva, Intervencion, Id_tabla_seg_localiz_recidiva)
                      VALUES ('$IdSeguimiento', '$Fecha_Recidiva',  '$Intervencion_Recidiva', '$LocalizacionRecidiva')";
        
      mysqli_query($conexion,$sqlRecidiva)
      or die(header("Location: EliminaPaciente/elimina_paciente.php"));
  }


if ($Metastasis == 1){
	
       $sqlLocalizacion="SELECT COUNT(*) FROM tabla_seg_localiz_metastasis WHERE Tipo='$Localizacion_Metastasis'";
      
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die(header("Location: EliminaPaciente/elimina_paciente.php"));
       
       if($row[0]==0){
            
            $sqlNuevaLocalizMetastasis="INSERT INTO tabla_seg_localiz_metastasis (Tipo) VALUES('$Localizacion_Metastasis')";
    
                mysqli_query($conexion,$sqlNuevaLocalizMetastasis)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            $sqlIDTipoMetastasis="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoMetastasis))
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

                $LocalizacionMetastasis=$row[0];

       }else{
             $sqlIDTipoMetastasis="SELECT ID FROM tabla_seg_localiz_metastasis WHERE Tipo='$Localizacion_Metastasis'";
      
             $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoMetastasis))
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
            $LocalizacionMetastasis=$row[0];    
       }
    
      $sqlMetastasis= "INSERT INTO tabla_metastasis (Id_Seguimiento, Fecha_Metastasis, Intervencion, Id_tabla_seg_localiz_metastasis)
                      VALUES ('$IdSeguimiento', '$Fecha_Metastasis',  '$Intervencion_Metastasis', '$LocalizacionMetastasis')";
        
      mysqli_query($conexion,$sqlMetastasis)
      or die(header("Location: EliminaPaciente/elimina_paciente.php"));
  }




  
if ($Segundo_Tumor == 1)
  {
  		
     $sqlLocalizacion="SELECT COUNT(*) FROM tabla_seg_localiz_segundo_tumor WHERE Tipo='$Localizacion_Segundo_Tumor'";
      
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die(header("Location: EliminaPaciente/elimina_paciente.php"));
       
       if($row[0]==0){
            
            $sqlNuevaLocalizSegundoTumor="INSERT INTO tabla_seg_localiz_segundo_tumor (Tipo) VALUES('$Localizacion_Segundo_Tumor')";
    
                mysqli_query($conexion,$sqlNuevaLocalizSegundoTumor)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            $sqlIDTipoSegundoTumor="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoSegundoTumor))
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

                $LocalizacionSegundoTumor=$row[0];

       }else{
             $sqlIDTipoSegundoTumor="SELECT ID FROM tabla_seg_localiz_segundo_tumor WHERE Tipo='$Localizacion_Segundo_Tumor'";
      
             $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoSegundoTumor))
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
            $LocalizacionSegundoTumor=$row[0];  
       }
    
      
      $sqlSegundoTumor= "INSERT INTO tabla_segundo_tumor (Id_Seguimiento, Fecha_Segundo_Tumor, Intervencion, Id_tabla_seg_localiz_segundo_tumor)
                      VALUES ('$IdSeguimiento', '$Fecha_Segundo_Tumor',  '$Intervencion_Segundo_Tumor', '$LocalizacionSegundoTumor')";
        
      mysqli_query($conexion,$sqlSegundoTumor)
      or die(header("Location: EliminaPaciente/elimina_paciente.php"));
  }
      
if ($Estado == 2)//Cuando es muerto
  {
      
       //En localización miramos si han elegido del autocomplete alguna opción

      
      $sqlEstado= "INSERT INTO tabla_estado (Id_Seguimiento, Fecha_Muerte, Relacion_Muerte)
                      VALUES ('$IdSeguimiento', '$Fecha_Muerte',  '$Causa_Muerte')";
        
      mysqli_query($conexion,$sqlEstado)
      or die(header("Location: EliminaPaciente/elimina_paciente.php"));
  }  

if ($Imposibilidad == 1) 
  {
   
   		$CausaImp=utf8_encode($Causa_Imposibilidad);  
      $sqlLocalizacion="SELECT COUNT(*) FROM tabla_seg_imposibilidad WHERE Causa='$Causa_Imposibilidad'";
      
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die(header("Location: EliminaPaciente/elimina_paciente.php"));
       
       if($row[0]==0){
            
            $sqlNuevaLocalizImposibilidad="INSERT INTO tabla_seg_imposibilidad (Causa) VALUES('$Causa_Imposibilidad')";
    
                mysqli_query($conexion,$sqlNuevaLocalizImposibilidad)
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
                
            $sqlIDTipoImposibilidad="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoImposibilidad))
                    or die(header("Location: EliminaPaciente/elimina_paciente.php"));

                $Causa=$row[0];

       }else{
             $sqlIDTipoImposibilidad="SELECT ID FROM tabla_seg_imposibilidad WHERE Causa='$Causa_Imposibilidad'";
      
             $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoImposibilidad))
                or die(header("Location: EliminaPaciente/elimina_paciente.php"));
            
            $Causa=$row[0]; 
       }

      
      $sqlImposibilidad= "INSERT INTO tabla_imposibilidad (Id_Seguimiento, Id_tabla_seg_imposibilidad)
                      VALUES ('$IdSeguimiento', '$Causa')";
        
      mysqli_query($conexion,$sqlImposibilidad)
      or die(header("Location: EliminaPaciente/elimina_paciente.php"));
  }
  

/*****************************************************************************************
 *
 * La siguiente instrucción recoge el valor del último ID añadido a la base de datos.
 * Ese ID será el que se utilice como común en las diferentes páginas de introducción de datos
 * (que a su vez tendrán ID particulares) 
 * 
 * La variable que almacena el ID es $Id_Paciente
 * 
 ******************************************************************************************/
 
 //Introduccion en tabla_estadistica del nuevo paciente
 
 
if($ExistePaciente==0){ 

$sqlidentificador_paciente="SELECT Id_Hospital, Id_Sexo, Fecha_Nacimiento FROM identificador_paciente WHERE ID=$Id_Paciente";

$residentificador_paciente=mysqli_query($conexion,$sqlidentificador_paciente) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$rowidentificador_paciente=mysqli_fetch_array($residentificador_paciente);



//Variables a introducir en tabla_estadistica que vienen de indentificador_paciente
$Id_Hospital=intval($rowidentificador_paciente[0]);
$Sexo=intval($rowidentificador_paciente[1]);
$FechaNacimiento=$rowidentificador_paciente[2];     


//Valores de cirugia
$sqlCirugia="SELECT ID, B_Cirugia FROM cirugia WHERE Id_Paciente=$Id_Paciente";

$resCirugia=mysqli_query($conexion,$sqlCirugia) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$rowCirugia=mysqli_fetch_array($resCirugia);

$Id_Cirugia=intval($rowCirugia[0]);
$B_Cirugia=intval($rowCirugia[1]);

if ($B_Cirugia==1){
    $sqltablacirugia="SELECT Fecha_Intervencion, Id_Tecnica FROM tabla_cirugia WHERE Id_Cirugia=$Id_Cirugia";
    
    $restablacirugia=mysqli_query($conexion,$sqltablacirugia) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowTablaCirugia=mysqli_fetch_array($restablacirugia);
    
    $FechaCirugia=$rowTablaCirugia[0];
    $TecCirugia=intval($rowTablaCirugia[1]);
    
    $sqlCaracCirugia="SELECT Perforacion_Tumoral FROM tabla_caracteristicas_cirugia WHERE Id_Cirugia=$Id_Cirugia";
    
    $resCaraccirugia=mysqli_query($conexion,$sqlCaracCirugia) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowCaracCirugia=mysqli_fetch_array($resCaraccirugia);
    
    $Perforacion=intval($rowCaracCirugia[0]);   
    
}else{
    $FechaCirugia=null;
    $TecCirugia=null;
    $Perforacion=null;  
}


$sqlExistePatologica="SELECT Estado FROM tabla_patologica WHERE Id_Paciente=$Id_Paciente";

    $resExistePatologica=mysqli_query($conexion,$sqlExistePatologica) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowExistePatologica=mysqli_fetch_array($resExistePatologica);
    
    $ExistePatologica=intval($rowExistePatologica[0]);
    

if($ExistePatologica==1){
    $sqlPatologica="SELECT Id_Estadio_Patologico, Id_Tipo_Res, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Meso_Cal FROM anatomia_patologica WHERE Id_Paciente=$Id_Paciente";
    
    $resPatologica=mysqli_query($conexion,$sqlPatologica) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowPatologica=mysqli_fetch_array($resPatologica);
    
    $CampoEstadio=intval($rowPatologica[0]);
    $TipoRes=intval($rowPatologica[1]);
    $MargenDistal=intval($rowPatologica[2]);
    $MargenCircunferencial=intval($rowPatologica[3]);
    $MesoCal=intval($rowPatologica[4]);
        
}else{
    
    $CampoEstadio=null;
    $TipoRes=null;
    $MargenDistal=null;
    $MargenCircunferencial=null;
    $MesoCal=null;
    
}   

$sqlLocalizacion="SELECT Localizacion FROM inicial WHERE Id_Paciente=$Id_Paciente";

$resLocalizacion=mysqli_query($conexion,$sqlLocalizacion) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowLocalizacion=mysqli_fetch_array($resLocalizacion);
    
    $Localizacion=intval($rowLocalizacion[0]);
    

$sqlTTONeo="SELECT B_Tto_Neo FROM tratamiento WHERE Id_Paciente=$Id_Paciente";

$resTTONeo=mysqli_query($conexion,$sqlTTONeo) or die (header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowTTONeo=mysqli_fetch_array($resTTONeo);
    
    $TTONeo=intval($rowTTONeo[0]);  



$sqlSeguimiento="SELECT ID, Fecha_Revision, B_Recidiva, B_Metastasis, B_Estado FROM seguimiento WHERE Id_Paciente=$Id_Paciente";

$resSeguimiento=mysqli_query($conexion,$sqlSeguimiento) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowSeguimiento=mysqli_fetch_array($resSeguimiento);
    
    $Id_Seguimiento=intval($rowSeguimiento[0]);
    $FechaRevision=$rowSeguimiento[1];
    $Recidiva=intval($rowSeguimiento[2]);
    $Metastasis=intval($rowSeguimiento[3]);
    $Vivo=intval($rowSeguimiento[4]);
    

if($Recidiva==1){
    $sqlFechaRecidiva="SELECT Fecha_Recidiva FROM tabla_recidiva WHERE Id_Seguimiento=$Id_Seguimiento";
    
    $resRecidiva=mysqli_query($conexion,$sqlFechaRecidiva) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowRecidiva=mysqli_fetch_array($resRecidiva);
    
    $FechaRecidiva=$rowRecidiva[0];
}else{
    $FechaRecidiva=$FechaRevision;
}


if($Metastasis==1){
    $sqlFechaMetastasis="SELECT Fecha_Metastasis FROM tabla_metastasis WHERE Id_Seguimiento=$Id_Seguimiento";
    
    $resMetastasis=mysqli_query($conexion,$sqlFechaMetastasis)or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowMetastasis=mysqli_fetch_array($resMetastasis);
    
    $FechaMetastasis=$rowMetastasis[0];
}else{
    $FechaMetastasis=$FechaRevision;
}   
    

if($Vivo==2){
    $sqlFechaMuerte="SELECT Fecha_Muerte FROM tabla_estado WHERE Id_Seguimiento=$Id_Seguimiento";
    
    $resMuerte=mysqli_query($conexion,$sqlFechaMuerte) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowMuerte=mysqli_fetch_array($resMuerte);
        $FechaMuerte=$rowMuerte[0];
}else{
    $FechaMuerte=null;
}   


$sqlRellenaTabla="INSERT INTO tabla_estadistica (HOSPITAL, ID, FEC_NAC, SEXO, CIRUGIA, FEC_CIR, CampoEstadio, TIPO_RES, TEC_CIR, 
                    C_RECIDIVA, Fecha_Recidiva, METAS, FechaMetastasis, VIVO, Fechafallecimiento, LOCALIZ, PERFORA, M_CIRCUN,
                     M_DISTAL, TTO_NEO, FEC_REV, MESO_CAL) VALUES (
                    '$Id_Hospital','$Id_Paciente','$FechaNacimiento','$Sexo','$B_Cirugia','$FechaCirugia','$CampoEstadio','$TipoRes'
                    ,'$TecCirugia','$Recidiva','$FechaRecidiva','$Metastasis','$FechaMetastasis','$Vivo','$FechaMuerte','$Localizacion',
                    '$Perforacion','$MargenCircunferencial','$MargenDistal','$TTONeo','$FechaRevision','$MesoCal')";





mysqli_query($conexion,$sqlRellenaTabla)  or die(header("Location: EliminaPaciente/elimina_paciente.php"));

}else{
    /*
    $sqlBorraPacienteEstadistica="DELETE FROM tabla_estadistica WHERE ID='$Id_Paciente'";
    
    mysqli_query($conexion,$sqlBorraPacienteEstadistica)  or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    */
    
    $sqlidentificador_paciente="SELECT Id_Hospital, Id_Sexo, Fecha_Nacimiento FROM identificador_paciente WHERE ID=$Id_Paciente";

$residentificador_paciente=mysqli_query($conexion,$sqlidentificador_paciente) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$rowidentificador_paciente=mysqli_fetch_array($residentificador_paciente);



//Variables a introducir en tabla_estadistica que vienen de indentificador_paciente
$Id_Hospital=intval($rowidentificador_paciente[0]);
$Sexo=intval($rowidentificador_paciente[1]);
$FechaNacimiento=$rowidentificador_paciente[2];     


//Valores de cirugia
$sqlCirugia="SELECT ID, B_Cirugia FROM cirugia WHERE Id_Paciente=$Id_Paciente";

$resCirugia=mysqli_query($conexion,$sqlCirugia)or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$rowCirugia=mysqli_fetch_array($resCirugia);

$Id_Cirugia=intval($rowCirugia[0]);
$B_Cirugia=intval($rowCirugia[1]);

if ($B_Cirugia==1){
    $sqltablacirugia="SELECT Fecha_Intervencion, Id_Tecnica FROM tabla_cirugia WHERE Id_Cirugia=$Id_Cirugia";
    
    $restablacirugia=mysqli_query($conexion,$sqltablacirugia) or die (header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowTablaCirugia=mysqli_fetch_array($restablacirugia);
    
    $FechaCirugia=$rowTablaCirugia[0];
    $TecCirugia=intval($rowTablaCirugia[1]);
    
    $sqlCaracCirugia="SELECT Perforacion_Tumoral FROM tabla_caracteristicas_cirugia WHERE Id_Cirugia=$Id_Cirugia";
    
    $resCaraccirugia=mysqli_query($conexion,$sqlCaracCirugia)or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowCaracCirugia=mysqli_fetch_array($resCaraccirugia);
    
    $Perforacion=intval($rowCaracCirugia[0]);   
    
}else{
    $FechaCirugia=NULL;
    $TecCirugia=NULL;
    $Perforacion=NULL;  
}


$sqlExistePatologica="SELECT Estado FROM tabla_patologica WHERE Id_Paciente=$Id_Paciente";

    $resExistePatologica=mysqli_query($conexion,$sqlExistePatologica) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowExistePatologica=mysqli_fetch_array($resExistePatologica);
    
    $ExistePatologica=intval($rowExistePatologica[0]);
    

if($ExistePatologica==1){
    $sqlPatologica="SELECT Id_Estadio_Patologico, Id_Tipo_Res, Id_Margen_Distal, Id_Margen_Circunferencial, Id_Meso_Cal FROM anatomia_patologica WHERE Id_Paciente=$Id_Paciente";
    
    $resPatologica=mysqli_query($conexion,$sqlPatologica) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowPatologica=mysqli_fetch_array($resPatologica);
    
    $CampoEstadio=intval($rowPatologica[0]);
    $TipoRes=intval($rowPatologica[1]);
    $MargenDistal=intval($rowPatologica[2]);
    $MargenCircunferencial=intval($rowPatologica[3]);
    $MesoCal=intval($rowPatologica[4]);
        
}else{
    
    $CampoEstadio=NULL;
    $TipoRes=NULL;
    $MargenDistal=NULL;
    $MargenCircunferencial=NULL;
    $MesoCal=NULL;
    
}   

$sqlLocalizacion="SELECT Localizacion FROM inicial WHERE Id_Paciente=$Id_Paciente";

$resLocalizacion=mysqli_query($conexion,$sqlLocalizacion) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowLocalizacion=mysqli_fetch_array($resLocalizacion);
    
    $Localizacion=intval($rowLocalizacion[0]);
    

$sqlTTONeo="SELECT B_Tto_Neo FROM tratamiento WHERE Id_Paciente=$Id_Paciente";

$resTTONeo=mysqli_query($conexion,$sqlTTONeo) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowTTONeo=mysqli_fetch_array($resTTONeo);
    
    $TTONeo=intval($rowTTONeo[0]);  



$sqlSeguimiento="SELECT ID, Fecha_Revision, B_Recidiva, B_Metastasis, B_Estado FROM seguimiento WHERE Id_Paciente=$Id_Paciente";

$resSeguimiento=mysqli_query($conexion,$sqlSeguimiento) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowSeguimiento=mysqli_fetch_array($resSeguimiento);
    
    $Id_Seguimiento=intval($rowSeguimiento[0]);
    $FechaRevision=$rowSeguimiento[1];
    $Recidiva=intval($rowSeguimiento[2]);
    $Metastasis=intval($rowSeguimiento[3]);
    $Vivo=intval($rowSeguimiento[4]);
    

if($Recidiva==1){
    $sqlFechaRecidiva="SELECT Fecha_Recidiva FROM tabla_recidiva WHERE Id_Seguimiento=$Id_Seguimiento";
    
    $resRecidiva=mysqli_query($conexion,$sqlFechaRecidiva) or die (header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowRecidiva=mysqli_fetch_array($resRecidiva);
    
    $FechaRecidiva=$rowRecidiva[0];
}else{
    $FechaRecidiva=$FechaRevision;
}


if($Metastasis==1){
    $sqlFechaMetastasis="SELECT Fecha_Metastasis FROM tabla_metastasis WHERE Id_Seguimiento=$Id_Seguimiento";
    
    $resMetastasis=mysqli_query($conexion,$sqlFechaMetastasis) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

    $rowMetastasis=mysqli_fetch_array($resMetastasis);
    
    $FechaMetastasis=$rowMetastasis[0];
}else{
    $FechaMetastasis=$FechaRevision;
}   
    

if($Vivo==2){
    $sqlFechaMuerte="SELECT Fecha_Muerte FROM tabla_estado WHERE Id_Seguimiento=$Id_Seguimiento";
    
    $resMuerte=mysqli_query($conexion,$sqlFechaMuerte) or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    $rowMuerte=mysqli_fetch_array($resMuerte);
        $FechaMuerte=$rowMuerte[0];
}else{
    $FechaMuerte=null;
}   


$sqlRellenaTabla="INSERT INTO tabla_estadistica (HOSPITAL, ID, FEC_NAC, SEXO, CIRUGIA, FEC_CIR, CampoEstadio, TIPO_RES, TEC_CIR, 
                    C_RECIDIVA, Fecha_Recidiva, METAS, FechaMetastasis, VIVO, Fechafallecimiento, LOCALIZ, PERFORA, M_CIRCUN,
                     M_DISTAL, TTO_NEO, FEC_REV, MESO_CAL) VALUES (
                    '$Id_Hospital','$Id_Paciente','$FechaNacimiento','$Sexo','$B_Cirugia','$FechaCirugia','$CampoEstadio','$TipoRes'
                    ,'$TecCirugia','$Recidiva','$FechaRecidiva','$Metastasis','$FechaMetastasis','$Vivo','$FechaMuerte','$Localizacion',
                    '$Perforacion','$MargenCircunferencial','$MargenDistal','$TTONeo','$FechaRevision','$MesoCal')";





mysqli_query($conexion,$sqlRellenaTabla)  or die(header("Location: EliminaPaciente/elimina_paciente.php"));
  }   

/*
 * 
 * INTRODUCCION DE DATOS DE TABLA GENERAL
 *  
 */
   


$sqlidentificador_paciente="SELECT Id_Hospital, AES_DECRYPT(NHC,'$claveNHC') AS NHC, Id_Sexo, Fecha_Nacimiento, Fecha_Alta_Sistema FROM identificador_paciente WHERE ID=$Id_Paciente";

$residentificador_paciente=mysqli_query($conexion,$sqlidentificador_paciente) or die (header("Location: EliminaPaciente/elimina_paciente.php"));

$rowidentificador_paciente=mysqli_fetch_array($residentificador_paciente);


//Variables a introducir en tabla_estadistica que vienen de indentificador_paciente
$Id_Hospital=intval($rowidentificador_paciente[0]);
$NHC=$rowidentificador_paciente[1];
$Sexo=intval($rowidentificador_paciente[2]);
$FechaNacimiento=$rowidentificador_paciente[3];
$FechaAltaSistema=$rowidentificador_paciente[4];


/*
 * 
 * DATOS QUE SE OBTIENEN DEL INICIAL PARA LA TABLA COMPLETA
 * 
 */



$sqlInicial="SELECT * FROM inicial WHERE Id_Paciente='$Id_Paciente'";	

$resInicial=mysqli_query($conexion,$sqlInicial) or die (header("Location: EliminaPaciente/elimina_paciente.php"));

$rowInicial=mysqli_fetch_array($resInicial);	

//Variables a introducir de la tabla inicial

$IDInicial=$rowInicial[0];
$Localizacion=$rowInicial[2];
$Clasificacion_Rullier=$rowInicial[11];
$Sincro=$rowInicial[3];
$Invasion=$rowInicial[8];
$MetastasisInicial=$rowInicial[9];
$EstadioRadio=$rowInicial[10];

$TAC=$rowInicial[5];

$ECO=$rowInicial[4];
$RMN=$rowInicial[6];
$Integ_Esfinter=$rowInicial[7];


if($ECO==1){

	$sqlECO="SELECT * FROM tabla_eco WHERE Id_Inicial='$IDInicial'";	
	
	$resECO=mysqli_query($conexion,$sqlECO) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowECO=mysqli_fetch_array($resECO);
	
	$EcoT=$rowECO[1];
	$EcoN=$rowECO[2];
	
}else{
	
	$EcoT=null;
	$EcoN=null;	
		
}

if($RMN==1){

	$sqlRMN="SELECT * FROM tabla_rmn WHERE Id_Inicial='$IDInicial'";	
	
	$resRMN=mysqli_query($conexion,$sqlRMN) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowRMN=mysqli_fetch_array($resRMN);
	
	$RmnT=$rowRMN[1];
	$RmnN=$rowRMN[2];
	$RmnDist_Tumor=$rowRMN[3];
    $RmnDist_Adeno=$rowRMN[4];
	
}else{
	
	$RmnT=null;
	$RmnN=null;	
    $RmnDist_Tumor=null;    
    $RmnDist_Adeno=null;    
		
}


/*
 * 
 * DATOS QUE SE OBTIENEN DEL TRATAMIENTO PARA LA TABLA COMPLETA
 * 
 */

$sqlTratamiento="SELECT * FROM tratamiento WHERE Id_Paciente='$Id_Paciente'";

$ResTratamiento=mysqli_query($conexion, $sqlTratamiento) or die(header("Location: EliminaPaciente/elimina_paciente.php"));

$rowTratamiento=mysqli_fetch_array($ResTratamiento);

$IDTratamiento=$rowTratamiento[0];

$TtoNeo=$rowTratamiento[2];
$TtoAdy=$rowTratamiento[3];

if ($TtoNeo==1){
	
	$sqlTtoNeo="SELECT Id_Tipo_Neo FROM tabla_neo WHERE Id_Tratamiento='$IDTratamiento'";
	
	$ResTtoNeo=mysqli_query($conexion, $sqlTtoNeo) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowTtoNeo=mysqli_fetch_array($ResTtoNeo);
	
	$TipoNeo=$rowTtoNeo[0];
	
	$TipoNoNeo=null;
	
}else if ($TtoNeo==2){
	
	$sqlTtoNoNeo="SELECT Id_Tipo_No_Neo FROM tabla_no_neo WHERE Id_Tratamiento='$IDTratamiento'";
	
	$ResTtoNoNeo=mysqli_query($conexion, $sqlTtoNoNeo) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowTtoNoNeo=mysqli_fetch_array($ResTtoNoNeo);
	
	$TipoNoNeo=$rowTtoNoNeo[0];
	
	$TipoNeo=null;
	
}else{
	
	$TipoNoNeo=null;
	
	$TipoNeo=null;
	
}


if($TtoAdy==1){
	$sqlTipoAdy="SELECT Id_Tipo_Ady FROM tabla_ady WHERE Id_Tratamiento='$IDTratamiento'";
	
	$resTtoAdy=mysqli_query($conexion, $sqlTipoAdy) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowTipoAdy=mysqli_fetch_array($resTtoAdy);
	
	$TipoAdy=$rowTipoAdy[0];
}else{
	$TipoAdy=null;
}


/*
 * 
 * DATOS QUE SE OBTIENEN DEL CIRUGIA PARA LA TABLA COMPLETA
 * 
 */

 $sqlCirugia="SELECT * FROM cirugia WHERE Id_Paciente='$Id_Paciente'";
 
 $resCirugia=mysqli_query($conexion, $sqlCirugia) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
 
 $rowCirugia=mysqli_fetch_array($resCirugia);
 
 $IDCirugia=$rowCirugia[0];
 
 $cirugia=$rowCirugia[2];
 
 if ($cirugia==2){
 	
	$sqlNoCirugia="SELECT Id_Motivo FROM tabla_no_cirugia WHERE Id_Cirugia='$IDCirugia'";
	
	$resNoCirugia=mysqli_query($conexion, $sqlNoCirugia) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowNoCirugia= mysqli_fetch_array($resNoCirugia);
	
	$MotivoNoCirugia=$rowNoCirugia[0];
 		
 	$planificacion=null;
 	$FechaCirugia=null;
 	$FechaAlta=null;
    $CirujanoPrincipal=null;
    $CirujanoAyudante=null;
 	$TecnicaCirugia=null;
    $Anastomosis_coloanal=null;
	$OtraTecnica=null;
	$Orientacion=null;
	$ExeresisMeso=null;
	$OtrasResecciones=null;
	$ASA=null;
	$Hallazgos=null;
	$Perforacion=null;
	$MetastasisHepaticas=null;
	$ImplantesOvaricos=null;
    $Obstruccion=null;
	$ViaOperacion=null;
	$TiempoOPeracion=null;
	$Transfu=null;
	$IntencionOperacion=null;
	$Anastomosis=null;
	$Reservorio=null;
	$Estoma=null;
	$TipoEstoma=null;
	
 	$Complicaciones=null;
 	$Reintervencion=null;
	$ReintTexto=null;
	$ExitusIntra=null;
	$ExitusIntraTexto=null;
	$ExitusPost=null;
	$ExitusPostTexto=null;
	$GeneralSepsis=null;//Nuevo
	$GeneralShock=null;//Nuevo
	$HHemo=null;
	$HInfec=null;
	$HEvis=null;
	$HEventra=null;//Nuevo
	$PInfec=null; 	
 	$PCicat=null;
	$PHernia=null;//Nuevo
	$AHemop=null;
	$APerit=null;
	$AAbsce=null;//Abdominal
	//$AHemoAbdo=null;//Nuevo
	$AAbscePelvica=null;
	$AHemoPelvica=null;//Nuevo
	$AIsque=null;
	$AColec=null;
	$AIatro=null;
	$AIatroHuecas=null;//Nuevo
	$AIleopa=null;
	$IleoMec=null;
	$AEstoma=null;//Nuevo
	$AnHemo=null;
	$AnFuga=null;
	$AnFistula=null;
	$OHemo=null;
	$OInfur=null;
	$OUrologicas=null;
	$ORespi=null;
	$ORespiInfecc=null;//Nuevo
	$OHepat=null;
	$OVascularMec=null;
	$OVascularInfecc=null;
	$OFMO=null;
	$OTEP=null;
	$ONeuro=null;
	$ORenal=null;
	$OCarcio=null;
	

 }else if ($cirugia==1){
 	
	$MotivoNoCirugia=null;
 	
	$sqlTablaCirugia="SELECT * FROM tabla_cirugia WHERE Id_Cirugia='$IDCirugia'";
	
	$resTablaCirugia=mysqli_query($conexion, $sqlTablaCirugia) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowTablaCirugia=mysqli_fetch_array($resTablaCirugia);
	
	$planificacion=$rowTablaCirugia[1];
 	$FechaCirugia=$rowTablaCirugia[2];
 	$FechaAlta=$rowTablaCirugia[3];
    $CirujanoPrincipal=$rowTablaCirugia[4];
    $CirujanoAyudante=$rowTablaCirugia[5];
 	$TecnicaCirugia=$rowTablaCirugia[6];
    $Anastomosis_coloanal=$rowTablaCirugia[11];
	$ExeresisMeso=intval($rowTablaCirugia[8]);
    $OtrasResecciones=$rowTablaCirugia[9];
	$Orientacion=$rowTablaCirugia[10];
    $sqlOtraTecnica="SELECT tabla_otras_tecnicas.Id_Tipo_Otras_Tecnicas AS ID 
                             FROM tabla_otras_tecnicas 
                             WHERE Id_Cirugia = '$IDCirugia'";
    $rs=mysqli_query($conexion,$sqlOtraTecnica)
      or die(header("Location: EliminaPaciente/elimina_paciente.php"));
      
    $numResults = mysqli_num_rows($rs);
    $counter = 0;  
    
    while($rowOtrasCirugia = mysqli_fetch_array($rs))
    {
         if (++$counter == $numResults) // last row
         {
           $OtraTecnica = $OtraTecnica . $rowOtrasCirugia['ID'] . ".";
         } 
         else // not last row
         {
            $OtraTecnica = $OtraTecnica . $rowOtrasCirugia['ID'] . ", ";
         }          
   }

	
	
	$sqlTablaCaracteristicasCirugia="SELECT * FROM tabla_caracteristicas_cirugia WHERE Id_Cirugia='$IDCirugia'";
	
	$resTablaCaracteristicasCirugia=mysqli_query($conexion, $sqlTablaCaracteristicasCirugia) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowTablaCaracteristicasCirugia=mysqli_fetch_array($resTablaCaracteristicasCirugia);
	
	$ASA=$rowTablaCaracteristicasCirugia[1];
	$Hallazgos=$rowTablaCaracteristicasCirugia[2];
	$Perforacion=$rowTablaCaracteristicasCirugia[4];
	$MetastasisHepaticas=$rowTablaCaracteristicasCirugia[5];
	$ImplantesOvaricos=$rowTablaCaracteristicasCirugia[6];
    $Obstruccion=$rowTablaCaracteristicasCirugia[7];
	$ViaOperacion=$rowTablaCaracteristicasCirugia[8];
	$TiempoOPeracion=$rowTablaCaracteristicasCirugia[9];
	$Transfu=$rowTablaCaracteristicasCirugia[10];
	$IntencionOperacion=$rowTablaCaracteristicasCirugia[11];
	$Anastomosis=$rowTablaCaracteristicasCirugia[12];
	$Reservorio=$rowTablaCaracteristicasCirugia[13];
	$Estoma=$rowTablaCaracteristicasCirugia[14];
	
	if($Estoma==1){
		
		$sqlTablaEstoma="SELECT Id_Tipo_Estoma FROM tabla_estoma WHERE Id_Cirugia='$IDCirugia'";
		
		$resTablaEstoma=mysqli_query($conexion, $sqlTablaEstoma) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
		
		$rowTablaEstoma=mysqli_fetch_array($resTablaEstoma);
		
		$TipoEstoma=$rowTablaEstoma[0];
		
	}else{
	$TipoEstoma=null;
	}
	
	$sqlTablaComplicaciones="SELECT B_Complicaciones FROM tabla_complicaciones WHERE Id_Cirugia='$IDCirugia'";
	
	$resTablaComplicaciones=mysqli_query($conexion, $sqlTablaComplicaciones) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowTablaComplicaciones=mysqli_fetch_array($resTablaComplicaciones);
	
	$Complicaciones=$rowTablaComplicaciones[0];
	
	
	if ($Complicaciones==1){
		
		$sqlTablaTipoComplicaciones="SELECT * FROM tabla_tipo_complicaciones WHERE Id_Cirugia='$IDCirugia'";
		
		$resTablaTipoComplicaciones=mysqli_query($conexion, $sqlTablaTipoComplicaciones) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
		
		$rowTablaTipoComplicaciones=mysqli_fetch_array($resTablaTipoComplicaciones);
		
		$B_Reintervencion=$rowTablaTipoComplicaciones[1];
		
		$B_ExitusIntraoperatorio=$rowTablaTipoComplicaciones[2];
		
		$B_ExitusPostOperatorio=$rowTablaTipoComplicaciones[3];
		
		//Sepsis y Shock
		//$GeneralSepsis=$rowTablaTipoComplicaciones[4];
		
		//$GeneralShock=$rowTablaTipoComplicaciones[5];
		
		$B_Herida=$rowTablaTipoComplicaciones[4];
		
		$B_Perine=$rowTablaTipoComplicaciones[5];
		
		$B_Abdominales=$rowTablaTipoComplicaciones[6];
		
		$B_Anastomosis=$rowTablaTipoComplicaciones[7];
		
		$B_Otras=$rowTablaTipoComplicaciones[8];
		
		
		
		if($B_Reintervencion==1){
			
			$sqlTaTablaReintervencion="SELECT Id_Tipo_Reintervencion FROM tabla_reintervencion WHERE Id_Cirugia='$IDCirugia'";
			
			$resTablaReintervencion=mysqli_query($conexion, $sqlTaTablaReintervencion) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
			
			$rowTablaReintervencion=mysqli_fetch_array($resTablaReintervencion);
			
			$Reintervencion=$B_Reintervencion;
			$ReintTexto=$rowTablaReintervencion[0];
			
		}else{
			
			$Reintervencion=null;
			$ReintTexto=null;
		}
		
		
		
		if ($B_ExitusIntraoperatorio){
			
			
			$sqlTaTablaExitusIntraOp="SELECT Id_Tipo_Exitus_Intraop FROM tabla_exitus_intraop WHERE Id_Cirugia='$IDCirugia'";
			
			$resTablaExitusIntraop=mysqli_query($conexion, $sqlTaTablaExitusIntraOp) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
			
			$rowTablaExitusIntraop=mysqli_fetch_array($resTablaExitusIntraop);
			
			$ExitusIntra=$B_ExitusIntraoperatorio;
			$ExitusIntraTexto=$rowTablaExitusIntraop[0];
			
			
		}else{
			
			$ExitusIntra=null;
			$ExitusIntraTexto=null;
		}
		
		
		if ($B_ExitusPostOperatorio){
			
			
			$sqlTaTablaExitusPostOp="SELECT Id_Tipo_Exitus_Postop FROM tabla_exitus_postop WHERE Id_Cirugia='$IDCirugia'";
			
			$resTablaExitusPostop=mysqli_query($conexion, $sqlTaTablaExitusPostOp) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
			
			$rowTablaExitusPostop=mysqli_fetch_array($resTablaExitusPostop);
			
			$ExitusPost=$B_ExitusPostOperatorio;
			$ExitusPostTexto=$rowTablaExitusPostop[0];
			
			
		}else{
			
			$ExitusPost=null;
			$ExitusPostTexto=null;
		}
		
		
		if($B_Herida==1){
				
			$sqlTablaHerida="SELECT Id_Tipo_Herida FROM tabla_herida WHERE Id_Cirugia='$IDCirugia'";
			
			$resTablaHerida=mysqli_query($conexion, $sqlTablaHerida) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
			
			$HHemo=null;
			$HInfec=null;
			$HEvis=null;
			$HEventra=null;
			
			while($rowTablaHerida=mysqli_fetch_array($resTablaHerida)){
				
				if($rowTablaHerida[0]==1){
					$HHemo=1;
				}else if($rowTablaHerida[0]==2){
					$HInfec=1;
				}else if($rowTablaHerida[0]==3){
					$HEvis=1;
				}else if($rowTablaHerida[0]==4){
					$HEventra=1;
				}
				
			}
			
		}else{
			$HHemo=null;
			$HInfec=null;
			$HEvis=null;
			$HEventra=null;
			
		}
		
		if($B_Perine==1){
				
				$sqlTablaPerine="SELECT Id_Tipo_Perine FROM tabla_perine WHERE Id_Cirugia='$IDCirugia'";
			
				$resTablaPerine=mysqli_query($conexion, $sqlTablaPerine) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
				
				$PInfec=null; 	
 				$PCicat=null;
				$PHernia=null;
				
				while($rowTablaPerine=mysqli_fetch_array($resTablaPerine)){
					
					if($rowTablaPerine[0]==1){
						$PInfec=1;
					}else if ($rowTablaPerine[0]==2){
						$PCicat=1;
					}else if($rowTablaPerine[0]==3){
						$PHernia=1;
					}
				}

		}else{
			$PInfec=null; 	
 			$PCicat=null;
			$PHernia=null;
		}
		
		
		if($B_Abdominales){
			
			$sqlTablaAbdominales="SELECT Id_Tipo_Abdominales FROM tabla_abdominales WHERE Id_Cirugia='$IDCirugia'";
			
			$resTablaAbdominales=mysqli_query($conexion, $sqlTablaAbdominales) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
				
				$AHemop=null;
				$APerit=null;
				$AAbsce=null;
				//$AHemoAbdo=null;
				$AAbscePelvica=null;
				$AHemoPelvica=null;
				$AIsque=null;
				$AColec=null;
				$AIatro=null;
				$AIatroHuecas=null;
				$AIleopa=null;
				$IleoMec=null;
				$AEstoma=null;
				$GeneralSepsis=null;
				$GeneralShock=null;
				
				while($rowTablaAbdominales=mysqli_fetch_array($resTablaAbdominales)){
					
					if($rowTablaAbdominales[0]==1){
						$AHemop=1;
					}else if ($rowTablaAbdominales[0]==2){
						$APerit=1;
					}else if($rowTablaAbdominales[0]==3){
						$AAbsce=1;
					}else if($rowTablaAbdominales[0]==4){
						$AIsque=1;
					}else if($rowTablaAbdominales[0]==5){
						$AColec=1;
					}else if($rowTablaAbdominales[0]==6){
						$AIatro=1;
					}else if ($rowTablaAbdominales[0]==7){
						$AIleopa=1;
					}else if($rowTablaAbdominales[0]==8){
						$IleoMec=1;
					}else if($rowTablaAbdominales[0]==9){
						$AAbscePelvica=1;
					}/*else if($rowTablaAbdominales[0]==10){
						$AHemoAbdo=1;
					}*/else if($rowTablaAbdominales[0]==11){
						$AHemoPelvica=1;
					}else if($rowTablaAbdominales[0]==12){
						$AIatroHuecas=1;
					}else if($rowTablaAbdominales[0]==13){
						$AEstoma=1;
					}else if($rowTablaAbdominales[0]==14){
						$GeneralSepsis=1;
					}else if($rowTablaAbdominales[0]==15){
						$GeneralShock=1;
					}
				}

		}else{
			
			$AHemop=null;
			$APerit=null;
			$AAbsce=null;
			//$AHemoAbdo=null;
			$AAbscePelvica=null;
			$AHemoPelvica=null;
			$AIsque=null;
			$AColec=null;
			$AIatro=null;
			$AIatroHuecas=null;
			$AIleopa=null;
			$IleoMec=null;
			$AEstoma=null;
			$GeneralSepsis=null;
			$GeneralShock=null;
			
		}
		
		
		if($B_Anastomosis==1){
			
			$sqlTablaAnastomosisComplicaciones="SELECT Id_Tipo_Anastomosis_Complicaciones FROM tabla_anastomosis_complicaciones WHERE Id_Cirugia='$IDCirugia'";
			
			$resTablaAnastomosisComplicaciones=mysqli_query($conexion, $sqlTablaAnastomosisComplicaciones) or die(header("Location: EliminaPaciente/elimina_paciente.php"));
			
				$AnHemo=null;
				$AnFuga=null;
				$AnFistula=null;
			
			while($rowTablaAnastomosisComplicaciones=mysqli_fetch_array($resTablaAnastomosisComplicaciones)){
				
				
			
				if($rowTablaAnastomosisComplicaciones[0]==1){
					$AnHemo=1;	
				}else if($rowTablaAnastomosisComplicaciones[0]==2){
					$AnFuga=1;
				}else if($rowTablaAnastomosisComplicaciones[0]==3){
					$AnFistula=1;
				}
				
			}
			
		}else{
			$AnHemo=null;
			$AnFuga=null;
			$AnFistula=null;
		}
		
		if($B_Otras==1){
			$sqlTablaOtrasComplicaciones="SELECT Id_Tipo_Otras_Complicaciones FROM tabla_otras_complicaciones WHERE Id_Cirugia='$IDCirugia'";
			
			$resTablaOtrasComplicaciones=mysqli_query($conexion, $sqlTablaOtrasComplicaciones) or die	(header("Location: EliminaPaciente/elimina_paciente.php"));
			
			$OHemo=null;
			$OInfur=null;
			$OUrologicas=null;
			$ORespi=null;
			$ORespiInfecc=null;
			$OHepat=null;
			$OVascularMec=null;
			$OVascularInfecc=null;
			$OFMO=null;
			$OTEP=null;
			$ONeuro=null;
			$ORenal=null;
			$OCarcio=null;

			
			while($rowTablaOtrasComplicaciones=mysqli_fetch_array($resTablaOtrasComplicaciones)){
				
				if($rowTablaOtrasComplicaciones[0]==1){
					$OHemo=1;
				}else if($rowTablaOtrasComplicaciones[0]==2){
					$OInfur=1;
				}else if($rowTablaOtrasComplicaciones[0]==3){
					$OCarcio=1;
				}else if($rowTablaOtrasComplicaciones[0]==4){
					$OHepat=1;
				}else if($rowTablaOtrasComplicaciones[0]==5){
					$ORespi=1;
				}else if($rowTablaOtrasComplicaciones[0]==6){
					$OFMO=1;
				}else if($rowTablaOtrasComplicaciones[0]==7){
					$OTEP=1;
				}else if($rowTablaOtrasComplicaciones[0]==8){
					$ONeuro=1;
				}else if($rowTablaOtrasComplicaciones[0]==10){
					$OUrologicas=1;
				}else if($rowTablaOtrasComplicaciones[0]==11){
					$ORespiInfecc=1;
				}else if($rowTablaOtrasComplicaciones[0]==13){
					$OVascularInfecc=1;
				}else if($rowTablaOtrasComplicaciones[0]==14){
					$OVascularMec=1;
				}else if($rowTablaOtrasComplicaciones[0]==15){
					$ORenal=1;
				}
				
			}
			
		}else{
			
		$OHemo=null;
		$OInfur=null;
		$OUrologicas=null;
		$ORespi=null;
		$ORespiInfecc=null;
		$OHepat=null;
		$OVascularMec=null;
		$OVascularInfecc=null;
		$OFMO=null;
		$OTEP=null;
		$ONeuro=null;
		$ORenal=null;
		$OCarcio=null;
	
			
		}
		
	
	}else{
		
		$Reintervencion=null;
	$ReintTexto=null;
	$ExitusIntra=null;
	$ExitusIntraTexto=null;
	$ExitusPost=null;
	$ExitusPostTexto=null;
	$GeneralSepsis=null;//Nuevo
	$GeneralShock=null;//Nuevo
	$HHemo=null;
	$HInfec=null;
	$HEvis=null;
	$HEventra=null;//Nuevo
	$PInfec=null; 	
 	$PCicat=null;
	$PHernia=null;//Nuevo
	$AHemop=null;
	$APerit=null;
	$AAbsce=null;//Abdominal
	//$AHemoAbdo=null;//Nuevo
	$AAbscePelvica=null;
	$AHemoPelvica=null;//Nuevo
	$AIsque=null;
	$AColec=null;
	$AIatro=null;
	$AIatroHuecas=null;//Nuevo
	$AIleopa=null;
	$IleoMec=null;
	$AEstoma=null;//Nuevo
	$AnHemo=null;
	$AnFuga=null;
	$AnFistula=null;
	$OHemo=null;
	$OInfur=null;
	$OUrologicas=null;
	$ORespi=null;
	$ORespiInfecc=null;//Nuevo
	$OHepat=null;
	$OVascularMec=null;
	$OVascularInfecc=null;
	$OFMO=null;
	$OTEP=null;
	$ONeuro=null;
	$ORenal=null;
	$OCarcio=null;
	
		
	}
	
 }
 
 
/*
 * 
 * DATOS QUE SE OBTIENEN DEL ANATOMIA PATOLOGICA PARA LA TABLA COMPLETA
 * 
 */
$sqlTablaPatologica="SELECT Estado FROM tabla_patologica WHERE Id_Paciente='$Id_Paciente'";

$resTablaPatologica=mysqli_query($conexion, $sqlTablaPatologica) or die (header("Location: EliminaPaciente/elimina_paciente.php"));

$rowTablaPatologica=mysqli_fetch_array($resTablaPatologica);

$AnatomiaPatologica=$rowTablaPatologica[0];

if($AnatomiaPatologica==2 || $AnatomiaPatologica==3){
    $TipoHistologico=null;
    $OtrosHistologico=null;
	$APT=null;
	$APM=null;
	$APN=null;
	$GangliosAis=null;
	$GangliosAfec=null;
	$MargenDistal=null;
	$MargenCircun=null;
	$TipoRes=null;
	$Regresion=null;
	$MesoCal=null;
	$EstadioPatologico=5;
    $Tumor_Sincronico=null;	
}else if($AnatomiaPatologica==1){
		
	$sqlAnatomiaPatologica="SELECT * FROM anatomia_patologica WHERE Id_Paciente='$Id_Paciente'";
	
	$resAnatomiaPatologica=mysqli_query($conexion, $sqlAnatomiaPatologica) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowAnatomiaPatologica=mysqli_fetch_array($resAnatomiaPatologica);
	
    $TipoHistologico=$rowAnatomiaPatologica[2];
    $OtrosHistologico=$rowAnatomiaPatologica[3];
	$APT=$rowAnatomiaPatologica[4];
	$APN=$rowAnatomiaPatologica[5];
	$APM=$rowAnatomiaPatologica[6];
	$GangliosAis=$rowAnatomiaPatologica[7];
	$GangliosAfec=$rowAnatomiaPatologica[8];
	$MargenDistal=$rowAnatomiaPatologica[10];
	$MargenCircun=$rowAnatomiaPatologica[11];
	$TipoRes=$rowAnatomiaPatologica[12];
	$Regresion=$rowAnatomiaPatologica[13];
	$MesoCal=$rowAnatomiaPatologica[14];
	$EstadioPatologico=$rowAnatomiaPatologica[9];
    $Tumor_Sincronico=$rowAnatomiaPatologica[15];
	
}
 
 
/*
 * 
 * DATOS QUE SE OBTIENEN DEL SEGUIMIENTO PARA LA TABLA COMPLETA
 * 
 */

$sqlSeguimiento="SELECT * FROM seguimiento WHERE Id_Paciente='$Id_Paciente'";

$resSeguimiento=mysqli_query($conexion, $sqlSeguimiento) or die (header("Location: EliminaPaciente/elimina_paciente.php"));

$rowSeguimiento=mysqli_fetch_array($resSeguimiento);

$IDSeguimiento=$rowSeguimiento[0];

$FechaRevision=$rowSeguimiento[2];
$Imposibilidad=$rowSeguimiento[7];

$Recidiva=$rowSeguimiento[3];
$Metastasis=$rowSeguimiento[4];
$Segundo_Tumor=$rowSeguimiento[5];
$Estado=$rowSeguimiento[6];
$ComenAdicionales=$rowSeguimiento[8];


if ($cirugia==1){
$MesesSeguimiento=((strtotime($FechaRevision)-strtotime($FechaCirugia))/2592000);
}else{
	$MesesSeguimiento=null;
}	


if($Recidiva==1){
	$sqlFechaRecidiva="SELECT * FROM tabla_recidiva WHERE Id_Seguimiento='$IDSeguimiento'";
	
	$resFechaRecidiva=mysqli_query($conexion, $sqlFechaRecidiva) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowFechaRecidiva=mysqli_fetch_array($resFechaRecidiva);
	
	$FechaRecidiva=$rowFechaRecidiva[1];
    $IntervencionRecidiva=$rowFechaRecidiva[2];
    $LocalizacionRecidiva=$rowFechaRecidiva[3];
	
}else{
	$FechaRecidiva=$FechaRevision;
    $IntervencionRecidiva=null;
    $LocalizacionRecidiva=null;
}




if($Metastasis==1){
	$sqlFechaMetastasis="SELECT * FROM tabla_metastasis WHERE Id_Seguimiento='$IDSeguimiento'";
	
	$resFechaMetastasis=mysqli_query($conexion, $sqlFechaMetastasis) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowFechaMetastasis=mysqli_fetch_array($resFechaMetastasis);
	
	$FechaMetastasis=$rowFechaMetastasis[1];
    $IntervencionMetastasis=$rowFechaMetastasis[2];
    $LocalizacionMetastasis=$rowFechaMetastasis[3];
	
}else{
	$FechaMetastasis=$FechaRevision;
    $IntervencionMetastasis=null;
    $LocalizacionMetastasis=null;
}




if($Segundo_Tumor==1){
	$sqlFechaSegundoTumor="SELECT * FROM tabla_segundo_tumor WHERE Id_Seguimiento='$IDSeguimiento'";
	
	$resFechaSegundoTumor=mysqli_query($conexion, $sqlFechaSegundoTumor) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowFechaSegundoTumor=mysqli_fetch_array($resFechaSegundoTumor);
	
	$FechaSegundoTumor=$rowFechaSegundoTumor[1];
    $IntervencionSegundoTumor=$rowFechaSegundoTumor[2];
    $LocalizacionSegundoTumor=$rowFechaSegundoTumor[3];
	
}else{
	$FechaSegundoTumor=$FechaRevision;
	$IntervencionSegundoTumor=null;
    $LocalizacionSegundoTumor=null;
    
}



if($Estado==2){
	$sqlFechaMuerte="SELECT Fecha_Muerte, Relacion_Muerte FROM tabla_estado WHERE Id_Seguimiento='$IDSeguimiento'";
	
	$resFechaMuerte=mysqli_query($conexion, $sqlFechaMuerte) or die (header("Location: EliminaPaciente/elimina_paciente.php"));
	
	$rowFechaMuerte=mysqli_fetch_array($resFechaMuerte);
	
	$FechaMuerte=$rowFechaMuerte[0];
	
	$CausaMuerte=$rowFechaMuerte[1];
	
}else{
	$FechaMuerte=null;
	$CausaMuerte=null;
}

if ($Imposibilidad==1){
    $sqlImposibilidad="SELECT Id_tabla_seg_imposibilidad FROM tabla_imposibilidad WHERE Id_Seguimiento='$IDSeguimiento'";
            
     $rowImposibilidad=mysqli_fetch_array(mysqli_query($conexion,$sqlImposibilidad))
     or die(header("Location: EliminaPaciente/elimina_paciente.php"));
     
     $CausaImposibilidad=$rowImposibilidad[0];  
}else{
    $CausaImposibilidad=null;
}


$sqlRellenaTablaGeneral="INSERT INTO tabla_general (Hospital, NHC, Recidiva, FechaRecidiva, Metastasis, FechaMetastasis, SegundoTumor, FechaSegundoTumor, EstadoPaciente,
							CausaMuerte, FechaMuerte, FechaUltimaVisita, ImposibilidadSeguimiento, MesesSeguimiento, FechaNacimiento, Sexo, Localizacion, TumorSincronico,
							EcoT, EcoN, TAC, RmnT, RmnN, EstadioRadiologico, Invasion, MetastasisInicial, FechaAltaSistema, Cirugia, MotivoNoCirugia, Planificacion, FechaCirugia, 
							FechaAlta, Tecnica, OtraTecnica, ExeresisMesorrecto, OtrasResecciones, ASA, Hallazgos, Perforacion, MetastasisHepaticas, ImpOvaricos, ViaOperacion, TiempoOperacion, 
							Intencion, Anastomosis, Reservorio, Estoma, TipoEstoma, Complicaciones, Reintervencion, ReintTexto, ExitusIntra, ExitusIntraTexto, ExitusPost, ExitusPostTexto, GeneralSepsis, GeneralShock, 
							HHemo, Hinfec, HEvis, HEventracion, PInfec, PCicat, PHernia, AHemop, APerit, AAbsceAbdo, AAbscePelvico, AHemoPelvico, AIsque, AColec, AIatroMacizas, AIatroHuecas,
							 AIleopa, IleoMec, AEstoma, AnHemo, AnFuga, AnFistula, OHemo, OUroMec, OUroInfecc, ORespi, ORespiInfecc, OHepat, OVascMec, OVascInfecc, OFMO, OTEP, ONeuro, ORenal, OCardioVasc,
							 TtoNeo, TipoNeo, TipoNoNeo, TtoAdy, TipoAdy, ApT, ApN, ApM, GangliosAis, GangliosAfec, MargenDistal, MargenCircun,
							 TipoRes, Regresion, MesoCal, EstadioPatologico, Comentarios_Adicionales, Orientacion, Transfusiones,
                             ECO, RMN, Dist_Tumor, Dist_Adeno, Integ_Esfinter, Cirujano_Principal, Cirujano_Ayudante, Obstruccion, Tipo_Histologico, Otros_Histologico, Estadio_Tumor_Sincronico,
                             Localizacion_Recidiva, Intervencion_Recidiva, Localizacion_Metastasis, Intervencion_Metastasis, Localizacion_Segundo_Tumor, Intervencion_Segundo_Tumor, Causa_Imposibilidad, Clasificacion_Rullier, Anastomosis_coloanal) 
							 VALUES 
							 ('$Id_Hospital', '$NHC', '$Recidiva', '$FechaRecidiva', '$Metastasis', '$FechaMetastasis', '$Segundo_Tumor', '$FechaSegundoTumor', '$Estado', '$CausaMuerte', '$FechaMuerte', 
							 '$FechaRevision', '$Imposibilidad', '$MesesSeguimiento', '$FechaNacimiento', '$Sexo', '$Localizacion', '$Sincro', '$EcoT', '$EcoN', '$TAC', '$RmnT', '$RmnN', '$EstadioRadio', 
							 '$Invasion', '$MetastasisInicial', '$FechaAltaSistema', '$cirugia', '$MotivoNoCirugia', '$planificacion', '$FechaCirugia', '$FechaAlta', '$TecnicaCirugia', '$OtraTecnica',
							  '$ExeresisMeso', '$OtrasResecciones', '$ASA', '$Hallazgos', '$Perforacion', '$MetastasisHepaticas', '$ImplantesOvaricos', '$ViaOperacion', '$TiempoOPeracion', '$IntencionOperacion', '$Anastomosis',
							   '$Reservorio', '$Estoma', '$TipoEstoma', '$Complicaciones', '$Reintervencion', '$ReintTexto', '$ExitusIntra', '$ExitusIntraTexto', '$ExitusPost', '$ExitusPostTexto', '$GeneralSepsis', '$GeneralShock', '$HHemo',
							    '$HInfec', '$HEvis', '$HEventra', '$PInfec', '$PCicat', '$PHernia', '$AHemop', '$APerit', '$AAbsce', '$AAbscePelvica', '$AHemoPelvica', '$AIsque', '$AColec', '$AIatro', '$AIatroHuecas', 
							    '$AIleopa', '$IleoMec', '$AEstoma', '$AnHemo', '$AnFuga', '$AnFistula', '$OHemo', '$OUrologicas', '$OInfur', '$ORespi', '$ORespiInfecc', '$OHepat', '$OVascularMec', '$OVascularInfecc', '$OFMO', '$OTEP',
							     '$ONeuro', '$ORenal', '$OCarcio', '$TtoNeo', '$TipoNeo', '$TipoNoNeo', '$TtoAdy', '$TipoAdy', '$APT', '$APN', '$APM', 
							     '$GangliosAis', '$GangliosAfec', '$MargenDistal', '$MargenCircun', '$TipoRes', '$Regresion', '$MesoCal', '$EstadioPatologico', '$ComenAdicionales', '$Orientacion', '$Transfusiones',
                              '$ECO', '$RMN', '$RmnDist_Tumor', '$RmnDist_Adeno', '$Integ_Esfinter', 
                            '$CirujanoPrincipal', '$CirujanoAyudante', '$Obstruccion', '$TipoHistologico', '$OtrosHistologico', '$Tumor_Sincronico',
                            '$LocalizacionRecidiva', '$IntervencionRecidiva', '$LocalizacionMetastasis', '$IntervencionMetastasis', 
                            '$LocalizacionSegundoTumor', '$IntervencionSegundoTumor', '$CausaImposibilidad','$Clasificacion_Rullier','$Anastomosis_coloanal')"; 



mysqli_query($conexion,$sqlRellenaTablaGeneral)  or die(header("Location: EliminaPaciente/elimina_paciente.php"));
    
	
 
mysqli_close($conexion); 
 
header("Location: FinIntroduccionPaciente.php");

