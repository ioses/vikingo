$(document).ready(function() {
   
     $('#HospitalKaplanMeier').prop('selectedIndex', -1);
   
  });  
  
  
function HabilitaHospital(){
	if(document.EligeParametros.TipoInformeHospitales[0].checked){
		document.getElementById("HospitalKaplanMeier").disabled=true;
		document.getElementById("HospitalKaplanMeier").value=0;
	}else if(document.EligeParametros.TipoInformeHospitales[1].checked){
		document.getElementById("HospitalKaplanMeier").disabled=false;
		document.getElementById("HospitalKaplanMeier").value=document.getElementById("HospitalAnalisis").value
	}
}


function HabilitaSeguimiento(){
	if(document.EligeParametros.RecortaMeses[0].checked){
		document.getElementById("MesesMinimos").disabled=true;
	}else if(document.EligeParametros.RecortaMeses[1].checked){
		document.getElementById("MesesMinimos").disabled=false;
	}
}