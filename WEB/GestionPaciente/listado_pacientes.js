/**
 * @author D681892
 */
/* **********************   jQuery   *********************************/   
$(document).ready(function() {

    //Rellenar el input con los NHCs de los pacientes en buscar pacientes
    $("#BuscaNHC").autocomplete({
        source : '../BuscaPaciente/get_lista_NHC.php'
     });
     
     //Carga los NHCs (filtro)
     showNHC();
 });
         
/* **********************   AJAX   *********************************/ 
//Carga los NHC-s de los paciente         
function showNHC()
{
   
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            
             //Insertamos la tabla traida desde el php 
            document.getElementById("tablaBody").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","getNHCVariables.php",true);
    xmlhttp.send();
}