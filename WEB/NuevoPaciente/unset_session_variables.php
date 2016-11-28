<?php 

//Matamos las variables de sesión

/* INICIAL */
 if (isset($_SESSION["NHC"])){
    unset($_SESSION["NHC"]); 
 }	 

 if (isset($_SESSION["Fecha_Nacimiento"])){
    unset($_SESSION["Fecha_Nacimiento"]); 	 
 }
 	 

 if (isset($_SESSION["Sexo"])){
    unset($_SESSION["Sexo"]); 	 
 }
 	 

 if (isset($_SESSION["Localizacion"])){
    unset($_SESSION["Localizacion"]);
 }
 
  if (isset($_SESSION["Clasificacion_Rullier"])){
    unset($_SESSION["Clasificacion_Rullier"]);
 }
 	 
		
 if (isset($_SESSION["Sincro"])){
    unset($_SESSION["Sincro"]);		
 }
 

 if (isset($_SESSION["SincroColonDerecho"])){
    unset($_SESSION["SincroColonDerecho"]);	
 }
 

 if (isset($_SESSION["SincroColonIzquierdo"])){
    unset($_SESSION["SincroColonIzquierdo"]);	
 }
 	 

 if (isset($_SESSION["SincroColonTransverso"])){
    unset($_SESSION["SincroColonTransverso"]);	
 }
 	 
	 
 if (isset($_SESSION["SincroColonSigma"])){
    unset($_SESSION["SincroColonSigma"]);		 	 		
 }		



 if (isset($_SESSION["ECO"])){
    unset($_SESSION["ECO"]);		 	 		
 }
 		

 if (isset($_SESSION["ECO_T"])){
    unset($_SESSION["ECO_T"]);		 	 		
 }
 		
				
 if (isset($_SESSION["ECO_N"])){
    unset($_SESSION["ECO_N"]);		 	 		
 }				


 if (isset($_SESSION["TAC"])){
    unset($_SESSION["TAC"]);
}
 	 
	 
	 
 if (isset($_SESSION["RMN"])){
    unset($_SESSION["RMN"]);
 }
    
  
  if (isset($_SESSION["RMN_T"])){
    unset($_SESSION["RMN_T"]);   	 
  }
  	 	

if (isset($_SESSION["RMN_N"])){
    unset($_SESSION["RMN_N"]);
}
	
	
 if (isset($_SESSION["Dist_Tumor"])){
    unset($_SESSION["Dist_Tumor"]);			
 }
 

 if (isset($_SESSION["Dist_Adeno"])){
    unset($_SESSION["Dist_Adeno"]);		
 }
 	

 if (isset($_SESSION["Estadio_Radio"])){
    unset($_SESSION["Estadio_Radio"]);			
 }
 

 if (isset($_SESSION["Integ_Esfinter"])){
    unset($_SESSION["Integ_Esfinter"]);	
}		
	
 if (isset($_SESSION["Inv_Vecinos"])){
    unset($_SESSION["Inv_Vecinos"]); 
}
 
 
 if (isset($_SESSION["MetastInicial"])){
    unset($_SESSION["MetastInicial"]);	
 }
    
    
 if (isset($_SESSION["Metast_Hepaticas"])){
    unset($_SESSION["Metast_Hepaticas"]);			
 }
 

 if (isset($_SESSION["Metast_Oseas"])){
    unset($_SESSION["Metast_Oseas"]);	 
 }	 
 
 
 if (isset($_SESSION["Metast_Pulmonares"])){
    unset($_SESSION["Metast_Pulmonares"]);	
 }
 	 
	 
 if (isset($_SESSION["Metast_Nervioso"])){
    unset($_SESSION["Metast_Nervioso"]);	
 }
 	 
	 
 if (isset($_SESSION["Inv_Vecinos"])){
    unset($_SESSION["Inv_Vecinos"]);	 	 	 
 }
 	 	
		
 if (isset($_SESSION["Inv_Utero"])){
    unset($_SESSION["Inv_Utero"]);
 }
 	 
	 
if (isset($_SESSION["Inv_Prostata"])){
    unset($_SESSION["Inv_Prostata"]);
}


 if (isset($_SESSION["Inv_Vejiga"])){
    unset($_SESSION["Inv_Vejiga"]);
}    
    

 if (isset($_SESSION["Inv_Ureter"])){
    unset($_SESSION["Inv_Ureter"]);
}	 
	 
	 
 if (isset($_SESSION["Inv_Vagina"])){
    unset($_SESSION["Inv_Vagina"]);	 
}
	 
	 
 if (isset($_SESSION["Inv_Seminal"])){
    unset($_SESSION["Inv_Seminal"]);
 }
 	 
	 
 if (isset($_SESSION["Inv_Sacro"])){
    unset($_SESSION["Inv_Sacro"]);	 	 			
 }		


