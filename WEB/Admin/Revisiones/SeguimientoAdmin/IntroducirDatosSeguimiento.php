<?php

session_start();

require_once ("../../../BDD/conexion.php");


/*
 * Variable para ver si es la primera vez que se carga la página
 */

$Enviar_Seguimiento="Enviar";
$_SESSION["ButtonEnviarSeguimiento"]=$Enviar_Seguimiento;


if (isset($_POST["Fecha_Revision"])){
	$Fecha_Revision=$_POST["Fecha_Revision"];
}else {
    $Fecha_Revision=null;
}

$_SESSION["Fecha_Revision"]=$Fecha_Revision;



if (isset($_POST["B_Recidiva"])){
	$Recidiva=$_POST["B_Recidiva"];
    $Recidiva=intval($Recidiva);
}else if($_SESSION["Recidiva"]!=null){
	$Recidiva=intval($_SESSION["Recidiva"]);	
}
else{
    $Recidiva=null;
}

$_SESSION["Recidiva"]=$Recidiva;



if (isset($_POST["Fecha_Recidiva"])){
	$Fecha_Recidiva=$_POST["Fecha_Recidiva"];
}else if($_SESSION["Fecha_Recidiva"]!=null){
	$Fecha_Recidiva=$_SESSION["Fecha_Recidiva"];
}
else{
    $Fecha_Recidiva=null;
}

$_SESSION["Fecha_Recidiva"]=$Fecha_Recidiva;



if (isset($_POST["tabla_seg_localiz_recidiva"])){
	$Localizacion_Recidiva=$_POST["tabla_seg_localiz_recidiva"];
    //$Localizacion_Recidiva=utf8_decode($Localizacion_Recidiva);
}else if($_SESSION["Localizacion_Recidiva"]!=null){
	$Localizacion_Recidiva=$_SESSION["Localizacion_Recidiva"];
}
else{
    $Localizacion_Recidiva=null;
}

$_SESSION["Localizacion_Recidiva"]=$Localizacion_Recidiva;




if (isset($_POST["B_Recidiva_Intervencion"])){
	$Intervencion_Recidiva=$_POST["B_Recidiva_Intervencion"];
    $Intervencion_Recidiva=intval($Intervencion_Recidiva);
}else if($_SESSION["Intervencion_Recidiva"]!=null){
	$Intervencion_Recidiva=$_SESSION["Intervencion_Recidiva"];
}
else{
    $Intervencion_Recidiva=null;
}

$_SESSION["Intervencion_Recidiva"]=$Intervencion_Recidiva;



if (isset($_POST["B_Metastasis"])){
	$Metastasis=$_POST["B_Metastasis"];
    $Metastasis=intval($Metastasis);
}else{
    $Metastasis=$_SESSION["Metastasis"];
}

$_SESSION["Metastasis"]=$Metastasis;




if (isset($_POST["Fecha_Metastasis"])){
	$Fecha_Metastasis=$_POST["Fecha_Metastasis"];
}else{
    $Fecha_Metastasis=$_SESSION["Fecha_Metastasis"];
}

$_SESSION["Fecha_Metastasis"]=$Fecha_Metastasis;




if (isset($_POST["tabla_seg_localiz_metastasis"])){
	$Localizacion_Metastasis=$_POST["tabla_seg_localiz_metastasis"];
    //$Localizacion_Metastasis=utf8_decode($Localizacion_Metastasis);
}else{
    $Localizacion_Metastasis=$_SESSION["Localizacion_Metastasis"];
}

$_SESSION["Localizacion_Metastasis"]=$Localizacion_Metastasis;



if (isset($_POST["B_Metastasis_Intervencion"])){
	$Intervencion_Metastasis=$_POST["B_Metastasis_Intervencion"];
    $Intervencion_Metastasis=intval($Intervencion_Metastasis);
}else{
    $Intervencion_Metastasis=$_SESSION["Intervencion_Metastasis"];
}

