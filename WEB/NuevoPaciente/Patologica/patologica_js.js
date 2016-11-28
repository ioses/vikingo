/* **********************   jQuery   *********************************/   
$(document).ready(function() {
        
   //Ver si entramos de "modificar paciente" o de "introducir nuevo paciente"    
    if ($('#EnviarPatologica').val() == -1 || $('#EnviarPatologica').val() == null)
    {
        //En los ListBox no salga nada seleccionado
        $('#tabla_tipo_histologico').prop('selectedIndex', -1);
        $('#tabla_tipo_t').prop('selectedIndex', -1);
        $('#Id_Estadio_Sincronico').prop('selectedIndex', -1);
        $('#tabla_tipo_regresion').prop('selectedIndex', -1);
        disabledElement('tabla_tipo_otros_histologico');
        
    }else
    {
        CargarDatos();//Entramos por modificar, cargamos los datos del paciente
    }
    
    //Cargar los datos para los inputs
    $("#tabla_tipo_otros_histologico").autocomplete({
        source : 'get_lista_otros_histologico.php'//, minLength:2
    });
    
    
    //Rellenar pendiente la página de anatomía patológica     
    $('#rellenar').change(function(){
       checkRellenar();
    });
    
    //Si no ha recibido tratamiento neoadyudante, se deshabilita grado de regresión
        if (document.getElementById("B_Tto_Neo").value == 2)
        {
            disabledElement('tabla_tipo_regresion');
        }



});
 
//Rellenar pendiente la página de anatomía patológica 
function checkRellenar()
{
    if ($('#rellenar').is(':checked')) {
               
                disabledElement('tabla_tipo_histologico');
                disabledElement('tabla_tipo_otros_histologico');
                disabledElement('tabla_tipo_t');
                disabledElement('Ganglios_Ais');
                disabledElement('Ganglios_Afec');
                disabledElement('Radio_Margen_D_Libre');
                disabledElement('Radio_Margen_A_Afecto');
                disabledElement('Radio_Margen_C_Libre');
                disabledElement('Radio_Margen_C_Afecto');
                disabledElement('Radio_Reseccion_R0');
                disabledElement('Radio_Reseccion_R1');
                disabledElement('Radio_Reseccion_R2');
                disabledElement('tabla_tipo_regresion');
                disabledElement('Id_Estadio_Sincronico');
                disabledElement('Radio_Calidad_Mesorre_S');
                disabledElement('Radio_Calidad_Mesorre_P');
                disabledElement('Radio_Calidad_Mesorre_I');
              
                
                $('#tabla_tipo_histologico').prop('selectedIndex', -1);
                $('#tabla_tipo_t').prop('selectedIndex', -1);
                $('#Id_Estadio_Sincronico').prop('selectedIndex', -1);
                $('#tabla_tipo_regresion').prop('selectedIndex', -1);
                
            }
            else
            {
                enabledElement('tabla_tipo_histologico');
                isOtrosSelected('tabla_tipo_histologico');
                enabledElement('tabla_tipo_t');
                enabledElement('Ganglios_Ais');
                enabledElement('Ganglios_Afec');
                enabledElement('Radio_Margen_D_Libre');
                enabledElement('Radio_Margen_A_Afecto');
                enabledElement('Radio_Margen_C_Libre');
                enabledElement('Radio_Margen_C_Afecto');
                enabledElement('Radio_Reseccion_R0');
                enabledElement('Radio_Reseccion_R1');
                enabledElement('Radio_Reseccion_R2');
                enabledElement('tabla_tipo_regresion');
               
                enabledElement('Radio_Calidad_Mesorre_S');
                enabledElement('Radio_Calidad_Mesorre_P');
                enabledElement('Radio_Calidad_Mesorre_I');
                
              // $('#Id_Estadio_Sincronico').prop('selectedIndex', -1);
             	if ($('#TumorSincro').val() == 1){
             		 enabledElement('Id_Estadio_Sincronico');
             		$('#Id_Estadio_Sincronico').prop('selectedIndex', -1);
             	}else{
             		 disabledElement('Id_Estadio_Sincronico');
             	}
              
            }
}