if (isset($_SESSION["ButtonEnviarInicial"])){
    unset($_SESSION["ButtonEnviarInicial"]); 
}


/* TRATAMIENTO */
 
if (isset($_SESSION["B_Tto_Neo"])){
    unset($_SESSION["B_Tto_Neo"]); 
}


if (isset($_SESSION["Tipo_TTO_Neoadyuvante"])){
    unset($_SESSION["Tipo_TTO_Neoadyuvante"]); 
}

if (isset($_SESSION["tipo_no_neo"])){
    unset($_SESSION["tipo_no_neo"]); 
}

if (isset($_SESSION["TTO_Adyuvante"])){
    unset($_SESSION["TTO_Adyuvante"]); 
}

if (isset($_SESSION["Tipo_TTO_Adyuvante"])){
    unset($_SESSION["Tipo_TTO_Adyuvante"]); 
}    


if (isset($_SESSION["Adyuvante_Pendiente"])){
    unset($_SESSION["Adyuvante_Pendiente"]); 
}

if (isset($_SESSION["ButtonEnviarTratamiento"])){
    unset($_SESSION["ButtonEnviarTratamiento"]); 
}


/* CIRUGIA */
 
 
  if (isset($_SESSION["B_Cirugia"])){
    unset($_SESSION["B_Cirugia"]); 
}

  if (isset($_SESSION["Motivo_No_Cirugia"])){
    unset($_SESSION["Motivo_No_Cirugia"]); 
}


  if (isset($_SESSION["Tipo_Cirugia"])){
    unset($_SESSION["Tipo_Cirugia"]); 
}


  if (isset($_SESSION["Fecha_Cirugia"])){
    unset($_SESSION["Fecha_Cirugia"]); 
}
 

if (isset($_SESSION["Fecha_Alta_Pendiente"])){
    unset($_SESSION["Fecha_Alta_Pendiente"]); 
} 
  
if (isset($_SESSION["Fecha_Alta"])){
    unset($_SESSION["Fecha_Alta"]); 
}
  

 if (isset($_SESSION["Cirujano_Principal"])){
    unset($_SESSION["Cirujano_Principal"]); 
}


 if (isset($_SESSION["Cirujano_Ayudante"])){
    unset($_SESSION["Cirujano_Ayudante"]); 
} 


 if (isset($_SESSION["Tecnicas_Cirugia"])){
    unset($_SESSION["Tecnicas_Cirugia"]); 
}		
		

if (isset($_SESSION["Otra_Tecnica_Cirugia"])){
    unset($_SESSION["Otra_Tecnica_Cirugia"]); 
}		
				
if (isset($_SESSION["Orientacion"])){
    unset($_SESSION["Orientacion"]); 
}

if (isset($_SESSION["Exeresis_Meso"])){
    unset($_SESSION["Exeresis_Meso"]); 
}		
		

if (isset($_SESSION["Otras_Resecc_Viscerales"])){
    unset($_SESSION["Otras_Resecc_Viscerales"]); 
}				
		

if (isset($_SESSION["Res_Seminales"])){
    unset($_SESSION["Res_Seminales"]); 
}


if (isset($_SESSION["Res_Peritoneo"])){
    unset($_SESSION["Res_Peritoneo"]); 
}


if (isset($_SESSION["Res_Vejiga"])){
    unset($_SESSION["Res_Vejiga"]); 
}	


if (isset($_SESSION["Res_Utero"])){
    unset($_SESSION["Res_Utero"]); 
}	
	

if (isset($_SESSION["Res_Vagina"])){
    unset($_SESSION["Res_Vagina"]); 
}	


if (isset($_SESSION["Res_Prostata"])){
    unset($_SESSION["Res_Prostata"]); 
}		


if (isset($_SESSION["Res_Hepatica"])){
    unset($_SESSION["Res_Hepatica"]); 
}

if (isset($_SESSION["Res_IDelgado"])){
    unset($_SESSION["Res_IDelgado"]); 
}	


if (isset($_SESSION["Res_Coccix"])){
    unset($_SESSION["Res_Coccix"]); 
}	


if (isset($_SESSION["Res_Sacro"])){
    unset($_SESSION["Res_Sacro"]); 
}	

