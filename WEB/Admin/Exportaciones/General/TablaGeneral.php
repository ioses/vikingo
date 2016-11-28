<?php
session_start();
require_once ('../../../BDD/conexion.php');


$i=$_POST["IdHospital"];

echo "Hospital ".$i."";


$sqlID="SELECT ID FROM identificador_paciente WHERE Id_Hospital='$i'" ;


$result = mysqli_query($conexion,$sqlID) or die('Error: ' . mysqli_error());


mysqli_query($conexion,"START TRANSACTION");

while($row = mysqli_fetch_array($result)){
	
        $Id_Paciente=intval($row[0]);
        	
        
        echo "<br/>";
        echo($Id_Paciente);	
        	
        	
        
        $sqlidentificador_paciente="SELECT Id_Hospital, AES_DECRYPT(NHC,'$claveNHC') AS NHC, Id_Sexo, Fecha_Nacimiento, Fecha_Alta_Sistema FROM identificador_paciente WHERE ID=$Id_Paciente";
        
        $residentificador_paciente=mysqli_query($conexion,$sqlidentificador_paciente) or die (mysql_error());
        
        $rowidentificador_paciente=mysqli_fetch_array($residentificador_paciente);
        
        
        //Variables a introducir en tabla_estadistica que vienen de indentificador_paciente
        $Id_Hospital=intval($rowidentificador_paciente[0]);
        $NHC=strval($rowidentificador_paciente[1]);
        $Sexo=intval($rowidentificador_paciente[2]);
        $FechaNacimiento=$rowidentificador_paciente[3];
        $FechaAltaSistema=$rowidentificador_paciente[4];
        
        //DATOS QUE SE OBTIENEN DEL INICIAL PARA LA TABLA COMPLETA
        
        
        $sqlInicial="SELECT * FROM inicial WHERE Id_Paciente='$Id_Paciente'";   
        
        $resInicial=mysqli_query($conexion,$sqlInicial) or die (mysql_error());
        
        $rowInicial=mysqli_fetch_array($resInicial);    
        
        //Variables a introducir de la tabla inicial
        
        $IDInicial=$rowInicial[0];
        $Localizacion=$rowInicial[2];
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
            
            $resECO=mysqli_query($conexion,$sqlECO) or die (mysql_error());
            
            $rowECO=mysqli_fetch_array($resECO);
            
            $EcoT=$rowECO[1];
            $EcoN=$rowECO[2];
            
        }else{
            
            $EcoT=null;
            $EcoN=null; 
                
        }
        
        if($RMN==1){
        
            $sqlRMN="SELECT * FROM tabla_rmn WHERE Id_Inicial='$IDInicial'";    
            
            $resRMN=mysqli_query($conexion,$sqlRMN) or die (mysql_error());
            
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
        
        $ResTratamiento=mysqli_query($conexion, $sqlTratamiento) or die(mysql_error());
        
        $rowTratamiento=mysqli_fetch_array($ResTratamiento);
        
        $IDTratamiento=$rowTratamiento[0];
        
        $TtoNeo=$rowTratamiento[2];
        $TtoAdy=$rowTratamiento[3];
        
        if ($TtoNeo==1){
            
            $sqlTtoNeo="SELECT Id_Tipo_Neo FROM tabla_neo WHERE Id_Tratamiento='$IDTratamiento'";
            
            $ResTtoNeo=mysqli_query($conexion, $sqlTtoNeo) or die (mysql_error());
            
            $rowTtoNeo=mysqli_fetch_array($ResTtoNeo);
            
            $TipoNeo=$rowTtoNeo[0];
            
            $TipoNoNeo=null;
            
        }else if ($TtoNeo==2){
            
            $sqlTtoNoNeo="SELECT Id_Tipo_No_Neo FROM tabla_no_neo WHERE Id_Tratamiento='$IDTratamiento'";
            
            $ResTtoNoNeo=mysqli_query($conexion, $sqlTtoNoNeo) or die (mysql_error());
            
            $rowTtoNoNeo=mysqli_fetch_array($ResTtoNoNeo);
            
            $TipoNoNeo=$rowTtoNoNeo[0];
            
            $TipoNeo=null;
            
        }else{
            
            $TipoNoNeo=null;
            
            $TipoNeo=null;
            
        }
        
        
        if($TtoAdy==1){
            $sqlTipoAdy="SELECT Id_Tipo_Ady FROM tabla_ady WHERE Id_Tratamiento='$IDTratamiento'";
            
            $resTtoAdy=mysqli_query($conexion, $sqlTipoAdy) or die (mysql_error());
            
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
         
         $resCirugia=mysqli_query($conexion, $sqlCirugia) or die (mysql_error());
         
         $rowCirugia=mysqli_fetch_array($resCirugia);
         
         $IDCirugia=$rowCirugia[0];
         
         $cirugia=$rowCirugia[2];
         
         if ($cirugia==2){
            
            $sqlNoCirugia="SELECT Id_Motivo FROM tabla_no_cirugia WHERE Id_Cirugia='$IDCirugia'";
            
            $resNoCirugia=mysqli_query($conexion, $sqlNoCirugia) or die (mysql_error());
            
            $rowNoCirugia= mysqli_fetch_array($resNoCirugia);
            
            $MotivoNoCirugia=$rowNoCirugia[0];
                
            $planificacion=null;
            $FechaCirugia=null;
            $FechaAlta=null;
            $CirujanoPrincipal=null;
            $CirujanoAyudante=null;
            $TecnicaCirugia=null;
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
            
            $resTablaCirugia=mysqli_query($conexion, $sqlTablaCirugia) or die (mysql_error());
            
            $rowTablaCirugia=mysqli_fetch_array($resTablaCirugia);
            
            $planificacion=$rowTablaCirugia[1];
            $FechaCirugia=$rowTablaCirugia[2];
            $FechaAlta=$rowTablaCirugia[3];
            $CirujanoPrincipal=$rowTablaCirugia[4];
            $CirujanoAyudante=$rowTablaCirugia[5];
            $TecnicaCirugia=$rowTablaCirugia[6];
            $ExeresisMeso=intval($rowTablaCirugia[8]);
            $OtrasResecciones=$rowTablaCirugia[9];
            $Orientacion=$rowTablaCirugia[10];
            $sqlOtraTecnica="SELECT tabla_otras_tecnicas.Id_Tipo_Otras_Tecnicas AS ID 
                                     FROM tabla_otras_tecnicas 
                                     WHERE Id_Cirugia = '$IDCirugia'";
            $rs=mysqli_query($conexion,$sqlOtraTecnica)
              or die('Error: ' . mysqli_error());
              
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
            
            $resTablaCaracteristicasCirugia=mysqli_query($conexion, $sqlTablaCaracteristicasCirugia) or die (mysql_error());
            
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
                
                $resTablaEstoma=mysqli_query($conexion, $sqlTablaEstoma) or die (mysql_error());
                
                $rowTablaEstoma=mysqli_fetch_array($resTablaEstoma);
                
                $TipoEstoma=$rowTablaEstoma[0];
                
            }else{
            $TipoEstoma=null;
            }
            
            $sqlTablaComplicaciones="SELECT B_Complicaciones FROM tabla_complicaciones WHERE Id_Cirugia='$IDCirugia'";
            
            $resTablaComplicaciones=mysqli_query($conexion, $sqlTablaComplicaciones) or die (mysql_error());
            
            $rowTablaComplicaciones=mysqli_fetch_array($resTablaComplicaciones);
            
            $Complicaciones=$rowTablaComplicaciones[0];
            
            
            if ($Complicaciones==1){
                
                $sqlTablaTipoComplicaciones="SELECT * FROM tabla_tipo_complicaciones WHERE Id_Cirugia='$IDCirugia'";
                
                $resTablaTipoComplicaciones=mysqli_query($conexion, $sqlTablaTipoComplicaciones) or die (mysql_error());
                
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
                    
                    $resTablaReintervencion=mysqli_query($conexion, $sqlTaTablaReintervencion) or die (mysql_error());
                    
                    $rowTablaReintervencion=mysqli_fetch_array($resTablaReintervencion);
                    
                    $Reintervencion=$B_Reintervencion;
                    $ReintTexto=$rowTablaReintervencion[0];
                    
                }else{
                    
                    $Reintervencion=null;
                    $ReintTexto=null;
                }
                
                
                
                if ($B_ExitusIntraoperatorio){
                    
                    
                    $sqlTaTablaExitusIntraOp="SELECT Id_Tipo_Exitus_Intraop FROM tabla_exitus_intraop WHERE Id_Cirugia='$IDCirugia'";
                    
                    $resTablaExitusIntraop=mysqli_query($conexion, $sqlTaTablaExitusIntraOp) or die (mysql_error());
                    
                    $rowTablaExitusIntraop=mysqli_fetch_array($resTablaExitusIntraop);
                    
                    $ExitusIntra=$B_ExitusIntraoperatorio;
                    $ExitusIntraTexto=$rowTablaExitusIntraop[0];
                    
                    
                }else{
                    
                    $ExitusIntra=null;
                    $ExitusIntraTexto=null;
                }
                
                
                if ($B_ExitusPostOperatorio){
                    
                    
                    $sqlTaTablaExitusPostOp="SELECT Id_Tipo_Exitus_Postop FROM tabla_exitus_postop WHERE Id_Cirugia='$IDCirugia'";
                    
                    $resTablaExitusPostop=mysqli_query($conexion, $sqlTaTablaExitusPostOp) or die (mysql_error());
                    
                    $rowTablaExitusPostop=mysqli_fetch_array($resTablaExitusPostop);
                    
                    $ExitusPost=$B_ExitusPostOperatorio;
                    $ExitusPostTexto=$rowTablaExitusPostop[0];
                    
                    
                }else{
                    
                    $ExitusPost=null;
                    $ExitusPostTexto=null;
                }
                
                
                if($B_Herida==1){
                        
                    $sqlTablaHerida="SELECT Id_Tipo_Herida FROM tabla_herida WHERE Id_Cirugia='$IDCirugia'";
                    
                    $resTablaHerida=mysqli_query($conexion, $sqlTablaHerida) or die (mysql_error());
                    
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
                    
                        $resTablaPerine=mysqli_query($conexion, $sqlTablaPerine) or die (mysql_error());
                        
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
                    
                    $resTablaAbdominales=mysqli_query($conexion, $sqlTablaAbdominales) or die (mysql_error());
                        
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
                    
                    $resTablaAnastomosisComplicaciones=mysqli_query($conexion, $sqlTablaAnastomosisComplicaciones) or die(mysql_error());
                    
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
                    
                    $resTablaOtrasComplicaciones=mysqli_query($conexion, $sqlTablaOtrasComplicaciones) or die   (mysql_error());
                    
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
        
        $resTablaPatologica=mysqli_query($conexion, $sqlTablaPatologica) or die (mysql_error());
        
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
            
            $resAnatomiaPatologica=mysqli_query($conexion, $sqlAnatomiaPatologica) or die (mysql_error());
            
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
        
        $resSeguimiento=mysqli_query($conexion, $sqlSeguimiento) or die (mysql_error());
        
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
            
            $resFechaRecidiva=mysqli_query($conexion, $sqlFechaRecidiva) or die (mysql_error());
            
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
            
            $resFechaMetastasis=mysqli_query($conexion, $sqlFechaMetastasis) or die (mysql_error());
            
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
            
            $resFechaSegundoTumor=mysqli_query($conexion, $sqlFechaSegundoTumor) or die (mysql_error());
            
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
            
            $resFechaMuerte=mysqli_query($conexion, $sqlFechaMuerte) or die (mysql_error());
            
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
             or die('Error: ' . mysqli_error() . ' 1317');
             
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
                                     Localizacion_Recidiva, Intervencion_Recidiva, Localizacion_Metastasis, Intervencion_Metastasis, Localizacion_Segundo_Tumor, Intervencion_Segundo_Tumor, Causa_Imposibilidad) 
                                     VALUES 
                                     ('$Id_Hospital', '$NHC', '$Recidiva', '$FechaRecidiva', '$Metastasis', '$FechaMetastasis', '$Segundo_Tumor', '$FechaSegundoTumor', '$Estado', '$CausaMuerte', '$FechaMuerte', 
                                     '$FechaRevision', '$Imposibilidad', '$MesesSeguimiento', '$FechaNacimiento', '$Sexo', '$Localizacion', '$Sincro', '$EcoT', '$EcoN', '$TAC', '$RmnT', '$RmnN', '$EstadioRadio', 
                                     '$Invasion', '$MetastasisInicial', '$FechaAltaSistema', '$cirugia', '$MotivoNoCirugia', '$planificacion', '$FechaCirugia', '$FechaAlta', '$TecnicaCirugia', '$OtraTecnica',
                                      '$ExeresisMeso', '$OtrasResecciones', '$ASA', '$Hallazgos', '$Perforacion', '$MetastasisHepaticas', '$ImplantesOvaricos', '$ViaOperacion', '$TiempoOPeracion', '$IntencionOperacion', '$Anastomosis',
                                       '$Reservorio', '$Estoma', '$TipoEstoma', '$Complicaciones', '$Reintervencion', '$ReintTexto', '$ExitusIntra', '$ExitusIntraTexto', '$ExitusPost', '$ExitusPostTexto', '$GeneralSepsis', '$GeneralShock', '$HHemo',
                                        '$HInfec', '$HEvis', '$HEventra', '$PInfec', '$PCicat', '$PHernia', '$AHemop', '$APerit', '$AAbsce', '$AAbscePelvica', '$AHemoPelvica', '$AIsque', '$AColec', '$AIatro', '$AIatroHuecas', 
                                        '$AIleopa', '$IleoMec', '$AEstoma', '$AnHemo', '$AnFuga', '$AnFistula', '$OHemo', '$OInfur', '$OUrologicas', '$ORespi', '$ORespiInfecc', '$OHepat', '$OVascularMec', '$OVascularInfecc', '$OFMO', '$OTEP',
                                         '$ONeuro', '$ORenal', '$OCarcio', '$TtoNeo', '$TipoNeo', '$TipoNoNeo', '$TtoAdy', '$TipoAdy', '$APT', '$APN', '$APM', 
                                         '$GangliosAis', '$GangliosAfec', '$MargenDistal', '$MargenCircun', '$TipoRes', '$Regresion', '$MesoCal', '$EstadioPatologico', '$ComenAdicionales', '$Orientacion', '$Transfu',
                                      '$ECO', '$RMN', '$RmnDist_Tumor', '$RmnDist_Adeno', '$Integ_Esfinter', 
                                    '$CirujanoPrincipal', '$CirujanoAyudante', '$Obstruccion', '$TipoHistologico', '$OtrosHistologico', '$Tumor_Sincronico',
                                    '$LocalizacionRecidiva', '$IntervencionRecidiva', '$LocalizacionMetastasis', '$IntervencionMetastasis', 
                                    '$LocalizacionSegundoTumor', '$IntervencionSegundoTumor', '$CausaImposibilidad')"; 
        
        
        
        mysqli_query($conexion,$sqlRellenaTablaGeneral)  or die('Error: ' . mysqli_error()."5085");
            


}

mysqli_query($conexion,"COMMIT");


mysqli_close($conexion);
 
?>