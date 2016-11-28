/* **********************   jQuery   *********************************/

$(document).ready(function() {

    //Cargar los datos para los inputs
    $("#Texto_Reintervencion").autocomplete({
        source : 'get_lista_Complicaciones_Reintervencion.php'//, minLength:2
    });

    $("#Texto_Exitus_Intra").autocomplete({
        source : 'get_lista_Exitus_Intra.php'//, minLength:2
    });

    $("#Texto_Exitus_Post").autocomplete({
        source : 'get_lista_Exitus_Post.php'//, minLength:2
    });

    //CheckBox de alta (para dejarla pendiente --> deshabilitar el input de fecha)
       $('#rellenarAlta').change(function(){
          
           if ($('#rellenarAlta').is(':checked')) {
                disabledElement('Fecha_Alta');
               
                
            }
            else
            {
                enabledElement('Fecha_Alta');
               
            }
        });
        
        $('#Comp_Anastomosis_Fistula').change(function(){
          
           var t = document.getElementById("Tecnicas_Cirugia").value;
           if ($('#Comp_Anastomosis_Fistula').is(':checked')) 
           {
                if (t == 2 || t == 3)
                {
                    if (document.getElementById("Comp_Anastomosis_Fistula").checked == true)
                    {
                        $('#Comp_Anastomosis_Fuga').attr('checked', true);
                        document.getElementById("Comp_Anastomosis_Fuga").checked == true
                    }
                
                }
                else if(t == 5 || t == 9)
                {
                   
                   if (document.getElementById("Comp_Anastomosis_Fistula").checked == true && (document.getElementById('Tipo_Anastomosis').value = 2 || document.getElementById('Tipo_Anastomosis').value == 3))
                    {
                        $('#Comp_Anastomosis_Fuga').attr('checked', true);
                        document.getElementById("Comp_Anastomosis_Fuga").checked == true
                    }
                }
        
            }
      });
    
     //Ver si entramos de "modificar paciente" o de "introducir nuevo paciente"
    if ($('#EnviarCirugia').val() == -1 || $('#EnviarCirugia').val() == null)
    {
        $('#Motivos_No_Cirugia').prop('selectedIndex', -1);
        $('#Tecnicas_Cirugia').prop('selectedIndex', -1);
        $('#Exeresis_Mesorrecto').prop('selectedIndex', -1);
        $('#Tipo_ASA').prop('selectedIndex', -1);
        $('#Tipo_Hallazgos').prop('selectedIndex', -1);
        $('#Tipo_Metast_Hepaticas').prop('selectedIndex', -1);
        $('#Tipo_Via').prop('selectedIndex', -1);
        $('#Tipo_Intencion').prop('selectedIndex', -1);
        $('#Tipo_Anastomosis').prop('selectedIndex', -1);
        $('#Tipo_Reservorio').prop('selectedIndex', -1);
        $('#Tipo_Estoma').prop('selectedIndex', -1);
        $('#').prop('selectedIndex', -1);
        $('#').prop('selectedIndex', -1);
        
    }else //Cargamos las variables de la sesion anterior
    {

        CargarDatos();//Entramos por modificar, cargamos los datos del paciente
    }
    
    //Si se selecciona muerte en motivos de no tratamiento neoadyuvante, se salta a la siguiente pagina
    if ($("#B_Tto_Neo").val() == 2 && $("#tipo_no_neo").val() == 3)
    {
        
         $("#B_Cirugia_No").prop('checked',true);
         $('#Motivos_No_Cirugia').prop('selectedIndex', 2);
         HabilitaCirugia();

         $("body").fadeOut(1, function() {
            window.location = "IntroducirDatosCirugia.php";
        });
    }
    
    

});

function DialogMessage(str,title) {
    $("#dialog-message").dialog({

        //width : 600,
        //height : 400,
        position:'top',
        modal : true,
        title: title,

        buttons : {
            Ok : function() {
                $(this).dialog("close");
            }
        }
    });
    $("#textoalert").text(str);
}

/* **********************   javascript   *********************************/

//Restriciones en mesorrecto y Anatomosis
function tecnicaMesorrecto()
{

    if ($('#B_Cirugia_Si').is(':checked'))
    {
        var t = document.getElementById("Tecnicas_Cirugia").value;
        var loca=document.getElementById("localiz").value;
        
        var exeresis=document.getElementById("Exeresis_Mesorrecto");

        //Mesorrecto
        if(t == 1 || t == 7 || t == 8) 
        {
            if (!isOptionAlreadyExist(document.getElementById("Exeresis_Mesorrecto"), 3)) 
            {
                addItemListBox(3, "No realizada", document.getElementById("Exeresis_Mesorrecto"), null);
            }
            
            document.getElementById("Exeresis_Mesorrecto").disabled = true;
            $('#Exeresis_Mesorrecto').prop('selectedIndex', 2);
        }
        else if(t == 4 || t == 9 || t == 10)
        {

            document.getElementById("Exeresis_Mesorrecto").disabled = true;
            $('#Exeresis_Mesorrecto').prop('selectedIndex', 1);
        } 
        else if(t == 5 || t == 6){
            document.getElementById("Exeresis_Mesorrecto").disabled = false;
            exeresis.options.remove(2);
        }
        else if(loca<=10){
            document.getElementById("Exeresis_Mesorrecto").disabled = true;
            $('#Exeresis_Mesorrecto').prop('selectedIndex', 1);
        }else if (loca>10){
            document.getElementById("Exeresis_Mesorrecto").disabled = false;
            exeresis.options.remove(2);
        }

        //Anatomosis
        if(t == 1 || t == 4 || t == 6 || t == 7 || t == 8 || t == 10) 
        {
            //Rellenamos el listBox por si algún elemento ha sido eliminado anteriomente
            if (!isOptionAlreadyExist(document.getElementById("Tipo_Anastomosis"), 1)) 
            {
                addItemListBox(1, "No", document.getElementById("Tipo_Anastomosis"), document.getElementById("Tipo_Anastomosis").options[0]);
            }
            
            if (!isOptionAlreadyExist(document.getElementById("Tipo_Anastomosis"), 4)) 
            {
                addItemListBox(4, "No consta", document.getElementById("Tipo_Anastomosis"), null);
            }

            $('#Tipo_Anastomosis').prop('selectedIndex', 0);
            document.getElementById("Tipo_Anastomosis").disabled = true;
        }
        else if (t == 2 || t == 3) 
        {
            document.getElementById("Tipo_Anastomosis").disabled = false;
            var list = document.getElementById('Tipo_Anastomosis');
            list.options.remove(0);
            list.options.remove(2);
            
            
        }
        else if (t == 5 || t == 9)
        {
            
            document.getElementById("Tipo_Anastomosis").disabled = false;
            //Rellenamos el listBox por si algún elemento ha sido eliminado anteriomente
            if (!isOptionAlreadyExist(document.getElementById("Tipo_Anastomosis"), 1)) 
            {
                addItemListBox(1, "No", document.getElementById("Tipo_Anastomosis"), document.getElementById("Tipo_Anastomosis").options[0]);
            }
            document.getElementById("Tipo_Anastomosis").options.remove(3);
        }
        
        
        
        //Reservorio y estoma derivación
        if(t == 4 || t == 6 ||  t == 10) 
        {
            document.getElementById("Tipo_Reservorio").disabled = true;
            $('#Tipo_Reservorio').prop('selectedIndex', 0);
            
             $('#Radio_Tipo_Estoma_NO').attr('checked', true);
             document.getElementById("Radio_Tipo_Estoma_SI").disabled = true;
             document.getElementById("Tipo_Estoma").disabled = true;
        }else if(t == 5 || t == 9){
            var l = document.getElementById('Tipo_Anastomosis').value;
            if (l == 1) //Anastomosis es NO
            {
                $('#Radio_Tipo_Estoma_NO').attr('checked', true);
                document.getElementById("Radio_Tipo_Estoma_SI").disabled = true;
                document.getElementById("Tipo_Estoma").disabled = true;
            }
            else{
                document.getElementById("Radio_Tipo_Estoma_SI").disabled = false;
                document.getElementById("Tipo_Estoma").disabled = false;
            }
        }
        else
        {
            document.getElementById("Tipo_Reservorio").disabled = false;
            
            document.getElementById("Radio_Tipo_Estoma_NO").disabled = false;
             //$('#Radio_Tipo_Estoma_NO').attr('checked', false);
             document.getElementById("Radio_Tipo_Estoma_SI").disabled = false;
             document.getElementById("Tipo_Estoma").disabled = false;
        }
        
        if(t == 4 || t == 10){
            document.getElementById("Orient_Prono").disabled = false;
            document.getElementById("Orient_Supino").disabled = false;
        }
        else
        {
            document.getElementById("Orient_Prono").disabled = true;
            document.getElementById("Orient_Supino").disabled = true;
        }
        
        
        //ASA
        if (t == 7){
           if (!isOptionAlreadyExist(document.getElementById("Tipo_ASA"), 5)) 
            {
                addItemListBox(5, "V", document.getElementById("Tipo_ASA"), null);
            }
        }else{           
            document.getElementById("Tipo_ASA").options.remove(4);
        }
        
        
    
        
    }//End if ($('#B_Cirugia_Si').is(':checked'))
    
}