if (isset($_SESSION["Res_Ureter"])){
    unset($_SESSION["Res_Ureter"]); 
}

if (isset($_SESSION["Res_Ovarios"])){
    unset($_SESSION["Res_Ovarios"]); 
}

if (isset($_SESSION["Res_Trompas"])){
    unset($_SESSION["Res_Trompas"]); 
}		


if (isset($_SESSION["ASA"])){
    unset($_SESSION["ASA"]); 
}	


if (isset($_SESSION["Hallazgos_Intraoperatorios"])){
    unset($_SESSION["Hallazgos_Intraoperatorios"]); 
}	

	
if (isset($_SESSION["Perforacion_Tumoral"])){
    unset($_SESSION["Perforacion_Tumoral"]); 
}		


if (isset($_SESSION["Tipo_Metast_Hepaticas"])){
    unset($_SESSION["Tipo_Metast_Hepaticas"]); 
}


if (isset($_SESSION["Imp_Ovaricos"])){
    unset($_SESSION["Imp_Ovaricos"]); 
}
	

if (isset($_SESSION["Obstruccion"])){
    unset($_SESSION["Obstruccion"]); 
}	
		

if (isset($_SESSION["Via_Operacion"])){
    unset($_SESSION["Via_Operacion"]); 
}		
	
	
if (isset($_SESSION["Tiempo_Operacion"])){
    unset($_SESSION["Tiempo_Operacion"]); 
}		
		

if (isset($_SESSION["Transfusiones"])){
    unset($_SESSION["Transfusiones"]); 
}		
				

if (isset($_SESSION["Intencion_Operatoria"])){
    unset($_SESSION["Intencion_Operatoria"]); 
}		


if (isset($_SESSION["Anastomosis"])){
    unset($_SESSION["Anastomosis"]); 
}


if (isset($_SESSION["Reservorio"])){
    unset($_SESSION["Reservorio"]); 
}


if (isset($_SESSION["Estoma_Derivacion"])){
    unset($_SESSION["Estoma_Derivacion"]); 
}


if (isset($_SESSION["Tipo_Estoma"])){
    unset($_SESSION["Tipo_Estoma"]); 
}


if (isset($_SESSION["Complicaciones"])){
    unset($_SESSION["Complicaciones"]); 
}
			
				
if (isset($_SESSION["Reintervencion"])){
    unset($_SESSION["Reintervencion"]); 
}		


if (isset($_SESSION["Tipo_Reintervencion"])){
    unset($_SESSION["Tipo_Reintervencion"]); 
}


if (isset($_SESSION["Exitus_Intra"])){
    unset($_SESSION["Exitus_Intra"]); 
}


if (isset($_SESSION["Causa_Exitus_Intra"])){
    unset($_SESSION["Causa_Exitus_Intra"]); 
}


if (isset($_SESSION["Exitus_Post"])){
    unset($_SESSION["Exitus_Post"]); 
}


if (isset($_SESSION["Causa_Exitus_Post"])){
    unset($_SESSION["Causa_Exitus_Post"]); 
}

if (isset($_SESSION["Generales_Sepsis"])){
    unset($_SESSION["Generales_Sepsis"]); 
}


if (isset($_SESSION["Generales_Shock"])){
    unset($_SESSION["Generales_Shock"]); 
}


if (isset($_SESSION["Herida_Hemorragia"])){
    unset($_SESSION["Herida_Hemorragia"]); 
}


if (isset($_SESSION["Herida_Infeccion"])){
    unset($_SESSION["Herida_Infeccion"]); 
}


if (isset($_SESSION["Herida_Evisceracion"])){
    unset($_SESSION["Herida_Evisceracion"]); 
}


if (isset($_SESSION["Herida_Eventracion"])){
    unset($_SESSION["Herida_Eventracion"]); 
}


if (isset($_SESSION["Perine_Hernia"])){
    unset($_SESSION["Perine_Hernia"]); 
}

if (isset($_SESSION["Perine_Infeccion"])){
    unset($_SESSION["Perine_Infeccion"]); 
}		

if (isset($_SESSION["Perine_Retraso_Cicatrizacion"])){
    unset($_SESSION["Perine_Retraso_Cicatrizacion"]); 
}	


if (isset($_SESSION["Abdominales_Hemoperitoneo"])){
    unset($_SESSION["Abdominales_Hemoperitoneo"]); 
}	


if (isset($_SESSION["Abdominales_Peri_Difusas"])){
    unset($_SESSION["Abdominales_Peri_Difusas"]); 
}	


