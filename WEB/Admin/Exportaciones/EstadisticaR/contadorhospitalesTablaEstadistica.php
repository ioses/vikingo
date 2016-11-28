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
		<form method="post" action="TablaEstadistica.php">
			<input type="text" name="IdHospital" id="IdHospital"/>
			<input type="submit" value="Enviar" />
		</form>
	</body>
</html>

<?php
}
?>