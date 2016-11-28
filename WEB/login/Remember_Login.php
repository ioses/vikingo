<?php

    //Se hace la comprobación del usuario y contraseña introducido por el 
    //usuario y el BDD
	session_start();
    
    require_once ("../BDD/conexion.php");
	
    function buscarHospital($idHospital)
        {
                $query = "SELECT Nombre FROM tabla_hospital WHERE Codigo = '$idHospital'";
                $result = mysqli_query($conexion, $query);

                while ($row = mysqli_fetch_array($result))
                {
                        $HospitalName = $row['Nombre'];              
                        return $row['Nombre'];
                }
        }
    
        
        /* Empieza la conexion y el login */
         
	   	$username=$_POST['username'];
		$username=strip_tags($username);
		
		echo ($username);
		echo "<br>";
		
		$password=$_POST['password'];
		$password=strip_tags($password);
		
		echo ($password);
		echo "<br>";
	
		
		$sql="SELECT AES_DECRYPT(password,'$clave') FROM tabla_login WHERE user='admin1317'";
	    
	    $res = mysqli_query($conexion, $sql);

	    $num_col = mysqli_num_rows($res);
	    
	    $pass = $num_col[0];
	    
        $pass = "";
        if ($num_col > 0)
        {
            $row = mysqli_fetch_array($res);
            $pass = $row[0];
        }
			

        if ($username=="admin1317" && $password==$pass){
        	$_SESSION["EntraAdmin"]="Dentro";	
        	header("Location: ../Principal_Admin.php");
        }else{

        $query = "SELECT idHospital FROM tabla_login WHERE user = '$username' AND password = AES_ENCRYPT('$password','$clave')";
       $result = mysqli_query($conexion, $query)
	    or die('Error: ' . mysqli_error()."70");
	   
      
		
        if ($result) //Mirar si la consulta está bien hecha
        {               
                if (mysqli_num_rows($result) == 0) //Cuando no hay resultados
                {
                   header("Location: Sign_In.php?var=Error");
                  
                  echo "Entra en el primer error"; 
                       
                }
                else    
                {
                        while($row = mysqli_fetch_array($result))                       
                        {

                                //iniciamos la sesión 
                                $idHospital=$row["idHospital"];
								//$HospitalName = null;
                                 $query = "SELECT Nombre FROM tabla_hospital WHERE Codigo = '$idHospital'";
                						$result = mysqli_query($conexion, $query);

							     while ($row = mysqli_fetch_array($result))
							                {
							                        $HospitalName = $row["Nombre"];  
							                             
							                     
							                }
                                
                                
                                
                                session_name("loginUsuario");
                                $_SESSION["EntraNormal"]="Dentro";
								$_SESSION["NombreHospital"]=$HospitalName;
								//$_SESSION["Hospital"]=$HospitalName;
								
								echo "1";
								echo $_SESSION["Hosp"];
								echo "<br>";
								echo"2";
								$_SESSION["Hospital"];
								
								
                                if(isset($_POST['rememberme']))
                                {
                                        //antes de hacer los cálculos, compruebo que el usuario está logueado 
                                        //utilizamos el mismo script que antes 
                                        if ($_SESSION["autentificado"] != "SI") 
                                        { 
                                            //si no está logueado lo envío a la página de autentificación 
                                            header("Location: Sign_In.php"); 
                                        } 
                                        else 
                                        {
                                            $_SESSION["autentificado"] = "SI";
                                            $ahora = date("Y-n-j H:i:s");
                                            $_SESSION["ultimoAcceso"] = $ahora;
                                            
										
                                            header("Location: ../Principal.php"); //envío al usuario a la pag. de autenticación        
                                        }//Fin de if ($_SESSION["autentificado"] != "SI")
                                } //Fin de ($_POST("remember"))
                                else 
                                {
                                	
									
                                        $_SESSION["autentificado"] = "NO";
                                        header("Location: ../Principal.php");
                                }
        
                        }//Fin de while($row = mysqli_fetch_array       
                }//Fin de if (mysqli_num_rows
        }//Fin de if ($result)
        else
        {
            header("Location: Sign_In.php?var=Error");
           
           echo "Entra en el segundo error";
              
        }               
   }
        
        //mysqli_close($conexion);      
?>