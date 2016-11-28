/* **********************   jQuery   *********************************/   
$(document).ready(function() {

     //En los ListBox no salga nada seleccionado
     $('#tipo_ady').prop('selectedIndex', -1);  

});
    
/* **********************   javascript   *********************************/ 


function habilitaAdyuvante()
{
    if (document.FormAdyuvante.B_Tto_Ady[0].checked) { //Si
      
        enabledElement('tipo_ady') 
    } else if (document.FormAdyuvante.B_Tto_Ady[1].checked) { //No
    	
        disabledElement('tipo_ady');

    }
}

