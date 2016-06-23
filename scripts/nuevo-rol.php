<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$rol = $_POST['rol'];
	$perfil = $_POST['perfil'];
	session_start();
	$rpta = ejecutarQuery("INSERT Rol VALUES('".$rol."', '".$perfil."')");
	// var_dump($rpta);
?>
<script>
	alert("Rol registrado correctamente.");
	window.location = '../sites/roles.php';
</script>