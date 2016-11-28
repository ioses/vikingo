/* **********************   jQuery   *********************************/   
$(document).ready(function() {
    
    //Ver si entramos de "modificar paciente" o de "introducir nuevo paciente"
    if ($('#EnviarTratamiento').val() == -1 || $('#EnviarTratamiento').val() == null)
    {
        //En los ListBox no salga nada seleccionado
        $('#tipo_neo').prop('selectedIndex', -1);
        $('#tipo_no_neo').prop('selectedIndex', -1);
        $('#tipo_ady').prop('selectedIndex', -1);
        
    }else
    {
        CargarDatos();//Entramos por modificar, cargamos los datos del paciente
    }
    
    
    $('#tipo_no_neo').change(function()
    {
        var t = document.getElementById("tipo_no_neo");
    
        if (t.selectedIndex > 0)
        {
           var selectedText = t.options[t.selectedIndex].text;
            //alert(val + " " + content);
        
            if (selectedText == "Muerte") {
                if ($('#rellenar').is(':checked')) {
                    disabledElement('rellenar');
                    checkRellenar();
                    
                }else{
                    putCheckBox('rellenar');
                    checkRellenar();
                    removeCheckBox('rellenar');
                    disabledElement('rellenar');
                }
                
                
            } else {
                enabledElement('rellenar');
                checkRellenar();
            }   
        }
    });

    //Rellenar pendiente el tratamiento adyuvante
    $('#rellenar').change(function(){
        checkRellenar();
    });
}); 


/* **********************   javascript   *********************************/ 

//Validaciones de los campos

function checkRellenar()
{
    if ($('#rellenar').is(':checked')) {
            //$("#divAdyuvante").attr("disabled", "disabled");
            disabledElement('B_Tto_Ady_Si');
            disabledElement('B_Tto_Ady_No');
            disabledElement('tipo_ady');
            
        }
        else
        {
            enabledElement('B_Tto_Ady_Si');
            enabledElement('B_Tto_Ady_No');
            enabledElement('tipo_ady');
        }
}

function validateRadioButton()//Vemos si han seleccionado tratamiento neoadyuvante (RadioButton si o no)
{
    if (!document.getElementById('B_Tto_Neo_Si').checked && !document.getElementById('B_Tto_Neo_No').checked)

        alert('Seleccione si se ha realizado el tratamiento neoadyuvante.');
    else

        validateSelectField();
}

function validateSelectField()//Validamos si en el select hay un item seleccionado
{
    var selIndexTN = document.getElementById("tipo_neo").selectedIndex;
    var selIndexTNN = document.getElementById("tipo_no_neo").selectedIndex;
    var selIndexTA = document.getElementById("tipo_ady").selectedIndex;

    if (document.getElementById('B_Tto_Neo_Si').checked) {
        if (selIndexTN == -1) {
            alert("En tratamiento neoadyuvante, seleccione el tratamiento operatorio.");
        }
    } else if (document.getElementById('B_Tto_Neo_No').checked) {
        if (selIndexTNN == -1) {
            alert("En tratamiento neoadyuvante, seleccione el motivo.");
        }
    }

    if (document.getElementById('B_Tto_Ady').checked) {
        if (selIndexTA == -1) {
            alert("En tratamiento adyuvante, seleccione el tratamiento postoperatorio.");
        }
    }
} //End validateSelectField()

function habilitaNeoadyuvante()
{
    if (document.Tratamiento.B_Tto_Neo[0].checked) { //Si
        enabledElement('tipo_neo'); 
        disabledElement('tipo_no_neo');
    } else if (document.Tratamiento.B_Tto_Neo[1].checked) { //No
        disabledElement('tipo_neo'); 
        enabledElement('tipo_no_neo');
    }
   
}

function habilitaAdyuvante()
{
    if (document.Tratamiento.B_Tto_Ady[0].checked) { //Si
        enabledElement('tipo_ady') 
    } else if (document.Tratamiento.B_Tto_Ady[1].checked) { //No
        disabledElement('tipo_ady');

    }
}

function deshabilitaAdyuvante()
{  
    disabledElement('rellenar');
    disabledElement('B_Tto_Ady_Si');
    disabledElement('B_Tto_Ady_No');
    disabledElement('tipo_ady'); 
    
    putRadioButton('B_Tto_Ady_No');
    
        $('#tipo_ady').prop('selectedIndex', -1);
    
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

           /******* Tratamiento neoadyuvante *******/
           
           switch (data["B_Tto_Neo"]) {
                case 1:
                    putRadioButton('B_Tto_Neo_Si');
                    $('#tipo_neo').prop('selectedIndex', data["Tipo_TTO_Neoadyuvante"] - 2);
                    $('#tipo_no_neo').prop('selectedIndex', -1);
                    break;
                case 2:
                    putRadioButton('B_Tto_Neo_No');
                    $('#tipo_no_neo').prop('selectedIndex', data["tipo_no_neo"] - 1);
                    $('#tipo_neo').prop('selectedIndex', -1); 
                    break;
                default:
                    break;
            } 
            habilitaNeoadyuvante();
            
           /******* Tratamiento adyuvante *******/
          
          if ( data["Adyuvante_Pendiente"] == 1)
          {
              putCheckBox('rellenar');
              checkRellenar();
          }
          else
          {
             switch (data["TTO_Adyuvante"]) {
                case 1:
                    putRadioButton('B_Tto_Ady_Si');
                    $('#tipo_ady').prop('selectedIndex', data["Tipo_TTO_Adyuvante"] - 2);
                    break;
                case 2:
                    putRadioButton('B_Tto_Ady_No');
                    $('#tipo_ady').prop('selectedIndex', -1); 
                    break;
                case 3:
                    deshabilitaAdyuvante();    
                default:
                    break;
              }
              habilitaAdyuvante();
          }

        }
    }
    
    xmlhttp.open("POST", "GetSessionVariables.php?", true);
    xmlhttp.send();
}