/* **********************   javascript   *********************************/ 
//Tipo histológico: Otros--> Habilita Otro tipo histológico
function isOtrosSelected(element) {
    var t = document.getElementById("tabla_tipo_histologico");
    
    if (t.selectedIndex > 0)
    {
       var selectedText = t.options[t.selectedIndex].text;
        //alert(val + " " + content);
    
        if (selectedText == "Otros") {
            enabledElement('tabla_tipo_otros_histologico');
        } else {
            disabledElement('tabla_tipo_otros_histologico');
        } 
    }
    else
    {
        disabledElement('tabla_tipo_otros_histologico');
    }
    
}

function Habilita() {
    
    if ($("#Tecnicas_Cirugia").val() == "7" || $("#Tecnicas_Cirugia").val()== "8" || $("#B_Cirugia").val()== "2" ||$('#rellenar').is(':checked'))
    {
       disabledElement('Id_Estadio_Sincronico');
    }
    else
    {

        if (document.getElementById("TumorSincro").value==0 || document.getElementById("EstadioSincro").value==null) {

            document.getElementById("Id_Estadio_Sincronico").disabled = true;
    
        } else if (document.getElementById("TumorSincro").value ==1) {
     
            document.getElementById("Id_Estadio_Sincronico").disabled = false;
    
        }
        
    }
    
    if($("#ExeresisMeso").val()=="3"){
    	document.getElementById("Radio_Margen_D_Libre").disabled=true;
    	document.getElementById("Radio_Margen_A_Afecto").disabled=true;
    	
    	document.getElementById("Radio_Margen_C_Libre").disabled=true;
    	document.getElementById("Radio_Margen_C_Afecto").disabled=true;
    	
    	document.getElementById("Radio_Calidad_Mesorre_S").disabled=true;
    	document.getElementById("Radio_Calidad_Mesorre_P").disabled=true;
    	document.getElementById("Radio_Calidad_Mesorre_I").disabled=true;
    }

   
}