//Función de ayuda para quitar item en los listbox
function isOptionAlreadyExist(listBox,value){
    var exists=false;
    for(var x=0;x<listBox.options.length;x++){
        if(listBox.options[x].value==value || listBox.options[x].text==value){ 
            exists=true;
            break;
        }
    }
    return exists;
}

function addItemListBox(value, text, listBox, before)
{
    //var htmlSelect = document.createElement("selectItem");//HTML select box 

    var selectBoxOption = document.createElement("option");//create new option 
    selectBoxOption.value = value;//set option value 
    selectBoxOption.text = text;//set option display text 
    //htmlSelect.add(selectBoxOption, null);//add created option to select box.
    
    listBox.add(selectBoxOption, before);//add created option to select box.
    
}

function FechaAlta(){

    //alert("."+document.getElementById("Fecha_Alta_Pendiente").value+".");
    var cadena = document.getElementById("Fecha_Alta_Pendiente").value.replace(/\s/g,'');
    
    //var cadena = document.getElementById("Fecha_Alta_Pendiente").value;
    //alert("."+document.getElementById("Fecha_Alta_Pendiente").value+"." + " ." + cadena+".");
    //if(document.getElementById("Fecha_Alta_Pendiente").value == "on"){
    if(cadena==1 || cadena== "on"){
        //document.getElementById("Fecha_Alta").disabled=true;
        document.getElementById("rellenarAlta").checked = true; 
    }
    else
    {
        //document.getElementById("Fecha_Alta").disabled=false;
        document.getElementById("rellenarAlta").checked = false; 
    }
    
    if(document.Cirugia.rellenarAlta.checked){
        document.getElementById("Fecha_Alta").disabled=true;
    }
    else
    {
        document.getElementById("Fecha_Alta").disabled=false;
    }
    
}

