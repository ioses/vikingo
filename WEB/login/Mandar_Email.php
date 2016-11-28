<?php

    //Si el usuario ha pardido la contraseña, se comprueban
    //los datos y se manda un email con la clave
    
    
    require_once ("../BDD/conexion.php");

	
	/* Empieza la conexion y el login */    
    $username = $_POST['username'];
    $email = $_POST['email'];
	$query = "SELECT AES_DECRYPT(password,'$clave') FROM tabla_login WHERE user = '$username' AND Email='$email'";
    $result=mysqli_query($conexion, $query) or die (mysqli_error());

	if ($result) //Mirar si la consulta está bien hecha
	{		
		while($row = mysqli_fetch_array($result))			
  		{
           
			$pass = $row[0];
            $to = $_POST['email']; 
            $subject = "Recuperación de contraseña proyecto vikingo";	
			$message = "Hola " . $username . ",\nla contraseña asociada a su cuenta es el siguiente: " . $pass . "\n\n Proyecto Vikingo \nwww.proyectovikingo.org";
            $from = "Proyecto Vikingo <info@proyectovikingo.org>";
			$headers = "From:" . $from;
            mail($to,$subject,$message,$headers);
            
              
          }	
	}
	else
	{
		echo "Consulta SQL mal hecha.";
	}	
    
    header('Location: Email_Request.php');
	
	mysqli_close($conexion);	
?>
