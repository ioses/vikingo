/**
 * @author D681892
 */

/* **********************   jQuery   *********************************/   

$(document).ready(function() {
    //Carga los datos de un paciente
    showDatos($("#NHC").val());
 });
         
/* **********************   AJAX   *********************************/ 
//Carga los datos de un paciente         
function showDatos(nhc)
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
            document.getElementById("datosPaciente").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","getDatosPaciente.php?NHC=" + nhc,true);
    xmlhttp.send();
}