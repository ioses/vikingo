<?php

    //Conexión a la BDD (Se referencia a las páginas que requieren hacer la conexión)
    
  
    
    
    
    //$conn = mysql_connect("10.110.14.38", "vikingo","123123") or die(mysql_error());
	//$db = mysql_select_db("vikingodatabase") or die(mysql_error()); 
	
	$conexion = mysqli_connect("mysql.hostinger.es","u281826105_root","qwerty","u281826105_vikin") or die (mysql_error());	

	//$conexion = mysqli_connect("www.proyectovikingo.org","proyectovikingo","vgfD2efdf4xD","proyectovikingo") or die (mysql_error());
	//$conexion = mysqli_connect("d438.dinaserver.com","proyvikingo","123123vikingo","dbbvikingo") or die (mysql_error());
	//$conexion = mysqli_connect("d438.dinaserver.com","proyectovikingo","123123vikingo","vikingodbb") or die (mysql_error());
	//$conexion = mysqli_connect("sql.310.eshost.es","eshos_13674592","12341234","eshos_13674592_dbbvikingo") or die (mysql_error());
	
	//Clave apra encriptar las contraseñas
	$clave="Vikingo";
	$claveNHC="Red_Eures";
	

?>
