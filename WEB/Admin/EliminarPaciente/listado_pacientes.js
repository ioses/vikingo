/**
 * @author D681892
 */

$(document).ready(function() {

     //Carga de los pacientes del hospital
     showNHC($("#idHospi").val(), $("#NHC").val(), $("#Hospital").text());

 
 });
         
/* **********************   AJAX   *********************************/          
//Carga de los pacientes del hospital
function showNHC()
{
	 var IdHospital=document.getElementById('Hospital').value;
   
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
            //alert($("#Hospital").text());
            /*
             * Insertamos la tabla traida desde el php 
             */
            document.getElementById("tablaBody").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","getNHCVariables.php?idHospi=" + IdHospital);
    xmlhttp.send();
}