function HabilitaComplicaciones() {
    if (document.Cirugia.B_Complicaciones[0].checked) {
        document.getElementById("Reintervencion").disabled = true;
        document.getElementById("Exitus_Intra").disabled = true;
        
        document.getElementById("Exitus_Post").disabled = true;
        document.getElementById("Texto_Reintervencion").disabled = true;
        
        document.getElementById("Texto_Exitus_Intra").disabled = true;
        document.getElementById("Texto_Exitus_Post").disabled = true;
        
        document.getElementById("Comp_Generales_Sepsis").disabled=true;
        document.getElementById("Comp_Generales_Shock").disabled=true;
        
        document.getElementById("Comp_Herida_Hemorragia").disabled = true;
        document.getElementById("Comp_Herida_Infeccion").disabled = true;
        document.getElementById("Comp_Herida_Evisceracion").disabled = true;
        document.getElementById("Comp_Herida_Eventracion").disabled = true;
        
        document.getElementById("Comp_Perine_Infeccion").disabled = true;
        document.getElementById("Comp_Perine_Retraso").disabled = true;
        document.getElementById("Comp_Perine_Hernia").disabled = true;
        
        
        document.getElementById("Comp_Abdominales_Hemoperitoneo").disabled = true;
        document.getElementById("Comp_Abdominales_Difusas").disabled = true;
        document.getElementById("Comp_Abdominales_Abcs").disabled = true;
        //document.getElementById("Comp_Abdominales_Hemo").disabled = true;
        document.getElementById("Comp_Pelvico_Abcs").disabled = true;
        document.getElementById("Comp_Pelvico_Hemo").disabled = true;
        document.getElementById("Comp_Abdominales_Isquemia").disabled = true;
        document.getElementById("Comp_Abdominales_Colecistitis").disabled = true;
        document.getElementById("Comp_Abdominales_Iatrog").disabled = true;
        document.getElementById("Comp_Abdominales_Iatrog_Vias_Huecas").disabled = true;
        document.getElementById("Comp_Abdominales_Ileo").disabled = true;
        document.getElementById("Comp_Abdominales_Ileo_Mecanico").disabled = true;
         document.getElementById("Comp_Abdominales_Estoma").disabled = true;
        
        document.getElementById("Comp_Anastomosis_Hemorragia").disabled = true;
        document.getElementById("Comp_Anastomosis_Fuga").disabled = true;
        document.getElementById("Comp_Anastomosis_Fistula").disabled = true;
        
        document.getElementById("Comp_Otras_Hemo_Diges").disabled = true;
        document.getElementById("Comp_Otras_Urologicas").disabled = true;
        document.getElementById("Comp_Otras_Inf_Urinaria").disabled = true;
        document.getElementById("Comp_Otras_Vascular_Mec").disabled = true;
        document.getElementById("Comp_Otras_Vascular_Infecc").disabled = true;
        document.getElementById("Comp_Otras_Hepatica").disabled = true;
        document.getElementById("Comp_Otras_Renal").disabled = true;
        document.getElementById("Comp_Otras_Respiratoria").disabled = true;
        document.getElementById("Comp_Otras_Respiratoria_Infecc").disabled = true;
        document.getElementById("Comp_Otras_FMO").disabled = true;
        document.getElementById("Comp_Otras_TEP").disabled = true;
        document.getElementById("Comp_Otras_Neuroapraxia").disabled = true;
        document.getElementById("Comp_Otras_Cardiovascular").disabled = true;
        


    } else if (document.Cirugia.B_Complicaciones[1].checked) {
        document.getElementById("Reintervencion").disabled = false;
        document.getElementById("Exitus_Intra").disabled = false;
        
        document.getElementById("Exitus_Post").disabled = false;
        document.getElementById("Texto_Reintervencion").disabled = false;
        
        document.getElementById("Texto_Exitus_Intra").disabled = false;
        document.getElementById("Texto_Exitus_Post").disabled = false;
        
        document.getElementById("Comp_Generales_Sepsis").disabled=false;
        document.getElementById("Comp_Generales_Shock").disabled=false;
        
        document.getElementById("Comp_Herida_Hemorragia").disabled = false;
        document.getElementById("Comp_Herida_Infeccion").disabled = false;
        document.getElementById("Comp_Herida_Evisceracion").disabled = false;
        document.getElementById("Comp_Herida_Eventracion").disabled = false;
        
        document.getElementById("Comp_Perine_Infeccion").disabled = false;
        document.getElementById("Comp_Perine_Retraso").disabled = false;
        document.getElementById("Comp_Perine_Hernia").disabled = false;
        
        
        document.getElementById("Comp_Abdominales_Hemoperitoneo").disabled = false;
        document.getElementById("Comp_Abdominales_Difusas").disabled = false;
        document.getElementById("Comp_Abdominales_Abcs").disabled = false;
        //document.getElementById("Comp_Abdominales_Hemo").disabled = false;
        document.getElementById("Comp_Pelvico_Abcs").disabled = false;
        document.getElementById("Comp_Pelvico_Hemo").disabled = false;
        document.getElementById("Comp_Abdominales_Isquemia").disabled = false;
        document.getElementById("Comp_Abdominales_Colecistitis").disabled = false;
        document.getElementById("Comp_Abdominales_Iatrog").disabled = false;
        document.getElementById("Comp_Abdominales_Iatrog_Vias_Huecas").disabled = false;
        document.getElementById("Comp_Abdominales_Ileo").disabled = false;
        document.getElementById("Comp_Abdominales_Ileo_Mecanico").disabled = false;
         document.getElementById("Comp_Abdominales_Estoma").disabled = false;
        
        document.getElementById("Comp_Anastomosis_Hemorragia").disabled = false;
        document.getElementById("Comp_Anastomosis_Fuga").disabled = false;
        document.getElementById("Comp_Anastomosis_Fistula").disabled = false;
        
        document.getElementById("Comp_Otras_Hemo_Diges").disabled = false;
        document.getElementById("Comp_Otras_Urologicas").disabled = false;
        document.getElementById("Comp_Otras_Inf_Urinaria").disabled = false;
        document.getElementById("Comp_Otras_Vascular_Mec").disabled = false;
        document.getElementById("Comp_Otras_Vascular_Infecc").disabled = false;
        document.getElementById("Comp_Otras_Hepatica").disabled = false;
        document.getElementById("Comp_Otras_Renal").disabled = false;
        document.getElementById("Comp_Otras_Respiratoria").disabled = false;
        document.getElementById("Comp_Otras_Respiratoria_Infecc").disabled = false;
        document.getElementById("Comp_Otras_FMO").disabled = false;
        document.getElementById("Comp_Otras_TEP").disabled = false;
        document.getElementById("Comp_Otras_Neuroapraxia").disabled = false;
        document.getElementById("Comp_Otras_Cardiovascular").disabled = false;

        
        
        HabilitaTexto_Reintervencion();
        HabilitaTexto_Exitus_Intra();
        HabilitaTexto_Exitus_Post();
        //HabilitaTexto_Otras_Complicaciones();

    }
    
}