if (isset($_SESSION["Abdominales_Abceso_Abdominal"])){
    unset($_SESSION["Abdominales_Abceso_Abdominal"]); 
}	


if (isset($_SESSION["Abdominales_Abceso_Pelvico"])){
    unset($_SESSION["Abdominales_Abceso_Pelvico"]); 
}


if (isset($_SESSION["Abdominales_Hemo_Pelvica"])){
    unset($_SESSION["Abdominales_Hemo_Pelvica"]); 
}

if (isset($_SESSION["Abdominales_Isquemia_Intestinal"])){
    unset($_SESSION["Abdominales_Isquemia_Intestinal"]); 
}	


if (isset($_SESSION["Abdominales_Colecistitis"])){
    unset($_SESSION["Abdominales_Colecistitis"]); 
}	


if (isset($_SESSION["Abdominales_Iatrog_Vias_Urinarias"])){
    unset($_SESSION["Abdominales_Iatrog_Vias_Urinarias"]); 
}			


if (isset($_SESSION["Abdominales_Iatrog_Vias_Huecas"])){
    unset($_SESSION["Abdominales_Iatrog_Vias_Huecas"]); 
}           

if (isset($_SESSION["Abdominales_Ileo_Paralitico_Prolongado"])){
    unset($_SESSION["Abdominales_Ileo_Paralitico_Prolongado"]); 
}


if (isset($_SESSION["Abdominales_Ileo_Mecanico"])){
    unset($_SESSION["Abdominales_Ileo_Mecanico"]); 
}


if (isset($_SESSION["Abdominales_Estoma"])){
    unset($_SESSION["Abdominales_Estoma"]); 
}

if (isset($_SESSION["Anastomosis_Hemorragia"])){
    unset($_SESSION["Anastomosis_Hemorragia"]); 
}


if (isset($_SESSION["Anastomosis_Fuga"])){
    unset($_SESSION["Anastomosis_Fuga"]); 
}

if (isset($_SESSION["Anastomosis_Fistula"])){
    unset($_SESSION["Anastomosis_Fistula"]); 
}

if (isset($_SESSION["Otras_Hemo_Diges"])){
    unset($_SESSION["Otras_Hemo_Diges"]); 
}		


if (isset($_SESSION["Otras_Infeccion_Urinaria"])){
    unset($_SESSION["Otras_Infeccion_Urinaria"]); 
}		


if (isset($_SESSION["Otras_Cardiovascular"])){
    unset($_SESSION["Otras_Cardiovascular"]); 
}		


if (isset($_SESSION["Otras_Vascular_Infecc"])){
    unset($_SESSION["Otras_Vascular_Infecc"]); 
}       


if (isset($_SESSION["Otras_Vascular_Mec"])){
    unset($_SESSION["Otras_Vascular_Mec"]); 
}   

if (isset($_SESSION["Otras_Hepatica"])){
    unset($_SESSION["Otras_Hepatica"]); 
}		



if (isset($_SESSION["Otras_Respiratoria"])){
    unset($_SESSION["Otras_Respiratoria"]); 
}		


if (isset($_SESSION["Otras_Respiratoria_Infecc"])){
    unset($_SESSION["Otras_Respiratoria_Infecc"]); 
}       

if (isset($_SESSION["Otras_FMO"])){
    unset($_SESSION["Otras_FMO"]); 
}		
		

if (isset($_SESSION["Otras_TEP"])){
    unset($_SESSION["Otras_TEP"]); 
}


if (isset($_SESSION["Otras_Neuroapraxia"])){
    unset($_SESSION["Otras_Neuroapraxia"]); 
}


if (isset($_SESSION["Comp_Otras_Urologicas"])){
    unset($_SESSION["Comp_Otras_Urologicas"]); 
}       


if (isset($_SESSION["Otras_Renal"])){
    unset($_SESSION["Otras_Renal"]); 
}	


if (isset($_SESSION["ButtonEnviarCirugia"])){
    unset($_SESSION["ButtonEnviarCirugia"]); 
}


/*  PATOLOGICA */

if (isset($_SESSION["Patologica_Pendiente"])){
    unset($_SESSION["Patologica_Pendiente"]); 
} 
    

if (isset($_SESSION["No_Patologica"])){
    unset($_SESSION["No_Patologica"]); 
}
 
if (isset($_SESSION["Tipo_Histologico"])){
    unset($_SESSION["Tipo_Histologico"]); 
} 


