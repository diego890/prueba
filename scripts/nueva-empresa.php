<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$razonSocial = $_POST['razonSocial'];
	$giroNegocio = $_POST['giroNegocio'];
	$ubicacion   = $_POST['ubicacion']; 
	$realidadProblematica   = $_POST['realidadProblematica']; 
	$mision      = $_POST['mision']; 
	$vision      = $_POST['vision']; 
	$estrategias = $_POST['estrategias']; 
	
	session_start();
	$rpta = ejecutarQuery("INSERT Empresa VALUES(NULL, '".$razonSocial."', '".$giroNegocio."', '".$ubicacion."',
							'".$realidadProblematica."', '".$mision."', '".$vision."', '".$estrategias."', NULL)");
	var_dump($rpta);
?>
<script>
	alert("Empresa registrada correctamente.");
	window.location = '../sites/empresas.php';
</script>