<?php
session_start();
require_once ("WEB/BDD/conexion.php");

?><html>
	<head></head>
	<body>
		<p>Nuevo admin</p>
		<form action="Asigna.php" method="post" id="form" name="form">
			Nombre admin<input type="text" name="name" id="name" />
			password<input type="password" name="pass" id="pass" />
			<input type="submit" value="introduce" />
			
		</form>
		<p>Modifica</p>
		<form action="Modifica.php" method="post" id="form" name="form">
			Nombre admin<input type="text" name="name" id="name" />
			password<input type="password" name="pass" id="pass" />
			<input type="submit" value="introduce" />
			
		</form>
		
		
		
	</body>
</html>