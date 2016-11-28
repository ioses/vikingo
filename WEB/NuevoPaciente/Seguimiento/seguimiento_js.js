
/* **********************   jQuery   *********************************/   
$(document).ready(function() {
    
    //Ver si entramos de "modificar paciente" o de "introducir nuevo paciente"
    if ($('#EnviarSeguimiento').val() != -1 || $('#EnviarSeguimiento').val() != null)
    {
        CargarDatos(); //Entramos por modificar, cargamos los datos del paciente
    }
    
    //Cargar los datos para los inputs
    $("#tabla_seg_localiz_recidiva").autocomplete({
        source : 'get_lista_recidiva.php'//, minLength:2
    });
    $("#tabla_seg_localiz_metastasis").autocomplete({
        source : 'get_lista_metastasis.php'//, minLength:2
    });
    $("#tabla_seg_localiz_segundo_tumor").autocomplete({
        source : 'get_lista_segundo_tumor.php'//, minLength:2
    });
    $("#tabla_seg_imposibilidad").autocomplete({
        source : 'get_lista_imposibilidad.php'//, minLength:2
    });
    


    //Inicializar los dates con la fecha de "hoy"
    $("#Fecha_Revision").val(currentDate());
    $("#Fecha_Revision_Menu").val(currentDate());

	
     //Actualizaciones en los cambios de fecha
    $("#Fecha_Revision_Menu").change(function() {
        $("#Fecha_Revision").val($("#Fecha_Revision_Menu").val());
    });

    $("#Fecha_Revision").change(function() {
        $("#Fecha_Revision_Menu").val($("#Fecha_Revision").val());
    });
   

});


function DialogMessage(str,title)
{
    $( "#dialog-message" ).dialog({
 
           // width: 600,
           // height: 400,
             position: 'top',
            modal: true,
            title:title,
          
            buttons: {
			 	Ok: function() {
				$( this ).dialog( "close" );
				}
		 }			
        });
    $("#textoalert").text(str);
}      
       
            
/* **********************   javascript   *********************************/ 

function currentDate() {
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (("0" + month).length == 2)
        month = "0" + month;

    if (("0" + day).length == 2)
        day = "0" + day;

    var today = year + "-" + month + "-" + day;

    return today;
}

//Habilita recidiva
function HabilitaRecidiva() {
	
	if(document.getElementById("Tecnicas_Cirugia").value==8 ||document.getElementById("Tecnicas_Cirugia").value==7 || document.getElementById("Tipo_Reseccion").value==3){
		
		document.getElementById("errorAlertRecidiva").style.visibility = 'visible'; 
		
		document.getElementById("B_Recidiva_Si").disabled=true;
		document.getElementById("B_Recidiva_No").disabled=true;
		
		document.getElementById("Fecha_Recidiva").disabled = true;
        document.getElementById("tabla_seg_localiz_recidiva").disabled = true;
        document.getElementById("B_Recidiva_Intervencion_Si").disabled = true;
        document.getElementById("B_Recidiva_Intervencion_No").disabled = true;
	}else{
	
	
        if (document.Seguimiento.B_Recidiva[1].checked) {
    
            document.getElementById("Fecha_Recidiva").disabled = false;
            document.getElementById("tabla_seg_localiz_recidiva").disabled = false;
            document.getElementById("B_Recidiva_Intervencion_Si").disabled = false;
            document.getElementById("B_Recidiva_Intervencion_No").disabled = false;
    
        } else if (document.Seguimiento.B_Recidiva[0].checked) {
            document.getElementById("Fecha_Recidiva").disabled = true;
            document.getElementById("tabla_seg_localiz_recidiva").disabled = true;
            document.getElementById("B_Recidiva_Intervencion_Si").disabled = true;
            document.getElementById("B_Recidiva_Intervencion_No").disabled = true;
        }
    }
}

function HabilitaMetastasis() {
    
    
    if(document.getElementById("MetastInicial").value==1 ||document.getElementById("Tipo_Metast_Hepaticas").value==1 || document.getElementById("Imp_Ovaricos").value==1){
        
        document.getElementById("errorAlertMetastasis").style.visibility = 'visible'; 
        
        
        document.getElementById("B_Metastasis_Si").disabled=true;
        document.getElementById("B_Metastasis_No").disabled=true;
        
        document.getElementById("Fecha_Metastasis").disabled = true;
        document.getElementById("tabla_seg_localiz_metastasis").disabled = true;
        document.getElementById("B_Metastasis_Intervencion_Si").disabled = true;
        document.getElementById("B_Metastasis_Intervencion_No").disabled = true;
      
    }else{
    
        if (document.Seguimiento.B_Metastasis[1].checked) {
    
            document.getElementById("Fecha_Metastasis").disabled = false;
            document.getElementById("tabla_seg_localiz_metastasis").disabled = false;
            document.getElementById("B_Metastasis_Intervencion_Si").disabled = false;
            document.getElementById("B_Metastasis_Intervencion_No").disabled = false;
    
        } else if (document.Seguimiento.B_Metastasis[0].checked) {
            document.getElementById("Fecha_Metastasis").disabled = true;
            document.getElementById("tabla_seg_localiz_metastasis").disabled = true;
            document.getElementById("B_Metastasis_Intervencion_Si").disabled = true;
            document.getElementById("B_Metastasis_Intervencion_No").disabled = true;
        }
    }
}

