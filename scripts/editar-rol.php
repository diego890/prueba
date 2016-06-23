<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$rol          = $_POST['rol'];
	$perfil = $_POST['perfil'];
	
	session_start();
	$rpta = ejecutarQuery("UPDATE Rol SET perfil='".$perfil."' WHERE rol='".$rol."'");
?>
<script>
	alert("Datos modificados exitosamente.");
	window.location = '../sites/roles.php';
</script>