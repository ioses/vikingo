/* **********************   jQuery   *********************************/   
$(document).ready(function() {

   //Ver si entramos de "modificar paciente" o de "introducir nuevo paciente"
   if ($('#EnviarInicial').val() == -1 || $('#EnviarInicial').val() == null)
    {
        //En los ListBox no salga nada seleccionado
        $('#Localizacion').prop('selectedIndex', -1);
        $('#ECO_Tipo_T').prop('selectedIndex', -1);
        $('#ECO_Tipo_N').prop('selectedIndex', -1);
        $('#RNM_Tipo_T').prop('selectedIndex', -1);
        $('#RNM_Tipo_N').prop('selectedIndex', -1);
    }
    else //Cargamos las variables de la sesion anterior
    {
        CargarDatos();//Entramos por modificar, cargamos los datos del paciente
    } 
	
	$('#Distancias_Margen').change(function(){
	
		 if (document.Inicial.B_Tec_RNM[1].checked) {
		   if ($('#Distancias_Margen').is(':checked')) {
				document.getElementById("Dist_Tumor").disabled=true;
				document.getElementById("Dist_Adeno").disabled=true;
			}
			else
			{
				document.getElementById("Dist_Tumor").disabled=false;
				document.getElementById("Dist_Adeno").disabled=false;
			   
			}
			
			RMN_T = document.Inicial.RNM_Tipo_T.selectedIndex;
			RMN_N = document.Inicial.RNM_Tipo_N.selectedIndex;

			
			 //Deshabilita distancia al margen circunferencial
			if(RMN_N==0){ 
				document.getElementById("Dist_Adeno").disabled=true;
			}
			
			if(RMN_T==0 || RMN_T==1 || RMN_T==2){
				document.getElementById("Dist_Tumor").disabled=true;
			}
		}
		
	});
 
});

function DialogMessage(str, title)
{
    $( "#dialog-message" ).dialog({
 
            width: 500,
            height: 200,
           position: 'top',
            modal: true,
            title: title,
            buttons: {
			 	Ok: function() {
				$( this ).dialog( "close" );
				}
		 }			
        });
   
    $("#textoalert").text(str);
}      
    
      
/* **********************   javascript   *********************************/ 

function CambioVariables(){
    if(document.getElementById("Localizacion").value>6){
        document.getElementById("Clasificacion_Rullier").disabled=true;
        
        document.getElementById("Clasificacion_Rullier").value=0;
    }else{
        document.getElementById("Clasificacion_Rullier").disabled=false;
    }
}

function HabilitarECO() {
    if (document.Inicial.B_Tec_ECO[0].checked) {
        document.getElementById("ECO_Tipo_T").disabled = true;
        document.getElementById("ECO_Tipo_N").disabled = true;
    } else if (document.Inicial.B_Tec_ECO[1].checked) {
        document.getElementById("ECO_Tipo_T").disabled = false;
        document.getElementById("ECO_Tipo_N").disabled = false;
    }
}

function HabilitarRNM() {

    if (document.Inicial.B_Tec_RNM[0].checked) {
        document.getElementById("RNM_Tipo_T").disabled = true;
        document.getElementById("RNM_Tipo_N").disabled = true;
        document.getElementById("Dist_Tumor").disabled = true;
        document.getElementById("Dist_Adeno").disabled = true;
		document.getElementById("Distancias_Margen").disabled = true;
		
    } else if (document.Inicial.B_Tec_RNM[1].checked) {
        document.getElementById("RNM_Tipo_T").disabled = false;
        document.getElementById("RNM_Tipo_N").disabled = false;
        document.getElementById("Dist_Tumor").disabled = false;
        document.getElementById("Dist_Adeno").disabled = false;
		document.getElementById("Distancias_Margen").disabled = false;
    }
	
	//Si entramos de cargarDatos, comprobamos si el checkBox de margen_Distancias está activado
	//Para desactivar distancias al tumor y adenopatías
	if (document.Inicial.Distancias_Margen.checked) {
        document.getElementById("Dist_Tumor").disabled = true;
        document.getElementById("Dist_Adeno").disabled = true;
	}
        
}