$_SESSION["Intervencion_Metastasis"]=$Intervencion_Metastasis;



if (isset($_POST["B_Segundo_Tumor"])){
	$Segundo_Tumor=$_POST["B_Segundo_Tumor"];
    $Segundo_Tumor=intval($Segundo_Tumor);
}else{
    $Segundo_Tumor=$_SESSION["Segundo_Tumor"];
}

$_SESSION["Segundo_Tumor"]=$Segundo_Tumor;



if (isset($_POST["Fecha_Segundo_Tumor"])){
	$Fecha_Segundo_Tumor=$_POST["Fecha_Segundo_Tumor"];
}else{
    $Fecha_Segundo_Tumor=$_SESSION["Fecha_Segundo_Tumor"];
}

$_SESSION["Fecha_Segundo_Tumor"]=$Fecha_Segundo_Tumor;




if (isset($_POST["tabla_seg_localiz_segundo_tumor"])){
	$Localizacion_Segundo_Tumor=$_POST["tabla_seg_localiz_segundo_tumor"];
    //$Localizacion_Segundo_Tumor=utf8_decode($Localizacion_Segundo_Tumor);
}else{
    $Localizacion_Segundo_Tumor=$_SESSION["Localizacion_Segundo_Tumor"];
}

$_SESSION["Localizacion_Segundo_Tumor"]=$Localizacion_Segundo_Tumor;


if (isset($_POST["B_Segundo_Tumor_Intervencion"])){
	$Intervencion_Segundo_Tumor=$_POST["B_Segundo_Tumor_Intervencion"];
    $Intervencion_Segundo_Tumor=intval($Intervencion_Segundo_Tumor);
}else{
    $Intervencion_Segundo_Tumor=$_SESSION["Intervencion_Segundo_Tumor"];
}

$_SESSION["Intervencion_Segundo_Tumor"]=$Intervencion_Segundo_Tumor;



if (isset($_POST["B_Estado"])){
	$Estado=$_POST["B_Estado"];
    $Estado=intval($Estado);
}else{
    $Estado=$_SESSION["Estado"];
}

$_SESSION["Estado"]=$Estado;



if (isset($_POST["Fecha_Muerte"])){
	$Fecha_Muerte=$_POST["Fecha_Muerte"];
}else{
    $Fecha_Muerte=null;
}

$_SESSION["Fecha_Muerte"]=$Fecha_Muerte;



if (isset($_POST["Relacion_Muerte"])){
	$Causa_Muerte=$_POST["Relacion_Muerte"];
  //  $Causa_Muerte=utf8_decode($Causa_Muerte);
}else{
    $Causa_Muerte=$_SESSION["Causa_Muerte"];
}

$_SESSION["Causa_Muerte"]=$Causa_Muerte;



if (isset($_POST["B_Imposibilidad"])){
	$Imposibilidad=$_POST["B_Imposibilidad"];
    $Imposibilidad=intval($Imposibilidad);
}else{
    $Imposibilidad=$_SESSION["Imposibilidad"];
}

$_SESSION["Imposibilidad"]=$Imposibilidad;




if (isset($_POST["tabla_seg_imposibilidad"])){
	$Causa_Imposibilidad=$_POST["tabla_seg_imposibilidad"];
  //  $Causa_Imposibilidad=utf8_decode($Causa_Imposibilidad);
}else{
    $Causa_Imposibilidad=$_SESSION["Causa_Imposibilidad"];
}

$_SESSION["Causa_Imposibilidad"]=$Causa_Imposibilidad;


if (isset($_POST["Comentarios_Adicionales"])){
    $Comentarios_Adicionales=$_POST["Comentarios_Adicionales"];
    $Comentarios_Adicionales=strip_tags($Comentarios_Adicionales);
    $Comentarios_Adicionales=utf8_decode($Comentarios_Adicionales);
}else{
    $Comentarios_Adicionales=null;
}