function HabilitaSegundoTumor() {
    if (document.Seguimiento.B_Segundo_Tumor[1].checked) {

        document.getElementById("Fecha_Segundo_Tumor").disabled = false;
        document.getElementById("tabla_seg_localiz_segundo_tumor").disabled = false;
        document.getElementById("B_Segundo_Tumor_Intervencion_Si").disabled = false;
        document.getElementById("B_Segundo_Tumor_Intervencion_No").disabled = false;

    } else if (document.Seguimiento.B_Segundo_Tumor[0].checked) {
        document.getElementById("Fecha_Segundo_Tumor").disabled = true;
        document.getElementById("tabla_seg_localiz_segundo_tumor").disabled = true;
        document.getElementById("B_Segundo_Tumor_Intervencion_Si").disabled = true;
        document.getElementById("B_Segundo_Tumor_Intervencion_No").disabled = true;
    }
}

function HabilitaEstadoPaciente() {
    if (document.Seguimiento.B_Estado[0].checked) {

        document.getElementById("Fecha_Muerte").disabled = true;
        document.getElementById("Relacion_Muerte_Si").disabled = true;
        document.getElementById("Relacion_Muerte_No").disabled = true;

    } else if (document.Seguimiento.B_Estado[1].checked) {
        document.getElementById("Fecha_Muerte").disabled = false;
        document.getElementById("Relacion_Muerte_Si").disabled = false;
        document.getElementById("Relacion_Muerte_No").disabled = false;

    }
}

function HabilitaImposibilidad() {
    if (document.Seguimiento.B_Imposibilidad[1].checked) {

        document.getElementById("tabla_seg_imposibilidad").disabled = false;

    } else if (document.Seguimiento.B_Imposibilidad[0].checked) {

        document.getElementById("tabla_seg_imposibilidad").disabled = true;

    }
}

function HabilitarMuerte(){
	
	var Causa_No_TTO_Neo=document.getElementById("Causa_No_Adyuvante").value;
	
	var Causa_No_Cirugia=document.getElementById("Causa_No_Cirugia").value;
	
	var Exitus_Intra=document.getElementById("Exitus_Intra").value;
	
	var Exitus_Post=document.getElementById("Exitus_Post").value;
	
	


	
	if (Causa_No_TTO_Neo==3 || Causa_No_Cirugia==3 || Exitus_Intra==1 || Exitus_Post==1){
		
		document.Seguimiento.B_Estado[1].checked=true;
		document.Seguimiento.Relacion_Muerte[1].checked=true;
		
		document.getElementById("Fecha_Muerte").disabled=false;
		
		document.getElementById("B_Estado_Vivo").disabled=true;
		document.getElementById("B_Estado_Muerto").disabled=true;
		
		document.getElementById("B_Imposibilidad_Si").disabled=true;
		document.getElementById("B_Imposibilidad_No").disabled=true;
		
		
		document.getElementById("B_Segundo_Tumor_No").disabled=true;
		document.getElementById("B_Segundo_Tumor_Si").disabled=true;
		
		document.getElementById("B_Metastasis_No").disabled=true;
		document.getElementById("B_Metastasis_Si").disabled=true;
		
		document.getElementById("B_Recidiva_No").disabled=true;
		document.getElementById("B_Recidiva_Si").disabled=true;
		
	}
	
	if (Exitus_Intra==1){
		document.getElementById("Fecha_Muerte").disabled=true;
		document.getElementById("Fecha_Muerte").value=document.getElementById("Fecha_Cirugia").value;
	}else if(Causa_No_TTO_Neo==3 || Causa_No_Cirugia==3 || Exitus_Post==1){
	    
	    var cadena = document.getElementById("EnviarSeguimiento").value.replace(/\s/g,'');
                
		if (document.getElementById("Fecha_Muerte").value == "" && cadena != "Enviar")
		{
		    DialogMessage("Debe rellenar la fecha de muerte","Fecha erronea");
		}
		
	}
	
}