if (isset($_SESSION["Otros_Histologico"])){
    unset($_SESSION["Otros_Histologico"]); 
} 


if (isset($_SESSION["T_Patologico"])){
    unset($_SESSION["T_Patologico"]); 
}


if (isset($_SESSION["N_Patologico"])){
    unset($_SESSION["N_Patologico"]); 
}


if (isset($_SESSION["M_Patologico"])){
    unset($_SESSION["M_Patologico"]); 
}


if (isset($_SESSION["Ganglios_Aislados"])){
    unset($_SESSION["Ganglios_Aislados"]); 
}


if (isset($_SESSION["Ganglios_Afectados"])){
    unset($_SESSION["Ganglios_Afectados"]); 
}


if (isset($_SESSION["Estadio_Patologico"])){
    unset($_SESSION["Estadio_Patologico"]); 
}


if (isset($_SESSION["Margen_Distal"])){
    unset($_SESSION["Margen_Distal"]); 
} 


if (isset($_SESSION["Margen_Circunferencial"])){
    unset($_SESSION["Margen_Circunferencial"]); 
}


if (isset($_SESSION["Tipo_Res"])){
    unset($_SESSION["Tipo_Res"]); 
}


if (isset($_SESSION["Tipo_Regresion"])){
    unset($_SESSION["Tipo_Regresion"]); 
}


if (isset($_SESSION["Estadio_Tumor_Sincronico"])){
    unset($_SESSION["Estadio_Tumor_Sincronico"]); 
}


if (isset($_SESSION["Calidad_Mesorrecto"])){
    unset($_SESSION["Calidad_Mesorrecto"]); 
}




if (isset($_SESSION["ButtonEnviarPatologica"])){
    unset($_SESSION["ButtonEnviarPatologica"]); 
}


/* SEGUIMIENTO */

 if (isset($_SESSION["Fecha_Revision"])){
    unset($_SESSION["Fecha_Revision"]); 
}
 
 
if (isset($_SESSION["Recidiva"])){
    unset($_SESSION["Recidiva"]); 
}


if (isset($_SESSION["Fecha_Recidiva"])){
    unset($_SESSION["Fecha_Recidiva"]); 
}


if (isset($_SESSION["Localizacion_Recidiva"])){
    unset($_SESSION["Localizacion_Recidiva"]); 
}


if (isset($_SESSION["Intervencion_Recidiva"])){
    unset($_SESSION["Intervencion_Recidiva"]); 
}


if (isset($_SESSION["Metastasis"])){
    unset($_SESSION["Metastasis"]); 
}


if (isset($_SESSION["Fecha_Metastasis"])){
    unset($_SESSION["Fecha_Metastasis"]); 
}


if (isset($_SESSION["Localizacion_Metastasis"])){
    unset($_SESSION["Localizacion_Metastasis"]); 
}


if (isset($_SESSION["Intervencion_Metastasis"])){
    unset($_SESSION["Intervencion_Metastasis"]); 
}


if (isset($_SESSION["Segundo_Tumor"])){
    unset($_SESSION["Segundo_Tumor"]); 
}


if (isset($_SESSION["Fecha_Segundo_Tumor"])){
    unset($_SESSION["Fecha_Segundo_Tumor"]); 
}


if (isset($_SESSION["Localizacion_Segundo_Tumor"])){
    unset($_SESSION["Localizacion_Segundo_Tumor"]); 
}


if (isset($_SESSION["Intervencion_Segundo_Tumor"])){
    unset($_SESSION["Intervencion_Segundo_Tumor"]); 
}


if (isset($_SESSION["Estado"])){
    unset($_SESSION["Estado"]); 
}


if (isset($_SESSION["Fecha_Muerte"])){
    unset($_SESSION["Fecha_Muerte"]); 
}


if (isset($_SESSION["Causa_Muerte"])){
    unset($_SESSION["Causa_Muerte"]); 
}


if (isset($_SESSION["Imposibilidad"])){
    unset($_SESSION["Imposibilidad"]); 
}


if (isset($_SESSION["Causa_Imposibilidad"])){
    unset($_SESSION["Causa_Imposibilidad"]); 
}

if (isset($_SESSION["Comentarios_Adicionales"])){
    unset($_SESSION["Comentarios_Adicionales"]); 
}


/*** Variable se utiliza en Pendientes (Adyuvante, FechaALta y Anatomía patológica) ***/
if (isset($_SESSION["NHCPendientes"])){
	unset($_SESSION["NHCPendientes"]);
}



?>