$_SESSION["Comentarios_Seguimiento"]=$Comentarios_Adicionales;




/*
 * Cogemos el ID del Paciente por SESSION 
 */
 
$IDSeguimientoRevision=$_SESSION["IDSeguimientoRevision"];
$IDSeguimientoRevision=intval($IDSeguimientoRevision);


/*
 * Se introducen los datos en la tabla seguimiento
 */

 $sqlSeguimientoRevision="UPDATE seguimiento SET Fecha_Revision='$Fecha_Revision', 
 B_Recidiva='$Recidiva', B_Metastasis='$Metastasis', B_Segundo_Tumor='$Segundo_Tumor', 
 B_Estado='$Estado', B_Imposibilidad='$Imposibilidad', Comentarios_Adicionales='$Comentarios_Adicionales' WHERE ID='$IDSeguimientoRevision'";				
 
 
        
 mysqli_query($conexion,$sqlSeguimientoRevision)
        or die('Error: ' . mysqli_error());
  
  if ($Recidiva == 1)
  {
      /*
       * En localización miramos si han elegido del autocomplete alguna opción
       */
      /* 
       $sqlLocalizacion="SELECT ID FROM tabla_seg_localiz_recidiva WHERE Tipo='$Localizacion_Recidiva'";
       
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die('Error: ' . mysqli_error());
    
       $Localizacion=$row[0];
		*/
		$sqlLocalizacion="SELECT COUNT(*) FROM tabla_seg_localiz_recidiva WHERE Tipo='$Localizacion_Recidiva'";
      
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die('Error: ' . mysqli_error());    
       /*
        * Si han metido una nueva localización, lo metemos en la base de datos
        */
        /*
       if ($Localizacion == null) 
       {
           $sqlInsertLocalizacion="INSERT INTO tabla_seg_localiz_recidiva ('Tipo') VALUES ('$Localizacion_Recidiva')";
            
           mysqli_query($conexion,$sqlInsertLocalizacion)
           or die('Error: ' . mysqli_error());
            
           $IDLocalizacion="SELECT LAST_INSERT_ID()";
           $row=mysqli_fetch_array(mysqli_query($conexion,$IDLocalizacion))
            or die('Error: ' . mysqli_error());
           $Localizacion=$row[0];
           $Localizacion=intval($Localizacion);
       }
      
      //echo ($IdSeguimiento. " " . $Fecha_Recidiva. " " .  $Intervencion_Recidiva. " " . $Localizacion);
      
      $sqlRecidivaRevision="INSERT INTO tabla_recidiva (Id_Seguimiento, Fecha_Recidiva, Intervencion, Id_tabla_seg_localiz_recidiva)
                      VALUES ('$IDSeguimientoRevision', '$Fecha_Recidiva',  '$Intervencion_Recidiva', '$Localizacion')";
      
              
      mysqli_query($conexion,$sqlRecidivaRevision)
      or die('Error: ' . mysqli_error());
  }
*/

		if($row[0]==0){
      // 	echo ('Entra correctamente');
		//$LocRec=utf8_encode($Localizacion_Recidiva);
		 	$sqlInsertLocalizacion="INSERT INTO tabla_seg_localiz_recidiva (Tipo) VALUES ('$Localizacion_Recidiva')";
            
           mysqli_query($conexion,$sqlInsertLocalizacion)
           or die('Error: ' . mysqli_error().'Localización recidiva '.$Localizacion_Recidiva.' LocRec'.$LocRec);
            
           $IDLocalizacion="SELECT LAST_INSERT_ID()";
           $row=mysqli_fetch_array(mysqli_query($conexion,$IDLocalizacion))
            or die('Error: ' . mysqli_error());
           $Localizacion=$row[0];
           $Localizacion=intval($Localizacion);
      	 }else{
       	
		 $sqlLocalizacion="SELECT ID FROM tabla_seg_localiz_recidiva WHERE Tipo='$Localizacion_Recidiva'";
       
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die('Error: ' . mysqli_error()."LocRec ".$LocRec." Localizacion_Recidiva ".$Localizacion_Recidiva);
    
       $Localizacion=$row[0];
		
		
       }
	   
	         $sqlRecidivaRevision="INSERT INTO tabla_recidiva (Id_Seguimiento, Fecha_Recidiva, Intervencion, Id_tabla_seg_localiz_recidiva)
                      VALUES ('$IDSeguimientoRevision', '$Fecha_Recidiva',  '$Intervencion_Recidiva', '$Localizacion')";
      
              
      mysqli_query($conexion,$sqlRecidivaRevision)
      or die('Error: ' . mysqli_error());
  }