//Comprobación de los checks (que en los subelementos alguno esté marcado)
function CheckObligatorias() {
    if (document.Cirugia.B_Cirugia[0].checked) {
        return true;
    } else {

        var Complicaciones = 0;
        var Resecciones = 0;
        var Total = 0;
        
        var CheckOK=0;
        var FechasOK=0;

        if (document.getElementById("B_Complicaciones_Si").checked) {
            if (document.getElementById("Reintervencion").checked || document.getElementById("Exitus_Intra").checked || 
            document.getElementById("Exitus_Post").checked || document.getElementById("Comp_Generales_Sepsis").checked || document.getElementById("Comp_Generales_Shock").checked ||
            document.getElementById("Comp_Herida_Hemorragia").checked || document.getElementById("Comp_Herida_Infeccion").checked || document.getElementById("Comp_Herida_Evisceracion").checked || 
            document.getElementById("Comp_Herida_Eventracion").checked || document.getElementById("Comp_Perine_Infeccion").checked || document.getElementById("Comp_Perine_Retraso").checked || document.getElementById("Comp_Perine_Hernia").checked ||
            document.getElementById("Comp_Abdominales_Hemoperitoneo").checked || document.getElementById("Comp_Abdominales_Difusas").checked || document.getElementById("Comp_Abdominales_Abcs").checked  || document.getElementById("Comp_Pelvico_Abcs").checked || document.getElementById("Comp_Pelvico_Hemo").checked ||  
            document.getElementById("Comp_Abdominales_Isquemia").checked || document.getElementById("Comp_Abdominales_Colecistitis").checked || document.getElementById("Comp_Abdominales_Iatrog").checked || document.getElementById("Comp_Abdominales_Iatrog_Vias_Huecas").checked || document.getElementById("Comp_Abdominales_Ileo").checked || 
            document.getElementById("Comp_Abdominales_Ileo_Mecanico").checked || document.getElementById("Comp_Abdominales_Estoma").checked || document.getElementById("Comp_Anastomosis_Hemorragia").checked || document.getElementById("Comp_Anastomosis_Fuga").checked || document.getElementById("Comp_Anastomosis_Fistula").checked || 
            document.getElementById("Comp_Otras_Hemo_Diges").checked || document.getElementById("Comp_Otras_Urologicas").checked || document.getElementById("Comp_Otras_Inf_Urinaria").checked || document.getElementById("Comp_Otras_Inf_Urinaria").checked || document.getElementById("Comp_Otras_Vascular_Mec").checked || document.getElementById("Comp_Otras_Vascular_Infecc").checked || 
            document.getElementById("Comp_Otras_Hepatica").checked || document.getElementById("Comp_Otras_Renal").checked || document.getElementById("Comp_Otras_Respiratoria").checked || document.getElementById("Comp_Otras_Respiratoria_Infecc").checked || document.getElementById("Comp_Otras_FMO").checked || 
            document.getElementById("Comp_Otras_TEP").checked || document.getElementById("Comp_Otras_Neuroapraxia").checked || document.getElementById("Comp_Otras_Cardiovascular").checked) {
                Complicaciones = 2;
            } else {

                Complicaciones = 10;
            }
        }

        if (document.getElementById("Otras_Resecciones_SI").checked) {
            if (document.getElementById("Res_Seminales").checked || document.getElementById("Res_Peritoneo").checked || document.getElementById("Res_Vejiga").checked || document.getElementById("Res_Utero").checked || document.getElementById("Res_Vagina").checked || document.getElementById("Res_Prostata").checked || document.getElementById("Res_IDelgado").checked || document.getElementById("Res_Coccix").checked || document.getElementById("Res_Sacro").checked || document.getElementById("Res_Ureter").checked || document.getElementById("Res_Ovarios").checked || document.getElementById("Res_Trompas").checked || document.getElementById("Res_Hepatica").checked) {
                Resecciones = 2;
            } else {
                Resecciones = 11;
            }
        }
        Total = Complicaciones + Resecciones;

        if (Total == 4 || Total == 0 || Total == 2) {
            CheckOK=1;
            //return true;
        } else if (Total == 12) {
            DialogMessage("Debe seleccionar alguna complicación","Faltan datos");
            return false;
        } else if (Total == 13) {
            DialogMessage("Debe seleccionar algún órgano de resección","Faltan datos");
            return false;
        } else if (Total == 21) {
            DialogMessage("Debe seleccionar alguna complicación y órgano de resección visceral","Faltan datos");
        } else if (Total == 10) {
            DialogMessage("Debe seleccionar alguna complicación","Faltan datos");
            return false;
        } else if (Total == 11) {
            DialogMessage("Debe seleccionar algún órgano de resección visceral","Faltan datos");
            return false;
        } else if (Total == 2) {
            CheckOK=1;
            //return true;
        } else {
            DialogMessage(Total);
            return false;
        }
        
    
    
    var Today = new Date();
    
    var FechaCirugia=document.getElementById('Fecha_Intervencion').value;
    
        var AñoCirugia  = parseInt(FechaCirugia.substring(0,4),10);
        var MesCirugia = parseInt(FechaCirugia.substring(5,7),10);
        MesCirugia=MesCirugia-1;
        var DiaCirugia= parseInt(FechaCirugia.substring(8,10),10);
  
    var Cirugia = new Date(AñoCirugia, MesCirugia, DiaCirugia);
    
    
    
    var FechaAlta=document.getElementById('Fecha_Alta').value;
    
        var AñoAlta  = parseInt(FechaAlta.substring(0,4),10);
        var MesAlta = parseInt(FechaAlta.substring(5,7),10);
        MesAlta=MesAlta-1;
        var DiaAlta= parseInt(FechaAlta.substring(8,10),10);
  
    var Alta = new Date(AñoAlta, MesAlta, DiaAlta);
    
      
     if (Cirugia>Today){
        DialogMessage("La fecha de cirugía es errónea","Fecha errónea");
        return false;
    }else if (Alta>Today){
        DialogMessage("La fecha de alta es errónea","Fecha errónea");
        return false;
    }else if (Cirugia>Alta){
        DialogMessage("La fecha de debe de ser posterior a la de cirugía","Fecha errónea");
        return false;
    }else{
        FechasOK=1;
    }
     
     
    if (CheckOK==1 && FechasOK==1){
        return true;
    }
    
    }

}

function HabilitaReseVisc() {

    if (document.Cirugia.Otras_Resecciones[0].checked) {

        document.getElementById("Res_Seminales").disabled = true;
        document.getElementById("Res_Peritoneo").disabled = true;
        document.getElementById("Res_Vejiga").disabled = true;
        document.getElementById("Res_Utero").disabled = true;
        document.getElementById("Res_Vagina").disabled = true;
        document.getElementById("Res_Prostata").disabled = true;
        document.getElementById("Res_Hepatica").disabled = true;
        document.getElementById("Res_IDelgado").disabled = true;
        document.getElementById("Res_Coccix").disabled = true;
        document.getElementById("Res_Sacro").disabled = true;
        document.getElementById("Res_Ureter").disabled = true;
        document.getElementById("Res_Ovarios").disabled = true;
        document.getElementById("Res_Trompas").disabled = true;

    } else if (document.Cirugia.Otras_Resecciones[1].checked) {

        if (document.getElementById("SexoInicial").value == "1") {

            document.getElementById("Res_Seminales").disabled = false;
            document.getElementById("Res_Peritoneo").disabled = false;
            document.getElementById("Res_Vejiga").disabled = false;
            document.getElementById("Res_Utero").disabled = true;
            document.getElementById("Res_Vagina").disabled = true;
            document.getElementById("Res_Prostata").disabled = false;
            document.getElementById("Res_Hepatica").disabled = false;
            document.getElementById("Res_IDelgado").disabled = false;
            document.getElementById("Res_Coccix").disabled = false;
            document.getElementById("Res_Sacro").disabled = false;
            document.getElementById("Res_Ureter").disabled = false;
            document.getElementById("Res_Ovarios").disabled = true;
            document.getElementById("Res_Trompas").disabled = true;

        } else if (document.getElementById("SexoInicial").value == "2") {

            document.getElementById("Res_Seminales").disabled = true;
            document.getElementById("Res_Peritoneo").disabled = false;
            document.getElementById("Res_Vejiga").disabled = false;
            document.getElementById("Res_Utero").disabled = false;
            document.getElementById("Res_Vagina").disabled = false;
            document.getElementById("Res_Prostata").disabled = true;
            document.getElementById("Res_Hepatica").disabled = false;
            document.getElementById("Res_IDelgado").disabled = false;
            document.getElementById("Res_Coccix").disabled = false;
            document.getElementById("Res_Sacro").disabled = false;
            document.getElementById("Res_Ureter").disabled = false;
            document.getElementById("Res_Ovarios").disabled = false;
            document.getElementById("Res_Trompas").disabled = false;
        }

    }
}