//Comprueba que las fechas estén bien
function FechasOK(){
	

	var FechaRevision=document.getElementById('Fecha_Revision').value;
	
		var AñoRevision  = parseInt(FechaRevision.substring(0,4),10);
	 	var MesRevision = parseInt(FechaRevision.substring(5,7),10);
	 	MesRevision=MesRevision-1;
	 	var DiaRevision= parseInt(FechaRevision.substring(8,10),10);
	 	
	 var Revision = new Date(AñoRevision, MesRevision, DiaRevision);
	
	
	var FechaRecidiva= document.getElementById('Fecha_Recidiva').value;
	
		var AñoRecidiva  = parseInt(FechaRecidiva.substring(0,4),10);
	 	var MesRecidiva = parseInt(FechaRecidiva.substring(5,7),10);
	 	MesRecidiva=MesRecidiva-1;
	 	var DiaRecidiva= parseInt(FechaRecidiva.substring(8,10),10);
	
	var Recidiva = new Date(AñoRecidiva, MesRecidiva, DiaRecidiva);
	
	
	var FechaMetastasis= document.getElementById('Fecha_Metastasis').value;
	
		var AñoMetastasis  = parseInt(FechaMetastasis.substring(0,4),10);
	 	var MesMetastasis = parseInt(FechaMetastasis.substring(5,7),10);
	 	MesMetastasis=MesMetastasis-1;
	 	var DiaMetastasis= parseInt(FechaMetastasis.substring(8,10),10);
	
	var Metastasis = new Date(AñoMetastasis, MesMetastasis, DiaMetastasis);
	
	
	var FechaSegundoTumor= document.getElementById('Fecha_Segundo_Tumor').value;
	
		var AñoSegundoTumor  = parseInt(FechaSegundoTumor.substring(0,4),10);
	 	var MesSegundoTumor = parseInt(FechaSegundoTumor.substring(5,7),10);
	 	MesSegundoTumor=MesSegundoTumor-1;
	 	var DiaSegundoTumor= parseInt(FechaSegundoTumor.substring(8,10),10);
	
	var SegundoTumor = new Date(AñoSegundoTumor, MesSegundoTumor, DiaSegundoTumor);
	
	
	var FechaMuerte= document.getElementById('Fecha_Muerte').value;
	
		var AñoMuerte  = parseInt(FechaMuerte.substring(0,4),10);
	 	var MesMuerte = parseInt(FechaMuerte.substring(5,7),10);
	 	MesMuerte=MesMuerte-1;
	 	var DiaMuerte= parseInt(FechaMuerte.substring(8,10),10);
	
	var Muerte = new Date(AñoMuerte, MesMuerte, DiaMuerte);

	var Today = new Date();
	
	
	
	var FechaCirugia= document.getElementById('FechaCirugia').value;
	
		var AñoCirugia  = parseInt(FechaCirugia.substring(0,4),10);
	 	var MesCirugia = parseInt(FechaCirugia.substring(5,7),10);
	 	MesCirugia=MesCirugia-1;
	 	var DiaCirugia= parseInt(FechaCirugia.substring(8,10),10);
	
	var Cirugia = new Date(AñoCirugia, MesCirugia, DiaCirugia);
	
	
	var FechaNacimiento= document.getElementById('FechaNacimiento').value;
	
		var AñoNacimiento  = parseInt(FechaNacimiento.substring(0,4),10);
	 	var MesNacimiento = parseInt(FechaNacimiento.substring(5,7),10);
	 	MesNacimiento=MesNacimiento-1;
	 	var DiaNacimiento= parseInt(FechaNacimiento.substring(8,10),10);
	
	var Nacimiento = new Date(AñoNacimiento, MesNacimiento, DiaNacimiento);
	
	
	
	
	
	if (Revision>Today){
		DialogMessage("La fecha de revisión es errónea","Fecha erronea");
		return false;
	}else if(Recidiva>Today){
		DialogMessage("La fecha de recidiva es errónea","Fecha erronea");
		return false;
	}else if(Metastasis>Today){
		DialogMessage("La fecha de metástasis es errónea","Fecha erronea");
		return false;
	}else if(SegundoTumor>Today){
		DialogMessage("La fecha de segundo tumor es errónea","Fecha erronea");
		return false;
	}else if(Muerte>Today){
		DialogMessage("La fecha de muerte es errónea","Fecha erronea");
		return false;
	}else if(Recidiva>Revision){
		DialogMessage("Actualice la fecha de revisión hasta la fecha de recidiva","Fecha erronea");
		return false;	
	}else if(Metastasis>Revision){
		DialogMessage("Actualice la fecha de revisión hasta la fecha de metástasis","Fecha erronea");
		return false;	
	}else if(SegundoTumor>Revision){
		DialogMessage("Actualice la fecha de revisión hasta la fecha de segundo tumor","Fecha erronea");
		return false;	
	}else if(Nacimiento>Muerte){
		DialogMessage("La fecha de muerte es incorrecta","Fecha erronea");
		return false;	
	}else if(Cirugia>Recidiva){
		DialogMessage("La fecha de recidiva es incorrecta","Fecha erronea");
		return false;	
	}else if(Cirugia>Metastasis){
		DialogMessage("La fecha de metástasis es incorrecta","Fecha erronea");
		return false;	
	}else if(Cirugia>SegundoTumor){
		DialogMessage("La fecha de segundo tumor es incorrecta","Fecha erronea");
		return false;	
	}else if(Cirugia>Revision){
		DialogMessage("La fecha de revisión es incorrecta","Fecha erronea");
		return false;	
	}
	else{
		return true;
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
            
            /******* Fecha seguimiento *******/
           document.getElementById("Fecha_Revision").value=data["Fecha_Revision"];
           document.getElementById("Fecha_Revision_Menu").value=data["Fecha_Revision"];
          
            /******* Recidiva *******/
           switch (data["Recidiva"]) {
                case 1://Si
             
                    putRadioButton('B_Recidiva_Si');
                    document.getElementById("Fecha_Recidiva").value=data["Fecha_Recidiva"];
                    document.getElementById("tabla_seg_localiz_recidiva").value=data["Localizacion_Recidiva"];
       				
                    switch (data["Intervencion_Recidiva"]) {
                        case 1: //Si
                            putRadioButton('B_Recidiva_Intervencion_Si');
                            break;
                        case 2: //No
                            putRadioButton('B_Recidiva_Intervencion_No');
                            break;
                        default:
                            break;
                    }
                    
                    break;
                case 2: //NO
                    putRadioButton('B_Recidiva_No');
                    break;
                default:
                    break;
                }
                
                HabilitaRecidiva();
            
            /******* Metástasis *******/
           switch (data["Metastasis"]) {
                case 1://Si
                    putRadioButton('B_Metastasis_Si');
                    document.getElementById("Fecha_Metastasis").value=data["Fecha_Metastasis"];
                    document.getElementById("tabla_seg_localiz_metastasis").value=data["Localizacion_Metastasis"];
          			
                    switch (data["Intervencion_Metastasis"]) {
                        case 1: //Si
                            putRadioButton('B_Metastasis_Intervencion_Si');
                            break;
                        case 2: //No
                            putRadioButton('B_Metastasis_Intervencion_No');
                            break;
                        default:
                            break;
                    }
                    
                    break;
                case 2: //NO
                    putRadioButton('B_Metastasis_No');
                    break;
                default:
                    break;
                }
                
                HabilitaMetastasis();
            
            /******* Segundo Tumor *******/
           switch (data["Segundo_Tumor"]) {
                case 1://Si
                    putRadioButton('B_Segundo_Tumor_Si');
                    document.getElementById("Fecha_Segundo_Tumor").value=data["Fecha_Segundo_Tumor"];
                    document.getElementById("tabla_seg_localiz_segundo_tumor").value=data["Localizacion_Segundo_Tumor"];
          
                    switch (data["Intervencion_Segundo_Tumor"]) {
                        case 1: //Si
                            putRadioButton('B_Segundo_Tumor_Intervencion_Si');
                            break;
                        case 2: //No
                            putRadioButton('B_Segundo_Tumor_Intervencion_No');
                            break;
                        default:
                            break;
                    }
                    
                    break;
                case 2: //NO
                    putRadioButton('B_Segundo_Tumor_No');
                    break;
                default:
                    break;
                }
                
                HabilitaSegundoTumor();
            
            /******* Estado *******/
            switch (data["Estado"]) {
                case 1: //Vivo
                    putRadioButton('B_Estado_Vivo');
                    break;
                case 2: //Muerto
                    putRadioButton('B_Estado_Muerto');
                    document.getElementById("Fecha_Muerte").value=data["Fecha_Muerte"];
                    switch (data["Causa_Muerte"]) {
                        case 1: //Si
                            putRadioButton('Relacion_Muerte_Si');
                            break;
                        case 2: //No
                            putRadioButton('Relacion_Muerte_Si');
                            break;
                        default:
                            break;
                    }
                    break;
                default:
                    break;
            }
            
            HabilitaEstadoPaciente();
            
            switch (data["Imposibilidad"]) {
                case 1: //Si
                    putRadioButton('B_Imposibilidad_Si');
                    document.getElementById("tabla_seg_imposibilidad").value=data["Causa_Imposibilidad"];
                    break;
                case 2: //No
                    putRadioButton('B_Imposibilidad_No');
                    break;
                default:
                    break;
             }
             
             HabilitaImposibilidad();
             
             //*********** Comentarios adicionales **********
             document.getElementById("Comentarios_Adicionales").value=data["Comentarios_Adicionales"];
           
           
        }
    }
    
    xmlhttp.open("POST", "GetSessionVariables.php?", true);
    xmlhttp.send();
}



