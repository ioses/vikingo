/* **********************   jQuery   *********************************/   
$(document).ready(function() {
   

    //En los ListBox no salga nada seleccionado
    $('#tabla_tipo_histologico').prop('selectedIndex', -1);
    $('#tabla_tipo_t').prop('selectedIndex', -1);
    $('#Id_Estadio_Sincronico').prop('selectedIndex', -1);
    $('#tabla_tipo_regresion').prop('selectedIndex', -1);
    disabledElement('tabla_tipo_otros_histologico');
        
    
    //Cargar los datos para los inputs
    $("#tabla_tipo_otros_histologico").autocomplete({
        source : 'get_lista_otros_histologico.php'//, minLength:2
    });
    
      
    if ($("#Tecnicas_Cirugia").val() == 7 || $("#Tecnicas_Cirugia").val()== 8 || $("#B_Cirugia").val()== 2 || $("#tipo_no_neo").val()== 3)
    {
            disabledElement('rellenar');
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
            disabledElement('Radio_Calidad_Mesorre_S');
            disabledElement('Radio_Calidad_Mesorre_P');
            disabledElement('Radio_Calidad_Mesorre_I');
            
            
            $("body").fadeOut(1, function() {
            window.location="IntroducirDatosPatologica.php";
        });
                
                
        }

}); 


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

function Habilita(){
	
	if(document.getElementById("ExeresisMeso").value==3){
   
    	document.getElementById("Radio_Margen_D_Libre").disabled=true;
    	document.getElementById("Radio_Margen_A_Afecto").disabled=true;
    	
    	document.getElementById("Radio_Margen_C_Libre").disabled=true;
    	document.getElementById("Radio_Margen_C_Afecto").disabled=true;
    	
    	document.getElementById("Radio_Calidad_Mesorre_S").disabled=true;
    	document.getElementById("Radio_Calidad_Mesorre_P").disabled=true;
    	document.getElementById("Radio_Calidad_Mesorre_I").disabled=true;
    }

	
	
    if ($("#Tecnicas_Cirugia").val() == "7" || $("#Tecnicas_Cirugia").val()== "8" || $("#B_Cirugia").val()== "2")
    {
    	
       disabledElement('Id_Estadio_Sincronico');
    }
    else
    {
        if (document.getElementById("TumorSincro").value == 0) {
        	
            document.getElementById("Id_Estadio_Sincronico").disabled = true;
    
        } else if (document.getElementById("TumorSincro").value == 1) {
        
            document.getElementById("Id_Estadio_Sincronico").disabled = false;
    
        }
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
    if (document.getElementById("MetastInicial").value == 1 || document.getElementById("Tipo_Metast_Hepaticas").value == 1 || document.getElementById("Imp_Ovaricos").value == "on") {
        document.getElementById("tabla_estadio_tumor").value = 4;
        document.getElementById("tabla_tipo_m").value = 1;
    } else if (AP_N == 4 || AP_N == 3) {
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