/*

if ($Metastasis == 1)
  	{
      /*
       * En localización miramos si han elegido del autocomplete alguna opción
       */
       /*
       $sqlLocalizacion="SELECT ID FROM tabla_seg_localiz_metastasis WHERE Tipo='$Localizacion_Metastasis'";
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die('Error: ' . mysqli_error());
    
       $Localizacion=$row[0];
    
       /*
        * Si han metido una nueva localización, lo metemos en la base de datos
        */
        /*
       if ($Localizacion == null) 
       {
           $sqlInsertLocalizacion="INSERT INTO tabla_seg_localiz_metastasis ('Tipo') VALUES ('$Localizacion_Metastasis')";
            
           mysqli_query($conexion,$sqlInsertLocalizacion)
           or die('Error: ' . mysqli_error());
            
           $IDLocalizacion="SELECT LAST_INSERT_ID()";
           $row=mysqli_fetch_array(mysqli_query($conexion,$IDLocalizacion))
            or die('Error: ' . mysqli_error());
           $Localizacion=$row[0];
           $Localizacion=intval($Localizacion);
       }
      
	  $sqlMetastasisRevision="INSERT INTO tabla_metastasis (Id_Seguimiento, Fecha_Metastasis, Intervencion, Id_tabla_seg_localiz_metastasis)
                      VALUES ('$IDSeguimientoRevision', '$Fecha_Metastasis',  '$Intervencion_Metastasis', '$Localizacion')";
	  
	  
        
      mysqli_query($conexion,$sqlMetastasisRevision)
      or die('Error: ' . mysqli_error());
  }
		 * 
		 * */
		 
		 
