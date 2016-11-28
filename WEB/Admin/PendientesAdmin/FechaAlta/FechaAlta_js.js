/* **********************   jQuery   *********************************/   

function CompruebaFechas(str){
	
	 var xmlhttp;
 
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	
	
		var FechaRevision=document.getElementById('FechaAlta').value;
		var AñoRevision  = parseInt(FechaRevision.substring(0,4),10);
	 	var MesRevision = parseInt(FechaRevision.substring(5,7),10);
	 	MesRevision=MesRevision-1;
	 	var DiaRevision= parseInt(FechaRevision.substring(8,10),10);
	 	
	 var Revision = new Date(AñoRevision, MesRevision, DiaRevision);	
	 
	 var Today= new Date();
			
		if (Revision>Today){
		alert("La fecha de revisión es errónea");
		return false;
		}	

			if(xmlhttp.responseText=="1"){
				
				alert("La fecha de alta debe ser posterior a la de la operación");	
				return false;
			}else{
				
				return true;
			}
		}
	}
	xmlhttp.open("GET","getCompruebaFechaAlta.php?q="+str,true);
	xmlhttp.send();

}
