/**
 * @author D681892
 */
$(document).ready(function() {
    
    /***********PÁGINA EN MANTENIMIENTO****************/
       //window.location = "../mantenimiento.html";

        //Miramos si el navegador es compatible
        var array = detecta_navegador();
	  
	   //Con cada navegador miramos la compatibilidad
	    if (array['navegador'] == ('MS Internet Explorer')){
			if (parseFloat(array['version']) < 10 )
			{
				window.location = "descarga_navegadores.php";
			}
		}
		else if (array['navegador'] == ('Google Chrome')){
			if (parseFloat(array['version']) < 25 )
			{
				window.location = "descarga_navegadores.php";
			}
		}
		else if (array['navegador'] == ('Mozilla Firefox')){
			if (parseFloat(array['version']) < 15 )
			{
				window.location = "descarga_navegadores.php";
			}
		}
		else if (array['navegador'] == ('Apple Safari')){//<< Here
			if (parseFloat(array['version']) < 5.1 )
			{
				window.location = "descarga_navegadores.php";
			}

		}
		else if (array['navegador'] == ('Opera')){
			if (parseFloat(array['version']) < 15 )
			{
				window.location = "descarga_navegadores.php";
			}
		
		}
		else
		{
			window.location = "descarga_navegadores.php";
		}
    
      rellenaError();
  
 });
         

//Función para ver la compatibilidad del navegador con HTML5        
function detecta_navegador()
{

    var array = new Array();
       
       //Detect browser and write the corresponding name
    if (navigator.userAgent.search("MSIE") >= 0){
        array['navegador'] = ('MS Internet Explorer');
        var position = navigator.userAgent.search("MSIE") + 5;
        var end = navigator.userAgent.search("; Windows");
        array['version'] = navigator.userAgent.substring(position,end);
    }
    else if (navigator.userAgent.search("Chrome") >= 0){
        array['navegador'] = ('Google Chrome');// For some reason in the browser identification Chrome contains the word "Safari" so when detecting for Safari you need to include Not Chrome
        var position = navigator.userAgent.search("Chrome") + 7;
        var end = navigator.userAgent.search(" Safari");
        array['version']  = navigator.userAgent.substring(position,end);
    }
    else if (navigator.userAgent.search("Firefox") >= 0){
        array['navegador'] = ('Mozilla Firefox');
        var position = navigator.userAgent.search("Firefox") + 8;
        array['version']  = navigator.userAgent.substring(position);
    }
    else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0){//<< Here
        array['navegador'] = ('Apple Safari');
        var position = navigator.userAgent.search("Version") + 8;
        var end = navigator.userAgent.search(" Safari");
        array['version']  = navigator.userAgent.substring(position,end);
    }
    else if (navigator.userAgent.search("Opera") >= 0){
        array['navegador'] = ('Opera');
        var position = navigator.userAgent.search("Version") + 8;
        array['version']  = navigator.userAgent.substring(position);
    }
    else{
        array = null;
        //navegador =('"Other"');
    }
    
    //alert("Navegador: " + array['navegador'] + ", versión: " + array['version'] );

    return array;
}

//Función para mostrar los errores
function rellenaError()
{
    
    if(document.getElementById("var").value == "Error")
    {
        document.getElementById("errorAlert").style.visibility = 'visible';
        document.getElementById("errorAlertCaduca").style.visibility = 'hidden'; 
         
        //alert(document.getElementById("var").value);
    }
    else
    {
        document.getElementById("errorAlert").style.visibility = 'hidden';
    }
    
    if(document.getElementById("var").value == "Caduca")
    {
        document.getElementById("errorAlertCaduca").style.visibility = 'visible';
        document.getElementById("errorAlert").style.visibility = 'hidden'; 
         
        //alert(document.getElementById("var").value);
    }
    else
    {
        document.getElementById("errorAlertCaduca").style.visibility = 'hidden';
       
    }
}