if ($Metastasis == 1){
	
       $sqlLocalizacion="SELECT COUNT(*) FROM tabla_seg_localiz_metastasis WHERE Tipo='$Localizacion_Metastasis'";
      
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die('Error: ' . mysqli_error());
       
       if($row[0]==0){
       	
          //  $LocMetas=utf8_encode($Localizacion_Metastasis);
			
            $sqlNuevaLocalizMetastasis="INSERT INTO tabla_seg_localiz_metastasis (Tipo) VALUES('$Localizacion_Metastasis')";
    
                mysqli_query($conexion,$sqlNuevaLocalizMetastasis)
                or die('Error: ' . mysqli_error());
                
            $sqlIDTipoMetastasis="SELECT LAST_INSERT_ID()";

                $rowLoc=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoMetastasis))
                    or die('Error: ' . mysqli_error());

                $LocalizacionMetastasis=$rowLoc[0];
				$LocalizacionMetastasis=intval($LocalizacionMetastasis);

       }else{
             $sqlIDTipoMetastasis="SELECT ID FROM tabla_seg_localiz_metastasis WHERE Tipo='$Localizacion_Metastasis'";
      
             $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoMetastasis))
                or die('Error: ' . mysqli_error());
            
            $LocalizacionMetastasis=$row[0];    
       }
    
	
      $sqlMetastasis= "INSERT INTO tabla_metastasis (Id_Seguimiento, Fecha_Metastasis, Intervencion, Id_tabla_seg_localiz_metastasis)
                      VALUES ('$IDSeguimientoRevision', '$Fecha_Metastasis',  '$Intervencion_Metastasis', '$LocalizacionMetastasis')";
        
      mysqli_query($conexion,$sqlMetastasis)
      or die('Error: ' . mysqli_error());
      

	  
  }		 
		 
 /* 
if ($Segundo_Tumor == 1)
  {
      /*
       * En localización miramos si han elegido del autocomplete alguna opción
       */
       /*
       $sqlLocalizacion="SELECT ID FROM tabla_seg_localiz_segundo_tumor WHERE Tipo='$Localizacion_Segundo_Tumor'";
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die('Error: ' . mysqli_error());
    
       $Localizacion=$row[0];
    
       /*
        * Si han metido una nueva localización, lo metemos en la base de datos
        */
        /*
       if ($Localizacion == null) 
       {
           $sqlInsertLocalizacion="INSERT INTO tabla_seg_localiz_segundo_tumor ('Tipo') VALUES ('$Localizacion_Segundo_Tumor')";
            
           mysqli_query($conexion,$sqlInsertLocalizacion)
           or die('Error: ' . mysqli_error());
            
           $IDLocalizacion="SELECT LAST_INSERT_ID()";
           $row=mysqli_fetch_array(mysqli_query($conexion,$IDLocalizacion))
            or die('Error: ' . mysqli_error());
           $Localizacion=$row[0];
           $Localizacion=intval($Localizacion);
       }
      
	  $sqlSegundoTumorRevision="INSERT INTO tabla_segundo_tumor (Id_Seguimiento, Fecha_Segundo_Tumor, Intervencion, Id_tabla_seg_localiz_segundo_tumor)
                      VALUES ('$IDSeguimientoRevision', '$Fecha_Segundo_Tumor',  '$Intervencion_Segundo_Tumor', '$Localizacion')";
	  
        
      mysqli_query($conexion,$sqlSegundoTumorRevision)
      or die('Error: ' . mysqli_error());
  }
		 * 
		 * */

		 
    
if ($Segundo_Tumor == 1)
  {
  		
	
     $sqlLocalizacion="SELECT COUNT(*) FROM tabla_seg_localiz_segundo_tumor WHERE Tipo='$Localizacion_Segundo_Tumor'";
      
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die('Error: ' . mysqli_error());
       
       if($row[0]==0){
          //  $LocSegun=utf8_encode($Localizacion_Segundo_Tumor);	
            $sqlNuevaLocalizSegundoTumor="INSERT INTO tabla_seg_localiz_segundo_tumor (Tipo) VALUES('$Localizacion_Segundo_Tumor')";
    
                mysqli_query($conexion,$sqlNuevaLocalizSegundoTumor)
                or die('Error: ' . mysqli_error());
                
            $sqlIDTipoSegundoTumor="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoSegundoTumor))
                    or die('Error: ' . mysqli_error());

                $LocalizacionSegundoTumor=$row[0];
				$LocalizacionSegundoTumor=intval($LocalizacionSegundoTumor);

       }else{
             $sqlIDTipoSegundoTumor="SELECT ID FROM tabla_seg_localiz_segundo_tumor WHERE Tipo='$Localizacion_Segundo_Tumor'";
      
             $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoSegundoTumor))
                or die('Error: ' . mysqli_error());
            
            $LocalizacionSegundoTumor=$row[0];  
       }
    
      
      $sqlSegundoTumor= "INSERT INTO tabla_segundo_tumor (Id_Seguimiento, Fecha_Segundo_Tumor, Intervencion, Id_tabla_seg_localiz_segundo_tumor)
                      VALUES ('$IDSeguimientoRevision', '$Fecha_Segundo_Tumor',  '$Intervencion_Segundo_Tumor', '$LocalizacionSegundoTumor')";
        
      mysqli_query($conexion,$sqlSegundoTumor)
      or die('Error: ' . mysqli_error());
  }
  
  		 
		 
		 
		 
		 
		       
