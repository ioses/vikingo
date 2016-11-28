/**
 * @author D641598
 */

/* **********************   AJAX   *********************************/ 
function VerUsuario()
{
	var xmlhttp;
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
           
           //Insertamos la tabla traida desde el php 
           var data = JSON.parse( xmlhttp.responseText );

            document.getElementById("login").value=data["User"];
            document.getElementById("Password").value=data["Password"];
			document.getElementById("email").value=data["Email"];
        }
    }
    
    xmlhttp.open("GET","DevuelveUser.php?IDH="+IdHospital,true);
    xmlhttp.send();
}