function HabilitaCirugia() {
    if (document.Cirugia.B_Cirugia[0].checked) {

        document.getElementById("Motivos_No_Cirugia").disabled = false;

        document.getElementById("Tipo_Cirugia_Electiva").disabled = true;
        document.getElementById("Tipo_Cirugia_Urgente").disabled = true;
        document.getElementById("Fecha_Intervencion").disabled = true;
        document.getElementById("Fecha_Alta").disabled = true;
        document.getElementById("rellenarAlta").disabled = true;
        document.getElementById("Cirujano_Principal").disabled = true;
        document.getElementById("Cirujano_Ayudante").disabled = true;
        document.getElementById("Tecnicas_Cirugia").disabled = true;
        document.getElementById("Otras_Tecnicas").disabled = true;
        document.getElementById("Exeresis_Mesorrecto").disabled = true;
        document.getElementById("Otras_Resecciones_SI").disabled = true;
        document.getElementById("Otras_Resecciones_NO").disabled = true;
        document.getElementById("Tipo_ASA").disabled = true;
        document.getElementById("Tipo_Hallazgos").disabled = true;
        document.getElementById("Perforacion_Tumoral_Si").disabled = true;
        document.getElementById("Perforacion_Tumoral_NO").disabled = true;
        document.getElementById("Tipo_Metast_Hepaticas").disabled = true;
        document.getElementById("Imp_Ovaricos").disabled = true;
        document.getElementById("Obstruccion").disabled = true;
        document.getElementById("Tipo_Via").disabled = true;
        document.getElementById("Tiempo_Operacion").disabled = true;
        document.getElementById("Transfusion").disabled = true;
        document.getElementById("Tipo_Intencion").disabled = true;
        document.getElementById("Tipo_Anastomosis").disabled = true;
        document.getElementById("Tipo_Reservorio").disabled = true;
        document.getElementById("Radio_Tipo_Estoma_SI").disabled = true;
        document.getElementById("Radio_Tipo_Estoma_NO").disabled = true;
        document.getElementById("B_Complicaciones_No").disabled = true;
        document.getElementById("B_Complicaciones_Si").disabled = true;
        document.getElementById("Res_Seminales").disabled = true;
        document.getElementById("Res_Peritoneo").disabled = true;
        document.getElementById("Res_Vejiga").disabled = true;
        document.getElementById("Res_Utero").disabled = true;
        document.getElementById("Res_Vagina").disabled = true;
        document.getElementById("Res_Prostata").disabled = true;
        document.getElementById("Res_Hepatica").disabled = true;
        document.getElementById("Res_IDelgado").disabled = true;
        document.getElementById("Res_Coccix").disabled = true;
        document.getElementById("Res_Sacro").disabled = true;
        document.getElementById("Res_Ureter").disabled = true;
        document.getElementById("Res_Ovarios").disabled = true;
        document.getElementById("Res_Trompas").disabled = true;
          
        document.getElementById("Reintervencion").disabled = true;
        document.getElementById("Exitus_Intra").disabled = true;
        
        document.getElementById("Exitus_Post").disabled = true;
        //document.getElementById("Texto_Reintervencion").disabled = true;
        
       // document.getElementById("Texto_Exitus_Intra").disabled = true;
       // document.getElementById("Texto_Exitus_Post").disabled = true;
        
        document.getElementById("Comp_Generales_Sepsis").disabled=true;
        document.getElementById("Comp_Generales_Shock").disabled=true;
        
        document.getElementById("Comp_Herida_Hemorragia").disabled = true;
        document.getElementById("Comp_Herida_Infeccion").disabled = true;
        document.getElementById("Comp_Herida_Evisceracion").disabled = true;
        document.getElementById("Comp_Herida_Eventracion").disabled = true;
        
        document.getElementById("Comp_Perine_Infeccion").disabled = true;
        document.getElementById("Comp_Perine_Retraso").disabled = true;
        document.getElementById("Comp_Perine_Hernia").disabled = true;
        
        
        document.getElementById("Comp_Abdominales_Hemoperitoneo").disabled = true;
        document.getElementById("Comp_Abdominales_Difusas").disabled = true;
        document.getElementById("Comp_Abdominales_Abcs").disabled = true;
       // document.getElementById("Comp_Abdominales_Hemo").disabled = true;
        document.getElementById("Comp_Pelvico_Abcs").disabled = true;
        document.getElementById("Comp_Pelvico_Hemo").disabled = true;
        document.getElementById("Comp_Abdominales_Isquemia").disabled = true;
        document.getElementById("Comp_Abdominales_Colecistitis").disabled = true;
        document.getElementById("Comp_Abdominales_Iatrog").disabled = true;
        document.getElementById("Comp_Abdominales_Iatrog_Vias_Huecas").disabled = true;
        document.getElementById("Comp_Abdominales_Ileo").disabled = true;
        document.getElementById("Comp_Abdominales_Ileo_Mecanico").disabled = true;
         document.getElementById("Comp_Abdominales_Estoma").disabled = true;
        
        document.getElementById("Comp_Anastomosis_Hemorragia").disabled = true;
        document.getElementById("Comp_Anastomosis_Fuga").disabled = true;
        document.getElementById("Comp_Anastomosis_Fistula").disabled = true;
        
        document.getElementById("Comp_Otras_Hemo_Diges").disabled = true;
        document.getElementById("Comp_Otras_Urologicas").disabled = true;
        document.getElementById("Comp_Otras_Inf_Urinaria").disabled = true;
        document.getElementById("Comp_Otras_Vascular_Mec").disabled = true;
        document.getElementById("Comp_Otras_Vascular_Infecc").disabled = true;
        document.getElementById("Comp_Otras_Hepatica").disabled = true;
        document.getElementById("Comp_Otras_Renal").disabled = true;
        document.getElementById("Comp_Otras_Respiratoria").disabled = true;
        document.getElementById("Comp_Otras_Respiratoria_Infecc").disabled = true;
        document.getElementById("Comp_Otras_FMO").disabled = true;
        document.getElementById("Comp_Otras_TEP").disabled = true;
        document.getElementById("Comp_Otras_Neuroapraxia").disabled = true;
        document.getElementById("Comp_Otras_Cardiovascular").disabled = true;

        

    } else if (document.Cirugia.B_Cirugia[1].checked) {

        document.getElementById("Motivos_No_Cirugia").disabled = true;

        document.getElementById("Tipo_Cirugia_Electiva").disabled = false;
        document.getElementById("Tipo_Cirugia_Urgente").disabled = false;
        document.getElementById("Fecha_Intervencion").disabled = false;
        document.getElementById("Fecha_Alta").disabled = false;
        document.getElementById("rellenarAlta").disabled = false;
        document.getElementById("Cirujano_Principal").disabled = false;
        document.getElementById("Cirujano_Ayudante").disabled = false;
        document.getElementById("Tecnicas_Cirugia").disabled = false;
        document.getElementById("Otras_Tecnicas").disabled = false;
        //document.getElementById("Exeresis_Mesorrecto").disabled = false;
        document.getElementById("Otras_Resecciones_SI").disabled = false;
        document.getElementById("Otras_Resecciones_NO").disabled = false;
        document.getElementById("Tipo_ASA").disabled = false;
        document.getElementById("Tipo_Hallazgos").disabled = false;
        document.getElementById("Perforacion_Tumoral_Si").disabled = false;
        document.getElementById("Perforacion_Tumoral_NO").disabled = false;
        document.getElementById("Tipo_Metast_Hepaticas").disabled = false;
        document.getElementById("Imp_Ovaricos").disabled = false;
        document.getElementById("Obstruccion").disabled = false;
        document.getElementById("Tipo_Via").disabled = false;
        document.getElementById("Tiempo_Operacion").disabled = false;
        document.getElementById("Transfusion").disabled = false;
        document.getElementById("Tipo_Intencion").disabled = false;
        document.getElementById("Tipo_Anastomosis").disabled = false;
        document.getElementById("Tipo_Reservorio").disabled = false;
        document.getElementById("Radio_Tipo_Estoma_SI").disabled = false;
        document.getElementById("Radio_Tipo_Estoma_NO").disabled = false;
        document.getElementById("B_Complicaciones_No").disabled = false;
        document.getElementById("B_Complicaciones_Si").disabled = false;
        
        FechaAlta();
    }
}