if ($Estado == 2)//Cuando es muerto
  {
      /*
       * En localización miramos si han elegido del autocomplete alguna opción
       */
       $sqlEstadoRevision="INSERT INTO tabla_estado (Id_Seguimiento, Fecha_Muerte, Relacion_Muerte)
                      VALUES ('$IDSeguimientoRevision', '$Fecha_Muerte',  '$Causa_Muerte')";

      mysqli_query($conexion,$sqlEstadoRevision)
      or die('Error: ' . mysqli_error());
  }  


/*
if ($Imposibilidad == 1) 
  {
      /*
       * En localización miramos si han elegido del autocomplete alguna opción
       */
       /*
       $sqlCausa="SELECT ID FROM tabla_seg_imposibilidad WHERE Causa='$Causa_Imposibilidad'";
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlCausa))
       or die('Error: ' . mysqli_error());
    
       $Causa=$row[0];
    
       /*
        * Si han metido una nueva localización, lo metemos en la base de datos
        */
        /*
       if ($Causa == null) 
       {
           $sqlInsertCausa="INSERT INTO tabla_seg_imposibilidad ('Causa') VALUES ('$Causa_Imposibilidad')";
            
           mysqli_query($conexion,$sqlInsertCausa)
           or die('Error: ' . mysqli_error());
            
           $IDCausa="SELECT LAST_INSERT_ID()";
           $row=mysqli_fetch_array(mysqli_query($conexion,$IDCausa))
            or die('Error: ' . mysqli_error());
           $Causa=$row[0];
           $Causa=intval($Causa);
       }
      
	  $sqlImposibilidadRevision="INSERT INTO tabla_imposibilidad (Id_Seguimiento, Id_tabla_seg_imposibilidad)
                      VALUES ('$IDSeguimientoRevision', '$Causa')";
	  
      
        
      mysqli_query($conexion,$sqlImposibilidadRevision)
      or die('Error: ' . mysqli_error());
  }
*/


if ($Imposibilidad == 1) 
  {
   
   		
      $sqlLocalizacion="SELECT COUNT(*) FROM tabla_seg_imposibilidad WHERE Causa='$Causa_Imposibilidad'";
      
       $row=mysqli_fetch_array(mysqli_query($conexion,$sqlLocalizacion))
       or die('Error: ' . mysqli_error());
       
       if($row[0]==0){
            $CausaImp=utf8_encode($Causa_Imposibilidad);  
            $sqlNuevaLocalizImposibilidad="INSERT INTO tabla_seg_imposibilidad (Causa) VALUES('$Causa_Imposibilidad')";
    
                mysqli_query($conexion,$sqlNuevaLocalizImposibilidad)
                or die('Error: ' . mysqli_error());
                
            $sqlIDTipoImposibilidad="SELECT LAST_INSERT_ID()";

                $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoImposibilidad))
                    or die('Error: ' . mysqli_error());

                $Causa=$row[0];
				$Causa=intval($Causa);

       }else{
             $sqlIDTipoImposibilidad="SELECT ID FROM tabla_seg_imposibilidad WHERE Causa='$Causa_Imposibilidad'";
      
             $row=mysqli_fetch_array(mysqli_query($conexion,$sqlIDTipoImposibilidad))
                or die('Error: ' . mysqli_error());
            
            $Causa=$row[0]; 
       }

      
      $sqlImposibilidad= "INSERT INTO tabla_imposibilidad (Id_Seguimiento, Id_tabla_seg_imposibilidad)
                      VALUES ('$IDSeguimientoRevision', '$Causa')";
        
      mysqli_query($conexion,$sqlImposibilidad)
      or die('Error: ' . mysqli_error());
  }





mysqli_close($conexion);
 
//Para trabajar de momento se deshabilitara
 header("Location: ../FinIntroduccionRevision.php");
?>