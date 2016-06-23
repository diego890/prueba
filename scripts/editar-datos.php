<?php
	require 'funciones.php';
	
	// Variables recibidas por POST
	$DNI       = $_POST['DNI'];
	$nombres   = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$direccion = $_POST['direccion'];
	$telefono  = $_POST['telefono'];
	$email     = $_POST['email'];
	
	session_start();
	$rpta = ejecutarQuery("UPDATE Auditor SET DNI='".$DNI."', nombres='".$nombres."', apellidos='".$apellidos."', direccion='".$direccion."',
					telefono='".$telefono."', email='".$email."' WHERE usuario='".$_SESSION['usuario']."'");
?>
<script>
	alert("Datos modificados. Vuelva a identificarse.");
	window.location = '../index.php';
</script>