function HabilitaMetastasis()
{
    if (document.Inicial.Metast[0].checked) { //No
        Inicial.Metast_Hepaticas.disabled=true; 
        Inicial.Metast_Oseas.disabled=true; 
        Inicial.Metast_Pulmonares.disabled=true; 
        Inicial.Metast_Nervioso.disabled=true;
    } else if (document.Inicial.Metast[1].checked) { //Si
        Inicial.Metast_Hepaticas.disabled=false; 
        Inicial.Metast_Oseas.disabled=false; 
        Inicial.Metast_Pulmonares.disabled=false; 
        Inicial.Metast_Nervioso.disabled=false;
    }
}

function HabilitaColon()
{
    if (document.Inicial.B_Sincro[0].checked) { //No
        Inicial.Colon_Derecho.disabled=true; 
        Inicial.Colon_transverso.disabled=true; 
        Inicial.Colon_Izquierdo.disabled=true; 
        Inicial.Colon_Sigma.disabled=true;
    } else if (document.Inicial.B_Sincro[1].checked) { //Si
        Inicial.Colon_Derecho.disabled=false; 
        Inicial.Colon_transverso.disabled=false; 
        Inicial.Colon_Izquierdo.disabled=false; 
        Inicial.Colon_Sigma.disabled=false;
    }
}

//Comprobación de los checks (que en los subelementos alguno esté marcado)
function CheckObligatorios() {
    var Sincro = 0;
    var Metast = 0;
    var Vecino = 0;
    var Total = 0;
    
    var checkOK=0;
    var FechaOK=0;

    if (document.getElementById("B_Sincro_SI").checked) {
        if (document.getElementById("Colon_Derecho").checked || document.getElementById("Colon_transverso").checked || document.getElementById("Colon_Izquierdo").checked || document.getElementById("Colon_Sigma").checked) {
            Sincro = 2;
        } else {
            Sincro = 10;
        }
    }

    if (document.getElementById("Metast_SI").checked) {
        if (document.getElementById("Metast_Hepaticas").checked || document.getElementById("Metast_Oseas").checked || document.getElementById("Metast_Pulmonares").checked || document.getElementById("Metast_Nervioso").checked) {
            Metast = 2;
        } else {
            Metast = 21;
        }
    }
    
    if (document.getElementById("B_Inv_Vecinos_SI").checked){
		if (document.getElementById("Inv_Utero").checked || document.getElementById("Inv_Prostata").checked || document.getElementById("Inv_Vejiga").checked || document.getElementById("Inv_Ureteres").checked || document.getElementById("Inv_Vagina").checked || document.getElementById("Inv_Seminales").checked || document.getElementById("Inv_Sacro").checked){
			Vecino = 2;
		}  else{
			Vecino = 32;
		}  	
    	
    	
    }



    Total = Metast + Sincro + Vecino;

    if (Total == 4 || Total == 0 || Total == 2 || Total==6) {
       
       // return true;
       checkOK=1;	
       
    } else if (Total == 12 || Total==10 || Total==14) {

			DialogMessage("Debe seleccionar algún órgano en tumor sincrónico");
 
        return false;     

    } else if (Total == 23 || Total==21 || Total==25) {
        DialogMessage("Debe seleccionar algún órgano en metástasis","Faltan datos");
        return false;
    } else if (Total == 32 || Total==34 || Total==36) {
     	DialogMessage("Debe seleccionar algún órgano vecino","Faltan datos");
     	return false;
     } else if (Total == 31 || Total==33) {
     	DialogMessage("Debe seleccionar algún órgano sincrónico y de metástasis","Faltan datos");
     	return false; 
     } else if(Total==42 || Total==44){
     	DialogMessage("Debe seleccionar algún órgano sincrónico y vecino","Faltan datos");
     	return false;
     }else if(Total==53 || Total==55){
     	DialogMessage("Debe seleccionar algún órgano de metástasis y vecino","Faltan datos");
     	return false;
     }else if (Total==63){
     	DialogMessage("Debe seleccionar algún órgano de metástasis, vecino y sincrónico","Faltan datos");
     	return false;
     }else{
     	DialogMessage(Total);
     	return false;
     }
     
     var Today = new Date();
 	
 	 var FechaNacimiento= document.getElementById("Nacimiento").value;
 	  var Año  = parseInt(FechaNacimiento.substring(0,4),10);
 	  var Mes = parseInt(FechaNacimiento.substring(5,7),10);
 	  Mes=Mes-1;
 	  var Dia= parseInt(FechaNacimiento.substring(8,10),10);
 	  
 	  var Nacimiento = new Date(Año, Mes, Dia);
 	 
  
     
     if (Nacimiento>Today){
     	DialogMessage("La fecha de nacimiento es errónea","Fecha errónea");
     	return false;
     }else {
     	FechaOK=1;
     }
     
    
    if (checkOK==1 && FechaOK==1){
    	return true;
    }
     

  }
  
