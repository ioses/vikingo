$(document).ready(function() {

    VerUsuario();//Carga los datos del usuario
 
});


//Ver los datos del usuario
function VerUsuario()
{
	var xmlhttp;
   
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
            /*
             * Insertamos la tabla traida desde el php 
             */
            
           var data = JSON.parse( xmlhttp.responseText );

            document.getElementById("login").value=data["User"];
            document.getElementById("password").value=data["Password"];
			document.getElementById("email").value=data["Email"];
        }
    }
    
    xmlhttp.open("GET","DevuelveUser.php",true);
    xmlhttp.send();
}


/*** Recoge la información de los cambios en usuario, contraseña y/o email (luego llama a UpdateDato)***/
function cambiarUsuario()
{
	document.getElementById("login").disabled = false;
	if (document.getElementById("btnlogin").value == "Guardar usuario")
	{
		UpdateDato(document.getElementById("login").value, 1);
	}
	document.getElementById("btnlogin").setAttribute("class", "btn");
}

function CambiarContraseña()
{
	document.getElementById("password").disabled = false;
	if (document.getElementById("btnpassword").value == "Guardar contraseña")
	{
		UpdateDato(document.getElementById("password").value, 2);
	}
	document.getElementById("btnpassword").setAttribute("class", "btn");
}

function CambiarEmail()
{
	document.getElementById("email").disabled = false;
	if (document.getElementById("btnemail").value == "Guardar email")
	{
		UpdateDato(document.getElementById("email").value, 3);
	}
	document.getElementById("btnemail").setAttribute("class", "btn");
}

//Función que hace efectua el cambio en la BDD
function UpdateDato(dato, que)
{
	var xmlhttp;
   
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
        	
			if (xmlhttp.responseText == "btn btn-success")
			{

		
				if (que == 1)
				{
					document.getElementById("btnlogin").setAttribute("class", xmlhttp.responseText);
					document.getElementById("btnlogin").value = "Usuario guardado";
				}
				else if (que == 2)
				{
					document.getElementById("btnpassword").setAttribute("class", xmlhttp.responseText);
					document.getElementById("btnpassword").value = "Contraseña guardado";
				}
				else if (que == 3)
				{
					document.getElementById("btnemail").setAttribute("class", xmlhttp.responseText);
					document.getElementById("btnemail").value = "Email guardado";
				}

				}
			}
	}
    
    xmlhttp.open("GET","GuardarDatos.php?dato=" + dato + "&que=" + que,true);
    xmlhttp.send();
}