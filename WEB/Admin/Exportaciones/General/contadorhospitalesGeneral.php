<?php
session_start();
require_once ('../../../BDD/conexion.php');

if (!isset($_SESSION["EntraAdmin"])){

    header("Location: ../../../login/Sign_In.php?var=Caduca");    
    
}else{
    
    
?>
<html>
	<head></head>
	<body>
		<form method="post" action="TablaGeneral.php">
			<input type="text" name="IdHospital" id="IdHospital"/>
			<input type="submit" value="Enviar" />
		</form>
		
		<br />
		
		<!-- 
		    SELECT DISTINCT `Id_Hospital` FROM `identificador_paciente` WHERE 1
		    
		    -->
		    
		    
		    <dd>
                <?php
                    $query="SELECT DISTINCT `Id_Hospital` FROM `identificador_paciente` WHERE 1";
                    $res=mysqli_query($conexion,$query);    
                    while ($row=mysqli_fetch_array($res)) {
             
                ?>
                        <!--<button value="<?php echo "$row[0]"; ?>"><?php echo "<td>" . utf8_encode($row[1]) . "</td>";  ?></button>-->
                        <br /> 
                        
                        <form method="post" action="TablaGeneral.php">
                            <input type="checkbox"/>
                            <input type="text" name="IdHospital" id="IdHospital" value="<?php echo "$row[0]"; ?>"/>
                            <input type="submit" value="Enviar" />
                        </form>  
                 <?php
                    }
                 ?>

            </dd>
	</body>
</html>

<?php
}
?>