function DeshabilitaOrganos() {
    var Sexo = document.Inicial.Radio_Sexo.value

    if (document.Inicial.Radio_Sexo[0].checked && document.Inicial.B_Inv_Vecinos[1].checked) {
        document.getElementById("Inv_Utero").disabled = true;
        document.getElementById("Inv_Vagina").disabled = true;
        document.getElementById("Inv_Prostata").disabled = false;
        document.getElementById("Inv_Seminales").disabled = false;
        document.getElementById("Inv_Vejiga").disabled = false;
        document.getElementById("Inv_Sacro").disabled = false;
        document.getElementById("Inv_Ureteres").disabled = false;

    } else if (document.Inicial.Radio_Sexo[1].checked && document.Inicial.B_Inv_Vecinos[1].checked) {
        document.getElementById("Inv_Utero").disabled = false;
        document.getElementById("Inv_Vagina").disabled = false;
        document.getElementById("Inv_Prostata").disabled = true;
        document.getElementById("Inv_Seminales").disabled = true;
        document.getElementById("Inv_Vejiga").disabled = false;
        document.getElementById("Inv_Sacro").disabled = false;
        document.getElementById("Inv_Ureteres").disabled = false;

    } else if (document.Inicial.B_Inv_Vecinos[0].checked) {
        document.getElementById("Inv_Utero").disabled = true;
        document.getElementById("Inv_Vagina").disabled = true;
        document.getElementById("Inv_Prostata").disabled = true;
        document.getElementById("Inv_Seminales").disabled = true;
        document.getElementById("Inv_Vejiga").disabled = true;
        document.getElementById("Inv_Sacro").disabled = true;
        document.getElementById("Inv_Ureteres").disabled = true;

    }

}

//Cálculo del estadio radiológico
function EstadioRadiologico() {

    var ECO_T = 0;
    var ECO_N = 0;

    var RMN_T = 0;
    var RMN_N = 0;

    ECO_T = document.Inicial.ECO_Tipo_T.selectedIndex;
    ECO_N = document.Inicial.ECO_Tipo_N.selectedIndex;

    RMN_T = document.Inicial.RNM_Tipo_T.selectedIndex;
    RMN_N = document.Inicial.RNM_Tipo_N.selectedIndex;

    var Radio_T = 0;
    var Radio_N = 0;

    if (ECO_T == 5) {
        ECO_T = 0;
    }

    if (ECO_T > RMN_T) {
        Radio_T = ECO_T;
    } else if (ECO_T < RMN_T) {
        Radio_T = RMN_T;
    } else {
        Radio_T = RMN_T;
    }

    if (ECO_N == 2) {
        ECO_N = 0;
    }

    if (ECO_N > RMN_N) {
        Radio_N = ECO_N;
    } else if (ECO_N < RMN_N) {
        Radio_N = RMN_N;
    } else {
        Radio_N = RMN_N;
    }

    if (document.Inicial.Metast[1].checked) {
        document.getElementById("Id_Estadio_Radio").value = 4;
    } else if (Radio_N == 1 || Radio_N == 2) {
        document.getElementById("Id_Estadio_Radio").value = 3;
    } else if (Radio_T == 3 || Radio_T == 4) {
        document.getElementById("Id_Estadio_Radio").value = 2;
    } else if (Radio_T == 1 || Radio_T == 2) {
        document.getElementById("Id_Estadio_Radio").value = 1;
    } else {
        document.getElementById("Id_Estadio_Radio").value = 0;
    }
    
	//Si entramos de cargarDatos, comprobamos si el checkBox de margen_Distancias está activado
    //Para desactivar distancias al tumor y adenopatías
	
	if (document.Inicial.B_Tec_RNM[1].checked) {
		if (document.Inicial.Distancias_Margen.checked) {
			document.getElementById("Dist_Tumor").disabled = true;
			document.getElementById("Dist_Adeno").disabled = true;
		}else{
		
			 //Deshabilita distancia al margen circunferencial
			if(RMN_N==0){ 
				document.getElementById("Dist_Adeno").disabled=true;
			}else{
				document.getElementById("Dist_Adeno").disabled=false;
			}
			
			if(RMN_T==0 || RMN_T==1 || RMN_T==2){
				document.getElementById("Dist_Tumor").disabled=true;
			}
			else
			{
				document.getElementById("Dist_Tumor").disabled=false;
			}
		}
    }
}

