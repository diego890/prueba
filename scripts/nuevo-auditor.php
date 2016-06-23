<?php
	require 'funciones.php';
	
	// Variables recibidas por POST
	$usuario   = $_POST['usuario'];
	$clave     = $_POST['clave'];
	$DNI       = $_POST['DNI'];
	$nombres   = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$direccion = $_POST['direccion'];
	$telefono  = $_POST['telefono'];
	$email     = $_POST['email'];
	$sexo      = $_POST['sexo'];
	
	
	$rpta = ejecutarQuery("INSERT Auditor VALUES('".$usuario."', '".$clave."', '".$DNI."', '".$nombres."',
					'".$apellidos."', '".$direccion."', '".$telefono."', '".$email."', '".$sexo."','U')");
	

?>
<script>
	alert("Auditor registrado satisfactoriamente.");
	window.location = '../sites/admin.php';
</script>