//Función que calcula el estadio patológico
function EstadioPatologico() {

    var AP_T = 0;
    var AP_N = 0;

    V_Escogido = document.Patologica.tabla_tipo_t.selectedIndex;
    AP_T =document.Patologica.tabla_tipo_t.options[V_Escogido].value;

    var G_Aislados = 0;
    var G_Afectados = 0;

    G_Aislados = document.getElementById("Ganglios_Ais").value;
    G_Afectados = document.getElementById("Ganglios_Afec").value;

    if (G_Aislados < 12) {
        if (G_Afectados == 0) {
            AP_N = 1;
            //Nx
            document.getElementById("tabla_tipo_n").value = "X";
        } else if (G_Afectados >= 1 && G_Afectados <= 3) {
            AP_N = 3;
            //N1
            document.getElementById("tabla_tipo_n").value = 1;
        } else if (G_Afectados >= 4) {
            AP_N = 4;
            //N2
            document.getElementById("tabla_tipo_n").value = 2;
        }
    } else if (G_Aislados >= 12) {
        if (G_Afectados == 0) {
            AP_N = 2;
            //N0
            document.getElementById("tabla_tipo_n").value = 0;
        } else if (G_Afectados >= 1 && G_Afectados <= 3) {
            AP_N = 3;
            //N1
            document.getElementById("tabla_tipo_n").value = 1;
        } else if (G_Afectados >= 4) {
            AP_N = 4;
            //N2
            document.getElementById("tabla_tipo_n").value = 2;
        }
    }

	//Comprobar índices de T
  
    document.getElementById("tabla_tipo_m").value = 0;
    /*
    if (document.getElementById("MetastInicial").value == 1 || document.getElementById("Imp_Ovaricos").value == "on" || document.getElementById("Imp_Ovaricos").value == 1) {
    	
    	
        document.getElementById("tabla_estadio_tumor").value = 4;
        document.getElementById("tabla_tipo_m").value = 1;
      */
     
     //Cálculo de M patológica
     if (document.getElementById("Imp_Ovaricos").value == "on" || document.getElementById("Imp_Ovaricos").value == 1){
     	document.getElementById("tabla_tipo_m").value = 1;
     } else if(document.getElementById("MetastInicial").value == 1 && document.getElementById("MetastInicialHepaticas").value == 1 && document.getElementById("MetastInicialOseas").value == -1 && document.getElementById("MetastInicialPulmonares").value == -1 && document.getElementById("MetastInicialNervioso").value == -1 && document.getElementById("Tipo_Metast_Hepaticas").value == 2  )
    {
       document.getElementById("tabla_tipo_m").value = 0;
    }
      else if (document.getElementById("MetastInicial").value == 1 || document.getElementById("Tipo_Metast_Hepaticas").value == 1 ) 
    {
    	   document.getElementById("tabla_tipo_m").value = 1;
    }
    	
    //Cálculo del estadio patológico	

	if (document.getElementById("tabla_tipo_m").value ==1 ){
		document.getElementById("tabla_estadio_tumor").value = 4;
	}
	else if (AP_N == 4 || AP_N == 3) {
        //N1 y N2 de N
        document.getElementById("tabla_estadio_tumor").value = 3;
    } else if (AP_T == 6 || AP_T == 7 || AP_T == 8 || AP_T == 9) {
        //T3 y T4
        document.getElementById("tabla_estadio_tumor").value = 2;
    } else if (AP_T == 5 || AP_T == 4) {
        //T1 y T2
        document.getElementById("tabla_estadio_tumor").value = 1;
    } else {
        document.getElementById("tabla_estadio_tumor").value = 0;
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
            
            if ( data["Patologica_Pendiente"] == 1)
              {
                  putCheckBox('rellenar');
                  checkRellenar();
              }
              else if(data["No_Patologica"] == 1)
              {
                  //window.location="IntroducirDatosPatologica.php";
                  //window.location="../Seguimiento/Seguimiento.php";
                  window.location="Salto_Patologica.php";
              }
              
              else
              {
                  removeCheckBox('rellenar');
                  checkRellenar();
                  
                 /******* Histología *******/
                $('#tabla_tipo_histologico').prop('selectedIndex', data["Tipo_Histologico"] - 1);
                
                if (data["Tipo_Histologico"] == 7)
                {
                    enabledElement('tabla_tipo_otros_histologico');
                    document.getElementById("tabla_tipo_otros_histologico").value=data["Otros_Histologico"];
                
                }
                else
                {
                    disabledElement('tabla_tipo_otros_histologico');
                }
                 
                    
                $('#tabla_tipo_t').prop('selectedIndex', data["T_Patologico"] - 1);
                document.getElementById("tabla_tipo_n").value=data["N_Patologico"];
                document.getElementById("tabla_tipo_m").value=data["M_Patologico"];
                
                document.getElementById("Ganglios_Ais").value=data["Ganglios_Aislados"];
                document.getElementById("Ganglios_Afec").value=data["Ganglios_Afectados"];
                
                /******* Resección *******/
               
               switch (data["Margen_Distal"]) {
                case 1:
                    putRadioButton('Radio_Margen_D_Libre');
                    break;
                case 2:
                    putRadioButton('Radio_Margen_A_Afecto');
                    break;
                default:
                    break;
                }
                
                switch (data["Margen_Circunferencial"]) {
                case 1:
                    putRadioButton('Radio_Margen_C_Libre');
                    break;
                case 2:
                    putRadioButton('Radio_Margen_C_Afecto');
                    break;
                default:
                    break;
                }
                
                switch (data["Tipo_Reseccion"]) {
                case 1:
                    putRadioButton('Radio_Reseccion_R0');
                    break;
                case 2:
                    putRadioButton('Radio_Reseccion_R1');
                    break;
                case 3:
                    putRadioButton('Radio_Reseccion_R2');
                    break;
                default:
                    break;
                }
                
                
                $('#tabla_tipo_regresion').prop('selectedIndex', data["Tipo_Regresion"] - 1);
                

                if(data["Estadio_Tumor_Sincronico"] != null)
                {
                    $('#Id_Estadio_Sincronico').prop('selectedIndex', data["Estadio_Tumor_Sincronico"] - 1);
                
                }else{ //Está deshailitado de antes
                    $('#Id_Estadio_Sincronico').prop('selectedIndex', -1);
                    disabledElement('Id_Estadio_Sincronico');
                
                }
                
                switch (data["Calidad_Mesorrecto"]) {
                case 1:
                    putRadioButton('Radio_Calidad_Mesorre_S');
                    break;
                case 2:
                    putRadioButton('Radio_Calidad_Mesorre_P');
                    break;
                case 3:
                    putRadioButton('Radio_Calidad_Mesorre_I');
                    break;
                default:
                    break;
                }

               
               EstadioPatologico(); //El estadio tumoral lo hacemos al final porque depende de otras variables
              }
               
          
        }
    }
    
    xmlhttp.open("POST", "GetSessionVariables.php?", true);
    xmlhttp.send();
}