function HabilitaEstoma() {
    if (document.Cirugia.Radio_Tipo_Estoma[0].checked) {
        document.getElementById("Tipo_Estoma").disabled = true;
    } else if (document.Cirugia.Radio_Tipo_Estoma[1].checked) {
        document.getElementById("Tipo_Estoma").disabled = false;
    }
}

function HabilitaTexto_Reintervencion() {
    if (document.getElementById("Reintervencion").checked) {
        document.getElementById("Texto_Reintervencion").disabled = false;
    } else if (!document.getElementById("Reintervencion").checked) {
        document.getElementById("Texto_Reintervencion").disabled = true;
    }
}

function HabilitaTexto_Exitus_Intra() {
    if (document.getElementById("Exitus_Intra").checked) {
        document.getElementById("Texto_Exitus_Intra").disabled = false;
        document.getElementById("Exitus_Post").disabled=true;
    } else if (!document.getElementById("Exitus_Intra").checked) {
        document.getElementById("Texto_Exitus_Intra").disabled = true;
        document.getElementById("Exitus_Post").disabled=false;
    }
}

function HabilitaTexto_Exitus_Post() {
    if (document.getElementById("Exitus_Post").checked) {
        document.getElementById("Texto_Exitus_Post").disabled = false;
        document.getElementById("Exitus_Intra").disabled=true;
    } else if (!document.getElementById("Exitus_Post").checked) {
        document.getElementById("Texto_Exitus_Post").disabled = true;
        document.getElementById("Exitus_Intra").disabled=false;
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
           
            /******* Cirugía *******/
           
           if (data["B_Cirugia"] == 2 ) //No
           {
               putRadioButton('B_Cirugia_No');
               $('#Motivos_No_Cirugia').prop('selectedIndex', data["Motivo_No_Cirugia"] - 1);
                    
                   // $('#Motivos_No_Cirugia').prop('selectedIndex', -1);
                    $('#Tecnicas_Cirugia').prop('selectedIndex', -1);
                    $('#Exeresis_Mesorrecto').prop('selectedIndex', -1);
                    $('#Tipo_ASA').prop('selectedIndex', -1);
                    $('#Tipo_Hallazgos').prop('selectedIndex', -1);
                    $('#Tipo_Metast_Hepaticas').prop('selectedIndex', -1);
                    $('#Tipo_Via').prop('selectedIndex', -1);
                    $('#Tipo_Intencion').prop('selectedIndex', -1);
                    $('#Tipo_Anastomosis').prop('selectedIndex', -1);
                    $('#Tipo_Reservorio').prop('selectedIndex', -1);
                    $('#Tipo_Estoma').prop('selectedIndex', -1);
                    $('#').prop('selectedIndex', -1);
                    $('#').prop('selectedIndex', -1);
                                
                    
           }
           else if( data["B_Cirugia"] == 0)
           {
               putRadioButton('B_Cirugia_No');
               $('#Motivos_No_Cirugia').prop('selectedIndex', 3);
               
                    //$('#Motivos_No_Cirugia').prop('selectedIndex', -1);
                    $('#Tecnicas_Cirugia').prop('selectedIndex', -1);
                    $('#Exeresis_Mesorrecto').prop('selectedIndex', -1);
                    $('#Tipo_ASA').prop('selectedIndex', -1);
                    $('#Tipo_Hallazgos').prop('selectedIndex', -1);
                    $('#Tipo_Metast_Hepaticas').prop('selectedIndex', -1);
                    $('#Tipo_Via').prop('selectedIndex', -1);
                    $('#Tipo_Intencion').prop('selectedIndex', -1);
                    $('#Tipo_Anastomosis').prop('selectedIndex', -1);
                    $('#Tipo_Reservorio').prop('selectedIndex', -1);
                    $('#Tipo_Estoma').prop('selectedIndex', -1);
                    $('#').prop('selectedIndex', -1);
                    $('#').prop('selectedIndex', -1);
                    
           }
           
           else
           { //Si
               putRadioButton('B_Cirugia_Si');
               $('#Motivos_No_Cirugia').prop('selectedIndex', -1);
               
               
               switch (data["Tipo_Cirugia"]) {
                case 1://Si
                    putRadioButton('Tipo_Cirugia_Electiva');
                    break;
                case 2: //No
                    putRadioButton('Tipo_Cirugia_Urgente');
                    break;
                default:
                    break;
                }
           
               document.getElementById("Fecha_Intervencion").value=data["Fecha_Cirugia"];
               
                      
               //if (document.getElementById("Fecha_Alta_Pendiente").value==1){
                var cadena = document.getElementById("Fecha_Alta_Pendiente").value.replace(/\s/g,'');
                if(cadena=="on" || cadena==1){
                //if (document.getElementById("Fecha_Alta_Pendiente").value=="on"){
      
                //alert(data["Fecha_Alta_Pendiente"]);
                //if (data["Fecha_Alta_Pendiente"] != null){
                                 
                document.getElementById("rellenarAlta").checked=true;
                document.getElementById("Fecha_Alta").disabled=true;
               }else{
                  document.getElementById("Fecha_Alta").value=data["Fecha_Alta"];
                   enabledElement('Fecha_Alta');
                   document.getElementById("rellenarAlta").checked=false;
               }
               
               //alert(data["Fecha_Alta_Pendiente"]);
           /*    
               if (data["Fecha_Alta_Pendiente"] == 1) //No se ha rellenado
               {  
                        
                   putCheckBox('rellenarAlta');
                   disabledElement('Fecha_Alta');
                  // document.getElementById("Fecha_Alta").disabled = true;

                 
               }else{
                   document.getElementById("Fecha_Alta").value=data["Fecha_Alta"];
                   enabledElement('Fecha_Alta');

               }
               
             */                
               
               document.getElementById("Cirujano_Principal").value=data["Cirujano_Principal"];
               document.getElementById("Cirujano_Ayudante").value=data["Cirujano_Ayudante"];
               
                                
                if (data["Localizacion"] <= 10)
                {
                    //Quita la técnica 2
                    if (data["Tecnicas_Cirugia"] < 2)
                    {
                        $('#Tecnicas_Cirugia').prop('selectedIndex', data["Tecnicas_Cirugia"] - 1);
               
                    }else{
                        $('#Tecnicas_Cirugia').prop('selectedIndex', data["Tecnicas_Cirugia"] - 2);
                    }
                   
                }
                else
                {
                    //Quita la técnica 3
                    if (data["Tecnicas_Cirugia"] < 3)
                    {
                        $('#Tecnicas_Cirugia').prop('selectedIndex', data["Tecnicas_Cirugia"] - 1);
               
                    }else{
                        $('#Tecnicas_Cirugia').prop('selectedIndex', data["Tecnicas_Cirugia"] - 2);
               
                    }
                    
                }
               
               //var cir = data["Otra_Tecnica_Cirugia"][1] + " " + data["Otra_Tecnica_Cirugia"][2] + " count " + data["Otra_Tecnica_Cirugia"].length + "; ";   
               
               /*var cir = " ";                      
               for (var i=0; i <  + data["Otra_Tecnica_Cirugia"].length; i++) {
                 cir = cir + data["Otra_Tecnica_Cirugia"][i] + " ";
               };
               
               alert(cir);*/
              
              if(data["Otra_Tecnica_Cirugia"] != null)
              {
                  var vendorsArray = new Array(data["Otra_Tecnica_Cirugia"].length);
    
                  for (var i=0; i <  + data["Otra_Tecnica_Cirugia"].length; i++) {
                     
                     vendorsArray[i] = data["Otra_Tecnica_Cirugia"][i];
                   
                   }
    
                   $('#Otras_Tecnicas').val( vendorsArray);
                }
              /*for (var i=0; i <  + data["Otra_Tecnica_Cirugia"].length; i++) {
                 
                 $('#Otras_Tecnicas').prop('selectedIndex', data["Otra_Tecnica_Cirugia"][i]);
               
               };*/
               
               // alert(data["Otra_Tecnica_Cirugia"][0]);
               // $('#Otras_Tecnicas').prop('selectedIndex', data["Otra_Tecnica_Cirugia"][0] - 1);
               
               
               
               if (data["Tecnicas_Cirugia"] == 4 || data["Tecnicas_Cirugia"] == 10){
                    switch (data["Orientacion"]) {
                        case 1://Prono
                            putRadioButton('Orient_Prono');
                            break;
                        case 2://Supino
                            putRadioButton('Orient_Supino');
                            break;
                        default:
                            break;
                    }
               }
               
               
               //document.getElementById("Otras_Tecnicas[]").value=data["Otra_Tecnica_Cirugia"];
               $('#Exeresis_Mesorrecto').prop('selectedIndex', data["Exeresis_Meso"] - 1);
               
                switch (data["Otras_Resecc_Viscerales"]) {
                case 1://Si
                    putRadioButton('Otras_Resecciones_SI');
                    break;
                case 2://No
                    putRadioButton('Otras_Resecciones_NO');
                    break;
                default:
                    break;
                }
                
                isCheckBoxSelected('Res_Seminales', data["Res_Seminales"]);
                isCheckBoxSelected('Res_Peritoneo', data["Res_Peritoneo"]);
                isCheckBoxSelected('Res_Vejiga', data["Res_Vejiga"]);
                isCheckBoxSelected('Res_Utero', data["Res_Utero"]);
                isCheckBoxSelected('Res_Vagina', data["Res_Vagina"]);
                isCheckBoxSelected('Res_Prostata', data["Res_Prostata"]);
                isCheckBoxSelected('Res_Hepatica', data["Res_Hepatica"]);
                isCheckBoxSelected('Res_IDelgado', data["Res_IDelgado"]);
                isCheckBoxSelected('Res_Coccix', data["Res_Coccix"]);
                isCheckBoxSelected('Res_Sacro', data["Res_Sacro"]);
                isCheckBoxSelected('Res_Ureter', data["Res_Ureter"]); 
                isCheckBoxSelected('Res_Ovarios', data["Res_Ovarios"]); 
                isCheckBoxSelected('Res_Trompas', data["Res_Trompas"]);   
                
                HabilitaReseVisc();
                
                 /******* Resultados *******/
                $('#Tipo_ASA').prop('selectedIndex', data["ASA"] - 1);
                $('#Tipo_Hallazgos').prop('selectedIndex', data["Hallazgos_Intraoperatorios"] - 1);
                
                 switch (data["Perforacion_Tumoral"]) {
                    case 1://Si
                        putRadioButton('Perforacion_Tumoral_Si');
                        break;
                    case 0://No
                        putRadioButton('Perforacion_Tumoral_NO');
                        break;
                    default:
                        break;
                }  
                $('#Tipo_Metast_Hepaticas').prop('selectedIndex', data["Tipo_Metast_Hepaticas"] - 1);
                
                if(data["Imp_Ovaricos"] == 1)
                {
                   putCheckBox('Imp_Ovaricos');
                }
                
                if(data["Obstruccion"] == 1)
                {
                   putCheckBox('Obstruccion');
                }
                 
                 /******* Características *******/
                 
                                 
                $('#Tipo_Via').prop('selectedIndex', data["Via_Operacion"] - 1);
                document.getElementById("Tiempo_Operacion").value=data["Tiempo_Operacion"];
                document.getElementById("Transfusion").value=data["Transfusiones"];
                $('#Tipo_Intencion').prop('selectedIndex', data["Intencion_Operatoria"] - 1);
                $('#Tipo_Anastomosis').prop('selectedIndex', data["Anastomosis"] - 1);
                $('#Tipo_Reservorio').prop('selectedIndex', data["Reservorio"] - 1);

                
                switch (data["Estoma_Derivacion"]) {
                case 1://Si
                    putRadioButton('Radio_Tipo_Estoma_SI');
                    $('#Tipo_Estoma').prop('selectedIndex', data["Tipo_Estoma"] - 1);
                    break;
                case 2://No
                    putRadioButton('Radio_Tipo_Estoma_NO');
                    break;
                default:
                    break;
                } 
                
                HabilitaEstoma(); 
                
               /******* Complicaciones *******/
              if (data["Complicaciones"] == 2) //No
               {
                   putRadioButton('B_Complicaciones_No');     
               }else{ //Si
                   putRadioButton('B_Complicaciones_Si');
                   
                   
                   if(data["Reintervencion"] == 1)
                    {
                       putCheckBox('Reintervencion');
                       document.getElementById("Texto_Reintervencion").value=data["Tipo_Reintervencion"];
                       HabilitaTexto_Reintervencion();
                    }
                    if(data["Exitus_Intra"] == 1)
                    {
                        putCheckBox('Exitus_Intra');
                       document.getElementById("Texto_Exitus_Intra").value=data["Causa_Exitus_Intra"];
                       HabilitaTexto_Exitus_Intra();
                    }
                    if(data["Exitus_Post"] == 1)
                    {
                       putCheckBox('Exitus_Post');
                       document.getElementById("Texto_Exitus_Post").value=data["Causa_Exitus_Post"];
                       HabilitaTexto_Exitus_Post();
                    }
                    
                    
                    isCheckBoxSelected('Comp_Generales_Sepsis', data["Generales_Sepsis"]);
                    isCheckBoxSelected('Comp_Generales_Shock', data["Generales_Shock"]);
                    
                    isCheckBoxSelected('Comp_Herida_Hemorragia', data["Herida_Hemorragia"]);
                    isCheckBoxSelected('Comp_Herida_Infeccion', data["Herida_Infeccion"]);
                    isCheckBoxSelected('Comp_Herida_Evisceracion', data["Herida_Evisceracion"]);
                    isCheckBoxSelected('Comp_Herida_Eventracion', data["Herida_Eventracion"]);
                    
                
                    isCheckBoxSelected('Comp_Perine_Infeccion', data["Perine_Infeccion"]);
                    isCheckBoxSelected('Comp_Perine_Retraso', data["Perine_Retraso_Cicatrizacion"]);
                    isCheckBoxSelected('Comp_Perine_Hernia', data["Perine_Hernia"]);
                

                    isCheckBoxSelected('Comp_Abdominales_Hemoperitoneo', data["Abdominales_Hemoperitoneo"]);
                    isCheckBoxSelected('Comp_Abdominales_Difusas', data["Abdominales_Peri_Difusas"]);
                    isCheckBoxSelected('Comp_Abdominales_Abcs', data["Abdominales_Abceso_Abdominal"]);             
                   // isCheckBoxSelected('Comp_Abdominales_Hemo', data["Abdominales_Hemo_Abdominal"]);
                    isCheckBoxSelected('Comp_Pelvico_Hemo', data["Abdominales_Hemo_Pelvica"]);
                    isCheckBoxSelected('Comp_Pelvico_Abcs', data["Abdominales_Abceso_Pelvico"]); 
                    isCheckBoxSelected('Comp_Abdominales_Isquemia', data["Abdominales_Isquemia_Intestinal"]);
                    isCheckBoxSelected('Comp_Abdominales_Colecistitis', data["Abdominales_Colecistitis"]);
                    isCheckBoxSelected('Comp_Abdominales_Iatrog', data["Abdominales_Iatrog_Vias_Urinarias"]);
                    isCheckBoxSelected('Comp_Abdominales_Iatrog_Vias_Huecas', data["Abdominales_Iatrog_Vias_Huecas"]);
                    isCheckBoxSelected('Comp_Abdominales_Ileo', data["Abdominales_Ileo_Paralitico_Prolongado"]);
                    isCheckBoxSelected('Comp_Abdominales_Ileo_Mecanico', data["Abdominales_Ileo_Mecanico"]);  
                    isCheckBoxSelected('Comp_Abdominales_Estoma', data["Abdominales_Estoma"]);
                
                                
                    isCheckBoxSelected('Comp_Anastomosis_Hemorragia', data["Anastomosis_Hemorragia"]);
                    isCheckBoxSelected('Comp_Anastomosis_Fuga', data["Anastomosis_Fuga"]);
                    isCheckBoxSelected('Comp_Anastomosis_Fistula', data["Anastomosis_Fistula"]);

    
                
                    isCheckBoxSelected('Comp_Otras_Hemo_Diges', data["Otras_Hemo_Diges"]);
                    isCheckBoxSelected('Comp_Otras_Urologicas', data["Comp_Otras_Urologicas"]);
                    isCheckBoxSelected('Comp_Otras_Inf_Urinaria', data["Otras_Infeccion_Urinaria"]);
                    isCheckBoxSelected('Comp_Otras_Vascular_Mec', data["Otras_Vascular_Mec"]);
                    isCheckBoxSelected('Comp_Otras_Vascular_Infecc', data["Otras_Vascular_Infecc"]);
                    isCheckBoxSelected('Comp_Otras_Hepatica', data["Otras_Hepatica"]);
                    isCheckBoxSelected('Comp_Otras_Renal', data["Otras_Renal"]);
                    isCheckBoxSelected('Comp_Otras_Respiratoria', data["Otras_Respiratoria"]);
                    isCheckBoxSelected('Comp_Otras_Respiratoria_Infecc', data["Otras_Respiratoria_Infecc"]);
                    isCheckBoxSelected('Comp_Otras_FMO', data["Otras_FMO"]);
                    isCheckBoxSelected('Comp_Otras_TEP', data["Otras_TEP"]);
                    isCheckBoxSelected('Comp_Otras_Neuroapraxia', data["Otras_Neuroapraxia"]);
                    isCheckBoxSelected('Comp_Otras_Cardiovascular', data["Otras_Cardiovascular"]);

                    
               }//Fin de  data["Complicaciones"]
              
           }//Fin de  data["B_Cirugia"]
           
           HabilitaComplicaciones();
           HabilitaCirugia();
           
           //FechaAlta();
           tecnicaMesorrecto();
          
        }
    }
    
    xmlhttp.open("POST", "GetSessionVariables.php?", true);
    xmlhttp.send();
}

//Función de ayuda para poner o quitar los checkbox
function isCheckBoxSelected(idSelect, data)
{

    
    if (data != null)
    {
        //alert("Dato: " + data + " Check: " + idSelect);
        putCheckBox(idSelect);
    }
    else
    {
        //alert("Dato: " + data + " Uncheck: " + idSelect);
        removeCheckBox(idSelect);
    }
}



