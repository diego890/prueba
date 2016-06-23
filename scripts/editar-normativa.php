<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$id              = $_POST['id'];
	$internacional 	 = $_POST['internacional'];
	$nacional      	 = $_POST['nacional'];
	$institucional   = $_POST['institucional']; 
	
	session_start();
	$rpta = ejecutarQuery("UPDATE NormativaAuditoria SET internacional='".$internacional."', nacional='".$nacional."',
							institucional='".$institucional."' WHERE ID_Plan=".$id);
?>
<script>
	alert("Normativa actualizada correctamente.");
	window.history.back();
</script>