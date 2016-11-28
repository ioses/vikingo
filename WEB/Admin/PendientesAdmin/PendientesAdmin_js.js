/**
 * @author D641598
 */

$(document).ready(function() {
     selectHospital();
 });
        
function selectHospital(){
	var IdHospital=document.getElementById('Hospital').value;
	 var xmlhttp;
 
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    		
          
             document.getElementById("tablaBody").innerHTML=xmlhttp.responseText;
			

		}

	}
	xmlhttp.open("GET","getPendientesHospital.php?ID="+IdHospital,true);
	xmlhttp.send();
}