/* **********************   AJAX   *********************************/ 
//Entramos por modificar, cargamos los datos del paciente
function CargarDatos() {
    var xmlhttp;
 
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
           
            var data = JSON.parse( xmlhttp.responseText );
           
            
            /******* Datos iniciales *******/
            document.getElementById("NHC").value=data["NHC"];
            document.getElementById("Nacimiento").value=data["Fecha_Nacimiento"];
           
           switch (data["Sexo"]) {
                case 1:
                    putRadioButton('Radio_Sexo_H');
                    break;
                case 2:
                    putRadioButton('Radio_Sexo_M');
                    break;
                default:
                    break;
            }
           
         
            
             /******* Localización *******/
           
            $('#Localizacion').prop('selectedIndex', data["Localizacion"]);
                       
            switch (data["Sincro"]) {
                case 0:
                    putRadioButton('B_Sincro_NO');
                    break;
                case 1:
                    putRadioButton('B_Sincro_SI');
                    break;
                default:
                    break;
            }
            
            isCheckBoxSelected('Colon_Derecho', data["SincroColonDerecho"]);
            isCheckBoxSelected('Colon_transverso', data["SincroColonIzquierdo"]);
            isCheckBoxSelected('Colon_Izquierdo', data["SincroColonTransverso"]);
            isCheckBoxSelected('Colon_Sigma', data["SincroColonSigma"]);
    
    
            HabilitaColon();
            
            /******* Radiologia *******/
           
           if (data["Estadio_Radio"]==6){
           		document.getElementById("Id_Estadio_Radio").value=0;
           }else{
           document.getElementById("Id_Estadio_Radio").value=data["Estadio_Radio"];
           }
           
           if(data["ECO"] == "1")//Han marcado ECO
           {
               putRadioButton('B_Tec_ECO_SI');
               
               $('#ECO_Tipo_T').prop('selectedIndex', data["ECO_T"] - 1);
               $('#ECO_Tipo_N').prop('selectedIndex', data["ECO_N"] - 1);
               
           }else{
               putRadioButton('B_Tec_ECO_NO');
               $('#ECO_Tipo_T').prop('selectedIndex', -1);
               $('#ECO_Tipo_N').prop('selectedIndex', -1);
               
           }
           HabilitarECO();
           
            switch (data["TAC"]) {
                case 0:
                    putRadioButton('B_TAC_NO');
                    break;
                case 1:
                    putRadioButton('B_TAC_SI');
                    break;
                default:
                    break;
            }
            
            switch (data["RMN"]) {
                case 0:
					
                    putRadioButton('B_Tec_RNM_NO');
                    $('#RNM_Tipo_T').prop('selectedIndex', -1);
                    $('#RNM_Tipo_N').prop('selectedIndex', -1);

                    break;
                case 1:
					
                    putRadioButton('B_Tec_RNM_SI');
                    $('#RNM_Tipo_T').prop('selectedIndex', data["RMN_T"] - 1);
                    $('#RNM_Tipo_N').prop('selectedIndex', data["RMN_N"] - 1);

				   //Habilita o Dehasbilita distancia al margen circunferencial en RMN
				   if (data["Dist_Tumor"] == -1 && data["Dist_Adeno"] == -1)
				   {	
						document.getElementById("Distancias_Margen").checked = true;
						document.getElementById("Dist_Tumor").disabled=true;
						document.getElementById("Dist_Adeno").disabled=true;
						 
				   }
				   else
				   {	
						document.getElementById("Distancias_Margen").checked = false;
						document.getElementById("Dist_Tumor").value=data["Dist_Tumor"];
						document.getElementById("Dist_Adeno").value=data["Dist_Adeno"];
				   }

                    break;
                    
                default:
                    break;
            }

           HabilitarRNM();
           
           
           
           
            /******* Otras afecciones *******/
           switch (data["Integ_Esfinter"]) {
                case 1:
                    putRadioButton('Integ_Libre');
                    break;
                case 2:
                    putRadioButton('Integ_Afecto');
                    break;
                case 3:
                    putRadioButton('Integ_No_Datos');
                    break;
                default:
                    break;
            }    
          
          
          switch (data["MetastInicial"]) {
                case 0:
                    putRadioButton('Metast_No');
                    break;
                case 1:
                    putRadioButton('Metast_SI');
                    break;
                default:
                    break;
            }
            
            isCheckBoxSelected('Metast_Hepaticas', data["Metast_Hepaticas"]);
            isCheckBoxSelected('Metast_Oseas', data["Metast_Oseas"]);
            isCheckBoxSelected('Metast_Pulmonares', data["Metast_Pulmonares"]);
            isCheckBoxSelected('Metast_Nervioso', data["Metast_Nervioso"]);

            
           HabilitaMetastasis();     
          
          switch (data["Inv_Vecinos"]) {
                case 0:
                    putRadioButton('B_Inv_Vecinos_No');
                    break;
                case 1:
                    putRadioButton('B_Inv_Vecinos_SI');
                    break;
                default:
                    break;
            }
            
            isCheckBoxSelected('Inv_Utero', data["Inv_Utero"]);
            isCheckBoxSelected('Inv_Prostata', data["Inv_Prostata"]);
            isCheckBoxSelected('Inv_Vejiga', data["Inv_Vejiga"]);
            isCheckBoxSelected('Inv_Ureteres', data["Inv_Ureter"]);
            isCheckBoxSelected('Inv_Vagina', data["Inv_Vagina"]);
            isCheckBoxSelected('Inv_Seminales', data["Inv_Seminal"]);
            isCheckBoxSelected('Inv_Sacro', data["Inv_Sacro"]);
            
            DeshabilitaOrganos();
            
            EstadioRadiologico();
          

        }
    }
    
    xmlhttp.open("POST", "GetSessionVariables.php?", true);
    xmlhttp.send();
}

//Función de ayuda para que haga check o uncheck en los chekbox
function isCheckBoxSelected(idSelect, data)
{

    
    if (data != null)
    {
        putCheckBox(idSelect);
    }
    else
    {
        removeCheckBox(idSelect);
    }
}

//Función para ver si el NHC introducido por el usuario está introducido anteriormente en la BDD
function CompruebaNHC(str){
	
	 var xmlhttp;
	 var NHC;
 
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    		
            //alert(xmlhttp.responseText) ;
                                      
		    if (xmlhttp.responseText==1)
		    {
		        DialogMessage("Ya existe un paciente con este NHC","Comprobación NHC");
		        document.getElementById("ButtonEnviarInicial").disabled=true;	   
		    }else{
		    	document.getElementById("ButtonEnviarInicial").disabled=false;
		    }      

		}

	}
	xmlhttp.open("GET","getCompruebaNHC.php?q="+str,true);
	xmlhttp.send();
}


      

